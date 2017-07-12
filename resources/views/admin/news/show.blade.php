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
		
		<h2><i class="zmdi zmdi-flash"></i> {{ link_to_route('admin.news.index','Новости') }} &rarr; {{ $data->title }}</h2>

		<ul class="actions">
		
			<li>
				<a target="_blank" href="{{ url('news'.$data->path.$data->wid.'/')  }}">
					<i class="zmdi zmdi-eye"></i>
				</a>
			</li>
			
			@if($data->children)
			<li>
				<a href="{{ route('admin.news.index') . '?parent_id=' . $data->id }}">
					<i class="zmdi zmdi-folder-outline"></i>
				</a>
			</li>
			@endif
			
			@if($crumbs)
			<li class="dropdown">
				<a href="" data-toggle="dropdown" aria-expanded="true">
					<i class="zmdi zmdi-more-vert"></i>
				</a>
				<ul class="dropdown-menu dropdown-menu-right">
					@foreach($crumbs AS $crumb)
					<li>{{ link_to_route('admin.news.show', $crumb->title, $crumb->id) }}</li>
					@endforeach												
				</ul>
			</li>
			@endif
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
				{!! Form::model($data, ['route' => ['admin.news.update',$data->id], 'class' => '']) !!}
					
					{!! Form::hidden('_method','PUT') !!}
				
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
										<input type="radio" name="public" value="1" {{ $data->public > 0 ? 'checked' : '' }}>
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

				<div role="tabpanel" class="tab-pane" id="mark">
					<h2>Текущие метки</h2>
					<ol>
						@foreach($marksOld as $mark)
							<li>{{ $mark->mark->name }} <a href="{{ route('admin.resource.destroy', ['id' => $mark->id]) }}" class="btn-link before-glyphicon before-glyphicon-danger glyphicon-trash delete"></a></li>
						@endforeach
					</ol>

					<h2>Добавить еще</h2>
					<p>Для выбора нескольких значений списка применяются клавиши Ctrl и Shift совместно с курсором мыши.</p>
					<form action="{{ route('admin.resource.add-mark') }}" method="post">
						{{ csrf_field() }}
						<input class="hidden" type="text" name="type_resource" value="2">
						<input class="hidden" type="text" name="id_resource" value="{{ $data->id }}">
						<select name="id_mark[]" multiple style="min-width: 200px">
							@foreach($marks as $mark)
								<option value="{{ $mark->id }}">{{ $mark->name }}</option>
							@endforeach
						</select>
						<div>
							<input type="submit">
						</div>
					</form>
					<p>Для выбора нескольких значений списка применяются клавиши Ctrl и Shift совместно с курсором мыши.</p>
				</div>
				
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
	
	@if($data->id === 1)
	$('form').submit(function(e){
		alert('Редактирование главной страницы запрещено в целях безопасности. Обратитесь к администратору');
		e.preventDefault();
		return false;
	});
	@endif

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