@extends('layouts.main_layout')

@section('title', 'Recruitment Form')

@section('content')
<!-- Content -->
<div class="page-content bg-white">
    <!-- inner page banner -->
    <div class="page-banner ovbl-dark" style="background-image:url(assets/images/banner/banner2.jpg);">
        <div class="container">
            <div class="page-banner-entry">
                <h1 class="text-white">Recruitment Form</h1>
             </div>
        </div>
    </div>
    <!-- Breadcrumb row -->
    <div class="breadcrumb-row">
        <div class="container">
            <ul class="list-inline">
                <li><a href="{{url('/')}}">Home</a></li>
                <li><a href="{{url('recruits')}}">Recruitments</a></li>
                <li><a href="{{url('recruits/recruit_details/'.$recruit->id) }}}">Recruitment Details</a></li>
                <li>Recruitment Form</li>
            </ul>
        </div>
    </div>
    <!-- Breadcrumb row END -->
    <!-- inner page banner END -->
    <div class="content-block">
        <!-- About Us -->
        <div class="section-area section-sp1">
            <div class="container">

                <div class="card r-form widget-box">
                    <div class="widget-inner widget-inner-create">
                        <div class="r-title">
                            <h4>Recruitment Form For {{$recruit->title}} - {{$recruit->language->language_name}}</h4>
                        </div>
                        <form method="POST" action="{{route('apply.teacher.submit', Auth::user()->id, $recruit->id)}}" enctype="multipart/form-data" class="edit-profile m-b30">
                            @csrf
                            @method('PUT')
                            
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                            <input type="hidden" name="recruit_id" value="{{ $recruit->id }}">
                            <input type="hidden" name="type" value="{{ $recruit->type }}">
                            <input type="hidden" name="time" value="{{ $recruit->time }}">

                            <div class="row wi-body">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-label">{{ __('Name') }}</label>
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ Auth::user()->name }}" required autocomplete="name" autofocus>
            
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>{{ __('Email') }}</label>
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ Auth::user()->email }}" required autocomplete="email">
            
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                </div>                                           
            
            
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="col-form-label">{{ __('Profile Photo') }}</label>
                                        <div>
                                            <img src="{{ asset('storage/img/' .  Auth::user()->photo) }}" height="100" width="100">
                                            {{-- <input type="hidden" name="db_photo" value="{{$user->photo}}"> --}}
                                            <input name="photo" type="file" class="form-control-file" value="">
                                            @error('photo')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                
            
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>{{ __('Phone') }}</label>
                                        <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ Auth::user()->phone }}" required autocomplete="phone" autofocus>
            
                                            @error('phone')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>{{ __('Date Of Birth') }}</label>
                                        <input name="dob" type="date" class="form-control @error('dob') is-invalid @enderror" value="{{ Auth::user()->dob }}" required="">
                                            @error('dob')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>    
                                            @enderror
                                    </div>
                                </div>
            
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-label" for="gender">{{ __('Gender') }}</label>
                                        <br>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender" id="male" value="male" {{ (Auth::user()->gender == 'male') ? 'checked' : ''}}>
                                            <label class="form-check-label" for="male">Male</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender" id="female" value="female" {{ (Auth::user()->gender == 'female') ? 'checked' : ''}}>
                                            <label class="form-check-label" for="female">Female</label>
                                        </div>
                                        @error('gender')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>    
                                        @enderror
                                    </div>
                                </div>

                                {{-- //// --}}

                                <div class="col-lg-12">
                                    <div class="form-group"> 
                                        <label for="education" class="form-label">{{ __('Background Education') }}</label>
                                        <select class="form-control" name="education">
                                            <option selected value="">Choose Background Education</option>
                                            <option value="undergraduate">Undergraduate</option>
                                            <option value="graduated">Graduated</option>
                                            <option value="master">Master</option>   
                                        </select>   
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-label">{{ __('Background University') }}</label>
                                        <input id="university" type="text" class="form-control @error('university') is-invalid @enderror" name="university" value="{{ old('university') }}" required autocomplete="university" autofocus>
            
                                            @error('university')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-label">{{ __('Teach Language') }}</label>
                                        <select class="form-control" id="teach_language" name="teach_language" disabled>
                                            <option selected value="">Choose Language</option>
                                            @foreach ($languages as $language)
                                                <option value="{{ $language->id }}" {{ $recruit->language->id == "$language->id" ? 'selected' : '' }}>
                                                    {{ $language->language_name }}
                                                </option>
                                            @endforeach 
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group col-12 level-div" id="level-div">
                                    <label class="form-label">{{ __('Teach Levels') }}</label>
                                    <div>
                                        @foreach ($levels as $level)
                                                @if ($recruit->language->id == $level->language_id)
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" name="levels[]" value="{{ $level->id }}">
                                                    <label class="form-check-label" for="levels[]">{{ $level->level_name }}</label>
                                                </div>
                                                @endif
                                                
                                        @endforeach 
                                            
                                        <span class="help-inline">@error('course_level'){{$message}}@enderror</span>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="col-form-label">{{ __('CV Form') }}</label>
                                        <div>
                                            <input name="cv_form" type="file" class="form-control-file" value="" accept=".pdf,.doc,.docx">
                                            <span>Please upload .pdf,.doc,.docx file</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="col-form-label">{{ __('Certificates / Degrees') }}</label>
                                        <div>
                                            <input name="certis[]" type="file" multiple class="form-control-file" value="">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="comment" class="form-label">{{ __('Any Comment?') }}</label>
                                        <textarea  type="text" class="form-control" id="comment" name="comment"></textarea>
                                    </div>
                                </div>

                                <div class="col-lg-12 ml-4">
                                    <div class="form-group">
                                        <input class="form-check-input" type="checkbox" name="agree" id="agree" required>
                                        <label class="form-check-label" for="agree">
                                            Agree terms & conditions of Language Tube
                                        </label>
                                    </div>
                                </div>
            
            
                                <div class="col-lg-12 m-b30 d-flex justify-content-center">
                                    <a href="{{ redirect()->back()->getTargetUrl() }}" class="btn btn-secondary button-md mr-2">Back</a>
                                    <button name="submit" type="submit" value="Submit" class="btn button-md">{{ __('Apply Job') }}</button>
                                </div>
                                
                            </div>
                        </form>
                    </div>
                    
                </div>

            </div>
        </div>
    </div>
    <!-- contact area END -->
    
</div>
<!-- Content END-->
@endsection