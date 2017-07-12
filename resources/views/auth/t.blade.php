@extends('c.template_no_fb')

@section('main')
    <section class="section content">
		<div class="container">
			<div class="row">
				<div class="box">
					<div class="col-lg-12">

						@yield('form')

					</div>
				</div>
			</div>
		</div>
	</section>
@stop

@section('scripts')
	<script>
		(function($){
			
			function validateEmail(email) {
				var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
				return re.test(email);
			}
			function validatePassword(password) {
				var re = /^[a-zA-Z0-9_~!@#$%^&\*\.-]+$/;
				return re.test(password);
			}
			function validateUsername(username) {
				var re = /^[а-яА-Яa-z0-9_- ]{2,32}$/;
				return re.test(username.toLowerCase());
			}
			function validateInput(input) {
				var ok = 0, vu = 0, ve = 0,
					required = input.prop('required'),
					minlength = input.attr('minlength'),
					maxlength = input.attr('maxlength'),
					email = input.is('[type="email"]')
					log = input.is('[name="log"]')
					username = input.is('[name="username"]')
					password = input.is('[type="password"]')
					confirmation = input.is('[name="password_confirmation"]') ? $('[name="password"]').val() : false,
					val = input.val(),
					vallength = val.length;
					
				if(required && !vallength) {
					input.attr('data-original-title', (input.data('required-error') || 'Это поле обязательно к заполнению'));
				}
				else ok = 1;
				
				if(minlength && vallength<minlength) {
					ok = 0;
					input.attr('data-original-title', (input.data('minlength-error') || 'Минимальная длина поля: ' +minlength+  ' символов'));
				}
				if(maxlength && vallength>maxlength) {
					ok = 0;
					input.attr('data-original-title', (input.data('maxlength-error') || 'Максимальная длина поля: ' +minlength+  ' символов'));
				}
				if(email && !validateEmail(val)) {
					ok = 0;
					input.attr('data-original-title', (input.data('email-error') || 'Укажите корректный Email-адрес'));
				}
				if(log) {
					ve = validateUsername(val);
					vu = validateEmail(val);
					if(! (ok = ve || vu) ) input.attr('data-original-title', (input.data('email-error') || (!ve ? 'Укажите корректный Email-адрес или Ваш Логин' : 'Для логина используют только латинские буквы, цифры и _-') ));
				}
				if(username) {
					ve = validateUsername(val);
					if(! (ok = ve) ) input.attr('data-original-title', (input.data('email-error') || 'Для логина используют только латинские буквы, цифры и _-'));
				}
				if(password && !validatePassword(val)) {
					ok = 0;
					input.attr('data-original-title', (input.data('password-error') || 'Допустимые символы: латинские буквы, цифры или знаки _~!@#$%^&*-.'));
				}
				// && val != $('[name="'.input.data('forname').'"]').val()
				if(password && confirmation && val!=confirmation) {
					ok = 0;
					input.attr('data-original-title', (input.data('confirmation-error') || 'Пароли не совпадают'));
				}
				return ok;
			}
			
			$('input[data-toggle="tooltip"]').on('focus',function(){
				$(this).tooltip('show');
			});
			
			$('form.validate input').on('keyup change paste', function(e) {
				var input = $(this), ok = validateInput(input), tt = input.is('[data-toggle="tooltip"]');
				if(!ok){
					input.parent().removeClass('has-success').addClass('has-error');
					if(tt) input.tooltip('show');
				}
				else {
					input.parent().removeClass('has-error').addClass('has-success');
					if(tt) input.tooltip('hide');
				}
			});
		
			$('form.validate').on('submit', function(e) {
				
				var form = $(this), errors = 0;
				if(form.not('.is-valid')) {
					
					var inputs = $('input[required]',form), errors = inputs.size();
					var vallength = 0;
					
					inputs.each(function(){
						var input = $(this),
							ok = validateInput(input);
						errors -= ok;
					});
					
					if(!errors){
						form.addClass('is-valid').submit();
						//alert('ok');
						//e.preventDefault();
						//return false;
					}
					else {
						inputs.parent().addClass('has-error');
						inputs.tooltip('show');
						e.preventDefault();
						return false;
					}
					
				}
				
			});
			
			$('.show-password').on('click',function(){
				var showPassword = $(this);
				if(showPassword.is('.glyphicon-eye-open')) {
					showPassword.removeClass('glyphicon-eye-open').addClass('glyphicon-eye-close').parent('.input-group-addon').prev('input').attr('type','text');
				}
				else {
					showPassword.removeClass('glyphicon-eye-close').addClass('glyphicon-eye-open').parent('.input-group-addon').prev('input').attr('type','password');
				}
			});
			
			$('.badge').popover();
			
		})(jQuery);
	</script>
@stop