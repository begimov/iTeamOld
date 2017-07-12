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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.5.5/tinymce.min.js"></script>

@stop

@section('main')

    <div class="block-header">
        <h2><i class="zmdi zmdi-store"></i> {{ link_to_route('admin.test.index','Тесты') }} &rarr; {{ $test->name }}</h2>
    </div>

    <div class="card">
        <div class="card-body card-padding">

            <div role="tabpanel">
                <ul class="tab-nav" role="tablist">
                    <li class="active"><a href="#basic" aria-controls="basic" role="tab" data-toggle="tab">Редактировать основную информацию</a></li>
                    <li><a href="#conditions" aria-controls="conditions" role="tab" data-toggle="tab">Условия подсчета результата теста</a></li>
                    <li><a href="#add" aria-controls="add" role="tab" data-toggle="tab">Добавить новый вопрос</a></li>
                    <li><a href="#seo" aria-controls="seo" role="tab" data-toggle="tab"><small>SEO и настройки</small></a></li>
                </ul>
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="basic">
                        <div class="container">
                            <div class="row">
                                <h2>Редактировать основную информацию о тесте</h2>
                                <form action="{{ route('admin.test.update.base', ['id' => $test->id]) }}" method="post" style="border: 1px solid darkgrey; border-radius: 5px; padding: 20px">
                                    {{ csrf_field() }}
                                    <div class="fg-line form-group">
                                        <span><b>Название теста</b></span>
                                        <input class="form-control" type="text" name="name" value="{{ $test->name }}" style="width: 100%">
                                    </div>
                                    <div class="fg-line form-group">
                                        <span><b>Короткое описание</b></span>
                                        <input class="form-control" type="text" name="short_description" value="{{ $test->short_description }}" style="width: 100%">
                                    </div>
                                    <div class="fg-line form-group">
                                        <span><b>Описание теста</b></span>
                                        <textarea class="form-control" name="description" id=""style="width: 100%; height: 100px">{!! $test->description !!}</textarea>
                                    </div>
                                    <div class="fg-line form-group">
                                        <span><b>Стоимость теста</b></span>
                                        <input class="form-control" type="text" name="price" value="{{ $test->price }}" style="width: 100%">
                                    </div>
                                    <button type="submit" class="btn">Сохранить</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane conditions" id="conditions">
                        <div class="container">
                            <div class="row">
                                <h2>Условия подсчета результата теста</h2>
                                <form action="{{ route('admin.test.update.condition', ['id' => $test->id]) }}" method="post" style="border: 1px solid darkgrey; border-radius: 5px; padding: 20px">
                                    {{ csrf_field() }}
                                    <div class="fg-line form-group">
                                        <span><b>< 40% (Неудовлетворительно)</b></span>
                                        <textarea class="form-control" name="condition[]" id="" style="width: 100%; height: 100px">{{ isset(unserialize($test->condition)[0]) ? unserialize($test->condition)[0] : ""}}</textarea>
                                        {{--<input class="form-control" type="text" name="condition[]" value="{{ isset(unserialize($test->condition)[0]) ? unserialize($test->condition)[0] : ""}}" style="width: 100%">--}}
                                    </div>
                                    <div class="fg-line form-group">
                                        <span><b>40-60% (Удовлетворительно)</b></span>
                                        <textarea class="form-control" name="condition[]" id="" style="width: 100%; height: 100px">{{ isset($test->condition[1]) ? unserialize($test->condition)[1] : "" }}</textarea>
                                        {{--<input class="form-control" type="text" name="condition[]" value="{{ isset($test->condition[1]) ? unserialize($test->condition)[1] : "" }}" style="width: 100%">--}}
                                    </div>
                                    <div class="fg-line form-group">
                                        <span><b>60-80% (Хорошо)</b></span>
                                        <textarea class="form-control" name="condition[]" id="" style="width: 100%; height: 100px">{{ isset($test->condition[2]) ? unserialize($test->condition)[2] : "" }}</textarea>
                                        {{--<input class="form-control" type="text" name="condition[]" value="{{ isset($test->condition[2]) ? unserialize($test->condition)[2] : "" }}" style="width: 100%">--}}
                                    </div><div class="fg-line form-group">
                                        <span><b>80-100% (Отлично)</b></span>
                                        <textarea class="form-control" name="condition[]" id="" style="width: 100%; height: 100px">{{ isset($test->condition[3]) ? unserialize($test->condition)[3] : "" }}</textarea>
                                        {{--<input class="form-control" type="text" name="condition[]" value="{{ isset($test->condition[3]) ? unserialize($test->condition)[3] : "" }}" style="width: 100%">--}}
                                    </div>
                                    <button type="submit" class="btn">Сохранить</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="add">
                        <div class="container">
                            <div class="row">
                                <h2>Добавить новый вопрос</h2>
                                <form action="{{ route('admin.test.add.question', ['id' => $test->id]) }}" method="post" style="border: 1px solid darkgrey; border-radius: 5px; padding: 20px">
                                    {{ csrf_field() }}
                                    <div class="fg-line form-group">
                                        <input class="form-control" style="width: 100%" type="text" name="question">
                                    </div>
                                    <button type="submit" class="btn">Добавить</button>
                                </form>
                            </div>
                            <div class="row">
                                <h2>Список вопросов</h2>
                                <ol>
                                    @foreach($test_questions as $question)
                                        <form action="{{ route('admin.test.update.question', ['id' => $question->id]) }}" method="post">
                                            {{ csrf_field() }}
                                            <div class="col-md-11" style="border: 1px solid darkgrey; border-radius: 5px; padding: 20px; margin-bottom: 30px">
                                                <li><b>Вопрос: </b></li>
                                                <div class="fg-line form-group">
                                                    <input class="form-control" type="text" name="name" value="{{ $question->name }}" style="width: 100%">
                                                </div>
                                                <b>Вес вопроса: </b>
                                                <div class="fg-line form-group">
                                                    <input class="form-control" type="text" name="weight" value="{{ $question->weight }}" style="width: 100%">
                                                </div>
                                            </div>
                                            <div class="col-md-1 other1">
                                                <button type="submit" class="btn glyphicon glyphicon-ok" style="margin-bottom: 10px"></button>
                                                <a href="{{ route('admin.test.destroy.question', ['id' => $question->id]) }}" class="btn btn-danger glyphicon glyphicon-remove"></a>
                                            </div>
                                        </form>
                                    @endforeach
                                </ol>
                            </div>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="seo">
                        <div class="container">
                            <div class="row">
                                <h2>Редактировать SEO</h2>
                                <form action="{{ route('admin.test.update.seo', ['id' => $test->id]) }}" method="post" style="border: 1px solid darkgrey; border-radius: 5px; padding: 20px">
                                    {{ csrf_field() }}
                                    <div class="fg-line form-group">
                                        <span><b>Title</b></span>
                                        <input class="form-control" type="text" name="meta_title" value="{{ $test->meta_title }}">
                                    </div>

                                    <div class="fg-line form-group">
                                        <span><b>Meta-description</b></span>
                                        <input class="form-control" type="text" name="meta_description" value="{{ $test->meta_description }}">
                                    </div>

                                    <div class="fg-line form-group">
                                        <span><b>Meta-keywords</b></span>
                                        <input class="form-control" type="text" name="meta_keywords" value="{{ $test->meta_keywords }}">
                                    </div>

                                    <button type="submit" class="btn">Сохранить</button>
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
    <script>
        var i = 2;
        $('#clone').click(function (e) {
            e.preventDefault();
            $('#true_answer option:first').clone().val(i).text(i).appendTo('#true_answer');
            $('#container span:first').clone().html('<b>' + i + '.</b> Вариант ответа').appendTo('#container');
            $('#opt').clone().attr('name', 'option[]').appendTo('#container');
            i++;
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