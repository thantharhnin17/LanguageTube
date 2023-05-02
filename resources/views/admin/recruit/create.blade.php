@extends('layouts.admin_layout')
@section('title', 'Create New Recruitment')
@section('content')
<!--Main container start -->
<main class="ttr-wrapper">
    <div class="container-fluid">
        <div class="db-breadcrumb">
            <h4 class="breadcrumb-title">Add New Recruitment</h4>
            <ul class="db-breadcrumb-list">
                <li><a href="{{url('admin/home')}}"><i class="fa fa-home"></i>Home</a></li>
                <li><a href="{{url('admin/recruit')}}"><i class="fa fa-home"></i>Recruitments</a></li>
                <li>Add New Recruitment</li>
            </ul>
        </div>	
        <div class="row">
            <!-- Your Profile Views Chart -->
            <div class="col-lg-12 m-b30">
                <div class="widget-box">
                    <div class="wc-title">
                        <h4>Add New Recruitment</h4>
                    </div>
                    <div class="widget-inner widget-inner-create">
                        <form method="POST" action="{{route('recruit.store')}}" enctype="multipart/form-data" class="edit-profile m-b30">
                            @csrf
                            @method('POST')
                            <div class="row wi-body">
                                <div class="form-group col-12">
                                    <label class="col-form-label">Recruitment Title</label>
                                    <div>
                                        <input name="title" class="form-control" type="text" value="{{ old('title') }}">
                                        <span class="help-inline">@error('title'){{$message}}@enderror</span>
                                    </div>
                                </div>

                                
                                <div class="form-group col-12">
                                    <label class="form-label" for="type">Work Type</label>
                                    <br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="type" id="on-site" value="on-site" {{ (old('type') == 'on-site') ? 'checked' : ''}}>
                                        <label class="form-check-label" for="on-site">On-Site</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="type" id="online" value="online" {{ (old('type') == 'online') ? 'checked' : ''}}>
                                        <label class="form-check-label" for="online">Online</label>
                                    </div>
                                    <span class="help-inline">@error('type'){{$message}}@enderror</span>
                                </div>    

                                <div class="form-group col-12">
                                    <label class="col-form-label">Salary</label>
                                    <div>
                                        <select class="form-control" id="salary" name="salary">
                                            <option selected value="">Choose Salary</option>
                                            @for($i = 2; $i < 10; $i++)
                                                <option value="{{$i*100000~$i+1*100000}}" {{ old('salary') == "{{$i*100000~$i+1*100000}}" ? 'selected' : '' }}>{{$i*100000~$i+1*100000}}</option>
                                            @endfor
                                        </select>
                                        <span class="help-inline">@error('salary'){{$message}}@enderror</span>
                                    </div>
                                </div>

                                <div class="form-group col-12">
                                    <label class="col-form-label">Work Time</label>
                                    <div>
                                        <select class="form-control" id="worktime" name="worktime">
                                            <option selected value="">Choose work time</option>
                                            
                                            <option value="9AM-6PM" {{ old('worktime') == "9AM-6PM" ? 'selected' : '' }}>9AM-6PM</option>
                                            <option value="1PM-10PM" {{ old('worktime') == "1PM-10PM" ? 'selected' : '' }}>1PM-10PM</option>

                                        </select>
                                        <span class="help-inline">@error('worktime'){{$message}}@enderror</span>
                                    </div>
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