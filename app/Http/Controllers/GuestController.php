<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

    public function Signup()
    {
        return view('signup');
    }

    public function Login()
    {
        return view('login');
    }
}
