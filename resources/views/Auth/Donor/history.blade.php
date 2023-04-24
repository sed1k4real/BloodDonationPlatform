@extends('auth.donor.master')

@section('title') {{'History'}} @endsection

@section('main')
<div>
    <p>{{ Auth::user()->first_name}}</p>
    @foreach($jobs as $job)
    <div>
        <p>{{ $job->id }}</p>
        <p>Appointment at {{ $job->date }}</p>
        <p>{{ $job->status }}</p>
    </div>
    @endforeach
</div>
{{ $jobs->links() }}
@endsection('main')