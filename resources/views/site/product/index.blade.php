@extends('site.template')


@section('title')
	{{ $page->meta_title ? $page->meta_title . ' ' : ($page->title ? $page->title . ' ' : '') }}
	| 
@stop

@section('header')

    <!-- Header -->
    <header class="-learn-header">
	
		@if($crumbs/* && Request::segment(0)*/)
		<div class="row">
			<ol class="breadcrumb">
			@foreach($crumbs as $crumb)
				<li>{!! link_to('learn' . $crumb->path . $crumb->wid, $crumb->title, ["class"=>"crumb_parent crumb_" . (isset($i) ? ++$i : $i=0) ]) !!} </li>
			@endforeach      
			</ol>
		</div>
		@endif
		
		<h2 class="text-center">{!! $page->title !!}</h2>
	
    </header>
	
@stop

@section('main')
	

	
    <section class="content">
		<div class="container">

		
			@if(Request::segment(1))
			<div class="row">
				<div class="box">
					<div class="col-lg-12">
						
					{!! HTML::shortCode($page->text) !!}
						
					</div>
					
				</div>
			</div>
			@endif
			

			@include('site.product.loop')
			

		</div>
	</section>

@stop

@section('edit-link')

	@if(Auth::user() && @Auth::user()->role_id<3)
		<div class="admin-edit"><a class="admin-edit-link" target="_blank" href="{{ route('admin.learn.show',$page->id) }}"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a></div>
	@endif

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