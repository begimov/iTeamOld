@extends('iteam.newtemplate_no_fb')

@section('title')
	{{ $page->meta_title ? $page->meta_title . ' ' : ($page->title ? $page->title . ' ' : '') }}
	|
@stop

@section('head')
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
	<style>
	.spinner {
		margin: 0px auto 0;
		width: 70px;
		text-align: center;
	}
	.spinner > div {
		width: 18px;
		height: 18px;
		background-color: #fff;

		border-radius: 100%;
		display: inline-block;
		-webkit-animation: sk-bouncedelay 1.4s infinite ease-in-out both;
		animation: sk-bouncedelay 1.4s infinite ease-in-out both;
	}
	.spinner .bounce1 {
		-webkit-animation-delay: -0.32s;
		animation-delay: -0.32s;
	}
	.spinner .bounce2 {
		-webkit-animation-delay: -0.16s;
		animation-delay: -0.16s;
	}
	@-webkit-keyframes sk-bouncedelay {
		0%, 80%, 100% { -webkit-transform: scale(0) }
		40% { -webkit-transform: scale(1.0) }
	}
	@keyframes sk-bouncedelay {
		0%, 80%, 100% {
			-webkit-transform: scale(0);
			transform: scale(0);
			} 40% {
				-webkit-transform: scale(1.0);
				transform: scale(1.0);
			}
		}
		.nounderline {
			text-decoration: none !important;
		}
		.jumbotron {
			margin-top: -60px;
			padding: 1px;
			margin-bottom: 0;
			background: url("img/bghome.jpg");
			background-size: cover;
			background-repeat: no-repeat;
			color: #fff;
		}
		.row {
			display: flex;
			display: -webkit-flex;
			flex-wrap: wrap;
			height: 100%;
		}
		.thumbnail {
			height: 100%;
		}
		.top-left-block {
			padding: 20px;
		}
		.top-right-block {
			background-color: #870100;
			color: #fff;
			padding: 20px;
		}
		.img-books-bg {
			background-image: url('img/books.jpg');
			background-size: cover;
			background-repeat: no-repeat;
		}
		.section-title {
			background-color: #870100;
			color: #fff;
			padding: 15px 0 0 0;
		}
		.master-klass-section {
			padding: 20px 0 20px 0;
		}
		.test-results {
			padding: 20px 0 20px 0;
		}
		.person-title {
			width: 100%;
			background-color: #000;
			color: #fff;
			opacity: 0.6;
			margin: 0 auto;
			position: absolute;
			bottom: 0px;
			padding: 5px 0 5px 10px;
		}
		.col-xs-15,
		.col-sm-15,
		.col-md-15,
		.col-lg-15 {
			position: relative;
			min-height: 1px;
			padding-right: 0px;
			padding-left: 0px;
		}
		.col-xs-15 {
			width: 50%;
			float: left;
		}

		@media (min-width: 768px) {
			.col-sm-15 {
				width: 33%;
				float: left;
			}
		}

		@media (min-width: 992px) {
			.col-md-15 {
				width: 20%;
				float: left;
			}
		}

		@media (min-width: 1200px) {
			.col-lg-15 {
				width: 20%;
				float: left;
			}
		}

		.person-1 {
			position: relative;
			background: no-repeat url(img/01.jpg) 50% / 100%;
		}
		.person-2 {
			position: relative;
			background: no-repeat url(img/02.jpg) 50% / 100%;
		}
		.person-3 {
			position: relative;
			background: no-repeat url(img/03.jpg) 50% / 100%;
		}
		.person-4 {
			position: relative;
			background: no-repeat url(img/04.jpg) 50% / 100%;
		}
		.person-5 {
			position: relative;
			background: no-repeat url(img/05.jpg) 50% / 100%;
		}
		.person-img {
			vertical-align: top;
			width: 100%;
			opacity: 0;
		}
		.person-div {
			position: absolute;
			top: 0;
			width: 100%;
			height: 100%;
		}
		.congrat-btn {
			margin-top: 30px;
		}
		.container:before,
		.container:after,
		.row:before,
		.row:after {
			content: normal;
		}
		</style>
	@stop

	@section('main')

		<!-- КОПИРОВАТЬ ОТ СИХ !!!-->
		<a href="https://iteam.ru/15/happy_birthday.html" class="nounderline">
			<div class="jumbotron text-center">
				<div class="container">
					<h1 class="lead">День рождения iTeam</h1>
					<p><h2>Нам 15 лет</h2></p>
					<p class="congrat-btn"><button class="btn btn-danger btn-lg">Поздравить</button></p>
				</div>
			</div>
		</a>

		<div class="container-fluid">

			<div class="row img-books-bg">
				<div class="col-md-5">
					<div class="row">
						<div class="col-md-12 top-left-block text-center">
							<h3>53 книги, которые&nbsp;должен прочитать каждый руководитель</h3>
							<p>
								{{-- CHANGES --}}
								<a id='mylink' class="btn btn-danger btn-lg" data-loading-text="<div class='spinner'><div class='bounce1'></div><div class='bounce2'></div><div class='bounce3'></div></div>Загрузка...">Получить список книг</a>
								{{-- CHANGES --}}
							</p>
							<h5>Скачайте список лучших книг по&nbsp;управлению с&nbsp;аннотациями, рекомендованный экспертами iTeam</h5>
						</div>
					</div>
				</div>
				<div class="col-md-7 top-right-block">
					<h3>Сделайте вашу компанию управляемой и&nbsp;эфективной!</h3>
					<div class="row">
						<div class="col-md-6 col-sm-6 col-xs-6">
							<h5>Мы&nbsp;вооружаем управленцев методами и&nbsp;технологиями системного построения бизнеса</h5>
						</div>
						<div class="col-md-6 col-sm-6 col-xs-6">
							<p>
								<ul class="lead">
									<li>Стратегия</li>
									<li>Бизнес-процессы</li>
									<li>Планирование</li>
									<li>Мотивация</li>
									<li>Корпоративная культура</li>
									<li>Контроллинг</li>
								</ul>
							</p>
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-12 text-center">
					<!-- <h1>РУССКИЙ МЕНЕДЖМЕНТ</h1> -->
					<p>&nbsp;</p>
				</div>
			</div>

			<div class="row section-title">
				<div class="col-md-12">
					<h6>МАСТЕР-КЛАССЫ</h6>
				</div>
			</div>
			<div class="row master-klass-section">
				<div class="col-md-3 col-sm-3 col-xs-6">
					<div class="thumbnail">
						<a href="https://iteam.ru/landing/template/razrabotka-planov-i-budzhetov-MP.html"><img src="img/mp4.jpg" alt="Разработка планов и бюджетов компании на 2018 год"></a>
						<div class="caption">
							<a href="https://iteam.ru/landing/template/razrabotka-planov-i-budzhetov-MP.html"><h5>Разработка планов и&nbsp;бюджетов компании на&nbsp;2018&nbsp;год</h5></a>
							<p>Старт 9&nbsp;октября&nbsp;2017</p>
						</div>
					</div>
				</div>
				<div class="col-md-3 col-sm-3 col-xs-6">
					<div class="thumbnail">
						<a href="https://iteam.ru/learn/course/razrabotka-strategii-kompanii"><img src="img/mk2.jpg" alt="Разработка стратегии компании"></a>
						<div class="caption">
							<a href="https://iteam.ru/learn/course/razrabotka-strategii-kompanii"><h5>Разработка стратегии компании</h5></a>
							<p>Старт 14&nbsp;сентября&nbsp;2017</p>
						</div>
					</div>
				</div>
				<div class="col-md-3 col-sm-3 col-xs-6">
					<div class="thumbnail">
						<a href="https://iteam.ru/learn/course/kak-postroit-sistemu-upravlenija-protsessami-za-4-mesjatsa"><img src="img/mk3.jpg" alt="Создание системы управления процессами"></a>
						<div class="caption">
							<a href="https://iteam.ru/learn/course/kak-postroit-sistemu-upravlenija-protsessami-za-4-mesjatsa"><h5>Создание системы управления процессами</h5></a>
							<p>14 мастер-классов +&nbsp;50 шаблонов +&nbsp;консультации!</p>
						</div>
					</div>
				</div>
				<div class="col-md-3 col-sm-3 col-xs-6">
					<div class="thumbnail">
						<a href="https://iteam.ru/learn/webinar/effective_planning"><img src="img/mk4.jpg" alt="Планирование как система"></a>
						<div class="caption">
							<a href="https://iteam.ru/learn/webinar/effective_planning"><h5>Планирование как&nbsp;система</h5></a>
							<p>Как организовать планирование в&nbsp;компании от&nbsp;стратегического до&nbsp;оперативного уровня</p>
						</div>
					</div>
				</div>
			</div>

			<div class="row section-title">
				<div class="col-md-12">
					{{-- <h6>Результаты тестирования</h6> --}}
				</div>
			</div>
			<div class="row test-results">
				<div class="col-md-6">
					<div class="row">
						<div class="col-md-12">
							<h3>Оценка системы управления процессами</h3>
							<p>Всего прошли тестирование 1247 человека</p>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<h3>Что мешает вашей компании получать больше прибыли?</h3>
					<p class="lead">Определите слабые места и&nbsp;получите рекомендации наших консультантов</p>
					<p><a href="https://iteam.ru/tests/show/3" class="btn btn-danger btn-lg">Пройти тест</a></p>
				</div>
			</div>

			<div class="row section-title">
				<div class="col-md-12">
					<h6>АВТОРЫ</h6>
				</div>
			</div>
			<div class="row">
				<div class="col-md-15 col-sm-15 col-xs-15">
					<div class="person-1">
						<img src="img/01.jpg" class="person-img">
						<div class=person-div>
							<div class="person-title">
								<strong>Дмитрий Корнилин</strong>
								<br>Эксперт
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-15 col-sm-15 col-xs-15 ">
					<div class="person-2">
						<img src="img/02.jpg" class="person-img">
						<div class=person-div>
							<div class="person-title">
								<strong>Марина Ступакова</strong>
								<br>Эксперт
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-15 col-sm-15 col-xs-15">
					<div class="person-3">
						<img src="img/03.jpg" class="person-img">
						<div class=person-div>
							<div class="person-title">
								<strong>Александр Кочнев</strong>
								<br>Управляющий партнер
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-15 col-sm-15 col-xs-15">
					<div class="person-4">
						<img src="img/04.jpg" class="person-img">
						<div class=person-div>
							<div class="person-title">
								<strong>Дмитрий Наконечный</strong>
								<br>Эксперт
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-15 col-sm-15 col-xs-15">
					<div class="person-5">
						<img src="img/05.jpg" class="person-img">
						<div class=person-div>
							<div class="person-title">
								<strong>Ольга Андреева</strong>
								<br>Эксперт
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>

	@stop

	@section('scripts')
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
		<script type="text/javascript">

		$(document).ready(function () {
			$('#mylink').click(function (e) {
				var $this = $(this);
				$this.button('loading');
				setTimeout(function() {
					$this.button('reset');
				}, 5000);
			});
		});

		var myLink = document.getElementById('mylink');

		myLink.onclick = function() {
			var script = document.createElement("script");
			script.type = "text/javascript";
			script.src = "https://app.getresponse.com/view_webform_v2.js?u=Bh5z&webforms_id=6168206";
			document.getElementsByTagName("body")[0].appendChild(script);
			return false;
		}

		</script>
		<!-- КОПИРОВАТЬ ДО СИХ !!! -->
	@stop
