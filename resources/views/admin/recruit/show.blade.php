@extends('layouts.admin_layout')
@section('title', 'Recruitment Setting')
@section('content')
<!--Main container start -->
<main class="ttr-wrapper">
    <div class="container-fluid">
        <div class="db-breadcrumb">
            <h4 class="breadcrumb-title">All Recruitments</h4>
            <ul class="db-breadcrumb-list">
                <li><a href="{{url('admin/home')}}"><i class="fa fa-home"></i>Home</a></li>
                <li>All Recruitments</li>
            </ul>
        </div>	
        {{-- @if(session('success_message'))
                    <div class="alert alert-success">{{session('success_message')}}</div>
                @endif --}}
        @if(session('success_message'))
            <script>
                Swal.fire({
                    icon: 'success',
                    title: '{{session('success_message')}}',
                    showConfirmButton: false,
                    timer: 3000,
                    position: 'top-end',
                    toast: true,
            });
            </script>      
        @endif

        <div class="row">
            <!-- Your Profile Views Chart -->
            <div class="col-lg-12 m-b30">
                <div class="widget-box">
                    <div class="wc-title">
                        <h4>All Recruitments</h4>
                        <div class="">
                            <a class="btn btn-primary" href="{{url('admin/recruit/create')}}" role="button">
                                <i class="fas fa-solid fa-plus"></i>  Add New Recruitment
                            </a>
                        </div>
                    </div>
                    <div class="widget-inner">
                        <table id="example2" class="table table-hover display nowrap" style="width:100%">
                            <thead class="thead-light">
                            <tr>
                              <th>#</th>
                              <th>Image</th>
                              <th>Title</th>
                              <th>Teach Language</th>
                              <th>Type</th>
                              <th>Time</th>
                              <th>Salary</th>
                              <th>Total Person</th>
                              <th>Description</th>
                              <th>Requirement</th>
                              <th>Status</th>
                              <th>Author</th>
                              <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $no=1; ?>
                                @foreach($recruits as $recruit)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td><img src="{{ asset('storage/img/' . $recruit->recruit_img) }}" width="100px" height="100px" /></td>
                                    <td>{{$recruit->title}}</td>
                                    <td>{{$recruit->language->language_name}}</td>
                                    <td>{{$recruit->type}}</td>
                                    <td>{{$recruit->time}}</td>
                                    <td>{{$recruit->salary}}</td>
                                    <td>{{$recruit->total_person}}</td>
                                    <td>{!! $recruit->description !!}</td>
                                    <td>{!! $recruit->requirement !!}</td>
                                    <td>
                                        <form id="statusForm" action="{{route('recruit.status',$recruit->id)}}" method="post">
                                            @csrf
                                            @method('POST')
                                            <input name="status" type="checkbox" data-toggle="switchbutton" {{ ($recruit->status == '1') ? 'checked' : ''}} data-style="ios">
                                        </form>
                                        
                                    </td>
                                    <td>{{$recruit->user->name}}</td>
                                        
                                    <td class="tb-action">
                                        <ul class="mailbox-toolbar">
                                            <li class="mr-2">
                                                <a href="{{url('admin/recruit/'.$recruit->id.'/edit')}}">
                                                    <button type="submit" class="btn-circle edit-btn btn-warning" data-toggle="tooltip" title="Edit">
                                                        <i class="fa fa-pen-to-square"></i>
                                                    </button>
                                                </a>  
                                            </li>
                                            <li>
                                                <form action="{{url('admin/recruit/'.$recruit->id)}}" method="post" id="delete-form{{$recruit->id}}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" onclick="confirmDelete({{$recruit->id}})" class="btn-circle delete-btn btn-danger" data-toggle="tooltip" title="Delete">
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
<script src="{{asset ('admin/js/recruit.js')}}"></script>
@endsection