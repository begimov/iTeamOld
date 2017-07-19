<!DOCTYPE html>
<!--[if lt IE 9]> <html class="no-js msie"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>{{ trans('front/site.title') }}</title>

	<link href="/favicon.ico" rel="shortcut icon" type="image/x-icon">
	<link href="/favicon.ico" rel="icon" type="image/x-icon">

	<link rel="stylesheet" href="//code.getmdl.io/1.1.1/material.css">
    <!-- Bootstrap Core CSS -->
	{!! HTML::style('css/bootstrap.min.css') !!}
    <!-- Custom CSS -->
	{!! HTML::style('css/company.css') !!}

    <!-- Custom Fonts -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">

	<link href="//fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

	<!-- Web Fonts -->
	<link rel='stylesheet' type='text/css' href='//fonts.googleapis.com/css?family=Open+Sans:400,300,600&amp;subset=cyrillic,latin'>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

	@yield('head')

</head>

<body id="company_iteam" class="body_{{ Request::segment(1) }}">

	<!--[if lt IE 8]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->


    <!-- Navigation -->
    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand -page-scroll" href="/">

					<span class="logo-brand">
					<svg id="svg1" style="width:100%;height:100%" fill="#c00" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 140 140" xmlns="http://www.w3.org/2000/svg">
						<g id="svg1g0">
							<circle id="svg1c0" r="20" cy="70" cx="70"/>
						</g>
						<g id="svg1g1">
							<circle id="svg1c1" r="20" cy="20" cx="70"/>
							<path id="svg1p1" fill="none" stroke="#c00" stroke-width="16" d="M36,34 A47,47 0 0 1 104,34" />
						</g>
						<g id="svg1g2" transform="rotate(120,70,70)">
							<circle id="svg1c2" r="20" cy="20" cx="70"/>
							<path id="svg1p2" fill="none" stroke="#c00" stroke-width="16" d="M36,34 A47,47 0 0 1 104,34" />
						</g>
						<g id="svg1g3" transform="rotate(-120,70,70)">
							<circle id="svg1c3" r="20" cy="20" cx="70"/>
							<path id="svg1p3" fill="none" stroke="#c00" stroke-width="16" d="M36,34 A47,47 0 0 1 104,34" />
						</g>
					</svg>
					</span>
					<span class="name-brand">
						<span class="light">i</span>Team
					</span>

                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
                <ul class="nav navbar-nav">
                    <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li>
                        <a class="-page-scroll" href="/company">Компания</a>
                    </li>
                    <li>
                        <a class="-page-scroll" href="/learn">Мастер-проекты/Мастер-классы</a>
                    </li>
                    <li>
                        <a class="-page-scroll" href="/company/contact">Контакты</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

	@yield('header')


	<main>
		@if(session()->has('ok'))
			@include('partials/error', ['type' => 'success', 'message' => session('ok')])
		@endif
		@if(isset($info))
			@include('partials/error', ['type' => 'info', 'message' => $info])
		@endif

		@yield('main')

	</main>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <h4><strong>iTeam</strong></h4>
                    <p>Москва, Пресненская наб. 12</p>
                    <ul class="list-unstyled">
                        <li><i class="fa fa-phone fa-fw"></i> (499) 110-2684</li>
                        <li><i class="fa fa-envelope-o fa-fw"></i>  <a href="mailto:info@iteam.ru">info@iteam.ru</a></li>
                        <li>Тех поддержка <i class="fa fa-envelope-o fa-fw"></i>  <a href="mailto:support@iteam.ru">support@iteam.ru</a></li>
                    </ul>
                    <br class="hidden">
                    <ul class="list-inline hidden">
                        <li>
                            <a href="#"><i class="fa fa-facebook fa-fw"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-twitter fa-fw"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-google-plus fa-fw"></i></a>
                        </li>
                    </ul>
                    <hr class="--small">
                    <p class="text-muted">&copy; 2002 - {{ date('Y') }} {{ trans('front/site.title') }}</p>
                </div>
            </div>

			@yield('footer')

        </div>
    </footer>

    <!-- jQuery -->
    <!--script src="js/jquery.js"></script-->

	{!! HTML::script('//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js') !!}
	<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.10.2.min.js"><\/script>')</script>

    <!-- Bootstrap Core JavaScript -->
	{!! HTML::script('js/bootstrap.min.js') !!}

    <!-- Custom Theme JavaScript -->
    <script>
		// jQuery to collapse the navbar on scroll
		function collapseNavbar() {
			if ($(".navbar").offset().top > 50) {
				$(".navbar-fixed-top").addClass("top-nav-collapse");
			} else {
				$(".navbar-fixed-top").removeClass("top-nav-collapse");
			}
		}

		$(window).scroll(collapseNavbar);
		$(document).ready(collapseNavbar);

		// jQuery for page scrolling feature - requires jQuery Easing plugin
		$(function() {
			$('a.page-scroll').bind('click', function(event) {
				var $anchor = $(this);
				$('html, body').stop().animate({
					scrollTop: $($anchor.attr('href')).offset().top
				}, 1500, 'easeInOutExpo');
				event.preventDefault();
			});
		});

		// Closes the Responsive Menu on Menu Item Click
		$('.navbar-collapse ul li a').click(function() {
		  if ($(this).attr('class') != 'dropdown-toggle active' && $(this).attr('class') != 'dropdown-toggle') {
			$('.navbar-toggle:visible').click();
		  }
		});
    </script>

	<!-- begin of Top100 code -->
	<script id="top100Counter" type="text/javascript" src="http://counter.rambler.ru/top100.jcn?413929"></script><noscript><img src="http://counter.rambler.ru/top100.cnt?413929" alt="" width="1" height="1" border="0"></noscript>
	<!-- end of Top100 code -->

	<!-- Yandex.Metrika counter -->
	<script type="text/javascript">
		(function (d, w, c) {
			(w[c] = w[c] || []).push(function() {
				try {
					w.yaCounter30664892 = new Ya.Metrika({
						id:30664892,
						clickmap:true,
						trackLinks:true,
						accurateTrackBounce:true,
						webvisor:true,
						trackHash:true
					});
					w.yaCounter31848061 = new Ya.Metrika({
						id:31848061,
						clickmap:true,
						trackLinks:true,
						accurateTrackBounce:true
					});
				} catch(e) { }
			});

			var n = d.getElementsByTagName("script")[0],
				s = d.createElement("script"),
				f = function () { n.parentNode.insertBefore(s, n); };
			s.type = "text/javascript";
			s.async = true;
			s.src = "https://mc.yandex.ru/metrika/watch.js";

			if (w.opera == "[object Opera]") {
				d.addEventListener("DOMContentLoaded", f, false);
			} else { f(); }
		})(document, window, "yandex_metrika_callbacks");
	</script>
	<noscript><div><img src="https://mc.yandex.ru/watch/30664892" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
	<noscript><div><img src="https://mc.yandex.ru/watch/31848061" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
	<!-- /Yandex.Metrika counter -->

	<script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
		ga('create', 'UA-62052326-1', 'auto');
		ga('create', 'UA-20745869-1', 'auto', 'clientTracker'););
		ga('send', 'pageview');
		ga('clientTracker.send', 'pageview');
	</script>


	@yield('scripts')


  </body>
</html>
