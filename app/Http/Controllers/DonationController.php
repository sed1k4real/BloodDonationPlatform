<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use Illuminate\Http\Request;

class DonationController extends Controller
{
    // Donation booking
    public function DonationBooking(Request $request)
    {
        $request->validate([
            'date'=>'bail|required|date',
            'time'=>'bail|required',
        ]);

        $data = $request->all();

        $job = Donation::create([
            'don_date'=>$data['date'],
            'room_ref',
            'donor_ref'=>$request->session()->get('id'),
            'admin_ref',
            'time'=>$data['time'],
            'status'
        ]);

        // Result message
        if(!$job['id'])
        {
            return back()->with('failMessage', 'Oops! Something went wrong');
        }else
        {
            return back()->with('successMessage', 'You have booked successfuly');
        }
    }
}
