@extends('layouts.admin_layout')
@section('title', 'Edit Payment Method')
@section('content')
<!--Main container start -->
<main class="ttr-wrapper">
    <div class="container-fluid">
        <div class="db-breadcrumb">
            <h4 class="breadcrumb-title">Edit Payment</h4>
            <ul class="db-breadcrumb-list">
                <li><a href="{{url('admin/home')}}"><i class="fa fa-home"></i>Home</a></li>
                <li><a href="{{url('admin/payment')}}"><i class="fa fa-home"></i>Payment Methods</a></li>
                <li>Edit Payment</li>
            </ul>
        </div>	
        <div class="row">
            <!-- Your Profile Views Chart -->
            <div class="col-lg-12 m-b30">
                <div class="widget-box">
                    <div class="wc-title">
                        <h4>Edit Payment</h4>
                    </div>
                    <div class="widget-inner widget-inner-create">
                        <form method="POST" action="{{route('payment.update',$payment->id)}}" enctype="multipart/form-data" class="edit-profile m-b30">
                            @csrf
                            @method('PUT')
                            <div class="row wi-body">

                                <div class="form-group col-12">
                                    <label class="col-form-label">Payment Method Name</label>
                                    <div>
                                        <select class="form-control" id="payName" name="payName">
                                            <option selected value="">Choose Payment Method</option>
                                            @foreach ($payers as $payer)
                                              <option value="{{ $payer }}" {{ $payment->payName == $payer ? 'selected' : '' }}>
                                                {{ $payer }}
                                              </option>
                                            @endforeach 
                                        </select>
                                        <span class="help-inline">@error('payName'){{$message}}@enderror</span>
                                    </div>
                                </div>

                                <div class="form-group col-12">
                                    <label class="col-form-label">Payment Account Name</label>
                                    <div>
                                        <input name="accName" class="form-control" type="text" value="{{$payment->accName}}">
                                        <span class="help-inline">@error('accName'){{$message}}@enderror</span>
                                    </div>
                                </div>

                                <div class="form-group col-12">
                                    <label class="col-form-label">Payment Account Number</label>
                                    <div>
                                        <input name="accNo" class="form-control" type="text" value="{{$payment->accNo}}">
                                        <span class="help-inline">@error('accNo'){{$message}}@enderror</span>
                                    </div>
                                </div>

                                <div class="form-group col-12">
                                    <label class="col-form-label">Payment Logo</label>
                                    <div>
                                        <input name="logo" type="file" class="form-control-file" value="{{$payment->logo}}">
                                        <span class="help-inline">@error('logo'){{$message}}@enderror</span>
                                    </div>
                                </div>
                                
                                <div class="seperator"></div>
                                
                            </div>
                            <div class="row wi-foot mt-3">
                                <div class="col-12">
                                    <a href="{{ redirect()->back()->getTargetUrl() }}" class="btn btn-secondary">Back</a>
                                    <button type="submit" class="btn">Update</button>
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