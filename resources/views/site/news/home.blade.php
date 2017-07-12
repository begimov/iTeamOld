@extends('iteam.template_no_fb')

@section('title')
	{{ @$page->meta_title ? $page->meta_title . ' ' : (@$page->title ? $page->title . ' ' : '') }}
	| 
@stop

@section('main')

    <div class="row">

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