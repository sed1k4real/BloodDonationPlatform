<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>
</head>
<body>
    @include('navbar');
    <div class="signup">
        <h1>Registration</h1>
        <form class="signup-form" action="">
            <div><label for="">First name</label><br><input class="signup-form-input" type="text" required></div>
            <div><label for="">Last name</label><br><input class="signup-form-input" type="text" required></div>
            <div><label for="">Phone number</label><br><input class="signup-form-input" type="tel" required></div>
            <div><label for="">Birthday</label><br><input class="signup-form-input" type="date" required></div>
            
                <div>
                <label for="">Blood type</label><br><select class="signup-form-select-01" name="bloodtype" id="bloodtype" required>
                    <option value="A+">A+</option>
                    <option value="B+">B+</option>
                    <option value="AB+">AB+</option>
                    <option value="O+">O+</option>
                    <option value="A-">A-</option>
                    <option value="B-">B-</option>
                    <option value="AB-">AB-</option>
                    <option value="O-">O-</option>
                </select>
                </div>
            <div class="signup-form-radio" ><label for="">Gender</label><br>
                <fieldset id="gender">
                    <input type="radio" name="gender">Male</input>
                    <input type="radio" name="gender">Female</input>
                </fieldset>
            </div>
            <div>
                <label for="">Role</label><br><select class="signup-form-select-02" name="role" id="role" required>
                <option value="">Donor</option>
                <option value="">Receiver</option>
            </select></div>
            
            <div><label for="">Email</label><br><input class="signup-form-input" type="email" required></div>
            <div><label for="">Password</label><br><input class="signup-form-input" type="password" required></div>
            <div><label for="">Confirm password</label><br><input class="signup-form-input" type="password" required></div>
            <div class="terms"><input class="signup-form-checkbox" type="checkbox"><label for="">I agree on the website<span><a href="#"> terms and conditions</a></span></label></div>
            <div><button type="button">Sign up</button></div>
        </form>
    </div>
</body>
</html>