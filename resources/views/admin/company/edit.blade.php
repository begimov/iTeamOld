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
		<h2><i class="zmdi zmdi-store"></i> {{ link_to_route('admin.company.index','Компании') }} &rarr; {{ $company->company_name }}</h2>
	</div>
		
	<div class="card">
		<div class="card-body card-padding">
		

		<!--@ yield('form')-->
		{!! Form::model($company, ['route' => ['admin.company.update', $company->id], 'class' => '', 'files' => 'true']) !!}
			
			{!! Form::hidden('_method','PUT') !!}
				
				<div class="row">
					<div class="col-sm-8">
					
						<div class="row">
							<div class="col-sm-12">
								{!! Form::control('text', 0, 'company_prefix', $errors, 'Префикс (напр. Группа компаний)', null, null, 'Префикс (напр. Группа компаний)') !!}
							</div>
						</div>
						
						<div class="row">
							<div class="col-sm-12">
								{!! Form::control('text', 0, 'company_name', $errors, 'Название компании', null, null, 'Название компании') !!}
							</div>
						</div>

						<div class="row">
							<div class="col-sm-12">
								{!! Form::control('text', 0, 'city', $errors, 'Город', null, null, 'Город') !!}
							</div>
						</div>

						<div class="row">
							<div class="col-sm-12">
								{!! Form::control('text', 0, 'leader', $errors, 'Руководитель проекта', null, null, 'Руководитель проекта') !!}
							</div>
						</div>

						<div class="row">
							<div class="col-sm-12">
								{!! Form::control('text', 0, 'secretary', $errors, 'Секретать проекта', null, null, 'Секретать проекта') !!}
							</div>
						</div>

						<div class="row">
							<div class="col-sm-12">
								{!! Form::control('text', 0, 'contacts', $errors, 'Контакты', null, null, 'Контакты') !!}
							</div>
						</div>

						<div class="row">
							<div class="col-sm-12">
								{!! Form::control('date', 0, 'date_start', $errors, 'Дата начала проекта', null, null, 'Дата начала проекта') !!}
							</div>
						</div>

						<div class="row">
							<div class="col-sm-12">
								{!! Form::control('date', 0, 'date_finish', $errors, 'Дата окончания проекта', null, null, 'Дата окончания проекта') !!}
							</div>
						</div>

						<div class="row">
							<div class="col-sm-12">
								{!! Form::control('text', 0, 'result_project', $errors, 'Результат проекта', null, null, 'Результат проекта') !!}
							</div>
						</div>

						<div class="row">
							<div class="col-sm-12">
								{!! Form::control('text', 0, 'review', $errors, 'Отзыв', null, null, 'Отзыв') !!}
							</div>
						</div>
						
						<div class="row">
							<div class="col-sm-12">
							
								{!! Form::control('textarea', 0, 'company_info', $errors, 'О компании', null, null, 'О компании') !!}
							
							</div>
						</div>
						
						<div class="row">
							<div class="col-sm-12">
								{!! Form::control('text', 0, 'company_url', $errors, 'Сайт компании', null, null, 'Сайт компании') !!}
							</div>
						</div>
						
						<div class="row">
							<div class="col-sm-12">
								{!! Form::control('text', 0, 'company_postfix', $errors, 'Комментарий к названию (напр. г.Москва)', null, null, 'Комментарий к названию (напр. г.Москва)') !!}
							</div>
						</div>
						
					</div>

					<div class="col-sm-4">
						
						
						<div class="row">
							<div class="col-sm-12">
								{!! Form::control('text', 0, 'entity_type', $errors, 'ОПФ (ООО, ЗАО, ИП и пр)', null, null, 'ОПФ (ООО, ЗАО, ИП и пр)') !!}
							</div>
						</div>
						
						<div class="row">
							<div class="col-sm-12">

								<div class="fileinput fileinput-new {!! $errors->has('company_logo_small') ? 'has-error' : '' !!}" data-provides="fileinput">
									<div class="fileinput-preview thumbnail" data-trigger="fileinput">
									@if($company->company_logo_small)
										<img class="fileinput-new" src="{!! $company->company_logo_small !!}">
									@endif
									</div>
									<div>
										<label class="">
											<span class="btn btn-sm btn-no-waves btn-success fileinput-new">
											@if($company->company_logo_small)
											Изменить иконку
											@else
											Добавить иконку
											@endif
											</span>
											<span class="hidden">
											{!! Form::file('company_logo_small') !!}
											</span>
										</label>
										{!! Form::submit('Сохранить', ['','btn btn-sm btn-success btn-no-waves fileinput-exists']) !!}
										<a href="#" class="btn btn-no-waves btn-danger fileinput-exists" data-dismiss="fileinput">Отмена</a>
									</div>
									<p>{!! $errors->has('company_logo_small') ? $errors->first('company_logo_small', '<small class="help-block">:message</small>') : '' !!}</p>
								</div>

							</div>
						</div>
						
						<br>
						<div class="row">
							<div class="col-sm-12">

								{!! Form::submit('Сохранить', ['','btn btn-lg btn-primary btn-no-waves']) !!}
								
								@if($company->project)
									<br>
									<br>
									<hr>
									<a class="btn btn-sm btn-default" href="{{ route('admin.project.edit', ['id'=>$company->project->id]) }}">Редактировать проект</a>
									<br>
									<hr>
									<br>
								@else
									<br>
									<br>
									<hr>
									<a class="btn btn-sm btn-default" href="{{ route('admin.project.create', ['company_id'=>$company->id]) }}">Добавить проект</a>
									<br>
									<hr>
									<br>
								@endif
								
							</div>
						</div>
						
					</div>
				</div>

		{!! Form::close() !!}
				
		</div>
	</div>
	
@stop

@section('scripts')
	
	{!! HTML::script('ckeditor/ckeditor.js?f5=' . time() ) !!}
    <script src="/a/vendors/fileinput/fileinput.min.js"></script>
	
	<script>
	
	CKEDITOR.timestamp={{ time() }};

	var configCoInfo = {
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
	CKEDITOR.replace('company_info', configCoInfo);
	


  </script>
	
@stop