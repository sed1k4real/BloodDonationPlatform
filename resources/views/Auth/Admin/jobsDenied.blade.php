@extends('auth.admin.master')

@section('title') {{'Denied jobs'}} @endsection

@section('main')


<main>
    @if(Session::has('successMessage'))
        <p>{{Session::get('successMessage')}}</p>
    @endif

    <form class="filter" method="GET" action="{{ route('donation.denied') }}">
        <input type="text" name="search" placeholder="Search by ID or name...">
        <select name="optionQuery" id="optionQuery">
            <option value="id">ID</option>
            <option value="blood_type">Phone number</option>
            <option value="email">Email</option>
        </select>
        <button type="submit">Search</button>
    </form>

    <div class="table">
        @foreach ($donations as $donation)
        <div class="table-element">
            <p>{{ $donation->id }}</p>
            <p><span>{{ $donation->donor->user->last_name }} {{ $donation->donor->user->first_name }}</span> booked an appointment at <span>{{ $donation->donation_date }}</span> for donation</p>
            <p>{{ $donation->result->status }}</p>
            <div class="acction">
            </div>
        </div>
        @endforeach
    </div>
</main>
@endsection('main')
