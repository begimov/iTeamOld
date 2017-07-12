@extends('iteam.template_no_fb')

@section('title')
	{{ 'Поиск' }}
@stop

@section('main')

		<div class="container search">

			<h5 class="title">Результат поиска по запросу: <i>"{{ $q }}"</i></h5>
			
			@if(!@$request->q)
			<div class="search_form search_form_static">
					<form id="cse-search-box" class="search-form" action="/search">
						{{--<input type="hidden" name="siteurl" value="iteam.ru">--}}
						{{--<input type="hidden" name="ref" value="">--}}
						{{--<input type="hidden" name="ss">--}}
						{{--<input type="hidden" value="partner-pub-2457866150117626:somrxulncq7" name="cx">--}}
						{{--<input type="hidden" value="FORID:9" name="cof">--}}
						{{--<input type="hidden" value="utf-8" name="ie">--}}
						<input type="text" size="20" autocomplete="off" id="q" name="q" spellcheck="false">
						<button type="submit" name="sa" value="q"><i class="material-icons">&#xE8B6;</i></button>
					</form>

			</div>
			@endif

			<div class="media_list" style="margin-top: 50px">
				@foreach($all as $child)
					@if($child->public == 1)
						<div class="box list_item">

							<div class="list_item_img" style="display:none;">
							</div>
							<div class="list_item_body">

								@if(@$child->author)
									<div class="list_item_preinfo">
										<div class="list_item_author"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> &nbsp; {!! $child->author !!}</div>
										@if(@$child->parent->title)
											<div class="list_item_parent"><a href="{!! $child->path !!}"><span class="glyphicon glyphicon-lamp" aria-hidden="true"></span> &nbsp; {!! $child->parent->title !!}</a></div>
										@endif
									</div>


								@else
									<div class="list_item_preinfo">
										<div class="list_item_author">&nbsp;</div>
										@if(@$child->parent->title)
											<div class="list_item_parent"><a href="{!! $child->path !!}"><span class="glyphicon glyphicon-lamp" aria-hidden="true"></span> &nbsp; {!! $child->parent->title !!}</a></div>
										@endif
									</div>



								@endif

								<h4 class="list_item_title">
									{!! link_to($child->path . @$child->wid, $child->title) !!}
								</h4>
								<div class="list_item_text">
									<div class="intro">{!! @$child->intro !!}</div>
								</div>
								<div class="list_item_info">
									<div class="list_item_date"><span class="glyphicon glyphicon-time" aria-hidden="true"></span> &nbsp; <time data-nowd="{{ date("d.m.Y") }}" data-nowt="{{ date("H:i:s") }}">{{ date("d.m.Y H:i", strtotime($child->created_at)) }}</time></div>
									<div class="list_item_viewed"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> &nbsp; {!! @$child->viewed !!}</div>
								</div>
							</div>
						</div>
					@endif
				@endforeach
			</div>
			
			{{--<div class="text">--}}
				{{--<div id="cse-search-results"></div>--}}
				{{--<script type="text/javascript">--}}
				  {{--var googleSearchIframeName = "cse-search-results";--}}
				  {{--var googleSearchFormName = "cse-search-box";--}}
				  {{--var googleSearchFrameWidth = 950;--}}
				  {{--var googleSearchDomain = "www.google.ru";--}}
				  {{--var googleSearchPath = "/cse";--}}
				{{--</script>--}}
				{{--<script type="text/javascript" src="/js/google-show_afs_search.js"></script>--}}
			{{--</div>--}}
		
		</div>

@stop