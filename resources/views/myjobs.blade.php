@extends('layouts.user_type.auth')

@section('content')
<div class="container">
    <!-- <h1 class="text-3xl font-bold mb-4">My Assigned Jobs</h1> -->
            @if ($assignedJobs->isEmpty())
                <p class="text-gray-600">No jobs taken.</p>
            @else
                <ul class="space-y-6">
                    @foreach ($assignedJobs as $job)
                        <li class="border p-4 rounded-lg shadow-md">
                            <h2 class="text-xl font-semibold">{{ $job->job_name }}</h2>
                            <p class="text-gray-600">Job Description: {{ $job->job_description }}</p>
                            <p class="text-gray-600">Skills Required: {{ $job->skills_required }}</p>
                            <p class="text-gray-600">Reward: ₹{{ $job->reward }}</p>
                            <!-- Display other job details here -->
                        </li>
                    @endforeach
                </ul>
            @endif
</div>
@endsection


<!-- <div class="modal fade" id="successModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <p>Request successfully sent to the job issuer!</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
</div> -->
