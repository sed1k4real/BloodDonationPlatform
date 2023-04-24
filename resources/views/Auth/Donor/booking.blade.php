@extends('auth.donor.master')

@section('title') {{'Booking'}} @endsection

@section('main')

@if(Session::has('successMessage'))
    <p>{{Session::get('successMessage')}}</p>
@endif
<form action="{{route('bookingApp')}}" method="post">
    @csrf
    <div><label for="date">Date</label><input type="date" name="date"></div>
    <div><label for="time">Time</label><input type="time" name="time"></div>
    <button type="submit">Book</button>
</form>
@endsection('main')