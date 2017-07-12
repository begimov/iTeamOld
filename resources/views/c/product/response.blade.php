@extends('c.product.t')

@section('title')
	{{ $page->meta_title ? $page->meta_title . ' ' : ($page->title ? $page->title . ' ' : '') }}
	| 
@stop

@section('header')

    <!-- Header -->
    <header class="learn-header">
		
		@if(@$crumbs/* && Request::segment(0)*/)
		<div class="-row">
			<ol class="breadcrumb">
			@foreach($crumbs as $crumb)
				<li>{!! link_to('learn' . $crumb->path . $crumb->wid, $crumb->title, ["class"=>"crumb_parent crumb_" . (isset($i) ? ++$i : $i=0) ]) !!} </li>
			@endforeach      
			</ol>
		</div>
		@endif
	
    </header>
	
@stop

@section('main')

    <section id="__learn" class="content">
		<div class="container">

			<div class="row">
				<div class="box">
					<div class="col-lg-12">
						<h1>{!! $page->title !!}</h1>
					</div>
				</div>
			</div>
			
			<div class="row">
				<div class="box">
					<div class="col-lg-12">
						
					{!! $page->text !!}
						
					</div>
					
				</div>
			</div>

		</div>
	</section>

@stop


@section('edit-link')

	@if(Auth::user() && @Auth::user()->role_id<3)
		<div class="admin-edit"><a class="admin-edit-link" target="_blank" href="{{ route('admin.response.show',$page->id) }}"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a></div>
	@endif

@stop