<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class JobResponseNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    protected $job;
    protected $response;
    protected $issuerUser;
    protected $worker;
    public function __construct( $response,$job,$issuerUser,$worker)
    {
        //
        $this->response = $response;
        $this->job = $job;
        $this->issuerUser = $issuerUser;
        $this->worker = $worker;
    }

    
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    
    public function toDatabase($notifiable)
    {

            if($this->response == "accepted"){
            return [
                'message' => 'Your request for the job ' . $this->job->job_name . ' is accepted by the job issuer: ' . $this->issuerUser->name,
                'job_id' => $this->job->id,
                'job_name' => $this->job->job_name,
                'job_description' => $this->job->job_description,
                'skills_required' => $this->job->skills_required,
                'issuer_id' => $this->issuerUser->id,
                'issuer_name' =>  $this->issuerUser->name,
                'issuer_email'=>  $this->issuerUser->email,
                'issuer_phone'=>  $this->issuerUser->phone,
                'user_id' => $this->worker->id,
                'user_name' => $this->worker->name,
                'user_email'=> $this->worker->email,
                'user_phone'=> $this->worker->phone,
                'user_about'=> $this->worker->about_me,
                'user_resume'=> $this->worker->resume_path,
                'type'=>'response'
            ];
        }


        if($this->response == "rejected"){
            return [
                'message' => 'Your request for the job ' . $this->job->job_name . ' is rejected by the job issuer: ' . $this->issuerUser->name,
                'job_id' => $this->job->id,
                'job_name' => $this->job->job_name,
                'job_description' => $this->job->job_description,
                'skills_required' => $this->job->skills_required,
                'issuer_id' => $this->issuerUser->id,
                'issuer_name' =>  $this->issuerUser->name,
                'issuer_email'=>  $this->issuerUser->email,
                'issuer_phone'=>  $this->issuerUser->phone,
                'user_id' => $this->worker->id,
                'user_name' => $this->worker->name,
                'user_email'=> $this->worker->email,
                'user_phone'=> $this->worker->phone,
                'user_about'=> $this->worker->about_me,
                'user_resume'=> $this->worker->resume_path,
                'type'=>'response'
            ];
        }
    }

   
}
