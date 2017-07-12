@extends('auth.t')

@section('form')	

						
				@if(session()->has('olduser_email'))
				<div class="alert alert-danger">
					<b><span class="glyphicon glyphicon-warning-sign" aria-hidden="true"></span> Важно!<b><br>
					Мы изменили систему безопасности. Попробуйте залогиниться, используя свой Email (не Логин!) и Пароль.
					<br>
					В случае ошибки: воспользуйтесь <a href="http://co.iteam.ru/password/email" class="link">Восстановлением пароля</a>
				</div>
				@endif
				

				<h2 class="intro-text">{{ trans('front/login.connection') }}</h2>
				
				<div class="row">
				
					<div class="col-lg-6 col-md-6">
					
						<p>{{ trans('front/login.text') }}</p>
					
						{!! Form::open(['url' => 'auth/login', 'method' => 'post', 'role' => 'form', 'class' => 'validate']) !!}
						
							{!! Form::group('text', 'log', $errors, trans('front/login.log'), null, 'envelope', null, ['required'=>true, 'minlength'=>2, 'maxlength'=>32, 'data-toggle'=>'tooltip', 'data-placement'=>'top', 'title'=>'Email, указанный при регистрации или Логин']) !!}
							{!! Form::group('password', 'password', $errors, trans('front/login.password'), null, 'lock', 'eye-open show-password', ['required'=>true, 'minlength'=>6, 'maxlength'=>32, 'data-toggle'=>'tooltip', 'data-placement'=>'top', 'title'=>'Будьте внимательны при вводе или копировании/вставке']) !!}
							{!! Form::check('memory', trans('front/login.remind'), 1, true) !!}
							{!! Form::text('address', '', ['class' => 'hpet']) !!}
							{!! Form::submit('Вход', ['text-center','btn btn-lg btn-primary']) !!}
						{!! Form::close() !!}
						<p class="text-center">
							<a class="link" href="/password/email">{!! trans('front/login.forget') !!}</a>
						</p>
						{{ request()->session()->put('_redirect', URL::previous()) }}
						
					</div>
					
					<div class="col-lg-3 col-lg-offset-2 col-md-5 col-md-offset-1 implicit">
						
						<div class="text-center">
							<hr>
								<h2 class="intro-text text-center">{{ trans('front/login.register') }}</h2>
							<hr>	
							<p>{{ trans('front/login.register-info') }}</p>
							{!! link_to('auth/register', trans('front/login.registering'), ['class' => 'btn btn-default']) !!}
						</div>
			
					</div>
					
				</div>

@stop