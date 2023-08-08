<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class JobInterestNotification extends Notification
{
    protected $job;
    protected $user;
    public function __construct($job,$user)
    {
        $this->job = $job;
        $this->user = $user;
    }

    public function via($notifiable)
    {
        return ['database']; // You can add other channels like 'sms', 'slack', etc. if needed
    }


    public function toDatabase($notifiable)
    {
        return [
            'message' => 'User ' . $this->user->name . ' is interested in your job: ' . $this->job->job_name,
            'job_id' => $this->job->id,
            'job_name' => $this->job->job_name,
            'job_description' => $this->job->job_description,
            'skills_required' => $this->job->skills_required,
            'user_id' => $this->user->id,
            'user_name' => $this->user->name,
            'user_email'=> $this->user->email,
            'user_phone'=> $this->user->phone,
            'user_about'=> $this->user->about_me,
            'user_resume'=> $this->user->resume_path,
            'type'=>'request'
        ];
    }
}