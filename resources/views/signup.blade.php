
    @extends('layouts.master')

    @section('title') {{'Sign up'}} @endsection

    @section('content')
    <div class="signup">
        <h1>Registration</h1>
        <form class="signup-form" action="{{route('register-user')}}" method="post">
            @csrf
            <div><label for="last_name">Last name</label><br><input class="signup-form-input" type="text" name="last_name" value="{{old('last_name')}}" required></div>
            <div><label for="first_name">First name</label><br><input class="signup-form-input" type="text" name="first_name" value="{{old('first_name')}}"required></div>
            <div><label for="tel">Phone number</label><br><input class="signup-form-input" type="tel" name="tel"  value="{{old('tel')}}" required></div>
            <div><label for="birthdate">Birthdate</label><br><input class="signup-form-input" type="date" name="birthdate" required></div>
            
                <div>
                <label for="">Blood type</label><br><select class="signup-form-select-01" name="blood_type" id="blood_type" required>
                    <option value="1">A+</option>
                    <option value="2">B+</option>
                    <option value="3">AB+</option>
                    <option value="4">O+</option>
                    <option value="5">A-</option>
                    <option value="6">B-</option>
                    <option value="7">AB-</option>
                    <option value="8">O-</option>
                </select>
                </div>
            <div class="signup-form-radio" ><label for="gender_id">Gender</label><br>
                <fieldset id="gender_id" name="gender_id">
                    <input type="radio" value="1" name="gender_id">Male</input>
                    <input type="radio" value="2" name="gender_id">Female</input>
                </fieldset>
            </div>
            <!-- Chronic disease will be added later -->
            <div>
                <label for="">Role</label><br><select class="signup-form-select-02" name="role_id" id="role_id" required>
                <option value="2">Donor</option>
                <option value="3">Receiver</option>
            </select></div>
            
            <div><label for="">Email</label><br><input class="signup-form-input" type="email" name="email" required></div>
            <div><label for="">Password</label><br><input class="signup-form-input" type="password" name="password" required></div>
            <div><label for="">Confirm password</label><br><input class="signup-form-input" type="password" required></div>
            <div class="terms"><input class="signup-form-checkbox" type="checkbox"><label for="">I agree on the website<span><a href="#"> terms and conditions</a></span></label></div>
            <div><button type="submit">Sign up</button></div>
        </form>
    </div>
    @if(Session::has('failMessage'))
        <span class="text-danger" id="message">{{Session::get('failMessage')}}</span>
    @endif
    <script>
    setTimeout(function() {
        $('#message').fadeOut('fast');
    }, 2000); // 2000 milliseconds = 2 seconds
    </script>
    @endsection('content')