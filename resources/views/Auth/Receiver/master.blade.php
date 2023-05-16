<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Fonts -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,300,0,0" />

    <!-- Script -->
    <script src="../../../js/jquery-3.6.4.min.js"></script>
    <script>
    setTimeout(function() {
        $('#message').fadeOut('fast');
    }, 2000); // 2000 milliseconds = 2 seconds
    </script>
    <title>@yield('title')</title>
</head>
<body>
    <nav>
        <ul>
            <li><a href="{{ route('receiver.request') }}">Request</a></li>
            <li><a href="{{ route('receiver.history') }}">History</a></li>
            <li><a href="{{ route('receiver.settings') }}">Settings</a></li>
            <li><a href="{{ route('logout') }}">Logout</a></li>
        </ul>
    </nav>

    @yield('main')
    @yield('footer')
</body>
</html>
