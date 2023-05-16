<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderResult;
use App\Models\Receiver;
use Illuminate\Http\Request;
use App\Models\BloodCategory;

class OrderController extends Controller
{
    public function RequestOrder(Request $request)
    {
        // Validate data
        $data = $request->validate([
            'blood_id' => 'required|exists:blood_categories,id',
            'order_qty' => 'required',
            'deadline' => 'required|date'
        ]);

        // Get the receiver id
        $id = $request->session()->get('id');
        
        $order = Order::create([
            'receiver_id' => $id,
            'blood_id' => $data['blood_id'],
            'order_qty' => $data['order_qty'],
            'deadline' => $data['deadline'],
        ]);

        $orderResult = OrderResult::create([
            'order_id' => $order->id,
            'status' => 'pending'
        ]);

        if(!$order || !$orderResult)
        {
            return back()->with('failMessage', 'Oops something went wrong!');
        }
        return back()->with('successMessage', 'Order requested successfuly');
    }
    public function OrdersUpdate(Request $request, $id)
    {
        $order = Order::with('result')->findOrFail($id);
        $blood_id = $order->blood_id;

        $statusOption = $request->input('status');

        
        if($statusOption === 'pending'){
            $order->result->status = 'pending';
        }elseif($statusOption === 'denied'){
            $order->result->status = 'denied';
            $order->result->factor1 = $request->input('reason') ?? Null;
        }elseif($statusOption === 'accepted'){
            $order->result->status = 'booked';
        }elseif($statusOption === 'done'){
            if($order->save()){
                $blood = BloodCategory::findOrFail($blood_id);
                $blood->qty -= $order->order_qty;
                $blood->save();

                // Update the order result status
                $order->result->status = 'done';
                $order->result->save();
            }
        }
        $order->result->save();
        $order->admin_id = $request->session()->get('id');
        $order->save();

        if($order->wasChanged())
        {
            return back()->with('failMessage', 'Oops something went wrong!');
        }

        return redirect()->back()->with('successMessage', 'Updated successfuly');
    }
}
