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
                        <div class="course-detail-bx language-bx">
                            <h4>Class By Languages</h4>
                            <div class="feature-filters ml-auto">
                                <ul class="filters" data-toggle="buttons">
                                    <li data-filter="" class="btn active">
                                        <input type="radio">
                                        <a href="#"><span>All Courses</span></a>
                                    </li>
                                    @foreach($languages as $language)
                                        <li data-filter="{{$language->language_name}}" class="btn">
                                            <input type="radio">
                                            <a href="#"><span>{{$language->language_name}}</span></a>
                                        </li>
                                    @endforeach
                                    
                                </ul>
                            </div>
                                
                        </div>
                        
                    </div>
                    <div class="col-lg-9 col-md-8 col-sm-12">
                        <ul id="masonry" class="ttr-gallery-listing magnific-image row">
                            @foreach($classrooms as $classroom)
                            <li class="action-card mb-4 col-xl-4 col-lg-6 col-md-12 col-sm-6 {{ $classroom->course->level->language->language_name }}">
                                <div class="cours-bx">
                                    <div class="action-box">
                                        <img src="{{ asset('storage/img/' . $classroom->course->course_img) }}"
                                            alt="">

                                    </div>
                                    <div class="info-bx text-center">
                                        <h5><a
                                                href="{{ url('classrooms/classroom_details/' . $classroom->id) }}">{{ $classroom->course->course_name }}</a>
                                        </h5>
                                        <span>
                                            @if ($classroom->class_type == 0)
                                                On-Campus
                                            @else
                                                Online
                                            @endif
                                        </span><br>
                                        <span>
                                            {{$classroom->batch->batch_name}}
                                        </span>
                                    </div>
                                    <div class="cours-more-info">
                                        <div class="price">
                                            <h5>KS {{ $classroom->fee }}</h5>
                                        </div>
                                        <a href="{{url('classrooms/classroom_details/'.$classroom->id) }}" class="btn">Read More</a>
                                    </div>
                                </div>
                            </li>
                            @endforeach


                        </ul>

                        {{ $classrooms->links('layouts.paginationlinks') }}

                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- contact area END -->
    
</div>
<!-- Content END-->
@endsection