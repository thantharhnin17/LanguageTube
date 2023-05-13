@extends('layouts.admin_layout')
@section('title', 'Payment Setting')
@section('content')
<!--Main container start -->
<main class="ttr-wrapper">
    <div class="container-fluid">
        <div class="db-breadcrumb">
            <h4 class="breadcrumb-title">All Payment Methods</h4>
            <ul class="db-breadcrumb-list">
                <li><a href="{{url('admin/home')}}"><i class="fa fa-home"></i>Home</a></li>
                <li>All Payment Methods</li>
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
                        <h4>All Payment Methods</h4>
                        <div class="">
                            <a class="btn btn-primary" href="{{url('admin/payment/create')}}" role="button">
                                <i class="fas fa-solid fa-plus"></i>  Add New Payment Method
                            </a>
                        </div>
                    </div>
                    <div class="widget-inner">
                        <table id="example1" class="table table-hover">
                            <thead class="thead-light">
                            <tr>
                              <th>#</th>
                              <th>Logo</th>
                              <th>Payment Method Name</th>
                              <th>Account Name</th>
                              <th>Account Number</th>
                              <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $no=1; ?>
                                @foreach($payments as $payment)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td><img src="{{ asset('storage/img/' . $payment->logo) }}" width="100px" height="100px" /></td>
                                    <td>{{$payment->payName}}</td>
                                    <td>{{$payment->accName}}</td>
                                    <td>{{$payment->accNo}}</td>
                                    <td class="tb-action">
                                        <ul class="mailbox-toolbar">
                                            <li class="mr-2">
                                                <a href="{{url('admin/payment/'.$payment->id.'/edit')}}">
                                                    <button type="submit" class="btn-circle edit-btn btn-warning" data-toggle="tooltip" title="Edit">
                                                        <i class="fa fa-pen-to-square"></i>
                                                    </button>
                                                </a>  
                                            </li>
                                            <li>
                                                <form action="{{url('admin/payment/'.$payment->id)}}" method="POST" id="delete-form{{$payment->id}}">
                                                    @csrf
                                                     @method('DELETE')
                                                    <button type="button" onclick="confirmDelete({{$payment->id}})" class="btn-circle delete-btn btn-danger" data-toggle="tooltip" title="Delete">
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
@endsection