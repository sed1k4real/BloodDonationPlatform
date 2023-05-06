<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Admin;
use App\Models\Donor;
use App\Models\Receiver;

class CustomAuthController extends Controller
{
    public function LoginUser(Request $request)
    {
        $request->validate([
            'email'=>'bail|required|email',
            'password'=>'bail|required|min:4|max:32'
        ]);

        $credentials = $request->only('email', 'password');

        if (!Auth::attempt($credentials))
        { 
            return back()->with('credentialError', 'Login details are not valid');        
        }

        $role = Auth::user()->role_id;
        
        switch( $role ){
            case '1':
                $admin = Admin::where('user_id', "=", Auth::id())->first();
                $id = $admin->id;
                $request->session()->put('id', $id);
                return redirect()->route('dashboard');
            break;
                
            case '2':
                $donor = Donor::where('user_id', "=", Auth::id())->first();
                $id = $donor->id;
                $request->session()->put('id', $id);
                return redirect()->route('donor-booking');
            break;

            case '3':
                $receiver = Receiver::where('user_id', "=", Auth::id())->first();
                $id = $receiver->id;
                $request->session()->put('id', $id);
                return redirect()->route('reciever.Dashboard');
            break;
        }
    } 

    public function Logout()
    {
        if(Auth::check())
        {
            Auth::logout();
            session()->flush();
            return redirect('login');
        }
    }
}
