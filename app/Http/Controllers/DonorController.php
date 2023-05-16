<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use App\Models\Donor;
use Illuminate\Http\Request;


class DonorController extends Controller
{
    public function Booking()
    {
        return view('Auth/Donor/booking');
    }

    public function History(Request $request)
    {
        $id = $request->session()->get('id');
        $donations = Donation::with('donor.bloodCategory','result')->where('donor_id', $id)->get();

        return view('Auth/Donor/history', compact('donations'));
    }

    public function Settings(Request $request)
    {
        $id = $request->session()->get('id');
        $donor = Donor::select(['blood_id'])->find( $id);
        return view('Auth/Donor/settings', compact('donor'));
    }

}
