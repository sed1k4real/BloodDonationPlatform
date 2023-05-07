<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use App\Models\Donor;
use Illuminate\Http\Request;
use App\Models\Result;
use App\Models\User;
use Illuminate\Support\Facades\DB;

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
        $donation = Donation::findOrFail($id);
        $status = $request->input('status');

        if ($status === 'booked') {
            $donation->status = 'booked';
        } elseif ($status === 'denied') {
            $donation->status = 'denied';
        }

        $donation->admin_id = $request->session()->get('id');
        $donation->save();

        return redirect()->back()->with('successMessage', 'You have registered successfuly');
    }

    public function PendingDonation(Request $request)
    {
        $donations = Donation::with('donor.user', 'result')
                    ->whereHas('result', function ($query) {
                    $query->where('status', 'pending');
                    })->orderBy('created_at', 'desc')->get();

        return view('Auth/Admin/jobs', compact('donations'));
    }

    public function BookedDonation(Request $request)
    {
        $donations = Donation::with('donor.user', 'result')
                    ->whereHas('result', function ($query) {
                    $query->where('status', 'booked');
                    })->orderBy('created_at', 'desc')->get();

        return view('Auth/Admin/jobsBooked', compact('donations'));
    }

    public function DeniedDonation(Request $request)
    {
        $donations = Donation::with('donor.user', 'result')
                    ->whereHas('result', function ($query) {
                    $query->where('status', 'denied');
                    })->orderBy('created_at', 'desc')->get();

        return view('Auth/Admin/jobsDenied', compact('donations'));
    }
    public function DoneDonation(Request $request)
    {
        $searchQuery = $request->query('search');
        $optionQuery = $request->get('optionQuery');
        $statusQuery = 'done';

        $data = $this->FilterJobs($searchQuery, $optionQuery, $statusQuery);

        $allDonations = $data['allDonations'];
        $filtredDonations = $data['filtredDonations'];

        return view('Auth/Admin/jobs', compact('allDonations', 'filtredDonations'));
    }

    private function FilterJobs($searchQuery, $optionQuery, $statusQuery)
    {
        $donation = Donation::query();
        $filtredDonation = null;

        if($searchQuery && $optionQuery){
            if($optionQuery == 'id' && $searchQuery){
                $filtredDonation = $donation->with('result')->where('donation.id', 'like',  '%' . $searchQuery . '%')
                                    ->where('result.status', 'like',  '%' . $statusQuery . '%')
                                    ->orderBy('created_at', 'desc');
            }else{
                $filtredDonation = $donation->where($optionQuery, 'like', '%' . $searchQuery . '%');
            }
            $filtredDonation = $filtredDonation->get();
        }
        $allDonation = Donation::with('result')->where('status', 'like',  '%' . $statusQuery . '%')
                    ->orderBy('created_at', 'desc')
                    ->get();

        return ['allDonation'=> $allDonation, 'filtredDonation' => $filtredDonation];
    }

    public function DonationLog(Request $request)
    {
        $id = $request->session()->get('id');
        $donationLog = Donation::with('result')->where('admin_id', $id)->orderBy('updated_at', 'desc')->paginate(10);
        return view('Auth/Admin/history', compact('donationLog'));
    }

}
