@extends('site.template')

@section('title')
	{{ $page->meta_title ? $page->meta_title . ' ' : ($page->title ? $page->title . ' ' : '') }}
	| 
@stop

@section('sup_header')

		@if(1)
		<div id="slider">
			<div class="css-slider">
				<ul>
					<li id="li_slide_1">
						<img src="/images/banners/franklin.jpg" alt="Инвестиции в знания всегда дают наибольшую прибыль. Бенджамин Франклин">
						<div>
							<p>Мастер-классы и мастер-проекты от iTeam:<br>обучение управлению онлайн</p>
							<a href="#" class="btn btn-danger btn-lg">Каталог мастер-классов</a>
						</div>
					</li>
					<li id="li_slide_2">
						<img src="/images/banners/darvin.jpg" alt="Выживает не самый сильный вид, и не самый умный, а тот, который лучше всех приспосабливается к изменениям. Чарльз Дарвин">
						<div>
							<a href="#" class="btn btn-danger btn-lg">Подробнее</a>
						</div>
					</li>
					<li id="li_slide_3">
						<img src="/images/banners/chanel.jpg" alt="Успеха добиваются те, кто не думают о поражении. Коко Шанель">
						<div>
							<a href="#" class="btn btn-danger btn-lg">Подробнее</a>
						</div>
					</li>
					<li id="li_slide_4">
						<img src="/images/banners/bonaparte.jpg" alt="Я бываю то лисой, то львом. Весь секрет управления в том, чтобы знать, когда следует быть тем или другим. Наполеон I Бонапарт">
						<div>
							<a href="#" class="btn btn-danger btn-lg">Подробнее</a>
						</div>
					</li>
					<li id="li_slide_5">
						<img src="/images/banners/jobs.jpg" alt="Мы находимся здесь, чтобы внести свой вклад в этот мир. А иначе зачем мы здесь? Стив Джобс">
						<div>
							<a href="#" class="btn btn-danger btn-lg">Подробнее</a>
						</div>
					</li>
				</ul>
			</div>
		</div>
		@endif
	
@stop

@section('main')
				
    <div class="row">
	
		@if(date('m')==12)
			<div class="promo row" style="background:url(/images/main/moroz.png) no-repeat 50% 0% transparent;background-size:30%;">
				<div class="col-lg-10 jumbotron" style="background-color:transparent;margin-top:160px;">
					<h6 style="color:red;border-bottom:1px solid;">Бизнес Дед Мороз <b>iTeam</b></h6>
					<h4>Скоро-скоро наступит Новый Год</h4>
					<p class="lead">Напишите, что Вы хотите, чтобы в Вашем бизнесе изменилось к лучшему, каких результатов хотите достичь в будущем году, на какие высоты взобраться, и наш <strong>БИЗНЕС-ДЕД МОРОЗ</strong> позаботится, чтобы все Ваши желания исполнились.</p>
					<p><a class="btn btn-danger btn-lg" href="{!! route('wish.index') !!}" role="button">Загадать желание</a></p>
				</div>
			</div>
			<hr>
		@else
			@if(0&&@$breakfast)
			<!--
			<div class="promo row" style="background:url(/images/content/cup.png) no-repeat 90% 90% transparent;background-size:30%;">
				<div class="col-lg-10 jumbotron" style="background-color:transparent;">
					<h6 style="color:red;border-bottom:1px solid;">Онлайн-завтрак <b>iTeam</b></h6>
					<h4>{!! $breakfast->title !!}</h4>
					<p class="lead">{!! $breakfast->intro !!}</p>
					
					<p><a class="btn btn-primary btn-lg" href="{!! url('learn' . $breakfast->path . $breakfast->wid) !!}" role="button" style="background-color:#B50921;border:none;"><span class="glyphicon glyphicon-facetime-video" aria-hidden="true"></span> &nbsp; Участвовать</a></p>
				</div>
			</div>
			<hr>
			-->
			<!-- ОРИГИНАЛЬНАЯ КНОПКА <p><a class="btn btn-primary btn-lg" href="{!! url('learn' . $breakfast->path . $breakfast->wid) !!}" role="button"><span class="glyphicon glyphicon-facetime-video" aria-hidden="true"></span> &nbsp; Смотреть бесплатно</a></p>-->
		
		
			<div class="promo row" style="background:url(/filemanager/userfiles/user0/content/webinar.png) no-repeat 92% 100% transparent;background-size:30%;">
				<div class="col-lg-10 jumbotron" style="background-color:transparent;">
					<h6 style="color:#CC0000;border-bottom:1px solid #ededed;"><b>Бесплатный мастер-класс</b></h6>
					<h4><b>Спиральная динамика – инструмент стратегии</b></h4>
					<h5><b>Закономерности развития организаций, которые необходимо знать разработчикам стратегии</b></h5>
					<h6 style="color:#CC0000;"><b>31 января 2017 г. в 16.00 Мск</b></h6>
					<a href="https://iteam.ru/free-master-class.html" onclick="window.open(this.href,'newWin','width=500, height=500, top=100, left=470'); return false;"><div class="btn btn-primary btn-lg" style="background-color:#B7343C; border:none;" role="button"><span class="glyphicon glyphicon-facetime-video" aria-hidden="true"></span> &nbsp; УЧАСТВОВАТЬ</div></a>
					<p style="font-size:16px;margin-top:20px !important; width:600px;text-align:justify;" class="lead">Спиральная динамика – это теория, объясняющая закономерности формирования человеческих ценностей. Она имеет множество практических применений, но наиболее ценная для управленцев грань этой теории – закономерности развития организаций. Разобравшись в них, можно понять, почему заканчиваются неудачами попытки организационных изменений, почему не приживаются те или иные нововведения, какие условия необходимы для безболезненного перехода на новый уровень развития компании.</p>
				</div>
			</div>
			<hr>
			
			@endif
		@endif
		
		@if($childrens)
		<div class="media_list">
			@foreach($childrens as $child)
			<div class="box list_item">

				<div class="list_item_img" style="display:none;">	
				</div>
				<div class="list_item_body">
					
					@if(@$child->author)
					<div class="list_item_preinfo">
						<div class="list_item_author"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> &nbsp; {!! $child->author !!}</div>
						@if(@$child->parent->title)
							<div class="list_item_parent"><a href="{!! $child->path !!}"><span class="glyphicon glyphicon-lamp" aria-hidden="true"></span> &nbsp; {!! $child->parent->title !!}</a></div>
						@endif
					</div>
					@endif
					
					<h4 class="list_item_title">
					{!! link_to($child->path . @$child->wid, $child->title) !!}
					</h4>
					<div class="list_item_text">
						<div class="intro">{!! @$child->intro !!}</div>
					</div>
					<div class="list_item_info">
						<div class="list_item_date"><span class="glyphicon glyphicon-time" aria-hidden="true"></span> &nbsp; <time data-nowd="{{ date("d.m.Y") }}" data-nowt="{{ date("H:i:s") }}">{{ date("d.m.Y H:i", strtotime($child->created_at)) }}</time></div>
						<div class="list_item_viewed"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> &nbsp; {!! @$child->viewed !!}</div>
					</div>
				</div>
			</div>
			@endforeach
		</div>
		
        @endif

    </div>

@stop

@section('bottom')

	@if($news)
		
	<div id="promo_news">
		<div class="row -container">
			<div class="well media_list">
				@foreach($news as $nw)
				<div class="box list_item">

					<div class="list_item_img" style="display:none;">	
					</div>
					<div class="list_item_body">
						
						<div class="list_item_preinfo">
							<div class="list_item_date"><span class="glyphicon glyphicon-time" aria-hidden="true"></span> &nbsp; <time data-nowd="{{ date("d.m.Y") }}" data-nowt="{{ date("H:i:s") }}">{{ date("d.m.Y H:i", strtotime($nw->created_at)) }}</time></div>
						</div>
						
						<h4 class="list_item_title">
						{!! link_to('news' . $nw->path . @$nw->wid, $nw->title) !!}
						</h4>
						<div class="list_item_text">
							<div class="intro">{!! @$nw->intro !!}</div>
						</div>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</div>		
       
	@endif
	
@stop