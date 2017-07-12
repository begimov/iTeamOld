@extends('iteam.template')

@section('title')
	{{ @$page->meta_title ? $page->meta_title . ' ' : (@$page->title ? $page->title . ' ' : '') }}
	| 
@stop

@section('main')
		
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
		
    <div class="row">

		<div class="box">
			<div class="col-lg-12">
				<h1>
				{!! $page->title !!}
				</h1>
				<p class="muted text-right">
				<span class="glyphicon glyphicon-time" aria-hidden="true"></span> &nbsp; <time data-nowd="{{ date("d.m.Y") }}" data-nowt="{{ date("H:i:s") }}">{{ date("d.m.Y H:i", strtotime($page->created_at)) }}</time>
				</p>
			</div>
			<div class="col-lg-12">
				<p>{!! $page->text !!}</p>
			</div>
		</div>


    </div>

@stop