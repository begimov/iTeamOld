<div class="modal fade" id="payModal" tabindex="-1" role="dialog" aria-labelledby="payLabel">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title text-center" id="payLabel">Оформление заказа</h4>
			</div>
			<div class="modal-body">

				<!-- Nav tabs -->
				<ul id="paymentTabs" class="nav nav-tabs nav-justified" role="tablist">
					<li role="presentation" class="active"><a href="#payment_method" aria-controls="payment_method" role="tab" data-toggle="tab">Способ оплаты</a></li>
					
					@if(!$user)
					<li role="presentation" class="disabled"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Вход / Регистрация</a></li>
					@endif
					
					<li role="presentation" class="disabled"><a href="#checkout" aria-controls="checkout" role="tab" data-toggle="tab">Подтверждение</a></li>
				</ul>

				<!-- Tab panes -->
				<div class="tab-content">
					<div role="tabpanel" class="tab-pane active" id="payment_method">
						@include('c.o.payments')
					</div>
					
					@if(!$user)
					<div role="tabpanel" class="tab-pane" id="profile">
						@include('c.o.auth')
					</div>
					@endif
					
					<div role="tabpanel" class="tab-pane" id="checkout">
					@if($order)
						@include('c.o.confirms')
					@endif
					</div>
					
				</div>

			</div>
		</div>
	</div>
</div>