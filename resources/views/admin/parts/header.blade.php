<header class="ttr-header">
    <div class="ttr-header-wrapper">
        <!--sidebar menu toggler start -->
        <div class="ttr-toggle-sidebar ttr-material-button">
            <i class="ti-close ttr-open-icon"></i>
            <i class="ti-menu ttr-close-icon"></i>
        </div>
        <!--sidebar menu toggler end -->
        <!--logo start -->
        <div class="ttr-logo-box">
            <div>
                <a href="{{url('admin/home')}}"  class="ttr-logo text-white">
                                
                    <div class="d-flex align-items-center">
                        <div>
                            <i class="fa-solid fa-globe mr-2"></i>
                        </div>
                        <div class="align-items-baseline d-none d-md-block pt-2">
                            <h5 class="m-0">LanguageTube</h5>
                            <span class="m-0">Education & Courses</span>
                        </div>
                    </div>

                </a>
                {{-- <a href="index.html">
                    <img class="ttr-logo-mobile" alt="" src="assets/images/logo-mobile.png" width="30" height="30">
                    <img class="ttr-logo-desktop" alt="" src="assets/images/logo-white.png" width="160" height="27">
                </a> --}}
            </div>
        </div>
        <!--logo end -->
        
        <div class="ttr-header-right ttr-with-seperator">
            <!-- header right menu start -->
            <ul class="ttr-header-navigation">
                
                <li>
                    <a href="#" class="ttr-material-button ttr-submenu-toggle"><span class="">{{ Auth::user()->name }}</span></a>
                    <div class="ttr-header-submenu">
                        <ul>
                            {{-- <li><a href="user-profile.html">My profile</a></li> --}}
                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                              document.getElementById('logout-form').submit();">
                                 {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
            <!-- header right menu end -->
        </div>
        <!--header search panel start -->
        <div class="ttr-search-bar">
            <form class="ttr-search-form">
                <div class="ttr-search-input-wrapper">
                    <input type="text" name="qq" placeholder="search something..." class="ttr-search-input">
                    <button type="submit" name="search" class="ttr-search-submit"><i class="ti-arrow-right"></i></button>
                </div>
                <span class="ttr-search-close ttr-search-toggle">
                    <i class="ti-close"></i>
                </span>
            </form>
        </div>
        <!--header search panel end -->
    </div>
</header>
