@extends('layouts.main_layout')

@section('title', 'Recruitment Details')

@section('content')
<!-- Content -->
<div class="page-content bg-white">
    <!-- inner page banner -->
    <div class="page-banner ovbl-dark" style="background-image:url(assets/images/banner/banner2.jpg);">
        <div class="container">
            <div class="page-banner-entry">
                <h1 class="text-white">Recruitment Details</h1>
             </div>
        </div>
    </div>
    <!-- Breadcrumb row -->
    <div class="breadcrumb-row">
        <div class="container">
            <ul class="list-inline">
                <li><a href="#">Home</a></li>
                <li>Recruitments</li>
                <li>Recruitment Details</li>
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
                
                    <div class="col-lg-9 col-md-8 col-sm-12" id="overview">
                        <div class="card r-detail mb-5">
                            <div class="card-body row d-flex">
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

                    <div class="col-lg-3 col-md-4 col-sm-12 m-b30">
                        <div class="course-detail-bx">
                            <div class="">
                                <span>Apply For This Job</span>
                            </div>	
                            <div class="rd-seperate"></div>
                            <div class="course-buy-now text-center">
                                @if (Auth::check())
                                    <a href="{{url('recruits/recruit_details/'.$recruit->id.'/recruit_form') }}" class="btn radius-xl text-uppercase">Apply Here</a>
                                @else
                                    <a href="/login" class="btn radius-xl text-uppercase">Apply Here</a>
                                @endif

                            </div>
                            
                            <div class="course-info-list scroll-page">
                                <ul class="navbar">
                                    <li><a class="nav-link" href="#overview"><i class="ti-zip"></i>Overview</a></li>
                                    <li><a class="nav-link" href="#description"><i class="ti-agenda"></i>Description</a></li>
                                    <li><a class="nav-link" href="#requirement"><i class="ti-receipt"></i>Requirements</a></li>
                                </ul>
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