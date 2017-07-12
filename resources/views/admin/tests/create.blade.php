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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.5.5/tinymce.min.js"></script>
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">

@stop

@section('main')

    <div class="block-header">
        <h2><i class="zmdi zmdi-store"></i> {{ link_to_route('admin.test.index','Тесты') }} &rarr; Создать</h2>
    </div>

    <div class="card">
        <div class="card-body card-padding">
            <div id="accordion">
                @foreach($testsType as $testType)
                    <h3>{{ $testType->name }}</h3>
                    <form action="{{ route('admin.test.create', ['id' => $testType->id]) }}" method="post">
                        {{ csrf_field() }}
                        <div class="fg-line form-group">
                            <span>Название теста</span>
                            <input class="form-control" type="text" name="name">
                        </div>

                        <div class="fg-line form-group">
                            <span>Краткое описание теста</span>
                            <input class="form-control" type="text" name="short_description">
                        </div>
                        <div class="fg-line form-group">
                            <span>Описание теста</span>
                            <textarea class="form-control" name="description" id="" cols="30" rows="12"></textarea>
                        </div>
                        <input type="submit" value="Создать">
                    </form>
                @endforeach
            </div>
        </div>
    </div>

@stop

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script>
        $( "#accordion" ).accordion({
            animate: 200
        });
    </script>
    <script>
        tinymce.init({
            selector: 'textarea',
            height: 200,
            menubar: false,
            plugins: [
                'advlist autolink lists link image charmap print preview anchor',
                'searchreplace visualblocks code fullscreen',
                'insertdatetime media table contextmenu paste code'
            ],
            toolbar: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
            content_css: '//www.tinymce.com/css/codepen.min.css'
        });
    </script>
@stop