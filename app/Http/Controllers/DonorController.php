<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use App\Models\Result;
use Illuminate\Http\Request;
use App\Models\Donor;
use Illuminate\Support\Facades\Auth;


class DonorController extends Controller
{
    public function Booking()
    {
        return view('Auth/Donor/booking');
    }

    public function History(Request $request)
    {
        $id = $request->session()->get('id');
        // $donor = Donor::where('user_id', $id)->firstOrFail();
        // $donations = $donor->donation()->with('result')->get();
        $donations = Donation::with('result')->where('donor_id', $id)->get();

        return view('Auth/Donor/history', compact('donations'));
    }

    public function Settings()
    {
        return view('Auth/Donor/settings');
    }

}
