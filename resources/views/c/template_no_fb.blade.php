<!DOCTYPE html>
<!--[if lt IE 9]> <html class="no-js msie"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="{{ @$page->meta_keywords ? $page->meta_keywords : (@$page->title ? $page->title : trans('front/site.title')) }}">
    <meta name="description" content="{{ @$page->meta_description ? $page->meta_description : (@$page->intro ? $page->intro : trans('front/site.title')) }}">
    <meta name="author" content="slava@trunov.me">
    <meta property="fb:admins" content="100000287596744"/>
    <meta property="fb:admins" content="100014169376144"/>
    <meta property="fb:app_id" content="1254406184618438" />

	<meta name="_token" content="{!! csrf_token() !!}" />

    <title>
		@yield('title')
		{{ trans('front/site.title') }}
	</title>

	<link href="/favicon.ico" rel="shortcut icon" type="image/x-icon">
	<link href="/favicon.ico" rel="icon" type="image/x-icon">

    <!-- Bootstrap Core CSS -->
	{!! HTML::style('css/bootstrap.min.css') !!}
    <!-- Custom CSS -->
	{!! HTML::style('css/company.css?time=' . time()) !!}

    <!-- Custom Fonts -->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
	<link href="//fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

	<!-- Web Fonts -->
	<link rel='stylesheet' type='text/css' href='//fonts.googleapis.com/css?family=Open+Sans:400,300,600&amp;subset=cyrillic,latin'>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="//oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="//oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

	@yield('head')
</head>

<body id="company_iteam" class="body_{{ Request::segment(1) }}">

	<!--[if lt IE 8]>
		<p class="browserupgrade">Вы используете <strong>устаревший</strong> браузер. Пожалуйста, <a href="http://browsehappy.com/">обновите его</a> для нормальной работы современных сайтов.</p>
	<![endif]-->

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
	<!-- /Yandex.Metrika counter -->

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
                    <li class="{!! Request::segment(1)==='learn' ? 'active' : '' !!}">
                        <a class="-page-scroll" href="/learn">Мастер-классы</a>
                    </li>

                    <li class="{!! Request::segment(2)==='service' ? 'active' : '' !!}">
                        <a class="-page-scroll" href="/company/service">Услуги</a>
                    </li>

                    <li class="{!! (Request::segment(1)==='company' && Request::segment(2)!=='service') ? 'active' : '' !!}">
                        <a class="-page-scroll" href="/company/about">Компания</a>
                    </li>

                    <li class="{!! Request::segment(2)==='contact' ? 'active' : '' !!}">
                        <a class="-page-scroll" href="/company/contact">Контакты</a>
                    </li>

                    <li class="{!! (Request::segment(1)==='i' || Request::segment(1)==='auth') ? 'active' : '' !!}">
                    @if(Auth::user())
                        <span class="dropdown">
							<a href="/i" class="dropdown-toggle img-circle" id="userMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
							@if(Auth::user()->avatar)
								<img src="/filemanager/userfiles/user{{ Auth::user()->id }}/100/{!! Auth::user()->avatar !!}" alt="iam" class="img-circle">
							@else
								<span class="glyphicon glyphicon-user" aria-hidden="true"></span>
							@endif
							</a>

							<ul class="dropdown-menu" aria-labelledby="userMenu">

								<li class="dropdown-header">{!! Auth::user()->username !!}</li>
								<li role="separator" class="divider"></li>
								@if(Auth::user()->role_id<3)
									<li><a href="/~">Управление</a></li>
									<li role="separator" class="divider"></li>
								@endif
								<li><a href="/i">Профиль</a></li>
								<li><a href="/i/order">Мои заказы</a></li>
								<!--li><a href="/i/#settings">Настройки</a></li-->
								<li role="separator" class="divider"></li>
								<li><a href="/auth/logout">Выход</a></li>
							</ul>
						</span>
					@else
						<a href="/i/auth" id="userLink" class="auth-link img-circle">
							<span class="glyphicon glyphicon-lock" aria-hidden="true"></span>
						</a>
					@endif
                    </li>

                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

	@yield('header')


	<main>

		<div class="alerts">
		@if($errors->all())
			@foreach($errors->all() AS $errr)
				@include('partials/error', ['type' => 'danger', 'message' => $errr])
			@endforeach
		@endif
		@if(session()->has('status'))
			@include('partials/error', ['type' => 'success', 'message' => session('status')])
		@endif
		@if(session()->has('error'))
			@include('partials/error', ['type' => 'danger', 'message' => session('error')])
		@endif
		</div>

		@yield('main')


	</main>
    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
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

                <div class="col-lg-2 visible-lg -text-right">
                    <h5><strong>Компания</strong></h5>
                    <ul class="list-unstyled">
                        <li><a href="/company/about">О компании</a></li>
                        <li><a href="/company/response">Отзывы</a></li>
                        <li><a href="/company/projects">Проекты</a></li>
                        <li><a href="/company/contact">Контакты</a></li>
						<li role="separator" class="divider">.</li>
                        <li><a class="before-glyphicon glyphicon-new-window" href="//iteam.ru?from=company_footer" target="_blank">Портал <strong>iTeam</strong></a></li>
                    </ul>
                </div>
                <div class="col-lg-2 visible-lg">
                    <h5><strong>Обучение</strong></h5>
                    <ul class="list-unstyled">
                        <li><a href="/learn/breakfast">Бизнес-завтраки</a></li>
                        <li><a href="/learn/webinar">Мастер-классы</a></li>
                        <li><a href="/learn/course">Мастер-проекты</a></li>
						<li role="separator" class="divider">.</li>
                        @if(Auth::user())
							<li><a class="before-glyphicon glyphicon-user" href="/i">Личный кабинет</a></li>
						@else
							<li><a class="before-glyphicon glyphicon-user" href="/i/auth">Вход</a></li>
							<li><a class="before-glyphicon glyphicon-lock" href="/auth/register">Регистрация</a></li>
						@endif
                    </ul>
                </div>

            </div>

			@yield('footer')

        </div>
    </footer>

	@yield('edit-link')

    <!-- jQuery -->

	{!! HTML::script('//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js') !!}
	<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.10.2.min.js"><\/script>')</script>

    <!-- Bootstrap Core JavaScript -->
	{!! HTML::script('js/bootstrap.min.js') !!}

    <!-- Custom Theme JavaScript -->
    <script>

		$('a[data-toggle="modal"]').click(function(){
			window.location.hash = $(this).attr('href');
		});

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


		var modalInit = false;
		function ModalWinInit(){
			modalWin = '<div id="modalw" class="modalwrap" style="z-index:99999999;display:none;position:fixed;top:0;left:0;padding:0;margin:0;width:100%;height:100%;background-color:rgba(32,32,32,0.7);overflow:hidden;">';
			modalWin += '	<i class="close" style="position:absolute;right:32px;top:0;color:white;font:32px/1 monospace;cursor:pointer;">&#10005;</i>';
			modalWin += '	<div class="modalwin" style="padding:32px;position:relative;background-color:rgba(128,128,128,0.5);">';
			modalWin += '		<div class="modalbox">';
			modalWin += '		</div>';
			modalWin += '	</div>';
			modalWin += '</div>';
			$("body").append(modalWin);
			modalInit = true;
			$("#modalw").on("click",function(e){
				if(!$(e.target).closest(".modalbox>*").length) $(this).fadeOut(200).children(".modalwin").children(".modalbox").html("");
				e.stopPropagation();
			});
			return modalInit;
		}
		modalInit = ModalWinInit();
		function ModalBoxHtml(modalBoxContent){
			if(!modalInit) modalInit = ModalWinInit();
			var modalWin = $("#modalw");
			var modalBox = modalWin.children(".modalwin").children(".modalbox");
			modalBox.html("Загрузка...");
			if(modalBoxContent){
				modalBox.html(modalBoxContent);
				modalWin.show();
			}
		}
		function FileBoxHtml(file,opt){
			var mimes = {"mp4":"mp4","ogg":"ogg","webm":"webm","flv":"flv"};
			var exts = {"mp4":"mp4","ogv":"ogg","webm":"webm","flv":"flv"};
			var fileBox = '';
			var ext = false;
			if(file){
				ext = (ext)?ext:file.split('.').pop().split('?')[0].split('#')[0];
			} else ext = false;
			if(ext) opt.mime = mimes[ext] || exts[ext] || false;
			fileBox = (opt.mime) ? VidooBoxHtml(file,opt) : DocBoxHtml(file,opt);
			return (fileBox)?fileBox:false;
		}
		function VidooBoxHtml(file,opt){
			var vidooBox = '';
			vidooBox += '<div class="filebox" style="width:'+opt.width+'px;height:'+opt.height+'px;">';
			if(opt.mime==="mp4"||opt.mime==="ogg"||opt.mime==="webm"){
				vidooBox += '	<video width="'+opt.width+'" height="'+opt.height+'" controls>';
				vidooBox += '		<source src="'+file+'" type="video/'+opt.mime+'" />';
				if(opt.mime==="mp4"){
					vidooBox += '			<object width="'+opt.width+'" height="'+opt.height+'" type="application/x-shockwave-flash" data="/@Body/c/inc/vidoo/player.swf?movie='+file+'">';
					vidooBox += '				<param name="movie" value="/@Body/c/inc/vidoo/player.swf" />';
					vidooBox += '				<param name="allowfullscreen" value="true" />';
					vidooBox += '				<param name="flashvars" value="movie='+file+'&image=/@Body/c/inc/vidoo/player.png" />';
					vidooBox += '			</object>';
				} else {
					vidooBox += '			<p><i>Данное видео не поддерживается нашим плеером</i></p>';
				}
				vidooBox += '	</video>';
			} else if(opt.mime==="flv") {
				vidooBox += '	<object width="'+opt.width+'" height="'+opt.height+'" type="application/x-shockwave-flash" data="/@Body/c/inc/vidoo/player.swf?movie='+file+'">';
				vidooBox += '		<param name="movie" value="/@Body/c/inc/vidoo/player.swf" />';
				vidooBox += '		<param name="allowfullscreen" value="true" />';
				vidooBox += '		<param name="flashvars" value="movie='+file+'&image=/@Body/c/inc/vidoo/player.png" />';
				vidooBox += '	</object>';
			} else {
				vidooBox += '	<p><i>Данное видео не поддерживается нашим плеером</i></p>';
			}
			vidooBox += '<p><a download target="_blank" href="'+file+'">Скачать</a></p>';
			vidooBox += '</div>';

			return (vidooBox)?vidooBox:false;
		}
		function PrintIframe() {
			frames["fileboxframe"].focus();
			frames["fileboxframe"].print();
		}
		function returnFalse() {
			return false;
		}
		$(".printFile").on("click",function() {
			var file = $(this).attr("href");
			var newWin = window.open(file,"printFile","width=800,height=800,resizable=yes,scrollbars=yes,status=yes");
			newWin.focus();
			if(newWin.print()) newWin.close();
			return false;
		});
		function DocBoxHtml(file,opt){
			var docBox = '';
			var ext = false;
			if(file){
				docBox += '<div class="filebox" style="width:'+opt.width+'px;height:'+opt.height+'px;">';
				docBox += '	<iframe width="'+opt.width+'" height="'+opt.height+'" src="https://drive.google.com/viewerng/viewer?embedded=true&url='+file+'">';
				docBox += '	</iframe>';
				docBox += '<p><a download target="_blank" href="'+file+'">Скачать</a></p>';
				docBox += '</div>';
			}
			return (docBox)?docBox:false;
		}
		function YtbBoxHtml(file,opt){
			var docBox = '';
			var ext = false;
			if(file){
				docBox += '<div class="filebox" style="width:'+opt.width+'px;height:'+opt.height+'px;">';
				docBox += '	<iframe allowfullscreen="" frameborder="0" width="'+opt.width+'" height="'+opt.height+'" src="'+file+'?feature=player_embedded">';
				docBox += '	</iframe>';
				//docBox += '<p><a download target="_blank" href="'+file+'">Скачать</a></p>';
				docBox += '</div>';
			}
			return (docBox)?docBox:false;
		}
		$(".modalFile").each(function(i){
			var modalFile = $(this);
			modalFile.on("click",function() {
				var file = modalFile.attr("href");
				var opt = modalFile.data() || false;

				opt.mime = (opt.mime)?opt.mime:false;
				opt.width = (opt.width)?opt.width:($(window).width()-80)||720;
				opt.height = (opt.height)?opt.height:($(window).height()-80)||480;

				ModalBoxHtml(FileBoxHtml(file,opt));
				return false;
			});
		});
		$(".modalDoc").each(function(i){
			var modalDoc = $(this);
			modalDoc.on("click",function() {
				var file = modalDoc.attr("href");
				var opt = modalDoc.data() || false;

				opt.mime = (opt.mime)?opt.mime:false;
				opt.width = (opt.width)?opt.width:($(window).width()-80)||720;
				opt.height = (opt.height)?opt.height:($(window).height()-80)||480;

				ModalBoxHtml(DocBoxHtml(file,opt));
				return false;
			});
		});
		$(".modalYtb").each(function(i){
			var modalYtb = $(this);
			modalYtb.on("click",function() {
				var file = modalYtb.attr("href");
				var opt = modalYtb.data() || false;

				opt.mime = (opt.mime)?opt.mime:false;
				opt.width = (opt.width)?opt.width:($(window).width()-80)||720;
				opt.height = (opt.height)?opt.height:($(window).height()-80)||480;

				ModalBoxHtml(YtbBoxHtml(file,opt));
				return false;
			});
		});

		function SendForm(act,pw,ph) {
			var w = 640, h = 480;

			//act='http://old.iteam.ru'+act;

			if (document.all || document.layers) {
				w = screen.availWidth;
				h = screen.availHeight;
			}

			//var popW = pw||280, popH = ph||680;
			//var leftPos = (w-popW)/2, topPos = (h-popH)/2;

			var popW = 920, popH = 680, leftPos = 20, topPos = 20;
			SendWin = window.open(act, 'Action', 'width=' + popW + ',height=' + popH + ',top=' + topPos + ',left=' + leftPos + ',resizable=yes,scrollbars=yes');
			if (navigator.appName=='Netscape') { SendWin.focus(); }
		}

    </script>
	@yield('scripts')

	<!-- Yandex.Metrika counter -->
	<script type="text/javascript">
		(function (d, w, c) {
			(w[c] = w[c] || []).push(function() {
				try {
					w.yaCounter31848061 = new Ya.Metrika({
						id:31848061,
						clickmap:true,
						trackLinks:true,
						accurateTrackBounce:true,
						webvisor:true
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
	<noscript><div><img src="https://mc.yandex.ru/watch/31848061" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
	<!-- /Yandex.Metrika counter -->

	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

	  ga('create', 'UA-20745869-1', 'auto');
	  ga('send', 'pageview');

	</script>



  </body>
</html>
