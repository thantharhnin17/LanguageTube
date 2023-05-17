@extends('layouts.main_layout')

@section('title', 'Recruitform')

@section('content')
<!-- Content -->
<div class="page-content bg-white">
    <!-- inner page banner -->
    <div class="page-banner ovbl-dark" style="background-image:url(assets/images/banner/banner2.jpg);">
        <div class="container">
            <div class="page-banner-entry">
                <h1 class="text-white">Recruitment Form Complete</h1>
             </div>
        </div>
    </div>
    <!-- Breadcrumb row -->
    <div class="breadcrumb-row">
        <div class="container">
            <ul class="list-inline">
                <li><a href="{{url('/')}}">Home</a></li>
                <li><a href="{{url('recruits')}}">Recruitments</a></li>
                {{-- <li><a href="{{url('recruits/recruit_details/'.$recruit_id) }}}">Recruitment Details</a></li> --}}
                <li>Recruitment Form Complete</li>
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
              
                        @if(isset($error_message))
                            <div class="alert alert-danger">
                                <h3 class="mb-4 pb-2 pb-md-0 mb-md-5 px-md-2 text-center text-success">
                                    {{$error_message}}
                                </h3>
                            </div>
                          @endif
                          @if(isset($success_message))
                            <div class="alert alert-danger">
                                <h3 class="mb-4 pb-2 pb-md-0 mb-md-5 px-md-2 text-center text-success">
                                    {{$success_message}}
                                </h3>
                            </div>
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
