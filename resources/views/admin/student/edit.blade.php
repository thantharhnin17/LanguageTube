@extends('layouts.admin_layout')
@section('title', 'Edit Student')
@section('content')
<!--Main container start -->
<main class="ttr-wrapper">
    <div class="container-fluid">
        <div class="db-breadcrumb">
            <h4 class="breadcrumb-title">Edit Student</h4>
            <ul class="db-breadcrumb-list">
                <li><a href="{{url('admin/home')}}"><i class="fa fa-home"></i>Home</a></li>
                <li><a href="{{url('admin/student')}}"><i class="fa fa-home"></i>Students</a></li>
                <li>Edit Students</li>
            </ul>
        </div>	
        <div class="row">
            <!-- Your Profile Views Chart -->
            <div class="col-lg-12 m-b30">
                <div class="widget-box">
                    <div class="wc-title">
                        <h4>Edit Batch</h4>
                    </div>
                    <div class="widget-inner widget-inner-create">
                        <form method="POST" action="{{route('student.update',$student->id)}}" enctype="multipart/form-data" class="edit-profile m-b30">
                            @csrf
                            @method('PUT')
                            <div class="row wi-body">
                                <div class="form-group col-12">
                                    <label class="col-form-label">Name</label>
                                    <div>
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="student[name]" value="{{$student->user->name}}" required autocomplete="name" autofocus>
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group col-12">
                                    <label class="col-form-label">Photo</label>
                                    <div>
                                        <img src="{{ asset('storage/img/' . $student->photo) }}" height="100" width="100">
                                        <input name="student[photo]" type="file" class="form-control-file"  value="{{old('student.photo')}}">
                                        <input type="hidden" name="db_photo" value="{{$student->photo}}">
                                        
                                        {{-- <span class="help-inline">@error('photo'){{$message}}@enderror</span> --}}
                                        @error('photo')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group col-12">
                                    <label class="col-form-label">Email</label>
                                    <div>
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="student[email]" value="{{$student->user->email}}" required autocomplete="email">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group col-12">
                                    <label class="col-form-label">Password</label>
                                    <div>
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="student[password]" required autocomplete="new-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="form-group col-12">
                                    <label class="col-form-label">Phone</label>
                                    <div>
                                        <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="student[phone]" value="{{ $student->phone }}" required autocomplete="phone" autofocus>

                                        @error('phone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group col-12">
                                    <label class="col-form-label">Date Of Birth</label>
                                    <div>
                                        <input name="student[dob]" value="{{ $student->dob }}" type="date" class="form-control" required="">
                                        @error('dob')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>    
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group col-12">
                                    <label class="col-form-label">Gender</label>
                                    <div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="student[gender]" id="male" value="male" {{ ($student->gender=="male")? "checked" : "" }}>
                                            <label class="form-check-label" for="male">Male</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="student[gender]" id="female" value="female" {{ ($student->gender=="female")? "checked" : "" }}>
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
                            <div class="row wi-foot mt-3">
                                <div class="col-12">
                                    <button type="reset" class="btn-secondry mr-2">Clear</button>
                                    <button type="submit" class="btn">Create</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    
                </div>
            </div>
            <!-- Your Profile Views Chart END-->
        </div>
    </div>
</main>
@endsection