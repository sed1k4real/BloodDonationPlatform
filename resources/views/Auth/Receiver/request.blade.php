@extends('auth.receiver.master')

@section('title') {{'Request'}} @endsection

@section('main')

@if(Session::has('successMessage'))
    <p>{{Session::get('successMessage')}}</p>
@endif
@if(Session::has('failMessage'))
    <p>{{Session::get('failMessage')}}</p>
@endif
<form method="POST" action="{{ route('receiver.order') }}">
    @csrf
    <div>
        <label for="blood_id">Blood type</label><br><select class="signup-form-select-01" name="blood_id" id="blood_id" required>
            <option value="1">A+ Blood</option>
            <option value="2">B+ Blood</option>
            <option value="3">AB+ Blood</option>
            <option value="4">O+ Blood</option>
            <option value="5">A- Blood</option>
            <option value="6">B- Blood</option>
            <option value="7">AB- Blood</option>
            <option value="8">O- Blood</option>
            <option value="9">A+ Platlet</option>
            <option value="10">B+ Platlet</option>
            <option value="11">AB+ Platlet</option>
            <option value="12">O+ Platlet</option>
            <option value="13">A- Platlet</option>
            <option value="14">B- Platlet</option>
            <option value="15">AB- Platlet</option>
            <option value="16">O- Platlet</option>
        </select>
    </div>

    <div><label for="order_qty">Quantity</label><br><input type="number" name="order_qty"></div>
    <div><label for="deadline">Deadline</label><br><input type="date" name="deadline"></div>
    <button type="submit">Request</button>
</form>
@endsection('main')
