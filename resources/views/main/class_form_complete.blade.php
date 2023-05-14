@extends('layouts.main_layout')

@section('title', 'Classroom Form')

@section('content')
<!-- Content -->
<div class="page-content bg-white">
    <!-- inner page banner -->
    <div class="page-banner ovbl-dark" style="background-image:url(assets/images/banner/banner2.jpg);">
        <div class="container">
            <div class="page-banner-entry">
                <h1 class="text-white">Classroom Purchasment Complete</h1>
             </div>
        </div>
    </div>
    <!-- Breadcrumb row -->
    <div class="breadcrumb-row">
        <div class="container">
            <ul class="list-inline">
                <li><a href="{{url('/')}}">Home</a></li>
                <li><a href="{{url('classrooms')}}">Classrooms</a></li>
                <li><a href="{{url('classrooms')}}">Classroom Detail</a></li>
                <li>Classroom Form</li>
            </ul>
        </div>
    </div>
    <!-- Breadcrumb row END -->
    <!-- inner page banner END -->
    <div class="content-block">
        <!-- About Us -->
        <div class="section-area section-sp1">
            <div class="container">
                <div class="row d-flex justify-content-center align-items-center">
                    <div class="col-lg-8 col-xl-6">
                      <div class="card rounded-3">
                        <div class="card-body p-4 p-md-5">
                          <h3 class="mb-4 pb-2 pb-md-0 mb-md-5 px-md-2 text-center text-success">Classroom Parchasement Is Completed</h3>
              
                          @if(session('success'))
                              <div class="alert alert-success">{{session('success')}}</div>
                          @endif
          
                          <div class="d-flex justify-content-center">
                              <a href="/" >
                                <i class="fa fa-home"></i>
                                  Back To Home
                              </a>
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
@endsection
