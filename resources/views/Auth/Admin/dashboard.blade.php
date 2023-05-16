@extends('auth.admin.master')

@section('title') {{'Home'}} @endsection

@section('main')
<main>
    <h3>Dashboard {{ session('data')['first_name'] }}</h3>
    <div class="row-1 text-center mt-3">
        <div class=" bg-grad-1 p-4 rounded-4">
            <div class="h4 font-weight-bold">{{$blood}}</div>
            <span class="small text-gray">Sacks in total</span>
        </div>

        <div class=" bg-grad-1 p-4 rounded-4">
            <div class="h4 font-weight-bold">{{$donation}}</div>
            <span class="small text-gray">Donations</span>
        </div>
        
        <div class=" bg-grad-1 p-4 rounded-4">
            <div class="h4 font-weight-bold">{{$donation}}</div>
            <span class="small text-gray">Donations</span>
        </div>
    </div>
</main>
@endsection('main')