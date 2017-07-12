@extends('auth.t')

@section('form')
	
				<h2 class="intro-text">{{ trans('front/register.title') }}</h2>

				<div class="row">
				
					<div class="col-lg-6 col-md-6">
					
						<!--p>{{ trans('front/register.infos') }}</p-->
						
						{!! Form::open(['url' => 'auth/register', 'method' => 'post', 'role' => 'form', 'class' => 'validate']) !!}
							
							{!! Form::group('text', 'firstname', $errors, null, null, 'user', null, ['placeholder' => 'Имя', 'required'=>true, 'data-toggle'=>'tooltip', 'data-placement'=>'top', 'title'=>'Как у Вам обращаться?']) !!}
							{!! Form::group('email', 'email', $errors, null, null, 'envelope', null, ['placeholder' => trans('front/register.email'), 'required'=>true, 'data-toggle'=>'tooltip', 'data-placement'=>'top', 'title'=>'Укажите корректный Email-адрес']) !!}
							{!! Form::group('text', 'phone', $errors, null, null, 'phone-alt', null, ['placeholder' => 'Телефон', 'required'=>true, 'data-toggle'=>'tooltip', 'data-placement'=>'top', 'title'=>'Только цифры, без пробелов, скобок, тире']) !!}

							<div>
								<p class="muted"><b>Логин</b> и <b>Пароль</b> будут сгенерированы автоматически</p>
								<p>Но Вы можете сразу их 
									<a class="link" role="button" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
										придумать самостоятельно <span class="caret"></span>
									</a>
								</p>
								<div class="collapse" id="collapseExample">
									<div class="-well">
						
									{!! Form::group('text', 'username', $errors, trans('front/register.pseudo'), null, 'sunglasses', null, ['minlength'=>2, 'maxlength'=>32, 'data-toggle'=>'tooltip', 'data-placement'=>'top', 'title'=>'От 2 до 32 символов. Только латинские буквы и/или цифры и _-']) !!}
									{!! Form::group('password', 'password', $errors, trans('front/register.password'), null, 'lock', 'eye-open show-password', ['minlength'=>6, 'maxlength'=>32, 'data-toggle'=>'tooltip', 'data-placement'=>'top', 'title'=>'Только латинские буквы, цифры или знаки _@#$%^&*-. От 6 до 32 символов']) !!}
									{!! Form::group('password', 'password_confirmation', $errors, trans('front/register.confirm-password'), null, 'lock', 'eye-open show-password', ['minlength'=>6, 'maxlength'=>32, 'data-toggle'=>'tooltip', 'data-placement'=>'top', 'title'=>'Точно, как в предыдущем поле']) !!}
									
									</div>
								</div>
							</div>
										
							{!! Form::text('address', '', ['class' => 'hpet']) !!}
							{!! Form::submit('Регистрация', ['','btn btn-lg btn-primary']) !!}
							
						{!! Form::close() !!}
						
					</div>
					
				</div>
				
				<p class="">
					<a class="link" href="/auth/login">Вход</a>
				</p>


@stop