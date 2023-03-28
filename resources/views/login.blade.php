<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    @include('navbar');
    <div>
        <div class="login">
            <h1><span>Good to see you</span> agian!</h1>
            <form class="login-form" action="">
                <div><label for="">Email/Phone number</label><br><input type="email/tel" required></div>
                <div><label for="">Password</label><br><input type="password"></div>
                <div><button type="button">Login</button></div>
            </form>
        </div>
    </div>
    
</body>
</html>