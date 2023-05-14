<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Fonts -->
    <link rel="stylesheet" href="../../css/admin.css">
    <link rel="stylesheet" href="../../css/bootstrap.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,300,0,0" />

    <!-- Script -->
    <script src="../../../js/jquery-3.6.4.min.js"></script>

    <title>Dashboard - @yield('title')</title>
</head>
<body>
        <nav class="nav">
            <a class="navbar-main-logo" href="{{ route('dashboard') }}">Blood <span>Donation</span></a>
            <div class="nav-user-info">
                <img class="nav-profilePic" src="../../pfp.png" alt="Profile picture"/>
                <p class="nav-username">{{ Auth::user()->last_name }}</p>
                <p class="nav-username">{{ Auth::user()->first_name }}</p>
                <p class="nav-role">@switch( Auth::user()->role_ref )
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
                    <li class="nav-dropdown">
                        <div class="nav-requests {{ Request::is('requests/pending') || Request::is('requests/booked') || Request::is('requests/denied') || Request::is('requests/done') ? 'active':'' }}"><span class="material-symbols-outlined">Task</span>
                        <a href="#">Requests</a></div>
                        <ul class="dropdown-menu">
                            <li><a class="{{ Request::is('requests/pending') ? 'active':'' }}" href=" {{ route('donation.pending') }} ">Pending</a></li>
                            <li><a class="{{ Request::is('requests/booked') ? 'active':'' }}" href=" {{ route('donation.booked') }} ">Booked</a></li>
                            <li><a class="{{ Request::is('requests/denied') ? 'active':'' }}" href=" {{ route('donation.denied') }} ">Denied</a></li>
                            <li><a class="{{ Request::is('requests/done') ? 'active':'' }}" href=" {{ route('donation.done') }} ">Done</a></li>
                        </ul>
                    </li>
                    <li class="{{ Request::is('history') ? 'active':'' }}"><span class="material-symbols-outlined">history</span><a href="{{ route('admin.history') }}">History</a></li>
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

        <script>
            // // Hide the dropdown menu by default
            $(".dropdown-menu").hide();

            // // Show/hide the dropdown menu based on whether it's active or not
            $(".nav-dropdown").on("click", function () {
                $(this).find(".dropdown-menu").toggle();
            });

            // // Close the dropdown menu when clicked outside
            $(document).ready(function() {
                $('.dropdown-menu').on('click', function(event) {
                    event.stopPropagation(); // Stop click event from bubbling up to document
                });
            });

        </script>
        @yield('main')
        <footer></footer>
</body>
</html>
