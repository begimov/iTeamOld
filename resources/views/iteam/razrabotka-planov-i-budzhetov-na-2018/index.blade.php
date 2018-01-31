<?php
#header("Location: /?404");
header("Content-Type:text/html; charset=utf-8");
?>
        <!DOCTYPE html>
<html>
<head>
    <title>Управленческий финансовый учет: система поддержки решений</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="ITeam"/>
    <meta name="keywords" content="ITeam"/>

    <meta property="og:image" content="/images/logo.gif"/>
    <meta property="og:title" content="Разработка стратегии шаг за шагом"/>
    <meta property="og:description"
          content='Рекомендую бесплатный мастер-класс "Разработка стратегии шаг за шагом" консалтинговой компании iTeam'/>

    <link rel="shortcut icon" href="/favicon.ico"/>
    <style type="text/css">
        #logo {
            height: 70px;
            margin: 0 auto;
            width: 140px;
        }

        .logo {
            width: 200px;
            height: 70px;
            background: url('data:image/png;base64,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') no-repeat scroll 0 -70px transparent;
            font: 70px/70px Arial, Verdana sans-serif;
            text-indent: 201px;
            display: block;
            overflow: hidden;
            border: 0 none;
            text-decoration: none;
            color: #202;
            letter-spacing: 35px;
        }

        .logo:hover {
            background: url('data:image/png;base64,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') no-repeat scroll 0 0 transparent;
        }

        #logo:hover {
            cursor: default;
        }

        a.logo:hover {
            cursor: pointer;
        }

        #modal_form {
            width: 900px;
            height: 500px;
            border-radius: 5px;
            border: 3px #000 solid;
            background: #fff;
            position: fixed;
            top: 45%;
            left: 50%;
            margin-top: -300px;
            margin-left: -460px;
            display: none;
            opacity: 0;
            z-index: 5;
            padding: 20px 10px;
        }

        #modal_form #modal_close {
            width: 21px;
            height: 21px;
            position: absolute;
            top: 10px;
            right: 10px;
            cursor: pointer;
            display: block;
        }

        #overlay {
            z-index: 3;
            position: fixed;
            background-color: #000;
            opacity: 0.8;
            -moz-opacity: 0.8;
            filter: alpha(opacity=80);
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            cursor: pointer;
            display: none;
        }

        #modal_promotion {
            width: 700px;
            height: 500px;
            border-radius: 5px;
            border: 3px #000 solid;
            background: #fff;
            position: fixed;
            top: 45%;
            left: 50%;
            margin-top: -300px;
            margin-left: -360px;
            display: none;
            opacity: 0;
            z-index: 5;
            padding: 20px 10px;
        }

        .alert-danger {
            font-size: 20px;
            font-weight: bold;
        }
        
        .vertical-align {
          display: flex;
          align-items: center;
        }
        
        h2 {
            color: #870100 !important;
        }

    </style>
    <script src="https://code.jquery.com/jquery-3.2.1.js"
            integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css"
          integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
</head>
<body>

<div class="container">

    <div class="row" style="padding-top: 10px;">
        <div class="col-md-2">
            <div id="logo">
                <a class="logo" href="/">ITeam</a>
            </div>
        </div>
        <div class="col-md-10" style="padding-top: 10px;">
            <p><strong>МАСТЕРСКАЯ&nbsp;УПРАВЛЕНИЯ</strong><br>
                Консультируем и&nbsp;обучаем собственников и&nbsp;топ-менеджеров управлять компанией. С&nbsp;2002&nbsp;года
            </p>
        </div>
    </div>
    <hr>
    <div style="text-align: right">
        <h2>
            <strong>Управленческий финансовый учет: система поддержки решений</strong>
        </h2>
        <h3>Бесплатный мастер-класс</h3>
        <!-- <p class="lead">
            <b>19&nbsp;сентября в&nbsp;11.00 Мск</b>
        </p> -->
    </div>
    <hr>
    <div class="row">
        <div class="col-md-5">
            <img class="img-responsive" src="https://iteam.ru/landing/template/img/mk_uchet.png"
                 style="max-width: 95%">
        </div>
        <div class="col-md-7">
            <div class="row"><div class="col-md-12" style="margin-bottom: 30px;">
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/xApE-Q-rF8c" allowfullscreen></iframe>
                </div>
            </div></div>
            
            <div class="row"><div class="col-md-12" style="margin-bottom: 20px;"><h2><strong>Вы получите:</strong></h2></div></div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-1" style="margin-bottom:-10px;">
                                    <span class="header-logo-svg">
                                        <svg id="svg1" width="48" height="48" fill="#c00" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 140 140" xmlns="http://www.w3.org/2000/svg">
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
				                </div>
				                <div class="col-md-11" style="padding:7px 0 0 20px;">
			                        <h3>Практическое руководство</h3>
			                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-1" style="margin-bottom:-10px;">
                                    <span class="header-logo-svg">
                                        <svg id="svg1" width="48" height="48" fill="#c00" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 140 140" xmlns="http://www.w3.org/2000/svg">
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
				                </div>
				                <div class="col-md-11" style="padding:7px 0 0 20px;">
			                        <h3>Шаблоны бюджетов</h3>
			                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-1" style="margin-bottom:-10px;">
                                    <span class="header-logo-svg">
                                        <svg id="svg1" width="48" height="48" fill="#c00" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 140 140" xmlns="http://www.w3.org/2000/svg">
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
				                </div>
				                <div class="col-md-11" style="padding:7px 0 0 20px;">
			                        <h3>Презентация мастер-класса</h3>
			                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-1" style="margin-bottom:-10px;">
                                    <span class="header-logo-svg">
                                        <svg id="svg1" width="48" height="48" fill="#c00" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 140 140" xmlns="http://www.w3.org/2000/svg">
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
                                            </div>
                                            <div class="col-md-11" style="padding:7px 0 0 20px;">
                                                <h3>Запись мастер-класса</h3>
                                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
            
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-1" style="margin-bottom:-10px;">
                                    <span class="header-logo-svg">
                                        <svg id="svg1" width="48" height="48" fill="#c00" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 140 140" xmlns="http://www.w3.org/2000/svg">
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
				                </div>
				                <div class="col-md-11" style="padding:7px 0 0 20px;">
			                        <h3>Тестирование и сертификат</h3>
			                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <p><a href="#" class="modal2 btn btn-danger btn-lg" style="margin-top:20px;">СКАЧАТЬ МАТЕРИАЛЫ</a></p>
        </div>
    </div>
    <hr>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="row text-center">
        <div class="col-md-12">
            
        </div>
    </div>
    <div class="row">
        <div id="modal_form">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-left">
                        <h4>Спасибо за интерес к нашим материалам!</h4>
                        <p class="lead">Чтобы скачать материалы мастер-класса, пожалуйста, оставьте отзыв</p>
                    </div>
                </div>
                <form id="forma" method="post" action="{{ route('emailTest.EmailSend.sendComm') }}"
                      enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label>Ваш отзыв*</label>
                                <textarea class="form-control" rows="5" name="commend" placeholder="Не знаете, что написать? Расскажите нам:
	•	что показалось самым интересным на портале?
	•	что применяли на практике?
	•	какой мастер-класс был самым полезным?" required></textarea>
                            </div>
                            <div class="form-group">
                                <label>ФИО*</label>
                                <input class="form-control" type="text" name="userName" value="" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="label">Без загруженного фото, комментарий отправлен не будет<br>Загруженный
                                    файл должен быть в формате jpeg, png, bmp, gif или svg.</label>
                                <input class="form-control-file" type="file" name="image">
                            </div>
                        </div>
                    </div>
                    <div class="row text-left">
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                                <label>Компания*</label>
                                <input class="form-control" type="text" name="organization" value="" required>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                                <label>Должность*</label>
                                <input class="form-control" type="text" name="position" value="" required>
                            </div>
                        </div>
                    </div>
                    <div class="row text-center">
                        <div class="col-md-12">
                            <input class="btn btn-dark btn-lg" type="submit" name="sbmt">
                        </div>
                    </div>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                </form>
            </div>
        </div>

        <div id="overlay"></div>
        <div id="modal_promotion">
            <span id="modal_close">x</span>
        </div>


    </div>
</div>

</body>
</html>
<script>
    $(document).ready(function () {

        $('.modal2').click(function (event) {
            event.preventDefault();
            $('#overlay').fadeIn(400, // анимируем показ обложки
                function () { // далее показываем мод. окно
                    $('#modal_form')
                        .css('display', 'block')
                        .animate({opacity: 1, top: '50%'}, 200);
                });
        });

        // закрытие модального окна
        $('#modal_close, #overlay').click(function () {
            $('#modal_form')
                .animate({opacity: 0, top: '45%'}, 200,  // уменьшаем прозрачность
                    function () { // пoсле aнимaции
                        $(this).css('display', 'none'); // скрываем окно
                        $('#overlay').fadeOut(400); // скрывaем пoдлoжку
                    }
                );
        });

    });
</script>
