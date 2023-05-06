@extends('auth.admin.master')

@section('title') {{'History'}} @endsection

@section('main')
<main>
    <h2>History {{ session('data')['first_name'] }}</h2>
    @foreach ($donationLog as $donation)
    <div class="table-history">
        <p><span>{{ $donation->id }}</span> booked an appointment at <span>{{ $donation->donation_date }}</span> for blood type donation</p>
        <p>{{ $donation->result->status }}</p>
    </div>
    @endforeach

    {{ $donationLog->links() }}
</main>
@endsection('main')