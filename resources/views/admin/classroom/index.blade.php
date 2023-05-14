@extends('layouts.admin_layout')
@section('title', 'Classroom Setting')
@section('content')
<!--Main container start -->
<main class="ttr-wrapper">
    <div class="container-fluid">
        <div class="db-breadcrumb">
            <h4 class="breadcrumb-title">All Classrooms</h4>
            <ul class="db-breadcrumb-list">
                <li><a href="{{url('admin/home')}}"><i class="fa fa-home"></i>Home</a></li>
                <li>All Classrooms</li>
            </ul>
        </div>	
        <div class="row">
            <!-- Your Profile Views Chart -->
            <div class="col-lg-12 m-b30">
                <div class="widget-box">
                    <div class="wc-title">
                        <h4>All Classrooms</h4>
                        <div class="">
                            <a class="btn btn-primary" href="{{url('admin/classroom/create')}}" role="button">
                                <i class="fas fa-solid fa-plus"></i>  Add New Classroom
                            </a>
                        </div>
                    </div>
                    <div class="widget-inner">
                        <table id="example" class="table table-hover">
                            <thead class="thead-light">
                            <tr>
                              <th>#</th>
                              <th>Course Name</th>
                              <th>Batch Name</th>
                              <th>Teacher Name</th>
                              <th>Fee</th>
                              <th>Class Type</th>
                              <th>Status</th>
                              <th>List</th>
                              <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $no=1; ?>
                                @foreach($classrooms as $classroom)
                                <tr>
                                    <td>{{$no++}}</td>
                                    
                                    <td>{{$classroom->course->course_name}}</td>
                                    <td>{{$classroom->batch->batch_name}}</td>
                                    <td>{{$classroom->teacher->name}}</td>
                                    
                                    <td>{{$classroom->fee}}</td>
                                    <td>
                                        @if ($classroom->class_type == 0)
                                            On-Compus
                                        @else
                                            Online
                                        @endif
                                    </td>
                                    <td>
                                        <form id="{{$classroom->id}}" action="{{route('classroom.status',$classroom->id)}}" method="post">
                                            @csrf
                                            @method('POST')
                                            <input name="status" type="checkbox" data-toggle="switchbutton" {{ ($classroom->status == '1') ? 'checked' : ''}} data-style="ios">
                                        </form>
                                    </td>

                                    <td>
                                        <a href="{{ route('classroom.student', $classroom->id) }}">
                                            <button type="submit" class="btn" data-toggle="tooltip" title="All Students">
                                                Students
                                            </button>
                                        </a> 
                                    </td>

                                    <td class="tb-action">
                                        <ul class="mailbox-toolbar">
                                            <li class="mr-2">
                                                <a href="{{ route('classroom.show', $classroom->id) }}">
                                                    <button type="submit" class="btn-circle show-btn btn-primary" data-toggle="tooltip" title="Show">
                                                        <i class="fa-solid fa-eye"></i>
                                                    </button>
                                                </a>
                                            </li>
                                            <li class="mr-2">
                                                <a href="{{url('admin/classroom/'.$classroom->id.'/edit')}}">
                                                    <button type="submit" class="btn-circle edit-btn btn-warning" data-toggle="tooltip" title="Edit">
                                                        <i class="fa fa-pen-to-square"></i>
                                                    </button>
                                                </a>  
                                            </li>
                                            <li>
                                                <form action="{{url('admin/classroom/'.$classroom->id)}}" method="POST" id="delete-form{{$classroom->id}}">
                                                    @csrf
                                                     @method('DELETE')
                                                    <button type="button" onclick="confirmDelete({{$classroom->id}})" class="btn-circle delete-btn btn-danger" data-toggle="tooltip" title="Delete">
                                                        <i class="fa fa-trash-o"></i>
                                                    </button>
                                                </form>
                                            </li>
                                            
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
<script src="{{asset ('admin/js/classroom.js')}}"></script>
@endsection