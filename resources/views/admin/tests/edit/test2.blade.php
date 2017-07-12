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
        <h2><i class="zmdi zmdi-store"></i> {{ link_to_route('admin.test.index','Тесты') }} &rarr; Создать</h2>
    </div>

    <div class="card">
        <div class="card-body card-padding">

            <div class="container">
                <div class="row">
                    <h2>Редактировать основную информацию о тесте</h2>
                    <form action="{{ route('admin.test.update.base', ['id' => $test->id]) }}" method="post" style="border: 1px solid darkgrey; border-radius: 5px; padding: 20px">
                        <div class="fg-line form-group">
                            <span><b>Название теста</b></span>
                            <input class="form-control" type="text" name="name" value="{{ $test->name }}" style="width: 100%">
                        </div>
                        <div class="fg-line form-group">
                            <span><b>Описание теста</b></span>
                            <textarea class="form-control" name="description" id=""style="width: 100%; height: 100px">{{ $test->description }}</textarea>
                        </div>
                        <button type="submit" class="btn">Сохранить</button>
                    </form>
                </div>
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
                                <div class="col-md-11" style="border: 1px solid darkgrey; border-radius: 5px; padding: 20px; margin-bottom: 30px">
                                    <li><b>Вопрос: </b></li>
                                    <div class="fg-line form-group">
                                        <input class="form-control" type="text" name="name" value="{{ $question->name }}" style="width: 100%">
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
@stop