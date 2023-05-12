@extends('auth.admin.master')

@section('title') {{'History'}} @endsection

@section('main')
<main>
    {{dd($donationLog)}}
    <h2>History {{ session('data')['first_name'] }}</h2>
    @if(empty($donationLog))
        <p>Nothing to display here</p>
    @else
        @foreach ($donationLog as $donation)
        <div class="table-history">
            <div class="table-history-element">
                <p>{{ $donation->id }}</p>
                <p> booked an appointment at <span>{{ $donation->donation_date }}</span> for {{ $donation->donor->bloodCategory->symbol ?? 'N/A' }} donation</p>
                <p>{{ ucfirst($donation->result->status) }}</p>
            </div>
        </div>
        @endforeach
    @endif
    {{ $donationLog->links() }}
</main>
@endsection('main')