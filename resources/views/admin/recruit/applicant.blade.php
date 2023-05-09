@extends('layouts.admin_layout')
@section('title', 'Teacher Applicants')
@section('content')
<!--Main container start -->
<main class="ttr-wrapper">
    <div class="container-fluid">
        <div class="db-breadcrumb">
            <h4 class="breadcrumb-title">All Applicants</h4>
            <ul class="db-breadcrumb-list">
                <li><a href="{{url('admin/home')}}"><i class="fa fa-home"></i>Home</a></li>
                <li><a href="{{url('admin/recruit')}}"><i class="fa fa-home"></i>Recruitments</a></li>
                <li>All Applicants</li>
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
                        <h4>All Applicants</h4>
                        {{-- <div class="">
                            <a class="btn btn-primary" href="{{url('admin/teacher/create')}}" role="button">
                                <i class="fas fa-solid fa-plus"></i>  Add New Teacher
                            </a>
                        </div> --}}
                    </div>
                    <div class="widget-inner">
                        <table id="example2" class="table table-hover">
                            <thead class="thead-light">
                            <tr>
                              <th>#</th>
                              <th>Photo</th>
                              <th>Name</th>
                              <th>Email</th>
                              <th>Phone</th>
                              <th>Age</th>
                              <th>Gender</th>
                              <th>Background Education</th>
                              <th>Background University</th>
                              <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $no=1; ?>
                                @foreach($teachers as $teacher)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td><img src="{{ asset('storage/img/' . $teacher->user->photo) }}" width="100px" height="100px" /></td>
                                    <td>{{$teacher->user->name}}</td>
                                    <td>{{$teacher->user->email}}</td>
                                    
                                    <td>{{$teacher->user->phone}}</td>
                                    <td>
                                        @php
                                            $dob = \Carbon\Carbon::parse($teacher->user->dob);
                                        @endphp
                                        {{ $dob->diffInYears(\Carbon\Carbon::now()) }}
                                    </td>
                                    <td>{{$teacher->user->gender}}</td>

                                    <td>{{$teacher->education}}</td>
                                    <td>{{$teacher->university}}</td>
                                        
                                    <td class="tb-action">
                                        <a href="{{ route('recruit.oneapplicant',  ['id' => $teacher->recruit->id, 'app_id' => $teacher->id]) }}">
                                            <button type="submit" class="btn" data-toggle="tooltip" title="Check">
                                                Check
                                            </button>
                                        </a> 
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