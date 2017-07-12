@extends('admin.template')

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
		
		<h2><i class="zmdi zmdi-flash"></i> {{ link_to_route('admin.news.index','Новости') }} &rarr; Новая новость</h2>

	
		<ul class="actions">

		</ul>
	
	</div>
					
	<div class="card">
		<div class="card-body card-padding">
		
			<div role="tabpanel">
				<ul class="tab-nav" role="tablist">
					<li class="active"><a href="#basic" aria-controls="basic" role="tab" data-toggle="tab">Содержание</a></li>
					<li><a href="#seo" aria-controls="seo" role="tab" data-toggle="tab"><small>SEO и настройки</small></a></li>
				</ul>
			  
				<!--@ yield('form')-->
				{!! Form::model($data, ['route' => 'admin.news.store', 'class' => '']) !!}
					
					{!! Form::hidden('_method','POST') !!}
				
				<div class="tab-content">

					<div role="tabpanel" class="tab-pane active" id="basic">
						
						<div class="row">
							<div class="col-sm-12">
							
								{!! Form::control('text', 0, 'title', $errors, 'Заголовок', null, null, 'Заголовок') !!}
							
							</div>
						</div>
						
						<div class="row">
							
							<div class="col-sm-4">
								{!! Form::control('text', 0, 'author', $errors, 'Автор', null, null, 'Автор') !!}
							</div>
							
						</div>
						<br>
						
						<div class="row">
							<div class="col-sm-12">

								{!! Form::control('textarea', 0, 'intro', $errors, trans('back/blog.summary')) !!}
								{!! Form::control('textarea', 0, 'text', $errors, trans('back/blog.content')) !!}

								{!! Form::submit('Сохранить', ['','btn btn-lg btn-primary btn-no-waves']) !!}
								
							</div>
						</div>
						
					</div>
					<div role="tabpanel" class="tab-pane" id="seo">
					
						<div class="row">
							<div class="col-sm-8">
								
								<div class="row">
									<div class="col-sm-12">
									
										{!! Form::control('text', 0, 'wid', $errors, 'Ссылка (ЧПУ URL)', null, null, 'Ссылка (ЧПУ URL)') !!}
									
									</div>
								</div>
								<div class="row">
									<div class="col-sm-12">
									
										{!! Form::control('text', 0, 'meta_title', $errors, 'SEO Заголовок', null, null, 'SEO Заголовок') !!}
										{!! Form::control('textarea', 0, 'meta_description', $errors, 'SEO описание', null, null, 'SEO описание') !!}
										{!! Form::control('textarea', 0, 'meta_keywords', $errors, 'Ключевые слова', null, null, 'Ключевые слова') !!}
									
									</div>
								</div>
								
							</div>
							
							<div class="col-sm-4">
								
								<label for="published_at" class="control-label">Дата публикации</label>
								<div class="input-group form-group">
									<span class="input-group-addon"><i class="zmdi zmdi-calendar"></i></span>
										<div class="dtp-container fg-line">
										<input id="published_at" type="text" name="published_at" class="form-control date-time-picker" value="{{ Request::input('published_at') ? Request::input('published_at') : ( ($data->published_at && $data->published_at!=="0000-00-00 00:00:00") ? date("d.m.Y H:i:s",strtotime($data->published_at)) : date("d.m.Y H:i:s")) }}" placeholder="{{ Request::input('published_at') ? Request::input('published_at') : ( ($data->published_at && $data->published_at!=="0000-00-00 00:00:00") ? date("d.m.Y H:i:s",strtotime($data->published_at)) : date("d.m.Y H:i:s")) }}">
									</div>
								</div>
								
								<div class="radio m-t-15">
									<label {{ $data->public < 0 ? 'class="active"' : '' }}>
										<input type="radio" name="public" value="-1" {{ $data->public < 0 ? 'checked' : '' }}>
										<i class="input-helper"></i>
										Черновик
									</label>
								</div>
								<div class="radio m-t-15">
									<label {{ $data->public == 0 ? 'class="active"' : '' }}>
										<input type="radio" name="public" value="0" {{ $data->public == 0 ? 'checked' : '' }}>
										<i class="input-helper"></i>
										Только по ссылке
									</label>
								</div>
								<div class="radio m-t-15">
									<label {{ $data->public > 0 ? 'class="active"' : '' }}>
										<input type="radio" name="public" value="-1" {{ $data->public > 0 ? 'checked' : '' }}>
										<i class="input-helper"></i>
										Опубликовано
									</label>
								</div>

							</div>
						</div>
						
						<br>
						
						<div class="row">
							<div class="col-sm-12">

								{!! Form::submit('Сохранить', ['','btn btn-lg btn-primary btn-no-waves']) !!}
								
							</div>
						</div>
					</div>
					
				</div>
				{!! Form::close() !!}
				
			</div>
			
		</div>
	</div>

	
@stop

@section('scripts')

	{!! HTML::script('ckeditor/ckeditor.js?f5=' . time() ) !!}
	
	<script src="/a/vendors/bower_components/typeahead.js/dist/typeahead.bundle.min.js"></script>
	<script src="/a/vendors/bower_components/chosen/chosen.jquery.min.js"></script>

    <script src="/js/main.js"></script>
	
    <script src="/a/vendors/fileinput/fileinput.min.js"></script>

	
	<script>
	
	CKEDITOR.timestamp={{ time() }};
	
	var configText = {
		skin: 'flat',
		codeSnippet_theme: 'Monokai',
		defaultLanguage: 'ru',
		language: '{{ config('app.locale') }}',
		
		//extraPlugins: 'uploadimage',
		extraPlugins: 'btgrid,youtube,impaste,image2',
		image_prefillDimensions: false,
		image2_prefillDimensions: false,
		image2_alignClasses: [ 'image-left', 'image-center', 'image-right' ],
		//image2_disableResizer: true,
		contentsCss: ['/css/bootstrap.min.css','/css/style.css'],
		
		height: 400,
		filebrowserBrowseUrl: '{!! url($url) !!}',
		//filebrowserImageUploadUrl: '{!! url($url) !!}',
		
		allowedContent: true,
		
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

		addButtons: 'Underline,Subscript,Superscript',
		removeButtons: 'CodeSnippet'
	
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
	
	CKEDITOR.instances['intro'].on('change', function() {
		var intro_text = $(CKEDITOR.instances['intro'].getData()).text(), meta_description = $("#meta_description");
		if(!meta_description.val() || meta_description.data('new')) {
				meta_description.val( intro_text );
				meta_description.data('new',true);
			}
	});
	CKEDITOR.instances['text'].on('change', function() {
		var text_text = $(CKEDITOR.instances['text'].getData()).text(), meta_keywords = $("#meta_keywords");
		if(!meta_keywords.val() || meta_keywords.data('new')) {
				meta_keywords.val( SemCore(text_text, 2, 1).join(', ') );
				meta_keywords.data('new',true);
			}
	});


	$("#title").on('keyup change blur',function(){
			var title = $(this), wid = $("#wid"), meta_title = $("#meta_title");
			if(!wid.val() || wid.data('new')) {
				var str = Translit(title.val());
				wid.val(str);
				wid.data('new',true);
			}
			if(!meta_title.val() || meta_title.data('new')) {
				meta_title.val(title.val());  
				meta_title.data('new',true);
			}      
		});

  </script>

@stop