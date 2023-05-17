@extends('layouts.main_layout')

@section('title', 'Recruitment Details')

@section('content')
    <!-- Content -->
    <div class="page-content bg-white">
        {{-- @if (session('success_message'))
            <script>
                Swal.fire({
                    icon: 'success',
                    title: '{{session('success_message')}}',
                    showConfirmButton: false,
                    timer: 3000,
                    position: 'top-end',
                    toast: true,
            });
            </script>      
        @endif --}}


        <!-- inner page banner -->
        <div class="page-banner ovbl-dark" style="background-image:url(assets/images/banner/banner1.jpg);">
            <div class="container">
                <div class="page-banner-entry">
                    <h1 class="text-white">Profile</h1>
                </div>
            </div>
        </div>
        <!-- Breadcrumb row -->
        <div class="breadcrumb-row">
            <div class="container">
                <ul class="list-inline">
                    <li><a href="#">Home</a></li>
                    <li>Profile</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb row END -->

        <!-- inner page banner END -->
        <div class="content-block">
            <!-- About Us -->
            <div class="section-area section-sp1">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            @if (session('success_message'))
                                <div class="alert alert-success">{{ session('success_message') }}</div>
                            @endif

                            @if (session('fail_message'))
                                <div class="alert alert-danger">{{ session('fail_message') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 col-md-4 col-sm-12 m-b30">
                            <div class="profile-bx text-center">
                                <div class="user-profile-thumb">
                                    <img src="{{ asset('storage/img/' . $user->photo) }}" alt="" />
                                </div>
                                <div class="profile-info">
                                    <h4>{{ $user->name }}</h4>
                                    <span>{{ $user->user_type }}</span>
                                </div>
                                <div class="profile-tabnav">
                                    <ul class="nav nav-tabs">
                                        @if ($user->user_type == 'student')
                                            <li class="nav-item">
                                                <a class="nav-link active" data-toggle="tab" href="#courses"><i
                                                        class="ti-book"></i>Courses</a>
                                            </li>
                                        @elseif ($user->user_type == 'teacher')
                                            <li class="nav-item">
                                                <a class="nav-link active" data-toggle="tab" href="#tcourses"><i
                                                        class="ti-book"></i>Teach Courses</a>
                                            </li>
                                        @endif


                                        <li class="nav-item">
                                            <a class="nav-link @if ($user->user_type == 'user') active @endif"
                                                data-toggle="tab" href="#edit-profile"><i class="ti-pencil-alt"></i>Edit
                                                Profile</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#change-password"><i
                                                    class="ti-lock"></i>Change Password</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-8 col-sm-12 m-b30">
                            <div class="profile-content-bx">
                                <div class="tab-content">
                                    @if ($user->user_type == 'student')
                                        <div class="tab-pane active" id="courses">
                                            <div class="profile-head">
                                                <h3>My Learning Courses</h3>
                                                <div class="feature-filters style1 ml-auto">
                                                    <ul class="filters" data-toggle="buttons">
                                                        <li data-filter="" class="btn active">
                                                            <input type="radio">
                                                            <a href="#"><span>All</span></a>
                                                        </li>
                                                        <li data-filter="Accepted" class="btn">
                                                            <input type="radio">
                                                            <a href="#"><span>Accepted</span></a>
                                                        </li>
                                                        <li data-filter="Pending" class="btn">
                                                            <input type="radio">
                                                            <a href="#"><span>Pending</span></a>
                                                        </li>
                                                        <li data-filter="Rejected" class="btn">
                                                            <input type="radio">
                                                            <a href="#"><span>Rejected</span></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="courses-filter">
                                                <div class="clearfix">
                                                    <ul id="masonry" class="ttr-gallery-listing magnific-image row">
                                                        @foreach ($classroomStudents as $cs)
                                                            @foreach ($paymentConfirms as $confirm)
                                                                @if ($confirm->payment->classroom_student_id == $cs->id)
                                                                    <li
                                                                        class="action-card col-xl-4 col-lg-6 col-md-12 col-sm-6 {{ $confirm->confirmStatus }}">
                                                                        <div class="cours-bx">
                                                                            <div class="action-box">
                                                                                <img src="{{ asset('storage/img/' . $cs->classroom->course->course_img) }}"
                                                                                    alt="">

                                                                            </div>
                                                                            <div class="info-bx text-center">
                                                                                <h5><a
                                                                                        href="{{ url('classrooms/classroom_details/' . $cs->classroom->id) }}">{{ $cs->classroom->course->course_name }}</a>
                                                                                </h5>
                                                                                <span>
                                                                                    @if ($cs->classroom->class_type == 0)
                                                                                        On-Campus
                                                                                    @else
                                                                                        Online
                                                                                    @endif
                                                                                </span><br>
                                                                                <span>
                                                                                    {{ $cs->classroom->batch->batch_name }}
                                                                                </span>
                                                                            </div>
                                                                            <div class="cours-more-info">
                                                                                <div class="price">
                                                                                    <h5>KS {{ $cs->classroom->fee }}</h5>
                                                                                </div>
                                                                                <a href="{{ route('user.profile.classroom', ['id' => $user->id, 'class_id' => $cs->classroom]) }}"
                                                                                    class="btn">View Classroom</a>
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                @endif
                                                            @endforeach
                                                        @endforeach


                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    @elseif ($user->user_type == 'teacher')
                                        <div class="tab-pane active" id="tcourses">
                                            <div class="profile-head">
                                                <h3>My Teaching Courses</h3>
                                            </div>
                                            <div class="courses-filter">
                                                <div class="clearfix">
                                                    <ul id="masonry" class="ttr-gallery-listing magnific-image row">
                                                        @foreach ($classrooms as $classroom)
                                                            <li class="action-card col-xl-4 col-lg-6 col-md-12 col-sm-6">
                                                                <div class="cours-bx">
                                                                    <div class="action-box">
                                                                        <img src="{{ asset('storage/img/' . $classroom->course->course_img) }}"
                                                                            alt="">

                                                                    </div>
                                                                    <div class="info-bx text-center">
                                                                        <h5><a
                                                                                href="{{ url('classrooms/classroom_details/' . $classroom->id) }}">{{ $classroom->course->course_name }}</a>
                                                                        </h5>
                                                                        <span>
                                                                            @if ($classroom->class_type == 0)
                                                                                On-Campus
                                                                            @else
                                                                                Online
                                                                            @endif
                                                                        </span><br>
                                                                        <span>
                                                                            {{ $classroom->batch->batch_name }}
                                                                        </span>
                                                                    </div>
                                                                    <div class="cours-more-info">
                                                                        <div class="price">
                                                                            <h5>KS {{ number_format($classroom->fee) }}
                                                                            </h5>
                                                                        </div>
                                                                        <a href="{{ route('user.profile.stuList', ['id' => $user->id, 'class_id' => $classroom]) }}"
                                                                            class="btn">View Student List</a>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        @endforeach


                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                    <div class="tab-pane @if ($user->user_type == 'user') active @endif"
                                        id="edit-profile">
                                        <div class="profile-head">
                                            <h3>Edit Profile</h3>
                                        </div>
                                        <form method="POST" action="{{ route('user.profile.update', $user->id) }}"
                                            enctype="multipart/form-data" class="edit-profile">
                                            @csrf
                                            @method('PUT')
                                            <div class="">
                                                <div class="form-group row">
                                                    <label
                                                        class="col-12 col-sm-3 col-md-3 col-lg-2 col-form-label">{{ __('Name') }}</label>
                                                    <div class="col-12 col-sm-9 col-md-9 col-lg-7">
                                                        <input id="name" type="text"
                                                            class="form-control @error('name') is-invalid @enderror"
                                                            name="name" value="{{ $user->name }}" required
                                                            autocomplete="name" autofocus>

                                                        @error('name')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label
                                                        class="col-12 col-sm-3 col-md-3 col-lg-2 col-form-label">{{ __('Email') }}</label>
                                                    <div class="col-12 col-sm-9 col-md-9 col-lg-7">
                                                        <input id="email" type="email"
                                                            class="form-control @error('email') is-invalid @enderror"
                                                            name="email" value="{{ $user->email }}" required
                                                            autocomplete="email">

                                                        @error('email')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label
                                                        class="col-12 col-sm-3 col-md-3 col-lg-2 col-form-label">{{ __('Profile Photo') }}</label>
                                                    <div class="col-12 col-sm-9 col-md-9 col-lg-7">
                                                        <img src="{{ asset('storage/img/' . $user->photo) }}"
                                                            height="100" width="100">

                                                        <input name="photo" type="file" class="form-control-file"
                                                            value="">
                                                        @error('photo')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label
                                                        class="col-12 col-sm-3 col-md-3 col-lg-2 col-form-label">{{ __('Phone') }}</label>
                                                    <div class="col-12 col-sm-9 col-md-9 col-lg-7">
                                                        <input id="phone" type="text"
                                                            class="form-control @error('phone') is-invalid @enderror"
                                                            name="phone" value="{{ $user->phone }}" required
                                                            autocomplete="phone" autofocus>

                                                        @error('phone')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label
                                                        class="col-12 col-sm-3 col-md-3 col-lg-2 col-form-label">{{ __('Date Of Birth') }}</label>
                                                    <div class="col-12 col-sm-9 col-md-9 col-lg-7">
                                                        <input name="dob" type="date"
                                                            class="form-control @error('dob') is-invalid @enderror"
                                                            value="{{ $user->dob }}" required="">
                                                        @error('dob')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label
                                                        class="col-12 col-sm-3 col-md-3 col-lg-2 col-form-label">{{ __('Gender') }}</label>
                                                    <div class="col-12 col-sm-9 col-md-9 col-lg-7">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="gender"
                                                                id="male" value="male"
                                                                {{ $user->gender == 'male' ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="male">Male</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="gender"
                                                                id="female" value="female"
                                                                {{ $user->gender == 'female' ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="female">Female</label>
                                                        </div>
                                                        @error('gender')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>



                                            </div>
                                            <div class="">
                                                <div class="">
                                                    <div class="row">
                                                        <div class="col-12 col-sm-3 col-md-3 col-lg-2">
                                                        </div>
                                                        <div class="col-12 col-sm-9 col-md-9 col-lg-7">
                                                            <button name="submit" type="submit" value="Submit"
                                                                class="btn">Save changes</button>
                                                            <button type="reset" class="btn-secondry">Cancel</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                    <div class="tab-pane" id="change-password">
                                        <div class="profile-head">
                                            <h3>Change Password</h3>
                                        </div>
                                        <form method="POST"
                                            action="{{ route('user.profile.updatePassword', $user->id) }}"
                                            enctype="multipart/form-data" class="edit-profile">
                                            @csrf
                                            @method('PUT')
                                            <div class="">
                                                <div class="form-group row">
                                                    <div class="col-12 col-sm-8 col-md-8 col-lg-9 ml-auto">
                                                        <h3>Password</h3>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-12 col-sm-4 col-md-4 col-lg-3 col-form-label">Current
                                                        Password</label>
                                                    <div class="col-12 col-sm-8 col-md-8 col-lg-7">
                                                        <input name="curPw" class="form-control" type="password"
                                                            value="">
                                                        @error('curPw')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-12 col-sm-4 col-md-4 col-lg-3 col-form-label">New
                                                        Password</label>
                                                    <div class="col-12 col-sm-8 col-md-8 col-lg-7">
                                                        <input name="newPw" class="form-control" type="password"
                                                            value="">
                                                        @error('newPw')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-12 col-sm-4 col-md-4 col-lg-3 col-form-label">Re Type
                                                        New Password</label>
                                                    <div class="col-12 col-sm-8 col-md-8 col-lg-7">
                                                        <input class="form-control" type="password" value="">
                                                        @error('newPw')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12 col-sm-4 col-md-4 col-lg-3">
                                                </div>
                                                <div class="col-12 col-sm-8 col-md-8 col-lg-7">
                                                    <button name="submit" type="submit" value="Submit"
                                                        class="btn">Save changes</button>
                                                    <button type="reset" class="btn-secondry">Cancel</button>
                                                </div>
                                            </div>

                                        </form>
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
    <!-- Content END-->
@endsection
