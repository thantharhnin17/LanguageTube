@extends('layouts.main_layout')

@section('title', 'Classroom Form')

@section('content')
<!-- Content -->
<div class="page-content bg-white">
    <!-- inner page banner -->
    <div class="page-banner ovbl-dark" style="background-image:url(assets/images/banner/banner2.jpg);">
        <div class="container">
            <div class="page-banner-entry">
                <h1 class="text-white">Classroom Form</h1>
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
                            <div class="card-body">
                                <h5 class="card-title">Our Payments</h5>
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
                                                <button onclick="copyText()">Copy</button><br>
                                                <span id="toggle-text" class="text-success" style="display: none;">Copied!</span>
                                            </td>

                                        </tr>
                                        @endforeach
                                        
                  
                                    </tbody>
                                    
                                </table>
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
