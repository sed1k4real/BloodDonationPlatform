@extends('auth.donor.master')

@section('title') {{'Settings'}} @endsection

@section('main')
<main>
    <div>
        <h2>Account settings</h2>
        <form action="{{route('admin-update')}}" method="post">
            @csrf
            <div><label for="first_name">First name</label><br><input class="settings-form-input" type="text" name="first_name" value="{{  old('first_name', Auth::user()->first_name) }}"></div>
            <div><label for="last_name">Last name</label><br><input class="settings-form-input" type="text" name="last_name" value="{{ old('last_name', Auth::user()->last_name) }}"></div>
            <div><label for="">Phone number</label><br><input class="settings-form-input" type="tel" name="phone_number" value="{{ old('phone_number', Auth::user()->phone_number) }}"></div>
            <div><label for="">Birthday</label><br><input class="settings-form-input" type="date" name="birthday" value="{{ old('birthday', Auth::user()->birthday) }}"></div>
            <div>
                <label for="">Blood type</label><br>
                <select class="settings-form-select-01" name="blood_type" id="bloodtype">
                    <option value="A+" @if(Auth::user()->blood_type == 'A+') selected @endif > A+ </option>
                    <option value="B+" @if(Auth::user()->blood_type == 'B+') selected @endif > B+ </option>
                    <option value="AB+" @if(Auth::user()->blood_type == 'AB+') selected @endif > AB+ </option>
                    <option value="O+" @if(Auth::user()->blood_type == 'O+') selected @endif> O+ </option>
                    <option value="A-" @if(Auth::user()->blood_type == 'A-') selected @endif > A- </option>
                    <option value="B-" @if(Auth::user()->blood_type == 'B-') selected @endif > B- </option>
                    <option value="AB-" @if(Auth::user()->blood_type == 'AB-') selected @endif > AB- </option>
                    <option value="O-" @if(Auth::user()->blood_type == 'O-') selected @endif> O- </option>
                </select>
            </div>
            <div class="settings-form-radio" ><label for="gender">Gender</label><br>
                <fieldset id="gender" name="gender">
                    <input type="radio" value= 1 name="gender" @if(Auth::user()->gender == 'male') checked @endif>Male</input>
                    <input type="radio" value= 2 name="gender" @if(Auth::user()->gender == 'female') checked @endif>Female</input>
                </fieldset>
            </div>
            <div><label for="">Email</label><br><input class="settings-form-input" type="email" name="email" value="{{ old('email', Auth::user()->email) }}"></div>
            <div><label for="">Old password</label><br><input class="settings-form-input" type="password" name="password"></div>
            <div><label for="">New Password</label><br><input class="settings-form-input" type="password" minlength="6" maxlength="32"></div>
            <div><button type="submit">Update</button></div>
        </form>
    </div>
</main>
@endsection('main')
