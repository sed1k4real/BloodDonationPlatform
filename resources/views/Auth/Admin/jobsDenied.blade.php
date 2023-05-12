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
    @if(isset($filtredDonations))
        @foreach($filtredDonations as $donation)
            <div class="table-element">
                <p>{{ $donation->id }}</p>
                <p><span>{{ $donation->donor->user->last_name }} {{ $donation->donor->user->first_name }}</span> booked an appointment at <span>{{ $donation->donation_date }}</span> for {{ $donation->donor->bloodCategory->symbol ?? 'N/A' }} donation</p>
                <p>{{ ucfirst($donation->result->status) ?? 'N/A' }}</p>
                <a href="#">View details</a>
            </div>
        @endforeach
    @else
        @foreach($allDonations as $donation)
            <div class="table-element">
                <p>{{ $donation->id }}</p>
                <p><span>{{ $donation->donor->user->last_name }} {{ $donation->donor->user->first_name }}</span> booked an appointment at <span>{{ $donation->donation_date }}</span> for {{ $donation->donor->bloodCategory->symbol ?? 'N/A' }} donation</p>
                <p>{{ ucfirst($donation->result->status) }}</p>
                <a href="#">View details</a>
            </div>
            @endforeach
    @endif
    </div>
</main>
@endsection('main')
