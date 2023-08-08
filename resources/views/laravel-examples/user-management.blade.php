@extends('layouts.user_type.auth')

@section('content')

<div>
    <div class="alert alert-secondary mx-4" role="alert">
        <span class="text-white">
            <strong>Add, Edit, Delete Jobs!</strong> 
        </span>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card mb-4 mx-4">
                <div class="card-header pb-0">
                    <div class="d-flex flex-row justify-content-between">
                        <div>
                            <h5 class="mb-0">All Jobs</h5>
                        </div>
                        <a href="{{route('display_jobs_form')}}" class="btn bg-gradient-primary btn-sm mb-0" type="button">+&nbsp; New Job</a>
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        ID
                                    </th>
                                    <!-- <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Photo
                                    </th> -->
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Name
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Skill Required
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Reward 
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Submission Date
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($userJobs as $job)
                                    <tr>
                                        <td class="ps-4">
                                            <p class="text-xs font-weight-bold mb-0">{{ $job->id }}</p>
                                        </td>
                                        <!-- <td>
                                            <div>
                                            
                                                <img src="{{ asset('path/to/job/photo') }}" class="avatar avatar-sm me-3">
                                            </div>
                                        </td> -->
                                        <td class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">{{ $job->job_name }}</p>
                                        </td>
                                        <td class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">Coding</p>
                                        </td>
                                        <td class="text-center">
                                        
                                            <p class="text-xs font-weight-bold mb-0">{{ $job->reward }}</p>
                                        </td>
                                        <td class="text-center">
                                            <span class="text-secondary text-xs font-weight-bold">{{ $job->submission_date }}</span>
                                        </td>

                               
                                    <td class="text-center">
                                        <a href="{{route('edit_job',['id'=>$job->id])}}" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Edit job">
                                            <i class="fas fa-user-edit text-secondary"></i>
                                        </a>
                                        
                                        <form action="{{ route('delete_job', ['id' => $job->id]) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this job?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="cursor-pointer fas fa-trash text-secondary border-0 bg-transparent"></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
 
@endsection