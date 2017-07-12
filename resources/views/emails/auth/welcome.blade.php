@extends('emails.auth.template')

@section('content')
		
		@if(!@$title)
		<h3>Добро пожаловать</h3>
		@endif
		
		<p>
			Ваши данные:
		</p>
		
		<p>
			Email: <span>{!! $email !!}</span><br>
			Логин: <strong>{!! $log !!}</strong><br>
			Пароль: <strong>{!! $password !!}</strong>
		</p>
		
		<p>
			Ссылка для входа в Профиль*: {!! link_to('i', 'iteam.ru/i') !!}
			<br>
			<small>*В Профиле Вы можете изменить пароль/логин или другую информацию</small>
		</p>
@stop