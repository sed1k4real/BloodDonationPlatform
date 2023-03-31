<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class CustomAuthController extends Controller
{
    public function LoginUser(Request $request)
    {
        
        $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:6|max:32'
        ]);

        $user = User::where('email', '=', $request->email)->first();
        if($user)
        {
            if(Hash::check($request->password, $user->password)){
                $request->session()->put('loginId', $user->id);
                return redirect('dashboard');
            }
            else
            {
                return back()->with('passError', 'Password is incorrect');
            }
        }
        else
        {
            return back()->with('emailError', 'Login details are not valid');
        }
        
    }

    public function Dashboard()
    {
        $data = array();
        if(session()->has('loginId'))
        {
            $data = User::where('id', "=", session()->get('loginId'))->first();
            return view('dashboard', compact('data'));
        }
        return back();
    }

    public function Logout()
    {
        if(session()->has('loginId'))
        {
            session()->flush();
            return redirect('login');
        }
    }
}
