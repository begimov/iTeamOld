@extends('iteam.newindex_template')

@section('title')
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
    .modal {
		display: none; /* Hidden by default */
		position: fixed; /* Stay in place */
		z-index: 600; /* Sit on top */
		left: 0;
		top: 0;
		width: 100%; /* Full width */
		height: 100%; /* Full height */
		overflow: auto; /* Enable scroll if needed */
		background-color: rgb(0,0,0); /* Fallback color */
		background-color: rgba(0,0,0,0.8); /* Black w/ opacity */
	}
	/* Modal Content/Box */
	.modal-content {
		background-color: #fefefe;
		margin: 5% auto; /* 15% from the top and centered */
		padding: 10px;
		width: 90%;
	}
	/* The Close Button */
	.close-x {
		margin: -5px;
		color: #aaa;
		float: right;
		font-size: 40px;
		font-weight: bold;
	}
	.close-x:hover,
	.close-x:focus {
		color: black;
		text-decoration: none;
		cursor: pointer;
	}
  .nounderline {
    text-decoration: none !important;
  }
  .jumbotron {
    margin-top: -60px;
    padding: 10px 1px 1px 1px;
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
    width: 100%;
    background-color: #eee;
    color: #333 !important;
    padding: 20px 20px 0 20px;
  }
  .top-right-block a:link, .top-right-block a:hover {
    color: #870100 !important;
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
  .vertical-align {
    display: flex;
    align-items: center;
  }
  .magnet-block {
      padding: 10px;
      margin-bottom: 10px;
  }
  .img-responsive {
    margin: 0 auto;
  }
  </style>
@stop

@section('main')

<!-- КОПИРОВАТЬ ОТ СИХ !!!-->
  <a href="https://iteam.ru/15/happy_birthday.html" class="nounderline">
    <div class="jumbotron text-center">
      <div class="container">
        <p style="margin: -19px;" class="lead"><strong>День рождения iTeam. Нам 15 лет.</strong> <button class="btn btn-danger">Поздравить!</button></p>
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
    
    <div class="row">
        <div class="col-md-12 top-right-block">
            <h1 style="font-size: 3.5em;line-height:1.1;">РУССКИЙ МЕНЕДЖМЕНТ</h1>
            <h3><a href="https://iteam.ru/learn/webinar/manage_rightly" style="color:#870100;">Сделайте вашу компанию управляемой и&nbsp;эффективной!</a></h3>
        </div>
    </div>

    <div class="row" style="margin-bottom:0;">
      <div class="col-md-12 top-right-block" style="padding-bottom:30px;">
        <div class="row">
          <div class="col-md-4 col-sm-4">
            <p>
              <ul class="lead">
                <p><a href="https://iteam.ru/learn/strategicheskoe-upravlenie" style="color:#870100;">СТРАТЕГИЯ&nbsp;<span class="glyphicon glyphicon-circle-arrow-right" aria-hidden="true"></span></a></p>
                <p><a href="https://iteam.ru/learn/upravlenie-protsessami" style="color:#870100;">БИЗНЕС-ПРОЦЕССЫ&nbsp;<span class="glyphicon glyphicon-circle-arrow-right" aria-hidden="true"></span></a></p>
                <p><a href="https://iteam.ru/learn/tselevoe-upravlenie" style="color:#870100;">ПЛАНИРОВАНИЕ&nbsp;<span class="glyphicon glyphicon-circle-arrow-right" aria-hidden="true"></span></a></p>
                <p><a href="https://iteam.ru/learn/motivatsija-sotrudnikov" style="color:#870100;">МОТИВАЦИЯ&nbsp;<span class="glyphicon glyphicon-circle-arrow-right" aria-hidden="true"></span></a></p>
                <p><a href="https://iteam.ru/learn/korporativnaja-kultura" style="color:#870100;">КОРПОРАТИВНАЯ КУЛЬТУРА&nbsp;<span class="glyphicon glyphicon-circle-arrow-right" aria-hidden="true"></span></a></p>
                <p><a href="https://iteam.ru/learn/tselevoe-upravlenie" style="color:#870100;">КОНТРОЛЛИНГ&nbsp;<span class="glyphicon glyphicon-circle-arrow-right" aria-hidden="true"></span></a></p>
              </ul>
            </p>
          </div>
          <div class="col-md-8 col-sm-8">
            <p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam bibendum commodo molestie. Integer bibendum ut urna vitae vulputate. Vivamus tincidunt egestas erat. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam gravida dui posuere maximus vestibulum. Nulla nec metus quam. Vivamus feugiat lacus sed iaculis fringilla. Pellentesque vitae tellus sit amet nisi aliquet semper. Sed eget ex ornare odio scelerisque ultricies in in dui. Aliquam sit amet semper nibh. Aenean et viverra diam, eu fringilla nulla.</p>
            <a href="#" class="btn btn-default btn-lg" style="color:#870100;">О ПРОЕКТЕ</a> <a href="#" class="btn btn-default btn-lg" style="color:#870100;">ЧТО ТАКОЕ РМ</a>
          </div>
        </div>
      </div>
    </div>

    <div class="row section-title">
      <div class="col-md-12">
        <h6>МАСТЕР-КЛАССЫ</h6>
      </div>
    </div>
    <div class="row master-klass-section">
      <div class="col-md-6 col-sm-6 col-xs-6">
        <div class="row vertical-align">
            <div class="col-md-4 col-sm-4">
              <a href="https://iteam.ru/landing/template/razrabotka-planov-i-budzhetov-MP.html"><img src="img/mp4.jpg" class="img-responsive" alt="Разработка планов и бюджетов компании на 2018 год"></a>
            </div>
            <div class="col-md-8 col-sm-8">
                <a href="https://iteam.ru/landing/template/razrabotka-planov-i-budzhetov-MP.html"><h5>Разработка планов и&nbsp;бюджетов компании на&nbsp;2018&nbsp;год</h5></a>
                <p>10 этапов, 10 мастер-классов, 10 коуч-сессий</p>
            </div>
        </div>
      </div>
      <div class="col-md-6 col-sm-6 col-xs-6">
        <div class="row vertical-align">
            <div class="col-md-4 col-sm-4">
              <a href="https://iteam.ru/learn/course/razrabotka-strategii-kompanii"><img src="img/mk2.jpg" class="img-responsive" alt="Разработка стратегии компании"></a>
            </div>
            <div class="col-md-8 col-sm-8">
                <a href="https://iteam.ru/learn/course/razrabotka-strategii-kompanii"><h5>Разработка стратегии компании</h5></a>
                <p>16&nbsp;мастер-классов + 7&nbsp;сессий с&nbsp;наставником + 30&nbsp;шаблонов</p>
            </div>
        </div>
      </div>
    </div>
    <div class="row master-klass-section">
      <div class="col-md-6 col-sm-6 col-xs-6">
        <div class="row vertical-align">
            <div class="col-md-4 col-sm-4">
              <a href="https://iteam.ru/landing/template/stavim-celi-kompanii-na-2018-god.html"><img src="img/mk_celi.jpg" class="img-responsive" alt="Создание системы управления процессами"></a>
            </div>
            <div class="col-md-8 col-sm-8">
                <a href="https://iteam.ru/landing/template/stavim-celi-kompanii-na-2018-god.html"><h5>Ставим цели компании на 2018 год</h5></a>
                <p>Эффективное планирование начинается с правильной постановки целей</p>
                <a href="https://iteam.ru/landing/template/stavim-celi-kompanii-na-2018-god.html" class="btn btn-danger btn-lg">4&nbsp;000&nbsp;&#8381</a>
            </div>
        </div>
      </div>
      <div class="col-md-6 col-sm-6 col-xs-6">
        <div class="row vertical-align">
            <div class="col-md-4 col-sm-4">
              <a href="https://iteam.ru/learn/webinar/effective_planning"><img src="img/mk4.jpg" class="img-responsive" alt="Планирование как система"></a>
            </div>
            <div class="col-md-8 col-sm-8">
                <a href="https://iteam.ru/learn/webinar/effective_planning"><h5>Планирование как&nbsp;система</h5></a>
                <p>Как организовать планирование в&nbsp;компании от&nbsp;стратегического до&nbsp;оперативного уровня</p>
                <a href="https://iteam.ru/learn/webinar/effective_planning" class="btn btn-danger btn-lg">2&nbsp;400&nbsp;&#8381</a>
            </div>
        </div>
      </div>
    </div>

    <div class="row section-title">
      <div class="col-md-12">
        <h5>МАСТЕР-ПРОЕКТЫ</h5>
      </div>
    </div>
    <div class="row test-results vertical-align">
      <div class="col-md-4">
            <p>
              <ul class="lead">
                <li><a href="#">Создание стратегии</a></li>
                <li><a href="#">Разработка планов и бюджетов</a></li>
                <li><a href="#">Создание системы управления процессами</a></li>
                <li><a href="#">Управление с помощью BSC</a></li>
                <li><a href="#">Целевое управление</a></li>
              </ul>
            </p>
      </div>
      <div class="col-md-8">
        <div class="row vertical-align">
            <div class="col-md-4 col-sm-4">
              <img src="img/mp4.jpg" class="img-responsive" alt="Разработка планов и бюджетов компании на 2018 год">
            </div>
            <div class="col-md-8 col-sm-8">
                <a href="#"><h3>Что такое мастер-проект?</h3></a>
                <p class="lead">Описание</p>
                <p class="lead">Сколько он длится?</p>
                <p class="lead">Какие результаты?</p>
                <a href="#" class="btn btn-danger btn-lg">ОТЗЫВЫ</a>
            </div>
        </div>
      </div>
    </div>
    
    <div class="row section-title">
      <div class="col-md-12">
        <h5>СТАТЬИ</h5>
      </div>
    </div>
    <div class="row test-results">
              <div class="col-md-6">
                <h5><a href="#">Эффект ореола… и другие восемь иллюзий, вводящие менеджеров в заблуждение. Книга за 5 минут</a></h5>
                <p>Розенцвейг утверждает, что наиболее популярные идеи в бизнесе не что иное, как успокоительные банальности, обещающие обеспокоенным менеджерам быстрый успех. Эти "бизнес иллюзии": общепринятые и глубоко укоренившиеся убеждения являются результатом "эффекта ореола", или, говоря иначе, нашей потребности приписывать исключительно положительные качества любой компании, достигшей успеха. Вера в эти иллюзии служит менеджерам успокоением, помогающим обосновать решения, а также позволяет значительно упрощать реальность и игнорировать постоянные требования меняющихся технологий, рынков, и потребителей. Краткое содержание книги Фила Розенцвейга.</p>
              </div>
              <div class="col-md-6">
                <h5><a href="#">Как стать лидером изменений</a></h5>
                <p>Мэтт Крэбтри (Matt Crabtree) — основатель и собственник мультимиллионной консалтинговой компании Positive Momentum, британский профессиональный спикер на темы лидерства и изменений и настоящий человек Self-made. Уже в 28 лет он стал директором $500-миллионной телекоммуникационной компании. А в 32 — он вошел в топ-состав руководителей банка Barcalays. Родители Мэтта не были богаты, он вырос и провел первые 20 лет жизни на ферме. Материал подготовлен Мариной Куленко по итогам выступления Мэтта Крэбтри.</p>
              </div>
    </div>
    <div class="row test-results">
              <div class="col-md-6">
                <h5><a href="#">Выкорчевываем корни сопротивления изменениям</a></h5>
                <p>Кто из руководителей не сталкивался с ситуацией, когда множество хороших бизнес-процессов и современных мировых технологий откладывались в долгий ящик, не успев дать никаких результатов именно в вашей компании? Огромный труд экспертов, требующий знаний, опыта, а главное — времени, затрачивается буквально впустую. Причина тому простая и, кажется, очевидная: люди сопротивляются нововведениям или же попросту саботируют поставленные задачи. заглянем внутрь процесса взаимодействия менеджера и сотрудников и разберемся, чем же управляет руководитель. И обязательно найдем способ преодолеть сопротивление без лишнего напряжения и даже с удовольствием.</p>
              </div>
              <div class="col-md-6">
                <h5><a href="#">Просто о сложном: консолидация. Часть№1 общий подход</a></h5>
                <p>Консолидация - это создание cводного отчета по группе компаний, либо аффилированных, либо по филиалам. Основное в консолидации -  это убрать продажи друг другу, учитывая только отношения с "внешним миром". По законодательству  нужно формировать отчетность не только по каждой компании, но и сводную отчетность.</p>
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
    <!-- <script type="text/javascript">
                $(window).load(function() {
                    yaCounter30664892.reachGoal('LANDED_ON_NONWALL')
                });
    </script> -->
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
