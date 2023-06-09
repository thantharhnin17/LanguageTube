<!-- Footer ==== -->
<footer>
    <div class="footer-top">
        <div class="pt-exebar">
            <div class="container">
                <div class="d-flex align-items-stretch">
                    <div class="pt-logo mr-auto">
                        <a href="{{url('/')}}">
                            <div class="d-flex align-items-center">
                                <div>
                                    <i class="fa-solid fa-globe fa-3x mr-2"></i>
                                </div>
                                <div class="align-items-baseline">
                                    <h3 class="m-0 text-white">LanguageTube</h3>
                                    <span class="m-0">Education & Courses</span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="pt-social-link">
                        <ul class="list-inline m-a0">
                            <li><a href="#" class="btn-link"><i class="fa-brands fa-facebook fa-xl mx-2"></i></a></li>
                            <li><a href="#" class="btn-link"><i class="fa-brands fa-telegram fa-xl mx-2"></i></a></li>
                            <li><a href="#" class="btn-link"><i class="fa-brands fa-linkedin fa-xl mx-2"></i></a></li>
                        </ul>
                    </div>
                    
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-4 col-md-5 m-b30">
                    <div class="footer-info-bx">
                        <h5 class="footer-title">Contact <span>Information</span></h5>
                        <p class="text-capitalize m-b20">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                        <div class="widget widget_getintuch">	
                            <ul>
                                <li><i class="ti-location-pin"></i>75k Newcastle St. Ponte Vedra Beach, FL 309382 New York</li>
                                <li><i class="ti-mobile"></i>0800-123456 (24/7 Support Line)</li>
                                <li><i class="ti-email"></i>info@example.com</li>
                            </ul>
                        </div>
                        
                    </div>
                </div>

                <div class="col-12 col-lg-3 col-md-7 col-sm-12">
                    <div class="row">
                        <div class="col-6 col-lg-6 col-md-6 col-sm-6">
                            <div class="widget footer_widget">
                                <h5 class="footer-title">School</h5>
                                <ul>
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
                        </div>
                        
                        <div class="col-6 col-lg-6 col-md-6 col-sm-6">
                            <div class="widget footer_widget">
                                <h5 class="footer-title">Courses</h5>
                                <ul>
                                    <li><a href="courses.html">English</a></li>
                                    <li><a href="courses-details.html">Japanese</a></li>
                                    <li><a href="membership.html">Korean</a></li>
                                    <li><a href="profile.html">Chinese</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                
                
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 text-center">COPYRIGHT &copy; LANUAGETUBE All Right Reserved</div>
            </div>
        </div>
    </div>
</footer>
<!-- Footer END ==== -->
<button class="back-to-top fa fa-chevron-up" ></button>
</div>