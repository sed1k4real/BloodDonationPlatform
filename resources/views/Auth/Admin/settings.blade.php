@extends('auth.admin.master')

@section('title') {{'Settings'}} @endsection

@section('main')
<main>
    <h2>Settings {{ session('data')['first_name'] }}</h2>
</main>
@endsection('main')