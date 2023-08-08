@extends('layouts.user_type.auth')

@section('content')
  
<div class="col-12 mt-4">
    <div class="card mb-4">
        <div class="card-header pb-0 p-3">
            <h6 class="mb-1">Jobs</h6>
        </div>
        <div class="card-body p-3">
            <div class="row">
                @foreach($jobs as $index => $job)
                    <div class="col-xl-3 col-md-6 mb-xl-0 mb-4 job-card">
                        <div class="card card-blog card-plain">
                            <div class="position-relative">
                                <a class="d-block shadow-xl border-radius-xl">
                                    <img src="{{ asset('assets/img/' . $jobImages[array_rand($jobImages)]) }}" alt="img-blur-shadow" class="img-fluid shadow border-radius-lg">
                                </a>
                            </div>
                            <div class="card-body px-1 pb-0">
                                <p class="text-gradient text-dark mb-2 text-sm">Job #{{ $job->id }}</p>
                                <a href="javascript:;">
                                    <h5>
                                        {{ $job->job_name }}
                                    </h5>
                                </a>
                                <p class="mb-4 text-sm">
                                    Skills: {{ $job->skills_required }}
                                    <br>
                                    Reward: {{ $job->reward }}
                                </p>
                                
                                <div class="d-flex align-items-center justify-content-between">
                                    <a href="" class="btn btn-outline-primary btn-sm mb-0" data-bs-toggle="modal" data-bs-target="#jobModal{{ $job->id }}">View Job</a>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="modal fade" id="jobModal{{ $job->id }}" tabindex="-1" aria-labelledby="jobModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <!-- Modal header -->
                                <div class="modal-header">
                                    <h5 class="modal-title" id="jobModalLabel">{{ $job->job_name }}</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <!-- Modal body -->
                                <div class="modal-body">
                                    <p>{{ $job->job_description }}</p>
                                    <p><span style="font-weight:bold">Skills Required:</span> {{ $job->skills_required }}</p>
                                    <p><span style="font-weight:bold">Reward:</span> ₹{{ $job->reward }}</p>
                                    <p><span style="font-weight:bold">Submission Date:</span> {{ $job->submission_date }}</p>
                                    <p><span style="font-weight:bold">Issuer Name:</span> {{ $job->issuer_name}}</p>
                                    <p><span style="font-weight:bold">Issuer Email:</span> {{ $job->issuer_email }}</p>
                                    <p><span style="font-weight:bold">Issuer Phone:</span> {{ $job->issuer_phone_no}}</p>
                                    <!-- Add other job details as needed -->
                                </div>
                                <!-- Modal footer -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <form action="{{route('take_job',['id'=>$job->id])}}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-primary">Request Job</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    @if (($index + 1) % 4 == 0)

                        
                        </div><br>
                        <br><div class="row">
                    @endif
                @endforeach
            </div>
        </div>
    </div>
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
