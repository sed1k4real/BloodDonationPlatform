@extends('auth.admin.master')

@section('title') {{'History'}} @endsection

@section('main')
<main>
    <h2>History {{ session('data')['first_name'] }}</h2>
</main>
@endsection('main')