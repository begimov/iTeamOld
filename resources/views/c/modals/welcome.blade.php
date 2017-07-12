<div class="modal fade" id="welcomeModal" tabindex="-1" role="dialog" aria-labelledby="welcomeLabel">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title text-center" id="welcomeLabel">Получите максимум возможностей</h4>
				<p class="text-center">Это быстро и бесплатно</p>
			</div>
			<div class="modal-body">
			
				<div class="row">

					<div class="col-lg-4 col-lg-offset-1 col-md-6">
					
					
						<p class="lead tab-title text-center"><span class="icon-info glyphicon glyphicon-sunglasses text-info" aria-hidden="true"></span> Создать новый аккаунт</p>

						{!! Form::open(['url' => 'auth/register', 'method' => 'post', 'role' => 'form', 'class' => 'validate']) !!}
					
							{!! Form::group('text', 'name', $errors, null, null, 'user', null, ['placeholder' => 'Имя', 'required'=>true, 'data-toggle'=>'tooltip', 'data-placement'=>'top', 'title'=>'Как у Вам обращаться?']) !!}
							{!! Form::group('email', 'email', $errors, null, null, 'envelope', null, ['placeholder' => trans('front/register.email'), 'required'=>true, 'data-toggle'=>'tooltip', 'data-placement'=>'top', 'title'=>'Укажите корректный Email-адрес']) !!}
							{!! Form::group('text', 'phone', $errors, null, null, 'phone-alt', null, ['placeholder' => 'Телефон', 'required'=>true, 'data-toggle'=>'tooltip', 'data-placement'=>'top', 'title'=>'Только цифры, без пробелов, скобок, тире']) !!}

							<div>
								<p class="muted"><b>Логин</b> и <b>Пароль</b> будут сгенерированы автоматически</p>
								<p>Но Вы можете сразу их 
									<a class="link" role="button" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
										придумать самостоятельно <span class="caret"></span>
									</a>
								</p>
								<div class="collapse {{ ( session()->has('collapse') ) ? 'in' : ''}}" id="collapseExample">
									<div class="-well">
						
									{!! Form::group('text', 'username', $errors, null, null, 'sunglasses', null, ['placeholder' => trans('front/register.pseudo'), 'minlength'=>2, 'maxlength'=>32, 'data-toggle'=>'tooltip', 'data-placement'=>'top', 'title'=>'От 2 до 32 символов. Только латинские буквы и/или цифры и _-']) !!}
									{!! Form::group('password', 'password', $errors, null, null, 'lock', 'eye-open show-password', ['placeholder' => trans('front/register.password'), 'minlength'=>6, 'maxlength'=>32, 'data-toggle'=>'tooltip', 'data-placement'=>'top', 'title'=>'Только латинские буквы, цифры или знаки _@#$%^&*-. От 6 до 32 символов']) !!}
									{!! Form::group('password', 'password_confirmation', $errors, null, null, 'lock', 'eye-open show-password', ['placeholder' => trans('front/register.confirm-password'), 'minlength'=>6, 'maxlength'=>32, 'data-toggle'=>'tooltip', 'data-placement'=>'top', 'title'=>'Точно, как в предыдущем поле']) !!}
									
									</div>
								</div>
							</div>
							
							{!! Form::hidden('_redirect', url('learn'.$page->path.$page->wid.'#payModal')) !!}

							{!! Form::text('address', '', ['class' => 'hpet']) !!}
							{!! Form::submit('Регистрация', ['','btn btn-lg btn-primary']) !!}
							
						{!! Form::close() !!}
							
						<p class="text-success small hidden">
							<small>Регистрируясь, Вы соглашаетесь с <a class="link">Правилами</a></small>
						</p>
						
					</div>
					
					<div class="col-lg-4 col-lg-offset-2 col-md-6 implicit">
						
						<p class="lead tab-title text-center"><span class="icon-info glyphicon glyphicon-user" aria-hidden="true"></span> Уже зарегистрированы?</p>
						
						{!! Form::open(['url' => 'auth/login', 'method' => 'post', 'role' => 'form', 'class' => 'validate']) !!}
							{!! Form::group('text', 'log', $errors, '', null, 'envelope', null, ['placeholder'=>'Email или Логин', 'required'=>true, 'minlength'=>2, 'data-toggle'=>'tooltip', 'data-placement'=>'top', 'title'=>'Email, указанный при регистрации']) !!}
							{!! Form::group('password', 'password', $errors, '', null, 'lock', 'eye-open show-password', ['placeholder'=>'Пароль', 'required'=>true, 'minlength'=>6, 'maxlength'=>32, 'data-toggle'=>'tooltip', 'data-placement'=>'top', 'title'=>'Будьте внимательны при вводе или копировании/вставке']) !!}
							{!! Form::check('memory', trans('front/login.remind'), 1, true) !!}
							{!! Form::text('address', '', ['class' => 'hpet']) !!}
							
							{!! Form::hidden('_redirect', url('learn'.$page->path.$page->wid.'#payModal')) !!}
							
							{!! Form::submit('Вход', ['','btn btn-lg btn-primary']) !!}
						{!! Form::close() !!}
						
						<p class="text-center">
							<a class="link" href="/password/email">{!! trans('front/login.forget') !!}</a>
						</p>
			
					</div>

				</div>
			
			</div>
			
			<div class="modal-footer">
			<div class="row">
			<div class="col-sm-10 col-sm-offset-1">
				<div class="pull-left">
					<button type="button" class="btn btn-success btn-lg" data-dismiss="modal" aria-label="Close">Не хочу. Возможно, позже...</button>
				</div>
				<div class="pull-right">
					<a class="link" href="https://iteam.ru" target="_blank"><span class="glyphicon glyphicon-new-window"></span> Перейти на портал iTeam</a>
				</div>
			</div>
			</div>
			</div>
			
		</div>
	</div>
</div>