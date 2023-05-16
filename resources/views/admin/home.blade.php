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
                        <div class="ml-2">
                            <h4 class="wc-title">
                                Total Income
                            </h4>
                            <span class="wc-des">
                                Classroom Fee
                            </span>
                        </div>
                        <span class="wc-stats">
                            <span class="counter">{{ $integerFee }}</span> K
                        </span>		
                        
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

        <div class="row">
            <div class="col-12 m-b30">
                <div class="widget-box">
                    <form action="" method="get" class="px-3 py-2">
                        <div class="row align-items-baseline">
                            <div class="col-lg-4 col-12">
                                <h4>Monthly Student Enrollment</h4>
                            </div>
                                @csrf
                            <div class="col-lg-3 col-4">
                                <input type="text" placeholder="Start Month" id="start_month" onclick="this.type='month';" name="start_month" class="form form-control p-2">
                            </div>
        
                            <div class="col-lg-3 col-4">
                                <input type="text" placeholder="End Month" id="end_month" onclick="this.type='month';" name="end_month" class="form form-control p-2">
                            </div>
                            <div class="col-lg-2 col-4">
                                <button type="submit" class="btn btn-success" onclick="validateMonthRange(event);">Generate</button>
                            </div>
                            
                            @if(isset($monthly_customer))
                            <div class="col-12 text-center text-lora text-danger fw-bold">
                                <span>{{ $monthly_customer }}</span>
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
            <div class="col-lg-5 m-b30">
                <div class="widget-box">
                    <div class="wc-title">
                        <h4>New Users</h4>
                    </div>
                    <div class="widget-inner">
                        <div class="new-user-list">
                            <ul>
                                <li>
                                    <span class="new-users-pic">
                                        <img src="assets/images/testimonials/pic1.jpg" alt=""/>
                                    </span>
                                    <span class="new-users-text">
                                        <a href="#" class="new-users-name">Anna Strong </a>
                                        <span class="new-users-info">Visual Designer,Google Inc </span>
                                    </span>
                                    <span class="new-users-btn">
                                        <a href="#" class="btn button-sm outline">Follow</a>
                                    </span>
                                </li>
                                <li>
                                    <span class="new-users-pic">
                                        <img src="assets/images/testimonials/pic2.jpg" alt=""/>
                                    </span>
                                    <span class="new-users-text">
                                        <a href="#" class="new-users-name"> Milano Esco </a>
                                        <span class="new-users-info">Product Designer, Apple Inc </span>
                                    </span>
                                    <span class="new-users-btn">
                                        <a href="#" class="btn button-sm outline">Follow</a>
                                    </span>
                                </li>
                                <li>
                                    <span class="new-users-pic">
                                        <img src="assets/images/testimonials/pic1.jpg" alt=""/>
                                    </span>
                                    <span class="new-users-text">
                                        <a href="#" class="new-users-name">Nick Bold  </a>
                                        <span class="new-users-info">Web Developer, Facebook Inc </span>
                                    </span>
                                    <span class="new-users-btn">
                                        <a href="#" class="btn button-sm outline">Follow</a>
                                    </span>
                                </li>
                                <li>
                                    <span class="new-users-pic">
                                        <img src="assets/images/testimonials/pic2.jpg" alt=""/>
                                    </span>
                                    <span class="new-users-text">
                                        <a href="#" class="new-users-name">Wiltor Delton </a>
                                        <span class="new-users-info">Project Manager, Amazon Inc </span>
                                    </span>
                                    <span class="new-users-btn">
                                        <a href="#" class="btn button-sm outline">Follow</a>
                                    </span>
                                </li>
                                <li>
                                    <span class="new-users-pic">
                                        <img src="assets/images/testimonials/pic3.jpg" alt=""/>
                                    </span>
                                    <span class="new-users-text">
                                        <a href="#" class="new-users-name">Nick Stone </a>
                                        <span class="new-users-info">Project Manager, Amazon Inc  </span>
                                    </span>
                                    <span class="new-users-btn">
                                        <a href="#" class="btn button-sm outline">Follow</a>
                                    </span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Enrollment Chart -->
            @php
                // Generate a random color
                function getRandomColor() {
                $letters = '0123456789ABCDEF';
                $color = '#';
                for ($i = 0; $i < 6; $i++) {
                    $color .= $letters[random_int(0, 15)];
                }
                    return $color;
                }

                
                $course_labels = [];
                $course_values = [];
                $course_backgroundColor = [];
                $course_hoverBackgroundColor = [];

                foreach ($courseWithMostStudents as $courseWithMostStudent) {
                        array_push($course_labels, $courseWithMostStudent->course_name);
                        array_push($course_values,(int) $courseWithMostStudent->student_count);
                        array_push($course_backgroundColor, getRandomColor());
                        array_push($course_hoverBackgroundColor, getRandomColor());
                }
                
            @endphp
        

            <div class="col-lg-7 m-b30">
                <div class="widget-box">
                    <div class="wc-title">
                        <h4>Enrollment Chart</h4>
                    </div>
                    <div class="widget-inner">
                        <canvas id="enrollment-chart" width="400" height="200"></canvas>
                    </div>
                </div>
            </div>
            <!-- Enrollment Chart END-->
        </div>

        <div class="row">
            
            <!-- Popular Language Chart -->
            @php
                // Generate a random color

                $language_labels = [];
                $language_values = [];
                $language_backgroundColor = [];
                $language_hoverBackgroundColor = [];

                foreach ($languageWithMostStudents as $languageWithMostStudent) {
                    array_push($language_labels, $languageWithMostStudent->language_name);
                    array_push($language_values, $languageWithMostStudent->student_count);
                    array_push($language_backgroundColor, getRandomColor());
                    array_push($language_hoverBackgroundColor, getRandomColor());
                }
                    
            @endphp
            

            <div class="col-lg-4 m-b30">
                <div class="widget-box">
                    <div class="wc-title">
                        <h4>Popular Language</h4>
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
                        <h4>New Users</h4>
                    </div>
                    <div class="widget-inner">
                        <div class="new-user-list">
                            <ul>
                                <li>
                                    <span class="new-users-pic">
                                        <img src="assets/images/testimonials/pic1.jpg" alt=""/>
                                    </span>
                                    <span class="new-users-text">
                                        <a href="#" class="new-users-name">Anna Strong </a>
                                        <span class="new-users-info">Visual Designer,Google Inc </span>
                                    </span>
                                    <span class="new-users-btn">
                                        <a href="#" class="btn button-sm outline">Follow</a>
                                    </span>
                                </li>
                                <li>
                                    <span class="new-users-pic">
                                        <img src="assets/images/testimonials/pic2.jpg" alt=""/>
                                    </span>
                                    <span class="new-users-text">
                                        <a href="#" class="new-users-name"> Milano Esco </a>
                                        <span class="new-users-info">Product Designer, Apple Inc </span>
                                    </span>
                                    <span class="new-users-btn">
                                        <a href="#" class="btn button-sm outline">Follow</a>
                                    </span>
                                </li>
                                <li>
                                    <span class="new-users-pic">
                                        <img src="assets/images/testimonials/pic1.jpg" alt=""/>
                                    </span>
                                    <span class="new-users-text">
                                        <a href="#" class="new-users-name">Nick Bold  </a>
                                        <span class="new-users-info">Web Developer, Facebook Inc </span>
                                    </span>
                                    <span class="new-users-btn">
                                        <a href="#" class="btn button-sm outline">Follow</a>
                                    </span>
                                </li>
                                <li>
                                    <span class="new-users-pic">
                                        <img src="assets/images/testimonials/pic2.jpg" alt=""/>
                                    </span>
                                    <span class="new-users-text">
                                        <a href="#" class="new-users-name">Wiltor Delton </a>
                                        <span class="new-users-info">Project Manager, Amazon Inc </span>
                                    </span>
                                    <span class="new-users-btn">
                                        <a href="#" class="btn button-sm outline">Follow</a>
                                    </span>
                                </li>
                                <li>
                                    <span class="new-users-pic">
                                        <img src="assets/images/testimonials/pic3.jpg" alt=""/>
                                    </span>
                                    <span class="new-users-text">
                                        <a href="#" class="new-users-name">Nick Stone </a>
                                        <span class="new-users-info">Project Manager, Amazon Inc  </span>
                                    </span>
                                    <span class="new-users-btn">
                                        <a href="#" class="btn button-sm outline">Follow</a>
                                    </span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</main>
{{-- <script src="{{asset ('admin/js/charts.js')}}"></script> --}}

<script>
    const popular_chart = document.getElementById('popular_chart');
    new Chart(popular_chart, {
        type: 'pie',
        data: {
            labels: {!! json_encode($language_labels) !!},
            datasets: [{
                data: {!! json_encode($language_values) !!},
                backgroundColor: {!! json_encode($language_backgroundColor) !!},
                hoverBackgroundColor: {!! json_encode($language_hoverBackgroundColor) !!},
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

    const enrollment_chart = document.getElementById('enrollment-chart');
    new Chart(enrollment_chart, {
    type: 'bar',
    data: {
        labels: {!! json_encode($course_labels) !!},
        datasets: [{
        label: 'Enrollment',
        data: {!! json_encode($course_values) !!},
        backgroundColor: {!! json_encode($course_backgroundColor) !!},
        borderColor: {!! json_encode($course_hoverBackgroundColor) !!},
        borderWidth: 1
        }]
    },
    options: {
        scales: {
        y: {
            beginAtZero: true, // Start the y-axis at 0
            type: 'linear', // Use linear scale type for numeric values
            ticks: {
                stepSize: 1, // Adjust the step size according to your data
            }
        }
        }
    }
    });



   
    
    
</script>

@endsection