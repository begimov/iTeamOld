@extends('site.template')

@section('title')
	{{ @$page->meta_title ? $page->meta_title . ' ' : (@$page->title ? $page->title . ' ' : '') }}
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
		
		<h1 class="title">{!! $page->title !!}</h1>
	
    </header>
@stop

@section('main')


	<div class="article container">
		
		@if(@$page->author)
		<h4 class="author">{!! $page->author !!}</h4>
		@endif
		
		{!! @$page->outro !!}
		
		<div style="border-top:1px solid #eee;border-bottom:1px solid #eee;padding:4px 0;margin:8px 0;">
		<div class="yashare-auto-init" data-yashareL10n="ru" data-yashareType="small" data-yashareQuickServices="vkontakte,facebook,twitter,odnoklassniki,moimir,gplus" data-yashareTheme="counter"></div>
		</div>
		
		
		<div class="text">{!! $page->text !!}</div>
		<div style="border-top:1px solid #eee;border-bottom:1px solid #eee;padding:4px 0;margin:8px 0;">
		<div class="yashare-auto-init" data-yashareL10n="ru" data-yashareType="small" data-yashareQuickServices="vkontakte,facebook,twitter,odnoklassniki,moimir,gplus" data-yashareTheme="counter"></div>
		</div>
		
		{!! @$page->outro !!}
			
		
	</div>

@stop

@section('scripts')

	<script type="text/javascript" src="//yastatic.net/share/share.js" charset="utf-8"></script>

@stop