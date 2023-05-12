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
            'gender_id' => 'required|in:1,2',
            'role_id' => 'required|in:2,3',
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
            'role_id' => $data['role_id'],
            'tel' => $data['tel'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
        switch( $user->role_id ){
            case '2':
                $donor = Donor::create([
                'user_id'=> $user->id,
                'blood_id' => $data['blood_id']
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
                    'user_id'=> $user->id
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
