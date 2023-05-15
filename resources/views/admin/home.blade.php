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
                            <i class="fa-solid fa-dollar-sign"></i>
                        </div>
                        <div class="ml-2">
                            <h4 class="wc-title">
                                All Classrooms
                            </h4>
                            <span class="wc-des">
                                Classroom Fee
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
                            <i class="fa-solid fa-dollar-sign"></i>
                        </div>
                        <div class="ml-2">
                            <h4 class="wc-title">
                                All Recruitments
                            </h4>
                            <span class="wc-des">
                                Classroom Fee
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
                            <i class="fa-solid fa-dollar-sign"></i>
                        </div>
                        <div class="ml-2">
                            <h4 class="wc-title">
                                All Users
                            </h4>
                            <span class="wc-des">
                                Classroom Fee
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
            <!-- Your Profile Views Chart -->
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
                        array_push($course_values, $courseWithMostStudent->student_count);
                        array_push($course_backgroundColor, getRandomColor());
                        array_push($course_hoverBackgroundColor, getRandomColor());
                }
                
        @endphp
        

            <div class="col-lg-8 m-b30">
                <div class="widget-box">
                    <div class="wc-title">
                        <h4>Your Profile Views</h4>
                    </div>
                    <div class="widget-inner">
                        <canvas id="course_chart" width="100" height="45"></canvas>
                    </div>
                </div>
            </div>
            <!-- Your Profile Views Chart END-->

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
            
            <div class="col-lg-6 m-b30">
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
            <div class="col-lg-6 m-b30">
                <div class="widget-box">
                    <div class="wc-title">
                        <h4>Orders</h4>
                    </div>
                    <div class="widget-inner">
                        <div class="orders-list">
                            <ul>
                                <li>
                                    <span class="orders-title">
                                        <a href="#" class="orders-title-name">Anna Strong </a>
                                        <span class="orders-info">Order #02357 | Date 12/08/2019</span>
                                    </span>
                                    <span class="orders-btn">
                                        <a href="#" class="btn button-sm red">Unpaid</a>
                                    </span>
                                </li>
                                <li>
                                    <span class="orders-title">
                                        <a href="#" class="orders-title-name">Revenue</a>
                                        <span class="orders-info">Order #02357 | Date 12/08/2019</span>
                                    </span>
                                    <span class="orders-btn">
                                        <a href="#" class="btn button-sm red">Unpaid</a>
                                    </span>
                                </li>
                                <li>
                                    <span class="orders-title">
                                        <a href="#" class="orders-title-name">Anna Strong </a>
                                        <span class="orders-info">Order #02357 | Date 12/08/2019</span>
                                    </span>
                                    <span class="orders-btn">
                                        <a href="#" class="btn button-sm green">Paid</a>
                                    </span>
                                </li>
                                <li>
                                    <span class="orders-title">
                                        <a href="#" class="orders-title-name">Revenue</a>
                                        <span class="orders-info">Order #02357 | Date 12/08/2019</span>
                                    </span>
                                    <span class="orders-btn">
                                        <a href="#" class="btn button-sm green">Paid</a>
                                    </span>
                                </li>
                                <li>
                                    <span class="orders-title">
                                        <a href="#" class="orders-title-name">Anna Strong </a>
                                        <span class="orders-info">Order #02357 | Date 12/08/2019</span>
                                    </span>
                                    <span class="orders-btn">
                                        <a href="#" class="btn button-sm green">Paid</a>
                                    </span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 m-b30">
                <div class="widget-box">
                    <div class="wc-title">
                        <h4>Basic Calendar</h4>
                    </div>
                    <div class="widget-inner">
                        <div id="calendar"></div>
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


    const courseChart = document.getElementById('course_chart');
  const labels = ['January', 'February', 'March', 'April', 'May', 'June', 'July'];
  const data = {
    labels: labels,
    datasets: [{
      label: 'My First Dataset',
      data: [65, 59, 80, 81, 56, 55, 40],
      backgroundColor: [
        'rgba(255, 99, 132, 0.2)',
        'rgba(255, 159, 64, 0.2)',
        'rgba(255, 205, 86, 0.2)',
        'rgba(75, 192, 192, 0.2)',
        'rgba(54, 162, 235, 0.2)',
        'rgba(153, 102, 255, 0.2)',
        'rgba(201, 203, 207, 0.2)'
      ],
      borderColor: [
        'rgb(255, 99, 132)',
        'rgb(255, 159, 64)',
        'rgb(255, 205, 86)',
        'rgb(75, 192, 192)',
        'rgb(54, 162, 235)',
        'rgb(153, 102, 255)',
        'rgb(201, 203, 207)'
      ],
      borderWidth: 1
    }]
  };

  var chart = new Chart(courseChart, {
    type: 'bar',
    data: data,
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });	
</script>

@endsection