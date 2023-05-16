<!-- Left sidebar menu start -->
<div class="ttr-sidebar">
    <div class="ttr-sidebar-wrapper content-scroll">
        <!-- side menu logo start -->
        <div class="ttr-sidebar-logo">
            {{-- <a href="#"><img alt="" src="assets/images/logo.png" width="122" height="27"></a> --}}
            <a href="{{url('admin/dashboard')}}">
                                
                <div class="d-flex align-items-center">
                    <div>
                        <i class="fa-solid fa-globe mr-2"></i>
                    </div>
                    <div class="align-items-baseline pt-2">
                        <h6 class="m-0">LanguageTube</h6>
                        <span class="m-0">Education & Courses</span>
                    </div>
                </div>

            </a>
            <!-- <div class="ttr-sidebar-pin-button" title="Pin/Unpin Menu">
                <i class="material-icons ttr-fixed-icon">gps_fixed</i>
                <i class="material-icons ttr-not-fixed-icon">gps_not_fixed</i>
            </div> -->
            {{-- <div class="ttr-sidebar-toggle-button">
                <i class="ti-arrow-left"></i>
            </div> --}}
        </div>
        <!-- side menu logo end -->
        <!-- sidebar menu start -->
        <nav class="ttr-sidebar-navi">
            <ul>
                <li>
                    <a href="{{url('admin/home')}}" class="ttr-material-button">
                        <span class="ttr-icon"><i class="fa-solid fa-house"></i></span>
                        <span class="ttr-label">Dashborad</span>
                    </a>
                </li>
                <li>
                    <a href="{{url('admin/language')}}" class="ttr-material-button">
                        <span class="ttr-icon"><i class="fa-solid fa-book-open"></i></span>
                        <span class="ttr-label">Languages</span>
                    </a>
                </li>
                <li>
                    <a href="{{url('admin/course')}}" class="ttr-material-button">
                        <span class="ttr-icon"><i class="fa-solid fa-book-open"></i></span>
                        <span class="ttr-label">Courses</span>
                    </a>
                </li>
                <li>
                    <a href="{{url('admin/batch')}}" class="ttr-material-button">
                        <span class="ttr-icon"><i class="fa-solid fa-book-open"></i></span>
                        <span class="ttr-label">Batches</span>
                    </a>
                </li>
                <li class="ttr-seperate"></li>
                <li>
                    <a href="{{url('admin/classroom')}}" class="ttr-material-button">
                        <span class="ttr-icon"><i class="fa-solid fa-users-rectangle"></i></span>
                        <span class="ttr-label">Classrooms</span>
                    </a>
                </li>
                <li class="ttr-seperate"></li>
                <li>
                    <a href="{{url('admin/recruit')}}" class="ttr-material-button">
                        <span class="ttr-icon"><i class="fa-solid fa-chalkboard-user"></i></span>
                        <span class="ttr-label">Recruitment</span>
                    </a>
                </li>

                <li class="ttr-seperate"></li>
                <li>
                    <a href="{{url('admin/payment')}}" class="ttr-material-button">
                        <span class="ttr-icon"><i class="fa-regular fa-credit-card"></i></span>
                        <span class="ttr-label">Payment Methods</span>
                    </a>
                </li>
                <li class="ttr-seperate"></li>
                <li>
                    <a href="{{url('admin/user')}}" class="ttr-material-button">
                        <span class="ttr-icon"><i class="fa-regular fa-user"></i></span>
                        <span class="ttr-label">Users</span>
                    </a>
                </li>
                <li>
                    <a href="{{url('admin/teacher')}}" class="ttr-material-button">
                        <span class="ttr-icon"><i class="fa-solid fa-user-tie"></i></span>
                        <span class="ttr-label">Teachers</span>
                    </a>
                </li>
                <li>
                    <a href="{{url('admin/student')}}" class="ttr-material-button">
                        <span class="ttr-icon"><i class="fa-solid fa-clipboard-user"></i></span>
                        <span class="ttr-label">Students</span>
                    </a>
                </li>
            </ul>
            <!-- sidebar menu end -->
        </nav>
        <!-- sidebar menu end -->
    </div>
</div>
<!-- Left sidebar menu end -->