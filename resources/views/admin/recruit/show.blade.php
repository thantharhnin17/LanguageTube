@extends('layouts.admin_layout')
@section('title', 'Recruitment Overview')
@section('content')
<!--Main container start -->
<main class="ttr-wrapper">
    <div class="container-fluid">
        <div class="db-breadcrumb">
            <h4 class="breadcrumb-title">Recruitment Overview</h4>
            <ul class="db-breadcrumb-list">
                <li><a href="{{url('admin/home')}}"><i class="fa fa-home"></i>Home</a></li>
                <li><a href="{{url('admin/recruit')}}"><i class="fa fa-home"></i>Recruitments</a></li>
                <li>Recruitment Overview</li>
            </ul>
        </div>	
        <div class="row">
            <!-- Your Profile Views Chart -->
            <div class="col-lg-12 m-b30">
                <div class="widget-box">
                    <div class="wc-title">
                        <h4>Recruitment Overview</h4>
                    </div>
                    <div class="widget-inner widget-inner-create">
                        <div class="card r-overview">
                            <div class="r-detail mb-5">
                                <div class="row d-flex">
                                    <div class="col-lg-3 col-md-4 col-sm-12">
                                        <img src="{{ asset('storage/img/' . $recruit->recruit_img) }}" alt="">
                                    </div>
                                    <div class="r-text col-lg-9 col-md-8 col-sm-12">
                                        <h2 class="post-title">{{$recruit->title}} - {{$recruit->language->language_name}}</h2>
                                        <ul class="">
                                            <li class="mr-4"><i class="fa-solid fa-business-time"></i>   {{$recruit->time}}</li>
                                            <li class="mr-4"><i class="ti-location-pin"></i>   {{$recruit->type}}</li>
                                            <li class="mr-4"><i class="fa-solid fa-dollar-sign"></i>   {{$recruit->salary}}</li>
                                            <li><i class="ti-user"></i>   {{$recruit->total_person}} Positions</li>
                                        </ul>
                                        <span>Posted {{$recruit->updated_at->diffForHumans()}}</span>
                                    </div>
                                </div>
                            </div>
    
                            <div class="courese-overview" id="description">
                                <h4>Job Description</h4>
                                <p>{!! $recruit->description !!}</p>
                            </div>
    
                            <div class="courese-overview" id="requirement">
                                <h4>Job Requirements</h4>
                                <p>{!! $recruit->requirement !!}</p>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
            <!-- Your Profile Views Chart END-->
        </div>
    </div>
</main>
<script src="{{asset ('admin/js/course.js')}}"></script>
@endsection