<?php

namespace App\Http\Controllers;

use App\Models\BloodCategory;
use App\Models\Donation;
use Illuminate\Http\Request;
use App\Models\Result;
use App\Models\Donor;
use App\Models\Order;

class DonationController extends Controller
{
    // Donation booking
    public function DonationBooking(Request $request)
    {
        // Validate data
        $data = $request->validate([
            'donation_date' => 'required|date',
            'donation_time' => 'required|date_format:H:i'
        ]);

        // Get the donor id
        $id = $request->session()->get('id');

        // Create a new donation record
        $donation = Donation::create([
            'donation_date'=>$data['donation_date'],
            'donation_time'=>$data['donation_time'],
            'room_id',
            'donor_id'=> $id,
            'admin_id',
            'schedule_id' => 1
        ]);

        // Create a result for the donation
        $result = Result::create([
            'donation_id' => $donation->id,
            'status' => 'pending'
        ]);

        // Result message
        if (!$donation || !$result) {
            return back()->with('failMessage', 'Oops! Something went wrong');
        }
        return back()->with('successMessage', 'You have booked successfully');
    }

    public function DonationUpdate(Request $request, $id)
    {
        $donation = Donation::with('result')->findOrFail($id);
        $donor = Donor::findOrFail($donation->donor_id);
        $blood_id = $donor->blood_id;

        $statusOption = $request->input('status');

        
        if($statusOption === 'pending'){
            $donation->result->status = 'pending';
        }elseif($statusOption === 'denied'){
            $donation->result->status = 'denied';
            $donation->result->factor1 = $request->input('reason') ?? Null;
        }elseif($statusOption === 'accepted'){
            $donation->result->status = 'booked';
        }elseif($statusOption === 'done'){
            $donation->room_id = $request->input('room_id');
            $donation->donation_qty = $request->input('donation_qty');

            if($donation->save()){
                $blood = BloodCategory::findOrFail($blood_id);
                $blood->qty += $donation->donation_qty;
                $blood->save();

                // Update the donation result status
                $donation->result->status = 'done';
                $donation->result->save();
            }
        }

        $donation->result->save();
        $donation->admin_id = $request->session()->get('id');
        $donation->save();

        return redirect()->back()->with('successMessage', 'Updated successfuly');
    }

    public function PendingDonation(Request $request)
    {
        $searchQuery = $request->query('search');
        $optionQuery = $request->get('optionQuery');
        $statusQuery = 'pending';

        $data = $this->FilterDonation($searchQuery, $optionQuery, $statusQuery);
        $order = $this->FiltredOrders($searchQuery, $optionQuery, $statusQuery);

        $allDonations = $data['allDonations'];
        $filtredDonations = $data['filtredDonations'];

        $allOrders = $order['allOrders'];
        $filtredOrders = $order['filtredOrders'];

        return view('Auth/Admin/jobs', compact('allDonations', 'filtredDonations', 'allOrders', 'filtredOrders'));
    }

    public function BookedDonation(Request $request)
    {
        $searchQuery = $request->query('search');
        $optionQuery = $request->get('optionQuery');
        $statusQuery = 'booked';

        $data = $this->FilterDonation($searchQuery, $optionQuery, $statusQuery);
        $order = $this->FiltredOrders($searchQuery, $optionQuery, $statusQuery);

        $allDonations = $data['allDonations'];
        $filtredDonations = $data['filtredDonations'];

        $allOrders = $order['allOrders'];
        $filtredOrders = $order['filtredOrders'];

        return view('Auth/Admin/jobsBooked', compact('allDonations', 'filtredDonations', 'allOrders', 'filtredOrders'));
    }

    public function DeniedDonation(Request $request)
    {
        $searchQuery = $request->query('search');
        $optionQuery = $request->get('optionQuery');
        $statusQuery = 'denied';

        $data = $this->FilterDonation($searchQuery, $optionQuery, $statusQuery);

        $allDonations = $data['allDonations'];
        $filtredDonations = $data['filtredDonations'];

        $order = $this->FiltredOrders($searchQuery, $optionQuery, $statusQuery);

        $allOrders = $order['allOrders'];
        $filtredOrders = $order['filtredOrders'];

        return view('Auth/Admin/jobsDenied', compact('allDonations', 'filtredDonations', 'allOrders', 'filtredOrders'));
    }
    public function DoneDonation(Request $request)
    {
        $searchQuery = $request->query('search');
        $optionQuery = $request->get('optionQuery');
        $statusQuery = 'done';

        $data = $this->FilterDonation($searchQuery, $optionQuery, $statusQuery);

        $allDonations = $data['allDonations'];
        $filtredDonations = $data['filtredDonations'];

        $order = $this->FiltredOrders($searchQuery, $optionQuery, $statusQuery);
        
        $allOrders = $order['allOrders'];
        $filtredOrders = $order['filtredOrders'];

        return view('Auth/Admin/jobsDone', compact('allDonations', 'filtredDonations', 'allOrders', 'filtredOrders'));
    }

    private function FilterDonation($searchQuery, $optionQuery, $statusQuery)
    {
        $donation = Donation::query();
        $filtredDonation = null;

        if($searchQuery && $optionQuery){
            if($optionQuery == 'id' && $searchQuery ){
                $filtredDonation = $donation->with('donor.user', 'result')
                                ->whereHas('result', function($query) use ($statusQuery){
                                $query->where('status', 'like', '%' . $statusQuery . '%');
                                })
                                ->where('id', 'like',  '%' . $searchQuery . '%')
                                ->orderBy('created_at', 'desc');
            }else{
                $filtredDonation = $donation->where($optionQuery, 'like', '%' . $searchQuery . '%');
            }
            $filtredDonation = $filtredDonation->paginate(10);
        }
        $allDonation = $donation->with('donor.user', 'result')
                    ->whereHas('result', function($query) use ($statusQuery){
                    $query->where('status', 'like', '%' . $statusQuery . '%');
                    })->orderBy('created_at', 'desc');

        $allDonation = $allDonation->paginate(10);
        return ['allDonations'=> $allDonation, 'filtredDonations' => $filtredDonation];
    }

    private function FiltredOrders($searchQuery, $optionQuery, $statusQuery)
    {
        $order = Order::query();
        $filtredOrders= null;

        if($searchQuery && $optionQuery){
            if($optionQuery == 'id' && $searchQuery ){
                $filtredOrders = $order->with('receiver.user', 'result')
                                ->whereHas('result', function($query) use ($statusQuery){
                                $query->where('status', 'like', '%' . $statusQuery . '%');
                                })
                                ->where('id', 'like',  '%' . $searchQuery . '%')
                                ->orderBy('created_at', 'desc');
            }else{
                $filtredOrders = $order->where($optionQuery, 'like', '%' . $searchQuery . '%');
            }
            $filtredOrders = $filtredOrders->paginate(15);
        }
        $allOrders = $order->with('receiver.user', 'result')
                    ->whereHas('result', function($query) use ($statusQuery){
                    $query->where('status', 'like', '%' . $statusQuery . '%');
                    })->orderBy('created_at', 'desc');

        $allOrders = $allOrders->paginate(15);
        return ['allOrders'=> $allOrders, 'filtredOrders' => $filtredOrders];
    }

    public function DonationLog(Request $request)
    {
        $id = $request->session()->get('id');
        $donationLog = Donation::with(['donor.bloodCategory' => function ($query) {
                        $query->select('id', 'symbol');
                    }, 'result'])
                    ->where('admin_id', $id)
                    ->orderBy('updated_at', 'desc')
                    ->paginate(10);

        return view('Auth/Admin/history', compact('donationLog'));
    }

}
