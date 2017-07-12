<!DOCTYPE html>
<!--[if lt IE 9]> <html class="no-js msie"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="author" content="slava@trunov.me">
	
	<meta name="_token" content="{!! csrf_token() !!}" />

    <title>
		404 - Страница не найдена | 
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
	
</head>
 
<body class="body_404">

	<!--[if lt IE 8]>
		<p class="browserupgrade">Вы используете <strong>устаревший</strong> браузер. Пожалуйста, <a href="http://browsehappy.com/">обновите его</a> для нормальной работы современных сайтов.</p>
	<![endif]-->


    <!-- Navigation -->
    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">

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
		</div>
	</nav>

	<main>

		<div class="alerts">
		@if(session()->has('status'))
			@include('partials/error', ['type' => 'success', 'message' => session('status')])
		@endif
		@if(session()->has('error'))
			@include('partials/error', ['type' => 'danger', 'message' => session('error')])
		@endif
		</div>
		
		<div class="container">
		<div class="row">
		<div class="col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1">

		<h1 class="title">404 </h1>
		<div class="text">
			<p>Запрошенной страницы не существует</p>

			<div style="text-align:center;padding:1px;border-radius:4px;">
			<p style="color:grey;font-size:20px;">Приносим Вам извинения и дарим подарок:</p>
			<h4 style="color:#AD0011;font-size:24px;"><b>КНИГА<br/>
			Как внедрить бизнес-процессы</b></h4>
			<br/>
			
		<img style="width: 200px; margin-left:-20px; margin-top:-20px;" src="https://iteam.ru/images/icons/book/11_4.png" alt="Как внедрить бизнес-процессы">
		<!-- <script type="text/javascript" src="https://app.getresponse.com/view_webform_v2.js?u=Bh5z&webforms_id=5388406"></script>  -->
		
		
<div style="margin:0 auto;width:280px;">		
	<form action="https://app.getresponse.com/add_subscriber.html" accept-charset="utf-8" method="post">
	<input class="form-control" style="width:280px; height:40px; border:1px solid grey;margin-bottom:10px; text-align:center; font-size:16px;" type="text" name="first_name" placeholder="Имя" required/>
	<input class="form-control" style="width:280px; height:40px; border:1px solid grey;margin-bottom:10px; text-align:center; font-size:16px;" type="text" name="email" placeholder="Email" required/>
	<input type="hidden" name="campaign_token" value="VjVkP" />
	<input type="hidden" name="thankyou_url" value="http://iteam.ru/promo/subscribe/book_offer/"/>
	<input type="hidden" name="start_day" value="0" />
	<input type="hidden" name="forward_data" value="" />
	<input style="width:280px; height:44px; border:none; border-radius:4px; margin-bottom:10px;background-color:#AD0011 !important;color:#fff;font-weight:bold;font-size:18px;" type="submit" value="ПОЛУЧИТЬ"/>
</form>
</div>
		
		
		
		
		
		
			 </div>
			<!--
			<div>
				<form class="form" action="https://app.getresponse.com/add_contact_webform_v2.html?u=Bh5z&amp;webforms_id=2487106" method="post">
					<fieldset>
						<div class="input-group">
							<input id="name" class="form-control" name="webform[first_name]" type="text" placeholder="Ваше Имя">
						</div>
						<div class="input-group">
							<input id="email" class="form-control" name="webform[email]" type="email" placeholder="Ваш Email" required>
						</div>
						<div class="forms">
							<button type="submit" class="btn btn-warning">Получить подарок!</button>
						</div>
					</fieldset>
				</form>
			</div>
			<p>Учитесь у лучших!</p>
			-->
		</div>
		<div class="text">
			<div style="text-align:center;padding:1px;border-radius:4px;margin-top:10px;">
			<p><b>Также Вы можете воспользоваться поиском по сайту:</b></p>
			<div class="search_form form">
				<form id="cse-search-box" class="search-form form-inline" action="https://iteam.ru/search">
					<input type="hidden" name="siteurl" value="">
					<input type="hidden" name="ref" value="">
					<input type="hidden" name="ss">
					<input type="hidden" value="partner-pub-2457866150117626:somrxulncq7" name="cx">
					<input type="hidden" value="FORID:9" name="cof">
					<input type="hidden" value="utf-8" name="ie">
					<div class="input-group">
						<input type="text" class="form-control" placeholder="Поиск по сайту iTeam..." autocomplete="off" id="q" style="height: 40px;border: 2px solid #999999; border-right:none;" name="q" spellcheck="false">
						<span class="input-group-btn">
							<button class="btn btn-default" type="submit" name="sa" value="🔍">
								<span class="glyphicon glyphicon-search" aria-hidden="true"></span>
							</button>
						</span>
					</div><!-- /input-group -->
				</form>
			</div>

			<p class="text-center" style="margin-top:10px;"><a href="/">Вернуться на главную</a></p>
			</div>
		</div>
		
		</div>
		</div>
		</div>
		
	</main>

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
	
	</body>
</html>