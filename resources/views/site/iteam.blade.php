@extends('site.template')

@section('title')
	{{ $page->meta_title ? $page->meta_title . ' ' : ($page->title ? $page->title . ' ' : '') }}
	| 
@stop

@section('header')

    <!-- Header -->
    <header class="copage-header">
	
		@if(@$crumbs)
		<ol class="breadcrumb">
		@foreach($crumbs as $crumb)
			<li>{!! link_to(@$crumb->path . @$crumb->wid, @$crumb->title, ["class"=>"crumb_parent crumb_" . (isset($i) ? ++$i : $i=0) ]) !!} </li>
		@endforeach      
		</ol>
		@endif
		
		<h1 class="text-center">{!! $page->title !!}</h1>
	
    </header>
@stop
	
@section('main')

    <div class="row">
	
		<div class="col-lg-12">
			<p>{!! $page->text !!}</p>
		</div>
		
		
		@if($childrens)
		<div class="row media_list">
			@if(Request::segment(1) === 'news')
				@foreach($childrens as $child)
				<div class="box list_item">
					<div class="list_item_body">
						<div class="list_item_preinfo">
							<div class="list_item_date"><span class="glyphicon glyphicon-time" aria-hidden="true"></span> &nbsp; <time data-nowd="{{ date("d.m.Y") }}" data-nowt="{{ date("H:i:s") }}">{{ date("d.m.Y H:i", strtotime($child->created_at)) }}</time></div>
						</div>						
						<h4 class="list_item_title">
						{!! link_to($child->path . $child->wid, $child->title) !!}
						</h4>
						<div class="list_item_text">
							<div class="intro">{!! @$child->intro !!}</div>
						</div>
					</div>
				</div>
				@endforeach
			@else
				@foreach($childrens as $child)
				<div class="box list_item">

					<div class="list_item_img" style="display:none;">	
					</div>
					<div class="list_item_body">
						
						@if(@$child->author)
						<div class="list_item_preinfo">
							<div class="list_item_author"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> &nbsp; {!! $child->author !!}</div>
						</div>
						@endif
						
						<h4 class="list_item_title">
						{!! link_to($child->path . $child->wid, $child->title) !!}
						</h4>
						<div class="list_item_text">
							<div class="intro">{!! @$child->intro !!}</div>
						</div>
						<div class="list_item_info">
							<div class="list_item_date"><span class="glyphicon glyphicon-time" aria-hidden="true"></span> &nbsp; <time data-nowd="{{ date("d.m.Y") }}" data-nowt="{{ date("H:i:s") }}">{{ date("d.m.Y H:i", strtotime($child->created_at)) }}</time></div>
							<div class="list_item_viewed"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> &nbsp; {!! @$child->seen !!}</div>
						</div>
					</div>
				</div>
				@endforeach
			@endif
			</div>
			{!! $childrens->links() !!}
        @endif


    </div>

@stop