@extends('layouts.form')
@section('title', 'Login Form')

@section('content')


<div class="account-form">
    <div class="account-head" style="background-image:url(assets/images/background/bg2.jpg);">
        <a href="index.html"><img src="assets/images/logo-white-2.png" alt=""></a>
    </div>
    <div class="account-form-inner">
        <div class="account-container">
            
            <div class="heading-bx left">
                <h2 class="title-head">Login to your <span>Account</span></h2>
                <p>Don't have an account? <a href="/register">Create one here</a></p>
            </div>
            <form class="contact-bx" method="POST" action="{{ route('login') }}">
                @csrf
                <div class="row placeani">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <div class="input-group">
                                {{-- <label>{{ __('Email Address') }}</label> --}}
                                <input placeholder="Email Address" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <div class="input-group"> 
                                {{-- <label>{{ __('Password') }}</label> --}}
                                <input placeholder="Password" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group form-forget">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="customControlAutosizing" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="custom-control-label" for="customControlAutosizing">Remember me</label>
                            </div>
                                {{-- @if (Route::has('password.request'))
                                    <a class="btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif --}}
                        </div>
                    </div>
                    <div class="col-lg-12 m-b30">
                        <button name="submit" type="submit" value="Submit" class="btn button-md">{{ __('Login') }}</button>
                    </div>
                    
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
