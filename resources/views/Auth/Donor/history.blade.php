@extends('auth.donor.master')

@section('title') {{'History'}} @endsection

@section('main')
<div>
    <p>{{ Auth::user()->last_name}} {{ Auth::user()->first_name}}</p>
    @foreach($donations as $donation)
    <div>
        <p><span>ID {{ $donation->id }} - </span> Appointment for {{ $donation->donor->bloodCategory->symbol}} in {{ $donation->donation_date }} at {{ $donation->donation_time }} <span>, status: {{ $donation->result->status ?? 'N/A'}} </span></p>
    </div>
    @endforeach
</div>
@endsection('main')
