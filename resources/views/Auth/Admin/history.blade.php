@extends('auth.admin.master')

@section('title') {{'History'}} @endsection

@section('main')
<main>
    <h3>History {{ session('data')['first_name'] }}</h3>
    @foreach ($donationLog as $donation)
    <div class="table-history">
        <div class="table-history-element">
            <p>{{ $donation->id }}</p>
            <p> booked an appointment at <span>{{ $donation->donation_date }}</span> for {{ $donation->donor->bloodCategory->symbol ?? 'N/A' }} donation</p>
            <p>{{ ucfirst($donation->result->status) }}</p>
        </div>
    </div>
    @endforeach
    {{ $donationLog->links() }}
</main>
@endsection('main')