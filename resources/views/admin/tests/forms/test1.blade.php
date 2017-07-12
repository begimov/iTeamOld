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
                    <h1 class="text-center">{{ $test->name }}</h1>
                    <p>{{ $test->description }}</p>
                </div>
                <div class="row">
                    <h2 class="text-center">Перечень вопросов</h2>
                    <ol>
                        @foreach($test_questions as $question)
                                <li>
                                    <b>Вопрос: </b> {{ $question->name }}<br>
                                    <b>Варианты ответа: </b>
                                    <ol>
                                        @foreach(unserialize($question->option) as $quest)
                                            <li>{{ $quest }}</li>
                                        @endforeach
                                    </ol>
                                    <br>
                                    <b>Правильный ответ:</b>
                                    {{ unserialize($question->option)[$question->true_answer] }}
                                </li>
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
            $('#opt').clone().attr('name', 'option[' + i + ']').appendTo('#container');
            i++;
        });
    </script>
@stop