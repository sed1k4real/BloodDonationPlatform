<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Session;

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
            'first_name'=>'required',
            'last_name'=>'required',
            'phone_number'=>'required|unique:users',
            'birthday'=>'required',
            'blood_type'=>'required',
            'gender'=>'required',
            'role'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:6|max:32'
        ]);

        // User model
        $user = new User();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->phone_number = $request->phone_number;
        $user->birthday = $request->birthday;
        $user->blood_type = $request->blood_type;
        $user->gender = $request->gender;
        $user->role = $request->role;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        // Result message
        $res = $user->save();
        if($res)
        {
            return redirect()->intended('login')->with('successMessage', 'You have registered successfuly');
        }else
        {
            return back()->with('failMessage', 'Oops! Something went wrong');
        }
    }
}
