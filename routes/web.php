<?php

use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InfoUserController;
use App\Http\Controllers\jobsController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserDetails;
use App\Http\Controllers\ResetController;
use App\Http\Controllers\SessionsController;
use App\Models\jobs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('find-jobs',function(){

	$jobImages = ['home-decor-1.jpg', 'home-decor-2.jpg', 'home-decor-3.jpg','home-decor-4.jpg'];
	$jobs = jobs::where('assigned', false)->get();

	$user = Auth::user();

	// Get the notifications for the user
	$notifications = $user->notifications;

	return view('findjob', [
		'jobs' => $jobs,
		'jobImages' => $jobImages,
		'notifications' => $notifications
	]);
});


Route::group(['middleware' => 'auth'], function () {

	Route::get('/details',[UserDetails::class,'displayForm'])->name('display_form');
	Route::post('/submitdetails',[UserDetails::class,'submitForm'])->name('submit_details');
	Route::get('/editdetails',[UserDetails::class,'editDetails'])->name('editUserDetails');
	Route::get('/dashboard', [UserDetails::class, 'passDetails'])->name('passDetails');
	Route::get('/view-resume/{user}', 'UserController@viewResume')->name('view.resume');
    Route::get('/', [HomeController::class, 'home']);
	Route::get('/addjob',[jobsController::class,'displayForm'])->name('display_jobs_form');
	Route::post('/addjob',[jobsController::class,'createJob'])->name('create_job');
	Route::delete('/deletejobs/{id}', [jobsController::class,'delete'])->name('delete_job');
	Route::get('/editjob/{id}',[jobsController::class,'editjob'])->name('edit_job');
	Route::post('/updatejob/{id}',[jobsController::class,'updatejob'])->name('update_job');
	Route::post('/takejob/{id}',[jobsController::class,'notifyissuer'])->name('take_job');
	Route::post('/acceptjob/{details}',[jobsController::class,'acceptjob'])->name('accept_job');
	

	

	Route::get('dashboard', function () {

		$user = Auth::user();

		// Get the notifications for the user
		$notifications = $user->notifications;


		
		$totalJobs = jobs::count();
    	return view('dashboard', [
			'totalJobs' => $totalJobs,
			'notifications' => $notifications
		]);

		return view('dashboard');
	})->name('dashboard');

	Route::get('billing', function () {
		return view('billing');
	})->name('billing');

	Route::get('profile', function () {

		$user = Auth::user();
        $details = User::where('id',$user->id)->first();

		$notifications = $user->notifications;

        return view('profile',[
            'details'=>$details,
			'notifications'=> $notifications
        ]);

		return view('profile');
	})->name('profile');

	Route::get('rtl', function () {
		return view('rtl');
	})->name('rtl');

	Route::get('add-jobs', function () {

		$user = Auth::user();

		// Get the notifications for the user
		$notifications = $user->notifications;

		$userJobs = jobs::where('issuer_email', Auth::user()->email)->get();

        return view('laravel-examples/user-management', ['userJobs' => $userJobs, 'notifications'=>$notifications]);

		return view('laravel-examples/user-management');
	})->name('user-management');

	Route::get('tables', function () {
		return view('tables');
	})->name('tables');

    Route::get('virtual-reality', function () {
		return view('virtual-reality');
	})->name('virtual-reality');

    Route::get('static-sign-in', function () {
		return view('static-sign-in');
	})->name('sign-in');

    Route::get('static-sign-up', function () {
		return view('static-sign-up');
	})->name('sign-up');

    Route::get('/logout', [SessionsController::class, 'destroy']);
	Route::get('/user-profile', [InfoUserController::class, 'create']);
	Route::post('/user-profile', [InfoUserController::class, 'store']);
    Route::get('/login', function () {
		return view('dashboard');
	})->name('sign-up');
});



Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [RegisterController::class, 'create']);
    Route::post('/register', [RegisterController::class, 'store']);
    Route::get('/login', [SessionsController::class, 'create']);
    Route::post('/session', [SessionsController::class, 'store']);
	Route::get('/login/forgot-password', [ResetController::class, 'create']);
	Route::post('/forgot-password', [ResetController::class, 'sendEmail']);
	Route::get('/reset-password/{token}', [ResetController::class, 'resetPass'])->name('password.reset');
	Route::post('/reset-password', [ChangePasswordController::class, 'changePassword'])->name('password.update');

});

Route::get('/login', function () {
    return view('session/login-session');
})->name('login');