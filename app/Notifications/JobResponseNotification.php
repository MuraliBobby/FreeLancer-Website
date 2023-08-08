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
    public function __construct( $response,$job,$issuerUser)
    {
        //
        $this->response = $response;
        $this->job = $job;
        $this->issuerUser = $issuerUser;
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
                'type'=>'response'
            ];
        }
    }

   
}
