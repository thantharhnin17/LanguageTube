@extends('layouts.admin_layout')
@section('title', 'Course Setting')
@section('content')
<!--Main container start -->
<main class="ttr-wrapper">
    <div class="container-fluid">
        <div class="db-breadcrumb">
            <h4 class="breadcrumb-title">All Courses</h4>
            <ul class="db-breadcrumb-list">
                <li><a href="{{url('home')}}"><i class="fa fa-home"></i>Home</a></li>
                <li>All Courses</li>
            </ul>
        </div>	
        <div class="row">
            <!-- Your Profile Views Chart -->
            <div class="col-lg-12 m-b30">
                <div class="widget-box">
                    <div class="wc-title">
                        <h4>All Courses</h4>
                        <div class="">
                            <a class="btn btn-primary" href="{{url('course/create')}}" role="button">
                                <i class="fas fa-solid fa-plus"></i>  Add New Courses
                            </a>
                        </div>
                    </div>
                    <div class="widget-inner">
                        <table id="example1" class="table table-hover">
                            <thead class="thead-light">
                            <tr>
                              <th>#</th>
                              <th>Image</th>
                              <th>Name</th>
                              <th>Description</th>
                              <th>Language</th>
                              <th>Level</th>
                              <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $no=1; ?>
                                @foreach($courses as $course)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td><img src="{{ asset('storage/img/' . $course->course_img) }}" width="100px" height="100px" /></td>
                                    <td>{{$course->course_name}}</td>
                                    <td><p> {!! $course->description !!} </p></td>
                                    <td>{{$course->level->language->language_name}}</td>
                                    <td>{{$course->level->level_name}}</td>
                                    <td class="tb-action">
                                        <ul class="mailbox-toolbar">
                                            <li class="mr-2">
                                                <a href="{{url('course/'.$course->id.'/edit')}}">
                                                    <button type="submit" class="btn-circle edit-btn btn-warning" data-toggle="tooltip" title="Edit">
                                                        <i class="fa fa-pen-to-square"></i>
                                                    </button>
                                                </a>  
                                            </li>
                                            <li>
                                                <form action="{{url('course/'.$course->id)}}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn-circle delete-btn btn-danger" data-toggle="tooltip" title="Delete">
                                                        <i class="fa fa-trash-o"></i>
                                                    </button>
                                                </form>
                                            </li>
                                            
											{{-- <li class="edit-btn btn-warning" data-toggle="tooltip" title="Edit"><i class="fa fa-pen-to-square"></i></li>
											<li class="delete-btn btn-danger" data-toggle="tooltip" title="Delete"><i class="fa fa-trash-o"></i></li> --}}
										</ul>
                                    </td>
                                </tr>
                                @endforeach
                                
          
                            </tbody>
                            
                          </table>
                    </div>
                </div>
            </div>
            <!-- Your Profile Views Chart END-->
        </div>
    </div>
</main>

@endsection