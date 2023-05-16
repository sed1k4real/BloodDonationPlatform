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
    
    <nav class="row nav-pills flex-column flex-sm-row">
        <a class="col-4 flex-sm-fill text-sm-center nav-link" aria-current="page" href="#" id="donor">Donor</a>
        <a class="col-4 flex-sm-fill text-sm-center nav-link" href="#" id="receiver">Receiver</a>
    </nav>

    <div class="table" id="donor-section">
        @if(isset($filtredDonations))
            @foreach($filtredDonations as $donation)
                <div class="table-element">
                    <p>{{ $donation->id }}</p>
                    <p><span>{{ $donation->donor->user->last_name }} {{ $donation->donor->user->first_name }}</span>booked an appointment at<span>{{ $donation->donation_date }}</span>for{{ $donation->donor->bloodCategory->symbol ?? 'N/A' }} donation</p>
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
                    <p><span>{{ $donation->donor->user->last_name }} {{ $donation->donor->user->first_name }}</span>booked an appointment at<span>{{ $donation->donation_date }}</span>for {{ $donation->donor->bloodCategory->symbol ?? 'N/A' }} donation</p>
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
            <div class="pagination">
                {{ $allDonations->links() }}
            </div>
        @endif
    </div>

    <div class="table" id="receiver-section">
    @if(isset($filtredOrders))
            @foreach($filtredOrders as $order)
                <div class="table-element">
                    <p>{{ $order->id }}</p>
                    <p><span>{{ $order->receiver->user->last_name }} {{ $order->receiver->user->first_name }}</span>requested {{$order->order_qty}} Units of {{ $order->bloodCategory->symbol }} {{ $order->bloodCategory->category }} for<span>{{ $order->deadline }}</span></p>
                    <p>{{ ucfirst($order->result->status) ?? 'N/A' }}</p>
                    <div class="acction">
                        <form method="POST" action="{{ route('donation.Update', ['id' => $order->id ]) }}" onsubmit="return confirmDenial()">
                            @csrf
                            <input type="hidden" name="status" value="denied">
                            <button type="submit" class="deny" >Deny</button>
                        </form>

                        <form method="POST" action="{{ route('donation.Update', ['id' => $order->id ]) }}">
                            @csrf
                            <input type="hidden" name="status" value="accepted">
                            <button type="submit" class="accept">Accept</button>
                        </form>
                    </div>
                </div>
            @endforeach
        @else
            @foreach($allOrders as $order)
                <div class="table-element">
                    <p>{{ $order->id }}</p>
                    <p><span>{{ $order->receiver->user->last_name }} {{ $order->receiver->user->first_name }}</span>requested {{$order->order_qty}} Units of {{ $order->bloodCategory->symbol }} {{ $order->bloodCategory->category }} for<span>{{ $order->deadline }}</span></p>
                    <p>{{ ucfirst($order->result->status) ?? 'N/A' }}</p>
                    <div class="acction">
                        <form method="POST" action="{{ route('order.Update', ['id' => $order->id ]) }}" onsubmit="return confirmDenial()">
                            @csrf
                            <input type="hidden" name="status" value="denied">
                            <button type="submit" class="deny" >Deny</button>
                        </form>

                        <form method="POST" action="{{ route('order.Update', ['id' => $order->id ]) }}">
                            @csrf
                            <input type="hidden" name="status" value="accepted">
                            <button type="submit" class="accept">Accept</button>
                        </form>
                    </div>
                </div>
            @endforeach
            <div class="pagination">
                {{ $allOrders->links() }}
            </div>
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
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Get form elements
        const section1 = document.getElementById('donor-section');
        const section2 = document.getElementById('receiver-section');

        // Get navbar link elements
        const section1Link = document.getElementById('donor');
        const section2Link = document.getElementById('receiver');

        // Function to set the active link and section based on localStorage
        function setActiveLink() {
        const activeLink = localStorage.getItem('activeLink');
        if (activeLink === 'section2') {
            section1.style.display = 'none';
            section2.style.display = 'grid';

            section1Link.classList.remove('active');
            section1Link.classList.add('text-secondary');
            section2Link.classList.add('active');
            section2Link.classList.remove('text-secondary');
        } else {
            section1.style.display = 'grid';
            section2.style.display = 'none';

            section1Link.classList.add('active');
            section1Link.classList.remove('text-secondary');
            section2Link.classList.remove('active');
            section2Link.classList.add('text-secondary');
        }
        }

        // Set the active link and section on page load
        setActiveLink();

        // Add click event listeners to the navbar links
        section1Link.addEventListener('click', function (event) {
        event.preventDefault();
        section1.style.display = 'grid';
        section2.style.display = 'none';

        section1Link.classList.add('active');
        section1Link.classList.remove('text-secondary');
        section2Link.classList.remove('active');
        section2Link.classList.add('text-secondary');

        // Store the active link in localStorage
        localStorage.setItem('activeLink', 'section1');
        });

        section2Link.addEventListener('click', function (event) {
        event.preventDefault();
        section1.style.display = 'none';
        section2.style.display = 'grid';

        section1Link.classList.remove('active');
        section1Link.classList.add('text-secondary');
        section2Link.classList.add('active');
        section2Link.classList.remove('text-secondary');

        // Store the active link in localStorage
        localStorage.setItem('activeLink', 'section2');
        });
    });
</script>
@endsection('main')
