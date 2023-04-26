@extends('layouts.admin_layout')
@section('title', 'Edit Course')
@section('content')
<!--Main container start -->
<main class="ttr-wrapper">
    <div class="container-fluid">
        <div class="db-breadcrumb">
            <h4 class="breadcrumb-title">Add New Course</h4>
            <ul class="db-breadcrumb-list">
                <li><a href="{{url('home')}}"><i class="fa fa-home"></i>Home</a></li>
                <li><a href="{{url('course')}}"><i class="fa fa-home"></i>Courses</a></li>
                <li>Add New Course</li>
            </ul>
        </div>	
        <div class="row">
            <!-- Your Profile Views Chart -->
            <div class="col-lg-12 m-b30">
                <div class="widget-box">
                    <div class="wc-title">
                        <h4>Add New Course</h4>
                    </div>
                    <div class="widget-inner widget-inner-create">
                        <form method="POST" action="{{route('course.update',$course->id)}}" enctype="multipart/form-data" class="edit-profile m-b30">
                            @csrf
                            @method('PUT')
                            <div class="row wi-body">
                                <div class="form-group col-12">
                                    <label class="col-form-label">Course Name</label>
                                    <div>
                                        <input name="coursename" class="form-control" type="text" value="{{$course->name}}">
                                        <span class="help-inline">@error('coursename'){{$message}}@enderror</span>
                                    </div>
                                </div>

                                <div class="form-group col-12">
                                    <label class="col-form-label">Course Language</label>
                                    <div>
                                        <select class="form-control" id="course_language" name="course_language">
                                            <option selected value="">Choose Category</option>
                                            @foreach ($languages as $language)
                                            <option value="{{ $language->id  }}" {{$course->level->language->id == $language->id  ? 'selected' : ''}}>
                                                {{ $language->name }}
                                            </option>
                                            @endforeach 
                                        </select>
                                        <span class="help-inline">@error('course_language'){{$message}}@enderror</span>
                                    </div>
                                </div>

                                <div class="form-group col-12 level-div" id="level-div">
                                    <label class="col-form-label">Course Language</label>
                                    <div>
                                        <select class="form-control" name="course_level" id="course_level">
                                            <option selected value="">Choose Level</option>
                                            @foreach ($levels as $level)
                                                @if ($course->level->language->id == $level->language_id)
                                                    <option value="{{ $level->id }}" {{$course->level_id == $level->id  ? 'selected' : ''}}>
                                                        {{ $level->name }}
                                                    </option>
                                                @endif
                                                
                                            @endforeach 
                                        </select>
                                        <span class="help-inline">@error('course_level'){{$message}}@enderror</span>
                                    </div>
                                </div>

                                <div class="form-group col-12">
                                    <label class="col-form-label">Course Description</label>
                                    <div>
                                        <textarea  type="summernote" class="form-control" id="summernote" name="description">{{$course->description}}</textarea>
                                        <span class="help-inline">@error('description'){{$message}}@enderror</span>
                                    </div>
                                </div>

                                <div class="form-group col-12">
                                    <label class="col-form-label">Course Photo</label>
                                    <div>
                                        <img src="{{ asset('storage/img/' . $course->image) }}" height="100" width="100">
                                        <input type="file" name="course_img" value="{{ old('course_img') ?? $course->image}}">
                                        <input type="hidden" name="db_course_img" value="{{$course->image}}">
                                        <span class="help-inline">@error('course_img'){{$message}}@enderror</span>
                                    </div>
                                </div>
                                
                                <div class="seperator"></div>
                                
                            </div>
                            <div class="row wi-foot mt-3">
                                <div class="col-12">
                                    <button type="reset" class="btn-secondry mr-2">Clear</button>
                                    <button type="submit" class="btn">Save changes</button>
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
<script src="{{asset ('admin/js/course.js')}}"></script>
@endsection