@extends('auth.receiver.master')

@section('title') {{'History'}} @endsection

@section('main')
<div>
    <p>{{ Auth::user()->last_name}} {{ Auth::user()->first_name}}</p>
    @foreach($orders as $order)
    <div>
        <p><span>ID {{ $order->id }} - </span> Requested {{ $order->order_qty }} units of {{ $order->bloodCategory->symbol }} {{ $order->bloodCategory->category }}<span> for {{ $order->deadline }}, status: {{ $order->result->status ?? 'N/A'}} </span> </p>
    </div>
    @endforeach
</div>
@endsection('main')
