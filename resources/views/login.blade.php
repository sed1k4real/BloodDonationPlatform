
@extends('layouts.master')

@section('title') {{'Login'}} @endsection

@section('content')
    <div>
        <div class="login">
            <h3><span>Good to see you</span> agian!</h3>
            @if(Session::has('successMessage'))
                    <span class="text-success" id="message">{{Session::get('successMessage')}}</span>
            @endif
            <form class="login-form" action="{{route('login-user')}}" method="post">
                @csrf
                <div>
                    <label for="">Email</label><br>
                    <input type="email" name="email" value="{{old('email')}}" placeholder="xyz123@email.com" required>
                    @if(Session::has('emailError'))
                            <span class="text-danger">{{Session::get('emailError')}}</span>
                    @endif
                    <span class="text-danger">@error('email') {{$message}} @enderror</span>
                </div>
                <div>
                    <label for="">Password</label><br>
                    <input type="password" name="password" placeholder="Minimum is 6">
                    @if(Session::has('credentialError'))
                            <span class="text-danger">{{Session::get('credentialError')}}</span>
                    @endif
                    <span class="text-danger">@error('password') {{$message}} @enderror</span>
                </div>
                <div><button type="submit">Login</button></div>
            </form>
        </div>
    </div>
    <script>
        setTimeout(function() {
            $('#message').fadeOut('fast');
        }, 2000); // 2000 milliseconds = 2 seconds
    </script>
@endsection('content')