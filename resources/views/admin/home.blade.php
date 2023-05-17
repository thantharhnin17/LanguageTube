@extends('layouts.admin_layout')
@section('title', 'Dashboard')
@section('content')
<main class="ttr-wrapper">
    <div class="container-fluid">
        <div class="db-breadcrumb">
            <h4 class="breadcrumb-title">Dashboard</h4>
            <ul class="db-breadcrumb-list">
                <li><a href="{{url('admin/home')}}"><i class="fa fa-home"></i>Home</a></li>
                <li>Dashboard</li>
            </ul>
        </div>	
        <!-- Card -->
        <div class="row">
            <div class="col-md-6 col-lg-3 col-xl-3 col-sm-6 col-12">
                <div class="widget-card widget-bg1">					 
                    <div class="wc-item">
                        <div class="wc-icon">
                            <i class="fa-solid fa-dollar-sign"></i>
                        </div>
                        <div>
                            <span class="wc-stats d-block">
                                <span class="counter">{{ $integerFee }}</span> K
                            </span>	
                            <div class="">
                                <h4 class="wc-title">
                                    Total Income
                                </h4>
                            </div>
                        </div>
                        	
                        
                    </div>				      
                </div>
            </div>
            <div class="col-md-6 col-lg-3 col-xl-3 col-sm-6 col-12">
                <div class="widget-card widget-bg3">					 
                    <div class="wc-item">
                        <div class="wc-icon">
                            <i class="fa-solid fa-users-rectangle"></i>
                        </div>
                        <div class="ml-2">
                            <h4 class="wc-title">
                                All Classrooms
                            </h4>
                            <span class="wc-des">
                                Language & Courses
                            </span>
                        </div>
                        <span class="wc-stats">
                            <span class="counter">{{ $classroomCount }}</span>
                        </span>		
                        
                    </div>				      
                </div>
            </div>
            <div class="col-md-6 col-lg-3 col-xl-3 col-sm-6 col-12">
                <div class="widget-card widget-bg2">					 
                    <div class="wc-item">
                        <div class="wc-icon">
                            <i class="fa-solid fa-chalkboard-user"></i>
                        </div>
                        <div class="ml-2">
                            <h4 class="wc-title">
                                All Recruitments
                            </h4>
                            <span class="wc-des">
                                Teacher For Classroom
                            </span>
                        </div>
                        <span class="wc-stats">
                            <span class="counter">{{ $recruitCount }}</span>
                        </span>		
                        
                    </div>					      
                </div>
            </div>
            <div class="col-md-6 col-lg-3 col-xl-3 col-sm-6 col-12">
                <div class="widget-card widget-bg4">	
                    <div class="wc-item">
                        <div class="wc-icon">
                            <i class="fa-solid fa-user"></i>
                        </div>
                        <div class="ml-2">
                            <h4 class="wc-title">
                                All Users
                            </h4>
                            <span class="wc-des">
                                Accounts
                            </span>
                        </div>
                        <span class="wc-stats">
                            <span class="counter">{{ $userCount }}</span>
                        </span>		
                        
                    </div>					 
                    			      
                </div>
            </div>
        </div>
        <!-- Card END -->

        {{-- Monthly Student Enrollment --}}
        <div class="row">
            <div class="col-12 m-b30">
                <div class="widget-box">
                    <form action="{{route('dashboard.monthly_student')}}" method="GET" enctype="multipart/form-data" class="px-3 py-2">
                        <div class="row align-items-baseline">
                            <div class="col-lg-4 col-12">
                                <h4>Monthly Student Enrollment</h4>
                            </div>
                                @csrf
                                @method('GET')
                            <div class="col-lg-3 col-4">
                                <input type="text" placeholder="Start Month" id="start_month" onclick="this.type='month';" name="start_month" class="form form-control p-2">
                            </div>
        
                            <div class="col-lg-3 col-4">
                                <input type="text" placeholder="End Month" id="end_month" onclick="this.type='month';" name="end_month" class="form form-control p-2">
                            </div>
                            <div class="col-lg-2 col-4">
                                <button type="submit" class="btn btn-success" onclick="validateMonthRange(event);">Generate</button>
                            </div>
                            
                            @if(isset($monthly_student))
                            <div class="col-12 text-center text-lora text-danger fw-bold">
                                <span>{{ $monthly_student }}</span>
                              </div>
                              @endif             
                        </div>
        
        
                        <script>
                        function validateMonthRange(event) {
                            // Get the value of the start date and end date input elements
                            var startMonth = document.getElementById("start_month").value;
                            var endMonth = document.getElementById("end_month").value;
        
                            // Convert the date strings to Date objects
                            var start = new Date(startMonth);
                            var end = new Date(endMonth);
        
                            // Compare the dates
                            if (end < start) {
                                // If the end date is less than the start date, prevent the form from being submitted
                                event.preventDefault();
                                alert("End Month cannot be less than start month.");
                            }
                        }
                        </script>
        
        
        
        
                    </form>
                    
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Enrollment Chart -->
            @php
                // Generate a random color
                
                
                $course_labels = [];
                $course_values = [];

                foreach ($courseWithMostStudents as $courseWithMostStudent) {
                        array_push($course_labels, $courseWithMostStudent->course_name);
                        array_push($course_values,(int) $courseWithMostStudent->student_count);
                }

                // dd(json_encode($course_labels));               
            @endphp
        

            <div class="col-lg-12 m-b30">
                <div class="widget-box">
                    <div class="wc-title">
                        <h4>Student Enrollment Chart</h4>
                    </div>
                    <div class="widget-inner">
                        <canvas id="enrollment-chart" width="400" height="100"></canvas>
                    </div>
                </div>
            </div>
            <!-- Enrollment Chart END-->
            
            <!-- Enrollment Tabel -->
            <div class="col-12 m-b30">
                <div class="widget-box">
                    <div class="wc-title">
                        <h4>Student Enrollment Table</h4>
                    </div>
                    <div class="widget-inner">
                        <table id="example" class="table table-hover">
                            <thead class="thead-light">
                            <tr>
                              <th>#</th>
                              <th>Courses</th>
                              <th>No of enrollment</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $no=1; ?>
                                @foreach ($courseWithMostStudents as $courseWithMostStudent)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$courseWithMostStudent->course_name}}</td>
                                    <td>{{$courseWithMostStudent->student_count}}</td>
                                    
                                </tr>   
                                @endforeach
                                
          
                            </tbody>
                            
                        </table>
                    </div>
                </div>
            </div>
            <!-- Enrollment Tabel END-->

        </div>
        {{-- Monthly Student Enrollment End --}}

        {{-- Monthly Popular Language --}}
        <div class="row">
            <div class="col-12 m-b30">
                <div class="widget-box">
                    <form action="{{route('dashboard.monthly_language')}}" method="GET" enctype="multipart/form-data" class="px-3 py-2">
                        <div class="row align-items-baseline">
                            <div class="col-lg-4 col-12">
                                <h4>Monthly Popular Language</h4>
                            </div>
                                @csrf
                                @method('GET')
                            <div class="col-lg-3 col-4">
                                <input type="text" placeholder="Start Month" id="start_month" onclick="this.type='month';" name="start_month" class="form form-control p-2">
                            </div>
        
                            <div class="col-lg-3 col-4">
                                <input type="text" placeholder="End Month" id="end_month" onclick="this.type='month';" name="end_month" class="form form-control p-2">
                            </div>
                            <div class="col-lg-2 col-4">
                                <button type="submit" class="btn btn-success" onclick="validateMonthRange(event);">Generate</button>
                            </div>
                            
                            @if(isset($monthly_student))
                            <div class="col-12 text-center text-lora text-danger fw-bold">
                                <span>{{ $monthly_student }}</span>
                              </div>
                              @endif             
                        </div>
        
        
                        <script>
                        function validateMonthRange(event) {
                            // Get the value of the start date and end date input elements
                            var startMonth = document.getElementById("start_month").value;
                            var endMonth = document.getElementById("end_month").value;
        
                            // Convert the date strings to Date objects
                            var start = new Date(startMonth);
                            var end = new Date(endMonth);
        
                            // Compare the dates
                            if (end < start) {
                                // If the end date is less than the start date, prevent the form from being submitted
                                event.preventDefault();
                                alert("End Month cannot be less than start month.");
                            }
                        }
                        </script>
        
                    </form>
                    
                </div>
            </div>
        </div>

        <div class="row">
            
            <!-- Popular Language Chart -->
            @php

                $language_labels = [];
                $language_values = [];

                foreach ($languageWithMostStudents as $languageWithMostStudent) {
                    array_push($language_labels, $languageWithMostStudent->language_name);
                    array_push($language_values, $languageWithMostStudent->student_count);
                }
                    
            @endphp
            

            <div class="col-lg-4 m-b30">
                <div class="widget-box">
                    <div class="wc-title">
                        <h4>Popular Language Chart</h4>
                    </div>
                    <div class="widget-inner">
                        <canvas id="popular_chart" width="100" height="100"></canvas>
                    </div>
                </div>
            </div>
            <!-- Popular Language Chart -->

            <div class="col-lg-8 m-b30">
                <div class="widget-box">
                    <div class="wc-title">
                        <h4>Popular Language Table</h4>
                    </div>
                    <div class="widget-inner">
                        <table id="example" class="table table-hover">
                            <thead class="thead-light">
                            <tr>
                              <th>#</th>
                              <th>Languages</th>
                              <th>No of Student</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $no=1; ?>
                                @foreach ($languageWithMostStudents as $languageWithMostStudent)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$languageWithMostStudent->language_name}}</td>
                                    <td>{{$languageWithMostStudent->student_count}}</td>
                                    
                                </tr>   
                                @endforeach
                                
          
                            </tbody>
                            
                        </table>
                    </div>
                </div>
            </div>
        </div>
        {{-- Monthly Popular Language End --}}

        {{-- Number of Teachers --}}
        <div class="row">
            <div class="col-12 m-b30">
                <div class="widget-box p-2">
                    <h4>Number of Teachers</h4>
                </div>
            </div>
        </div>

        <div class="row">
            
            <!-- Teacher Chart -->
            @php

                $teacher_labels = [];
                $teacher_values = [];

                foreach ($teacherReports as $teacherReport) {
                    array_push($teacher_labels, $teacherReport->language_name);
                    array_push($teacher_values, $teacherReport->teacher_count);
                }
                    
            @endphp
            
            <div class="col-lg-4 m-b30">
                <div class="widget-box">
                    <div class="wc-title">
                        <h4>Teacher Table</h4>
                    </div>
                    <div class="widget-inner">
                        <table id="example" class="table table-hover">
                            <thead class="thead-light">
                            <tr>
                              <th>#</th>
                              <th>Languages</th>
                              <th>No of Teachers</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $no=1; ?>
                                @foreach ($teacherReports as $teacherReport)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$teacherReport->language_name}}</td>
                                    <td>{{$teacherReport->teacher_count}}</td>
                                    
                                </tr>   
                                @endforeach
                                
          
                            </tbody>
                            
                        </table>
                    </div>
                </div>
            </div>

            <!-- Teacher Chart -->
            <div class="col-lg-8 m-b30">
                <div class="widget-box">
                    <div class="wc-title">
                        <h4>Teacher Chart</h4>
                    </div>
                    <div class="widget-inner">
                        <canvas id="teacher-chart" width="400" height="200"></canvas>
                    </div>
                </div>
            </div>
            <!-- Teacher Chart End -->

        </div>
        {{-- Number of Teachers End --}}

    </div>
</main>
{{-- <script src="{{asset ('admin/js/charts.js')}}"></script> --}}

<script>
    var enrollChart = document.getElementById('enrollment-chart').getContext('2d');
    new Chart(enrollChart, {
        type: 'bar',
        data: {
            labels: {!! json_encode($course_labels) !!},
            datasets: [{
                label: 'Monthly Student Enrollment Report',
                data: {!! json_encode($course_values) !!},
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });

    const popular_chart = document.getElementById('popular_chart').getContext('2d');
    new Chart(popular_chart, {
        type: 'pie',
        data: {
            labels: {!! json_encode($language_labels) !!},
            datasets: [{
                data: {!! json_encode($language_values) !!},
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                hoverBackgroundColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    var teacherChart = document.getElementById('teacher-chart').getContext('2d');
    new Chart(teacherChart, {
        type: 'bar',
        data: {
            labels: {!! json_encode($teacher_labels) !!},
            datasets: [{
                label: 'Number Of Teachers',
                data: {!! json_encode($teacher_values) !!},
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
    
    
</script>

@endsection