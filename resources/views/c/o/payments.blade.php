<div class="row">

	<div class="col-lg-12 tab-title text-center">
		<p class="lead">Выберите способ оплаты</p>
	</div>

	{{ Form::open(['route' => ( @$page ? 'orders.store' : ['orders.update', $order->product_id] )]) }}
	<div class="col-lg-6">
		<div class="list-group">
			<label href="#" class="payment-change label-button list-group-item {{ ($order && $order->payment_type === 'ya_ka') ? 'active' : '' }}">
				<input type="radio" name="payment_type" value="ya_ka" class="hidden" {{ ($order && $order->payment_type === 'ya_ka') ? 'checked' : '' }}>
				<span class="image-left"><img src="/img/visa_icon.png"></span>
				<h4 class="list-group-item-heading">Яндекс.Касса</h4>
				<p class="list-group-item-text">Оплатите онлайн через Яндекс.Касса</p>
			</label>
			<label href="#" class="hidden payment-change label-button list-group-item {{ ($order && $order->payment_type === 'ya_ac') ? 'active' : '' }}">
				<input type="radio" name="payment_type" value="ya_ac" class="hidden" {{ ($order && $order->payment_type === 'ya_ac') ? 'checked' : '' }}>
				<span class="image-left"><img src="/img/visa_icon.png"></span>
				<h4 class="list-group-item-heading">Банковская карта</h4>
				<p class="list-group-item-text">Оплатите онлайн картой VISA/MasterCard/Maestro с помощью Яндекса</p>
			</label>
			<label href="#" class="hidden payment-change label-button list-group-item {{ ($order && $order->payment_type === 'ya_pc') ? 'active' : '' }}">
				<input type="radio" name="payment_type" value="ya_pc" class="hidden" {{ ($order && $order->payment_type === 'ya_pc') ? 'checked' : '' }}>
				<span class="image-left"><img src="/img/yamoney_icon.png"></span>
				<h4 class="list-group-item-heading">Яндекс.Деньги</h4>
				<p class="list-group-item-text">Оплатите онлайн через Яндекс.Кошелёк</p>
			</label>
			<label href="#" class="payment-change label-button list-group-item {{ ($order && $order->payment_type === 'sberbank') ? 'active' : '' }}">
				<input type="radio" name="payment_type" value="sberbank" class="hidden" {{ ($order && $order->payment_type === 'sberbank') ? 'checked' : '' }}>
				<span class="image-left"><img src="/img/sberbank_icon.png"></span>
				<h4 class="list-group-item-heading">Перевод на карту Сбербанк</h4>
				<p class="list-group-item-text">Узнайте номер карты для перевода через Сбербанк.Онлайн или отделение банка</p>
			</label>
			<label href="#" class="payment-change label-button list-group-item {{ ($order && $order->payment_type === 'walletone') ? 'active' : '' }}">
				<input type="radio" name="payment_type" value="walletone" class="hidden" {{ ($order && $order->payment_type === 'walletone') ? 'checked' : '' }}>
				<span class="image-left"><img src="/img/visa_icon.png"></span>
				<h4 class="list-group-item-heading">walletone</h4>
				<p class="list-group-item-text">Оплатите онлайн через walletone</p>
			</label>
		</div>
	</div>

	<div class="col-lg-6">
		<div class="list-group">
			<label href="#" class="payment-change label-button list-group-item {{ ($order && $order->payment_type === 'invoicing') ? 'active' : '' }}">
				<input type="radio" name="payment_type" value="invoicing" class="hidden" {{ ($order && $order->payment_type === 'invoicing') ? 'checked' : '' }}>
				<span class="image-left"><img src="/img/invoicing_icon.png"></span>
				<h4 class="list-group-item-heading">Счёт на Юр. лицо</h4>
				<p class="list-group-item-text">Вы получите счёт в формате .pdf на Ваш Email-адрес (для компаний)</p>
			</label>
			<label href="#" class="payment-change label-button list-group-item {{ ($order && $order->payment_type === 'transfer') ? 'active' : '' }}">
				<input type="radio" name="payment_type" value="transfer" class="hidden" {{ ($order && $order->payment_type === 'transfer') ? 'checked' : '' }}>
				<span class="image-left"><img src="/img/transfer_icon.png"></span>
				<h4 class="list-group-item-heading">Денежный перевод</h4>
				<p class="list-group-item-text">Узнайте наши реквизиты для самостоятельного перевода</p>
			</label>
			<label href="#" class="payment-change label-button list-group-item {{ ($order && $order->payment_type === 'paypal') ? 'active' : '' }}">
				<input type="radio" name="payment_type" value="paypal" class="hidden"  {{ ($order && $order->payment_type === 'paypal') ? 'checked' : '' }}>
				<span class="image-left"><img src="/img/paypal_icon.png"></span>
				<h4 class="list-group-item-heading">PayPal</h4>
				<p class="list-group-item-text">Узнайте Email-адрес PayPal аккаунта для перевода</p>
			</label>
		</div>
	</div>

	@if($user)
		{{ Form::hidden('product_id',(@$page ? $page->id : $order->product_id)) }}
	@endif

	{{ Form::close() }}

</div>
