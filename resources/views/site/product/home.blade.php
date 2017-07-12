@extends('site.template')

@section('title')
	{{ $page->meta_title ? $page->meta_title . ' ' : ($page->title ? $page->title . ' ' : '') }}
	| 
@stop

@section('header')

    <!-- Header -->
    <header class="-learn-header">

		<h1 class="text-center">{!! $page->title !!}</h1>
	
    </header>
	
@stop

@section('main')

    <section id="product_home_content" class="content">
		<div class="container">
			
			<div class="row">
				<div class="col-lg-12">
					
				{!! HTML::shortCode($page->text) !!}
					
				</div>
			</div>
			
			@if($childrens)
				
			<div class="row media_list">
				<div class="col-lg-12">
					@foreach($childrens as $child)
					
					<div class="media">

						@if($child->img)
						<div class="media-left media-middle">
							<a href="{!! '/learn' . $child->path . $child->wid !!}">
							  <img class="media-object" src="{!! $child->img !!}" alt="{!! $child->title !!}">
							</a>
						</div>
						@endif
						
						<div class="media-body">
							<h4 class="media-heading">{!! link_to('learn' . $child->path . $child->wid, $child->title) !!}</h4>
							<div class="intro">{!! @$child->intro !!}</div>
						</div>
						
						@if(!$child->children)
						<div class="media-right media-middle text-right">
							<span class="media-object">

								<span class="nowrap">
									{!! $child->price>0 ? HTML::priceFormatHtml(@$child->price, $child->currensy) : 'Бесплатно' !!}
								</span>
								
								@if($child->published_at > date('Y-m-d H:i:s'))
								<small class="nowrap">
									<span class="glyphicon glyphicon-time"></span>
									&nbsp; <span class="date" data-date="{!! $child->published_at !!}">
										{!! HTML::humanDateFormat($child->published_at) !!}
									</span>
								</small>
								@endif
								
							</span>
						</div>
						
						<div class="media-right media-middle sm-hidden text-right">
							<a href="{!! '/learn' . $child->path . $child->wid !!}" class="media-object btn">Подробнее</a>
						</div>
						@endif
						
					</div>
					<hr>

					@endforeach
				</div>
			</div>
			{!! $childrens->links() !!}
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