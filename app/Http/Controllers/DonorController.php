<?php

namespace App\Http\Controllers;

use App\Models\Job;
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
        $jobs = Job::where('user_id', $id)->orderBy('updated_at','desc')->paginate(5);
        return view('Auth/Donor/history', compact('jobs'));
    }

    public function Settings()
    {
        return view('Auth/Donor/settings');
    }

}
