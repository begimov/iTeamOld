@extends('iteam.template_no_fb')

@section('title')
	{{ $page->meta_title ? $page->meta_title . ' ' : ($page->title ? $page->title . ' ' : '') }}
	| 
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
			@if(@$breakfast)
			
			
	{{--Счетчики: количество статей, к-во мастер-классов, к-во посетителей (за неделю), к-во скачиваний (за все время)--}}
	{{--<div class="container">--}}
	    {{--<table  style="width:100%;">--}}
	        {{--<tr>--}}
	            {{--<td style="width:23%;"><div style="border:1px solid #6A0101;text-align:center;padding:0.5em;margin-right:2%;margin-left:2%;border-radius:4px;">--}}
				{{--<span style="color:#AD0011; font-size:2em;">{{ isset($countArticles ) ? $countArticles : '' }}</span><br/>статей в базе--}}
			{{--</div></td>--}}
	            {{--<td style="width:23%;"><div style="border:1px solid #6A0101; text-align:center; padding:0.5em;margin-right:2%;border-radius:4px;">--}}
				{{--<span style="color:#AD0011; font-size:2em;">{{ isset($countLearns) ? $countLearns : '' }}</span><br/>мастер-классов--}}
			{{--</div></td>--}}
	             {{--<td style="width:23%;"><div style="border:1px solid #6A0101; text-align:center; padding:0.5em;margin-right:2%;border-radius:4px;">--}}
				{{--<span style="color:#AD0011; font-size:2em;">{{ isset($countUsers[0]) ? $countUsers[0] : '' }}</span><br/>посещений в неделю--}}
			{{--</div></td>--}}
	              {{--<td style="width:23%;"><div style="border:1px solid #6A0101; text-align:center; padding:0.5em;margin-right:0;border-radius:4px;">--}}
				{{--<span style="color:#AD0011; font-size:2em;">{{ isset($countDownloads[0]) ? $countDownloads[0] : '' }}</span><br/>выдано подарков--}}
			{{--</div></td>--}}
	        {{--</tr>--}}
	        {{--</table>--}}
	        {{----}}
	        {{--<!----}}
	        {{----}}
		{{--<div class="row" style="width:100%;">--}}
			{{--<div class="col-md-3" style="width:23%; border:1px solid #6A0101; text-align:center;padding:0.5em;margin-right:2%;margin-left:2%;">--}}
				{{--<span style="color:#AD0011; font-size:2em;">{{ isset($countArticles ) ? $countArticles : '' }}</span><br/>статей в базе--}}
			{{--</div>--}}
			{{--<div class="col-md-3"  style="width:23%; border:1px solid #6A0101; text-align:center; padding:10px;margin-right:2%;">--}}
				{{--<span style="color:#AD0011; font-size:2em;">{{ isset($countLearns) ? $countLearns : '' }}</span><br/>мастер-классов--}}
			{{--</div>--}}
			{{--<div class="col-md-3"  style="width:23%; border:1px solid #6A0101; text-align:center; padding:10px;margin-right:2%;">--}}
				{{--<span style="color:#AD0011; font-size:2em;">{{ isset($countUsers[0]) ? $countUsers[0] : '' }}</span><br/>посещений в неделю--}}
			{{--</div>--}}
			{{--<div class="col-md-3"  style="width:23%; border:1px solid #6A0101; text-align:center; padding:10px;margin-right:0;">--}}
				{{--<span style="color:#AD0011; font-size:2em;">{{ isset($countDownloads[0]) ? $countDownloads[0] : '' }}</span><br/>выдано подарков--}}
			{{--</div>--}}
		{{--</div>--}}
		{{---->--}}
	{{--</div>--}}
			
			
<!--			
			
			<div class="promo row" style="background:url(/images/content/cup.png) no-repeat 90% 90% transparent;background-size:30%;">
				<div class="col-lg-10 jumbotron" style="background-color:transparent;">
					<h6 style="color:red;border-bottom:1px solid;">Онлайн-завтрак <b>iTeam</b></h6>
					<h4>{!! $breakfast->title !!}</h4>
					<p class="lead">{!! $breakfast->intro !!}</p>
					
					-->
					
					
					<!-- <h6 style="color:#CC0000;"><b>14 февраля 2017 г. в 11.00 Мск</b></h6> -->
					<!--<p><a class="btn btn-primary btn-lg" href="{!! url('learn' . $breakfast->path . $breakfast->wid) !!}" role="button" style="background-color:#B50921;border:none;"><span class="glyphicon glyphicon-facetime-video" aria-hidden="true"></span> &nbsp; Получить доступ к материалам</a></p>-->

<!--					
					
					<a href="https://iteam.ru/free-master-class.html" onclick="window.open(this.href,'newWin','width=500, height=500, top=100, left=470'); return false;"><div class="btn btn-primary btn-lg" style="background-color:#B50921;border:none;" role="button"><span class="glyphicon glyphicon-facetime-video" aria-hidden="true"></span> &nbsp;Получить доступ к
материалам</div></a>
				</div>
			</div>
			
			-->
			
			
			
			
			
			
			
<div class="promo row">
				<div class="col-lg-10 jumbotron" style="background-color:transparent; margin-left: 0px; padding-left: 0px; padding-right: 0px;">
					
          
             
             <!-- <img alt="" src="https://iteam.ru/images/icons/book/11_1.png" style="width: 300px; float:left;display:inline-block !important;"> -->
             
             <img style="width: 320px; float:left;display:inline-block !important;margin-top:30px;" src="https://iteam.ru/images/icons/book/11_4.png" alt="Как внедрить бизнес-процессы">
             
             
          
							    <div style="display: inline-block ! important; float: left; margin-left: 30px; margin-top: 20px;">
<div style="margin-bottom:10px; text-align: center; border: 0px solid grey; border-radius: 4px; color: #AD0011; font-size:28px; font-weight: bold; line-height: 40px; padding-left:5px; padding-right:5px; padding-bottom: 30px; padding-top: 30px;">
			    Получить в подарок<br>КНИГУ<br>"Как внедрить бизнес-процессы"!</div>

<div style="text-align:center !important;z-index:1;">
    <!--
<form accept-charset="utf-8" action="http://app.getresponse.com/add_contact_webform.html?u=Bh5z" method="post" target="_blank">
								<input type="hidden" name="webform_id" value="9340301">
								<input type="text" style="border-radius:4px;border:1px solid grey;margin-bottom:5px;text-align:center;font-size:20px;color:#000; padding:7px;" value="" placeholder="Имя" name="name"><br>
								<input type="email" style="border-radius:4px;border:1px solid grey;margin-bottom:5px;text-align:center;font-size:20px;color:#000; padding:7px;" value="" placeholder="E-mail" name="email"><br>
								<input type="submit" style="color:#fff; background-color: #AD0011;padding:7px 63px;font-size:20px;font-weight:bold;margin-top:7px;" name="submit" class="btn" value="ПОЛУЧИТЬ">
							</form>			-->
							
						
							
							
<!-- <script type="text/javascript" src="https://app.getresponse.com/view_webform_v2.js?u=Bh5z&webforms_id=5388406"></script>	-->



<div style="margin:0 auto;width:280px;">		
	<form action="https://app.getresponse.com/add_subscriber.html" accept-charset="utf-8" method="post">
		<input class="form-control" style="width:280px; height:40px; border:1px solid grey;margin-bottom:10px; text-align:center; font-size:18px;" type="text" name="first_name" placeholder="Имя" required/>
		<input class="form-control" style="width:280px; height:40px; border:1px solid grey;margin-bottom:10px; text-align:center; font-size:18px;" type="text" name="email" placeholder="Email" required/>
		<input type="hidden" name="campaign_token" value="VjVkP" />
		<input type="hidden" name="thankyou_url" value="http://iteam.ru/promo/subscribe/book_offer/"/>
		<input type="hidden" name="start_day" value="0" />
		<input type="hidden" name="forward_data" value="" />
		<input style="width:280px; height:44px; border:none; border-radius:4px; margin-bottom:10px;background-color:#AD0011 !important;color:#fff;font-weight:bold;font-size:18px;" type="submit" value="ПОЛУЧИТЬ"/>
	</form>
</div>



  </div>			        
							    </div>
							    <br style="clear:both;">
							</div>
          
				</div>
		
			
			
			
			
			<hr style="margin-top:-20px;">
			
			<!-- ОРИГИНАЛЬНАЯ КНОПКА <p><a class="btn btn-primary btn-lg" href="{!! url('learn' . $breakfast->path . $breakfast->wid) !!}" role="button"><span class="glyphicon glyphicon-facetime-video" aria-hidden="true"></span> &nbsp; Смотреть бесплатно</a></p>-->
		
		<!--
			<div class="promo row" style="background:url(/filemanager/userfiles/user0/content/webinar.png) no-repeat 92% 100% transparent;background-size:30%;">
				<div class="col-lg-10 jumbotron" style="background-color:transparent;">
					<h6 style="color:#CC0000;border-bottom:1px solid #ededed;"><b>Бесплатный мастер-класс</b></h6>
					<h4><b>Спиральная динамика – инструмент стратегии</b></h4>
					<h5><b>Закономерности развития организаций, которые необходимо знать разработчикам стратегии</b></h5>
					<a href="https://iteam.ru/free-master-class.html" onclick="window.open(this.href,'newWin','width=500, height=500, top=100, left=470'); return false;"><div class="btn btn-primary btn-lg" style="background-color:#B7343C; border:none;" role="button"><span class="glyphicon glyphicon-facetime-video" aria-hidden="true"></span> &nbsp;Получить доступ к
материалам мастер-класса</div></a>
					<p style="font-size:16px;margin-top:20px !important; width:600px;text-align:justify;" class="lead">Спиральная динамика – это теория, объясняющая закономерности формирования человеческих ценностей. Она имеет множество практических применений, но наиболее ценная для управленцев грань этой теории – закономерности развития организаций. Разобравшись в них, можно понять, почему заканчиваются неудачами попытки организационных изменений, почему не приживаются те или иные нововведения, какие условия необходимы для безболезненного перехода на новый уровень развития компании.</p>
				</div>
			</div>
			<hr>
			-->
			<!-- <h6 style="color:#CC0000;"><b>7 февраля 2017 г. в 11.00 Мск</b></h6> -->
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
					
					
					@else
                    <div class="list_item_preinfo">
                                                <div class="list_item_author">&nbsp;</div>
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
		<div class="container">
			<div class="media_list">
				@foreach($news as $nw)
				<div class="box list_item">

					<div class="list_item_img" style="display:none;">
					</div>
					<div class="list_item_body">
						
						<div class="list_item_preinfo">
							<div class="list_item_date"><!-- <span class="glyphicon glyphicon-time" aria-hidden="true"></span> --><span aria-hidden="true"><img style="width:25px;" src="/filemanager/userfiles/user0/icons/news.png" /></span> &nbsp; <time data-nowd="{{ date("d.m.Y") }}" data-nowt="{{ date("H:i:s") }}">{{ date("d.m.Y H:i", strtotime($nw->created_at)) }}</time></div>
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

	<div class="container">
		<div class="row" style="background: #eee; padding: 30px">
			<h6 style="text-align: center"><b>#Метки</b></h6>
			<ul style="list-style-type: none; text-align: justify">
				@foreach($marks as $mark)
					<li style="float: left; margin-right: 20px; margin-left: 20px; font-size: 21px"><a href="{{ route('site.mark.get-list', ['id' => $mark->id]) }}">{{ $mark->name }}</a></li>
				@endforeach
			</ul>
		</div>
	</div>
	
@stop