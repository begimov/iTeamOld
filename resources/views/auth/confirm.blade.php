@extends('auth.t')

@section('form')
	
				<h2 class="intro-text">{{ trans('front/verify.email-title') }}</h2>

				<p>{{ trans('front/verify.get-text') }}</p>		

				{!! Form::open(['url' => 'auth/confirm', 'method' => 'post', 'role' => 'form']) !!}	

					{!! Form::group('email', 'email', $errors, trans('front/login.email'), null, 'envelope', null, ['required'=>true, 'minlength'=>6, 'maxlength'=>32, 'data-toggle'=>'tooltip', 'data-placement'=>'top', 'title'=>'Введите корректный Email, указанный при регистрации']) !!}
					{!! Form::submit(trans('front/form.send'), ['']) !!}

				{!! Form::close() !!}

@stop