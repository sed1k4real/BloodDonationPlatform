<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\User;

class JobsController extends Controller
{
    public function BookAppointment(Request $request)
    {
        // Rules
        $request->validate([
            'date'=>'bail|required|date',
            'time'=>'bail|required',
        ]);

        $data = $request->all();

        $job = Job::create([
            'user_id'=>$request->session()->get('id'),
            'admin_id',
            'date'=>$data['date'],
            'time'=>$data['time'],
            'status'
        ]);

        // Result message
        if(!$job['id'])
        {
            return back()->with('failMessage', 'Oops! Something went wrong');
        }else
        {
            return back()->with('successMessage', 'You have booked successfuly');
        }
    }

    public function JobsUpdate(Request $request, $id)
    {
        $job = Job::findOrFail($id);
        $status = $request->input('status');

        if ($status === 'booked') {
            $job->status = 'booked';
        } elseif ($status === 'denied') {
            $job->status = 'denied';
        }

        $job->admin_id = $request->session()->get('id');
        $job->save();

        return redirect()->back()->with('successMessage', 'You have registered successfuly');
    }

    public function PendingJobs(Request $request)
    {
        $searchQuery = $request->query('search');
        $optionQuery = $request->get('optionQuery');
        $statusQuery = 'pending';

        $data = $this->FilterJobs($searchQuery, $optionQuery, $statusQuery);

        $allJobs = $data['allJobs'];
        $filtredJobs = $data['filtredJobs'];

        return view('Auth/Admin/jobs', compact('allJobs', 'filtredJobs'));
    }

    public function BookedJobs(Request $request)
    {
        $searchQuery = $request->query('search');
        $optionQuery = $request->get('optionQuery');
        $statusQuery = 'booked';

        $data = $this->FilterJobs($searchQuery, $optionQuery, $statusQuery);

        $allJobs = $data['allJobs'];
        $filtredJobs = $data['filtredJobs'];

        return view('Auth/Admin/jobsBooked', compact('allJobs', 'filtredJobs'));
    }

    public function DeniedJobs(Request $request)
    {
        $searchQuery = $request->query('search');
        $optionQuery = $request->get('optionQuery');
        $statusQuery = 'denied';

        $data = $this->FilterJobs($searchQuery, $optionQuery, $statusQuery);

        $allJobs = $data['allJobs'];
        $filtredJobs = $data['filtredJobs'];
        return view('Auth/Admin/jobsDenied', compact('allJobs', 'filtredJobs'));
    }

    public function DoneJobs(Request $request)
    {   
        $searchQuery = $request->query('search');
        $optionQuery = $request->get('optionQuery');
        $statusQuery = 'done';

        $data = $this->FilterJobs($searchQuery, $optionQuery, $statusQuery);

        $allJobs = $data['allJobs'];
        $filtredJobs = $data['filtredJobs'];
        return view('Auth/Admin/jobsDone', compact('allJobs', 'filtredJobs'));
    }

    private function FilterJobs($searchQuery, $optionQuery, $statusQuery)
    {
        $jobs = Job::query();
        $filtredJobs = null;

        if($searchQuery && $optionQuery){
            if($optionQuery == 'id' && $searchQuery){
                $filtredJobs = $jobs->where('id', 'like',  '%' . $searchQuery . '%')
                                    ->where('status', 'like',  '%' . $statusQuery . '%')
                                    ->orderBy('created_at', 'desc');
            }else{
                $filtredJobs = $jobs->where($optionQuery, 'like', '%' . $searchQuery . '%');
            }
            $filtredJobs = $filtredJobs->get();
        }
        $allJobs = Job::where('status', 'like',  '%' . $statusQuery . '%')
                    ->orderBy('created_at', 'desc')
                    ->get();

        return ['allJobs'=> $allJobs, 'filtredJobs' => $filtredJobs];
    }

    public function Jobslog(Request $request)
    {
        $jobsLog = Job::where('admin_id', $request->session()->get('id'))->orderBy('updated_at', 'desc')->paginate(10);
        return view('Auth/Admin/history', compact('jobsLog'));
    }
}