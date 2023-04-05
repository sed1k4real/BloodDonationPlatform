<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class CustomAuthController extends Controller
{
    public function LoginUser(Request $request)
    {
        $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:6|max:32'
        ]);

        $credentials = $request->only('email', 'password');

        if (!Auth::attempt($credentials))
        { 
            return back()->with('credentialError', 'Login details are not valid');        
        }

        $user = User::where('id', "=", Auth::id())->first();
        $role = Auth::user()->role;

        $request->session()->put('id', $user->id);

        switch( $role ){
            case '1':
                return redirect()->route('dashboard');
            break;
            
            case '2':
                return redirect()->route('donor.Dashboard');
            break;

            case '3':
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
