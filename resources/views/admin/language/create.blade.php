@extends('layouts.admin_layout')
@section('title', 'Create New Language')
@section('content')
<!--Main container start -->
<main class="ttr-wrapper">
    <div class="container-fluid">
        <div class="db-breadcrumb">
            <h4 class="breadcrumb-title">Add New Language</h4>
            <ul class="db-breadcrumb-list">
                <li><a href="{{url('home')}}"><i class="fa fa-home"></i>Home</a></li>
                <li><a href="{{url('language')}}"><i class="fa fa-home"></i>Languages</a></li>
                <li>Add New Language</li>
            </ul>
        </div>	
        <div class="row">
            <!-- Your Profile Views Chart -->
            <div class="col-lg-12 m-b30">
                <div class="widget-box">
                    <div class="wc-title">
                        <h4>Add New Language</h4>
                    </div>
                    <div class="widget-inner widget-inner-create">
                        <form method="POST" action="{{route('language.store')}}" enctype="multipart/form-data" class="edit-profile m-b30">
                            @csrf
                            @method('POST')
                            <div class="row wi-body">
                                <div class="form-group col-12">
                                    <label class="col-form-label">Language Name</label>
                                    <div>
                                        <input name="languagename" class="form-control" type="text" value="">
                                    </div>
                                </div>
                                
                                <div class="seperator"></div>
                                
                                
                                <div class="col-12">
                                    <table id="item-add" style="width:100%;">
                                        <tr class="list-item">
                                            <td>
                                                <div class="row">
                                                    <div class="col-md-10">
                                                        <label class="col-form-label">Level Name</label>
                                                        <div>
                                                            <input name="levelname[]" class="form-control" type="text" value="">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label class="col-form-label">Close</label>
                                                        <div class="form-group">
                                                            <a class="delete" href="#"><i class="fa fa-close"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-12">
                                    <button type="button" class="btn-secondry add-item m-r5"><i class="fa fa-fw fa-plus-circle"></i>Add Level</button>
                                </div>
                            </div>
                            <div class="row wi-foot mt-3">
                                <div class="col-12">
                                    <button type="reset" class="btn-secondry mr-2">Clear</button>
                                    <button type="submit" class="btn">Save changes</button>
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