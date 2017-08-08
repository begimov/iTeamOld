<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<head>

		<!--meta charset="utf-8" /-->
		<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta content="width=device-width, initial-scale=1" name="viewport">
		<meta property="fb:admins" content="100000287596744"/>
        <meta property="fb:admins" content="100014169376144"/>
        <meta property="fb:app_id" content="1254406184618438" />

		<meta name="robots" content="true" />
		<title>
			@yield('title')
			{{ trans('front/site.title') }}
		</title>
		<!--link href="" rel="canonical"-->
		<meta content="{{ trans('front/site.title') }}" name="title">

		<meta content="always" name="referrer">



		@if(isset($page))
			<meta name="keywords" content="{{ $page->meta_keywords ? $page->meta_keywords . ' ' : ($page->title ? $page->title . ' ' : '') }}">
			<meta name="description" content="{{ $page->meta_description ? $page->meta_description . ' ' : ($page->title ? $page->title . ' ' : '') }}">
			<meta name="og:description" content="{{ $page->meta_description ? $page->meta_description . ' ' : ($page->title ? $page->title . ' ' : '') }}">
		@else
			@yield('meta')
		@endif

		<meta content="@iTeam" name="twitter:site">
		<meta name="yandex-verification" content="4297394ba43ef620" />
		<!--meta content="summary" name="twitter:card">
		<meta content="iTeam" name="twitter:app:name:iphone">
		<meta content="" name="twitter:app:id:iphone">
		<meta content="iTeam:/" name="twitter:app:url:iphone">

		<meta content="#000000" name="theme-color"-->
		<base href="https://iteam.ru/">

		<link href="//plus.google.com/117555378053181976019" rel="publisher">
		<link href="//fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

		<!-- Bootstrap Core CSS -->
		<link href="/css/bootstrap.min.css" rel="stylesheet">
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
		@yield('head')

		<link href="/css/style.css?f5=<?=time()?>" rel="stylesheet">

		<!--[if (lt IE 9) & (!IEMobile)]>
			{!! HTML::script('js/vendor/respond.min.js') !!}
		<![endif]-->
		<!--[if lt IE 9]>
			{!! HTML::style('//oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.js') !!}
			{!! HTML::style('//oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js') !!}
		<![endif]-->

		<script type="text/javascript" src="//code.jquery.com/jquery-2.1.0.js"></script>

		<script type="text/javascript" src="/@Tuning/js/jquery/plugins/js.cookie.js"></script>

		<script type="text/javascript" src="/js/js.js?f5=<?=time()?>"></script>

		<link href="/favicon.ico" rel="shortcut icon" type="image/x-icon">
		<link href="/favicon.ico" rel="icon" type="image/x-icon">
		<!--link href="/apple-touch-icon-precomposed.png" rel="apple-touch-icon-precomposed" sizes="152x152"-->
		<!--link href="/apple-touch-icon-precomposed-120.png" rel="apple-touch-icon-precomposed" sizes="120x120"-->
		<!--link href="/apple-touch-icon-precomposed-76.png" rel="apple-touch-icon-precomposed" sizes="76x76"-->
		<!--link href="/apple-touch-icon-precomposed.png" rel="apple-touch-icon-precomposed"-->


		<!--Load the AJAX API-->
		<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
		<script type="text/javascript">

            // Load the Visualization API and the corechart package.
            google.charts.load('current', {'packages':['corechart']});

            // Set a callback to run when the Google Visualization API is loaded.
            google.charts.setOnLoadCallback(drawChart);

            // Callback that creates and populates a data table,
            // instantiates the pie chart, passes in the data and
            // draws it.
            function drawChart() {

                // Create the data table.
                var data = new google.visualization.DataTable();
                data.addColumn('string', 'Topping');
                data.addColumn('number', 'Slices');
                data.addRows([
                    ['Отлично', {{ isset($result["t5"]) ? $result["t5"] : 1 }}],
                    ['Хорошо', {{ isset($result["t4"]) ? $result["t4"] : 1 }}],
                    ['Удовлетворительно', {{ isset($result["t3"]) ? $result["t3"] : 1 }}],
                    ['Плохо', {{ isset($result["t2"]) ? $result["t2"] : 1 }}]
                ]);

                // Set chart options
                var options = {'title':'Результаты тестирования',
                    'width':360,
                    'height':250,
                    backgroundColor: '#FAFAFA'
                };

                // Instantiate and draw our chart, passing in some options.
                var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
                chart.draw(data, options);
            }
		</script>
		{{--<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>--}}
		{{--<script type="text/javascript">--}}
            {{--google.charts.load("current", {packages:["corechart"]});--}}
            {{--google.charts.setOnLoadCallback(drawChart);--}}
            {{--function drawChart() {--}}
                {{--var data = google.visualization.arrayToDataTable([--}}
                    {{--['Отлично', {{ isset($result["t5"]) && $result["t5"] != 0 ? $result["t5"] : 1 }}],--}}
                    {{--['Хорошо', {{ isset($result["t4"]) && $result["t4"] != 0 ? $result["t4"] : 1 }}],--}}
                    {{--['Удовлетворительно', {{ isset($result["t3"]) && $result["t3"] != 0 ? $result["t3"] : 1 }}],--}}
                    {{--['Плохо', {{ isset($result["t2"]) && $result["t2"] != 0 ? $result["t2"] : 1 }}]--}}
                {{--]);--}}

                {{--var options = {--}}
                    {{--title: 'My Daily Activities',--}}
                    {{--is3D: true,--}}
                {{--};--}}

                {{--var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));--}}
                {{--chart.draw(data, options);--}}
            {{--}--}}
		{{--</script>--}}

</head>


  <body data-user_login="{{ @$user ? ($user->login ? $user->login : $user->username) : '' }}" class="body">


	<!--[if lt IE 8]>
		<p class="browserupgrade">Ваш браузер устарел. Сайт будет работать неправильно. Чтобы исправить проблему нажмите <a href="//browsehappy.com/">здесь</a>.</p>
	<![endif]-->

	<div id="wrapper">

	@if(session()->has('error'))
		@include('partials/error', ['type' => 'danger', 'message' => session('error')])
	@endif

		<div id="header" class="bar--line-bottom">
			<div class="header-body">


				<div class="header-logo-svg">

					<svg id="svg1" width="48" height="48" fill="#c00" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 140 140" xmlns="//www.w3.org/2000/svg">
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

				</div>

				<div class="header-logo">

				@if(Request::is('/'))
					<h1 class="iteam_logo_png_36">
						<span class="iteam_logo_text">{{ trans('front/site.title') }}</span>
					</h1>
				@else
					<a href="/" class="iteam_logo_png_36" title="{{ trans('front/site.title') }} {{ trans('front/site.sub-title') }}">
						<span class="iteam_logo_text">{{ trans('front/site.title') }}</span>
					</a>
				@endif

				</div>


				<div class="header-subscribe _update">
						<!-- <a class="toggle"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> <span class="hidden-xs">Получить доступ к циклу статей «BSC, KPI, контроллинг»</span></a> -->
						<a class="toggle"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> <span class="hidden-xs">Вам подарок! Книга "Как внедрить бизнес-процессы".</span></a>

												<div id="subscribe_box" class="toggle_box">

	<form action="https://app.getresponse.com/add_subscriber.html" accept-charset="utf-8" method="post">
	<input class="form-control" style="width:180px; height:30px; border:1px solid grey;margin-bottom:5px; text-align:center; font-size:14px;" type="text" name="first_name" placeholder="Имя" required/>
	<input class="form-control" style="width:180px; height:30px; border:1px solid grey;margin-bottom:5px; text-align:center; font-size:14px;" type="text" name="email" placeholder="Email" required/>
	<input type="hidden" name="campaign_token" value="VjVkP" />
	<input type="hidden" name="thankyou_url" value="http://iteam.ru/promo/subscribe/book_offer/"/>
	<input type="hidden" name="start_day" value="0" />
	<input type="hidden" name="forward_data" value="" />
	<input style="width:180px; height:34px; border:none; border-radius:4px; margin-bottom:5px;background-color:#AD0011 !important;color:#fff;font-weight:bold;font-size:14px;" type="submit" value="ПОЛУЧИТЬ"/>
</form>
							<!--
							<form class="oldform" accept-charset="utf-8" action="//app.getresponse.com/add_contact_webform.html?u=Bh5z" method="post" target="_blank" style="width:98%;">
								<input type="hidden" name="webform_id" value="4189606">
								<input type="text" value="" placeholder="Имя" name="name" required>
								<input type="email" value="" placeholder="@Почта" name="email" required>
								<input type="submit" name="submit" value="Подписаться">
							</form>
							-->
							<a class="closer closer-smallicon" href="#subscribe_box" title="Закрыть это окно">Закрыть</a>
						</div>
				</div>

				<nav class="header-nav header-nav-css">
					<ul>
						<li>
							<a class="{!! classActivePath('/publications/') !!}{!!classActiveSegment(1, ['publications']) !!} link_articles" href="/publications">Статьи</a>
							<ul class="dropmenu menu_articles">
								<li><a href="/publications/target/">Целевое управление</a>
									<ul class="submenu">
										<li><a href="/publications/target/introduction/">Введение</a></li>
										<li><a href="/publications/target/projection_finance/">Проекция Финансы</a></li>
										<li><a href="/publications/target/projection_market/">Проекция Рынок</a></li>
										<li><a href="/publications/target/projection_processes/">Проекция Процессы</a></li>
										<li><a href="/publications/target/projection_staff/">Проекция Сотрудники</a></li>
										<li><a href="/publications/target/strategy/">Стратегия</a></li>
									</ul>
								</li>
								<li><a href="/publications/processes/">Управление бизнес-процессами</a>
									<ul class="submenu">
										<li><a href="/publications/processes/process_control_system/design/">Проектирование процессов</a></li>
										<li><a href="/publications/processes/process_control_system/construct/">Построение процессов</a></li>
									</ul>
								</li>
								<li><a href="/publications/corporation/">Корпоративное управление</a>
									<ul class="submenu">
										<li><a href="/publications/corporation/section_94/">Коллегиальные органы управления</a></li>
										<li><a href="/publications/corporation/section_95/">Оценка корпоративного управления</a></li>
										<li><a href="/publications/corporation/section_96/">Корпоративное право</a></li>
										<li><a href="/publications/corporation/section_97/">Управленческие структуры</a></li>
										<li><a href="/publications/corporation/section_98/">Корпоративные финансы</a></li>
										<li><a href="/publications/corporation/section_99/">Собственник и менеджер</a></li>
										<li><a href="/publications/corporation/section_100/">Процессы и функции</a></li>
									</ul>
								</li>
								<li><a href="/publications/strategy/">Стратегическое управление</a>
									<ul class="submenu">
										<li><a href="/publications/strategy/section_15/">Миссия фирмы</a></li>
										<li><a href="/publications/strategy/section_27/">Сбалансированная система показателей</a></li>
										<li><a href="/publications/strategy/section_16/">Стратегический анализ</a></li>
										<li><a href="/publications/strategy/section_17/">Разработка стратегии</a></li>
										<li><a href="/publications/strategy/section_18/">Реализация стратегии</a></li>
										<li><a href="/publications/strategy/section_19/">Привлечение инвестиций</a></li>
										<li><a href="/publications/strategy/section_20/">Стоимость компании</a></li>
										<li><a href="/publications/strategy/section_32/">Корпоративная культура</a></li>
										<li><a href="/publications/strategy/section_33/">Личность руководителя</a></li>
									</ul>
								</li>
								<li><a href="/publications/finances/">Финансовое управление</a>
									<ul class="submenu">
										<li><a href="/publications/finances/section_43/">Финансовая стратегия</a></li>
										<li><a href="/publications/finances/section_11/">Концепции бюджетного управления</a></li>
										<li><a href="/publications/finances/section_12/">Опыт внедрения бюджетирования</a></li>
										<li><a href="/publications/finances/section_50/">Постановка управленческого учета</a></li>
										<li><a href="/publications/finances/section_29/">Финансовый анализ</a></li>
										<li><a href="/publications/finances/section_30/">Оперативное управление финансами</a></li>
										<li><a href="/publications/finances/section_13/">Информационные технологии</a></li>
									</ul>
								</li>
								<li><a href="/publications/marketing/">Маркетинговое управление</a>
									<ul class="submenu">
										<li><a href="/publications/marketing/section_28/">Концепции маркетинга</a></li>
										<li><a href="/publications/marketing/section_23/">Анализ и планирование</a></li>
										<li><a href="/publications/marketing/section_62/">Брендинг</a></li>
										<li><a href="/publications/marketing/section_22/">Маркетинговые исследования</a></li>
										<li><a href="/publications/marketing/section_49/">Реклама и PR</a></li>
										<li><a href="/publications/marketing/section_25/">Маркетинг в интернет</a></li>
										<li><a href="/publications/marketing/section_26/">Технологии CRM</a></li>
										<li><a href="/publications/marketing/section_90/">Маркетинговые генералы</a></li>
									</ul>
								</li>
								<li class="tobottom"><a href="/publications/human/">Управление персоналом</a>
									<ul class="submenu">
										<li><a href="/publications/human/section_44/">Эффективное управление персоналом</a></li>
										<li><a href="/publications/human/section_46/">Подбор и адаптация</a></li>
										<li><a href="/publications/human/section_87/">Командообразование</a></li>
										<li><a href="/publications/human/section_67/">Развитие и карьера</a></li>
										<li><a href="/publications/human/section_47/">Оценка</a></li>
										<li><a href="/publications/human/section_48/">Мотивация и стимулирование</a></li>
										<li><a href="/publications/human/section_70/">Персонал и изменения</a></li>
										<li><a href="/publications/human/section_45/">Служба персонала</a></li>
										<li><a href="/publications/human/section_55/">Управление знаниями</a></li>
									</ul>
								</li>
								<li class="tobottom"><a href="/publications/quality/">Управление качеством</a>
									<ul class="submenu">
										<li><a href="/publications/quality/section_81/">Типология СМК</a></li>
										<li><a href="/publications/quality/section_57/">Классическая основа качества</a></li>
										<li><a href="/publications/quality/section_60/">Принципы СМК</a></li>
										<li><a href="/publications/quality/section_58/">СМК по стандартам ИСО</a></li>
										<li><a href="/publications/quality/section_82/">СМК по TQM</a></li>
										<li><a href="/publications/quality/section_83/">СМК по теории 6 сигм</a></li>
										<li><a href="/publications/quality/section_84/">Другие модели СМК. Сертификация</a></li>
										<li><a href="/publications/quality/section_85/">Прикладное значение СМК</a></li>
										<li><a href="/publications/quality/section_61/">Опыт внедрений</a></li>
										<li><a href="/publications/quality/section_59/">Инструменты</a></li>
									</ul>
								</li>
								<li class="tobottom"><a href="/publications/project/">Проектное управление</a>
									<ul class="submenu">
										<li><a href="/publications/project/section_35/">Методология проектного управления</a></li>
										<li><a href="/publications/project/section_36/">Процессы проектного управления</a></li>
										<li><a href="/publications/project/section_37/">Организация проектного управления</a></li>
										<li><a href="/publications/project/section_38/">Поддержка проектного управления</a></li>
										<li><a href="/publications/project/section_39/">Обучение и сертификация</a></li>
										<li><a href="/publications/project/section_40/">Практика проектного управления</a></li>
										<li><a href="/publications/project/section_41/">Постановка проектного управления</a></li>
										<li><a href="/publications/project/section_42/">Место проектного управления</a></li>
									</ul>
								</li>
								<li class="tobottom"><a href="/publications/logistics/">Логистика</a>
									<ul class="submenu">
										<li><a href="/publications/logistics/section_89/">Закупочная логистика</a></li>
										<li><a href="/publications/logistics/section_72/">Сбытовая логистика</a></li>
										<li><a href="/publications/logistics/section_73/">Транспортная логистика</a></li>
										<li><a href="/publications/logistics/section_74/">Логистика запасов</a></li>
										<li><a href="/publications/logistics/section_75/">Складская логистика</a></li>
										<li><a href="/publications/logistics/section_79/">Обеспечение логистических систем</a></li>
										<li><a href="/publications/logistics/section_80/">Управление цепочками поставок</a></li>
									</ul>
								</li>
								<li class="tobottom"><a href="/publications/consulting/">Консалтинг</a>
									<ul class="submenu">
										<li><a href="/publications/consulting/section_76/">Преимущества сотрудничества с консультантами</a></li>
										<li><a href="/publications/consulting/section_77/">Выбор консультанта</a></li>
										<li><a href="/publications/consulting/section_78/">Управление рисками проекта</a></li>
										<li><a href="/publications/consulting/section_86/">Маркетинг консалтинговых услуг</a></li>
									</ul>
								</li>
								<li class="tobottom"><a href="/publications/it/">Информационные технологии</a>
									<ul class="submenu">
										<li><a href="/publications/it/section_92/">Аналитические системы</a></li>
										<li><a href="/publications/it/section_52/">ERP</a></li>
										<li><a href="/publications/it/section_64/">Системы электронного документооборота (СЭД)</a></li>
										<li><a href="/publications/it/section_88/">Управление нормативно-справочной информацией (НСИ)</a></li>
										<li><a href="/publications/it/section_91/">Управление ИТ</a></li>
										<li><a href="/publications/it/section_51/">Моделирование</a></li>
										<li><a href="/publications/it/section_53/">Внедрение и эффективность</a></li>
										<li><a href="/publications/it/section_54/">Выбор ИС</a></li>
										<li><a href="/publications/it/section_63/">ИТ и люди</a></li>
									</ul>
								</li>
								<li class="tobottom"><a href="/publications/legal/">Юридическое обеспечение</a>
									<ul class="submenu">
										<li><a href="/publications/legal/section_102/">О праве</a></li>
										<li><a href="/publications/legal/section_103/">Работа юридических подразделений</a></li>
										<li><a href="/publications/legal/section_104/">Отношения с государством</a></li>
										<li><a href="/publications/legal/section_105/">Договорная работа</a></li>
										<li><a href="/publications/legal/section_106/">Внутренняя работа юристов в компаниях</a></li>
										<li><a href="/publications/legal/section_107/">Конфликты и суды</a></li>
									</ul>
								</li>
							</ul>
						</li>
						<!-- <li><a class="{!! classActiveSegment(1, ['news']) !!} link_news" href="/news">Новости</a></li> -->
						<li><a class="{!! classActiveSegment(1, ['news']) !!} link_news" href="http://blog.iteam.ru">Блог</a></li>
						<li><a class="{!! classActiveSegment(1, ['literature']) !!} link_books" href="/literature">Книги</a>
							<ul class="dropmenu menu_books">
								<li><a href="/literature/processes">Управление бизнес-процессами</a></li>
								<li><a href="/literature/consulting">Консалтинг</a></li>
								<li><a href="/literature/quality">Управление качеством</a></li>
								<li><a href="/literature/human">Управление персоналом</a></li>
								<li><a href="/literature/project">Проектное управление</a></li>
								<li><a href="/literature/marketing">Маркетинговое управление</a></li>
								<li><a href="/literature/finances">Финансовое управление</a></li>
								<li><a href="/literature/strategy">Стратегическое управление</a></li>
								<li><a href="/literature/corporation">Корпоративное управление</a></li>
							</ul>
						</li>
						<li><a class="link_learn" href="//iteam.ru/learn">Мастер-классы</a></li>
						<li>
							<a href="//iteam.ru/company">Компания</a>
						</li>
						<li>
							<a href="//iteam.ru/company/service">Услуги</a>
						</li>
						<li>
							<a href="//iteam.ru/company/response">Отзывы</a>
						</li>
						<li>
							<a href="//iteam.ru/company/contact">Контакты</a>
						</li>
					</ul>
				</nav>

				<div class="header-auth _css_float--right navbar-right">
				@if(Auth::user())
					<span class="dropdown">
						<a href="/i" class="dropdown-toggle img-circle" id="userMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
						@if(Auth::user()->avatar)
							<img style="max-width:32px;max-height:32px;border:1px solid gray;" src="/filemanager/userfiles/user{{ Auth::user()->id }}/100/{!! Auth::user()->avatar !!}" alt="iam" class="img-circle">
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
				</div>

				<div class="header-search _css_float--right">
					<form id="cse-search-box" class="search-form" action="/search">
						<input type="hidden" name="siteurl" value="">
						<input type="hidden" name="ref" value="">
						<input type="hidden" name="ss">
						<input type="hidden" value="partner-pub-2457866150117626:somrxulncq7" name="cx">
						<input type="hidden" value="FORID:9" name="cof">
						<input type="hidden" value="utf-8" name="ie">
						<input type="text" size="20" autocomplete="off" id="q" name="q" spellcheck="false">
						<button type="submit" name="sa" value="q"><i class="material-icons">&#xE8B6;</i></button>
					</form>
				</div>

			</div>
		</div>


		@yield('header')


	<div class="clear"></div>

	<div id="layout">

		<main role="main" class="container">
			@if(session()->has('ok'))
				@include('partials/error', ['type' => 'success', 'message' => session('ok')])
			@endif
			@if(isset($info))
				@include('partials/error', ['type' => 'info', 'message' => $info])
			@endif

			@yield('main')

			<div class="container">

				<div id="fb-root">&nbsp;</div>
				<script>(function(d, s, id) {
				  var js, fjs = d.getElementsByTagName(s)[0];
				  if (d.getElementById(id)) return;
				  js = d.createElement(s); js.id = id;
				  js.src = "//connect.facebook.net/ru_RU/sdk.js#xfbml=1&version=v2.8&appId=1254406184618438";
				  fjs.parentNode.insertBefore(js, fjs);
				}(document, 'script', 'facebook-jssdk'));</script>

				<div class="fb-comments" data-href="<?php echo 'https://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']; ?>" data-width="700" data-numposts="10"></div>

			</div>
		</main>

		@yield('bottom')

		@include('front.sidebar')



		<div id="footer">



			<div class="footer-body">


			    <style type="text/css">
#toTop {
 float:left;
 width:100px;
 height:50px;
 /*border:1px solid #ccc;
 background:#f7f7f7;
 text-align:center;
 padding:5px;*/
 position:fixed;
 bottom:20px; /* отступ кнопки от нижнего края страницы*/
 right:320px;
 cursor:pointer;
 display:none;
 color:transparent;
 /*font-family:verdana;
 font-size:11px;*/
 background:url('https://iteam.ru/filemanager/userfiles/user0/icons/totop2.png') no-repeat;
 background-size:50%;
}
#toTop:hover {
opacity:0.7;
}
</style>
<script type="text/javascript">
$(function() {$(window).scroll(function() {if($(this).scrollTop() != 0) {$('#toTop').fadeIn();} else {$('#toTop').fadeOut();}});$('#toTop').click(function() {$('body,html').animate({scrollTop:0},800);});});
</script>
<div id="toTop">Наверх</div>

			</div>

			<div class="container">
			<div class="row">
                <div class="col-md-4">
                    <h5>&copy; 2002 - {{ date('Y') }} <strong>{{ trans('front/site.title') }}</strong></h5>
                    <p>Москва, Пресненская наб. 12</p>
                    <ul class="list-unstyled">
                        <li><i class="fa fa-phone fa-fw"></i> (499) 110-2684</li>
                        <li><i class="fa fa-envelope-o fa-fw"></i>  <a href="mailto:info@iteam.ru">info@iteam.ru</a></li>
						<li role="separator" class="divider"></li>
                        <li><a href="/company/contact"><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span> Все контакты</a></li>
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
                </div>

                <div class="col-md-2 col-md-offset-1 visible-lg visible-md -text-right">
                    <h5 class="-hidden"><strong>Компания</strong></h5>
                    <ul class="list-unstyled">
                        <li><a href="/company/about">О компании</a></li>
                        <li><a href="/company/service">Услуги</a></li>
                        <li><a href="/company/projects">Проекты</a></li>
                        <li><a href="/company/response">Отзывы</a></li>
                    </ul>
                </div>
                <div class="col-md-2 visible-lg visible-md">
                    <h5 class="-hidden"><strong>Обучение</strong></h5>
                    <ul class="list-unstyled">
                        <li><a href="/learn/breakfast">Бизнес-завтраки</a></li>
                        <li><a href="/learn/webinar">Мастер-классы</a></li>
                        <li><a href="/learn/course">Мастер-проекты</a></li>
                    </ul>
                </div>

            </div>
            </div>
            </div>

		</div>

		@yield('edit-link')

	</div>

	<div id="goodbye" style="z-index:9999999;" class="blur_fon">
		<div class="goodbye_content">
			<h2>Вам подарок!</h2>
			<!--<p><i style="font-size:96px;color:#c00;" class="material-icons">&#xE8F6;</i></p>-->
			<!-- <img style="width: 200px;" src="https://iteam.ru/images/icons/book/11_1.png" alt="Как внедрить бизнес-процессы"><br/> -->
			<img style="width: 220px;margin-left:-30px;" src="https://iteam.ru/images/icons/book/11_4.png" alt="Как внедрить бизнес-процессы">
			<div style="color: #AD0011; font-size:28px; font-weight: bold; line-height: 40px;">КНИГА<br/>
"Как внедрить бизнес-процессы"!</div>

<div style="margin-left:-10px;"><script type="text/javascript" src="https://app.getresponse.com/view_webform_v2.js?u=Bh5z&webforms_id=5388406"></script></div>

			<!-- <form class="oldform" accept-charset="utf-8" action="//app.getresponse.com/add_contact_webform.html?u=Bh5z" method="post" target="_blank" style="width:70%;margin:20px auto;">
				<input type="hidden" name="webform_id" value="9340301">
				<input type="text" value="" placeholder="Имя" name="name" required>
				<input type="email" value="" placeholder="@Почта" name="email" required>
				<input type="submit" name="submit" value="Получить доступ">
			</form> -->
			<!--<br>
			<p>Практическое руководство по внедрению бизнес-процессов шаг за шагом</p> -->
			<a class="closer closer-icon" href="#goodbye" title="Закрыть это окно">Закрыть</a>
		</div>
	</div>


<!------------------------------------------------------------------------------------>
	<?php if(isset($user) && @$user->role_id<2):#{?>
		<div style="display:none;position:fixed;bottom:0;left:0;width:24px;height:24px;z-index:99999;background-color:rgba(255,255,255,1);">
		<a id="edit" href="#" target="_blank">
			&#9998;
		</a>
		</div>
	<?php endif;#}?>

    <!-- Bootstrap Core JavaScript -->
	{!! HTML::script('js/bootstrap.min.js') !!}

	<!-- begin of Top100 code -->
	<script id="top100Counter" type="text/javascript" src="//counter.rambler.ru/top100.jcn?413929"></script><noscript><img src="//counter.rambler.ru/top100.cnt?413929" alt="" width="1" height="1" border="0"></noscript>
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
				} catch(e) { }
			});

			var n = d.getElementsByTagName("script")[0],
				s = d.createElement("script"),
				f = function () { n.parentNode.insertBefore(s, n); };
			s.type = "text/javascript";
			s.async = true;
			s.src = "//mc.yandex.ru/metrika/watch.js";

			if (w.opera == "[object Opera]") {
				d.addEventListener("DOMContentLoaded", f, false);
			} else { f(); }
		})(document, window, "yandex_metrika_callbacks");
	</script>
	<noscript><div><img src="//mc.yandex.ru/watch/30664892" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
	<!-- /Yandex.Metrika counter -->
	<script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
		ga('create', 'UA-62052326-1', 'auto');
		ga('send', 'pageview');
	</script>

	@yield('scripts')

	{{--<script type="text/javascript" src="//consultsystems.ru/script/35370/" async charset="utf-8"></script>--}}

	</body>
</html>
