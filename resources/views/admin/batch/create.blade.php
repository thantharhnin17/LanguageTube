@extends('layouts.admin_layout')
@section('title', 'Create New Batch')
@section('content')
<!--Main container start -->
<main class="ttr-wrapper">
    <div class="container-fluid">
        <div class="db-breadcrumb">
            <h4 class="breadcrumb-title">Add New Batch</h4>
            <ul class="db-breadcrumb-list">
                <li><a href="{{url('admin/home')}}"><i class="fa fa-home"></i>Home</a></li>
                <li><a href="{{url('admin/batch')}}"><i class="fa fa-home"></i>Batches</a></li>
                <li>Add New Batch</li>
            </ul>
        </div>	
        <div class="row">
            <!-- Your Profile Views Chart -->
            <div class="col-lg-12 m-b30">
                <div class="widget-box">
                    <div class="wc-title">
                        <h4>Add New Batch</h4>
                    </div>
                    <div class="widget-inner widget-inner-create">
                        <form method="POST" action="{{route('batch.store')}}" enctype="multipart/form-data" class="edit-profile m-b30">
                            @csrf
                            @method('POST')
                            <div class="row wi-body">
                                <div class="form-group col-12">
                                    <label class="col-form-label">Batch Name</label>
                                    <div>
                                        <input name="batch_name" class="form-control" type="text" value="{{ old('batch_name') }}">
                                        <span class="help-inline">@error('batch_name'){{$message}}@enderror</span>
                                    </div>
                                </div>
                                
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
@endsection