@extends('layouts.layout')
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
                <p>Don't have an account? <a href="register.html">Create one here</a></p>
            </div>	
            <form class="contact-bx">
                <div class="row placeani">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <div class="input-group">
                                <label>Your Name</label>
                                <input name="dzName" type="text" required="" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <div class="input-group"> 
                                <label>Your Password</label>
                                <input name="dzEmail" type="password" class="form-control" required="">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group form-forget">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="customControlAutosizing">
                                <label class="custom-control-label" for="customControlAutosizing">Remember me</label>
                            </div>
                            <a href="forget-password.html" class="ml-auto">Forgot Password?</a>
                        </div>
                    </div>
                    <div class="col-lg-12 m-b30">
                        <button name="submit" type="submit" value="Submit" class="btn button-md">Login</button>
                    </div>
                    
                </div>
            </form>
        </div>
    </div>
</div>
@endsection