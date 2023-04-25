@extends('layouts.admin_layout')
@section('title', 'Language Setting')
@section('content')
<!--Main container start -->
<main class="ttr-wrapper">
    <div class="container-fluid">
        <div class="db-breadcrumb">
            <h4 class="breadcrumb-title">All Languages</h4>
            <ul class="db-breadcrumb-list">
                <li><a href="{{url('home')}}"><i class="fa fa-home"></i>Home</a></li>
                <li>All Languages</li>
            </ul>
        </div>	
        <div class="row">
            <!-- Your Profile Views Chart -->
            <div class="col-lg-12 m-b30">
                <div class="widget-box">
                    <div class="wc-title">
                        <h4>All Languages</h4>
                        <div class="">
                            <a class="btn btn-primary" href="{{url('language/create')}}" role="button">
                                <i class="fas fa-solid fa-plus"></i>  Add New Languages
                            </a>
                        </div>
                    </div>
                    <div class="widget-inner">
                        <table id="example1" class="table table-hover">
                            <thead class="thead-light">
                            <tr>
                              <th>#</th>
                              <th>Name</th>
                              <th>Levels</th>
                              <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $no=1; ?>
                                @foreach($languages as $language)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$language->name}}</td>
                                    <td>
                                        @foreach($levels as $level)
                                            @if ($language->id == $level->language_id)
                                                {{$level->name}}{{ $loop->last ? '' : ',' }}
                                            @endif
                                        @endforeach
                                    </td>
                                    <td class="tb-action">
                                        <ul class="mailbox-toolbar">
											<li class="edit-btn" data-toggle="tooltip" title="Edit"><i class="fa fa-pen-to-square"></i></li>
											<li class="delete-btn" data-toggle="tooltip" title="Delete"><i class="fa fa-trash-o"></i></li>
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