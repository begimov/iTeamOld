@extends('c.template_no_fb')


@section('main')

    <section class="content">
		<div class="container">

			<br class="temp_correct">
			
			@if(@$order)
			<div class="row">
				<div class="box box-orders">
				
					@include('c.p.menu')
				
					<div class="col-lg-10 col-sm-10">
					
						<div class="well">
							<div class="media order" data-order_id="{!! $order->id !!}">

								@if($order->learn->img)
								<div class="media-left media-middle">
									  <img class="media-object" src="{!! $order->learn->img !!}" alt="">
								</div>
								@endif
								
								<div class="media-body">
									<h5 class="media-heading">
										{!! $order->learn->title !!}
										<small class="label label-info">
										<a href="{!! '/learn' . $order->learn->path . $order->learn->wid !!}" class="text-black" target="_blank">
											<span class="glyphicon glyphicon-link" aria-hidden="true"></span>
											ссылка
										</a>
										</small>
									</h5>
									<p class="status status{!! $order->status !!}" data-status="{!! $order->status !!}">
										
										<span class="glyphicon glyphicon-piggy-bank" aria-hidden="true"></span>
										<span class="nowrap">
											{!! $order->learn->price>0 ? HTML::priceFormatHtml($order->sum, $order->learn->currensy) : 'Бесплатно' !!}
										</span>
										
										<span class="label label-default">
											<span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>
											{!! HTML::paymentTypeText( $order->payment_type ) !!}
										</span>
										
										@if($order->payed_at)
										<span class="label label-success">
											<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
											{!! HTML::orderStatusText($order->status) !!}
												{!! HTML::humanDateFormat( $order->payed_at ) !!}
										</span>
										@else
										<span class="label label-warning">
											<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
											{!! HTML::orderStatusText($order->status) !!}
												~ {!! HTML::humanDateFormat( $order->created_at , false) !!}
										</span>
										@endif
									</p>
								</div>
								
								@if($order->status < 1)
								<div class="media-right media-middle sm-hidden text-right">
									
									<a class="media-object btn" role="button" data-toggle="modal" data-target="#payModal" href="#payModal">Оплатить</a>
									
									{{ Form::open(['route' => ['orders.edit', $order->id], 'class'=>'hidden text-center ajax']) }}
										{!! Form::hidden('_method', 'GET') !!}
										{!! Form::button('Оплатить', ['class'=>'btn media-object', 'type'=>'submit']) !!}
									{{ Form::close() }}
									
									{{ Form::open(['route' => ['orders.destroy', $order->id], 'class'=>'text-center']) }}
										{!! Form::hidden('_method', 'DELETE') !!}
										{!! Form::button('Удалить', ['class'=>'before-glyphicon glyphicon-trash trash text-danger size-xs btn-as-link link', 'type'=>'submit']) !!}
									{{ Form::close() }}
								</div>
								@endif
								
							</div>
						</div>
							
						@if($order->status < 1)

						<div class="row">
							<div class="box">
								<div class="col-lg-10 col-lg-offset-1">
									<p>Материалы будут доступны после оплаты.</p>
									
									<div class="alert alert-warning" role="alert"><b>Внимание!</b> Возможно стоит подождать. Подтверждение платежа приходит не моментально - это зависит от выбранного способа оплаты и работы платёжного сервиса. Если Вы уверены, что оплатили и что-то не так, сообщите об этом на <a href="mailto:info@iteam.ru">info@iteam.ru</a></div>
									
									<p><a class="btn btn-success" role="button" data-toggle="modal" data-target="#payModal" href="#payModal">Оплатить сейчас?</a></p>
								</div>
							</div>
						</div>
						
						@else
						<div class="row">
							<div id="order-pay-content" class="box">
								<div class="col-lg-12">
								{!! $order->learn->ptext !!}
								</div>
							</div>
						</div>
						@endif
						
						
					</div>
				</div>
			</div>
			@endif	


		</div>
	</section>

@stop

@section('footer')

	<!-- modal.order -->
	@include('c.modals.order')
	<!-- /modal.order -->

@stop

@section('scripts')

	<script src="/js/cookie.js"></script>
	
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
				var re = /^[a-z0-9_-]{2,32}$/;
				return re.test(username.toLowerCase());
			}
			function validateInput(input) {
				var ok = 0, vu = 0, ve = 0,
					required = input.prop('required'),
					minlength = input.attr('minlength'),
					maxlength = input.attr('maxlength'),
					email = input.is('[type="email"]')
					log = input.is('[name="log"]')
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
					
					inputs.each(function(){
						errors -= validateInput($(this));
					});
					
					if(!errors){
						
						if(form.is('.ajax')){
							
							//var res = $('#res');
							//res.text( 'data' );
							
							var //token = $('input[name="_token"]',form).val(),
								url = form.data('url'),
								method = form.attr('method') || 'GET',
								data = form.serialize();
							
							$.ajax({
								url: url,
								type: method,
								data: data,
								dataType: 'json',
								success: function (d) {
									if(d) {
										
										alert(d);

									} else alert('Ошибка авторизации');
								},
								error: function (err) {
									if(err.status == 422){
										alert(JSON.stringify(err.responseJSON));
									}else alert('Сбой авторизации');
								}
							});
							
							e.preventDefault();
							return false;
						}
						else form.addClass('is-valid').submit();
					}
					else {
						inputs.parent().addClass('has-error');
						inputs.tooltip('show');
						e.preventDefault();
						return false;
					}
					
				}
				
			});
			
			
			var payMethod = getCookie('payment_type');
			if(payMethod) {
				var paymentInput = $('input[value="'+payMethod+'"]');
				paymentInput.prop('checked', true).parent('.payment-change').addClass('active');
				$('#paymentTabs li:eq(1) a').tab('show').parent('li').removeClass('disabled');
				$('.pay_screen').hide();
				$('.payment_type-'+payMethod).show();
			}
			
			$('label.payment-change').on('click',function(){
				$(this).children('input').change();
			});
			
			$('input[name="payment-method"]').on('focus change',function(){
				var payment_method = $(this), payment_type = payment_method.val();
				$('.payment-change.active').removeClass('active').children('input').prop('checked', false).removeAttr('checked');
				payment_method.prop('checked', true).parent('label').addClass('active');
				//cookie
				setCookie('payment_type',payment_type);
				if(payment_type == getCookie('payment_type')){
					var token = $('meta[name="_token"]').attr('content'),
						order_id = $('.order[data-order_id]').data('order_id'),
						url = (order_id) ? '/ajax/order/'+order_id : '/ajax/order',
						method = (order_id) ? 'PUT' : 'POST',
						data = {'_token':token,'_method':method,'payment_type':payment_type};//form.serialize();
					$.ajax({
						url: url,
						type: method,
						data: data,
						dataType: 'json',
						success: function (d) {
							if(d) {
								$('#paymentTabs li:eq(1) a').tab('show').parent('li').removeClass('disabled');
								$('.pay_screen').hide();
								$('.payment_type-'+payment_type).show();
							}
							else {
								deleteCookie('payment_type');
								alert('Ошибка оплаты');
							}
						},
						error: function (err) {
							if(err.status == 422){
								alert(JSON.stringify(err.responseJSON));
							}
							else alert('Сбой оплаты');
						}
					});
				}
				else alert('Ошибка предзаказа!');
			});
			
			//ajax-update-order-yandex
			
			$('form.ajax-update-order-yandex').on('submit', function(e) {
				
				var form = $(this), inputs = $('input',form), errors = inputs.size();
				inputs.each(function(){
					errors -= $(this).val();
				});
					
				if(!errors){
					
					var token = $('meta[name="_token"]').attr('content'),
						order_id = $('input[name="label"]',form).val(),
						url = (order_id) ? '/ajax/order/'+order_id : '/ajax/order',
						method = (order_id) ? 'PUT' : 'POST',
						payment_type = 'ya_' + $('input[name="paymentType"]',form).val().toLowerCase(),
						data = {'_token':token,'_method':method,'payment_type':payment_type,'_step':1};//form.serialize();
					
					$.ajax({
						url: url,
						type: method,
						data: data,
						dataType: 'json',
						success: function (d) {
							if(d) {
								//alert('ret: ' + d);
								return true;
							}
							else {
								deleteCookie('payment_type');
								alert('Ошибка оплаты 2');
								e.preventDefault();
								return false;
							}
						},
						error: function (err) {
							if(err.status == 422){
								alert(JSON.stringify(err.responseJSON));
							}
							else alert('Сбой оплаты 2');
							e.preventDefault();
							return false;
						}
					});

				}
				else {
					alert('Ошибка формы оплаты 2');
					e.preventDefault();
					return false;
				}
				
				
			});
			
			$('.nav-tabs a[data-toggle=tab]').on('click', function(e) {
				if ($(this).parent('li').hasClass('disabled')) {
					e.preventDefault();
					return false;
				}
			});
			
			var payModalHash = '#payModal', payModal = $(payModalHash);
			if(window.location.hash == payModalHash){
				payModal.modal('show');
			}
						
		})(jQuery);
	</script>
@stop