@extends('auth.admin.master')

@section('title') {{'Insights'}} @endsection

@section('main')
<main>
    <h2>Insights {{ session('data')['first_name'] }}</h2>
</main>
@endsection('main')