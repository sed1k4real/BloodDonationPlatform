<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function UserUpdate(Request $request)
    {
        $user = User::where('id', Auth::id())->first();

        // Rules
        $rules = [
            'last_name' => 'required',
            'first_name' => 'required',
            'tel' => 'required|unique:users,phone_number,' . $user->id,
            'birthdate' => 'required',
            'gender_id' => 'required',
            'role_id' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:6|max:32|confirmed'
        ];

        if ($user->last_name != $request->last_name) {
            $rules['last_name'] = 'required';
        }
        if ($user->first_name != $request->first_name) {
            $rules['first_name'] = 'required';
        }
        if ($user->tel == $request->tel) {
            unset($rules['tel']);
        }
        if ($user->birthdate != $request->birthdate) {
            $rules['birthdate'] = 'required';
        }
        if ($user->gender_id != $request->gender_id) {
            $rules['gender_id'] = 'required|in:1,2';
        }
        if ($user->role_id != $request->role_id) {
            $rules['role_id'] = 'required|in:2,3';
        }
        if ($user->email == $request->email) {
            unset($rules['email']);
        }
        if (!empty($request->password)) {
            $rules['password'] = 'min:4|max:32|confirmed';
        }

        // Validate request parameters
        $request->validate($rules);
        $user->fill($request->all());

        if (!empty($request->password)) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        if (!$user->wasChanged()) {
            return view('Auth/Admin/settings')->with('failMessage', 'Oops something went wrong!');
        }
    }
}
