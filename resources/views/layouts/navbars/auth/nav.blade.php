<!-- Navbar -->
<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
    <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
            <li class="breadcrumb-item text-sm text-dark active text-capitalize" aria-current="page">{{ str_replace('-', ' ', Request::path()) }}</li>
            </ol>
            <h6 class="font-weight-bolder mb-0 text-capitalize">{{ str_replace('-', ' ', Request::path()) }}</h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4 d-flex justify-content-end" id="navbar"> 
            <!-- <div class="nav-item d-flex align-self-end">
                <a href="https://www.creative-tim.com/product/soft-ui-dashboard-laravel" target="_blank" class="btn btn-primary active mb-0 text-white" role="button" aria-pressed="true">
                    Download
                </a>
            </div> -->
            <div class="ms-md-3 pe-md-3 d-flex align-items-center">
            <div class="input-group">
                <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                <input type="text" class="form-control" placeholder="Type here...">
            </div>
            </div>
            <ul class="navbar-nav  justify-content-end">
            <li class="nav-item d-flex align-items-center">
                <a href="{{ url('/logout')}}" class="nav-link text-body font-weight-bold px-0">
                    <i class="fa fa-user me-sm-1"></i>
                    <span class="d-sm-inline d-none">Sign Out</span>
                </a>
            </li>
            <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                <div class="sidenav-toggler-inner">
                    <i class="sidenav-toggler-line"></i>
                    <i class="sidenav-toggler-line"></i>
                    <i class="sidenav-toggler-line"></i>
                </div>
                </a>
            </li>
            <li class="nav-item px-3 d-flex align-items-center">
                <a href="javascript:;" class="nav-link text-body p-0">
                <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"></i>
                </a>
            </li>
            <li class="nav-item dropdown pe-2 d-flex align-items-center">
                <a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa fa-bell cursor-pointer"></i>
                @if($notifications->count() > 0)
                    <span class="badge bg-danger">{{ $notifications->count() }}</span>
                @endif
                </a>
                <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">
                
                @if($notifications->count() > 0)

                @foreach ($notifications as $notification)

                @if($notification->data['type'] == "request")
                <li class="mb-2">
                    <a class="dropdown-item border-radius-md" href=""  data-bs-toggle="modal" data-bs-target="#notificationPopup{{ $notification->id }}" >
                        <div class="d-flex py-1">
                            <div class="my-auto">
                                <img src="../assets/img/team-2.jpg" class="avatar avatar-sm  me-3 ">
                            </div>
                            <div class="d-flex flex-column justify-content-center">
                                <h6 class="text-sm font-weight-normal mb-1">
                                    <span class="font-weight-bold">{{ $notification->data['message'] }}</span>
                                    <!-- <span class="font-weight-bold">{{ $notification->data['user_id'] }}</span> -->
                                </h6>
                                <p class="text-xs text-secondary mb-0">
                                    <i class="fa fa-clock me-1"></i>
                                    {{ $notification->created_at->diffForHumans() }}
                                </p>
                            </div>
                        </div>
                    </a>
                </li>


                @else
                <li class="mb-2">
                    <a class="dropdown-item border-radius-md" href="#">
                        <div class="d-flex py-1">
                            <div class="my-auto">
                                <img src="../assets/img/team-2.jpg" class="avatar avatar-sm  me-3 ">
                            </div>
                            <div class="d-flex flex-column justify-content-center">
                                <h6 class="text-sm font-weight-normal mb-1">
                                    <span class="font-weight-bold">{{ $notification->data['message'] }}</span>
                                </h6>
                                <p class="text-xs text-secondary mb-0">
                                    <i class="fa fa-clock me-1"></i>
                                    {{ $notification->created_at->diffForHumans() }}
                                </p>
                            </div>
                        </div>
                    </a>
                </li>
                @endif

                @endforeach

                @else
                    <li class="p-2 text-center">No new notifications</li>
                @endif
            </ul>
        </div>
    </div>
</nav>


@if($notifications->count() > 0)
@foreach($notifications as $notification)
<!-- The modal -->
<div class="modal fade" id="notificationPopup{{ $notification->id }}" tabindex="-1" aria-labelledby="notificationPopupLabel{{ $notification->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h5 class="modal-title" id="notificationPopupLabel{{ $notification->id }}">{{ $notification->data['job_name'] }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Modal Body -->
            <div class="modal-body">
                <div class="d-flex">
                    <!-- Left Part (User Details) -->
                    <div class="flex-grow-1 pr-3">
                        <h6 class="text-sm font-bold mb-1">From: {{ $notification->data['user_name'] }}</h6>
                        <p class="text-xs text-secondary mb-0">
                            <i class="fa fa-clock me-1"></i>
                            {{ $notification->created_at->diffForHumans() }}
                        </p>
                        <!-- Add more user details here -->
                    </div>
                    <!-- Right Part (Job Details) -->
                    <div class="flex-grow-1 pl-3 border-left">
                        <h6 class="text-sm font-bold mb-1">Job Details:</h6>
                        <p>Job Name: {{ $notification->data['job_name'] }}</p>
                        <p>Job Description: {{ $notification->data['job_description'] }}</p>
                        <!-- Add more job details here -->
                    </div>
                </div>
            </div>
            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <form action="{{route('accept_job')}}" method="POST">
                    @csrf
                    <input type="hidden" name="worker_email" value="{{ $notification->data['user_email'] }}">
                    <input type="hidden" name="job_id" value="{{ $notification->data['job_id'] }}">
                    <button type="submit" class="btn btn-success">Accept Request</button>
                </form>

                <form action="{{route('reject_job')}}" method="POST">
                    @csrf
                    <input type="hidden" name="worker_email" value="{{ $notification->data['user_email'] }}">
                    <input type="hidden" name="job_id" value="{{ $notification->data['job_id'] }}">
                    <button type="submit" class="btn btn-danger">Reject Request</button>
                </form>

                <!-- <button type="button" class="btn btn-danger">Deny Request</button> -->
            </div>
        </div>
    </div>
</div>
@endforeach
@endif

@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

@if(session('failure'))
<div class="alert alert-danger">
    {{ session('failure') }}
</div>
@endif






