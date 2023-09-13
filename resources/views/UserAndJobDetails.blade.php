<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User and Job Details</title>
    <style>
        /* Add your CSS styles here */
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            padding: 20px;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: #fff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .section {
            margin-bottom: 20px;
        }
        .section h2 {
            color: #333;
            font-size: 24px;
        }
        .section p {
            color: #666;
            font-size: 16px;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .btn.accept {
            background-color: #28a745;
        }
        .btn.deny {
            background-color: #dc3545;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="section">
            <h2>User Details</h2>
            <p>Name: {{$user->name}}</p>
            <p>Email: {{$user->email}}</p>
            <p>Phone: {{$user->phone}}</p>
            <p>About Me: {{$user->about_me}}</p>
            @if ($user->resume_path)
                <a href="{{ Storage::url($user->resume_path) }}" target="_blank" class="btn btn-primary">View Resume</a>
            @else
                <p>No resume uploaded</p>
            @endif
            <p>Skills: {{$user->skills}}</p>
        </div>
        <div class="section">
            <h2>Job Details</h2>
            <p>Job Name: {{$job->job_name}}</p>
            <p>Job Description: {{$job->job_description}}</p>
            <p>Skills Required: {{$job->skills_required}}</p>
            <p>Reward: ₹{{$job->reward}}</p>
            <p>Submission Date: {{$job->submission_date}}</p>
        </div>
        <div class="section">
            <button class="btn accept">Accept</button>
            <button class="btn deny">Deny</button>
        </div>
    </div>
</body>
</html>
