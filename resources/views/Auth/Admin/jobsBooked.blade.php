@extends('auth.admin.master')

@section('title') {{'Booked jobs'}} @endsection

@section('main')

<main>
    @if(Session::has('successMessage'))
        <p>{{Session::get('successMessage')}}</p>
    @endif

    <form class="filter" method="GET" action="{{ route('donation.booked') }}">
        <input type="hidden" name="status" value="booked">
        <input type="text" name="search" placeholder="Search by ID or name...">
        <select name="optionQuery" id="optionQuery">
            <option value="id">ID</option>
            <option value="blood_type">Phone number</option>
            <option value="email">Email</option>
        </select>
        <button type="submit">Search</button>
    </form>

    <div class="table">
    @if(isset($filtredDonations))
        @foreach($filtredDonations as $donation)
            <div class="table-element">
                <p>{{ $donation->id }}</p>
                <p><span>{{ $donation->donor->user->last_name }} {{ $donation->donor->user->first_name }}</span> booked an appointment at <span>{{ $donation->donation_date }}</span> for donation</p>
                <p>{{ ucfirst($donation->result->status) ?? 'N/A' }}</p>
                <div class="acction">
                    <form method="POST" action="{{ route('donation.Update', ['id' => $donation->id ]) }}" onsubmit="return confirmDenial()">
                        @csrf
                        <input type="hidden" name="status" value="denied">
                        <button type="submit" class="deny" >Deny</button>
                    </form>

                    <form method="POST" action="{{ route('donation.Update', ['id' => $donation->id ]) }}">
                        @csrf
                        <input type="hidden" name="status" value="pending">
                        <button type="submit" class="accept">Pend</button>
                    </form>
                </div>
            </div>
        @endforeach
    @else
        @foreach($allDonations as $donation)
            <div class="table-element">
                <p>{{ $donation->id }}</p>
                <p><span>{{ $donation->donor->user->last_name }} {{ $donation->donor->user->first_name }}</span> booked an appointment at <span>{{ $donation->donation_date }}</span> for donation</p>
                <p>{{ ucfirst($donation->result->status) }}</p>
                <div class="acction">
                    <form method="POST" action="{{ route('donation.Update', ['id' => $donation->id ]) }}" onsubmit="return confirmDenial()">
                        @csrf
                        <input type="hidden" name="status" value="denied">
                        <button type="submit" class="deny" >Deny</button>
                    </form>

                    <form method="POST" action="{{ route('donation.Update', ['id' => $donation->id ]) }}">
                        @csrf
                        <input type="hidden" name="status" value="pending">
                        <button type="submit" class="accept">Pend</button>
                    </form>

                    <form method="POST" action="{{ route('donation.Update', ['id' => $donation->id ]) }}">
                        @csrf
                        <input type="hidden" name="status" value="done">
                        <button type="submit" class="accept">Done</button>
                    </form>
                </div>
            </div>
        @endforeach
    @endif  
    </div>
</main>
@endsection('main')
