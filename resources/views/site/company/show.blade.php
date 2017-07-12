@extends('site.template')

@section('title')
	{{ $page->meta_title ? $page->meta_title . ' ' : ($page->title ? $page->title . ' ' : '') }}
	| 
@stop

@section('header')

    <!-- Header -->
    <header class="copage-header" id="top_{{ @Request::segment(3) ? Request::segment(3) : Request::segment(2) }}">
	
		@if($crumbs)
		<div class="row">
			<ol class="breadcrumb">
			@foreach($crumbs as $crumb)
				<li>{!! link_to('company' . @$crumb->path . @$crumb->wid, @$crumb->title, ["class"=>"crumb_parent crumb_" . (isset($i) ? ++$i : $i=0) ]) !!} </li>
			@endforeach      
			</ol>
		</div>
		@endif
		
		<h1 class="text-center">{!! @$page->title !!}</h1>
	
    </header>
	
@stop

@section('main')

    <section class="content">
		<div class="container">

			<div class="row">
				<div class="box">
					<div class="col-lg-12">
						<div class="page_content">{!! $page->text !!}</div>
						
						<div style="border-top:1px solid #eee;border-bottom:1px solid #eee;padding:4px 0;margin:8px 0;">
						<div class="yashare-auto-init" data-yashareL10n="ru" data-yashareType="small" data-yashareQuickServices="vkontakte,facebook,twitter,odnoklassniki,moimir,gplus" data-yashareTheme="counter"></div>
						</div>
						
					</div>
				</div>
			</div>
			
		</div>
	</section>

@stop

@section('scripts')

	<script type="text/javascript" src="//yastatic.net/share/share.js" charset="utf-8"></script>

@stop