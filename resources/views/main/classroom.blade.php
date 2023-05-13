@extends('layouts.main_layout')

@section('title', 'All Classrooms')

@section('content')
<!-- Content -->
<div class="page-content bg-white">
    <!-- inner page banner -->
    <div class="page-banner ovbl-dark" style="background-image:url(assets/images/banner/banner3.jpg);">
        <div class="container">
            <div class="page-banner-entry">
                <h1 class="text-white">Our Classrooms</h1>
             </div>
        </div>
    </div>
    <!-- Breadcrumb row -->
    <div class="breadcrumb-row">
        <div class="container">
            <ul class="list-inline">
                <li><a href="{{url('/')}}">Home</a></li>
                <li>Our Classrooms</li>
            </ul>
        </div>
    </div>
    <!-- Breadcrumb row END -->
    <!-- inner page banner END -->
    <div class="content-block">
        <!-- About Us -->
        <div class="section-area section-sp1">
            <div class="container">
                 <div class="row">
                    <div class="col-lg-3 col-md-4 col-sm-12 m-b30">
                        <div class="widget courses-search-bx placeani">
                            <div class="form-group">
                                <div class="input-group">
                                    <label>Search Courses</label>
                                    <input name="dzName" type="text" required class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="widget widget_archive">
                            <h5 class="widget-title style-1">All Courses</h5>
                            <ul>
                                <li class="active"><a href="#">General</a></li>
                                <li><a href="#">IT & Software</a></li>
                                <li><a href="#">Photography</a></li>
                                <li><a href="#">Programming Language</a></li>
                                <li><a href="#">Technology</a></li>
                            </ul>
                        </div>
                        <div class="widget">
                            <a href="#"><img src="assets/images/adv/adv.jpg" alt=""/></a>
                        </div>
                        <div class="widget recent-posts-entry widget-courses">
                            <h5 class="widget-title style-1">Recent Courses</h5>
                            <div class="widget-post-bx">
                                <div class="widget-post clearfix">
                                    <div class="ttr-post-media"> <img src="assets/images/blog/recent-blog/pic1.jpg" width="200" height="143" alt=""> </div>
                                    <div class="ttr-post-info">
                                        <div class="ttr-post-header">
                                            <h6 class="post-title"><a href="#">Introduction EduChamp</a></h6>
                                        </div>
                                        <div class="ttr-post-meta">
                                            <ul>
                                                <li class="price">
                                                    <del>$190</del>
                                                    <h5>$120</h5>
                                                </li>
                                                <li class="review">03 Review</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-post clearfix">
                                    <div class="ttr-post-media"> <img src="assets/images/blog/recent-blog/pic3.jpg" width="200" height="160" alt=""> </div>
                                    <div class="ttr-post-info">
                                        <div class="ttr-post-header">
                                            <h6 class="post-title"><a href="#">English For Tommorow</a></h6>
                                        </div>
                                        <div class="ttr-post-meta">
                                            <ul>
                                                <li class="price">
                                                    <h5 class="free">Free</h5>
                                                </li>
                                                <li class="review">07 Review</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-8 col-sm-12">
                        <div class="row">
                            @foreach($classrooms as $classroom)
                            <div class="col-md-6 col-lg-4 col-sm-6 m-b30">
                                <div class="cours-bx">
                                    <div class="action-box">
                                        <img src="{{ asset('storage/img/' . $classroom->course->course_img) }}" alt="">
                                        <a href="#" class="btn">Read More</a>
                                    </div>
                                    <div class="info-bx text-center">
                                        <h5><a href="{{url('classroom/classroom_details/'.$classroom->id) }}">{{$classroom->course->course_name}}</a></h5>
                                        <span>{{$classroom->course->level->language->language_name}}</span>
                                    </div>
                                    <div class="cours-more-info">
                                        <div class="price">
                                            <h5>KS {{$classroom->fee}}</h5>
                                        </div>
                                        <a href="{{url('classrooms/classroom_details/'.$classroom->id) }}" class="btn">Read More</a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            
                            
                            <div class="col-lg-12 m-b20">
                                <div class="pagination-bx rounded-sm gray clearfix">
                                    <ul class="pagination">
                                        <li class="previous"><a href="#"><i class="ti-arrow-left"></i> Prev</a></li>
                                        <li class="active"><a href="#">1</a></li>
                                        <li><a href="#">2</a></li>
                                        <li><a href="#">3</a></li>
                                        <li class="next"><a href="#">Next <i class="ti-arrow-right"></i></a></li>
                                    </ul>
                                </div>
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