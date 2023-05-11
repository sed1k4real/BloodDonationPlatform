<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use Illuminate\Http\Request;
use App\Models\Result;

class DonationController extends Controller
{
    // Donation booking
    public function DonationBooking(Request $request)
    {
        // Validate data
        $data = $request->validate([
            'donation_date' => 'required|date',
        ]);

        // Get the donor id
        $id = $request->session()->get('id');

        // Create a new donation record
        $donation = Donation::create([
            'donation_date'=>$data['donation_date'],
            'room_id' => 2,
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
        if (!$donation && !$result) {
            return back()->with('failMessage', 'Oops! Something went wrong');
        }
        return back()->with('successMessage', 'You have booked successfully');
    }

    public function DonationUpdate(Request $request, $id)
    {
        $donation = Donation::with('result')->findOrFail($id);
        $statusOption = $request->input('status');

        
        if($statusOption === 'pending'){
            $donation->result->status = 'pending';
        }elseif($statusOption === 'denied'){
            $donation->result->status = 'denied';
            $donation->result->factor1 = $request->input('reason') ?? Null;
        }elseif($statusOption === 'accepted'){
            $donation->result->status = 'booked';
        }elseif($statusOption === 'done'){
            $donation->result->status = 'done';
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

        $allDonations = $data['allDonations'];
        $filtredDonations = $data['filtredDonations'];

        return view('Auth/Admin/jobs', compact('allDonations', 'filtredDonations'));
    }

    public function BookedDonation(Request $request)
    {
        $searchQuery = $request->query('search');
        $optionQuery = $request->get('optionQuery');
        $statusQuery = 'booked';

        $data = $this->FilterDonation($searchQuery, $optionQuery, $statusQuery);

        $allDonations = $data['allDonations'];
        $filtredDonations = $data['filtredDonations'];

        return view('Auth/Admin/jobsBooked', compact('allDonations', 'filtredDonations'));
    }

    public function DeniedDonation(Request $request)
    {
        $searchQuery = $request->query('search');
        $optionQuery = $request->get('optionQuery');
        $statusQuery = 'denied';

        $data = $this->FilterDonation($searchQuery, $optionQuery, $statusQuery);

        $allDonations = $data['allDonations'];
        $filtredDonations = $data['filtredDonations'];

        return view('Auth/Admin/jobsDenied', compact('allDonations', 'filtredDonations'));
    }
    public function DoneDonation(Request $request)
    {
        $searchQuery = $request->query('search');
        $optionQuery = $request->get('optionQuery');
        $statusQuery = 'done';

        $data = $this->FilterDonation($searchQuery, $optionQuery, $statusQuery);

        $allDonations = $data['allDonations'];
        $filtredDonations = $data['filtredDonations'];

        return view('Auth/Admin/jobs', compact('allDonations', 'filtredDonations'));
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
            $filtredDonation = $filtredDonation->get();
        }
        $allDonation = $donation->with('donor.user', 'result')
                    ->whereHas('result', function($query) use ($statusQuery){
                    $query->where('status', 'like', '%' . $statusQuery . '%');
                    })->orderBy('created_at', 'desc');

        $allDonation = $allDonation->get();
        return ['allDonations'=> $allDonation, 'filtredDonations' => $filtredDonation];
    }

    public function DonationLog(Request $request)
    {
        $id = $request->session()->get('id');
        $donationLog = Donation::with('result')
                    ->where('admin_id', $id)
                    ->orderBy('updated_at', 'desc')
                    ->paginate(10);

        return view('Auth/Admin/history', compact('donationLog'));
    }

}
