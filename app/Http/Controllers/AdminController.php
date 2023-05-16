<?php

namespace App\Http\Controllers;

use App\Models\BloodCategory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Donation;
use App\Models\Order;

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

    public function Insights()
    {
        // Blood bank
        $bloodBank = BloodCategory::get();
        $total = BloodCategory::sum('qty');

        return view('Auth/Admin/insights', compact('bloodBank', 'total'));
    }

    public function Dashboard(Request $request)
    {
        $blood = BloodCategory::sum('qty');
        $donation = Donation::with('result')
                ->whereHas('result', function($query){
                    $query->where('status', 'done');
                })->count();


        $data = $this->getData($request);
        $request->session()->put('data', $data);
        return view('Auth/Admin/dashboard', compact('blood', 'donation'));
    }

    public function Requests(Request $request)
    {
        $jobs = $this->getJobs();
        return view('Auth/Admin/requests', compact('jobs'));
    }

    public function Settings()
    {
        return view('Auth/Admin/settings');
    }

    public function Update(Request $request)
    {
        $user = User::where('id', $request->session()->get('id'))->first();

        $rules = [
            'first_name' => 'required',
            'last_name' => 'required',
            'phone_number' => 'required|unique:users,phone_number,' . $user->id,
            'birthday' => 'required',
            'blood_type' => 'required',
            'gender' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:6|max:32|confirmed'
        ];

        if ($user->first_name != $request->first_name) {
            $rules['first_name'] = 'required';
        }
        if ($user->last_name != $request->last_name) {
            $rules['last_name'] = 'required';
        }
        if ($user->phone_number == $request->phone_number) {
            unset($rules['phone_number']);
        }
        if ($user->birthday != $request->birthday) {
            $rules['birthday'] = 'required';
        }
        if ($user->blood_type != $request->blood_type) {
            $rules['blood_type'] = 'required';
        }
        if ($user->gender != $request->gender) {
            $rules['gender'] = 'required';
        }
        if ($user->email == $request->email) {
            unset($rules['email']);
        }
        if (!empty($request->password)) {
            $rules['password'] = 'min:6|max:32|confirmed';
        }

        $request->validate($rules);
        $user->fill($request->all());

        if (!empty($request->password)) {
            $user->password = Hash::make($request->password);
        }
        $user->save();

        if (!$user->wasChanged()) {
            return view('Auth/Admin/settings')->with('failMessage', 'Oops something went wrong!');
        }

        return redirect()->back()->with('successMessage', 'Updated successfully');
    }
}
