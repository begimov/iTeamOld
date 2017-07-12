@extends('site.template')

@section('title')
	{{ @$page->meta_title ? $page->meta_title . ' ' : (@$page->title ? $page->title . ' ' : '') }}
@stop

@section('main')

    <div class="row">

		@if(@$crumbs)
		<ol class="breadcrumb">
		@foreach($crumbs as $crumb)
			<li>{!! link_to($crumb->path . $crumb->wid, $crumb->title, ["class"=>"crumb_parent crumb_" . (isset($i) ? ++$i : $i=0) ]) !!} </li>
		@endforeach
		</ol>
		@endif

		<div class="article col-lg-12">

			<div class="box">


				<h2 class="title">{{ @$page->title }}</h2>

				<div class="row" style="border-top:1px solid #eee;border-bottom:1px solid #eee;padding:4px 0;margin:8px 0;">
					<div class="fl oh col-lg-6 col-sm-6 text-left">
						<div class="yashare-auto-init" data-yashareL10n="ru" data-yashareType="small" data-yashareQuickServices="vkontakte,facebook,twitter,odnoklassniki,moimir,gplus" data-yashareTheme="counter"></div>
					</div>
					<div class="fr oh col-lg-6 col-sm-6 text-right">
					@if(@$page->author)
						<h4 class="author">{!! $page->author !!}</h4>
					@endif
					</div>
				</div>

					@if(@$page->outro)
					<div class="outro">{!! $page->outro !!}</div>
					@endif



				<div>{!! $page->text !!}</div>

			</div>

			@if(@$page->outro)
			<div class="outro">{!! $page->outro !!}</div>
			@endif

		</div>


    </div>

@stop

@section('edit-link')

	@if(Auth::user() && @Auth::user()->role_id<3)
		<div class="admin-edit"><a class="admin-edit-link" target="_blank" href="{{ route('admin.article.show',$page->id) }}"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a></div>
	@endif

@stop