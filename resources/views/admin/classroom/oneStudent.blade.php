@extends('layouts.admin_layout')
@section('title', 'Student Profile')
@section('content')
    <!--Main container start -->
    <main class="ttr-wrapper">
        <div class="container-fluid">
            <div class="db-breadcrumb">
                <h4 class="breadcrumb-title">Student Profile</h4>
                <ul class="db-breadcrumb-list">
                    <li><a href="{{ url('admin/home') }}"><i class="fa fa-home"></i>Home</a></li>
                    <li><a href="{{ url('admin/classroom') }}"><i class="fa fa-home"></i>Classrooms</a></li>
                    <li>Student Profile</li>
                </ul>
            </div>
            <div class="row">
                <!-- Your Profile Views Chart -->
                <div class="col-lg-12 m-b30">
                    <div class="widget-box">
                        <div class="wc-title">
                            <h4>Student Profile</h4>
                        </div>
                        <div class="widget-inner widget-inner-create">
                            <div class="card r-overview">
                                <div class="row">

                                    <div class="col-lg-6 col-12">
                                        <div class="row mb-3">
                                            <div class="col-12 col-md-3">Profile</div>
                                            <div class="col-12 col-md-9"><img src="{{ asset('storage/img/' . $student->photo) }}"
                                                    width="100px" height="100px" /></div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-12 col-md-3">Name</div>
                                            <div class="col-12 col-md-9">{{ $student->name }}</div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-12 col-md-3">Email</div>
                                            <div class="col-12 col-md-9">{{ $student->email }}</div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-12 col-md-3">Phone</div>
                                            <div class="col-12 col-md-9">{{ $student->phone }}</div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-12 col-md-3">Age</div>
                                            <div class="col-12 col-md-9">@php
                                                $dob = \Carbon\Carbon::parse($student->dob);
                                            @endphp
                                                {{ $dob->diffInYears(\Carbon\Carbon::now()) }}</div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-12 col-md-3">Gender</div>
                                            <div class="col-12 col-md-9">{{ $student->gender }}</div>
                                        </div>
        
                                        <div class="row mb-3">
                                            <div class="col-12 col-md-3">Classroom</div>
                                            <div class="col-12 col-md-9">{{ $classroom->course->course_name }}</div>
                                        </div>
        
                                        <div class="row mb-3">
                                            <div class="col-12 col-md-3">Classroom Fee</div>
                                            <div class="col-12 col-md-9">KS {{number_format($classroom->fee)}}</div>
                                        </div>
        
                                        @foreach ($payments as $payment)
                                            @if ($payment->classroomStudent->user_id == $student->id && $payment->classroomStudent->classroom_id == $classroom->id )
                                            <div class="row mb-3">
                                                <div class="col-12 col-md-3">Payment Type</div>
                                                <div class="col-12 col-md-9">{{ $payment->paymentMethod->payName }}</div>
                                            </div>
                                            @endif
                                        @endforeach
                                    </div>

                                    <div class="col-lg-6 col-12">
                                        <div class="row mb-3">
                                            <div class="col-12">Parchase Photo</div>
                                            <div class="col-12">
                                                <img src="{{ asset('storage/img/' . $payment->payImg) }}" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                


                            <div class="row my-3">
                                <div class="col-12 d-flex justify-content-end">
                                    <a href="{{ redirect()->back()->getTargetUrl() }}" class="btn btn-secondary">Back</a>
                                    <form action="{{ route('classroom.process', ['id' => $classroom->id, 'stu_id' => $student->id]) }}" method="post">
                                        @csrf
                                        @method('POST')
                                        <input type="hidden" name="admin_id" value="{{ Auth::user()->id }}">
                                        <button type="submit" class="btn btn-secondary ml-2" data-toggle="tooltip" title="reject">
                                            Reject
                                        </button>
                                        <button type="submit" class="btn" data-toggle="tooltip" title="accept">
                                            Accept
                                        </button>
                                        <input type="hidden" name="action" value="">
                                    </form>

                                    
                                    
                                </div>
                            </div>

                            </div>
                        </div>

                    </div>
                </div>
                <!-- Your Profile Views Chart END-->
            </div>
        </div>
    </main>
    <script>
        $(document).ready(function() {
            $('form').on('click', 'button[type="submit"]', function() {
                var action = $(this).attr('title');
                $('input[name="action"]').val(action);
            });
        });
    </script>

    <script src="{{ asset('admin/js/course.js') }}"></script>
@endsection
