@extends('layouts.admin_layout')
@section('title', 'Student Purchasement')
@section('content')
    <!--Main container start -->
    <main class="ttr-wrapper">
        <div class="container-fluid">
            <div class="db-breadcrumb">
                <h4 class="breadcrumb-title">All Students</h4>
                <ul class="db-breadcrumb-list">
                    <li><a href="{{ url('admin/home') }}"><i class="fa fa-home"></i>Home</a></li>
                    <li><a href="{{ url('admin/classroom') }}"><i class="fa fa-home"></i>Classrooms</a></li>
                    <li>All Students</li>
                </ul>
            </div>
            {{-- @if (session('success_message'))
                    <div class="alert alert-success">{{session('success_message')}}</div>
                @endif --}}
            @if (session('success_message'))
                <script>
                    Swal.fire({
                        icon: 'success',
                        title: '{{ session('success_message') }}',
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
                            <h4>All Students</h4>

                        </div>
                        <div class="widget-inner">
                            <table id="example" class="table table-hover">
                                <thead class="thead-light">
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Payment Status</th>
                                        <th>Checker</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    @foreach ($students as $student)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $student->name }}</td>
                                            <td>{{ $student->email }}</td>

                                            <td>{{ $student->phone }}</td>

                                            <td>
                                                @foreach ($paymentConfirms as $paymentConfirm)
                                                    @if ($paymentConfirm->payment->classroomStudent->user_id == $student->id && $paymentConfirm->payment->classroomStudent->classroom_id == $classroom->id)
                                                        
                                                        @if ($paymentConfirm->confirmStatus == 'Pending') 
                                                            <p class="text-warning">Pending</p> 
                                                        @elseif ($paymentConfirm->confirmStatus == 'Accepted')    
                                                            <p class="text-success">Accepted</p>
                                                        @else
                                                            <p class="text-secondary">Rejected</p>
                                                        @endif

                                                    @endif
                                                @endforeach

                                                
                                            </td>
                                            <td>
                                                @foreach ($paymentConfirms as $paymentConfirm)
                                                    @if ($paymentConfirm->payment->classroomStudent->user_id == $student->id && $paymentConfirm->payment->classroomStudent->classroom_id == $classroom->id)
                                                        @if ($paymentConfirm->user_id != null)
                                                            {{$paymentConfirm->user->name }}
                                                        @endif
                                                    @endif
                                                @endforeach
                                            </td>

                                            <td class="tb-action">
                                                <a href="{{ route('classroom.onestudent',  ['id' => $classroom->id, 'stu_id' => $student->id]) }}">
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
