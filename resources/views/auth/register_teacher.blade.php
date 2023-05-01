@extends('layouts.form')
@section('title', 'Teacher Register Form')

@section('content')

<div class="account-form">
    <div class="account-head" style="background-image:url(assets/images/background/bg2.jpg);">
        <a href="index.html"><img src="assets/images/logo-white-2.png" alt=""></a>
    </div>
    <div class="account-form-inner">
        <div class="account-container">
            <div class="heading-bx left">
                <h2 class="title-head">{{ __('Register') }} <span>Teacher Account</span></h2>
                <p>Login Your Account <a href="{{ url('login') }}">Click here</a></p>
            </div>	
            <form method="POST" action="{{route('register.teacher.submit')}}">
                @csrf
                {{-- <input name="user_type" type="hidden" value="teacher"> --}}
                <div class="row placeani">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="form-label">{{ __('Name') }}</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="teacher[name]" value="{{ old('teacher.name') }}" required autocomplete="name" autofocus>

                                @error('name')
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
                                <input name="teacher[photo]" type="file" class="form-control-file" value="">
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
                            <label>{{ __('Email') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="teacher[email]" value="{{ old('teacher.email') }}" required autocomplete="email">

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
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="teacher[password]" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>{{ __('Confirm Password') }}</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>{{ __('Phone') }}</label>
                            <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="teacher[phone]" value="{{ old('teacher.phone') }}" required autocomplete="phone" autofocus>

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
                            <input name="teacher[dob]" type="date" class="form-control" required="">
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
                                <input class="form-check-input" type="radio" name="teacher[gender]" id="male" value="male">
                                <label class="form-check-label" for="male">Male</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="teacher[gender]" id="female" value="female">
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
                            <label for="teacher[education]" class="form-label">{{ __('Background Education') }}</label>
                            <select class="form-control" name="teacher[education]">
                                <option selected value="">Choose Background Education</option>
                                <option value="undergraduate">Undergraduate</option>
                                <option value="graduated">Graduated</option>
                                <option value="master">Master</option>   
                            </select>   
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="teacher[teach_language]" class="form-label">{{ __('Teach Language') }}</label>
                            <select class="form-control" id="teach_language" name="teacher[teach_language]">
                                <option selected value="">Choose Language</option>
                                @foreach ($languages as $language)
                                    <option value="{{ $language->id }}" {{ old('teach_language') == "$language->id" ? 'selected' : '' }}>
                                        {{ $language->language_name }}
                                    </option>
                                @endforeach 
                            </select>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="form-group level-div" id="level-div" style="display:none;">
                            {{-- <label class="form-label">{{ __('Teach Level') }}</label><br>
                            @foreach ($levels as $level)
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="level[]" value="{{ $level->id }}">
                                    <label class="form-check-label" for="level[]">{{ $level->level_name }}</label>
                                </div>
                            @endforeach  --}}
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="col-form-label">{{ __('CV Form') }}</label>
                            <div>
                                <input name="teacher[cv_form]" type="file" class="form-control-file" value="">
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="col-form-label">{{ __('Certificates') }}</label>
                            <div>
                                <input name="teacher[certificates][]" type="file" multiple class="form-control-file" value="">
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="teacher[reason]" class="form-label">{{ __('Why do you want to work at our school?') }}</label>
                              <textarea  type="text" class="form-control" id="reason" name="teacher[reason]"></textarea>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="form-group">
                            <input class="form-check-input" type="checkbox" name="agree" id="agree" required>
                            <label class="form-check-label" for="agree">
                                Agree terms & conditions of Language Tube
                            </label>
                        </div>
                    </div>

                    

                    <div class="col-lg-12 m-b30">
                        <button name="submit" type="submit" value="Submit" class="btn button-md">Sign Up</button>
                    </div>
                    
                </div>
            </form>
        </div>
    </div>
</div>
<script src="{{asset ('admin/js/register.js')}}"></script>
@endsection
