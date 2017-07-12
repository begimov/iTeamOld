@extends('a.template')

@section('head')

	{!! HTML::style('ckeditor/plugins/codesnippet/lib/highlight/styles/default.css') !!}
	<link href="/a/vendors/bower_components/chosen/chosen.min.css" rel="stylesheet">
	<style>
	.choselect + .chosen-container-multi .chosen-choices li.search-choice .search-choice-close:before {
		display:none;
	}
	.choselect + .chosen-container-multi .chosen-choices {
		padding: 0;
		min-height: 34px;
		background: none;
		border: 0 none;
		border-bottom: 1px solid #e0e0e0;
		box-shadow: none;
	}
	.choselect + .chosen-container-multi .chosen-choices li.search-choice {
		border-radius: 0 !important;
		background: none;
		background-color: #e0e0e0;
	}
	.choselect + .chosen-container-multi .chosen-choices li.search-field input[type=text] {
		height: 34px;
		margin: 0;
	}
	.choselect + .chosen-container-single .chosen-search:before {
		content: "";
	}
	.choselect + .chosen-container .chosen-results li.result-selected:before {
		right: 4px;
		top: 4px;
	}
	.block-header h2 {
		text-indent: 16px;
		color: #000;
	}
	.block-header h2 i {
		text-indent: -24px;
	}
	</style>

@stop

@section('main')
	
	<div class="block-header">
		
		<h2><i class="zmdi zmdi-flash"></i> {{ $data['title'] }}</h2>
	
		<ul class="actions">
			<li>
				<a href="">
					<i class="zmdi zmdi-trending-up"></i>
				</a>
			</li>
			<li>
				<a href="">
					<i class="zmdi zmdi-check-all"></i>
				</a>
			</li>
			<li class="dropdown">
				<a href="" data-toggle="dropdown">
					<i class="zmdi zmdi-more-vert"></i>
				</a>
	
				<ul class="dropdown-menu dropdown-menu-right">
					<li>
						<a href="">Refresh</a>
					</li>
					<li>
						<a href="">Manage Widgets</a>
					</li>
					<li>
						<a href="">Widgets Settings</a>
					</li>
				</ul>
			</li>
		</ul>
	
	</div>
					
	<div class="card">
		<div class="card-body card-padding">
		
			<div role="tabpanel">
				<ul class="tab-nav" role="tablist">
					<li class="active"><a href="#basic" aria-controls="basic" role="tab" data-toggle="tab">Основное</a></li>
					<li><a href="#seo" aria-controls="seo" role="tab" data-toggle="tab">SEO</a></li>
				</ul>
			  
				<!--@ yield('form')-->
				{!! Form::model($data, ['route' => $route, 'class' => '', 'method' => 'put']) !!}
				
				<div class="tab-content">

					<div role="tabpanel" class="tab-pane active" id="basic">
						
						<div class="row">
							<div class="col-sm-12">
							
								{!! Form::control('text', 0, 'title', $errors, '', null, null, trans('back/blog.title')) !!}
							
							</div>
						</div>
						
						<div class="row">
							<div class="col-sm-12">
							
								{!! Form::control('text', 0, 'wid', $errors, '', null, null, 'URL') !!}
							
							</div>
						</div>
						
						
						<div class="row">
							<div class="col-sm-12">

								{!! Form::control('textarea', 0, 'intro', $errors, trans('back/blog.summary')) !!}
								{!! Form::control('textarea', 0, 'text', $errors, trans('back/blog.content')) !!}

								<!--{ !! Form::submit('Сохранить') !! }-->
								
								
								<button class="btn btn-primary btn-lg btn-icon-text waves-effect" type="submit">
									<i class="zmdi zmdi-save"></i> Сохранить
								</button>
								
							</div>
						</div>
						
					</div>
					<div role="tabpanel" class="tab-pane" id="seo">
						
						<div class="row">
							<div class="col-sm-12">
							
								{!! Form::control('text', 0, 'created_at', $errors, 'Создано', null, null, null, ['class'=>'form-control date-time-picker']) !!}
							</div>
						</div>
						
						<div class="row">
							<div class="col-sm-4">
								<div class="fg-line">
									<input type="text" class="typeahead form-control" placeholder="States of USA">
								</div>
							</div>
							
							<div class="col-sm-4">
								<select class="choselect" multiple data-placeholder="Выберите категорию...">
									@if($pathes)
										@foreach($pathes AS $path)
										<option title="{{ $path->path . $path->wid . '/' }}" value="{{ $path->path . $path->wid . '/' }}">{{ $path->title }}</option>
										@endforeach
									@endif
								</select>
							</div>
							
				{!! Form::close() !!}
							
							<div class="col-sm-4">
								<!--{{ $data['path'] }}-->
								<form target="_blank" action="/filemanager/connectors/php/filemanager.php" method="post" enctype="multipart/form-data" accept-charset="utf-8">
									<input type="hidden" name="mode" value="add">
									<input type="hidden" name="currentpath" value="/user2/">
									<input type="file" name="newfile">
									<input type="submit">
								</form>
							</div>

						</div>
					</div>
					
				</div>
				
				
			</div>
			
		</div>
	</div>



@stop

@section('scripts')

	{!! HTML::script('ckeditor/ckeditor.js?f5=' . time() ) !!}
	
	<script src="/a/vendors/bower_components/typeahead.js/dist/typeahead.bundle.min.js"></script>
	<script src="/a/vendors/bower_components/chosen/chosen.jquery.min.js"></script>

	
	<script>
	
	CKEDITOR.timestamp={{ time() }};
	
	var configText = {
		skin: 'flat',
		codeSnippet_theme: 'Monokai',
		defaultLanguage: 'ru',
		language: '{{ config('app.locale') }}',
		
		//extraPlugins: 'impaste,iteam',
		extraPlugins: 'btgrid,iteam',
		
		height: 400,
		filebrowserBrowseUrl: '{!! url($url) !!}',
		//filebrowserImageUploadUrl: '{!! url($url) !!}',
		
		toolbarGroups: [
			{ name: 'clipboard',   groups: [ 'clipboard', 'undo' ] },
			{ name: 'editing',     groups: [ 'find', 'selection', 'spellchecker' ] },
			{ name: 'links' },
			{ name: 'insert' },
			{ name: 'forms' },
			{ name: 'tools' },
			{ name: 'document',	   groups: [ 'mode', 'document', 'doctools' ] },
			{ name: 'others' },
			'/',
			{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
			{ name: 'paragraph',   groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ] },
			{ name: 'styles' },
			{ name: 'colors' }
		],

		addButtons: 'Underline,Subscript,Superscript'
	
	};

	CKEDITOR.replace('text', configText);

	var configSummary = {
		skin: 'flat',
		codeSnippet_theme: 'Monokai',
		defaultLanguage: 'ru',
		language: '{{ config('app.locale') }}',
		
		height: 100,
		filebrowserBrowseUrl: '{!! url($url) !!}',
	
		toolbarGroups: [
			{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
			{ name: 'paragraph',   groups: [ 'list', 'blocks', 'align', 'bidi' ] },
			{ name: 'links' },
			{ name: 'insert' },
			{ name: 'document',	   groups: [ 'mode', 'document', 'doctools' ] },
		],

		removeButtons: 'Underline,Strike_,Subscript,Superscript,Anchor,Table,SpecialChar,HorizontalRule,CodeSnippet'
	};
	CKEDITOR.replace('intro', configSummary);

	function Translit(txt, nourl){
		
		txt = txt.toLowerCase();
		var transl 	= [];
		
		transl['а']='a';
		transl['б']='b';
		transl['в']='v';
		transl['г']='g';
		transl['д']='d';
		transl['е']='e';
		transl['ё']='e';
		transl['ж']='zh';
		transl['з']='z';
		transl['и']='i';
		transl['й']='j';
		transl['к']='k';
		transl['л']='l';
		transl['м']='m';
		transl['н']='n';
		transl['о']='o';
		transl['п']='p';
		transl['р']='r';
		transl['с']='s';
		transl['т']='t';
		transl['у']='u';
		transl['ф']='f';
		transl['х']='h';
		transl['ц']='ts';
		transl['ч']='ch';
		transl['ш']='sh';
		transl['щ']='sch';
		transl['ъ']='';
		transl['ы']='y';
		transl['ь']='';
		transl['э']='e';
		transl['ю']='ju';
		transl['я']='ja';
		transl['і']='i';
		transl['є']='je';
		transl['ї']='ji';
		transl['ґ']='g';
		
		var ret = '';
		for(var i = 0; i < txt.length; i++){
			ret += (transl[txt[i]]) ? transl[txt[i]] : txt[i];
		}
		if(!nourl) {
			ret = ret.replace(/[^a-zA-Z0-9\s]/g,"");
			ret = ret.replace(/\s/g,'-');
		}
		return ret;
	}
		
	$('[name="title"]').keyup(function(){
			var wid = $('[name="wid"]');
			if(!wid.val()) wid.val(Translit($(this).val()));
		});

  </script>

@stop