@extends('auth.donor.master')

@section('title') {{'History'}} @endsection

@section('main')
<div>
    <p>{{ Auth::user()->first_name}}</p>
    @foreach($donations as $donation)
    <div>
        <p>{{ $donation->id }}</p>
        <p>Appointment at {{ $donation->donation_date }}</p>
        <p>{{ $donation->result->status ?? 'N/A'}}</p>
    </div>
    @endforeach
</div>
@endsection('main')