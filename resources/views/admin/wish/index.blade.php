@extends('admin.template')

@section('head')

	<link href="/a/vendors/bower_components/chosen/chosen.min.css" rel="stylesheet">
	<style>
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
	</style>

@stop

@section('main')

	<div class="block-header">
		<h2><i class="zmdi zmdi-card-giftcard"></i> {{ Request::input('search')!==null ? link_to_route('admin.wish.index','Желания') : 'Желания' }}</h2>
	</div>

	<div class="card">
		<div class="listview lv-bordered lv-lg">
			<div class="lv-header-alt clearfix">
				<h2 class="lvh-label hidden-xs"><i class="zmdi zmdi-card-giftcard"></i> Желания</h2>
				
				<form class="search">
				
				<div class="lvh-search">
					<input type="text" name="search" placeholder="Поиск по тексту, имени или email'у автора..." class="lvhs-input" value="{{ Request::input('search') ? Request::input('search') : '' }}" >
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
							<i class="zmdi zmdi-check-square"></i>
						</a>
			
						<ul class="dropdown-menu dropdown-menu-right">
							@foreach($publics AS $public_value => $public)
							<li>
								<a class="public {{ (null!==Request::input('public') && in_array($public,Request::input('public'))) ? 'bg-info' :'' }}">
									<label style="display:block;cursor:pointer;">
										<input type="checkbox" name="public[]" value="{{ $public_value }}" class="hidden" {{ (null!==Request::input('public') && in_array($public_value,Request::input('public'))) ? 'checked' : '' }}>
										{{ $public }}
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
							<i class="zmdi zmdi-calendar"></i>
						</a>
			
						<ul class="dropdown-menu dropdown-menu-right">
							
							@foreach($years AS $year)
							<li class="{{ (Request::input('year')==$year) ? 'active' : '' }}">
								<a href="#">
									<label for="year{{ $year }}" style="display:block;cursor:pointer;">
										<input type="radio" name="year" id="year{{ $year }}" class="hidden" value="{{ $year }}" {{ (Request::input('year')==$year) ? 'checked' : '' }}>
										{{ $year }}
									</label>
								</a>
							</li>
							@endforeach
							
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
					
				</ul>
				</form>
			</div>

			@include('admin.wish.loop')
			
			<div class="row">
				<div class="col-lg-12 text-center">
				{!! $links !!}
				</div>
			</div>
			
		</div>
	</div>
	
@stop

@section('scripts')
	
	<script src="/a/vendors/bower_components/chosen/chosen.jquery.min.js"></script>
		
	<script>
	
	$('form.search input[type="text"]').keyup(function(event){
		if (event.which == 13 || event.keyCode == 13){
			var form_search = $('form.search');
			form_search.submit();
		}
	});
	
	$('input[name="public[]"]').change(function(){
		var _this = $(this), _a = _this.parent('label').parent('a');
		if(_this.is(':checked')) _a.addClass('bg-info');
		else _a.removeClass('bg-info');
	});
	
	$('input[name="year"]').change(function(){
		$('form.search').submit();
	});
	
	$('input[name="order_by"]').change(function(){
		$('input[name="sort_by"]').prop('checked',false);
		$(this).parent('label').next('input[name="sort_by"]').prop('checked',true);
		$('form.search').submit();
	});
	
	</script>

@stop