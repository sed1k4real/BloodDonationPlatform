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
            'don_date'=>'bail|required|date',
        ]);

        $data = $request->all();

        $job = Donation::create([
            'don_date'=>$data['date'],
            'room_ref' => 2,
            'donor_ref'=>$request->session()->get('id'),
            'admin_ref',
            'skd_ref'
        ]);

        // Result message
        if(!$job)
        {
            return back()->with('failMessage', 'Oops! Something went wrong');
        }else
        {
            return back()->with('successMessage', 'You have booked successfuly');
        }
    }
}
