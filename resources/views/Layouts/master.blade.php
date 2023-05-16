<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Fonts -->
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,300,0,0" />
    <title>BD - @yield('title')</title>
</head>

<body>
    <nav class="navbar-main">
        <a class="navbar-main-logo" href="{{ route('home') }}">Blood <span>Donation</span></a>
        <ul>
            <li class="{{ Request::is('/') ? 'active':'' }}"><a href="{{ route('home') }}">Home</a></li>
            <li class="{{ Request::is('about') ? 'active':'' }}"><a href="{{ route('about') }}">About Us</a></li>
            <li class="{{ Request::is('register') ? 'active':'' }}"><a href="{{ route('signup') }}">Registation</a></li>
            <li class="navbar-main-cta"><a href="{{ route('login') }}">Login</a></li>
        </ul>
    </nav>

    @yield('content')

</body>
</html>
