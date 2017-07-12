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
		
		<h2><i class="zmdi zmdi-card-giftcard"></i> {{ link_to_route('admin.wish.index','Желания') }} &rarr; {{ $wish->title }}</h2>
	
	</div>
					
	<div class="card">
		<div class="card-body card-padding">
		
			<!--@ yield('form')-->
			{!! Form::model($wish, ['route' => ['admin.wish.update',$wish->id], 'class' => '']) !!}
				
				{!! Form::hidden('_method','PUT') !!}
			
				@if($authors)
				<div class="row">
					<div class="col-sm-12">
					
						{!! Form::control('text', 0, 'title', $errors, 'Заголовок', null, null, 'Заголовок') !!}
					
					</div>
				</div>
				<div class="row">
					<div class="col-sm-4">
						<label for="author_id">
						Автор
						</label>
						<select id="author_id" name="author_id" class="choselect" data-placeholder="Выберите категорию...">
							@if($authors)
								<option {{ !@$wish->author ? 'selected' : '' }} value="0">Добавить</option>
								@foreach($authors AS $author)
								<option {{ @$wish->author && @$wish->author->id===$author->id ? 'selected' : '' }} value="{{ $author->id }}">{{ $author->name }}</option>
								@endforeach
							@endif
						</select>
					</div>
					
					<div class="author_block col-sm-4" style="{{ (@$wish->author && @$wish->author->id) ? 'display:none;' : '' }}">
						{!! Form::control('text', 0, 'author_name', $errors, 'Имя автора', null, null, 'Имя автора') !!}
					</div>
				</div>
				@else
				<div class="row">
					<div class="col-sm-4">
					
						{!! Form::control('text', 0, 'title', $errors, 'Заголовок', null, null, 'Заголовок') !!}
					
					</div>
					
					<div class="_author_block col-sm-4">
						{!! Form::control('text', 0, 'author_name', $errors, 'Имя автора', null, null, 'Имя автора') !!}
					</div>
					
					<div class="_public_block col-sm-4">
						<select name="public">
							@if($publics)
								@foreach($publics AS $public=>$public_name)
								<option {{ $wish->public===$public ? 'selected' : '' }} value="{{ $public }}">{{ $public_name }}</option>
								@endforeach
							@endif
						</select>
					</div>
				</div>
				@endif
				
				<br>
				
				<div class="row">
					<div class="col-sm-12">

						{!! Form::control('textarea', 0, 'text', $errors, trans('back/blog.content')) !!}

						{!! Form::submit('Сохранить', ['','btn btn-lg btn-primary btn-no-waves']) !!}
						
					</div>
				</div>

				
			{!! Form::close() !!}
			
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
	CKEDITOR.replace('text', configText);
	
	/*
	$('select[name="author_id"]').on('change',function(){
		var checkd = $(this).val(), author_block = $('.author_block');
		if(checkd>0) {
			author_block.hide();
		}
		else {
			author_block.show();
		}
	});
	*/
	

  </script>

@stop