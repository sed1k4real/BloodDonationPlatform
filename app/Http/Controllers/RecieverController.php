<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class RecieverController extends Controller
{
    public function order()
    {
        return view('Auth/Receiver/request');
    }

    public function History(Request $request)
    {
        $id = $request->session()->get('id');
        $orders = Order::with('result', 'bloodCategory')->where('receiver_id', $id)->get();

        return view('Auth/Receiver/history', compact('orders'));
    }

    public function Settings()
    {
        return view('Auth/Receiver/settings');
    }
}
