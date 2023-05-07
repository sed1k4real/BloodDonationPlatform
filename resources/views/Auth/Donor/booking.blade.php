@extends('auth.donor.master')

@section('title') {{'Booking'}} @endsection

@section('main')

@if(Session::has('successMessage'))
    <p>{{Session::get('successMessage')}}</p>
@endif
@if(Session::has('failMessage'))
    <p>{{Session::get('failMessage')}}</p>
@endif
<form method="POST" action="{{ route('donation-booking') }}">
    @csrf
    <div><label for="donation_date">Date</label><input type="date" name="donation_date"></div>
    <button type="submit">Book</button>
</form>
@endsection('main')
