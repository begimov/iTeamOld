<!--div class="panel panel-default">
						  <div class="panel-body"-->

<div class="row">
	<div class="col-lg-12 tab-title text-center">
		<p class="lead">Проверьте Ваш заказ</p>
		@if($order)
		<h4 class="alert alert-success">{{ $order->learn->title }}</h4>
		@endif
	</div>

	<div class="col-lg-10 col-lg-offset-1">
		
		<div id="pay_screen_ya_ac" class="pay_screen payment_type-ya_ac" style="{{ (@$order && $order->payment_type &&  $order->payment_type==='ya_ac') ? 'display:block;' : 'display:none;' }}">
			<p title="{{ config('payments.email') }}" class="lead">Способ оплаты: <b>{{ HTML::paymentTypeText('ya_ac') }}</b></p>
			<p>Вы будете перенаправлены на сайт Яндекс.Денег для безопасного ввода данных Вашей банковской карты.</p>
			<p>Вы можете использовать карту <b>VISA или MasterCard</b>, если для нее включена защита <b>3-D Secure</b>.</p>
			
			<form method="POST" class="ajax-update-order-yandex" action="https://money.yandex.ru/quickpay/confirm.xml">
				<input type="hidden" name="receiver" value="{{ config('payments.yamoney_id') }}"> 
				<input type="hidden" name="formcomment" value="Мастер-проекты iTeam{{ $order->sum<15000 ? '' : ' (оплата со скидкой)' }}"> 
				<input type="hidden" name="short-dest" value="{{ $order->learn->title }}"> 
				<input type="hidden" name="label" value="{{ $order->id }}"> 
				<input type="hidden" name="quickpay-form" value="shop"> 
				<input type="hidden" name="targets" value="Заказ {{ $order->id }}"> 
				<input type="hidden" name="sum" value="{{ $order->sum<15000 ? $order->sum : '15000.00' }}" data-type="number"> 
				<input type="hidden" name="comment" value="Заказ №{{ $order->id }}. Спасибо, что выбрали iTeam!"> 
				<input type="hidden" name="successURL" value="{{ 'https://iteam.ru/i/order/'.$order->id }}?from=ya_ac"> 
				<input type="hidden" name="paymentType" value="AC">
				<button type="submit" class="btn btn-primary">Оплатить сейчас</button>
			</form>
		</div>
		
		<div id="pay_screen_ya_pc" class="pay_screen payment_type-ya_pc" style="{{ (@$order && $order->payment_type &&  $order->payment_type==='ya_pc') ? 'display:block;' : 'display:none;' }}">
			<p class="lead">Способ оплаты: <b>{{ HTML::paymentTypeText('ya_pc') }}</b></p>
			<p>Вы будете перенаправлены на сайт Яндекс.Денег для оплаты с Вашего Я.Кошелька.</p> 
			<p>Вам понадобиться только платёжный пароль Яндекс.Денег или подтверждение по СМС.</p>
			
			<form method="POST" class="ajax-update-order-yandex" action="https://money.yandex.ru/quickpay/confirm.xml">
				<input type="hidden" name="receiver" value="{{ config('payments.yamoney_id') }}"> 
				<input type="hidden" name="formcomment" value="Мастер-проекты iTeam{{ $order->sum<14920 ? '' : ' (оплата со скидкой)' }}"> 
				<input type="hidden" name="short-dest" value="{{ $order->learn->title }}"> 
				<input type="hidden" name="label" value="{{ $order->id }}"> 
				<input type="hidden" name="quickpay-form" value="shop"> 
				<input type="hidden" name="targets" value="Заказ {{ $order->id }}"> 
				<input type="hidden" name="sum" value="{{ $order->sum<14920 ? $order->sum : '14920.00' }}" data-type="number"> 
				<input type="hidden" name="comment" value="Заказ №{{ $order->id }}. Спасибо, что выбрали iTeam!"> 
				<input type="hidden" name="successURL" value="{{ 'https://iteam.ru/i/order/'.$order->id }}?from=ya_pc"> 
				<input type="hidden" name="paymentType" value="PC">
				<button type="submit" class="btn btn-primary">Оплатить сейчас</button>
			</form>
		</div>
		
		<div id="pay_screen_sberbank" class="pay_screen payment_type-sberbank" style="{{ (@$order && $order->payment_type &&  $order->payment_type==='sberbank') ? 'display:block;' : 'display:none;' }}">
			<p class="lead">Способ оплаты: <b>{{ HTML::paymentTypeText('sberbank') }}</b></p>
			<p><b>Шаг 1</b>. Пожалуйста, осуществите перевод с Вашей карты Сбербанка на карту № <b>639002389040808453</b> (на имя Ступаковой Марины Владиславовны) через Сбербанк.Онлайн или отделение банка</p>
			<p><b>Шаг 2</b>. Обязательно напишите нам на адрес <b>info@iteam.ru</b>, указав номер и Ваши имя и фамилию</p>

			{!! Form::model($order, ['route' => ['orders.update', $order->id], 'class' => '-validate -ajax']) !!}
				{!! Form::hidden('_method', 'PUT') !!}
				{!! Form::hidden('_redirect', ( @$_redirect ? $_redirect : route('orders.show',$order->id) ) ) !!}
				{!! Form::hidden('_step', 'sberbank') !!}
				{!! Form::hidden('payment_type', 'sberbank') !!}
				{!! Form::hidden('product_id', $order->product_id) !!}
				{!! Form::button('Выбрать этот способ', ['class'=>'btn btn-primary', 'type'=>'submit']) !!}
			{!! Form::close() !!}
		</div>
		
		<div id="pay_screen_invoicing" class="pay_screen payment_type-invoicing" style="{{ (@$order && $order->payment_type &&  $order->payment_type==='invoicing') ? 'display:block;' : 'display:none;' }}">
			<p class="lead">Способ оплаты: <b>{{ HTML::paymentTypeText('invoicing') }}</b></p>
			<p>Мы Вышлем на Ваш E-Mail счёт для оплаты в электронном виде</p>

			{!! Form::model($order, ['route' => ['orders.update', $order->id], 'class' => 'validate -ajax']) !!}
				{!! Form::hidden('_method', 'PUT') !!}
				{!! Form::hidden('_redirect', ( @$_redirect ? $_redirect : route('orders.show',$order->id) ) ) !!}
				{!! Form::hidden('_step', 'invoicing') !!}
				{!! Form::hidden('payment_type', 'invoicing') !!}
				{!! Form::group('email', 'email', $errors, 'Ваш Email', null, 'envelope', null, ['placeholder'=>'Email','required']) !!}
				{!! Form::group('text', 'entity_type', $errors, 'ОПФ (ИП/ООО/ЗАО и пр.)', null, 'registration-mark', null, ['placeholder'=>'ИП/ООО/ЗАО/...','required']) !!}
				{!! Form::group('text', 'company_name', $errors, 'Название компании', null, 'barcode', null, ['placeholder'=>'Компания (название)','required']) !!}
				{!! Form::hidden('product_id', $order->product_id) !!}
				{!! Form::button('Получить', ['class'=>'btn btn-primary', 'type'=>'submit']) !!}
			{!! Form::close() !!}
			<br>
			<p class="alert alert-warning"><a href="/company/offer" class="ajax-html" target="_blank"><b>Важно!</b> Прочитайте до того, как оплатить счёт</a></p>
		</div>
		
		<div id="pay_screen_transfer" class="pay_screen payment_type-transfer" style="{{ (@$order && $order->payment_type &&  $order->payment_type==='transfer') ? 'display:block;' : 'display:none;' }}">
			<p class="lead">Способ оплаты: <b>{{ HTML::paymentTypeText('transfer') }}</b></p>
			<p><b>Шаг 1</b>. Пожалуйста, осуществите платеж в любой системе денежных переводов (Western Union, Золотая Корона и т.д.) на имя Ступаковой Марина Владиславовны (Stupakova Marina), г. Москва, +7-909-158-57-57</p>
			<p><b>Шаг 2</b>. Обязательно напишите нам на <b>info@iteam.ru</b>, указав данные платежа: дату и время, название системы, сумму и номер платежа</p>
			
			{!! Form::model($order, ['route' => ['orders.update', $order->id], 'class' => '-validate -ajax']) !!}
				{!! Form::hidden('_method', 'PUT') !!}
				{!! Form::hidden('_redirect', ( @$_redirect ? $_redirect : route('orders.show',$order->id) ) ) !!}
				{!! Form::hidden('_step', 'transfer') !!}
				{!! Form::hidden('payment_type', 'transfer') !!}
				{!! Form::hidden('product_id', $order->product_id) !!}
				{!! Form::button('Выбрать этот способ', ['class'=>'btn btn-primary', 'type'=>'submit']) !!}
			{!! Form::close() !!}
		</div>
		
		<div id="pay_screen_paypal" class="pay_screen payment_type-paypal" style="{{ (@$order && $order->payment_type &&  $order->payment_type==='paypal') ? 'display:block;' : 'display:none;' }}">
			<p class="lead">Способ оплаты: <b>{{ HTML::paymentTypeText('paypal') }}</b></p>
			<p><b>Шаг 1</b>. Пожалуйста, войдите в Вашу учётную запись PayPal и осуществите перевод для <b>info@iteam.ru</b></p>
			<p><b>Шаг 2</b>. Обязательно напишите нам на <b>info@iteam.ru</b>, указав данные платежа: дату и время, название системы (paypal), сумму и номер платежа</p>

			{!! Form::model($order, ['route' => ['orders.update', $order->id], 'class' => '-validate -ajax']) !!}
				{!! Form::hidden('_method', 'PUT') !!}
				{!! Form::hidden('_redirect', ( @$_redirect ? $_redirect : route('orders.show',$order->id) ) ) !!}
				{!! Form::hidden('_step', 'paypal') !!}
				{!! Form::hidden('payment_type', 'paypal') !!}
				{!! Form::hidden('product_id', $order->product_id) !!}
				{!! Form::button('Выбрать этот способ', ['class'=>'btn btn-primary', 'type'=>'submit']) !!}
			{!! Form::close() !!}
		</div>
		
  </div>
</div>