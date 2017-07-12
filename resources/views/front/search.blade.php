@extends('front.iteam')

@section('title')
	{{ 'Поиск' }}
@stop

@section('main')

		<div class="container search">

			<h5 class="title">Поиск @if(@$request->q) {!! ' по запросу "<i>'.$request->q.'</i>"' !!} @endif</h5>
			
			@if(!@$request->q)
			<div class="search_form search_form_static">
					<form id="cse-search-box" class="search-form" action="/search">
						<input type="hidden" name="siteurl" value="">
						<input type="hidden" name="ref" value="">
						<input type="hidden" name="ss">
						<input type="hidden" value="partner-pub-2457866150117626:somrxulncq7" name="cx">
						<input type="hidden" value="FORID:9" name="cof">
						<input type="hidden" value="utf-8" name="ie">
						<input type="text" size="20" autocomplete="off" id="q" name="q" spellcheck="false">
						<button type="submit" name="sa" value="🔍"><i class="material-icons">&#xE8B6;</i></button>
					</form>

			</div>
			@endif
			
			<div class="text">
				<div id="cse-search-results"></div>
				<script type="text/javascript">
				  var googleSearchIframeName = "cse-search-results";
				  var googleSearchFormName = "cse-search-box";
				  var googleSearchFrameWidth = 950;
				  var googleSearchDomain = "www.google.ru";
				  var googleSearchPath = "/cse";
				</script>
				<script type="text/javascript" src="http://www.google.com/afsonline/show_afs_search.js"></script>
			</div>
		
		</div>

@stop