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

    public function RegisterUser(Request $request)
    {
        // Rules
        $request->validate([
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'birthdate' => 'required|date',
            'gender_ref' => 'required|in:1,2',
            'role_ref' => 'required|in:2,3',
            'tel' => 'required',
            'chro_dis' => 'nullable|string',
            'blood_type' => 'required|exists:blood_categories,ref',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:4'
        ]);

        $data = $request->all();
        $user = User::create([
            'last_name' => $data['last_name'],
            'first_name' => $data['first_name'],
            'birthdate' => $data['birthdate'],
            'gender_ref' => $data['gender_ref'],
            'role_ref' => $data['role_ref'],
            'tel' => $data['tel'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
        switch( $user->role_ref ){
            case '2':
                $donor = Donor::create([
                'user_ref'=> $user->id,
                // 'chro_dis' => $data['chro_dis'],
                'blood_type' => $data['blood_type']
                ]);

                if(!$donor)
                {
                    return back()->with('failMessage', 'Oops! Something went wrong');
                }else{
                    return redirect()->intended('login')->with('successMessage', 'You have registered successfuly');
                }
            break;
            case '3':
                $receiver = Receiver::create([
                    'user_ref'=> $user->id
                ]);

                // Result message
                if(!$receiver)
                {
                    return back()->with('failMessage', 'Oops! Something went wrong');
                }else{
                    return redirect()->intended('login')->with('successMessage', 'You have registered successfuly');
                }
            break;
        }

        return redirect()->intended('signup');
    }
}
