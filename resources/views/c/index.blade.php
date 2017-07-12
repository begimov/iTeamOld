@extends('c.template')

@section('title')
	{{ $page->meta_title ? $page->meta_title . ' ' : ($page->title ? $page->title . ' ' : '') }}
	| 
@stop

@section('header')

    <!-- Header -->
    <header class="header">

        <div class="text-vertical-center">
            <h1>{!! $page->title !!}</h1>
        </div>
	
    </header>
	
@stop

@section('main')

    <section class="content">
		<div class="container">

			@if($crumbs && Request::segment(1))
				<div class="row">
					<div id="crumb">
						<nav id="crumbs">
						@foreach($crumbs as $crumb)
							{!! link_to($crumb->path . $crumb->wid, $crumb->title, ["class"=>"crumb_parent crumb_" . (isset($i) ? ++$i : $i=0) ]) !!} <span class="crumb_separator">?</span>
						@endforeach
						</nav>
					</div>
				</div>
				
  <ol class="breadcrumb">
	@foreach($crumbs as $crumb)
		<li>{!! link_to($crumb->path . $crumb->wid, $crumb->title, ["class"=>"crumb_parent crumb_" . (isset($i) ? ++$i : $i=0) ]) !!} </li>
	@endforeach      
  </ol>
				
				
			@endif	

			@if(Request::segment(1))
			<div class="row">
				<div class="box">
					<div class="col-lg-12">
						<p>{!! $page->text !!}</p>
					</div>
				</div>
			</div>
			@endif	
				
			@if($childrens)
			<hr>
			<div class="row media_list">
				<div class="col-lg-12">
					@foreach($childrens as $child)
					<div class="box list_item">
						<div class="list_item_body">
							<h4 class="list_item_title">
							{!! link_to($child->path . $child->wid, $child->title) !!}
							</h4>
							<div class="list_item_text">
								<div class="intro">{!! @$child->intro !!}</div>
							</div>
						</div>
					</div>
					@endforeach
				</div>
			</div>
			{!! $childrens->links() !!}
			@endif

		</div>
	</section>

@stop