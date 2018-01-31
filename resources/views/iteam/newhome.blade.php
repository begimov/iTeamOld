@extends('iteam.newtemplate_no_fb')

@section('title')
	{{ $page->meta_title ? $page->meta_title . ' ' : ($page->title ? $page->title . ' ' : '') }}
	|
@stop

@section('head')
<meta name="yandex-verification" content="49ca9b928d2d747f" />
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
    padding: 10px 1px 11px 1px;
    margin-bottom: 0;
    background: url("img/bg_index_marafon.jpg");
    background-size: cover;
    background-repeat: no-repeat;
    color: #fff;
  }
  .jumbotron2 {
    margin-top: -60px;
    padding: 12px 1px 11px 1px;
    margin-bottom: 0;
    background: url("https://iteam.ru/promo/2018/assets/img/bg/bg2018-banner.jpg");
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
    background-image: url('img/bghome5.jpg');
    background-size: auto;
    background-repeat: repeat;
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
  .top-right-block a,
  .top-right-block a:hover,
  .top-right-block a:visited
  {
      color: #fff;
  }
  .books-title {
      padding: 0 0 5px 0;
  }
  .books-sub-title {
      padding: 5px 0 0 0;
      margin: 0;
  }
  .vertical-align {
    display: flex;
    align-items: center;
  }
  .magnet-block {
      padding: 10px;
  }
  .img-responsive {
    margin: 0 auto;
  }
  </style>
@stop

@section('main')

<!-- КОПИРОВАТЬ ОТ СИХ !!!-->
  <a href="https://iteam.ru/promo/marafon/" class="nounderline">
  <!-- <a href="https://iteam.ru/15/happy_birthday.html" class="nounderline"> -->
  <!-- <a href="https://iteam.ru/promo/2018/index_after.html" class="nounderline"> -->
    <div class="jumbotron text-center">
      <div class="container">
        <p style="margin: -19px;" class="lead">
            <strong>Бесплатный онлайн-марафон &laquo;Русский менеджмент. Бизнес как система&raquo;.</strong><br>
            <span class="label label-primary">СТАРТ 12 февраля</span><br>
            <button class="btn btn-danger" style="margin-top: 10px;">УЧАСТВОВАТЬ</button>
        </p>
        <!-- <p style="margin: -19px;" class="lead"><strong>День рождения iTeam. Нам 15 лет.</strong> <button class="btn btn-danger">Поздравить!</button></p> -->
        <!-- <p style="margin: -19px;" class="lead"><strong>Счастливого Рождества! В подарок курсы iTeam со скидкой 90%</strong> <button class="btn btn-warning">ПОЛУЧИТЬ ПОДАРОК</button></p> -->
      </div>
    </div>
  </a>

  <div class="container-fluid">

    <div class="row vertical-align">
      <div class="col-md-6 col-sm-6 magnet-block">
          <img src="img/home_magnet_img.png" class="pull-right img-responsive" width="55%">
      </div>
      <div class="col-md-6 col-sm-6 text-left" style="margin: 10px 0 20px 0;">
            <h3><strong>Вам подарок!</strong></h3>
            <h5>КНИГА &laquo;Как внедрить бизнес-процессы&raquo;!</h5>
            <!-- <div class="row">
                <div class="col-md-7 col-sm-9 col-xs-11">
                <form action="/grform" method="get" id="grForm">
                    <div class="form-group form-group-lg">
                        <input type="email" class="form-control" name="email" placeholder="Email">
                     </div>
                     <div class="form-group form-group-lg">
                        <input type="text" class="form-control" name="name" placeholder="Имя">
                     </div>
                    <input type="hidden" name="campaign_token" value="nG2Jj" />
                    <a href="#" class="btn btn-danger btn-lg" id="grFormBtn" data-loading-text="<div class='spinner'><div class='bounce1'></div><div class='bounce2'></div><div class='bounce3'></div></div>">ПОЛУЧИТЬ</a>
                </form>
                <p class="help-block alert-danger" style="display: none;padding: 10px;" id="grFormHelpBlock"></p>
                </div>
            </div> -->
            <div style="float:left; margin-top:10px;">
                <script type="text/javascript" src="https://app.getresponse.com/view_webform_v2.js?u=Bh5z&webforms_id=6253806"></script>
            </div>
      </div>
    </div>

    <div class="row img-books-bg">
      <div class="col-md-12 top-right-block">
        <div class="row">
          <div class="col-md-6 col-sm-6">
            <h3><a href="https://iteam.ru/learn/webinar/manage_rightly">Сделайте вашу компанию управляемой и&nbsp;эффективной!</a></h3>
            <h5>Мы&nbsp;вооружаем управленцев <a href="https://iteam.ru/learn/webinar/manage_rightly">методами и&nbsp;технологиями системного построения бизнеса</a></h5>
          </div>
          <div class="col-md-6 col-sm-6">
            <p>
              <ul class="lead">
                <li><a href="https://iteam.ru/learn/strategicheskoe-upravlenie">Стратегия</a></li>
                <li><a href="https://iteam.ru/learn/upravlenie-protsessami">Бизнес-процессы</a></li>
                <li><a href="https://iteam.ru/learn/tselevoe-upravlenie">Планирование</a></li>
                <li><a href="https://iteam.ru/learn/motivatsija-sotrudnikov">Мотивация</a></li>
                <li><a href="https://iteam.ru/learn/korporativnaja-kultura">Корпоративная культура</a></li>
                <li><a href="https://iteam.ru/learn/tselevoe-upravlenie">Контроллинг</a></li>
              </ul>
            </p>
          </div>
        </div>
      </div>
    </div>
    
    <!-- <a href="https://iteam.ru/promo/2018/greetings.html" class="nounderline">
    <div class="jumbotron2 text-center" style="margin:0 -20px -40px -20px;">
      <div class="container">
        <p style="margin: -19px;" class="lead"><strong>Бизнесовый Дед Мороз исполнит ваши желания</strong> <button class="btn btn-danger">ЗАГАДАТЬ ЖЕЛАНИЕ!</button></p>
      </div>
    </div>
      </a> -->

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
      <!-- <div class="col-md-3 col-sm-3 col-xs-6">
        <div class="thumbnail">
          <a href="https://iteam.ru/landing/template/razrabotka-planov-i-budzhetov-MP.html"><img src="img/mp4.jpg" alt="Разработка планов и бюджетов компании на 2018 год"></a>
          <div class="caption">
            <a href="https://iteam.ru/landing/template/razrabotka-planov-i-budzhetov-MP.html"><h5>Разработка планов и&nbsp;бюджетов компании на&nbsp;2018&nbsp;год</h5></a>
            <p>Результат: 9&nbsp;готовых планов и&nbsp;бюджетов компании на&nbsp;2018 год за&nbsp;2&nbsp;месяца.</p>
          </div>
        </div>
      </div> -->
      <!-- <div class="col-md-3 col-sm-6 col-xs-6">
        <div class="thumbnail">
          <a href="https://iteam.ru/landing/template/nalogovyi-gambit.html"><img src="https://iteam.ru/landing/template/img/gambit.png" width="50%" alt="Налоговый гамбит. Как взаимодействовать с налоговой, чтобы не попасть в зону риска"></a>
          <div class="caption" style="margin-top:15px;">
            <a href="https://iteam.ru/landing/template/nalogovyi-gambit.html"><h6>ОТКРЫТА РЕГИСТРАЦИЯ</h6></a>
            <p>Бесплатный мастер-класс онлайн &laquo;Налоговый гамбит. Как взаимодействовать с&nbsp;налоговой, чтобы не&nbsp;попасть в&nbsp;зону риска&raquo;. 13&nbsp;декабря в&nbsp;11-00</p>
            <a href="https://iteam.ru/landing/template/nalogovyi-gambit.html" class="btn btn-danger btn-sm">УЧАСТВОВАТЬ</a>
          </div>
        </div>
      </div> -->
      <div class="col-md-3 col-sm-6 col-xs-6">
        <div class="thumbnail">
          <a href="https://iteam.ru/landing/template/nalogovyi-gambit.html"><img src="https://iteam.ru/landing/template/img/gambit.png" width="50%" alt="Налоговый гамбит. Как взаимодействовать с налоговой, чтобы не попасть в зону риска"></a>
          <div class="caption" style="margin-top:15px;">
            <a href="https://iteam.ru/landing/template/nalogovyi-gambit.html"><h6>БЕСПЛАТНЫЙ МАСТЕР-КЛАСС &laquo;Налоговый гамбит. Как взаимодействовать с&nbsp;налоговой, чтобы не&nbsp;попасть в&nbsp;зону риска&raquo;</h6></a>
            <p><a href="https://iteam.ru/landing/template/nalogovyi-gambit.html" class="btn btn-danger btn-sm">ПОСМОТРЕТЬ</a></p>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-sm-6 col-xs-6">
        <div class="thumbnail">
          <a href="https://iteam.ru/landing/template/sozdanie-sistemy-fin-ucheta.html"><img src="https://iteam.ru/landing/template/img/mp_ychet.png" width="65%" alt="Создание системы управленческого финансового учета"></a>
          <div class="caption">
            <a href="https://iteam.ru/landing/template/sozdanie-sistemy-fin-ucheta.html"><h6>МАСТЕР-ПРОЕКТ 2018 &laquo;Создание системы управленческого финансового учета&raquo;</h6></a>
            <p>Старт 16&nbsp;января 2018&nbsp;г.</p>
            <a href="https://iteam.ru/landing/template/sozdanie-sistemy-fin-ucheta.html" class="btn btn-danger btn-sm">ЗАРЕГИСТРИРОВАТЬСЯ</a>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-sm-6 col-xs-6">
        <div class="thumbnail">
          <a href="https://iteam.ru/landing/template/mp-upravlenie-nalogovymi-riskami-companii.html"><img src="https://iteam.ru/landing/template/img/mp_nalogi.png" width="65%" alt="Управление налоговыми рисками компании"></a>
          <div class="caption">
            <a href="https://iteam.ru/landing/template/mp-upravlenie-nalogovymi-riskami-companii.html"><h6>МАСТЕР-ПРОЕКТ 2018 &laquo;Управление налоговыми рисками компании&raquo;</h6></a>
            <p>Старт 1&nbsp;февраля 2018&nbsp;г.</p>
            <a href="https://iteam.ru/landing/template/mp-upravlenie-nalogovymi-riskami-companii.html" class="btn btn-danger btn-sm">ЗАРЕГИСТРИРОВАТЬСЯ</a>
          </div>
        </div>
      </div>
      <!-- <div class="col-md-3 col-sm-6 col-xs-6">
        <div class="thumbnail">
          <a href="https://iteam.ru/landing/template/fin-uchet-systema-podderzhki-resheniy.html"><img src="https://iteam.ru/landing/template/img/mk_uchet.png" width="65%" alt="Управленческий финансовый учет: система поддержки решений"></a>
          <div class="caption">
            <a href="https://iteam.ru/landing/template/fin-uchet-systema-podderzhki-resheniy.html"><h6>БЕСПЛАТНЫЙ МАСТЕР-КЛАСС &laquo;Управленческий финансовый учет: система поддержки решений&raquo;</h6></a>
            <p><a href="https://iteam.ru/landing/template/fin-uchet-systema-podderzhki-resheniy.html" class="btn btn-danger btn-sm">ПОСМОТРЕТЬ</a></p>
          </div>
        </div>
      </div> -->
      <div class="col-md-3 col-sm-6 col-xs-6">
        <div class="thumbnail">
          <a href="https://iteam.ru/landing/template/fin-uchet-vnedrenie.html"><img src="https://iteam.ru/landing/template/img/mk30.png" width="65%" alt="Внедрение управленческого финансового учета"></a>
          <div class="caption">
            <a href="https://iteam.ru/landing/template/fin-uchet-vnedrenie.html"><h6>БЕСПЛАТНЫЙ МАСТЕР-КЛАСС &laquo;Внедрение управленческого финансового учета: шаг за&nbsp;шагом&raquo;</h6></a>
            <p><a href="https://iteam.ru/landing/template/fin-uchet-vnedrenie.html" class="btn btn-danger btn-sm">ПОСМОТРЕТЬ</a></p>
          </div>
        </div>
      </div>
    </div>

    <div class="row section-title">
      <div class="col-md-12">
        <!-- <h5>Результаты тестирования</h5> -->
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
  <!-- КОПИРОВАТЬ ДО СИХ !!! -->
    <script type="text/javascript">
			$(window).load(function() {
				yaCounter30664892.reachGoal('LANDED_ON_NONWALL')
			});
    </script>
    <script>
        $(document).ready(function () {
            
            $('#grFormBtn').click(function (e) {
                e.preventDefault();
                var $this = $(this);
    			$this.button('loading');
                var data = $('#grForm').serialize();
                $.ajax({
                    url: "/grform",
                    type: "get",
                    data: data,
                    success: function (response) {
                        if (response.status === 'ok') {
                            $('#grFormHelpBlock').css("display","none");
                            window.location.href = response.url;
                        } else if (response.status === 'error') {
                            $('#grFormHelpBlock').text(response.msg)
                            $('#grFormHelpBlock').css("display","block");
                        }
                        $this.button('reset');
                    },
                    error: function (response) {
                        $this.button('reset');
                        if (response.status === 422) {
                            $('#grFormHelpBlock').text('Все поля обязательны к заполнению')
                            $('#grFormHelpBlock').css("display","block");
                        } else {
                            $('#grFormHelpBlock').text('Ошибка, пожалуйста проверьте правильность введенных данных и попробуйте еще раз')
                            $('#grFormHelpBlock').css("display","block");
                        }
                    }
                });
            });
        });
    </script>
@stop
