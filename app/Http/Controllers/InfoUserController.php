<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\View;

class InfoUserController extends Controller
{

    public function create()
    {
        return view('laravel-examples/user-profile');
    }

    public function store(Request $request)
    {

        $attributes = request()->validate([
            'name' => ['required', 'max:50'],
            'email' => ['required', 'email', 'max:50', Rule::unique('users')->ignore(Auth::user()->id)],
            'phone'     => ['max:50'],
            'skills' => ['max:70'],
            'about_me'    => ['max:150'],
            'resume'=> 'nullable|mimes:pdf,doc,docx|max:2048'
        ]);
        // if($request->get('email') != Auth::user()->email)
        // {
        //     if(env('IS_DEMO') && Auth::user()->id == 1)
        //     {
        //         return redirect()->back()->withErrors(['msg2' => 'You are in a demo version, you can\'t change the email address.']);
                
        //     }
            
        // }
        
            $attribute = request()->validate([
                'email' => ['required', 'email', 'max:50', Rule::unique('users')->ignore(Auth::user()->id)],
            ]);
            
            if ($request->hasFile('resume')) {
                $file = $request->file('resume');
                $path = $file->store('resumes');
                User::where('id',$request->id)->update(['resume_path'=>$path]);
            }

        
        User::where('id',Auth::user()->id)
        ->update([
            'name'    => $attributes['name'],
            'email' => $attribute['email'],
            'phone'     => $attributes['phone'],
            'skills' => $attributes['skills'],
            'about_me'    => $attributes["about_me"],
        ]);


        return redirect('/user-profile')->with('success','Profile updated successfully');
    }
}
