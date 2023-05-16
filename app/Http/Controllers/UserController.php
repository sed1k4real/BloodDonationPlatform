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
            'birthdate' => 'required',
            'gender_id' => 'required|in:1,2',
            'tel' => 'required|unique:users',
            'email' => 'required|email|unique:users,email,',
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
        if ($user->email == $request->email) {
            unset($rules['email']);
        }
        if (!empty($request->password)) {
            $rules['password'] = 'min:4|max:32';
        }

        // Validate request parameters
        $request->validate($rules);
        $user->fill($request->all());

        if (!empty($request->password)) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        if (!$user->wasChanged()) {
            return back()->with('failMessage', 'Oops something went wrong!');
        }
        return back()->with('successMessage', 'Account updated successfuly');
    }
}
