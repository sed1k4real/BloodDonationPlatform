<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
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

        $data = $request->all();
        $check = $this->create($data);
        
        // Result message
        if(!$check['id'])
        {
            return back()->with('failMessage', 'Oops! Something went wrong');
        }else
        {
            return redirect()->intended('login')->with('successMessage', 'You have registered successfuly');
        }
    }

    public function create(array $data)
    {
        return User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'phone_number' => $data['phone_number'],
            'birthday' => $data['birthday'],
            'blood_type' => $data['blood_type'],
            'gender' => $data['gender'],
            'role' => $data['role'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);
    }
}
