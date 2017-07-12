@extends('c.template')

@section('title')
	{{ $page->meta_title ? $page->meta_title . ' ' : ($page->title ? $page->title . ' ' : '') }}
	| 
	@
@stop

@section('header')

    <!-- Header -->
    <header id="top" class="header">
        <div class="text-vertical-center">
            <h1><span class="autoZoom">Управлять бизнесом</span></h1>
            <h3>
				<span class="autoZoom">
					<b style="color:#d0c0ff;">Это наука.</b> 
					<b style="color:#f9efa3;">Это искусство.</b> 
					<b style="">Это легко.</b>
				</span>
			</h3>
            <br>
            <a href="#about" class="btn btn-light btn-lg">Хотите уметь?</a>
        </div>
		
		<video preload="auto" autoplay="" loop="" class="fillWidth fadeIn animated" poster="https://s3-us-west-2.amazonaws.com/coverr/poster/BnW.jpg">
			<source src="https://s3-us-west-2.amazonaws.com/coverr/mp4/BnW.mp4" type="video/mp4">Ваш браузер не поддерживает тег Video
			<source src="https://s3-us-west-2.amazonaws.com/coverr/mp4/BnW.mp4" type="video/webm">Ваш браузер не поддерживает тег Video
		</video>
		
    </header>
	
@stop

@section('main')

    <!-- About -->
    <section id="about" class="section about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Cистемное решение проблем управления бизнесом</h2>
                    <p class="lead">Улучшение управляемости, повышение эффективности и результативности компаний</p>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>

    <!-- Services -->
    <!-- The circle icons use Font Awesome's stacked icon classes. For more information, visit http://fontawesome.io/examples/ -->
    <section id="services" class="section services bg-primary">
        <div class="container">
            <div class="row text-center">
                <div class="col-lg-10 col-lg-offset-1">
                    <h2>Что мы предлагаем</h2>
                    <hr class="small">
                    <div class="row">
                        <div class="col-md-3 col-sm-6">
                            <div class="service-item">
                                <span class="fa-stack fa-4x">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-cloud fa-stack-1x text-primary"></i>
                            </span>
                                <h4>
                                    <strong>Онлайн обучение</strong>
                                </h4>
                                <p>Обучая и консультируя собственников и руководителей компаний, мы помогаем им распутать клубок</p>
                                <a href="#" class="btn btn-light">Узнать больше</a>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="service-item">
                                <span class="fa-stack fa-4x">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-compass fa-stack-1x text-primary"></i>
                            </span>
                                <h4>
                                    <strong>Оффлайн обучение</strong>
                                </h4>
                                <p>Обучая и консультируя собственников и руководителей компаний, мы помогаем им распутать клубок</p>
                                <a href="#" class="btn btn-light">Узнать больше</a>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="service-item">
                                <span class="fa-stack fa-4x">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-flask fa-stack-1x text-primary"></i>
                            </span>
                                <h4>
                                    <strong>Бизнес-консалтинг</strong>
                                </h4>
                                <p>Обучаем и консультируя собственников и руководителей компаний, мы помогаем им распутать клубок</p>
                                <a href="#" class="btn btn-light">Узнать больше</a>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="service-item">
                                <span class="fa-stack fa-4x">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-shield fa-stack-1x text-primary"></i>
                            </span>
                                <h4>
                                    <strong>Аудит компаний</strong>
                                </h4>
                                <p>Обучая и консультируя собственников и руководителей компаний, мы помогаем им распутать клубок</p>
                                <a href="#" class="btn btn-light">Узнать больше</a>
                            </div>
                        </div>
                    </div>
                    <!-- /.row (nested) -->
                </div>
                <!-- /.col-lg-10 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>

    <!-- Callout -->
    <aside class="aside callout">
        <div class="text-vertical-center">
            <h1>Сотни проектов, тысячи людей</h1>
        </div>
    </aside>

    <!-- Portfolio -->
    <section id="portfolio" class="section portfolio">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-lg-offset-1 text-center">
                    <h2>Мастер-проекты и мастер-классы онлайн</h2>
                    <hr class="small">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="portfolio-item">
                                <a href="#">
                                    <img class="img-portfolio img-responsive" src="img/portfolio-1.jpg">
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="portfolio-item">
                                <a href="#">
                                    <img class="img-portfolio img-responsive" src="img/portfolio-2.jpg">
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="portfolio-item">
                                <a href="#">
                                    <img class="img-portfolio img-responsive" src="img/portfolio-3.jpg">
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="portfolio-item">
                                <a href="#">
                                    <img class="img-portfolio img-responsive" src="img/portfolio-4.jpg">
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- /.row (nested) -->
                    <a href="#" class="btn btn-dark">Смотреть все</a>
                </div>
                <!-- /.col-lg-10 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>

    <!-- Call to Action -->
    <aside class="aside call-to-action bg-primary">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h3>Вы знаете о проблемах менеджмента в Вашей компании?</h3>
                    <a href="#" class="btn btn-lg btn-light">Да, и хочу их решить</a>
                    <a href="#" class="btn btn-lg btn-dark">Нет никаких проблем</a>
                </div>
            </div>
        </div>
    </aside>

    <!-- Map  scrollwheel: false, -->
    <section id="contact" class="section map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d2245.501159271301!2d37.5352252!3d55.7497959!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46b54a6c5f9dc357%3A0x3bd88e739a88eb70!2zSVRlYW0sINCf0YDQtdGB0L3QtdC90YHQutCw0Y8g0L3QsNCxLiwgMTIsINCc0L7RgdC60LLQsCwg0KDQvtGB0YHQuNGPLCAxMjMxMDA!5e0!3m2!1sru!2s!4v1462183182224" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe>
    </section>

@stop