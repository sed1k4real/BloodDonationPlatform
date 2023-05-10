@extends('auth.admin.master')

@section('title') {{'Jobs'}} @endsection

@section('main')

<main>
    @if(Session::has('successMessage'))
        <p id="message">{{Session::get('successMessage')}}</p>
    @endif

    <form class="filter" method="GET" action="{{ route('donation.pending') }}">
        <div><input type="text" name="search" placeholder="Search by ID or name...">
        <select name="optionQuery" id="optionQuery">
            <option value="id">ID</option>
            <option value="blood_type">Phone number</option>
            <option value="email">Email</option>
        </select></div>
        <button type="submit">Search</button>
    </form>

    <div class="table">
    @if(isset($filtredDonations))
        @foreach($filtredDonations as $donation)
            <div class="table-element">
                <p>{{ $donation->id }}</p>
                <p><span>{{ $donation->donor->user->last_name }} {{ $donation->donor->user->first_name }}</span> booked an appointment at <span>{{ $donation->donation_date }}</span> for donation</p>
                <p>{{ $donation->result->status ?? 'N/A' }}</p>
                <div class="acction">

                </div>
            </div>
        @endforeach
    @else
        @foreach($allDonations as $donation)
            <div class="table-element">
                <p>{{ $donation->id }}</p>
                <p><span>{{ $donation->donor->user->last_name }} {{ $donation->donor->user->first_name }}</span> booked an appointment at <span>{{ $donation->donation_date }}</span> for donation</p>
                <p>{{ $donation->result->status ?? 'N/A' }}</p>
                <div class="acction">

                </div>
            </div>
        @endforeach
    @endif
    </div>
</main>
<script>
    setTimeout(function() {
        $('#message').fadeOut('fast');
    }, 2000); // 2000 milliseconds = 2 seconds
</script>
@endsection('main')
