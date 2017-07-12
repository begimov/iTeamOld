@extends('c.template')

@section('title')
	{{ $page->meta_title ? $page->meta_title . ' ' : ($page->title ? $page->title . ' ' : '') }}
	| 
@stop

@section('header')

    <!-- Header -->
    <header class="learn-header">
		
		@if($crumbs/* && Request::segment(0)*/)
		<div class="-row">
			<ol class="breadcrumb">
			@foreach($crumbs as $crumb)
				<li>{!! link_to('learn' . $crumb->path . $crumb->wid, $crumb->title, ["class"=>"crumb_parent crumb_" . (isset($i) ? ++$i : $i=0) ]) !!} </li>
			@endforeach      
			</ol>
		</div>
		@endif
		
        <!--h1>{!! $page->title !!}</h1-->
	
    </header>
	
@stop

@section('main')

    <section id="learn" class="content" data-product_id="{{ $page->id }}" data-payment_type="{{ $order ? $order->payment_type : 0 }}" data-order_id="{{ $order ? $order->id : 0 }}" data-user_id="{{ $user ? $user->id : 0 }}">
		<div class="container">

			
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2">
					
					<h5 class="breakfast_pretitle">Онлайн завтрак iTeam</h5>
					<h2 class="breakfast_title">{!! $page->title !!}</h2>
					
				</div>
			</div>
			
			<div class="row">
				<div class="box">
					<div class="col-lg-8 col-lg-offset-2">
					{!! HTML::shortCode($page->text) !!}
					</div>
				</div>
			</div>
			
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2">
					<hr>
					<center>
						<script type="text/javascript" src="//yastatic.net/es5-shims/0.0.2/es5-shims.min.js" charset="utf-8"></script><script type="text/javascript" src="//yastatic.net/share2/share.js" charset="utf-8"></script>
						<div class="ya-share2" data-services="vkontakte,facebook,twitter,gplus,lj,odnoklassniki,moimir,whatsapp,linkedin">&nbsp;</div>
					</center>
					<hr>
				</div>
			</div>

			<div class="row" style="margin-left: 15px">
				@if(count($marks) != 0)
					<div style="font-size: 14px">
						<div style="float: left;">
							<b>Метки:</b>
						</div>
						<div>
							<ul style="list-style-type: none">
								@foreach($marks as $mark)
									<li style="float: left; margin-left: 15px"><a href="{{ route('site.mark.get-list', ['id' => $mark->id_mark]) }}">{{ $mark->mark->name }}</a></li>
								@endforeach
							</ul>
						</div>
					</div>
				@endif
			</div>

		</div>
	</section>

	<!-- Modal -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document" id="form-review">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Спасибо за интерес, проявленный к нашим материалам!</h4>
					<p>Чтобы скачать презентацию, пожалуйста, оставьте отзыв:</p>
				</div>
				<div class="modal-body">
					<form id="form-send-review" action="{{ route('site.learn.send-review') }}" method="POST">
						{{ csrf_field() }}
						<input type="text" name="learn_id" value="{{ $page->id }}" class="hidden">
						<div>
							<textarea name="message" cols="30" rows="5" id="message" placeholder="  Ваш отзыв*" style="width: 100%; max-width: 568px;"></textarea>
							<p id="error_message" style="color: red"></p>
						</div>
						<div>
							<input type="text" name="name" id="name" placeholder="  ФИО*" style="width: 100%; margin-top: 10px;">
							<p id="error_name" style="color: red"></p>
						</div>
						<div>
							<input type="text" name="company" id="company" placeholder="  Представляете организацию" style="width: 100%; margin-top: 10px;">
							<p id="error_company" style="color: red"></p>
						</div>
						<div>
							<input type="text" name="position" id="position" placeholder="  Должность" style="width: 100%; margin-top: 10px;">
							<p id="error_position" style="color: red"></p>
						</div>
						<div style="display: inline-block; width: 100%">
							<input type="submit" id="send-button" class="btn" style="float: right; margin-top: 10px;">
						</div>
					</form>
				</div>
				<div class="modal-footer" style="text-align: left">
					<p>Нам очень важно ваше мнение, расскажите:</p>
					<ul>
						<li>
							Что оказалось самым полезным из материалов портала iTEAM?
						</li>
						<li>
							Что уже применили на практике?
						</li>
						<li>
							Самый интересный вебинар, который вы запомнили?
						</li>
					</ul>
				</div>
			</div>
		</div>

		<div class="modal-dialog" role="document" id="presentation" style="display: none">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Спасибо за ваше мнение!</h4>
					<p id="link">Немного терпения, презентация загрузится через… <span id="timer"> 60</span> сек.</p>
				</div>
				<div class="modal-body">
					Мы рады, что вы действительно интересуетесь этой темой, поэтому сегодня для вас есть <b>специальное предложение - мастер-классы со скидкой 50%:</b>
				</div>
				<div class="modal-footer" style="text-align: left">

				</div>
			</div>
		</div>
	</div>

@stop

@section('footer')

	<!-- modal.learn -->
	@include('c.modals.learn')
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
		$(document).ready(function () {
			$('#message').keyup(function () {
				if ($(this).val().length > 10 && $('#name').val().length > 3) {
					$('#send-button').addClass('btn-success');
				} else {
                    $('#send-button').removeClass('btn-success');
				}
            });

            $('#name').keyup(function () {
                if ($('#message').val().length > 10 && $(this).val().length > 3) {
                    $('#send-button').addClass('btn-success');
                } else {
                    $('#send-button').removeClass('btn-success');
				}
            });

            $('#send-button').click(function (e) {
                if ($('#message').val().length > 10 && $('#name').val().length > 3) {
                    e.preventDefault();
                    $.ajax({
                        method: "POST",
                        url: "{{ route('site.learn.send-review') }}",
						data: $('#form-send-review').serialize(),
                        success: function (request) {
                            if (request.message != undefined || request.name != undefined) {
                                if (request.message != undefined) {
                                    $('#error_message').empty();
                                    $('#error_message').append(request.message[0]);
                                } else {
                                    $('#error_message').empty();
                                }

                                if (request.name != undefined) {
                                    $('#error_name').empty();
                                    $('#error_name').append(request.name[0]);
                                } else {
                                    $('#error_name').empty();
                                }
							} else {
								$('#form-review').hide();
								$('#presentation').show();
								$('#presentation .modal-footer').append(request);

								function timerFunc() {
                                    var timer = $('#timer').html();
                                    $('#timer').html(timer - 1);
                                    if (timer <= 0) {
                                        $('#link').empty();
                                        $('#link').css({'margin-top': 30, 'text-align': 'center'});
                                        $('#link').html('<a href="https://iteam.ru/filemanager/userfiles/user0/content/statyi/Zrelost_prosessov_PPT.pdf" target="_blank"><button data-target="#myModal" data-toggle="modal" style="border: 0px; background: #fff" type="button"><img alt="Скачать презентацию" height="60" src="/filemanager/userfiles/user0/content/statyi/skachat_ppt_mini.png" width="236" /></button></a>');
									} else {
                                        setTimeout(timerFunc, 1000);
									}
								}

                                timerFunc();
							}
                        }
                    });
				} else {
                    e.preventDefault();
				}
            });

        });
	</script>

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