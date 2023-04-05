@extends('auth.admin.master')

@section('title') {{'Requests'}} @endsection

@section('main')
<main>
    <h2>Requests {{ session('data')['first_name'] }}</h2>
</main>
@endsection('main')