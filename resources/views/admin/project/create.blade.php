@extends('admin.template')

@section('head')

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
		<h2><i class="zmdi zmdi-case-check"></i> {{ link_to_route('admin.project.index','Проекты') }} &rarr; Новый проект</h2>
	</div>
		
	<div class="card">
		<div class="card-body card-padding">
		
			<!--@ yield('form')-->
			{!! Form::model($project, ['route' => ['admin.project.store'], 'class' => '']) !!}
				
				{!! Form::hidden('_method','POST') !!}
				
				<div class="row">
					<div class="col-sm-6">
						
						<label for="company_id">
						Компания
						</label>
						<select id="company_id" name="company_id" class="choselect" data-placeholder="Выберите компанию...">
							@if($companies)
								@foreach($companies AS $company)
								<option {{ $project->company_id===$company->id ? 'selected' : '' }} value="{{ $company->id }}">{{ $company->company_name }}</option>
								@endforeach
							@endif
						</select>
						
					</div>
					<div class="col-sm-6 text-center">
						@if(!Request::input('company_id'))
						<a class="btn btn-sm btn-success" href="{{ route('admin.company.create') }}">Добавить компанию</a>
						@endif
					</div>
				</div>
				<br>
				
				<div class="row">
					<div class="col-sm-12">
					
						{!! Form::control('textarea', 0, 'project_info', $errors, 'Описание проекта', null, null, 'Описание проекта') !!}
						
						<br>
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
	
	<script>
	
	CKEDITOR.timestamp={{ time() }};

	var configPInfo = {
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
	CKEDITOR.replace('project_info', configPInfo);
	


  </script>
	
@stop