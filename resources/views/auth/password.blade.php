@extends('auth.t')

@section('form')
						
				<h2 class="intro-text">{{ trans('front/password.title') }}</h2>
				
				<div class="row">
				
					<div class="col-lg-6 col-sm-8">
					
						<p>{{ trans('front/password.info') }}</p>
						{!! Form::open(['url' => 'password/email', 'method' => 'post', 'role' => 'form', 'class' => 'validate']) !!}
							{!! Form::group('email', 'email', $errors, trans('front/password.email'), null, 'user', null, ['required'=>true, 'minlength'=>6, 'data-toggle'=>'tooltip', 'data-placement'=>'top', 'title'=>'Email, указанный при регистрации']) !!}
							{!! Form::text('address', '', ['class' => 'hpet']) !!}
							{!! Form::submit(trans('front/form.send'), ['text-center','btn btn-lg btn-primary']) !!}
						{!! Form::close() !!}
						<p class="text-center">
							<a class="link" href="/auth/login">Вход</a>
						</p>
					
					
					</div>
					
				</div>
@stop