@extends('auth.donor.master')

@section('title') {{'History'}} @endsection

@section('main')
<div>
    <p>{{ Auth::user()->first_name}}</p>
    @foreach($donations as $donation)
    <div>
        <p><span>{{ $donation->id }} </span> Appointment at {{ $donation->donation_date }} <span>{{ $donation->result->status ?? 'N/A'}} </span> </p>
    </div>
    @endforeach
</div>
@endsection('main')
