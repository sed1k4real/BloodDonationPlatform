@extends('auth.admin.master')

@section('title') {{'Done jobs'}} @endsection

@section('main')


<main>
    @if(Session::has('successMessage'))
        <p>{{Session::get('successMessage')}}</p>
    @endif

    <form class="filter" method="GET" action="{{ route('jobs.pending') }}">
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
            @foreach ($filtredDonations as $donation)
            <div class="table-element">
                <p>{{ $donation->id }}</p>
                <p><span>{{ $donation->donor->user->last_name }} {{ $donation->donor->user->first_name }}</span> booked an appointment at <span>{{ $donation->date }}</span> for <span>{{ $donation->donor->blood_type }}</span> donation</p>
                <p>{{ $donation->result->status }}</p>
                <div class="acction">
                    <form method="POST" action="{{ route('jobsUpdate', ['id' => $job->id]) }}">
                        @csrf
                        <input type="hidden" name="status" value="denied">
                        <button type="submit" class="deny">Deny</button>
                    </form>
                </div>
            </div>
            @endforeach
        @else
            @foreach ($allDonations as $donation)
            <div class="table-element">
            <p>{{ $donation->id }}</p>
                <p><span>{{ $donation->donor->user->last_name }} {{ $donation->donor->user->first_name }}</span> booked an appointment at <span>{{ $donation->date }}</span> for <span>{{ $donation->donor->user->blood_type }}</span> donation</p>
                <p>{{ $donation->result->status }}</p>
                <div class="acction">
                    <form method="POST" action="{{ route('jobsUpdate', ['id' => $job->id]) }}">
                        @csrf
                        <input type="hidden" name="status" value="denied">
                        <button type="submit" class="deny">Deny</button>
                    </form>
                </div>
            </div>
            @endforeach
        @endif
    </div>
</main>
@endsection('main')