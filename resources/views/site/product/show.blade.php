@extends('site.template')

@section('title')
	{{ $page->meta_title ? $page->meta_title . ' ' : ($page->title ? $page->title . ' ' : '') }}
	| 
@stop

@section('header')

    <!-- Header -->
    <header class="-learn-header">
		
		@if($crumbs/* && Request::segment(0)*/)
		<div class="row">
			<ol class="breadcrumb">
			@foreach($crumbs as $crumb)
				<li>{!! link_to('learn' . $crumb->path . $crumb->wid, $crumb->title, ["class"=>"crumb_parent crumb_" . (isset($i) ? ++$i : $i=0) ]) !!} </li>
			@endforeach      
			</ol>
		</div>
		@endif
	
    </header>
	
@stop

@section('main')

    <section id="learn" class="content" data-product_id="{{ $page->id }}" data-payment_type="{{ $order ? $order->payment_type : 0 }}" data-order_id="{{ $order ? $order->id : 0 }}" data-user_id="{{ $user ? $user->id : 0 }}">
		<div class="container">

			<div class="row">
				<div class="box">
					<div class="col-lg-12">
						<h1>{!! $page->title !!}</h1>
					</div>
				</div>
			</div>
			
			@if(Request::segment(1))
			<div class="row">
				<div class="box">
					<div class="col-lg-12">
						
					{!! HTML::shortCode($page->text) !!}
						
					</div>
					
				</div>
			</div>
			@endif

		</div>
	</section>

@stop

@section('footer')

	<!-- modal.learn -->
	@include('site.modals.learn')
	<!-- /modal.learn -->

@stop

@section('edit-link')

	@if(Auth::user() && @Auth::user()->role_id<3)
		<div class="admin-edit"><a class="admin-edit-link" target="_blank" href="{{ route('admin.learn.show',$page->id) }}"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a></div>
	@endif

@stop

@section('scripts')
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.0/moment.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.0/locale/ru.js"></script>
	<script>
		(function($){

			$('.date').each(function(i, e) {
				//var time = moment($(e).data('date'));
				//if(now.diff(time, 'days') <= 1) {
				//	$(e).html(time.from(now));
				//}
				$(e).html(moment($(e).data('date')).calendar());
			});
			
			function getCookie(name) {
				var matches = document.cookie.match(new RegExp(
					"(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
				));
				return matches ? decodeURIComponent(matches[1]) : undefined;
			}
			
			var learn_s = $('#learn'),
				user_id = learn_s.data('user_id'),
				order_id = learn_s.data('order_id'),
				product_id = learn_s.data('product_id'),
				payment_type = learn_s.data('payment_type') || getCookie('payment_type');
				
			if(payment_type) {
				var paymentInput = $('input[value="'+payment_type+'"]');
				paymentInput.prop('checked', true).parent('.payment-change').addClass('active');
				
				if(!user_id) $('#paymentTabs li:eq(1) a').tab('show').parent('li').removeClass('disabled');
				
			}
			
			$('.payment-change').click(function(){
				
				if(!user_id){
					var labelButton = $(this);
					$('.payment-change.active').removeClass('active').children('input').prop('checked', false).removeAttr('checked');
					
					payment_type = labelButton.addClass('active').children('input').prop('checked', true).val();

					document.cookie = "payment_type=" + payment_type;
					$('#paymentTabs li:eq(1) a').tab('show').parent('li').removeClass('disabled');
				}
				else {
					$(this).parents('form').submit();
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
		
			function validateEmail(email) {
				var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
				return re.test(email);
			}
			function validatePassword(password) {
				var re = /^[a-zA-Z0-9_~!@#$%^&\*\.-]+$/;
				return re.test(password);
			}
			function validateUsername(username) {
				//var re = /^[АБВГДЕЁЖЗИЙКЛМНОПРСТУФХЦЧШЩЪЫЬЭЮЯабвгдеёжзийклмнопрстуфхцчшщъыьэюяA-Za-z0-9_-.]{2,32}$/;
				//return re.test(username.toLowerCase());
				return true;
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
				if(email && !validateEmail(input.val())) {
					ok = 0;
					input.attr('data-original-title', (input.data('email-error') || 'Укажите корректный Email-адрес'));
				}
				if(log) {
					ve = validateUsername(input.val());
					vu = validateEmail(input.val());
					if(! (ok = ve || vu) ) input.attr('data-original-title', (input.data('email-error') || (!ve ? 'Укажите корректный Email-адрес или Ваш Логин' : 'Для логина используют только латинские буквы, цифры и _-') ));
				}
				if(password && !validatePassword(input.val())) {
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
			
			$('form.validate input').on('change paste', function(e) {
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
						
						$('input[name="_redirect"]',form).val('https://iteam.ru/i/order/create?email='+$('input[name="email"]',form).val()+'&name='+$('input[name="firstname"]',form).val()+'&phone='+$('input[name="phone"]',form).val()+'&product_id='+product_id+'&payment_type='+payment_type);
						form.addClass('is-valid').submit();
						
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
			
			
		})(jQuery);
	</script>
@stop