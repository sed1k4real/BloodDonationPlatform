<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Fonts -->
    <link rel="stylesheet" href="../../css/admin.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,300,0,0" />
    <title>Dashboard - @yield('title')</title>
</head>
<body>
        <nav class="nav">
            <a class="navbar-main-logo" href="{{ route('dashboard') }}">Blood <span>Donation</span></a>
            <div class="nav-user-info">
                <img class="nav-profilePic" src="../../pfp.png" alt="Profile picture"/>
                <p class="nav-username">{{ session('data')['last_name'] }} {{ session('data')['first_name'] }}</p>
                <p class="nav-role">@switch( session('data')['role'] )
                        @case('0')
                            Super admin
                        @break
                        @case('1')
                            Admin
                        @break
                        @case('2')
                            Donor
                        @break
                        @case('4')
                            Reciever
                        @break
                        @default
                            Error
                        @endswitch</p>
            </div>
            <div>
                <ul>
                    <li class="{{ Request::is('dashboard') ? 'active':'' }}"><span class="material-symbols-outlined">dashboard</span><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="{{ Request::is('insights') ? 'active':'' }}"><span class="material-symbols-outlined">insights</span><a href="{{ route('insights') }}">Insights</a></li>
                    <li class="{{ Request::is('requests') ? 'active':'' }}"><span class="material-symbols-outlined">Task</span><a href="{{ route('requests') }}">Requests</a></li>
                    <li class="{{ Request::is('history') ? 'active':'' }}"><span class="material-symbols-outlined">history</span><a href="{{ route('history') }}">History</a></li>
                    <li class="{{ Request::is('settings') ? 'active':'' }}"><span class="material-symbols-outlined">settings</span><a href="{{ route('settings') }}">Settings</a></li>
                </ul>
            </div>
            <div class="nav-logout"><span class="material-symbols-outlined">login</span><a href="{{route('logout')}}">Log out</a></div>
        </nav>
        <header class="header">
            <h2>@yield('title')</h2>
            <ul>
                <li class="header-search"><a href=""><span class="material-symbols-outlined">search</span></a></li>
                <li class="header-notif"><a href=""><span class="material-symbols-outlined">notifications</span></a></li>
            </ul>
        </header>
        @yield('main')
        <footer></footer>
</body>
</html>