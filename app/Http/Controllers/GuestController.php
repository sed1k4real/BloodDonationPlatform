<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Donor;
use App\Models\BloodCategory;
use App\Models\Receiver;
use App\Models\User;

class GuestController extends Controller
{
    public function Home()
    {
        return view('home');
    }

    public function AboutUs()
    {
        return view('about');
    }

    public function Login()
    {
        return view('login');
    }
    
    public function Signup()
    {
        return view('signup');
    }

    public function RegisterDonor(Request $request)
    {
        // Rules
        $request->validate([
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'birthdate' => 'required|date',
            'gender_id' => 'required|in:1,2',
            'tel' => 'required',
            'chro_dis' => 'nullable|string',
            'blood_id' => 'required|exists:blood_categories,id',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:4'
        ]);

        $data = $request->all();
        $user = User::create([
            'last_name' => $data['last_name'],
            'first_name' => $data['first_name'],
            'birthdate' => $data['birthdate'],
            'gender_id' => $data['gender_id'],
            'role_id' => 2,
            'tel' => $data['tel'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
        
        $donor = Donor::create([
        'user_id'=> $user->id,
        'chro_dis'=> $data['chro_dis'],
        'blood_id' => $data['blood_id']
        ]);

        if(!$user || !$donor)
        {
            return back()->with('failMessage', 'Oops! Something went wrong');
        }else{
            return redirect()->intended('login')->with('successMessage', 'You have registered successfuly');
        }
        return redirect()->intended('signup');
    }

    public function RegisterReceiver(Request $request)
    {
        // Rules
        $request->validate([
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'birthdate' => 'required|date',
            'gender_id' => 'required|in:1,2',
            'tel' => 'required',
            'authority' => 'required|string',
            'position' => 'required|string',
            'status' => 'nullable|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:4'
        ]);

        $data = $request->all();
        $user = User::create([
            'last_name' => $data['last_name'],
            'first_name' => $data['first_name'],
            'birthdate' => $data['birthdate'],
            'gender_id' => $data['gender_id'],
            'role_id' => 3,
            'tel' => $data['tel'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
        $receiver = Receiver::create([
            'user_id'=> $user->id,
            'authority'=> $data['authority'],
            'position'=> $data['position'],
        ]);

        // Result message
        if(!$user || !$receiver)
        {
            return back()->with('failMessage', 'Oops! Something went wrong');
        }else{
            return redirect()->intended('login')->with('successMessage', 'You have registered successfuly');
        }
        return redirect()->intended('signup');
    }
}
