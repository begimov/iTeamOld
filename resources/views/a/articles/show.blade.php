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
	</style>

@stop

@section('main')
	
	<div class="block-header">
		
		<h2>{{ $data['title'] }}</h2>
	
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
					<li class="active"><a href="#home11" aria-controls="home11" role="tab" data-toggle="tab">Основное</a></li>
					<li><a href="#profile11" aria-controls="profile11" role="tab" data-toggle="tab">SEO</a></li>
					<li><a href="#messages11" aria-controls="messages11" role="tab" data-toggle="tab">Событие</a></li>
					<li><a href="#settings11" aria-controls="settings11" role="tab" data-toggle="tab">Продукт</a></li>
				</ul>
			  
				<!--@ yield('form')-->
				{!! Form::model($data, ['route' => $route, 'class' => '']) !!}
				
				<div class="tab-content">

					<div role="tabpanel" class="tab-pane active" id="home11">
						
						<div class="row">
							<div class="col-sm-12">
							
								{!! Form::control('text', 0, 'title', $errors, '', null, null, trans('back/blog.title')) !!}
							
							</div>
						</div>
						
						<div class="row">
							
							<div class="col-sm-4">
								<select class="choselect" data-placeholder="Выберите категорию...">
									@if($pathes)
										@foreach($pathes AS $path)
										<option {{ $data['path']===$path->path.$path->wid.'/' ? 'selected' : '' }} title="{{ $path->path . $path->wid . '/' }}" value="{{ $path->path . $path->wid . '/' }}">{{ $path->title }}</option>
										@endforeach
									@endif
								</select>
							</div>
							
						</div>
						<br>
						
						<div class="row">
							<div class="col-sm-12">

								{!! Form::control('textarea', 0, 'intro', $errors, trans('back/blog.summary')) !!}
								{!! Form::control('textarea', 0, 'text', $errors, trans('back/blog.content')) !!}

								{!! Form::submit('Сохранить') !!}
								
							</div>
						</div>
						
					</div>
					<div role="tabpanel" class="tab-pane" id="profile11">
					222222
					</div>
					
					<div role="tabpanel" class="tab-pane" id="messages11">
					33333333333
					</div>
					<div role="tabpanel" class="tab-pane" id="settings11">
					444444444
					</div>
				</div>
				{!! Form::close() !!}
				
			</div>
			
		</div>
	</div>

	
	<div class="card">
		<!--div class="card-header">
			<h2>Autocomplete <small>Typeahead.js is a flexible JavaScript library that provides a strong foundation for building robust autocompletes.</small></h2>
		</div-->
		
		<div class="card-body card-padding">
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


	$("#title").keyup(function(){
			var str = sansAccent($(this).val());
			str = str.replace(/[^a-zA-Z0-9\s]/g,"");
			str = str.toLowerCase();
			str = str.replace(/\s/g,'-');
			$("#permalien").val(str);        
		});

  </script>

@stop