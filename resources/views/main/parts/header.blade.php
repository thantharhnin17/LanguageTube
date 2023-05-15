<body id="bg">
    <div class="page-wraper">
    <div id="loading-icon-bx"></div>
        <!-- Header Top ==== -->
        <header class="header rs-nav shadow">
            <div class="top-bar">
                <div class="container">
                    <div class="row d-flex justify-content-between">
                        <div class="topbar-left">
                            <ul>
                                <li><a href="javascript:;"><i class="fa fa-envelope-o"></i>Support@website.com</a></li>
                            </ul>
                        </div>
                        <div class="topbar-right">
                            @auth
                            <li class="nav-item dropdown" style="list-style: none">
                                <a id="navbarDropdown" class="ttr-material-button ttr-submenu-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <span class="ttr-user-avatar"><img alt="" src="{{ asset('storage/img/' . Auth::user()->photo) }}" width="32" height="32"></span>
                                    {{-- {{ Auth::user()->name }} --}}
                                </a>
        
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('user.profile', ['id' => Auth::user()->id]) }}">
                                        My Profile
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
        
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            @else
                            <ul>
                                
                                <li class="{{ request()->is('login') ? 'active' : '' }}"><a href="/login">Login</a></li>
                                <li class="{{ request()->is('register') ? 'active' : '' }}"><a href="/register">Create User Account</a></li>
                            </ul>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
            <div class="sticky-header navbar-expand-lg">
                <div class="menu-bar clearfix">
                    <div class="container clearfix">
                        <!-- Header Logo ==== -->
                        <div class="menu-logo">
                            <a href="{{url('/')}}">
                                
                                <div class="d-flex align-items-center">
                                    <div>
                                        <i class="fa-solid fa-globe fa-2x mr-2"></i>
                                    </div>
                                    <div class="align-items-baseline">
                                        <h4 class="m-0">LanguageTube</h4>
                                        <span class="m-0">Education & Courses</span>
                                    </div>
                                </div>
    
                            </a>
                        </div>
                        <!-- Mobile Nav Button ==== -->
                        <button class="navbar-toggler collapsed menuicon justify-content-end" type="button" data-toggle="collapse" data-target="#menuDropdown" aria-controls="menuDropdown" aria-expanded="false" aria-label="Toggle navigation">
                            <span></span>
                            <span></span>
                            <span></span>
                        </button>
                    
                        <!-- Search Box ==== -->
                        <div class="nav-search-bar">
                            <form action="#">
                                <input name="search" value="" type="text" class="form-control" placeholder="Type to search">
                                <span><i class="ti-search"></i></span>
                            </form>
                            <span id="search-remove"><i class="ti-close"></i></span>
                        </div>
                        <!-- Navigation Menu ==== -->
                        <div class="menu-links navbar-collapse collapse justify-content-end" id="menuDropdown">
                            <div class="menu-logo">
                                <a href="{{url('/')}}">
                                
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <i class="fa-solid fa-globe fa-2x mr-2"></i>
                                        </div>
                                        <div class="align-items-baseline">
                                            <h5 class="m-0">LanguageTube</h5>
                                            <span class="m-0"><small>Education & Courses</small></span>
                                        </div>
                                    </div>
        
                                </a>
                            </div>
                            <ul class="nav navbar-nav">	
                                <li class="{{ request()->is('/') ? 'active' : '' }}">
                                    <a href="{{url('/')}}">Home</a>
                                </li>
                                <li class="{{ request()->is('classrooms') ? 'active' : '' }}">
                                    <a href="{{url('classrooms')}}">All Classrooms</a>
                                </li>
                                <li class="{{ request()->is('recruits') ? 'active' : '' }}">
                                    <a href="{{url('recruits')}}">Recruitment</a>
                                </li>
                                <li class="{{ request()->is('about') ? 'active' : '' }}">
                                    <a href="{{url('about')}}">About</a>
                                </li>
                                <li class="{{ request()->is('contact') ? 'active' : '' }}">
                                    <a href="{{url('contact')}}">Contact Us</a>
                                </li>
                            </ul>
                            
                        </div>
                        <!-- Navigation Menu END ==== -->
                    </div>
                </div>
            </div>
        </header>
        <!-- Header Top END ==== -->