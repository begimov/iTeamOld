<!--div class="panel panel-default">
						  <div class="panel-body"-->

<div class="row">
	<div class="col-lg-12 tab-title text-center">
		<p class="lead">Проверьте Ваш заказ</p>
		{{--@if($order)--}}
		{{--<h4 class="alert alert-success">{{ $order->learn->title }}</h4>--}}
		{{--@endif--}}
	</div>

	<div class="col-lg-10 col-lg-offset-1" id="methods_pay">
		<div id="pay_screen_sberbank" class="row pay_screen payment_type-sberbank" style="{{ (@$order && $order->payment_type &&  $order->payment_type==='sberbank') ? 'display:block;' : 'display:none;' }}">
			<div class="row">
				<div class="col-lg-6 col-md-6">
					<p class="lead">Способ оплаты: <b>{{ HTML::paymentTypeText('sberbank') }}</b></p>
					<p><b>Шаг 1</b>. Пожалуйста, осуществите перевод с Вашей карты Сбербанка на карту № <b>639002389040808453</b> через Сбербанк.Онлайн или отделение банка</p>
					<p><b>Шаг 2</b>. Обязательно напишите нам на <b>info@iteam.ru</b>, указав данные платежа: дату и время, тип: перевод на карту Сбербанка, сумму и Ваше ФИО</p>
				</div>
				<div class="col-lg-6 col-md-6">
					@if(isset($order))
					{!! Form::model($order, ['route' => ['orders.update', $order->id], 'class' => '-validate -ajax']) !!}
						{!! Form::hidden('_method', 'PUT') !!}
						{!! Form::hidden('_redirect', ( @$_redirect ? $_redirect : route('orders.show',$order->id) ) ) !!}
						{!! Form::hidden('_step', 'sberbank') !!}
						{!! Form::hidden('payment_type', 'sberbank') !!}
						{!! Form::group('text', 'name', $errors, 'Ваше имя', Request::input('name') ? Request::input('name') : ($order->name ? $order->name : $order->user->firstname), 'user', null, ['placeholder'=>'Ваше имя','required']) !!}
						{!! Form::group('email', 'email', $errors, 'Ваш Email', null, 'envelope', null, ['placeholder'=>'Email','required']) !!}
						{!! Form::group('text', 'phone', $errors, 'Телефон', Request::input('phone') ? Request::input('phone') : ($order->phone ? $order->phone : $order->user->phone), 'phone-alt', null, ['placeholder'=>'Телефон','required']) !!}
						{!! Form::hidden('product_id', $order->product_id) !!}
						{!! Form::button('Выбрать этот способ', ['class'=>'btn btn-primary', 'type'=>'submit']) !!}
					{!! Form::close() !!}
					@endif
				</div>
			</div>
		</div>

		<div id="pay_screen_invoicing" class="row pay_screen payment_type-invoicing" style="{{ (@$order && $order->payment_type &&  $order->payment_type==='invoicing') ? 'display:block;' : 'display:none;' }}">
			<div class="row">
				<div class="col-lg-6 col-md-6">
					<p class="lead">Способ оплаты: <b>{{ HTML::paymentTypeText('invoicing') }}</b></p>
					<p>Мы Вышлем на Ваш E-Mail счёт для оплаты в электронном виде</p>
					<br>
					<p class="alert alert-warning"><a href="/company/offer" class="ajax-html" target="_blank"><b>Важно!</b> Прочитайте до того, как оплатить счёт</a></p>
				</div>
				<div class="col-lg-6 col-md-6">
					@if(isset($order))
					{!! Form::model($order, ['route' => ['orders.update', $order->id], 'class' => 'validate -ajax']) !!}
					{!! Form::hidden('_method', 'PUT') !!}
					{!! Form::hidden('_redirect', ( @$_redirect ? $_redirect : route('orders.show',$order->id) ) ) !!}
					{!! Form::hidden('_step', 'invoicing') !!}
					{!! Form::hidden('payment_type', 'invoicing') !!}
					{!! Form::group('text', 'entity_type', $errors, 'ОПФ (ИП/ООО/ЗАО и пр.)', (Request::input('entity_type') ? Request::input('entity_type') : ($order->entity_type ? $order->entity_type : $order->user->entity_type)), 'registration-mark', null, ['placeholder'=>'ИП/ООО/ЗАО/...','required']) !!}
					{!! Form::group('text', 'company_name', $errors, 'Название компании', (Request::input('company_name') ? Request::input('company_name') : ($order->company_name ? $order->company_name : $order->user->company_name)), 'barcode', null, ['placeholder'=>'Компания (название)','required']) !!}

					{!! Form::group('text', 'name', $errors, 'Ваше имя', Request::input('name') ? Request::input('name') : ($order->name ? $order->name : $order->user->firstname), 'user', null, ['placeholder'=>'Ваше имя','required']) !!}
					{!! Form::group('email', 'email', $errors, 'Ваш Email', null, 'envelope', null, ['placeholder'=>'Email','required']) !!}
					{!! Form::group('text', 'phone', $errors, 'Телефон', Request::input('phone') ? Request::input('phone') : ($order->phone ? $order->phone : $order->user->phone), 'phone-alt', null, ['placeholder'=>'Телефон','required']) !!}
					{!! Form::hidden('product_id', $order->product_id) !!}
					{!! Form::button('Получить', ['class'=>'btn btn-primary', 'type'=>'submit']) !!}
					{!! Form::close() !!}
					@endif
				</div>
			</div>
		</div>

		<div id="pay_screen_transfer" class="row pay_screen payment_type-transfer" style="{{ (@$order && $order->payment_type &&  $order->payment_type==='transfer') ? 'display:block;' : 'display:none;' }}">
			<div class="row">
				<div class="col-lg-6 col-md-6">
					<p class="lead">Способ оплаты: <b>{{ HTML::paymentTypeText('transfer') }}</b></p>
					<p><b>Шаг 1</b>. Пожалуйста, осуществите платеж в любой системе денежных переводов (Western Union, Золотая Корона и т.д.) на имя Ступаковой Марина Владиславовны (Stupakova Marina), г. Москва, +7-909-158-57-57</p>
					<p><b>Шаг 2</b>. Обязательно напишите нам на <b>info@iteam.ru</b>, указав данные платежа: дату и время, название системы, сумму и номер платежа</p>
				</div>
				<div class="col-lg-6 col-md-6">
					@if(isset($order))
					{!! Form::model($order, ['route' => ['orders.update', $order->id], 'class' => '-validate -ajax']) !!}
					{!! Form::hidden('_method', 'PUT') !!}
					{!! Form::hidden('_redirect', ( @$_redirect ? $_redirect : route('orders.show',$order->id) ) ) !!}
					{!! Form::hidden('_step', 'transfer') !!}
					{!! Form::hidden('payment_type', 'transfer') !!}
					{!! Form::group('text', 'name', $errors, 'Ваше имя', Request::input('name') ? Request::input('name') : ($order->name ? $order->name : $order->user->firstname), 'user', null, ['placeholder'=>'Ваше имя','required']) !!}
					{!! Form::group('email', 'email', $errors, 'Ваш Email', null, 'envelope', null, ['placeholder'=>'Email','required']) !!}
					{!! Form::group('text', 'phone', $errors, 'Телефон', Request::input('phone') ? Request::input('phone') : ($order->phone ? $order->phone : $order->user->phone), 'phone-alt', null, ['placeholder'=>'Телефон','required']) !!}
					{!! Form::hidden('product_id', $order->product_id) !!}
					{!! Form::button('Выбрать этот способ', ['class'=>'btn btn-primary', 'type'=>'submit']) !!}
					{!! Form::close() !!}
					@endif
				</div>
			</div>
		</div>

		<div id="pay_screen_paypal" class="row pay_screen payment_type-paypal" style="{{ (@$order && $order->payment_type &&  $order->payment_type==='paypal') ? 'display:block;' : 'display:none;' }}">
			<div class="row">
				<div class="col-lg-6 col-md-6">
					<p class="lead">Способ оплаты: <b>{{ HTML::paymentTypeText('paypal') }}</b></p>
					<p><b>Шаг 1</b>. Пожалуйста, войдите в Вашу учётную запись PayPal и осуществите перевод для <b>info@iteam.ru</b></p>
					<p><b>Шаг 2</b>. Обязательно напишите нам на <b>info@iteam.ru</b>, указав данные платежа: дату и время, название системы (paypal), сумму и номер платежа</p>
				</div>
				<div class="col-lg-6 col-md-6">
					@if(isset($order))
					{!! Form::model($order, ['route' => ['orders.update', $order->id], 'class' => '-validate -ajax']) !!}
					{!! Form::hidden('_method', 'PUT') !!}
					{!! Form::hidden('_redirect', ( @$_redirect ? $_redirect : route('orders.show',$order->id) ) ) !!}
					{!! Form::hidden('_step', 'paypal') !!}
					{!! Form::hidden('payment_type', 'paypal') !!}
					{!! Form::group('text', 'name', $errors, 'Ваше имя', Request::input('name') ? Request::input('name') : ($order->name ? $order->name : $order->user->firstname), 'user', null, ['placeholder'=>'Ваше имя','required']) !!}
					{!! Form::group('email', 'email', $errors, 'Ваш Email', null, 'envelope', null, ['placeholder'=>'Email','required']) !!}
					{!! Form::group('text', 'phone', $errors, 'Телефон', Request::input('phone') ? Request::input('phone') : ($order->phone ? $order->phone : $order->user->phone), 'phone-alt', null, ['placeholder'=>'Телефон','required']) !!}
					{!! Form::hidden('product_id', $order->product_id) !!}
					{!! Form::button('Выбрать этот способ', ['class'=>'btn btn-primary', 'type'=>'submit']) !!}
					{!! Form::close() !!}
					@endif
				</div>
			</div>
		</div>

		<div id="pay_screen_ya_ka" class="row pay_screen payment_type-ya_ka" style="{{ (@$order && $order->payment_type &&  $order->payment_type==='ya_ka') ? 'display:block;' : 'display:none;' }}">
			<div class="row">
				<div class="col-lg-6 col-md-6">
					<p title="{{ config('payments.email') }}" class="lead">Способ оплаты: <b>Оплата через Яндекс.Касса</b></p>
					<p>Вы будете перенаправлены на сайт Яндекс.Касса. <b>На сайте будут предоставлены самые популярные электронные системы платежей.</p>
				</div>
				<div class="col-lg-6 col-md-6">
					{{--<form method="POST"  action="https://money.yandex.ru/eshop.xml">--}}
						@if(isset($order))
						<form method="POST"  action="https://demomoney.yandex.ru/eshop.xml">
						<div class="form-group ">
							<label for="name" class="control-label">Ваше имя</label>
							<div class="input-group">
								<span class="input-group-addon"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></span>
								<input placeholder="Ваше имя" required="required" class="form-control" name="name" type="text" value="{{ isset(Auth::user()->name) ? Auth::user()->name : '' }}" id="name">
							</div>
						</div>
						<div class="form-group ">
							<label for="email" class="control-label">Email</label>
							<div class="input-group">
								<span class="input-group-addon"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span></span>
								<input placeholder="Email" required="required" class="form-control" name="cps_email" type="email" value="{{ isset(Auth::user()->email) ? Auth::user()->email : '' }}" id="email">
							</div>
						</div>
						<div class="form-group ">
							<label for="phone" class="control-label">Телефон</label>
							<div class="input-group">
								<span class="input-group-addon"><span class="glyphicon glyphicon-phone-alt" aria-hidden="true"></span></span>
								<input placeholder="Телефон" required="required" class="form-control" name="cps_phone" type="text" value="{{ isset(Auth::user()->phone) ? Auth::user()->phone : '' }}" id="phone">
							</div>
						</div>

						{{--<input name="shopId" value="{{ config('payments.yakassa_shopid') }}" type="hidden"/>--}}
						{{--<input name="scid" value="{{ config('payments.yakassa_scid') }}" type="hidden"/>--}}
						<input name="shopId" value="{{ config('payments.demo_yakassa_shopid') }}" type="hidden"/>
						<input name="scid" value="{{ config('payments.demo_yakassa_scid') }}" type="hidden"/>
						<input name="sum" value="{{ $order->sum }}" type="hidden">
						<input name="customerNumber" value="{{ $order->user_id }}" type="hidden"/>
						<input name="paymentType" value="" type="hidden"/>
						<input name="orderNumber" value="{{ $order->id }}" type="hidden"/>
						{{--<input name="cps_phone" value="{{ $order->phone }}" type="hidden"/>--}}
						{{--<input name="cps_email" value="{{ $order->email }}" type="hidden"/>--}}
						<button type="submit" class="btn btn-primary">Оплатить сейчас</button>
						@endif
					</form>
				</div>
			</div>
		</div>
	</div>
</div>