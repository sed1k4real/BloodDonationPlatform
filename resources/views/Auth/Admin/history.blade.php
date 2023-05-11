@extends('auth.admin.master')

@section('title') {{'History'}} @endsection

@section('main')
<main>
    <h2>History {{ session('data')['first_name'] }}</h2>
    {{ dd($donationLog) }}
    @if(empty($donationLog))
        <p>Nothing to display here</p>
    @else
        @foreach ($donationLog as $donation)
        <div class="table-history">
            <p><span>{{ $donation->id }}</span> booked an appointment at <span>{{ $donation->donation_date }}</span> for blood type donation</p>
            <p>{{ ucfirst($donation->result->status) }}</p>
        </div>
        @endforeach
    @endif
    {{ $donationLog->links() }}
</main>
@endsection('main')