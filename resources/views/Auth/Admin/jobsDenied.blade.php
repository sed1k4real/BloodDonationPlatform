@extends('auth.admin.master')

@section('title') {{'Denied jobs'}} @endsection

@section('main')


<main>
    @if(Session::has('successMessage'))
        <p>{{Session::get('successMessage')}}</p>
    @endif
    
    <form class="filter" method="GET" action="{{ route('jobs.denied') }}">
        <input type="text" name="search" placeholder="Search by ID or name...">
        <select name="optionQuery" id="optionQuery">
            <option value="id">ID</option>
            <option value="blood_type">Phone number</option>
            <option value="email">Email</option>
        </select>
        <button type="submit">Search</button>
    </form>

    <div class="table">
    @if(isset($filtredJobs))
            @foreach ($filtredJobs as $job)
            <div class="table-element">
                <p>{{ $job->id }}</p>
                <p><span>{{ $job->user->last_name }} {{ $job->user->first_name }}</span> booked an appointment at <span>{{ $job->date }} {{ $job->time }}</span> for <span>{{ $job->user->blood_type }}</span> donation</p>
                <p>{{ $job->status }}</p>
                <div class="acction">
                    <form method="POST" action="{{ route('jobsUpdate', ['id' => $job->id])}}">
                        @csrf
                        <input type="hidden" name="status" value="booked">
                        <button type="submit" class="accept">Accept</button>
                    </form>
                </div>
            </div>
            @endforeach
        @else
            @foreach ($allJobs as $job)
            <div class="table-element">
                <p>{{ $job->id }}</p>
                <p><span>{{ $job->user->last_name }} {{ $job->user->first_name }}</span> booked an appointment at <span>{{ $job->date }} {{ $job->time }}</span> for <span>{{ $job->user->blood_type }}</span> donation</p>
                <p>{{ $job->status }}</p>
                <div class="acction">
                    <form method="POST" action="{{ route('jobsUpdate', ['id' => $job->id])}}">
                        @csrf
                        <input type="hidden" name="status" value="booked">
                        <button type="submit" class="accept">Accept</button>
                    </form>
                </div>
            </div>
            @endforeach
        @endif
    </div>
</main>
@endsection('main')