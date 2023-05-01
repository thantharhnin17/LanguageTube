@extends('layouts.admin_layout')
@section('title', 'Edit Language')
@section('content')
<!--Main container start -->
<main class="ttr-wrapper">
    <div class="container-fluid">
        <div class="db-breadcrumb">
            <h4 class="breadcrumb-title">Edit Language</h4>
            <ul class="db-breadcrumb-list">
                <li><a href="{{url('admin/home')}}"><i class="fa fa-home"></i>Home</a></li>
                <li><a href="{{url('admin/language')}}"><i class="fa fa-home"></i>Languages</a></li>
                <li>Edit Language</li>
            </ul>
        </div>	
        <div class="row">
            <!-- Your Profile Views Chart -->
            <div class="col-lg-12 m-b30">
                <div class="widget-box">
                    <div class="wc-title">
                        <h4>Edit Language</h4>
                    </div>
                    <div class="widget-inner widget-inner-create">
                        <form method="POST" action="{{route('language.update',$language->id)}}" enctype="multipart/form-data" class="edit-profile m-b30">
                            @csrf
                            @method('PUT')
                            <div class="row wi-body">
                                <div class="form-group col-12">
                                    <label class="col-form-label">Language Name</label>
                                    <div>
                                        <input name="language_name" class="form-control" type="text" value="{{$language->name}}">
                                    </div>
                                </div>
                                
                                <div class="seperator"></div>
                                
                                <div class="col-12 m-t20">
                                    <div class="ml-auto">
                                        <h6 class="m-form__section">Add Item (There must have at least one level)</h6>
                                    </div>
                                </div>
                                <div class="col-12 mb-2">
                                    <table id="item-add" style="width:100%;">
                                        @foreach($levels as $level)
                                        <tr class="list-item">
                                            <td>
                                                <div class="row">
                                                    <div class="col-md-10">
                                                        <label class="col-form-label">Level Name</label>
                                                        <div>
                                                            <input type="hidden" name="levelid[]" value="{{$level->id}}">
                                                            <input name="level_name[]" class="form-control" type="text" value="{{$level->name}}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">

                                                        <label class="col-form-label">Close</label>
                                                        <div class="form-group">
                                                            {{-- <form action="{{url('level/'.$level->id)}}" method="POST">
                                                                @csrf
                                                                 @method('DELETE')
                                                                <button type="submit" class="delete" data-toggle="tooltip" title="Delete">
                                                                    <i class="fa fa-close"></i>
                                                                </button>
                                                            </form> --}}
                                                            {{-- <a class="delete" href="#"><i class="fa fa-close"></i></a> --}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
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
<script src="{{asset ('admin/js/language.js')}}"></script>
@endsection