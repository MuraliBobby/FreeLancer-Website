<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
class UserDetails extends Controller
{
    //

    public function displayForm(){
        
        return view('userdetails');
    }
    public function submitForm(Request $request){
        $data = $request->validate([
            'about_me' => 'required|string|max:1000',
            'resume' => 'nullable|mimes:pdf,doc,docx|max:2048',
            'skills' => 'required|array|min:1',
        ]);

        $user = auth()->user();
        $skillsString = implode(',', $data['skills']);

        User::where('id',$user->id)->update(['about_me'=>$data['about_me'],'skills'=>$skillsString]);

        if ($request->hasFile('resume')) {
            $file = $request->file('resume');
            $path = $file->store('resumes');
            User::where('id',$user->id)->update(['resume_path'=>$path]);
        }

        return redirect('/dashboard');
    }

    public function editdetails(){
        $user = Auth::user();
	    $notifications = $user->notifications;

        return view('laravel-examples.user-profile',[
            'notifications'=>$notifications
        ]);
    }

    public function passDetails(){
        $user = Auth::user();
        $details = User::where('id',$user->id);

        return view('profile',[
            'details'=>$details,
        ]);
    }

    public function viewResume(User $user)
    {
        // Check if the user has uploaded a resume
        if (!$user->resume_path) {
            abort(404);
        }

        // Get the file path
        $filePath = 'storage/' . $user->resume_path;

        // Check if the file exists in storage
        if (!Storage::exists($filePath)) {
            abort(404);
        }

        // Return the response to display the resume
        return response()->file(storage_path($filePath));
    }
}
