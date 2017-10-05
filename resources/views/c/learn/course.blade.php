@extends('c.template')

@section('title')
	Мастер-проекты{{-- {{ $page->meta_title ? $page->meta_title . ' ' : ($page->title ? $page->title . ' ' : '') }} --}}
	|
@stop

@section('head')
<style>
.panel-body {
	background-color: #DDD;
	padding: 10px 30px 30px 30px;
}
.vertical-align {
	display: flex;
	align-items: center;
}
a, a:hover, a:visited {
	color: #870100;
}
.btn {
	background: #870100;
	border-color: #870100 !important;
}
@media (max-width: 767px) {
	.row.vertical-align {
		display: block;
	}
}
</style>
@stop

@section('header')
	<!-- Header -->
	<header class="learn-header">
		<div class="row">
			<div class="col-md-12 text-center">
				<h1 class="main-title">Мастер-проекты iTeam</h1>
			</div>
		</div>
		<hr>
	</header>
@stop

@section('main')

	<!-- LISTING -->
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="row vertical-align">
						<div class="col-md-2">
							<!-- LINK -->
							<img src="https://iteam.ru/img/iconmp.png">
						</div>
						<div class="col-md-8">
							<!-- LINK -->
							<h3><a href="https://iteam.ru/landing/template/razrabotka-planov-i-budzhetov-MP.html">РАЗРАБОТКА ПЛАНОВ И&nbsp;БЮДЖЕТОВ КОМПАНИИ НА&nbsp;2018&nbsp;ГОД</a></h3>
							<p>
								Готовые планы и&nbsp;бюджеты на 2018 год за&nbsp;2&nbsp;месяца. Старт проекта&nbsp;— 9&nbsp;октября 2017&nbsp;года. </a>
							</p>
						</div>
						<div class="col-md-2 text-center">
							<h3>40&thinsp;000&nbsp;&#8381;</h3>
							<!-- LINK -->
							<a href="https://iteam.ru/landing/template/razrabotka-planov-i-budzhetov-MP.html"><button class="btn btn-danger">Подробнее</button></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- END OF LISTING -->
	<!-- LISTING -->
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="row vertical-align">
						<div class="col-md-2">
							<!-- LINK -->
							<img src="https://iteam.ru/img/iconmp.png">
						</div>
						<div class="col-md-8">
							<!-- LINK -->
							<h3><a href="https://iteam.ru/learn/course/kak-postroit-sistemu-upravlenija-protsessami-za-4-mesjatsa">СОЗДАНИЕ СИСТЕМЫ УПРАВЛЕНИЯ ПРОЦЕССАМИ КОМПАНИИ</a></h3>
							<p>
								Мастер-проект&nbsp;– это практическое руководство по&nbsp;осуществлению проекта создания системы управления процессами компании. Дается методика работы управленческой команды и&nbsp;дорожная карта проекта. Каждый этап этой работы обеспечен видеоматериалами, примерами, практическими рекомендациями и&nbsp;шаблонами документов. На&nbsp;всех этапах проекта обеспечена консультационная поддержка экспертов iTeam. Результатами этого мастер-проекта должны стать четко работающие в компании конкретные бизнес-процессы. При&nbsp;этом управленческая команда приобретет компетенции необходимые для&nbsp;дальнейшего развития процессно-ориентированного подхода.</a>
							</p>
						</div>
						<div class="col-md-2 text-center">
							<h3>40&thinsp;000&nbsp;&#8381;</h3>
							<!-- LINK -->
							<a href="https://iteam.ru/learn/course/kak-postroit-sistemu-upravlenija-protsessami-za-4-mesjatsa"><button class="btn btn-danger">Подробнее</button></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- END OF LISTING -->
	<!-- LISTING -->
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="row vertical-align">
						<div class="col-md-2">
							<!-- LINK -->
							<img src="https://iteam.ru/img/iconmp.png">
						</div>
						<div class="col-md-8">
							<!-- LINK -->
							<h3><a href="https://iteam.ru/learn/course/razrabotka-strategii-kompanii">РАЗРАБОТКА СТРАТЕГИИ КОМПАНИИ

							</a></h3>
							<p>
								Мастер-проект&nbsp;– это практическое руководство по&nbsp;осуществлению проекта разработки стратегии компании. Дается методика работы управленческой команды по&nbsp;созданию стратегии и&nbsp;дорожная карта проекта. Каждый этап этой работы обеспечен видеоматериалами, примерами, практическими рекомендациями и шаблонами документов. На&nbsp;всех этапах проекта обеспечена консультационная поддержка экспертов iTeam.

								Результатом этого мастер-проекта должна стать ясно сформулированная стратегия компании, определяющая приоритеты развития на&nbsp;5&thinsp;-&thinsp;10 лет и&nbsp;указывающая конкретные направления изменений, которые необходимо произвести для&nbsp;повышения конкурентоспособности компании и&nbsp;достижения ее&nbsp;долгосрочных целей.

							</a>
						</p>
					</div>
					<div class="col-md-2 text-center">
						<h3>40&thinsp;000&nbsp;&#8381;</h3>
						<!-- LINK -->
						<a href="https://iteam.ru/learn/course/razrabotka-strategii-kompanii"><button class="btn btn-danger">Подробнее</button></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- END OF LISTING -->
<!-- LISTING -->
<div class="row">
	<div class="col-md-10 col-md-offset-1">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="row vertical-align">
					<div class="col-md-2">
						<!-- LINK -->
						<img src="https://iteam.ru/img/iconmp.png">
					</div>
					<div class="col-md-8">
						<!-- LINK -->
						<h3><a href="https://iteam.ru/learn/course/bsc_strategy_management">УПРАВЛЕНИЕ СТРАТЕГИЕЙ С&nbsp;ПОМОЩЬЮ СБАЛАНСИРОВАННОЙ СИСТЕМЫ ПОКАЗАТЕЛЕЙ (BSC)

						</a></h3>
						<p>
							Теперь нет&nbsp;необходимости читать множество книг и&nbsp;всевозможных публикаций на&nbsp;тему&nbsp;ССП, которые не&nbsp;добавляют ясности, а&nbsp;только вызывают новые вопросы. Нужно только внимательно просмотреть материалы данного видеокурса и&nbsp;разработать систему показателей вашей компании в&nbsp;соответствии с&nbsp;четко изложенной методикой.

							В&nbsp;ходе этой работы вам&nbsp;обеспечена консультационная поддержка экспертов iTeam.

						</a>
					</p>
				</div>
				<div class="col-md-2 text-center">
					<h3>28&thinsp;000&nbsp;&#8381;</h3>
					<!-- LINK -->
					<a href="https://iteam.ru/learn/course/bsc_strategy_management"><button class="btn btn-danger">Подробнее</button></a>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
<!-- END OF LISTING -->
<!-- LISTING -->
<div class="row">
	<div class="col-md-10 col-md-offset-1">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="row vertical-align">
					<div class="col-md-2">
						<!-- LINK -->
						<img src="https://iteam.ru/img/iconmp.png">
					</div>
					<div class="col-md-8">
						<!-- LINK -->
						<h3><a href="https://iteam.ru/learn/course/effective_company">ЦЕЛЕВОЕ УПРАВЛЕНИЕ. КАК&nbsp;СДЕЛАТЬ КОМПАНИЮ УПРАВЛЯЕМОЙ И&nbsp;ЭФФЕКТИВНОЙ</a></h3>
						<p>
							Этот видеокурс будет полезен&nbsp;тем, кто&nbsp;желает создать такую компанию, которая сфокусирована, целенаправлена, стремительна, имеет высокий боевой дух и&nbsp;победную стратегию.

							Для&nbsp;этого необходимо решить пять&nbsp;главных управленческих задач. Видеокурс дает методику их&nbsp;решения и&nbsp;дорожную карту, которая ведет к&nbsp;успешным результатам по&nbsp;каждому из&nbsp;этих направлений.</a>
						</p>
					</div>
					<div class="col-md-2 text-center">
						<h3>28&thinsp;000&nbsp;&#8381;</h3>
						<!-- LINK -->
						<a href="https://iteam.ru/learn/course/effective_company"><button class="btn btn-danger">Подробнее</button></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- END OF LISTING -->
<!-- LISTING -->
<div class="row">
	<div class="col-md-10 col-md-offset-1">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="row vertical-align">
					<div class="col-md-2">
						<!-- LINK -->
						<img src="https://iteam.ru/img/iconmp.png">
					</div>
					<div class="col-md-8">
						<!-- LINK -->
						<h3><a href="https://iteam.ru/learn/course/process_control_system">СОЗДАНИЕ СИСТЕМЫ УПРАВЛЕНИЯ ПРОЦЕССАМИ КОМПАНИИ, версия&nbsp;1.0</a></h3>
						<p>
							Первая версия курса, посвященная построению системы управления процессами в&nbsp;компании. Этот курс&nbsp;— прекрасная возможность познакомиться с&nbsp;методиками обучения iTeam и&nbsp;получить знания, необходимые для разработки управления процессами.</a>
						</p>
					</div>
					<div class="col-md-2 text-center">
						<h3>16&thinsp;000&nbsp;&#8381;</h3>
						<!-- LINK -->
						<a href="https://iteam.ru/learn/course/process_control_system"><button class="btn btn-danger">Подробнее</button></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- END OF LISTING -->

@stop

@section('footer')

	<!-- modal.learn -->
	{{-- @include('c.modals.learn') --}}
	<!-- /modal.learn -->

@stop

@section('edit-link')

	{{-- @if(Auth::user() && @Auth::user()->role_id<3)
	<div class="admin-edit"><a class="admin-edit-link" target="_blank" href="{{ route('admin.learn.show',$page->id) }}"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a></div>
@endif --}}

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
				$(this).children('input').attr('checked', 'checked');
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
