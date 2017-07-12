@extends('site.template')

@section('title')
	{{ $page->meta_title ? $page->meta_title . ' ' : ($page->title ? $page->title . ' ' : '') }}
	| 
@stop

@section('header')

    <!-- Header -->
    <header class="-learn-header -hidden">

		<h1 class="text-center">{!! $page->title !!}</h1>
	
    </header>
	
@stop

@section('main')

    <section id="product_home_content" class="content">
		<div class="container">
			
			<div class="row">
				<div class="col-lg-12 hidden">
					
				{!! HTML::shortCode($page->text) !!}
				
				</div>
				
				<div class="col-lg-8 col-lg-offset-2">
					<!-- Nav tabs -->
					<ul class="nav nav-pills nav-justified" role="tablist">
						<li role="presentation" class="active"><a href="#types" aria-controls="types" role="tab" data-toggle="pill">По типу</a></li>
						<li role="presentation"><a href="#categories" aria-controls="categories" role="tab" data-toggle="pill">По категориям</a></li>
						<li role="presentation"><a href="#keywords" aria-controls="keywords" role="tab" data-toggle="pill">По ключевым словам</a></li>
					</ul>

				</div>
				
				<div class="col-lg-12">
					<!-- Tab panes -->
					<div class="tab-content">
						<div role="tabpanel" class="tab-pane active" id="types">
							<div class="types col-lg-12 well text-center">
								@foreach($types as $type)
								<big><a href="{{ '/learn' . $type->path . $type->wid }}" class="label label-danger">{{ $type->title }}</a></big>
								@endforeach
							</div>
						</div>
						<div role="tabpanel" class="tab-pane" id="categories">
							<div class="categories col-lg-12 well text-center">
								@foreach($categories as $category)
								<big><a href="{{ $category->path . $category->wid }}" class="label label-danger">{{ $category->title }}</a></big>
								@endforeach
							</div>
						</div>
						<div role="tabpanel" class="tab-pane" id="keywords">
							<div class="categories col-lg-12 well text-center">
								<big><a href="#" class="label label-danger">keyword-1</a></big>
								<big><a href="#" class="label label-danger">keyword-2</a></big>
								<big><a href="#" class="label label-danger">keyword-3</a></big>
								<big><a href="#" class="label label-danger">keyword-4</a></big>
								<big><a href="#" class="label label-danger">keyword-1</a></big>
								<big><a href="#" class="label label-danger">keyword-2</a></big>
								<big><a href="#" class="label label-danger">keyword-3</a></big>
								<big><a href="#" class="label label-danger">keyword-4</a></big>
								<big><a href="#" class="label label-danger">keyword-1</a></big>
								<big><a href="#" class="label label-danger">keyword-2</a></big>
								<big><a href="#" class="label label-danger">keyword-3</a></big>
								<big><a href="#" class="label label-danger">keyword-4</a></big>
							</div>
						</div>
					</div>
				</div>
				
			</div>
			
			@if($products)
				
			<div class="row media_list">
				<div class="col-lg-12">
					@foreach($products as $product)
					
					<div class="media">

						<div class="media-left media-middle">
							@if($product->img)
							<a href="{!! '/learn' . $product->path . $product->wid !!}">
							  <img class="media-object" src="{!! $product->img !!}" alt="{!! $product->title !!}">
							</a>
							@else
							<span class="media-object _64x64"></span>
							@endif
						</div>
						
						<div class="media-body">
							<h4 class="media-heading">{!! link_to('learn' . $product->path . $product->wid, $product->title) !!}</h4>
							<div class="intro">{!! @$product->intro !!}</div>
						</div>
						
						@if(!$product->product)
						<div class="media-right media-middle text-right">
							<span class="media-object">

								<span class="nowrap">
									{!! $product->price>0 ? HTML::priceFormatHtml(@$product->price, $product->currensy) : 'Бесплатно' !!}
								</span>
								
								@if($product->published_at > date('Y-m-d H:i:s'))
								<small class="nowrap">
									<span class="glyphicon glyphicon-time"></span>
									&nbsp; <span class="date" data-date="{!! $product->published_at !!}">
										{!! HTML::humanDateFormat($product->published_at) !!}
									</span>
								</small>
								@endif
								
							</span>
						</div>
						
						<div class="media-right media-middle sm-hidden text-right">
							<a href="{!! '/learn' . $product->path . $product->wid !!}" class="media-object btn">Подробнее</a>
						</div>
						@endif
						
					</div>
					<hr>

					@endforeach
				</div>
			</div>
			@endif

		</div>
	</section>

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
	

			
		})(jQuery);
	</script>
@stop