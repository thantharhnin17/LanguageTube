@extends('layouts.admin_layout')
@section('title', 'Applicant Profile')
@section('content')
<!--Main container start -->
<main class="ttr-wrapper">
    <div class="container-fluid">
        <div class="db-breadcrumb">
            <h4 class="breadcrumb-title">Applicant Profile</h4>
            <ul class="db-breadcrumb-list">
                <li><a href="{{url('admin/home')}}"><i class="fa fa-home"></i>Home</a></li>
                <li><a href="{{url('admin/recruit')}}"><i class="fa fa-home"></i>Recruitments</a></li>
                <li>Applicant Profile</li>
            </ul>
        </div>	
        <div class="row">
            <!-- Your Profile Views Chart -->
            <div class="col-lg-12 m-b30">
                <div class="widget-box">
                    <div class="wc-title">
                        <h4>Applicant Profile</h4>
                    </div>
                    <div class="widget-inner widget-inner-create">
                        <div class="card r-overview">
                            <div class="row mb-3">
                                <div class="col-12 col-md-3">Profile</div>
                                <div class="col-12 col-md-9"><img src="{{ asset('storage/img/' . $teacher->user->photo) }}" width="100px" height="100px" /></div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-12 col-md-3">Name</div>
                                <div class="col-12 col-md-9">{{$teacher->user->name}}</div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-12 col-md-3">Email</div>
                                <div class="col-12 col-md-9">{{$teacher->user->email}}</div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-12 col-md-3">Phone</div>
                                <div class="col-12 col-md-9">{{$teacher->user->phone}}</div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-12 col-md-3">Age</div>
                                <div class="col-12 col-md-9">@php
                                    $dob = \Carbon\Carbon::parse($teacher->user->dob);
                                @endphp
                                {{ $dob->diffInYears(\Carbon\Carbon::now()) }}</div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-12 col-md-3">Gender</div>
                                <div class="col-12 col-md-9">{{$teacher->user->gender}}</div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-12 col-md-3">Teach Language</div>
                                <div class="col-12 col-md-9">{{$levels->first()->language->language_name}}</div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-12 col-md-3">Teach Levels</div>
                                <div class="col-12 col-md-9">
                                    @foreach($levels as $lel)
                                        {{$lel->level_name}}{{ $loop->last ? '' : ',' }}
                                    @endforeach
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-12 col-md-3">Work Type</div>
                                <div class="col-12 col-md-9">
                                    @if ($teacher->type == 0)
                                        On-Compus  
                                    @else
                                        Online
                                    @endif
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-12 col-md-3">Work Time</div>
                                <div class="col-12 col-md-9">
                                    @if ($teacher->time == 0)
                                        Full-time  
                                    @else
                                        Part-time
                                    @endif
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-12 col-md-3">Background Education</div>
                                <div class="col-12 col-md-9">{{$teacher->education}}</div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-12 col-md-3">Background University</div>
                                <div class="col-12 col-md-9">{{$teacher->university}}</div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-12 col-md-3">Comment</div>
                                <div class="col-12 col-md-9">{{$teacher->comment}}</div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-12 col-md-3">CV Form</div>
                                <div class="col-12 col-md-9"><img src="{{ asset('storage/img/' . $teacher->cv_form) }}" width="100px" height="100px" /></div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-12 col-md-3">Certificates / Degrees</div>
                                <div class="col-12 col-md-9">
                                    @foreach($teacher->teacher_certificates as $tc)
                                        <img src="{{ asset('storage/img/' . $tc->certi_img) }}" width="100px" height="100px" />
                                    @endforeach
                                </div>
                            </div>

                            <div class="row my-3">
                                <div class="col-12 d-flex justify-content-end">
                                    <form action="{{ route('recruit.process', ['id' => $teacher->recruit->id, 'app_id' => $teacher->id]) }}" method="post">
                                        @csrf
                                        @method('POST')
                                        <button type="submit" class="btn btn-secondary ml-2" data-toggle="tooltip" title="reject">
                                            Reject
                                        </button>
                                        <button type="submit" class="btn" data-toggle="tooltip" title="accept">
                                            Accept
                                        </button>
                                        <input type="hidden" name="action" value="">
                                    </form>

                                    
                                    
                                </div>
                            </div>

                        </div>
                    </div>
                    
                </div>
            </div>
            <!-- Your Profile Views Chart END-->
        </div>
    </div>
</main>
<script>
    $(document).ready(function() {
        $('form').on('click', 'button[type="submit"]', function() {
            var action = $(this).attr('title');
            $('input[name="action"]').val(action);
        });
    });
</script>

<script src="{{asset ('admin/js/course.js')}}"></script>
@endsection