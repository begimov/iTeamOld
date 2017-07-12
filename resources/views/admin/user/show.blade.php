@extends('admin.template')

@section('main')

	<div class="block-header">
		<h2><i class="zmdi zmdi-accounts-alt"></i> {{ link_to_route('admin.user.index','Пользователи') }} &rarr; {{ $user->username }}</h2>
	</div>

	<div class="card">
		<div class="card-header">
			
		</div>
		<div class="card-body card-padding">
			<div class="row">

				{!! Form::model($user, ['route' => ['admin.user.update',$user->id], 'class' => 'validate', 'files' => true]) !!}
					{!! Form::hidden('_method', 'PUT') !!}
					<div class="col-lg-3 col-sm-3">
						
						<div class="fileinput fileinput-new {!! $errors->has('avatar') ? 'has-error' : '' !!}" data-provides="fileinput">
							<div class="fileinput-preview thumbnail" data-trigger="fileinput">
							@if($user->avatar)
								<img class="fileinput-new" src="/filemanager/userfiles/user{{ $user->id }}/200/{!! $user->avatar !!}">
							@endif
							</div>
							<div>
								<label class="">
									<span class="btn btn-sm btn-no-waves btn-success fileinput-new">
									@if($user->avatar)
									Изменить аватар
									@else
									Добавить аватар
									@endif
									</span>
									<span class="hidden">
									{!! Form::file('avatar') !!}
									</span>
								</label>
								{!! Form::submit('Сохранить', ['','btn btn-sm btn-success btn-no-waves fileinput-exists']) !!}
								<a href="#" class="btn btn-no-waves btn-danger fileinput-exists" data-dismiss="fileinput">Отмена</a>
							</div>
							<p>{!! $errors->has('avatar') ? $errors->first('avatar', '<small class="help-block">:message</small>') : '' !!}</p>
						</div>
					
					</div>
					<div class="col-lg-9 col-sm-9">
						<div class="row">
							<div class="col-lg-6 col-sm-6">
								{!! Form::group('email', 'email', $errors, null, null, 'envelope', null, ['placeholder'=>'Email']) !!}
								{!! Form::group('tel', 'phone', $errors, null, null, 'phone-alt', null, ['placeholder'=>'Телефон']) !!}
								{!! Form::group('text', 'username', $errors, null, null, 'user', null, ['placeholder'=>'Логин']) !!}
								{!! Form::group('text', 'firstname', $errors, null, null, 'apple', null, ['placeholder'=>'Имя']) !!}
								{!! Form::group('text', 'lastname', $errors, null, null, 'tree-deciduous', null, ['placeholder'=>'Фамилия']) !!}
								{!! Form::group('textarea', 'about', $errors, null, null, 'education', null, ['placeholder'=>'О себе']) !!}
								
								{!! Form::submit('Сохранить', ['','btn btn-lg btn-primary btn-no-waves']) !!}
								<hr>
								{!! Form::group('password', 'password', $errors, 'Смена пароля', null, 'lock', null, ['placeholder'=>'Пароль', 'minlength'=>6, 'maxlength'=>32, 'data-toggle'=>'tooltip', 'data-placement'=>'top', 'title'=>'Только латинские буквы, цифры или знаки _@#$%^&*-. От 6 до 32 символов']) !!}
								{!! Form::group('password', 'password_confirmation', $errors, null, null, 'lock', null, ['placeholder'=>'Подтвердите пароль', 'minlength'=>6, 'maxlength'=>32, 'data-toggle'=>'tooltip', 'data-placement'=>'top', 'title'=>'Точно, как в предыдущем поле']) !!}
								
							</div>
							<div class="col-lg-6 col-sm-6">
								{!! Form::group('text', 'contacts', $errors, null, null, ['<span class="glyphicon glyphicon-link" aria-hidden="true"></span>','http://'], null, ['placeholder'=>'Сайт']) !!}
								@if(1)
								<div class="row">
									<div class="col-lg-8 col-sm-7">
									{!! Form::group('text', 'company_name', $errors, null, null, 'barcode', null, ['placeholder'=>'Компания (название)']) !!}
									</div>
									<div class="col-lg-4 col-sm-5">
									{!! Form::group('text', 'entity_type', $errors, null, null, null, null, ['placeholder'=>'ИП/ООО/ЗАО/...']) !!}
									</div>
								</div>
								@else
								<div class="row">
									<div class="col-lg-5 col-sm-5 col-xs-5">
									{!! Form::group('text', 'entity_type', $errors, null, null, 'registration-mark', null, ['placeholder'=>'ИП/ООО/ЗАО/...']) !!}
									</div>
									<div class="col-lg-7 col-sm-7 col-xs-7">
									{!! Form::group('text', 'company_name', $errors, null, null, 'barcode', null, ['placeholder'=>'Компания (название)']) !!}
									</div>
								</div>
								@endif

								{!! Form::group('text', 'country', $errors, null, null, 'globe', null, ['placeholder'=>'Страна']) !!}
								{!! Form::group('text', 'region', $errors, null, null, 'flag', null, ['placeholder'=>'Регион']) !!}
								{!! Form::group('text', 'city', $errors, null, null, 'home', null, ['placeholder'=>'Город']) !!}
								{!! Form::group('textarea', 'adress', $errors, null, null, 'map-marker', null, ['placeholder'=>'Адрес']) !!}
								
								<br>
								<br>
								<hr>
								<div class="form-group">
									<div class="fg-line">
										<div class="select">
											<span>Роль</span>
											<br>
											<select class="form-control" name="role_id">
												<option {{ ($user->role_id > 2) ? 'selected' : '' }} value="3">Пользователь</option>
												<option {{ ($user->role_id === 2) ? 'selected' : '' }} value="2">Редактор</option>
												<option {{ ($user->role_id === 1) ? 'selected' : '' }} value="1">Администратор</option>
											</select>
										</div>
									</div>
								</div>
								{!! Form::submit('Сохранить', ['','btn btn-sm btn-warning btn-no-waves']) !!}
								
							</div>
						</div>
						{!! Form::submit('Сохранить', ['','btn btn-sm btn-warning btn-no-waves']) !!}
					</div>
				{!! Form::close() !!}
			</div>
		</div>
		<div class="card-footer">
		</div>
	</div>
	
@stop

@section('scripts')
	
    <script src="/a/vendors/fileinput/fileinput.min.js"></script>
	<script>
	
	</script>

@stop