@extends('c.spec.wish.template')

@section('main')
	
	<div id="nyear" class="">
		<img width="" height="" border="0" src="/images/main/moroz.png" name="Merry Christmas {{ $year }}" />
			
		<h1 align="center">Спасибо!</h1>
		<h3 align="center">Ваше письмо отправлено. Мы проверим его и обязательно перешлём Бизнес-Деду Морозу</h3>
		<br>
		<br>
		<p align="center"><a class="btn-link" href="/">На главную</a></p>
		<br>
		<br>
		<div style="text-align:center;padding:20px;background-color:rgba(255,255,255,.7)">
			<p>Сообщите о чудесном Бизнес-Деде Морозе всем Вашим партнерам и коллегам, ведь если мы пожелаем что-то хорошее все вместе, оно обязательно произойдет!</p>
			<script type="text/javascript" src="//yastatic.net/share/share.js" charset="utf-8"></script><div class="yashare-auto-init" data-yashareL10n="ru" data-yashareType="medium" data-yashareQuickServices="vkontakte,facebook,twitter,odnoklassniki,moimir,gplus" data-yashareTheme="counter"></div>
		</div>

	</div>

@stop