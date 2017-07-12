@extends('iteam.template')

@section('title')
	{{ @$page->meta_title ? $page->meta_title . ' ' : (@$page->title ? $page->title . ' ' : '') }}
@stop

@section('main')

    <div class="row">
		
		<div class="article col-lg-12">

			@if(@$crumbs)
			<div id="crumb">
				<nav id="crumbs">
				@foreach($crumbs as $crumb)
					{!! link_to($crumb->path . $crumb->wid, $crumb->title, ["class"=>"crumb_parent crumb_" . ($crumb->deep-1) ]) !!} <span class="crumb_separator">&rarr;</span>
				@endforeach
				</nav>
			</div>
			@endif

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
				<div class="row" style="margin-top: -40px; margin-left: 15px">
					@if(count($marks) != 0)
						<div style="font-size: 14px">
							<div style="float: left;">
								<b>Метки:</b>
							</div>
							<div>
								<ul style="list-style-type: none; margin-left: 0px">
									@foreach($marks as $mark)
										<li style="float: left; margin-left: 15px"><a href="{{ route('site.mark.get-list', ['id' => $mark->id_mark]) }}">{{ $mark->mark->name }}</a></li>
									@endforeach
								</ul>
							</div>
						</div>
					@endif
				</div>

				
					@if(@$outro)
					<div class="outro">{!! $outro !!}</div>
					@endif

				
				
				<div>{!! $page->text !!}</div>
				
			</div>

			@if(@$outro)
			<div class="outro">{!! $outro !!}</div>
			@endif
	
		</div>

		@if(count($marks) != 0)
			<div style="font-size: 14px; margin-left: 15px">
				<div style="float: left;">
					<b>Метки:</b>
				</div>
				<div>
					<ul style="list-style-type: none">
						@foreach($marks as $mark)
							<li style="float: left; margin-left: 15px"><a href="{{ route('site.mark.get-list', ['id' => $mark->id_mark]) }}">{{ $mark->mark->name }}</a></li>
						@endforeach
					</ul>
				</div>
			</div>
		@endif
		

    </div>

@stop

@section('edit-link')

	@if(Auth::user() && @Auth::user()->role_id<3)
		<div class="admin-edit"><a class="admin-edit-link" target="_blank" href="{{ route('admin.article.show',$page->id) }}"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a></div>
	@endif

@stop