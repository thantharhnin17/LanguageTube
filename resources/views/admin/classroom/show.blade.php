@extends('layouts.admin_layout')
@section('title', 'Classroom Overview')
@section('content')
<!--Main container start -->
<main class="ttr-wrapper">
    <div class="container-fluid">
        <div class="db-breadcrumb">
            <h4 class="breadcrumb-title">Classroom Overview</h4>
            <ul class="db-breadcrumb-list">
                <li><a href="{{url('admin/home')}}"><i class="fa fa-home"></i>Home</a></li>
                <li><a href="{{url('admin/classroom')}}"><i class="fa fa-home"></i>All Classrooms</a></li>
                <li>Classroom Overview</li>
            </ul>
        </div>	
        <div class="row">
            <!-- Your Profile Views Chart -->
            <div class="col-lg-12 m-b30">
                <div class="widget-box">
                    <div class="wc-title">
                        <h4>Classroom Overview</h4>
                    </div>
                    <div class="widget-inner widget-inner-create">
                        <div class="card">
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
                                                <li><i class="ti-book"></i> <span class="label">Language</span> <span class="value">{{$classroom->course->level->language->language_name}}</span></li>
                                                <li><i class="ti-stats-up"></i> <span class="label">Level</span> <span class="value">{{$classroom->course->level->level_name}}</span></li>
                                                <li><i class="ti-tag"></i> <span class="label">Batch</span> <span class="value">{{$classroom->batch->batch_name}}</span></li>
                                                <li><i class="ti-time"></i> <span class="label">Duration</span> <span class="value">{{$classroom->duration}}</span></li>
                                                <li><i class="ti-stamp"></i> <span class="label">Start Date</span> <span class="value">{{$classroom->start_date}}</span></li>
                                                <li><i class="ti-calendar"></i> <span class="label">Days</span> <span class="value">{{$classroom->days}}</span></li>
                                                <li>
                                                    <i class="ti-alarm-clock"></i> 
                                                    <span class="label">Time</span> 
                                                    <span class="value">{{$classroom->from}} - {{$classroom->to}}</span>
                                                </li>
                                                <li><i class="ti-user"></i> <span class="label">Students</span> <span class="value">{{$classroom->avaliable_students}}</span></li>
                                                <li><i class="ti-layout-media-overlay-alt"></i> <span class="label">Type</span> 
                                                    <span class="value">
                                                        @if ($classroom->class_type == 0)
                                                            On-Campus
                                                        @else
                                                            Online
                                                        @endif
                                                    </span>
                                                </li>
                                            </ul>
                                        </div>
            
                                        <div class="course-price">
                                            <h4 class="price">KS {{$classroom->fee}}</h4>
                                        </div>	
                                        <div class="course-buy-now text-center">
                                            @if (Auth::check())
                                                <a href="{{url('classrooms/classroom_details/'.$classroom->id.'/class_form') }}" class="btn radius-xl text-uppercase" name="register">Enroll Now</a>
                                            @else
                                                <a href="/login" class="btn radius-xl text-uppercase" name="register">Enroll Now</a>
                                            @endif
                                        </div>
                                        <div class="teacher-bx">
                                            <div class="teacher-info">
                                                <div class="teacher-thumb">
                                                    <img src="{{ asset('storage/img/' . $classroom->teacher->photo) }}" alt=""/>
                                                </div>
                                                <div class="teacher-name">
                                                    <h5>{{$classroom->teacher->name}}</h5>
                                                    <span>Teacher</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        <div class="p-3 float-right">
                            <a href="{{ redirect()->back()->getTargetUrl() }}" class="btn btn-secondary"><i class="fa fa-home"></i> Back</a>
                        </div>
                    </div>
                    
                </div>
            </div>
            <!-- Your Profile Views Chart END-->
        </div>
    </div>
</main>
<script>
    document.getElementsByName('register')[0].addEventListener('click', function(event) {
        event.preventDefault();
        });
</script>
@endsection