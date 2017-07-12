@extends('auth.t')

@section('form')

	<div class="col-lg-4 col-lg-offset-4">
	
		<div id="lr-block">
		
			<h3 class="text-center m-b-16"><span class="glyphicon glyphicon-log-in" aria-hidden="true"></span> Вход/Регистрация по Email</h3>
			<p class="text-center m-b-16">На указанный Вами Email придёт письмо со ссылкой для входа</p>
			
			{!! Form::open(['route' => 'email.post', 'method' => 'post', 'role' => 'form', 'id' => 'login-registr', 'class' => 'validate']) !!}
				
				{!! Form::hidden('_redirect', Request::input('_redirect') ? Request::input('_redirect') : (URL::previous() ? URL::previous() : Request::url())) !!}
				<fieldset class="email-input m-b-16">
				{!! Form::text('email', Request::segment(3) ? Request::segment(3) : null, ["class"=>"full-input","placeholder"=>"Ваш Email"]) !!}
				</fieldset>
				
				<button class="login-more pull-center btn btn-md btn-success" type="submit" name="submit" data-toggle="tooltip" data-placement="bottom" title="На указанный Email придёт письмо со ссылкой для входа"><span class="glyphicon glyphicon-send" aria-hidden="true"></span> Войти через Email</button>

			{!! Form::close() !!}
			<!--/form-->
			
			<p class="text-right"><a href="/auth/login">Вход по паролю</a></p>
			
		</div>
		
	</div>

@stop

@section('scripts')

	<script>
		
		(function($){
			
			$('[data-toggle="tooltip"]').tooltip();
			
			function validateEmail(email) {
				var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
				return re.test(email);
			}

		
		})(jQuery);
			
	</script>

@stop