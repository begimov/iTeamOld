@extends('iteam.template')

@section('title')
	{{ @$page->meta_title ? $page->meta_title . ' ' : (@$page->title ? $page->title . ' ' : '') }}
	| 
@stop

@section('main')

    <div class="row">

		@if(@$crumbs)
            <div class="row">
				<div id="crumb">
					<nav id="crumbs">
					@foreach($crumbs as $crumb)
						{!! link_to($crumb['path'] . $crumb['wid'], $crumb['title'], ["class"=>"crumb_parent crumb_" . (isset($i) ? ++$i : $i=0) ]) !!} <span class="crumb_separator">></span>
					@endforeach
					</nav>
				</div>
            </div>
        @endif

		<div class="box">
			<div class="col-lg-12 text-center">
				<h2>
				{!! $page->title !!}
				</h2>
			</div>
			<div class="col-lg-12">
				<p>{!! $page->text !!}</p>
			</div>
		</div>
		
		@if(@$childrens)
		<div class="row media_list">
			
			@include('iteam.news.loop')
			
		</div>
		{!! $childrens->links() !!}
        @endif


    </div>

@stop