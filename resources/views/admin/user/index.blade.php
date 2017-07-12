@extends('admin.template')

@section('main')

	<div class="-hidden block-header">
		<h2><i class="zmdi zmdi-accounts-alt"></i> {{ Request::input('search')||Request::input('daterange') ? link_to_route('admin.user.index','Пользователи') : 'Пользователи' }}</h2>
	</div>

	<div class="card">
		<div class="listview lv-bordered lv-lg">
			<div class="lv-header-alt clearfix">
				<h2 class="lvh-label hidden-xs"><i class="zmdi zmdi-accounts-alt"></i> Пользователи</h2>
				
				<form class="search">
				<div class="lvh-search">
				
					<input type="text" name="search" placeholder="Поиск по email, телефону, имени, компании..." class="lvhs-input" value="{{ Request::input('search') ? Request::input('search') : '' }}" >

					<i class="lvh-search-close">&times;</i>
				</div>
				
				<ul class="lv-actions actions">
					<li>
						<a href="" class="lvh-search-trigger">
							<i class="zmdi zmdi-search"></i>
						</a>
					</li>
					
					<li class="dropdown">
						<a href="" data-toggle="dropdown" aria-expanded="true">
							<i class="zmdi zmdi-time"></i>
						</a>
			
						<div class="dropdown-menu dropdown-menu-right" style="padding:20px;">
							
							<input type="text" name="daterange" value="{{ Request::input('daterange') ? Request::input('daterange') : date('d.m.Y', strtotime('-3 year')) .' - '. date('d.m.Y') }}" placeholder="дд.мм.гггг - дд.мм.гггг">
							
						</div>
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
					
					<li class="dropdown hidden">
						<a href="" data-toggle="dropdown" aria-expanded="true">
							<i class="zmdi zmdi-more-vert"></i>
						</a>
			
						<ul class="dropdown-menu dropdown-menu-right">
							
							
						</ul>
					</li>
				</ul>
				</form>
			</div>

			@include('admin.user.loop')
			
			<div class="row">
				<div class="col-lg-12 text-center">
				{!! $links !!}
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
	$('input[name="daterange"]').daterangepicker({
		locale: {
		  format: 'DD.MM.YYYY',
		  applyLabel: 'Готово',
		  cancelLabel: 'Отмена'
		},
		opens: 'left'
	})
	.change(function(event){
		var form_search = $('form.search');
		form_search.submit();
	});
	
	$('input[name="search"]').keyup(function(event){
		if (event.which == 13 || event.keyCode == 13){
			var form_search = $('form.search');
			form_search.submit();
		}
	});

	
	$('input[name="order_by"]').change(function(){
		$('input[name="sort_by"]').prop('checked',false);
		$(this).parent('label').next('input[name="sort_by"]').prop('checked',true);
		$('form.search').submit();
	});
	
	</script>

@stop