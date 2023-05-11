@extends('auth.admin.master')

@section('title') {{'Jobs'}} @endsection

@section('main')

<main>
    @if(Session::has('successMessage'))
        <p id="message">{{Session::get('successMessage')}}</p>
    @endif
    @if(Session::has('failMessage'))
        <p id="message">{{Session::get('failMessage')}}</p>
    @endif
    
    <form class="filter" method="GET" action="{{ route('donation.pending') }}">
        <div><input type="text" name="search" placeholder="Search by ID or name...">
        <select name="optionQuery" id="optionQuery">
            <option value="id">ID</option>
            <option value="blood_type">Phone number</option>
            <option value="email">Email</option>
        </select></div>
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
                        <input type="hidden" name="status" value="accepted">
                        <button type="submit" class="accept">Accept</button>
                    </form>
                </div>
            </div>
        @endforeach
    @else
        @foreach($allDonations as $donation)
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
                        <input type="hidden" name="status" value="accepted">
                        <button type="submit" class="accept">Accept</button>
                    </form>
                </div>
            </div>
        @endforeach
    @endif
    </div>
</main>
<script>
    setTimeout(function() {
        $('#message').fadeOut('fast');
    }, 3000); // 3000 milliseconds = 3 seconds
</script>
<script>
    function confirmDenial() {
        var reason = prompt("Please enter the reason for denial:");
        if (reason != null && reason != "") {
            return true;
        } else {
            alert("Please enter a reason for denial.");
            return false;
        }
    }
</script>
@endsection('main')
