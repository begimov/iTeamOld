@extends('c.template')

@section('title')

@stop

@section('head')

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" tppabs="http://themescare.com/demos/preview-finance/assets/css/bootstrap.min.css">

    <!-- Font awesome CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}" tppabs="http://themescare.com/demos/preview-finance/assets/css/font-awesome.min.css">

    <!-- Animate CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/animate.min.css') }}" tppabs="http://themescare.com/demos/preview-finance/assets/css/animate.min.css">

    <!-- OwlCarousel CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.css') }}" tppabs="http://themescare.com/demos/preview-finance/assets/css/owl.carousel.css">

    <!-- OwlCarousel CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/slicknav.min.css') }}" tppabs="http://themescare.com/demos/preview-finance/assets/css/slicknav.min.css">

    <!-- Magnific popup CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}" tppabs="http://themescare.com/demos/preview-finance/assets/css/magnific-popup.css">

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" tppabs="http://themescare.com/demos/preview-finance/assets/css/style.css">

    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}" tppabs="http://themescare.com/demos/preview-finance/assets/css/responsive.css">

@stop

@section('main')

    {{--<section id="learn" class="content">--}}
        {{--<div class="container">--}}
            {{--<div class="row">--}}
                {{--<div class="box">--}}
                    {{--<div class="col-lg-12">--}}
                        {{-- НАЧАЛО --}}

                        <!--Site Preloader Start-->
                        <div class="finance-site-preloader" id="preloader">
                            <div class="sk-cube-grid">
                                <div class="sk-cube sk-cube1"></div>
                                <div class="sk-cube sk-cube2"></div>
                                <div class="sk-cube sk-cube3"></div>
                                <div class="sk-cube sk-cube4"></div>
                                <div class="sk-cube sk-cube5"></div>
                                <div class="sk-cube sk-cube6"></div>
                                <div class="sk-cube sk-cube7"></div>
                                <div class="sk-cube sk-cube8"></div>
                                <div class="sk-cube sk-cube9"></div>
                            </div>
                        </div>
                        <!--Site Preloader End-->

                        <!-- Slider Area Start -->
                        <section class="finance-slider-area">
                            <div class="finance-slide">
                                <div class="finance-main-slide slide-item-1">
                                    <div class="finance-main-caption">
                                        <div class="finance-caption-cell">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-md-8 col-md-offset-2">
                                                        <h4>The Future of Digital Products Together.</h4>
                                                        <h2>we provide financial planning</h2>
                                                        <p>Comprehensive financial advice and financial services that are tailored to meet your individual needs. </p>
                                                        <a href="#" class="finance-btn">learn more</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="finance-main-slide slide-item-2">
                                    <div class="finance-main-caption">
                                        <div class="finance-caption-cell">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-md-8 col-md-offset-2">
                                                        <h4>helping you to </h4>
                                                        <h2>grow your business </h2>
                                                        <p>Comprehensive financial advice and financial services that are tailored to meet your individual needs. </p>
                                                        <a href="#" class="finance-btn">learn more</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <!-- Slider Area End -->



                        <!-- Slider Bottom Area Start -->
                        <section class="finance-service-area">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="service-box">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="service-left">
                                                        <h3>don't see what are you looking for?</h3>
                                                        <p>Use our Budget planner to keep on top of your spending, use our tool to work out what you have left after paying your most important bills.</p>
                                                        <a href="#" class="finance-white-btn">read more</a>
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="service-right">
                                                        <div class="row">
                                                            <div class="col-md-6 col-sm-6">
                                                                <div class="single-service">
                                                                    <img src="assets/img/expert.png" tppabs="http://themescare.com/demos/preview-finance/assets/img/expert.png" alt="expertt" />
                                                                    <div class="service-text">
                                                                        <h3>Financial Experts</h3>
                                                                        <p>Coordinates for abs po oordinates for abs potioning the closes.</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-sm-6">
                                                                <div class="single-service">
                                                                    <img src="assets/img/key.png" tppabs="http://themescare.com/demos/preview-finance/assets/img/key.png" alt="expertt" />
                                                                    <div class="service-text">
                                                                        <h3>Business Solution</h3>
                                                                        <p>Coordinates for abs po oordinates for abs potioning the closes.</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6 col-sm-6">
                                                                <div class="single-service">
                                                                    <img src="assets/img/process.png" tppabs="http://themescare.com/demos/preview-finance/assets/img/process.png" alt="expertt" />
                                                                    <div class="service-text">
                                                                        <h3>Creative Process</h3>
                                                                        <p>Coordinates for abs po oordinates for abs potioning the closes.</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-sm-6">
                                                                <div class="single-service">
                                                                    <img src="assets/img/cogs.png" tppabs="http://themescare.com/demos/preview-finance/assets/img/cogs.png" alt="expertt" />
                                                                    <div class="service-text">
                                                                        <h3>24/7 Support</h3>
                                                                        <p>Coordinates for abs po oordinates for abs potioning the closes.</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <!-- Slider Bottom Area End -->



                        <!-- About Area Start -->
                        <section class="finance-About-area section_100">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="about-left">
                                            <div class="finance-section-title">
                                                <h3>about finance</h3>
                                                <div class="title-line"></div>
                                                <img src="assets/img/light-logo.png" tppabs="http://themescare.com/demos/preview-finance/assets/img/light-logo.png" alt="light logo" />
                                            </div>
                                            <h3>More Than 1000 Financial Planners, One Philosophy - Finance</h3>
                                            <p>Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="about-right">
                                            <a href="#">
                                                <img src="assets/img/about.jpg" tppabs="http://themescare.com/demos/preview-finance/assets/img/about.jpg" alt="about image">
                                                <div class="about-right-overlay"></div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <!-- About Area End -->



                        <!-- Project Area Start -->
                        <section class="finance-project-area section_t_100 section_b_70">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="finance-section-title-center">
                                            <h3>featured project</h3>
                                            <div class="title-line"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="finance-project-slide">
                                            <div class="single-project-slide">
                                                <img src="assets/img/project-1.jpg" tppabs="http://themescare.com/demos/preview-finance/assets/img/project-1.jpg" alt="project 1" />
                                                <div class="project-text">
                                                    <h3>Project Heading</h3>
                                                    <h5>Industry Name</h5>
                                                    <p>Lorem Ipsum is simply dummy text of the printing typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since...</p>
                                                </div>
                                            </div>
                                            <div class="single-project-slide">
                                                <img src="assets/img/project-2.jpg" tppabs="http://themescare.com/demos/preview-finance/assets/img/project-2.jpg" alt="project 1" />
                                                <div class="project-text">
                                                    <h3>Project Heading</h3>
                                                    <h5>Industry Name</h5>
                                                    <p>Lorem Ipsum is simply dummy text of the printing typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since...</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <!-- Project Area End -->



                        <!-- Quotes Area Start -->
                        <section class="finance-quotes-area section_100">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="finance-quotes-text">
                                            <h2>Experts are behind everything we do</h2>
                                            <p>Finance theme is created based on the most business trends to empower your website with everything you need to establish your corporate, start-up, or even personal website.</p>
                                            <div class="quotes-button">
                                                <a href="#" class="finance-white-btn">learn more</a>
                                                <a href="#" class="finance-white-btn">contact us</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <!-- Quotes Area End -->



                        <!-- Core Service Area Start -->
                        <section class="finance-core-service-area section_100">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="finance-section-title-center">
                                            <h3>Our Core Services</h3>
                                            <div class="title-line"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="single-core-service">
                                            <img src="assets/img/core-1.png" tppabs="http://themescare.com/demos/preview-finance/assets/img/core-1.png" alt="core 1" />
                                            <div class="core-text">
                                                <h4><a href="#">Audit & Assurance</a></h4>
                                                <p>Coordinates for abs po oordinates for abs potioning the closest potioned Coor tiom lorem dinates.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="single-core-service">
                                            <img src="assets/img/core-2.png" tppabs="http://themescare.com/demos/preview-finance/assets/img/core-2.png" alt="core 2" />
                                            <div class="core-text">
                                                <h4><a href="#">Business Services</a></h4>
                                                <p>Coordinates for abs po oordinates for abs potioning the closest potioned Coor tiom lorem dinates.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="single-core-service">
                                            <img src="assets/img/core-3.png" tppabs="http://themescare.com/demos/preview-finance/assets/img/core-3.png" alt="core 3" />
                                            <div class="core-text">
                                                <h4><a href="#">Financial Planning</a></h4>
                                                <p>Coordinates for abs po oordinates for abs potioning the closest potioned Coor tiom lorem dinates.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="single-core-service">
                                            <img src="assets/img/core-4.png" tppabs="http://themescare.com/demos/preview-finance/assets/img/core-4.png" alt="core 1" />
                                            <div class="core-text">
                                                <h4><a href="#">Wealth Management</a></h4>
                                                <p>Coordinates for abs po oordinates for abs potioning the closest potioned Coor tiom lorem dinates.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="single-core-service">
                                            <img src="assets/img/core-5.png" tppabs="http://themescare.com/demos/preview-finance/assets/img/core-5.png" alt="core 2" />
                                            <div class="core-text">
                                                <h4><a href="#">Tax Planning</a></h4>
                                                <p>Coordinates for abs po oordinates for abs potioning the closest potioned Coor tiom lorem dinates.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="single-core-service">
                                            <img src="assets/img/core-6.png" tppabs="http://themescare.com/demos/preview-finance/assets/img/core-6.png" alt="core 3" />
                                            <div class="core-text">
                                                <h4><a href="#">Saving Solutions</a></h4>
                                                <p>Coordinates for abs po oordinates for abs potioning the closest potioned Coor tiom lorem dinates.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <!-- Core Service Area End -->



                        <!-- Faq Area Start -->
                        <section class="finance-faq-area section_100">
                            <div class="bg-overlay"></div>
                            <div class="skew-overlay"></div>
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="finance-faqs-left">
                                            <h3>Answer of your all questions</h3>
                                            <div class="panel-group accordion"  id="accordion">
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title finance-panel-title">
                                                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse02" aria-expanded="false">
                                                                <i class="switch fa fa-plus"></i>
                                                                1. What is the course url?
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div class="panel-collapse collapse" id="collapse02">
                                                        <div class="panel-body">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.</div>
                                                    </div>
                                                </div>
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title finance-panel-title">
                                                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse03" aria-expanded="false">
                                                                <i class="switch fa fa-plus"></i>
                                                                2. How Do I Back Up My Database?
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div class="panel-collapse collapse" id="collapse03">
                                                        <div class="panel-body">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.</div>
                                                    </div>
                                                </div>
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title finance-panel-title">
                                                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse04" aria-expanded="false">
                                                                <i class="switch fa fa-plus"></i>
                                                                3. Live Search with many possibilities?
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div class="panel-collapse collapse" id="collapse04">
                                                        <div class="panel-body">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.</div>
                                                    </div>
                                                </div>
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title finance-panel-title">
                                                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse05" aria-expanded="false">
                                                                <i class="switch fa fa-plus"></i>
                                                                4. KnowledgeBase article custom post?
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div class="panel-collapse collapse" id="collapse05">
                                                        <div class="panel-body">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="finance-faqs-right">
                                            <h3>Get a Call Back</h3>
                                            <form>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="dropdown faq-drop">
                                                            <button class="call-dropdown dropdown-toggle" type="button" id="dropdownmissdcall" data-toggle="dropdown" aria-haspopup="true">
                                                                Private Banking
                                                                <i class="fa fa-angle-down"></i>
                                                            </button>
                                                            <ul class="dropdown-menu faq-drop-open" aria-labelledby="dropdownmissdcall">
                                                                <li>free consultation</li>
                                                                <li>private consultation</li>
                                                                <li>secure treasure</li>
                                                                <li>fixed deposit</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <p>
                                                            <input type="text" placeholder="Your Name" name="name" >
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <p>
                                                            <input type="email" placeholder="Your Email" name="email" >
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <p>
                                                            <input type="tel" placeholder="Your Phone" name="Phone" >
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <p>
                                                            <button type="submit" >submit</button>
                                                        </p>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <!-- Faq Area End -->



                        <!-- Testimonial Area Start -->
                        <section class="finance-testimonial-area section_100">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="finance-section-title-center">
                                            <h3>client's reviews</h3>
                                            <div class="title-line"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="finance-testimonial">
                                            <div class="single-testimonial-item">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="testimonial-img">
                                                            <img src="assets/img/member-3.jpg" tppabs="http://themescare.com/demos/preview-finance/assets/img/member-3.jpg" alt="client image" />
                                                            <i class="fa fa-quote-left"></i>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <div class="textimonial-text">
                                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                                                            <p class="client-name">Client Name</p>
                                                            <div class="testimonial-rating">
                                                                <p>Designation</p>
                                                                <ul>
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star-half-o"></i></li>
                                                                </ul>
                                                            </div>
                                                            <i class="fa fa-quote-right"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="single-testimonial-item">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="testimonial-img">
                                                            <img src="assets/img/member-4.jpg" tppabs="http://themescare.com/demos/preview-finance/assets/img/member-4.jpg" alt="client image" />
                                                            <i class="fa fa-quote-left"></i>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <div class="textimonial-text">
                                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                                                            <p class="client-name">Client Name</p>
                                                            <div class="testimonial-rating">
                                                                <p>Designation</p>
                                                                <ul>
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star-half-o"></i></li>
                                                                </ul>
                                                            </div>
                                                            <i class="fa fa-quote-right"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="single-testimonial-item">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="testimonial-img">
                                                            <img src="assets/img/member-3.jpg" tppabs="http://themescare.com/demos/preview-finance/assets/img/member-3.jpg" alt="client image" />
                                                            <i class="fa fa-quote-left"></i>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <div class="textimonial-text">
                                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                                                            <p class="client-name">Client Name</p>
                                                            <div class="testimonial-rating">
                                                                <p>Designation</p>
                                                                <ul>
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star-half-o"></i></li>
                                                                </ul>
                                                            </div>
                                                            <i class="fa fa-quote-right"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <!-- Testimonial Area End -->



                        <!-- Advisor Area Start -->
                        <section class="finance-advisor-area section_100">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="finance-section-title-center">
                                            <h3>meet our advisor</h3>
                                            <div class="title-line"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 col-sm-6">
                                        <div class="finance-single-advisor">
                                            <div class="advisor-img">
                                                <a href="javascript:if(confirm(%27http://themescare.com/demos/preview-finance/single-team.html  \n\nThis file was not retrieved by Teleport Pro, because the server reports that this file cannot be found.  \n\nDo you want to open it from the server?%27))window.location=%27http://themescare.com/demos/preview-finance/single-team.html%27" tppabs="http://themescare.com/demos/preview-finance/single-team.html">
                                                    <img src="assets/img/advisor.jpg" tppabs="http://themescare.com/demos/preview-finance/assets/img/advisor.jpg" alt="advisor 1" />
                                                </a>
                                                <div class="advisor-overlay"></div>
                                                <div class="advisor-social">
                                                    <ul>
                                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                                        <li><a href="#"><i class="fa fa-skype"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="advisor-text">
                                                <h3><a href="javascript:if(confirm(%27http://themescare.com/demos/preview-finance/single-team.html  \n\nThis file was not retrieved by Teleport Pro, because the server reports that this file cannot be found.  \n\nDo you want to open it from the server?%27))window.location=%27http://themescare.com/demos/preview-finance/single-team.html%27" tppabs="http://themescare.com/demos/preview-finance/single-team.html">David Vigo Michel</a></h3>
                                                <span>Founder & CEO</span>
                                                <p>The MD of Dynamic Consulting, he has been the captain of his team.. </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6">
                                        <div class="finance-single-advisor">
                                            <div class="advisor-img">
                                                <a href="javascript:if(confirm(%27http://themescare.com/demos/preview-finance/single-team.html  \n\nThis file was not retrieved by Teleport Pro, because the server reports that this file cannot be found.  \n\nDo you want to open it from the server?%27))window.location=%27http://themescare.com/demos/preview-finance/single-team.html%27" tppabs="http://themescare.com/demos/preview-finance/single-team.html">
                                                    <img src="assets/img/advisor-2.jpg" tppabs="http://themescare.com/demos/preview-finance/assets/img/advisor-2.jpg" alt="advisor 1" />
                                                </a>
                                                <div class="advisor-overlay"></div>
                                                <div class="advisor-social">
                                                    <ul>
                                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                                        <li><a href="#"><i class="fa fa-skype"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="advisor-text">
                                                <h3><a href="javascript:if(confirm(%27http://themescare.com/demos/preview-finance/single-team.html  \n\nThis file was not retrieved by Teleport Pro, because the server reports that this file cannot be found.  \n\nDo you want to open it from the server?%27))window.location=%27http://themescare.com/demos/preview-finance/single-team.html%27" tppabs="http://themescare.com/demos/preview-finance/single-team.html">Stepthen Adams</a></h3>
                                                <span>Chief Finance Officer</span>
                                                <p>The MD of Dynamic Consulting, he has been the captain of his team.. </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6">
                                        <div class="finance-single-advisor">
                                            <div class="advisor-img">
                                                <a href="javascript:if(confirm(%27http://themescare.com/demos/preview-finance/single-team.html  \n\nThis file was not retrieved by Teleport Pro, because the server reports that this file cannot be found.  \n\nDo you want to open it from the server?%27))window.location=%27http://themescare.com/demos/preview-finance/single-team.html%27" tppabs="http://themescare.com/demos/preview-finance/single-team.html">
                                                    <img src="assets/img/advisor-3.jpg" tppabs="http://themescare.com/demos/preview-finance/assets/img/advisor-3.jpg" alt="advisor 1" />
                                                </a>
                                                <div class="advisor-overlay"></div>
                                                <div class="advisor-social">
                                                    <ul>
                                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                                        <li><a href="#"><i class="fa fa-skype"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="advisor-text">
                                                <h3><a href="javascript:if(confirm(%27http://themescare.com/demos/preview-finance/single-team.html  \n\nThis file was not retrieved by Teleport Pro, because the server reports that this file cannot be found.  \n\nDo you want to open it from the server?%27))window.location=%27http://themescare.com/demos/preview-finance/single-team.html%27" tppabs="http://themescare.com/demos/preview-finance/single-team.html">Ben Johnson</a></h3>
                                                <span>Chief Marketing Officer</span>
                                                <p>The MD of Dynamic Consulting, he has been the captain of his team.. </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6">
                                        <div class="finance-single-advisor">
                                            <div class="advisor-img">
                                                <a href="javascript:if(confirm(%27http://themescare.com/demos/preview-finance/single-team.html  \n\nThis file was not retrieved by Teleport Pro, because the server reports that this file cannot be found.  \n\nDo you want to open it from the server?%27))window.location=%27http://themescare.com/demos/preview-finance/single-team.html%27" tppabs="http://themescare.com/demos/preview-finance/single-team.html">
                                                    <img src="assets/img/advisor-4.jpg" tppabs="http://themescare.com/demos/preview-finance/assets/img/advisor-4.jpg" alt="advisor 1" />
                                                </a>
                                                <div class="advisor-social">
                                                    <ul>
                                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                                        <li><a href="#"><i class="fa fa-skype"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="advisor-text">
                                                <h3><a href="javascript:if(confirm(%27http://themescare.com/demos/preview-finance/single-team.html  \n\nThis file was not retrieved by Teleport Pro, because the server reports that this file cannot be found.  \n\nDo you want to open it from the server?%27))window.location=%27http://themescare.com/demos/preview-finance/single-team.html%27" tppabs="http://themescare.com/demos/preview-finance/single-team.html">Ben Johnson</a></h3>
                                                <span>Chief Marketing Officer</span>
                                                <p>The MD of Dynamic Consulting, he has been the captain of his team.. </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <!-- Advisor Area End -->

                        <!-- Search Modal Start -->
                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="fa fa-close"></i></span></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="search_box_container">
                                            <form action="#">
                                                <input type="text" placeholder="Search Here..">
                                                <button  type="submit">
                                                    <i class="fa fa-search"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Search Modal End -->



                        <!-- jQuery -->
                        <script src="assets/js/jquery.min.js" tppabs="http://themescare.com/demos/preview-finance/assets/js/jquery.min.js"></script>

                        <!-- Bootstrap JS -->
                        <script src="assets/js/bootstrap.min.js" tppabs="http://themescare.com/demos/preview-finance/assets/js/bootstrap.min.js"></script>

                        <!-- Magnific Popup JS -->
                        <script src="assets/js/jquery.magnific-popup.min.js" tppabs="http://themescare.com/demos/preview-finance/assets/js/jquery.magnific-popup.min.js"></script>

                        <!-- OwlCarousel JS -->
                        <script src="assets/js/owl.carousel.min.js" tppabs="http://themescare.com/demos/preview-finance/assets/js/owl.carousel.min.js"></script>

                        <!-- Slicknav JS -->
                        <script src="assets/js/jquery.slicknav.min.js" tppabs="http://themescare.com/demos/preview-finance/assets/js/jquery.slicknav.min.js"></script>

                        <!-- isotop JS -->
                        <script src="assets/js/isotope.pkgd.min.js" tppabs="http://themescare.com/demos/preview-finance/assets/js/isotope.pkgd.min.js"></script>
                        <script src="assets/js/custom-isotop.js" tppabs="http://themescare.com/demos/preview-finance/assets/js/custom-isotop.js"></script>

                        <!-- Chart JS -->
                        <script src="assets/js/chart.js" tppabs="http://themescare.com/demos/preview-finance/assets/js/chart.js"></script>

                        <!-- Active JS -->
                        <script src="assets/js/active.js" tppabs="http://themescare.com/demos/preview-finance/assets/js/active.js"></script>

                        {{-- КОНЕЦ --}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</section>--}}

@stop

@section('footer')

    <!-- modal.learn -->
    {{--@include('c.modals.learn')--}}
    <!-- /modal.learn -->

@stop

@section('edit-link')

@stop

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.0/moment.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.0/locale/ru.js"></script>
    <script>
        (function($){

            $('.date').each(function(i, e) {
                //var time = moment($(e).data('date'));
                //if(now.diff(time, 'days') <= 1) {
                //	$(e).html(time.from(now));
                //}
                $(e).html(moment($(e).data('date')).calendar());
            });

            function getCookie(name) {
                var matches = document.cookie.match(new RegExp(
                    "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
                ));
                return matches ? decodeURIComponent(matches[1]) : undefined;
            }

            var learn_s = $('#learn'),
                user_id = learn_s.data('user_id'),
                order_id = learn_s.data('order_id'),
                product_id = learn_s.data('product_id'),
                payment_type = learn_s.data('payment_type') || getCookie('payment_type');

            if(payment_type) {
                var paymentInput = $('input[value="'+payment_type+'"]');
                paymentInput.prop('checked', true).parent('.payment-change').addClass('active');

                if(!user_id) $('#paymentTabs li:eq(1) a').tab('show').parent('li').removeClass('disabled');

            }

            $('.payment-change').click(function(){

                if(!user_id){
                    var labelButton = $(this);
                    $('.payment-change.active').removeClass('active').children('input').prop('checked', false).removeAttr('checked');

                    payment_type = labelButton.addClass('active').children('input').prop('checked', true).val();

                    document.cookie = "payment_type=" + payment_type;
                    $('#paymentTabs li:eq(1) a').tab('show').parent('li').removeClass('disabled');
                }
                else {
                    $(this).parents('form').submit();
                }

            });

            $('.nav-tabs a[data-toggle=tab]').on('click', function(e) {
                if ($(this).parent('li').hasClass('disabled')) {
                    e.preventDefault();
                    return false;
                }
            });


            var payModalHash = '#payModal', payModal = $(payModalHash);
            if(window.location.hash == payModalHash){
                payModal.modal('show');
            }

            function validateEmail(email) {
                var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                return re.test(email);
            }
            function validatePassword(password) {
                var re = /^[a-zA-Z0-9_~!@#$%^&\*\.-]+$/;
                return re.test(password);
            }
            function validateUsername(username) {
                //var re = /^[АБВГДЕЁЖЗИЙКЛМНОПРСТУФХЦЧШЩЪЫЬЭЮЯабвгдеёжзийклмнопрстуфхцчшщъыьэюяA-Za-z0-9_-.]{2,32}$/;
                //return re.test(username.toLowerCase());
                return true;
            }
            function validateInput(input) {
                var ok = 0, vu = 0, ve = 0,
                    required = input.prop('required'),
                    minlength = input.attr('minlength'),
                    maxlength = input.attr('maxlength'),
                    email = input.is('[type="email"]')
                log = input.is('[name="log"]')
                password = input.is('[type="password"]')
                confirmation = input.is('[name="password_confirmation"]') ? $('[name="password"]').val() : false,
                    val = input.val(),
                    vallength = val.length;

                if(required && !vallength) {
                    input.attr('data-original-title', (input.data('required-error') || 'Это поле обязательно к заполнению'));
                }
                else ok = 1;

                if(minlength && vallength<minlength) {
                    ok = 0;
                    input.attr('data-original-title', (input.data('minlength-error') || 'Минимальная длина поля: ' +minlength+  ' символов'));
                }
                if(maxlength && vallength>maxlength) {
                    ok = 0;
                    input.attr('data-original-title', (input.data('maxlength-error') || 'Максимальная длина поля: ' +minlength+  ' символов'));
                }
                if(email && !validateEmail(input.val())) {
                    ok = 0;
                    input.attr('data-original-title', (input.data('email-error') || 'Укажите корректный Email-адрес'));
                }
                if(log) {
                    ve = validateUsername(input.val());
                    vu = validateEmail(input.val());
                    if(! (ok = ve || vu) ) input.attr('data-original-title', (input.data('email-error') || (!ve ? 'Укажите корректный Email-адрес или Ваш Логин' : 'Для логина используют только латинские буквы, цифры и _-') ));
                }
                if(password && !validatePassword(input.val())) {
                    ok = 0;
                    input.attr('data-original-title', (input.data('password-error') || 'Допустимые символы: латинские буквы, цифры или знаки _~!@#$%^&*-.'));
                }
                // && val != $('[name="'.input.data('forname').'"]').val()
                if(password && confirmation && val!=confirmation) {
                    ok = 0;
                    input.attr('data-original-title', (input.data('confirmation-error') || 'Пароли не совпадают'));
                }
                return ok;
            }

            $('input[data-toggle="tooltip"]').on('focus',function(){
                $(this).tooltip('show');
            });

            $('form.validate input').on('change paste', function(e) {
                var input = $(this), ok = validateInput(input), tt = input.is('[data-toggle="tooltip"]');
                if(!ok){
                    input.parent().removeClass('has-success').addClass('has-error');
                    if(tt) input.tooltip('show');
                }
                else {
                    input.parent().removeClass('has-error').addClass('has-success');
                    if(tt) input.tooltip('hide');
                }
            });

            $('form.validate').on('submit', function(e) {

                var form = $(this), errors = 0;
                if(form.not('.is-valid')) {

                    var inputs = $('input[required]',form), errors = inputs.size();
                    var vallength = 0;

                    inputs.each(function(){
                        var input = $(this),
                            ok = validateInput(input);
                        errors -= ok;
                    });

                    if(!errors){

                        $('input[name="_redirect"]',form).val('https://iteam.ru/i/order/create?email='+$('input[name="email"]',form).val()+'&name='+$('input[name="firstname"]',form).val()+'&phone='+$('input[name="phone"]',form).val()+'&product_id='+product_id+'&payment_type='+payment_type);
                        form.addClass('is-valid').submit();

                    }
                    else {
                        inputs.parent().addClass('has-error');
                        inputs.tooltip('show');
                        e.preventDefault();
                        return false;
                    }

                }

            });

            $('.show-password').on('click',function(){
                var showPassword = $(this);
                if(showPassword.is('.glyphicon-eye-open')) {
                    showPassword.removeClass('glyphicon-eye-open').addClass('glyphicon-eye-close').parent('.input-group-addon').prev('input').attr('type','text');
                }
                else {
                    showPassword.removeClass('glyphicon-eye-close').addClass('glyphicon-eye-open').parent('.input-group-addon').prev('input').attr('type','password');
                }
            });


        })(jQuery);
    </script>
@stop