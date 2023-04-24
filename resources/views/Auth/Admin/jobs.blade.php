@extends('auth.admin.master')

@section('title') {{'Jobs'}} @endsection

@section('main')

<main>
    @if(Session::has('successMessage'))
        <p id="message">{{Session::get('successMessage')}}</p>
    @endif

    <form class="filter" method="GET" action="{{ route('jobs.pending') }}">
        <div><input type="text" name="search" placeholder="Search by ID or name...">
        <select name="optionQuery" id="optionQuery">
            <option value="id">ID</option>
            <option value="blood_type">Phone number</option>
            <option value="email">Email</option>
        </select></div>
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
                    <form method="POST" action="{{ route('jobsUpdate', ['id' => $job->id], 'denied') }}">
                        @csrf
                        <input type="hidden" name="status" value="denied">
                        <button type="submit" class="deny">Deny</button>
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
                <form method="POST" action="{{ route('jobsUpdate', ['id' => $job->id], 'denied') }}">
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
<script>
    setTimeout(function() {
        $('#message').fadeOut('fast');
    }, 2000); // 2000 milliseconds = 2 seconds
</script>
@endsection('main')