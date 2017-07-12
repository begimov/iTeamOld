<!DOCTYPE html>
<!--[if IE 9 ]><html class="ie9"><![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
		<meta name="csrf_token" content="{{ csrf_token() }}">
		
        <title>{{ @$coname }}</title>

        <!-- Vendor CSS -->
        <link href="/a/vendors/bower_components/fullcalendar/dist/fullcalendar.min.css" rel="stylesheet">
        <link href="/a/vendors/bower_components/animate.css/animate.min.css" rel="stylesheet">
        <link href="/a/vendors/bower_components/bootstrap-sweetalert/lib/sweet-alert.css" rel="stylesheet">
        <link href="/a/vendors/bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.min.css" rel="stylesheet">
        <link href="/a/vendors/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css" rel="stylesheet">
		<link href="/a/vendors/bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
		<link href="/a/css/cropper.min.css" rel="stylesheet">
            
        <!-- CSS -->
        <link href="/a/css/app.min.1.css" rel="stylesheet">
        <link href="/a/css/app.min.2.css" rel="stylesheet">
		
        @yield('head')
        
    </head>
    <body>
        <header id="header" class="clearfix" data-current-skin="bluegray">
            <ul class="header-inner">
                <li id="menu-trigger" data-trigger="#sidebar">
                    <div class="line-wrap">
                        <div class="line top"></div>
                        <div class="line center"></div>
                        <div class="line bottom"></div>
                    </div>
                </li>

                <li class="logo hidden-xs">
                    <a href="#">{{ @$coname }} Управление</a>
                </li>

                <li class="pull-right">
                    
                </li>
            </ul>


            <!-- Top Search Content -->
            <!--div id="top-search-wrap">
                <div class="tsw-inner">
                    <i id="top-search-close" class="zmdi zmdi-close"></i>
                    <input type="text">
                </div>
            </div-->
        </header>
        
        <section id="main" data-layout="layout-1">
			
			@include('admin.parts.menu')
            
            
            <section id="content">
                <div class="container">
				
				@include('admin.parts.alerts')
				
				@yield('main')
				
                </div>
            </section>
        </section>
        
        <footer id="footer">
            &copy; {{ date("Y") . ' ' . @$coname }}
            
            <ul class="f-menu">
                <li><a target="_blank" href="/~/">Главная</a></li>
                <li><a target="_blank" href="/">Портал</a></li>
                <li><a target="_blank" href="/company">Сайт компании</a></li>
            </ul>
        </footer>

        <!-- Page Loader -->
        <div class="page-loader">
            <div class="preloader pls-blue">
                <svg class="pl-circular" viewBox="25 25 50 50">
                    <circle class="plc-path" cx="50" cy="50" r="20" />
                </svg>

                <p>Пожалуйста, подождите...</p>
            </div>
        </div>
        
        <!-- Older IE warning message -->
        <!--[if lt IE 9]>
            <div class="ie-warning">
                <h1 class="c-white">Внимание!!</h1>
                <p>Вы успользуете старую версию Internet Explorer, пожалуйста, обновите свой браузер до любого современного.</p>
                <div class="iew-container">
                    <ul class="iew-download">
                        <li>
                            <a href="http://www.google.com/chrome/">
                                <img src="/a/img/browsers/chrome.png" alt="">
                                <div>Chrome</div>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.mozilla.org/en-US/firefox/new/">
                                <img src="/a/img/browsers/firefox.png" alt="">
                                <div>Firefox</div>
                            </a>
                        </li>
                        <li>
                            <a href="http://www.opera.com">
                                <img src="/a/img/browsers/opera.png" alt="">
                                <div>Opera</div>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.apple.com/safari/">
                                <img src="/a/img/browsers/safari.png" alt="">
                                <div>Safari</div>
                            </a>
                        </li>
                        <li>
                            <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                                <img src="/a/img/browsers/ie.png" alt="">
                                <div>IE (New)</div>
                            </a>
                        </li>
                    </ul>
                </div>
                <p>Sorry for the inconvenience!</p>
            </div>   
        <![endif]-->
        
        <!-- Javascript Libraries -->
        <script src="/a/vendors/bower_components/jquery/dist/jquery.min.js"></script>
        <script src="/a/vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        
        <script src="/a/vendors/bower_components/flot/jquery.flot.js"></script>
        <script src="/a/vendors/bower_components/flot/jquery.flot.resize.js"></script>
        <script src="/a/vendors/bower_components/flot.curvedlines/curvedLines.js"></script>
        <script src="/a/vendors/sparklines/jquery.sparkline.min.js"></script>
        <script src="/a/vendors/bower_components/jquery.easy-pie-chart/dist/jquery.easypiechart.min.js"></script>
        
        <script src="/a/vendors/bower_components/moment/min/moment.min.js"></script>
        <script src="/a/vendors/bower_components/fullcalendar/dist/fullcalendar.min.js "></script>
		
		<script src="/a/vendors/bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
		
        <script src="/a/vendors/bower_components/fullcalendar/dist/lang/ru.js "></script>
        <script src="/a/vendors/bower_components/simpleWeather/jquery.simpleWeather.min.js"></script>
        <script src="/a/vendors/bower_components/Waves/dist/waves.min.js"></script>
        <script src="/a/vendors/bootstrap-growl/bootstrap-growl.min.js"></script>
        <script src="/a/vendors/bower_components/bootstrap-sweetalert/lib/sweet-alert.min.js"></script>
        <script src="/a/vendors/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
        
        <!-- Placeholder for IE9 -->
        <!--[if IE 9 ]>
            <script src="/a/vendors/bower_components/jquery-placeholder/jquery.placeholder.min.js"></script>
        <![endif]-->
        
        <script src="/a/js/flot-charts/curved-line-chart.js"></script>
        <script src="/a/js/flot-charts/line-chart.js"></script>
        <script src="/a/js/charts.js"></script>
        
        <script src="/a/js/cropper.min.js"></script>
		
        <script src="/a/js/functions.js"></script>
        <script src="/a/js/admin.js"></script>

        @yield('scripts')
        
    </body>
  </html>