@extends('admin.template')

@section('head')

	{!! HTML::style('ckeditor/plugins/codesnippet/lib/highlight/styles/default.css') !!}
	<link href="/a/vendors/bower_components/bootstrap-select/dist/css/bootstrap-select.css" rel="stylesheet">
	<link href="/a/vendors/bower_components/chosen/chosen.min.css" rel="stylesheet">
	<style>
	.chosen-container-single .chosen-single {
		padding: 6px 0px 0px 8px;
		height: auto;
	}
	.choselect + .chosen-container-multi .chosen-choices li.search-choice .search-choice-close:before {
		display:none;
	}
	.choselect + .chosen-container-multi .chosen-choices {
		padding: 0;
		min-height: 34px;
		background: none;
		border: 0 none;
		border-bottom: 1px solid #e0e0e0;
		box-shadow: none;
	}
	.choselect + .chosen-container-multi .chosen-choices li.search-choice {
		border-radius: 0 !important;
		background: none;
		background-color: #e0e0e0;
	}
	.choselect + .chosen-container-multi .chosen-choices li.search-field input[type=text] {
		height: 34px;
		margin: 0;
	}
	.choselect + .chosen-container-single .chosen-search:before {
		content: "";
	}
	.choselect + .chosen-container .chosen-results li.result-selected:before {
		right: 4px;
		top: 4px;
	}
	.autocomplete-suggestion {
		padding: 8px;
		background: #fefefe;
		border: 1px solid #ccc;
		font-size: 1em;
		overflow: hidden;
	}
	.autocomplete-suggestion:hover {
		background: #efefef;
		cursor: pointer;
	}
	</style>

@stop

@section('main')
	
	<div class="block-header">
		
		<h2><i class="zmdi zmdi-shopping-cart"></i> {{ link_to_route('admin.order.index','Заказы') }} &rarr; {{ $order->created_at . ' ' . $order->email . ' ' . $order->learn->title }}</h2>

	
		<ul class="actions">

		</ul>
	
	</div>
					
	<div class="card">
		<div class="card-body card-padding">
		
			  
				{!! Form::model($order, ['route' => ['admin.order.update',$order->id], 'class' => '']) !!}
					
					{!! Form::hidden('_method','PUT') !!}
						
						<div class="row">
							
							{{--<div class="col-sm-4">--}}
								{{--<label for="product_id">--}}
								{{--Продукт--}}
								{{--</label>--}}
								{{--<select id="product_id" name="product_id" class="choselect" data-placeholder="Выберите продукт...">--}}
									{{--@if($learns)--}}
										{{--@foreach($learns AS $learn)--}}
										{{--<option {{ $order->product_id===$learn->id ? 'selected' : '' }} value="{{ $learn->id }}">{{ $learn->title . ' [' . $learn->price . ']'  }}</option>--}}
										{{--@endforeach--}}
									{{--@endif--}}
								{{--</select>--}}
							{{--</div>--}}
							
							<div class="col-sm-4">
								<label for="payment_type">
								Тип оплаты
								</label>
								<br>
								<select id="payment_type" name="payment_type" class="selectpicker">
									@foreach($payment_types AS $payment_type)
									<option {{ ($order->payment_type===$payment_type)  ? 'selected' : '' }} value="{{ $payment_type }}">{{ HTML::paymentTypeText($payment_type) }}</option>
									@endforeach
								</select>
							</div>
							
							<div class="col-sm-4">
								<label for="status">
								Статус оплаты
								</label>
								<br>
								<select id="status" name="status" class="selectpicker">
									@foreach($statuses AS $status)
									<option {{ $order->status===$status ? 'selected' : '' }} value="{{ $status }}">{{ HTML::orderStatusText($status) }}</option>
									@endforeach
								</select>
							</div>
							
						</div>
						<br>
						
						<div class="row">
							
							<div class="col-sm-4">
								{!! Form::control('text', 0, 'email', $errors, 'Email', null, null, 'Email', ["disabled"=>"disabled"]) !!}
								{!! Form::hidden('user_id',$order->user_id) !!}
							</div>
									
							<div class="col-sm-4">
								{!! Form::control('text', 0, 'name', $errors, 'Имя пользователя', null, null, 'Имя пользователя') !!}
							</div>
							<div class="col-sm-4">
								{!! Form::control('text', 0, 'phone', $errors, 'Телефон', null, null, 'Телефон') !!}
							</div>
							
						</div>
						<br>
						
						<div class="row">
							<div class="col-sm-2 thro-invoicing" style="{{ ($order->payment_type==='invoicing') ? '' : 'visibility:hidden;' }}">
								{!! Form::control('text', 0, 'entity_type', $errors, 'ОПФ', null, null, 'ООО, ИП, ЗАО и пр') !!}
							</div>
							<div class="col-sm-6 thro-invoicing" style="{{ ($order->payment_type==='invoicing') ? '' : 'visibility:hidden;' }}">
								{!! Form::control('text', 0, 'company_name', $errors, 'Компания', null, null, 'Название Компании') !!}
							</div>
							<div class="col-sm-4 thro-invoicing" style="{{ ($order->payment_type==='invoicing') ? '' : 'visibility:hidden;' }}">
								@if($order->payment_type==="invoicing")
								<span class="pull-left">
								<a class="btn-link before-glyphicon glyphicon-pushpin" target="_blank" href="/filemanager/userfiles/user{{ $order->user_id  }}/invoice/{{ md5( $order->email . $order->id ) }}.pdf">Счёт</a>
								</span>
								@endif
							</div>
						</div>

						<div class="row">
							<div class="col-sm-1">
								<div class="fg-line form-group">
									<label for="name" class="control-label">Цена</label>
									{{ $order->sum }}"
								</div>
							</div>
							<div class="col-sm-2">
								<div class="fg-line form-group">
									<label for="name" class="control-label">Фактическая цена</label>
									@if($order->fact_sum != 0)
										<input class="form-control" name="fact_sum" type="text" value="{{ $order->fact_sum }}">
									@else
										<input class="form-control" name="fact_sum" type="text" value="{{ $order->sum }}">
									@endif
								</div>
							</div>
							<div class="col-sm-9">
								<div class="fg-line form-group">
									<label for="name" class="control-label">Комментарий</label>
									<input class="form-control" name="description" type="text" value="{{ $order->description }}">
								</div>
							</div>
						</div>
						
						<div class="row">
							<div class="col-sm-12">
								{!! Form::submit('Сохранить', ['','btn btn-lg btn-primary btn-no-waves']) !!}
							</div>
						</div>
						
						
				{!! Form::close() !!}
				
			
		</div>
	</div>

	
@stop

@section('scripts')

	
	<script src="/a/vendors/bower_components/typeahead.js/dist/typeahead.bundle.min.js"></script>
	<script src="/a/vendors/bower_components/bootstrap-select/dist/js/bootstrap-select.js"></script>
	<script src="/a/vendors/bower_components/chosen/chosen.jquery.min.js"></script>

    <script src="/js/main.js"></script>
	
    <script src="/a/vendors/fileinput/fileinput.min.js"></script>
	
	<script src="/js/vendor/jquery.autocomplete.js"></script>
	<script>
		
		(function($){
			
			function validateEmail(email) {
				var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
				return re.test(email);
			}
			
			var _token = $('meta[name="_token"]').attr('content');
			$.ajaxSetup({
				headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') }
			});
			
			
			var _form = $('form');
						
			$('[name="payment_type"]',_form).on('change',function(){
				if($(this).val()=='invoicing') $('.thro-invoicing').css({'visibility':'visible'}).find('input').attr('required','required');
				else $('.thro-invoicing').css({'visibility':'hidden'}).find('input').removeAttr('required');
			}).on('blur',function(){
				if($(this).val()=='invoicing') $('.thro-invoicing').css({'visibility':'visible'});
				else $('.thro-invoicing').css({'visibility':'hidden'}).find('input').removeAttr('required');
			});

			
		
		})(jQuery);
			
	</script>

@stop