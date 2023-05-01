@extends('layouts.admin_layout')
@section('title', 'Create New Course')
@section('content')
<!--Main container start -->
<main class="ttr-wrapper">
    <div class="container-fluid">
        <div class="db-breadcrumb">
            <h4 class="breadcrumb-title">Add New Course</h4>
            <ul class="db-breadcrumb-list">
                <li><a href="{{url('admin/home')}}"><i class="fa fa-home"></i>Home</a></li>
                <li><a href="{{url('admin/course')}}"><i class="fa fa-home"></i>Courses</a></li>
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
                        <form method="POST" action="{{route('course.store')}}" enctype="multipart/form-data" class="edit-profile m-b30">
                            @csrf
                            @method('POST')
                            <div class="row wi-body">
                                <div class="form-group col-12">
                                    <label class="col-form-label">Course Name</label>
                                    <div>
                                        <input name="course_name" class="form-control" type="text" value="{{ old('course_name') }}">
                                        <span class="help-inline">@error('course_name'){{$message}}@enderror</span>
                                    </div>
                                </div>

                                <div class="form-group col-12">
                                    <label class="col-form-label">Course Language</label>
                                    <div>
                                        <select class="form-control" id="course_language" name="course_language">
                                            <option selected value="">Choose Language</option>
                                            @foreach ($languages as $language)
                                              <option value="{{ $language->id }}" {{ old('course_language') == "$language->id" ? 'selected' : '' }}>
                                                {{ $language->language_name }}
                                              </option>
                                            @endforeach 
                                        </select>
                                        <span class="help-inline">@error('course_language'){{$message}}@enderror</span>
                                    </div>
                                </div>

                                <div class="form-group col-12 level-div" id="level-div" style="display:none;">
                                    {{-- <label class="col-form-label">Course Level</label>
                                    <div>
                                        <select class="form-control" name="course_level" id="course_level">
                                            <option selected value="">Choose Level</option>
                                            
                                        </select>
                                        <span class="help-inline">@error('course_level'){{$message}}@enderror</span>
                                    </div> --}}
                                </div>

                                <div class="form-group col-12">
                                    <label class="col-form-label">Course Description</label>
                                    <div>
                                        <textarea  type="summernote" class="form-control" id="summernote" name="description">{{old('description')}}</textarea>
                                        <span class="help-inline">@error('description'){{$message}}@enderror</span>
                                    </div>
                                </div>

                                <div class="form-group col-12">
                                    <label class="col-form-label">Course Photo</label>
                                    <div>
                                        <input name="course_img" type="file" class="form-control-file" value="{{old('course_img')}}">
                                        <span class="help-inline">@error('course_img'){{$message}}@enderror</span>
                                    </div>
                                </div>
                                
                                <div class="seperator"></div>
                                
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
<script src="{{asset ('admin/js/course.js')}}"></script>
@endsection