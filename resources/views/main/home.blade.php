@extends('layouts.main_layout')

@section('title', 'Home Page')

@section('content')
<!-- Content -->
<div class="page-content bg-white">
    <!-- Main Slider -->
    <div class="section-area section-sp1 ovpr-dark bg-fix online-cours" style="background-image:url({{ asset('frontend/images/background/bg1.jpg')}});">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center text-white">
                        <h2>Online Language Courses To Learn</h2>
                        <h5>Own Your Feature Learning New Skills Online</h5>
                        
                    </div>
                </div>
                <div class="mw800 m-auto">
                    <div class="row">
                        @foreach($languages as $language)
                        <div class="col-md-3 col-sm-6">
                            <div class="cours-search-bx m-b30">
                                <div class="icon-box">
                                    <h3><i class="fa-solid fa-earth-americas"></i></h3>
                                </div>
                                <span class="cours-search-text">{{$language->language_name}}</span>
                            </div>
                        </div>
                        @endforeach
                        
                        
                    </div>
                </div>
            </div>
        </div>
    <!-- Main Slider -->
    <div class="content-block">
        <!-- Latest Courses -->
        <div class="section-area section-sp2 latest-courses-bx">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 heading-bx left">
                        <h2 class="title-head">Latest <span>Courses</span></h2>
                    </div>
                </div>
                <div class="row">
                    @foreach($classrooms as $classroom)
                    <div class="item col-12 col-md-4 col-lg-3">
                        <div class="cours-bx">
                            <div class="action-box">
                                <img src="{{ asset('storage/img/' . $classroom->course->course_img) }}" alt="">
                                
                            </div>
                            <div class="info-bx text-center">
                                <h5><a href="{{url('classrooms/classroom_details/'.$classroom->id) }}">{{$classroom->course->course_name}}</a></h5>
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
                                    <h5>KS {{number_format($classroom->fee)}}</h5>
                                </div>
                                <a href="{{url('classrooms/classroom_details/'.$classroom->id) }}" class="btn">Read More</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
               
                </div>
                <div class="row mt-4 justify-content-center">
                    <a href="{{url('classrooms')}}" class="btn button-md d-flex align-items-center">All Classroom <i class="ti-angle-double-right"></i></a>
                </div>
            </div>
        </div>
        <!-- Latest Courses END -->
        <div class="section-area section-sp2 bg-fix ovbl-dark join-bx text-center" style="background-image:url(assets/images/background/bg1.jpg);">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="join-content-bx text-white">
                            <h2>Learn a new skill online on <br> your time</h2>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Form END -->
        <!-- Teacher Recruitment -->
        <div class="section-area section-sp2 latest-courses-bx">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 heading-bx left">
                        <h2 class="title-head">Teacher <span>Recruitment</span></h2>
                    </div>
                </div>
                <div class="row p-lr0">

                    @foreach($recruits as $recruit)
                    <div class="item col-12 col-md-6 col-lg-4">
                        <div class="cours-bx">
                            <div class="action-box">
                                <img src="{{ asset('storage/img/' . $recruit->recruit_img) }}" alt="">
                                
                            </div>
                            <div class="info-bx text-center">
                                <h5><a href="#">{{$recruit->title}} - {{$recruit->language->language_name}}</a></h5>
                                <span>{{$recruit->language->language_name}}</span>
                            </div>
                            <div class="cours-more-info">
                                <div class="price">
                                    <h5></h5>
                                </div>
                                <a href="{{url('recruits/recruit_details/'.$recruit->id) }}" class="btn">Read More</a>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
                <div class="row mt-4 justify-content-center">
                    <a href="{{url('recruits')}}" class="btn button-md d-flex align-items-center">All Recruitment <i class="ti-angle-double-right"></i></a>
                </div>
            </div>
        </div>
        <!-- Latest Courses END -->
        
        <!-- Testimonials -->
        <div class="section-area section-sp1 bg-fix ovbl-dark text-white" style="background-image:url(assets/images/background/bg1.jpg);">
            <div class="container">
                <div class="row">
                        <div class="col-lg-3 col-md-6 col-sm-6 col-6 m-b30">
                            <div class="counter-style-1">
                                <div class="text-white">
                                    <span class="counter">3000</span><span>+</span>
                                </div>
                                <span class="counter-text">Completed Projects</span>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-6 m-b30">
                            <div class="counter-style-1">
                                <div class="text-white">
                                    <span class="counter">2500</span><span>+</span>
                                </div>
                                <span class="counter-text">Happy Clients</span>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-6 m-b30">
                            <div class="counter-style-1">
                                <div class="text-white">
                                    <span class="counter">1500</span><span>+</span>
                                </div>
                                <span class="counter-text">Questions Answered</span>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-6 m-b30">
                            <div class="counter-style-1">
                                <div class="text-white">
                                    <span class="counter">1000</span><span>+</span>
                                </div>
                                <span class="counter-text">Ordered Coffee's</span>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
        <!-- Testimonials END -->
        
    </div>
    <!-- contact area END -->
</div>
<!-- Content END-->
@endsection