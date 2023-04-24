@extends('auth.admin.master')

@section('title') {{'History'}} @endsection

@section('main')
<main>
    <h2>History {{ session('data')['first_name'] }}</h2>
    @foreach ($jobsLog as $job)
    <div class="table-history">
        <p><span>{{ $job->user->last_name }} {{ $job->user->first_name }}</span> booked an appointment at <span>{{ $job->date }} {{ $job->time }}</span> for <span>{{ $job->user->blood_type }}</span>donation</p>
        <p>{{ $job->status }}</p>
    </div>
    @endforeach

    {{ $jobsLog->links() }}
</main>
@endsection('main')