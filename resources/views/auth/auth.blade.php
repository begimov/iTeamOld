@extends('auth.t')

@section('form')

	<div class="col-lg-4 col-lg-offset-4">
	
		<div id="lr-block">
		
			<h3 class="text-center m-b-16"><span class="glyphicon glyphicon-log-in" aria-hidden="true"></span> Авторизация</h3>
			
			<!--form id="login-registr" class=""-->
			{!! Form::open(['route' => 'auth.post', 'method' => 'post', 'role' => 'form', 'id' => 'login-registr', 'class' => 'validate', 'data-ajax' => route('auth.ajax')]) !!}
				<input type="hidden" name="_redirect" value="{{  URL::previous() ? URL::previous() : Request::url() }}" />
				<fieldset class="email-input m-b-16">
					<input id="autocomplete" class="full-input" type="text" name="email" placeholder="Ваш Email" autocomplete="off" />
					<div class="error-message text-danger m-b-16" style="display:none;">Проверьте формат Email'а</div>
				</fieldset>
				<fieldset id="registr" style="display:none;">
					<div class="registr-more m-b-16" style="display:none;">
						<div class="m-b-16">
							<input class="full-input" type="text" name="name" placeholder="Ваше имя" autocomplete="off" />
						</div>
						<div class="m-b-16">
							<input class="full-input" type="text" name="phone" placeholder="Ваш телефон" autocomplete="off" />
						</div>
						<div class="m-b-16">
							<input class="full-input" type="text" name="login" placeholder="Ваш логин" autocomplete="off" />
						</div>
						<div class="m-b-16">
							<input class="pull-left half-input" type="password" name="password" placeholder="Ваш пароль" autocomplete="off" />
							<button id="rp" class="pull-right btn btn-md btn-default" type="submit" name="submit" value="rp"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Регистрация</button>
						</div>
					</div>
					<div class="clear">
						<button id="re" class="registr-more pull-left btn btn-md btn-warning" type="submit" name="submit" value="re" data-toggle="tooltip" data-placement="bottom" title="На указанный Email придёт письмо со ссылкой для входа"><span class="glyphicon glyphicon-send" aria-hidden="true"></span> Войти через Email</button>
						<span id="show-registr-more" class="pull-right link" data-text="Отмена">Полная регистрация</span>
					</div>
				</fieldset>
				<fieldset id="login" style="display:none;">
					<div class="login-more m-b-16 clear" style="display:none;">
						<input class="pull-left half-input" type="password" name="password" placeholder="Ваш пароль" autocomplete="off" />
						<button id="lp" class="pull-right btn btn-md btn-default" type="submit" name="submit" value="lp"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span> Войти по паролю</button>
					</div>
					<div class="clear">
						<span id="show-login-more" class="pull-left link" data-text="Забыли пароль?">Я помню пароль</span>
						<button id="le" class="login-more pull-right btn btn-md btn-success" type="submit" name="submit" value="le" data-toggle="tooltip" data-placement="bottom" title="На указанный Email придёт письмо со ссылкой для входа"><span class="glyphicon glyphicon-send" aria-hidden="true"></span> Войти через Email</button>
					</div>
				</fieldset>
			{!! Form::close() !!}
			<!--/form-->
			
		</div>
		
	</div>

@stop

@section('scripts')


	<script src="/js/vendor/jquery.autocomplete.js"></script>
	<script>
		
		(function($){
			
			$('[data-toggle="tooltip"]').tooltip();
			
			function validateEmail(email) {
				var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
				return re.test(email);
			}
		
			$('#show-login-more').on('click',function(e){
				var slp = $(this), text = slp.text(), dtext = slp.data('text');
				$('.login-more').toggle();
				slp.text(dtext);
				slp.data('text',text);
				$('#login input').val('');
				e.preventDefault();
				return false;
			});
			
			$('#show-registr-more').on('click',function(e){
				var slp = $(this), text = slp.text(), dtext = slp.data('text');
				$('.registr-more').toggle();
				slp.text(dtext);
				slp.data('text',text);
				e.preventDefault();
				return false;
			});
			
			var _token = $('meta[name="_token"]').attr('content');
			$.ajaxSetup({
				headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') }
			});
			
			
			var lr_form = $('#login-registr');
			var autocomplete = $('input[name="email"]',lr_form);
			var ac_ok = false;
			autocomplete.autocomplete({
				minChars: 3,
				preventBadQueries: false,
				dataType: 'json',
				autoSelectFirst: true,
				serviceUrl: function(q) {
					return lr_form.attr('action') + '/' + q;
				},
				onSelect: function(s) {
					$('#registr').fadeOut().find('button.active').removeClass('active');
					$('#login').fadeIn();
					$('button#le').addClass('active');
					lr_form.removeClass('has-error')
					ac_ok = true;
				},
				onInvalidateSelection: function(){
					var q = $(this).val();
					$('#login').fadeOut().find('button.active').removeClass('active');
					if(q && validateEmail(q)) {
						$('#registr').fadeIn();
						$('button#re').addClass('active');
						lr_form.removeClass('has-error')
						ac_ok = true;
					}
					else {
						$('#registr').fadeOut().find('button.active').removeClass('active');
						lr_form.addClass('has-error')
						ac_ok = false;
					}
				}
			}).on('blur',function(e){
				if(!ac_ok) {
					var q = $(this).val();
					$('#login').fadeOut().find('button.active').removeClass('active');
					if(q && validateEmail(q)) {
						$('#registr').fadeIn();
						$('button#re').addClass('active');
						lr_form.removeClass('has-error')
						ac_ok = true;
					}
					else {
						$('#registr').fadeOut().find('button.active').removeClass('active');
						lr_form.addClass('has-error')
						ac_ok = false;
					}
				}
			}).on('keydown',function(e){
				if(!ac_ok && e.keyCode == 13) {
					$(this).blur();
					e.preventDefault();
					return false;
				}
			}).on('submit',function(e){
				if(!ac_ok) {
					$(this).blur();
				}
				e.preventDefault();
				return false;
			});
			
			lr_form.on('submit',function(e){
				$.ajax({
					url: lr_form.data('ajax'),
					data: lr_form.serialize(),
					method: lr_form.attr('method')
				})
				.done(function( j ) {
					$('#lr-msg').remove();
					if(!j.error) {
						if(j.redirect) {
							window.location.href = j.redirect;
						}
						$('#lr-block').fadeOut();
					}
					$('#lr-block').before('<div style="font-size:24.3px; color:red;font-weight:bold;width:110%;line-height:34px;" id="lr-msg">'+ j.msg +'<br></div>');					
				})
				.fail(function(e) {
					//alert( e.status + ' | ' + e.statusText + ' | ' + e.responseText );
				});
				e.preventDefault();
				return false;
			});
			
		
		})(jQuery);
			
	</script>

@stop