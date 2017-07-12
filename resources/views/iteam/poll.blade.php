@extends('iteam.template_no_fb')

@section('title')
	{{ $page->meta_title ? $page->meta_title . ' ' : ($page->title ? $page->title . ' ' : '') }}
	| 
@stop

@section('main')
				
    <div class="row">
	

		

		<div class="media_list">




		</div>
		


    </div>

@stop

@section('bottom')
	
@stop