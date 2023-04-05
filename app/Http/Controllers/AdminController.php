<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    private function getData(Request $request)
    {
        $id = $request->session()->get('id');
        $user = User::find($id);
        return [
            'first_name' => $user->first_name,
            'last_name' => $user->last_name,
            'phone_number' => $user->phone_number,
            'birthday' => $user->birthday,
            'gender' => $user->gender,
            'email' => $user->email,
            'role' => $user->role
        ];
    }

    public function Insights(Request $request)
    {
        $data = $this->getData($request);
        $request->session()->put('data', $data);
        return view('Auth/Admin/insights');
    }

    public function Dashboard(Request $request)
    {
        $data = $this->getData($request);
        $request->session()->put('data', $data);
        return view('Auth/Admin/dashboard');
    }

    public function Requests(Request $request)
    {
        $data = $this->getData($request);
        $request->session()->put('data', $data);
        return view('Auth/Admin/requests');
    }

    public function History(Request $request)
    {
        $data = $this->getData($request);
        $request->session()->put('data', $data);
        return view('Auth/Admin/history');
    }
    
    public function Settings(Request $request)
    {
        $data = $this->getData($request);
        $request->session()->put('data', $data);
        return view('Auth/Admin/settings');
    }
}
