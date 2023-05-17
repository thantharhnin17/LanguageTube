@extends('layouts.main_layout')

@section('title', 'Profile Classroom Details')

@section('content')
<!-- Content -->
<div class="page-content bg-white">
    <!-- inner page banner -->
    <div class="page-banner ovbl-dark" style="background-image:url(assets/images/banner/banner2.jpg);">
        <div class="container">
            <div class="page-banner-entry">
                <h1 class="text-white">Profile Classroom Details</h1>
             </div>
        </div>
    </div>
    <!-- Breadcrumb row -->
    <div class="breadcrumb-row">
        <div class="container">
            <ul class="list-inline">
                <li><a href="{{url('/')}}">Home</a></li>
                <li><a href="{{route('user.profile', ['id' => Auth::user()->id])}}">Profile</a></li>
                <li>Profile Classroom Details</li>
            </ul>
        </div>
    </div>
    <!-- Breadcrumb row END -->
    <!-- inner page banner END -->
    <div class="content-block">
        <!-- About Us -->
        <div class="section-area section-sp1">
            <div class="container">
                 <div class="row d-flex">
                
                    <div class="col-lg-8 col-md-8 col-sm-12">
                        <div class="course-post">
                            <div class="ttr-post-media media-effect">
                                <img src="{{ asset('storage/img/' . $classroom->course->course_img) }}" alt="">
                            </div>
                            <div class="ttr-post-info">
                                <div class="ttr-post-title ">
                                    <h2 class="post-title">{{$classroom->course->course_name}}</h2>
                                </div>
                                <div class="ttr-post-text">
                                    {{-- <p>{!! $classroom->course->summary !!}</p> --}}
                                </div>
                            </div>
                        </div>
                        <div class="courese-overview" id="overview">
                            <div class="row">
                                <div class="col-12">
                                    <h5 class="m-b5">Course Summary</h5>
                                    <p>{!! $classroom->course->summary !!}</p>
                                </div>
                                <div class="col-12">
                                    <h5 class="m-b5">Course Description</h5>
                                    <p>{!! $classroom->course->description !!}</p>
                                </div>
                            </div>
                        </div>
                        
                        
                    </div>

                    <div class="col-lg-4 col-md-4 col-sm-12 m-b30">
                        <div class="course-detail-bx">
                            
                            <div class="">
                                <h4 class="text-center">Class Features</h4>
                                <ul class="course-features">
                                    <li><i class="ti-book"></i> <span class="label">language</span> <span class="value">{{$classroom->course->level->language->language_name}}</span></li>
                                    <li><i class="ti-stats-up"></i> <span class="label">level</span> <span class="value">{{$classroom->course->level->level_name}}</span></li>
                                    <li><i class="ti-tag"></i> <span class="label">Batch</span> <span class="value">{{$classroom->batch->batch_name}}</span></li>
                                    <li><i class="ti-time"></i> <span class="label">Duration</span> <span class="value">{{$classroom->duration}}</span></li>
                                    <li><i class="ti-stamp"></i> <span class="label">Start Date</span> <span class="value">{{$classroom->start_date}}</span></li>
                                    <li><i class="ti-calendar"></i> <span class="label">Days</span> <span class="value">{{$classroom->days}}</span></li>
                                    <li>
                                        <i class="ti-alarm-clock"></i> 
                                        <span class="label">Time</span> 
                                        <span class="value">{{$classroom->from}} - {{$classroom->to}}</span>
                                    </li>
                                    
                                    <li><i class="ti-layout-media-overlay-alt"></i> <span class="label">Type</span> 
                                        <span class="value">
                                            @if ($classroom->class_type == 0)
                                                On-Campus
                                            @else
                                                Online
                                            @endif
                                        </span>
                                    </li>
                                    @foreach ($paymentConfirms as $confirm)
                                        @if ($confirm->payment->classroom_student_id == $classroom->id)
                                            @if ($confirm->confirmStatus == 'Accepted')
                                                @if ($classroom->online_info_id != null)
                                                    <li><i class="ti-desktop"></i> <span class="label">Class Meeting Link</span> <span class="value">{{$classroom->onlineInfo->meeting_link}}</span></li>
                                                    <li><i class="ti-link"></i> <span class="label">Class Group Link</span> <span class="value">{{$classroom->onlineInfo->group_chat_link}}</span></li>
                                                @endif
                                            @endif
                                        @endif
                                    @endforeach
                                    <li><i class="ti-user"></i> <span class="label">Teacher</span> <span class="value">{{$classroom->teacher->name}}</span></li>
                                    <li><i class="ti-money"></i> <span class="label">Fee</span> <span class="value">{{number_format($classroom->fee)}}</span></li>

                                </ul>
                            </div>

                            @foreach ($paymentConfirms as $confirm)
                                @if ($confirm->payment->classroom_student_id == $classroom->id)
                                <div class="course-price">
                                    <h4 class="price">{{$confirm->confirmStatus}}</h4>
                                </div> 
                                @endif
                            @endforeach
                            	

                            <div class="course-buy-now text-center pb-4">
                                <a href="{{ route('user.profile', ['id' => $student->id]) }}" class="btn radius-xl text-uppercase">
                                    <i class="fa fa-home"></i>
                                      Back To Profile
                                  </a>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    <!-- contact area END -->
    
</div>
<!-- Content END-->
@endsection