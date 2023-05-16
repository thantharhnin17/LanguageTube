@extends('layouts.main_layout')

@section('title', 'Student List')

@section('content')
<!-- Content -->
<div class="page-content bg-white">
    <!-- inner page banner -->
    <div class="page-banner ovbl-dark" style="background-image:url(assets/images/banner/banner2.jpg);">
        <div class="container">
            <div class="page-banner-entry">
                <h1 class="text-white">Student List</h1>
             </div>
        </div>
    </div>
    <!-- Breadcrumb row -->
    <div class="breadcrumb-row">
        <div class="container">
            <ul class="list-inline">
                <li><a href="{{url('/')}}">Home</a></li>
                <li><a href="{{route('user.profile', ['id' => Auth::user()->id])}}">Profile</a></li>
                <li>Student List</li>
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
                
                    <div class="col-lg-12 m-b30">
                        <div class="widget-box">
                            <div class="wc-title">
                                <h4>All Students</h4>
    
                            </div>
                            <div class="widget-inner">
                                <table id="example" class="table table-hover">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Age</th>
                                            <th>Gender</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        @foreach ($students as $student)
                                            @foreach ($paymentConfirms as $paymentConfirm)
                                                @if ($paymentConfirm->payment->classroomStudent->user_id == $student->id && $paymentConfirm->payment->classroomStudent->classroom_id == $classroom->id && $paymentConfirm->confirmStatus == 'Accepted')
                                                
                                                <tr>
                                                    <td>{{ $no++ }}</td>
                                                    <td>{{ $student->name }}</td>
                                                    <td>{{ $student->email }}</td>
                                                    <td>{{ $student->phone }}</td>
                                                    <td>
                                                        @php
                                                            $dob = \Carbon\Carbon::parse($student->dob);
                                                        @endphp
                                                        {{ $dob->diffInYears(\Carbon\Carbon::now()) }}
                                                    </td>
                                                    <td>{{$student->gender}}</td>
                                                    
                                                </tr>
                                                @endif
                                            @endforeach
                                        @endforeach
    
    
                                    </tbody>
    
                                </table>
                                <a href="{{ redirect()->back()->getTargetUrl() }}" class="btn btn-secondary float-right"><i class="fa fa-home"></i> Back</a>
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