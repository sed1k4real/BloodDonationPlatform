
    @extends('layouts.master')

    @section('title') {{'Sign up'}} @endsection

    @section('content')
    <div class="signup">
        <h4 class="pb-3">Registration</h4>
        @if(Session::has('failMessage'))
            <span class="text-danger" id="message">{{Session::get('failMessage')}}</span>
        @endif
        <nav class="row nav-pills flex-column flex-sm-row">
            <a class="col-4 flex-sm-fill text-sm-center nav-link" aria-current="page" href="#" id="donor">Donor</a>
            <a class="col-4 flex-sm-fill text-sm-center nav-link" href="#" id="receiver">Receiver</a>
        </nav>

        <form class="signup-form" action="{{route('register-donor')}}" method="post" id="donor-form">
            @csrf
            <div><label for="last_name">Last name</label><br><input class="signup-form-input" type="text" name="last_name" value="{{old('last_name')}}" required></div>
            <div><label for="first_name">First name</label><br><input class="signup-form-input" type="text" name="first_name" value="{{old('first_name')}}"required></div>
            <div><label for="tel">Phone number</label><br><input class="signup-form-input" type="tel" name="tel"  value="{{old('tel')}}" required></div>
            <div><label for="birthdate">Birthdate</label><br><input class="signup-form-input" type="date" name="birthdate" required></div>
            <div class="signup-form-radio" ><label for="gender_id">Gender</label><br>
                <fieldset id="gender_id" name="gender_id">
                    <input type="radio" value="1" name="gender_id">Male</input>
                    <input type="radio" value="2" name="gender_id">Female</input>
                </fieldset>
            </div>
            <div>
                <label for="blood_id">Blood type</label><br><select class="signup-form-select-01" name="blood_id" id="blood_id" required>
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
            <div><label for="chro_dis">Chronic disease</label><input type="text" class="signup-form-input" name="chro_dis"></div>
            <div><label for="email">Email</label><br><input class="signup-form-input" type="email" name="email" required></div>
            <div><label for="password">Password</label><br><input class="signup-form-input" type="password" name="password" required></div>
            <div><label for="password">Confirm password</label><br><input class="signup-form-input" type="password" name="password_confirmation" required></div>
            <div><button type="submit">Sign up</button></div>
        </form>

        <form class="signup-form" action="{{route('register-receiver')}}" method="post" id="receiver-form">
            @csrf
            <div><label for="last_name">Last name</label><br><input class="signup-form-input" type="text" name="last_name" value="{{old('last_name')}}" required></div>
            <div><label for="first_name">First name</label><br><input class="signup-form-input" type="text" name="first_name" value="{{old('first_name')}}"required></div>
            <div><label for="tel">Phone number</label><br><input class="signup-form-input" type="tel" name="tel"  value="{{old('tel')}}" required></div>
            <div><label for="birthdate">Birthdate</label><br><input class="signup-form-input" type="date" name="birthdate" required></div>

            <div class="signup-form-radio" ><label for="gender_id">Gender</label><br>
                <fieldset id="gender_id" name="gender_id">
                    <input type="radio" value="1" name="gender_id">Male</input>
                    <input type="radio" value="2" name="gender_id">Female</input>
                </fieldset>
            </div>
            <div><label for="">Authority</label><input type="text" class="signup-form-input" name="authority"></div>
            <div><label for="">Position</label><input type="text" class="signup-form-input" name="position"></div>
            
            <div><label for="">Email</label><br><input class="signup-form-input" type="email" name="email" required></div>
            <div><label for="">Password</label><br><input class="signup-form-input" type="password" name="password" required></div>
            <div><label for="">Confirm password</label><br><input class="signup-form-input" type="password" name="password_confirmation" required></div>
            <div><button type="submit">Sign up</button></div>
        </form>
    </div>
    <script>
        setTimeout(function() {
            $('#message').fadeOut('fast');
        }, 3000); // 3000 milliseconds = 3 seconds
    </script>
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        // Get form elements
        const form1 = document.getElementById('donor-form');
        const form2 = document.getElementById('receiver-form');

        // Get navbar link elements
        const form1Link = document.getElementById('donor');
        const form2Link = document.getElementById('receiver');

        // Show the default form (form1) and hide the other form (form2)
            form1.style.display = 'grid';
            form2.style.display = 'none';

            form1Link.classList.add('active');

        // Add click event listeners to the navbar links
        form1Link.addEventListener('click', function (event) {
            event.preventDefault();
            form1.style.display = 'grid';
            form2.style.display = 'none';

            // Add 'Active' class to form1 link
            form1Link.classList.add('active');
            form2Link.classList.remove('active');
        });

        form2Link.addEventListener('click', function (event) {
            event.preventDefault();
            form1.style.display = 'none';
            form2.style.display = 'grid';

            // Add 'active' class to form2 link
            form1Link.classList.remove('active');
            form2Link.classList.add('active');
        });
    });
</script>

    @endsection('content')