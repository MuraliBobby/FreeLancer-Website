<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jobs extends Model
{
    use HasFactory;

    protected $fillable =[
        "job_name",
        "job_description",
        "skills_required",
        "reward",
        "submission_date",
        "issuer_name",
        "issuer_email",
        "issuer_phone_no",
        'assigned',
        'worker_email',
        'progress'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
