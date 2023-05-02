@extends('auth.admin.master')

@section('title') {{'Settings'}} @endsection

@section('main')

<main>
    <div class="settings">
        <h2>Account settings</h2>
        <form class="settings-form" action="{{route('admin.update')}}" method="post" id="settings-form">
            @csrf
            <div><label for="first_name">First name</label><br><input class="settings-form-input" type="text" name="first_name" value="{{  old('first_name', Auth::user()->first_name) }}"></div>
            <div><label for="last_name">Last name</label><br><input class="settings-form-input" type="text" name="last_name" value="{{ old('last_name', Auth::user()->last_name) }}"></div>
            <div><label for="">Phone number</label><br><input class="settings-form-input" type="tel" name="phone_number" value="{{ old('phone_number', Auth::user()->tel) }}"></div>
            <div><label for="">Birthday</label><br><input class="settings-form-input" type="date" name="birthday" value="{{ old('birthday', Auth::user()->birthdate) }}"></div>
            <div>
                <label for="">Blood type</label><br>
                <select class="settings-form-select-01" name="blood_type" id="bloodtype" title="bloodType">
                    <option value="A+" @if(Auth::user()->blood_type == '1') selected @endif > A+ </option>
                    <option value="B+" @if(Auth::user()->blood_type == '2') selected @endif > B+ </option>
                    <option value="AB+" @if(Auth::user()->blood_type == '3') selected @endif > AB+ </option>
                    <option value="O+" @if(Auth::user()->blood_type == '4') selected @endif> O+ </option>
                    <option value="A-" @if(Auth::user()->blood_type == '5') selected @endif > A- </option>
                    <option value="B-" @if(Auth::user()->blood_type == '6') selected @endif > B- </option>
                    <option value="AB-" @if(Auth::user()->blood_type == '7') selected @endif > AB- </option>
                    <option value="O-" @if(Auth::user()->blood_type == '8') selected @endif> O- </option>
                </select>
            </div>
            <div class="settings-form-radio" ><label for="gender">Gender</label><br>
                <fieldset id="gender" name="gender">
                    <input type="radio" value="male" name="gender" @if(Auth::user()->gender_ref == '1') checked @endif>Male</input>
                    <input type="radio" value="female" name="gender" @if(Auth::user()->gender_ref == '2') checked @endif>Female</input>
                </fieldset>
            </div>
            <div><label for="">Email</label><br><input class="settings-form-input" type="email" name="email" value="{{ old('email', Auth::user()->email) }}"></div>
            <div><label for="">Old password</label><br><input class="settings-form-input" type="password" name="password" id="password" placeholder="Leave blank to keep the same password"></div>
            <!-- <div><label for="">New Password</label><br><input class="settings-form-input" type="password" minlength="6" maxlength="32"></div> -->
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
        if (passwordField.value === '') {
        passwordField.removeAttribute('name');
        }
    });

</script>
<script>
    setTimeout(function() {
        $('#message').fadeOut('fast');
    }, 2000); // 2000 milliseconds = 2 seconds
</script>
@endsection('main')
