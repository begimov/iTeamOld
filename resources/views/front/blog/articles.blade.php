@extends('front.iteam')

@section('title')
	{{ @$page->meta_title ? $page->meta_title . ' ' : (@$page->title ? $page->title . ' ' : '') }}
@stop

@section('main')

    <div class="row">
		
		<div class="article col-lg-12">

			@if(@$crumbs && Request::segment(1))
			<div id="crumb">
				<nav id="crumbs">
				@foreach($crumbs as $crumb)
					{!! link_to($crumb->path . $crumb->wid, $crumb->title, ["class"=>"crumb_parent crumb_" . ($crumb->deep-1) ]) !!} <span class="crumb_separator">→</span>
				@endforeach
				</nav>
			</div>
			@endif

			@if(Request::segment(2))
			<div class="box">
					
				@if(!@$childrens)
				
				<h2 class="title">{{ @$page->meta_title ? $page->meta_title . ' ' : (@$page->title ? $page->title . ' ' : '') }}</h2>
				
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
				
					@if(@$outro)
					<div class="outro">{!! $outro !!}</div>
					@endif

				@else
					
				<h2 class="title">{!! $page->title !!}</h2>
				
				@endif
				
				<div>{!! $page->text !!}</div>
				
			</div>
			@endif	
			
			@if($childrens)
			<div class="media_list" style="margin-top:30px;">
				@foreach($childrens as $child)
					<div class="box list_item">

						<div class="list_item_img" style="display:none;">	
						</div>
						<div class="list_item_body">
							
							@if(@$child->author)
							<div class="list_item_preinfo">
								<div class="list_item_author"><i class="material-icons"></i> &nbsp; {!! $child->author !!}</div>
								@if(@$child->parent->title && $current_path!==$child->path)
									<div class="list_item_parent"><a href="{!! $child->path !!}"><i class="material-icons">&#xE90F;</i> &nbsp; {!! $child->parent->title !!}</a></div>
								@endif
							</div>
							@endif
							
							<h4 class="list_item_title">
							{!! link_to($child->path . $child->wid, $child->title) !!}
							</h4>
							<div class="list_item_text">
								<div class="intro">{!! @$child->intro !!}</div>
							</div>
							<div class="list_item_info">
								<div class="list_item_date"><i class="material-icons"></i> &nbsp; <time data-nowd="{{ date("d.m.Y") }}" data-nowt="{{ date("H:i:s") }}">{{ date("d.m.Y H:i", strtotime($child->created_at)) }}</time></div>
								<div class="list_item_viewed"><i class="material-icons"></i> &nbsp; {!! @$child->viewed !!}</div>
							</div>
						</div>
					</div>
				@endforeach
			</div>
			{!! $childrens->links() !!}
			@endif
			


		
		</div>
		
		@if(@$outro)
		<div class="article col-lg-12"><div class="outro">{!! $outro !!}</div></div>
		@endif

    </div>

@stop