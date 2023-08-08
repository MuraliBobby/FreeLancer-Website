<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\jobs;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Notifications\JobInterestNotification;
use App\Notifications;
use App\Notifications\JobResponseNotification;

class jobsController extends Controller
{
    //
    public function displayForm(){
        return view('createjob');
    }
    public function createJob(Request $request){
        $data = $request->validate([
            'job_name' => 'required|string|max:255',
            'job_description' => 'required|string',
            'skills_required' => 'required|string',
            'reward' => 'required|numeric',
            'submission_date' => 'required|date',
            // 'issuer_name' => 'required|string|max:255',
            // 'issuer_email' => 'required|email',
            'issuer_phone_no' => 'required|string',
        ]);
        $data['issuer_name'] = Auth::user()->name;
        $data['issuer_email'] = Auth::user()->email;
        $job = jobs::create($data);

        $userJobs = jobs::where('issuer_email', Auth::user()->email)->get();

        // return view('laravel-examples/user-management',[
        //     'userJobs' => $userJobs,
        // ]);
        return redirect()->route('user-management');
    }

    public function delete($id)
    {
        // Find the job by its ID
        $job = jobs::findOrFail($id);

        // Check if the authenticated user is the issuer of the job (optional)
        if ($job->issuer_email === auth()->user()->email) {
            // If the user is the issuer, delete the job
            $job->delete();

            // Redirect back to the previous page with a success message (optional)
            return redirect()->back()->with('success', 'Job deleted successfully.');
        }

        // If the user is not the issuer, you can redirect with an error message or handle it as per your requirements
        return redirect()->back()->with('error', 'You do not have permission to delete this job.');
    }

    public function editjob($id){
        $job = jobs::findOrFail($id);

        return view('editjob', compact('job'));
    }

    public function updatejob(Request $request,$id){
        $data = $request->validate([
            'job_name' => 'required|string|max:255',
            'job_description' => 'required|string',
            'skills_required' => 'required|string',
            'reward' => 'required|numeric',
            'submission_date' => 'required|date',
            'issuer_name' => 'required|string|max:255',
            // 'issuer_email' => 'required|email',
            'issuer_phone_no' => 'required|string',
        ]);

        
        jobs::where('id',$id)->update([
            'job_name' => $data['job_name'],
            'job_description' => $data['job_description'],
            'skills_required' => $data['skills_required'],
            'reward' => $data['reward'],
            'submission_date' => $data['submission_date'],
            'issuer_name' => $data['issuer_name'],
            // 'issuer_email' => 'required|email',
            'issuer_phone_no' => $data['issuer_phone_no'],
        ]);
        return redirect()->route('user-management');
    }
    
    public function notifyissuer(Request $request, $id){
        $job = jobs::findOrFail($id);
        $user = Auth::user();
        // Get the user who posted the job (job issuer) based on the 'issuer_email' field
        $issuerUser = User::where('email', $job->issuer_email)->first();

        // Send the notification to the issuer using the database channel
        $issuerUser->notify(new JobInterestNotification($job,$user));
    }

    public function acceptjob(Request $request, $details){
        
        // dd($request);
        jobs::where('id',$request->job_id)->update([
            'assigned'=>true,
            'worker_email'=>$request->worker_email,
        ]);

        $response = "accepted";
        $worker_email = $request->worker_email;
        
        $worker = User::where('email',$worker_email)->first();

        $job = jobs::findOrFail($request->job_id);
        $issuerUser = Auth::user();
        $worker->notify(new JobResponseNotification($response,$job,$issuerUser));

    }

}
