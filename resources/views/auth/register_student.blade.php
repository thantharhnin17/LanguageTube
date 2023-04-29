@extends('layouts.form')
@section('title', 'Student Register Form')

@section('content')

<div class="account-form">
    <div class="account-head" style="background-image:url(assets/images/background/bg2.jpg);">
        <a href="index.html"><img src="assets/images/logo-white-2.png" alt=""></a>
    </div>
    <div class="account-form-inner">
        <div class="account-container">
            <div class="heading-bx left">
                <h2 class="title-head">{{ __('Register') }} <span>Student Account</span></h2>
                <p>Login Your Account <a href="{{ url('login') }}">Click here</a></p>
            </div>	
            <form method="POST" action="{{route('register.student.submit')}}">
                @csrf

                <input name="user_type" type="hidden" value="student">

                <div class="row placeani">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="form-label">{{ __('Name') }}</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="student[name]" value="{{ old('student.name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="col-form-label">{{ __('Profile Photo') }}Profile Photo</label>
                            <div>
                                <input name="student[photo]" type="file" class="form-control-file" value="">
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
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="student[email]" value="{{ old('student.email') }}" required autocomplete="email">

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
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="student[password]" required autocomplete="new-password">

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
                            <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="student[phone]" value="{{ old('student.phone') }}" required autocomplete="phone" autofocus>

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
                            <input name="student[dob]" type="date" class="form-control" required="">
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
                                <input class="form-check-input" type="radio" name="student[gender]" id="male" value="male">
                                <label class="form-check-label" for="male">Male</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="student[gender]" id="female" value="female">
                                <label class="form-check-label" for="female">Female</label>
                            </div>
                            @error('dob')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>    
                            @enderror
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
                        <button name="submit" type="submit" value="Submit" class="btn button-md">{{ __('Register') }}</button>
                    </div>
                    
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
