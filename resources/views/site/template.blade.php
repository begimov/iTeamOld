<!DOCTYPE html>
<!--[if lt IE 9]> <html class="no-js msie"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="keywords" content="{{ @$page->meta_keywords ? $page->meta_keywords : (@$page->title ? $page->title : trans('front/site.title')) }}">
    <meta name="description" content="{{ @$page->meta_description ? $page->meta_description : (@$page->intro ? $page->intro : trans('front/site.title')) }}">
    <meta name="author" content="slava@trunov.me">
    <meta property="fb:admins" content="100000287596744"/>
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
	{!! HTML::style('css/css.css?time=' . time()) !!}

    <!-- Custom Fonts -->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
	<!--link href="//fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"-->

	<!-- Web Fonts -->
	<link href="//fonts.googleapis.com/css?family=Open+Sans:400,300,600&amp;subset=cyrillic,latin" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Cuprum|PT+Sans+Narrow|Play" rel="stylesheet">

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

  <div id="top_container">

    <div id="top_header">

      <div id="logo">
        <a class="logo" href="">©</a>
        <a class="iteam" href="">iTeam</a>
      </div>
      <div id="manage">
        <ul>
          <li><span class="glyphicon glyphicon-search" aria-hidden="true"></span></li>
          <li>

				@if(Auth::user())
					<span class="-dropdown">
						<a href="#/i" class="-dropdown-toggle img-circle" id="userMenu" data-toggle="-dropdown" aria-haspopup="-true" aria-expanded="-true">
						@if(Auth::user()->avatar)
							<img style="max-width:32px;max-height:32px;border:1px solid gray;" src="/filemanager/userfiles/user{{ Auth::user()->id }}/100/{!! Auth::user()->avatar !!}" alt="iam" class="img-circle">
						@else
							<span class="img-circle" style="background-color:#eee;padding:16px;">
								<span class="glyphicon glyphicon-user" aria-hidden="true"></span>
							</span>
						@endif
						</a>

						<ul class="hidden dropdown-menu" aria-labelledby="userMenu">

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
					<a href="{{ route('auth.get') }}" id="auth_link" class="btn btn-default">
					  <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
					  <b>Вход</b>
					  <small>Регистрация</small>
					</a>
				@endif



          </li>
        </ul>
      </div>

      <a class="target_link open_menu toggle_menu" href="#menu">&equiv;</a>
      <div id="menu_closed"></div>
      <div id="menu">
        <a class="target_link toggle_menu close_menu" href="#menu_closed">&times;</a>
        <div>
          <ul>
            <li class="{!! classActiveSegment(2, ['learn']) !!}"><a href="/learn">Мастер-классы</a></li>
            <li class="{!! classActiveSegment(2, ['publications']) !!}"><a href="/publications">Статьи</a></li>
            <li class="{!! classActiveSegment(2, ['literature']) !!}"><a href="/literature">Книги</a></li>
            <li class="{!! classActiveSegment(3, ['about']) !!}"><a href="/company">Об iTeam</a></li>
            <li class="{!! classActiveSegment(3, ['contact']) !!}"><a href="/company/contact">Контакты</a></li>
          </ul>
        </div>
      </div>

    </div>

  </div>

  @yield('sup_header')

  <div id="body_container">

	@yield('header')


	<main>

		<div class="alerts">
		@if(session()->has('status'))
			@include('partials/error', ['type' => 'success', 'message' => session('status')])
		@endif
		@if(session()->has('error'))
			@include('partials/error', ['type' => 'danger', 'message' => session('error')])
		@endif
		</div>

		@yield('main')

		@yield('bottom')

	</main>

  </div>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <h5><strong>iTeam</strong></h5>
                    <p>Москва, Пресненская наб. 12</p>
                    <ul class="list-unstyled">
                        <li><i class="fa fa-phone fa-fw"></i> (499) 110-2684</li>
                        <li><i class="fa fa-envelope-o fa-fw"></i>  <a href="mailto:info@iteam.ru">info@iteam.ru</a></li>
                        <li><i class="fa fa-envelope-o fa-fw"></i>  <a href="mailto:support@iteam.ru">support@iteam.ru</a> Тех поддержка</li>
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
	<script>window.jQuery || document.write('<script src="/js/vendor/jquery-1.10.2.min.js"><\/script>')</script>

    <!-- Bootstrap Core JavaScript -->
	{!! HTML::script('js/bootstrap.min.js') !!}

    <!-- Custom Theme JavaScript -->
    <script>

		$('ul.pagination').wrap('<div class="text-center"/>');

		$('a[data-toggle="modal"]').click(function(){
			window.location.hash = $(this).attr('href');
		});

		$('a[role="tab"]').click(function(e){
			$(this).tab('show');
			e.preventDefault();
		});


		$('a').attr('href',function(){
			var url = this.href;
			var url = $(this).attr('href');
			if(url.search('/v2/')==-1 && url.search('#')!=0) {
				if(url.search('https://iteam.ru/')==0) return '/v2/'+url.split('https://iteam.ru/')[1];
				else {
					if(url.search('/')==0) return '/v2'+url;
					else return '/v2/';
				}
			}
		});

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
