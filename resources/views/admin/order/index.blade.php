@extends('admin.template')

@section('main')

	<div class="block-header">
		<h2><i class="zmdi zmdi-shopping-cart"></i> {{ Request::input('search')||Request::input('daterange') ? link_to_route('admin.order.index','Заказы') : 'Заказы' }}</h2>
	</div>

	<div class="card">
		<div class="listview lv-bordered lv-lg">
			<button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">
				Excel
			</button>
			<div class="lv-header-alt clearfix">
				<h2 class="lvh-label hidden-xs" title="">
					<i class="zmdi zmdi-shopping-cart"></i> Заказы:
					@if($orders)
					{{ $orders->count() . ' на странице на сумму ' . $orders->sum('sum') . '; период поиска: ' . ($daterange = Request::input('daterange') ? Request::input('daterange') : date('d.m.Y', strtotime('-3 year')) .' - '. date('d.m.Y')) }}
					@endif
				</h2>
				<form class="search">
				<div class="lvh-search">
					<input type="text" name="search" placeholder="Поиск по email или Названию компании..." class="lvhs-input" value="{{ Request::input('search') ? Request::input('search') : '' }}" >
					<i class="lvh-search-close">&times;</i>
				</div>
				
				<ul class="lv-actions actions">
					<li>
						<a href="" class="lvh-search-trigger">
							<i class="zmdi zmdi-search"></i>
						</a>
					</li>
					
					<li>
						<a id="label_daterange"><i class="zmdi zmdi-time"></i></a>
						<input type="text" style="width:0px;border:0 none;opacity:0;" name="daterange" value="{{ Request::input('daterange') ? Request::input('daterange') : date('d.m.Y', strtotime('-3 year')) .' - '. date('d.m.Y') }}" placeholder="дд.мм.гггг - дд.мм.гггг">
					</li>
					
					<li class="dropdown">
						<a href="" data-toggle="dropdown" aria-expanded="true">
							<i class="zmdi zmdi-graduation-cap"></i>
						</a>
			
						<div class="dropdown-menu dropdown-menu-right" style="padding:20px;min-width:320px;">
						
							<div class="input-group">
								<div class="fg-line">
									<input type="text" class="form-control" name="title" value="{{ Request::input('title') ? Request::input('title') : '' }}" placeholder="Мастер-проект/мастер-класс">
								</div>
								<span class="input-group-addon last"><button class="input-group-addon" type="submit"><i class="zmdi zmdi-search"></i></button></span>
							</div>
							
						</div>
					</li>
					
					<li class="dropdown">
						<a href="" data-toggle="dropdown" aria-expanded="true">
							<i class="zmdi zmdi-balance-wallet"></i>
						</a>
			
						<ul class="dropdown-menu dropdown-menu-right">
							<li>
								<a class="payment_type {{ (null===Request::input('payment_type') || Request::input('payment_type')==="") ? 'bg-info' :'' }}">
									<label style="display:block;cursor:pointer;">
										<input type="radio" name="payment_type" value="" class="hidden" {{ (null===Request::input('payment_type') || Request::input('payment_type')==="") ? 'checked' : '' }}>
										Любой тип оплаты
									</label>
								</a>
							</li>
							@foreach($payment_types AS $payment_type)
							<li>
								<a class="payment_type {{ (null!==Request::input('payment_type') && Request::input('payment_type')!=="" && (int)Request::input('payment_type')===$payment_type) ? 'bg-info' :'' }}">
									<label style="display:block;cursor:pointer;">
										<input type="radio" name="payment_type" value="{{ $payment_type }}" class="hidden" {{ (null!==Request::input('payment_type') && Request::input('payment_type')!=="" && (int)Request::input('payment_type')===$payment_type) ? 'checked' : '' }}>
										{{ HTML::paymentTypeText($payment_type) }}
									</label>
								</a>
							</li>
							@endforeach							
						</ul>
					</li>
					
					<li class="dropdown">
						<a href="" data-toggle="dropdown" aria-expanded="true">
							<i class="zmdi zmdi-check-square"></i>
						</a>
			
						<ul class="dropdown-menu dropdown-menu-right">
							<!--li>
								<a class="status {{ (null===Request::input('status') || Request::input('status')==="") ? 'bg-info' :'' }}">
									<label style="display:block;cursor:pointer;">
										<input type="checkbox" name="status[]" value="" class="hidden" {{ (null===Request::input('status')) ? 'checked' : '' }}>
										Любой статус
									</label>
								</a>
							</li-->
							@foreach($statuses AS $status)
							<li>
								<a class="status {{ (null!==Request::input('status') && in_array($status,Request::input('status'))) ? 'bg-info' :'' }}">
									<label style="display:block;cursor:pointer;">
										<input type="checkbox" name="status[]" value="{{ $status }}" class="hidden" {{ (null!==Request::input('status') && in_array($status,Request::input('status'))) ? 'checked' : '' }}>
										{{ HTML::orderStatusText($status) }}
									</label>
								</a>
							</li>
							@endforeach
							<li>
								<div style="padding:8px 17px;"><button class="btn btn-xs btn-success pull-right" type="submit">Применить</button></div>
							</li>					
						</ul>
					</li>
					
					<li class="dropdown">
						<a href="" data-toggle="dropdown" aria-expanded="true">
							<i class="zmdi zmdi-sort"></i>
						</a>
			
						<ul class="dropdown-menu dropdown-menu-right">
							
							@foreach($order_by AS $order_by_name => $order_by_value)
							<li>
								<a class="order_by sort_by {{ (Request::input('sort_by')=='asc' && Request::input('order_by')==$order_by_value) ? 'bg-info' :'' }}">
									<label for="order_by_{{ $order_by_value }}_asc" style="display:block;cursor:pointer;">
										<input type="radio" name="order_by" id="order_by_{{ $order_by_value }}_asc" value="{{ $order_by_value }}" class="hidden" {{ (Request::input('sort_by')=='asc' && Request::input('order_by')==$order_by_value) ? 'checked' : '' }}>
										{{ $order_by_name }} &#9650;
									</label>
									<input type="radio" name="sort_by" value="asc" class="hidden" {{ (Request::input('sort_by')=='asc' && Request::input('order_by')==$order_by_value) ? 'checked' : '' }}>
								</a>
							</li>
							<li>
								<a class="order_by sort_by {{ (Request::input('sort_by')=='desc' && Request::input('order_by')==$order_by_value) ? 'bg-info' :'' }}">
									<label for="order_by_{{ $order_by_value }}_desc" style="display:block;cursor:pointer;">
										<input type="radio" name="order_by" id="order_by_{{ $order_by_value }}_desc" value="{{ $order_by_value }}" class="hidden" {{ (Request::input('sort_by')=='desc' && Request::input('order_by')==$order_by_value) ? 'checked' : '' }}>
										{{ $order_by_name }} &#9660;
									</label>
									<input type="radio" name="sort_by" value="desc" class="hidden" {{ (Request::input('sort_by')=='desc' && Request::input('order_by')==$order_by_value) ? 'checked' : '' }}>
								</a>
							</li>
							@endforeach
							
						</ul>
					</li>
					
					<li class="dropdown">
						<a href="" data-toggle="dropdown" aria-expanded="true">
							<i class="zmdi zmdi-settings"></i>
						</a>
			
						<ul class="dropdown-menu dropdown-menu-right">
						
							@foreach([5,10,50,100] AS $take)
							<li>
								<a class="take {{ (($take===50 && (null===Request::input('take') || !Request::input('take'))) || (int)Request::input('take')===$take) ? 'bg-info' :'' }}">
									<label style="display:block;cursor:pointer;">
										<input type="radio" name="take" value="{{ $take }}" class="hidden" {{ (null!==Request::input('take') && Request::input('take')!=="" && (int)Request::input('take')===$take) ? 'checked' : '' }}>
										по {{ $take }} на стр.
									</label>
								</a>
							</li>
							@endforeach	
							
						</ul>
					</li>
					
				</ul>
				</form>
			</div>

			@include('admin.order.loop')
			
			<div class="row">
				<div class="col-lg-12 text-center">
				{!! $links !!}
				</div>
			</div>
			
		</div>
	</div>

	<!-- Modal -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Получить excel документ с данными о заказах</h4>
				</div>
				<div class="modal-body">
					<form action="{{ route('admin.order.exceldate') }}" method="GET">
						<div class="form-group">
							<label for="exampleInputEmail1">От</label>
							<input type="date" name="from" class="form-control">
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">До</label>
							<input type="date" name="before" class="form-control">
						</div>
						<button type="submit" class="btn btn-default">Получить</button>
					</form>
				</div>
			</div>
		</div>
	</div>
	
@stop

@section('scripts')

	<script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
	<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
	<script>
	
	//$('form.search').submit(function(){});
	$('#label_daterange').on('click',function(e){
		$('input[name="daterange"]').click();
		e.preventDefault();
		return false;
	});
	
	$('input[name="daterange"]').daterangepicker({
		locale: {
		  format: 'DD.MM.YYYY',
		  applyLabel: 'Готово',
		  cancelLabel: 'Отмена'
		},
		opens: 'left',
		ranges: {
           'Сегодня': [moment(), moment()],
           'Вчера': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
           'Последние 7 дн': [moment().subtract(6, 'days'), moment()],
           'Последние 30 дн': [moment().subtract(29, 'days'), moment()],
           'Текущий месяц': [moment().startOf('month'), moment().endOf('month')],
           'Прошлый месяц': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
           'Текущий год': [moment().startOf('year'), moment().endOf('year')],
           'Прошлый год': [moment().subtract(1, 'year').startOf('year'), moment().subtract(1, 'year').endOf('year')]
        },
		showCustomRangeLabel: false,
		alwaysShowCalendars: true
	})
	.change(function(event){
		var form_search = $('form.search');
		form_search.submit();
	});
	
	$('form.search input[type="text"]').keyup(function(event){
		if (event.which == 13 || event.keyCode == 13){
			var form_search = $('form.search');
			form_search.submit();
		}
	}).blur(function(){
		$('form.search').submit();
	});
	$('input[name="payment_type"],input[name="take"]').change(function(){
		$('form.search').submit();
	});
	$('input[name="status[]"]').change(function(){
		var _this = $(this), _a = _this.parent('label').parent('a');
		if(_this.is(':checked')) _a.addClass('bg-info');
		else _a.removeClass('bg-info');
		//_a.toggleClass('bg-info');
	});
	$('input[name="order_by"]').change(function(){
		$('input[name="sort_by"]').prop('checked',false);
		$(this).parent('label').next('input[name="sort_by"]').prop('checked',true);
		$('form.search').submit();
	});
	
	</script>

@stop