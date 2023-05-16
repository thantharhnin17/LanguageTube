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
                            <input name="user" class="form-control" type="hidden" value="{{ Auth::user()->id }}">
                            <div class="row wi-body">
                                <div class="form-group col-12">
                                    <label class="col-form-label">Recruitment Title</label>
                                    <div>
                                        <input name="title" class="form-control" type="text" value="{{ old('title') }}">
                                        <span class="help-inline">@error('title'){{$message}}@enderror</span>
                                    </div>
                                </div>

                                <div class="form-group col-12">
                                    <label class="col-form-label">teach Language</label>
                                    <div>
                                        <select class="form-control" id="language" name="language">
                                            <option selected value="">Choose Language</option>
                                            @foreach ($languages as $language)
                                              <option value="{{ $language->id }}" {{ old('language') == "$language->id" ? 'selected' : '' }}>
                                                {{ $language->language_name }}
                                              </option>
                                            @endforeach 
                                        </select>
                                        <span class="help-inline">@error('language'){{$message}}@enderror</span>
                                    </div>
                                </div>

                                
                                <div class="form-group col-12">
                                    <label class="form-label" for="type">Work Type</label>
                                    <br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="type" id="on-campus" value="0" {{ (old('type') == '0') ? 'checked' : ''}}>
                                        <label class="form-check-label" for="on-campus">On-Campus</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="type" id="online" value="1" {{ (old('type') == '1') ? 'checked' : ''}}>
                                        <label class="form-check-label" for="online">Online</label>
                                    </div>
                                    <span class="help-inline">@error('type'){{$message}}@enderror</span>
                                </div>    

                                <div class="form-group col-12">
                                    <label class="form-label" for="time">Work Time</label>
                                    <br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="time" id="full-time" value="0" {{ (old('time') == '0') ? 'checked' : ''}}>
                                        <label class="form-check-label" for="full-time">Full-time</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="time" id="part-time" value="1" {{ (old('time') == '1') ? 'checked' : ''}}>
                                        <label class="form-check-label" for="part-time">Part-time</label>
                                    </div>
                                    <span class="help-inline">@error('time'){{$message}}@enderror</span>
                                </div> 

                                <div class="form-group col-12">
                                    <label class="col-form-label">Salary</label>
                                    <div>
                                        <select class="form-control" id="salary" name="salary">
                                            <option selected value="">Choose Salary</option>
                                            <option value="negotiate" {{ old('salary') == "negotiate" ? 'selected' : '' }}>negotiate</option>
                                            @for ($i = 2; $i < 10; $i++)
                                                <option value="{{ $i }} - {{ $i+1 }}" {{ old('salary') == "$i - $i+1" ? 'selected' : '' }}>{{ $i*100000 }} - {{ ($i+1)*100000 }}</option>
                                            @endfor

                                        </select>
                                        <span class="help-inline">@error('salary'){{$message}}@enderror</span>
                                    </div>
                                </div>

                                <div class="form-group col-12">
                                    <label class="col-form-label">Total Person</label>
                                    <div>
                                        <input name="total_person" class="form-control" type="number" value="{{ old('total_person') }}">
                                        <span class="help-inline">@error('total_person'){{$message}}@enderror</span>
                                    </div>
                                </div>

                                <div class="form-group col-12">
                                    <label class="col-form-label">Work Description</label>
                                    <div>
                                        <textarea type="summernote" class="form-control summernote" name="description">{{old('description')}}</textarea>
                                        <span class="help-inline">@error('description'){{$message}}@enderror</span>
                                    </div>
                                </div>

                                <div class="form-group col-12">
                                    <label class="col-form-label">Work Requirement</label>
                                    <div>
                                        <textarea type="summernote" class="form-control summernote" name="requirement">{{old('requirement')}}</textarea>
                                        <span class="help-inline">@error('requirement'){{$message}}@enderror</span>
                                    </div>
                                </div>

                                <div class="form-group col-12">
                                    <label class="col-form-label">Recruitment Photo</label>
                                    <div>
                                        <input name="recruit_img" type="file" class="form-control-file" value="{{old('recruit_img')}}">
                                        <span class="help-inline">@error('recruit_img'){{$message}}@enderror</span>
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
<script src="{{asset ('admin/js/course.js')}}"></script>
@endsection