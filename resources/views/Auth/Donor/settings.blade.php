@extends('auth.donor.master')

@section('title') {{'Settings'}} @endsection

@section('main')
<main>
    <div class="settings">
        <h2>Account settings</h2>
        <form class="settings-form" action="{{route('donor.update')}}" method="post" id="settings-form">
            @csrf
            <div><label for="last_name">Last name</label><br><input class="settings-form-input" type="text" name="last_name" value="{{ old('last_name', Auth::user()->last_name) }}"></div>
            <div><label for="first_name">First name</label><br><input class="settings-form-input" type="text" name="first_name" value="{{  old('first_name', Auth::user()->first_name) }}"></div>
            <div><label for="tel">Phone number</label><br><input class="settings-form-input" type="tel" name="tel" value="{{ old('tel', Auth::user()->tel) }}"></div>
            <div><label for="birthdate">Birthdate</label><br><input class="settings-form-input" type="date" name="birthdate" value="{{ old('birthdate', Auth::user()->birthdate) }}"></div>
            <div>
                <label for="">Blood type</label><br>
                <select class="settings-form-select-01" name="blood_id" id="bloodtype">
                    <option value="A+" @if($donor->blood_id == 1) selected @endif > A+ </option>
                    <option value="B+" @if($donor->blood_id == 2) selected @endif > B+ </option>
                    <option value="AB+" @if($donor->blood_id == 3) selected @endif > AB+ </option>
                    <option value="O+" @if($donor->blood_id == 4) selected @endif> O+ </option>
                    <option value="A-" @if($donor->blood_id == 5) selected @endif > A- </option>
                    <option value="B-" @if($donor->blood_id == 6) selected @endif > B- </option>
                    <option value="AB-" @if($donor->blood_id == 7) selected @endif > AB- </option>
                    <option value="O-" @if($donor->blood_id == 8) selected @endif> O- </option>
                </select>
            </div>
            <div class="form-check" ><label for="gender">Gender</label><br>
                <fieldset id="gender" name="gender">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" value= 1 name="gender_id" @if(Auth::user()->gender_id == 1) checked @endif></input>
                        <label class="form-check-label" for="exampleRadios1">Male</label>
                    </div>
                    
                    <div class="form-check">
                        <input class="form-check-input"type="radio" value= 2 name="gender_id" @if(Auth::user()->gender_id == 2) checked @endif></input>
                        <label class="form-check-label" for="exampleRadios1">Female</label>
                    </div>
                </fieldset>
            </div>
            <div><label for="">Email</label><br><input class="settings-form-input" type="email" name="email" value="{{ old('email', Auth::user()->email) }}"></div>
            <div><label for="password">New password</label><br><input class="settings-form-input" type="password" name="password" id="password" placeholder="Leave blank to keep the same password"></div>
            <div><button type="submit">Update</button></div>
        </form>
        @if(Session::has('successMessage'))
            <p id="message">{{Session::get('successMessage')}}</p>
        @endif

        @if(Session::has('failMessage'))
            <p id="message">{{Session::get('successMessage')}}</p>
        @endif
    </div>
</main>
<script>
    const passwordField = document.getElementById('password');           
    const form = document.getElementById('settings-form');

    form.addEventListener('submit', function(event) {
        if (passwordField.value === '' || passwordField.value === NULL) {
            passwordField.removeAttribute('name');
        }
    });
</script>
@endsection('main')
