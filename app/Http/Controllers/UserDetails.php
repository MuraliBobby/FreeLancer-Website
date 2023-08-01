<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
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
}
