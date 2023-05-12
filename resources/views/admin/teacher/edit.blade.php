@extends('layouts.admin_layout')
@section('title', 'Edit Teacher')
@section('content')
<!--Main container start -->
<main class="ttr-wrapper">
    <div class="container-fluid">
        <div class="db-breadcrumb">
            <h4 class="breadcrumb-title">Edit Teacher</h4>
            <ul class="db-breadcrumb-list">
                <li><a href="{{url('admin/home')}}"><i class="fa fa-home"></i>Home</a></li>
                <li><a href="{{url('admin/teacher')}}"><i class="fa fa-home"></i>Teachers</a></li>
                <li>Edit Teachers</li>
            </ul>
        </div>	
        <div class="row">
            <!-- Your Profile Views Chart -->
            <div class="col-lg-12 m-b30">
                <div class="widget-box">
                    <div class="wc-title">
                        <h4>Edit Teachers</h4>
                    </div>
                    <div class="widget-inner widget-inner-create">
                        <form method="POST" action="{{route('teacher.update',$user->id)}}" enctype="multipart/form-data" class="edit-profile m-b30">
                            @csrf
                            @method('PUT')
                            <div class="row wi-body">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-label">{{ __('Name') }}</label>
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$user->name}}" required autocomplete="name" autofocus>
            
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
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$user->email}}" required autocomplete="email">
            
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>{{ __('Password') }}</label>
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">
            
                                            @error('password')
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
                                            <img src="{{ asset('storage/img/' . $user->photo) }}" height="100" width="100">
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
                                        <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{$user->phone}}" required autocomplete="phone" autofocus>
            
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
                                        <input name="dob" type="date" class="form-control @error('dob') is-invalid @enderror" value="{{$user->dob}}" required="">
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
                                            <input class="form-check-input" type="radio" name="gender" id="male" value="male" {{ ($user->gender == 'male') ? 'checked' : ''}}>
                                            <label class="form-check-label" for="male">Male</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender" id="female" value="female" {{ ($user->gender == 'female') ? 'checked' : ''}}>
                                            <label class="form-check-label" for="female">Female</label>
                                        </div>
                                        @error('gender')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>    
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group col-12">
                                    <label class="col-form-label">{{ __('Teach Language') }}</label>
                                    <div>
                                        <select class="form-control" id="teach_language" name="teach_language">
                                            <option selected value="">Choose Language</option>
                                            @foreach ($languages as $language)
                                              <option value="{{ $language->id }}" {{ $teacher->levels->first()->language->id == $language->id ? 'selected' : '' }}>
                                                {{ $language->language_name }}
                                              </option>
                                            @endforeach 
                                        </select>
                                        <span class="help-inline">@error('teach_language'){{$message}}@enderror</span>
                                    </div>
                                </div>

                                <div class="form-group col-12 level-div" id="level-div">
                                        <label class="form-label">{{ __('Teach Levels') }}</label>
                                        <div id="tt_level">
                                            @foreach ($levels as $level)
                                                @if ($teacher->levels->first()->language->id == $level->language_id)
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" name="levels[]" value="{{ $level->id }}">
                                                    <label class="form-check-label" for="levels[]">{{ $level->level_name }}</label>
                                                </div>
                                                @endif
                                                
                                            @endforeach 
                                            <span class="help-inline">@error('levels'){{$message}}@enderror</span>
                                        </div>
                                </div>
            
            
                                <div class="col-lg-12 m-b30">
                                    <button name="submit" type="submit" value="Submit" class="btn button-md">{{ __('Register') }}</button>
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
{{-- <script src="{{asset ('admin/js/teacher.js')}}"></script> --}}
@endsection