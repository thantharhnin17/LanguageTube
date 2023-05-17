@extends('layouts.main_layout')

@section('title', 'Classroom Form')

@section('content')
<!-- Content -->
<div class="page-content bg-white">
    <!-- inner page banner -->
    <div class="page-banner ovbl-dark" style="background-image:url(assets/images/banner/banner2.jpg);">
        <div class="container">
            <div class="page-banner-entry">
                <h1 class="text-white">Classroom Purchase For {{$classroom->course->course_name}}</h1>
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
                 <div class="row d-flex">
                
                    <div class="col-lg-6 col-md-6 col-sm-12 m-b30">
                        <div class="card">
                            <img class="card-img-top" src="{{ asset('storage/img/' . $classroom->course->course_img) }}" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title text-center">Our Payments</h5>
                                <table id="example" class="table table-hover">
                                    <thead class="thead-light">
                                        <tr>
                                          <th>Logo</th>
                                          <th>Account Name</th>
                                          <th>Account Number</th>
                                          <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($payments as $payment)
                                        <tr>
                                            <td><img src="{{ asset('storage/img/' . $payment->logo) }}" width="50px" height="50px" /></td>
                                            <td>{{$payment->accName}}</td>
                                            <td>
                                                <p id="copy-text">{{ $payment->accNo }}</p>
                                            </td>
                                            <td>
                                                <button class="copyBtn" onclick="copyText()">Copy</button><br>
                                                <span id="toggle-text" class="copyTxt text-success" style="display: none;">Copied!</span>
                                            </td>

                                        </tr>
                                        @endforeach
                                        
                  
                                    </tbody>
                                    
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-12 m-b30 class-form">
                        <div class="course-detail-bx">
                            
                            <div class="">
                                <h4 class="text-center">Your Payment</h4>
                                <form method="POST" action="{{route('classroom.purchase',$classroom->id)}}" class="payment-form" enctype="multipart/form-data">
                                    @csrf
                                    @method('POST')

                                    <input name="user_id" type="hidden" value="{{ Auth::user()->id }}">
                                    <input type="hidden" name="classroom_id" value="{{$classroom->id}}">

                                    <div class="row mb-3">
                                        <div class="col-lg-4 col-12"><label class="col-form-label">Classroom</label></div>
                                        <div class="col-lg-8 col-12">{{$classroom->course->course_name}}</div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-lg-4 col-12"><label class="col-form-label">Classroom Fee</label></div>
                                        <div class="col-lg-8 col-12">KS {{number_format($classroom->fee)}}</div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-lg-4 col-12"><label for="">Payment Type</label></div>
                                        <div class="col-lg-8 col-12">
                                            <select class="form-control" id="payment_method_id" name="payment_method_id">
                                                <option selected value="">Choose Payment Method</option>
                                                @foreach ($payments as $payment)
                                                  <option value="{{ $payment->id }}" {{ old('payment_method_id') == "$payment->id" ? 'selected' : '' }}>
                                                    {{ $payment->payName }}
                                                  </option>
                                                @endforeach 
                                            </select>
                                            <span class="help-inline">@error('payment_method_id'){{$message}}@enderror</span>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-lg-4 col-12"><label class="col-form-label">Payment Photo</label></div>
                                        <div class="col-lg-8 col-12">
                                            <input name="payImg" type="file" class="form-control-file" value="{{old('payImg')}}">
                                            <span class="help-inline">@error('payImg'){{$message}}@enderror</span>
                                        </div>
                                    </div>

                                    

                                    	
                                    <div class="course-buy-now text-center">
                                            <button type="submit" class="btn radius-xl text-uppercase">Purchase Now</button>
                                    </div>

                                </form>

                            </div>

                            
                        </div>
                    </div>

                    
                    
                </div>
            </div>
        </div>
    </div>
    <!-- contact area END -->
    <script src="{{asset ('admin/js/class_form.js')}}"></script>  
</div>
@endsection
