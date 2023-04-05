@extends('auth.admin.master')

@section('title') {{'Home'}} @endsection

@section('main')
<main>
    <h2>Dashboard {{ session('data')['first_name'] }}</h2>
</main>
@endsection('main')