@extends('layouts.admin_layout')
@section('title', 'Edit Classroom')
@section('content')
<!--Main container start -->
<main class="ttr-wrapper">
    <div class="container-fluid">
        <div class="db-breadcrumb">
            <h4 class="breadcrumb-title">Edit Classroom</h4>
            <ul class="db-breadcrumb-list">
                <li><a href="{{url('admin/home')}}"><i class="fa fa-home"></i>Home</a></li>
                <li><a href="{{url('admin/classroom')}}"><i class="fa fa-home"></i>Classrooms</a></li>
                <li>Edit Classroom</li>
            </ul>
        </div>	
        <div class="row">
            <!-- Your Profile Views Chart -->
            <div class="col-lg-12 m-b30">
                <div class="widget-box">
                    <div class="wc-title">
                        <h4>Edit Classroom</h4>
                    </div>
                    <div class="widget-inner widget-inner-create">
                        <form method="POST" action="{{route('classroom.update',$classroom->id)}}" enctype="multipart/form-data" class="edit-profile m-b30">
                            @csrf
                            @method('PUT')
                            <div class="row wi-body">
                                <div class="form-group col-12">
                                    <label class="col-form-label">Course Name</label>
                                    <div>
                                        <select class="form-control" id="course_name" name="course_name">
                                            <option selected value="">Choose course name</option>
                                            @foreach ($courses as $course)
                                              <option value="{{ $course->id }}" {{ $classroom->course_id == $course->id ? 'selected' : '' }}>
                                                {{ $course->course_name }}
                                              </option>
                                            @endforeach 
                                        </select>
                                        <span class="help-inline">@error('course_name'){{$message}}@enderror</span>
                                    </div>
                                </div>

                                <div class="form-group col-12">
                                    <label class="form-label" for="class_type">Class Type</label>
                                    <br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="class_type" id="on-campus" value="0" {{ ($classroom->class_type == '0') ? 'checked' : ''}}>
                                        <label class="form-check-label" for="on-campus">On-Campus</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="class_type" id="online" value="1" {{ ($classroom->class_type == '1') ? 'checked' : ''}}>
                                        <label class="form-check-label" for="online">Online</label>
                                    </div>
                                    <span class="help-inline">@error('class_type'){{$message}}@enderror</span>
                                </div> 

                                <div class="form-group col-12 online-div" id="online-div" style="display:none;">
                                    <div class="form-group col-12">
                                        <label class="col-form-label">Meeting Link</label>
                                        <div>
                                            <input name="meeting_link" class="form-control" type="text" value="{{ $classroom->meeting_link }}">
                                            <span class="help-inline">@error('meeting_link'){{$message}}@enderror</span>
                                        </div>
                                    </div>

                                    <div class="form-group col-12">
                                        <label class="col-form-label">Group Chat Link</label>
                                        <div>
                                            <input name="group_chat_link" class="form-control" type="text" value="{{ $classroom->group_chat_link }}">
                                            <span class="help-inline">@error('group_chat_link'){{$message}}@enderror</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group col-12 teacher-div" id="teacher-div">
                                    <label class="col-form-label">Course Teacher</label>
                                    <div>
                                        <select class="form-control" name="course_teacher" id="course_teacher">
                                            <option selected value="">Choose teacher</option>
                                            @foreach ($users as $user)
                                                {{-- @if ($classroom->user->teacher->levels->first()->id == $classroom->course->level->id) --}}
                                                    <option value="{{ $user->id }}" {{$classroom->user_id == $user->id  ? 'selected' : ''}}>
                                                        {{ $user->name }}
                                                    </option>
                                                {{-- @endif --}}
                                            @endforeach 
                                        </select>
                                    </div>

                                </div>

                                <div class="form-group col-12">
                                    <label class="col-form-label">Batch Name</label>
                                    <div>
                                        <select class="form-control" id="batch_name" name="batch_name">
                                            <option selected value="">Choose batch name</option>
                                            @foreach ($batches as $batch)
                                              <option value="{{ $batch->id }}" {{ $classroom->batch_id == "$batch->id" ? 'selected' : '' }}>
                                                {{ $batch->batch_name }}
                                              </option>
                                            @endforeach 
                                        </select>
                                        <span class="help-inline">@error('course_name'){{$message}}@enderror</span>
                                    </div>
                                </div>


                                <div class="form-group col-12">
                                    <label class="col-form-label">Duration</label>
                                    <div>
                                        <input name="duration" class="form-control" type="text" value="{{ $classroom->duration }}">
                                        <span class="help-inline">@error('duration'){{$message}}@enderror</span>
                                    </div>
                                </div>

                                <div class="form-group col-12">
                                    <label class="col-form-label">Start Date</label>
                                    <div>
                                        <input name="start_date" class="form-control" type="date" value="{{ $classroom->start_date }}">
                                        <span class="help-inline">@error('start_date'){{$message}}@enderror</span>
                                    </div>
                                </div>

                                <div class="form-group col-12">
                                    <label class="col-form-label">Days</label>
                                    <div>
                                        @php
                                            $daysArray = explode(',', $classroom->days);
                                        @endphp

                                        @foreach ($weekdays as $weekday)
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="days[]" value="{{ $weekday }}" {{ in_array($weekday, $daysArray) ? 'checked' : '' }}>
                                                <label class="form-check-label" for="days[]">{{ $weekday }}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                                <div class="form-group col-12">
                                    <label class="col-form-label">Time</label>
                                    <div>
                                        <label for="from">From:</label>
                                        <input type="time" id="from" name="from" value="{{ $classroom->from }">

                                        <label for="to">To:</label>
                                        <input type="time" id="to" name="to" value="{{ $classroom->to }">
                                    </div>
                                </div>

                                <div class="form-group col-12">
                                    <label class="col-form-label">Avaliable Students</label>
                                    <div>
                                        <input name="avaliable_students" class="form-control" type="number" value="{{ $classroom->avaliable_students }}">
                                        <span class="help-inline">@error('avaliable_students'){{$message}}@enderror</span>
                                    </div>
                                </div>

                                <div class="form-group col-12">
                                    <label class="col-form-label">Fee</label>
                                    <div>
                                        <input name="fee" class="form-control" type="text" value="{{ $classroom->fee }}">
                                        <span class="help-inline">@error('fee'){{$message}}@enderror</span>
                                    </div>
                                </div>
                                
                                <div class="seperator"></div>
                                
                            </div>
                            <div class="row wi-foot mt-3">
                                <div class="col-12">
                                    <a href="{{ redirect()->back()->getTargetUrl() }}" class="btn btn-secondary">Back</a>
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
<script src="{{asset ('admin/js/classroom.js')}}"></script>
@endsection