@extends('iteam.template')

@section('title')
    {{--{{ @$page->meta_title ? $page->meta_title . ' ' : (@$page->title ? $page->title . ' ' : '') }}--}}
    Как создать систему управления процессами за 4 месяца
@stop

@section('main')
    <div class="row">
        <h2 class="text-center">Тест для мастер класса «Как создать систему управления процессами за 4 месяца»</h2>
        <p>Тест содержит 10 вопросов по материалам мастер-класса. Слушатели, давшие правильные ответы на 8 вопросов из 10 получают сертификат участника мастер-класса «Как создать систему управления процессами за 4 месяца».
        </p>
    </div>
    <div class="row" style="margin-top: 30px">
        <div class="box">
            <ol>
                <form action="{{ route('master-test.system') }}" method="get" id="formqw">
                    {{ csrf_field() }}
                    <p style="margin-top: 40px;">
                        <i id="q1"></i>1. Сколько этапов включает предложенная iTeam дорожная карта внедрения основных элементов системы управления процессами?
                    </p>
                    <ul style="margin-left: 50px; list-style-type: none">
                        <li>
                            <input type="checkbox" name="q1v1"> Восемь
                        </li>
                        <li>
                            <input type="checkbox" name="q1v2"> Девять
                        </li>
                        <li>
                            <input type="checkbox" name="q1v3"> Десять
                        </li>
                        <li>
                            <input type="checkbox" name="q1v4"> Одиннадцать
                        </li>
                        <li>
                            <input type="checkbox" name="q1v5"> Двенадцать
                        </li>
                    </ul>
                    <p style="margin-top: 40px;">
                        <i id="q2"></i>2. Среди перечисленных ниже типов процессов один лишний. Укажите, какой.
                    </p>
                    <ul style="margin-left: 50px; list-style-type: none">
                        <li>
                            <input type="checkbox" name="q2v1"> Основные процессы
                        </li>
                        <li>
                            <input type="checkbox" name="q2v2"> Обеспечивающие процессы
                        </li>
                        <li>
                            <input type="checkbox" name="q2v3"> Процессы планирования
                        </li>
                        <li>
                            <input type="checkbox" name="q2v4"> Процессы развития
                        </li>
                        <li>
                            <input type="checkbox" name="q2v5"> Процессы управления
                        </li>
                    </ul>
                    <p style="margin-top: 40px; list-style-type: none">
                        <i id="q3"></i>3. Почему необходимо привлекать сотрудников к созданию системы управления процессами. Укажите все правильные варианты.
                    </p>
                    <ul style="margin-left: 50px; list-style-type: none">
                        <li>
                            <input type="checkbox" name="q3v1"> Чтобы при разработке процессов учесть интересы всех сторон
                        </li>
                        <li>
                            <input type="checkbox" name="q3v2"> Чтобы развивать инициативу сотрудников
                        </li>
                        <li>
                            <input type="checkbox" name="q3v3"> Чтобы преодолеть сопротивление внедрению процессов
                        </li>
                        <li>
                            <input type="checkbox" name="q3v4"> Чтобы обучить сотрудников методам работы в процессах
                        </li>
                        <li>
                            <input type="checkbox" name="q3v5"> Чтобы снизить нагрузку на руководителей
                        </li>
                    </ul>
                    <p>
                        <i id="q4"></i>4. На какие вопросы необходимо ответить в ходе идентификации стратегии компании? Укажите все правильные варианты.
                    </p>
                    <ul style="margin-left: 50px; list-style-type: none">
                        <li>
                            <input type="checkbox" name="q4v1"> Кто является целевым клиентом компании?
                        </li>
                        <li>
                            <input type="checkbox" name="q4v2"> Чем мы должны отличаться от конкурентов?
                        </li>
                        <li>
                            <input type="checkbox" name="q4v3"> Как мы привлекаем клиентов?
                        </li>
                        <li>
                            <input type="checkbox" name="q4v4"> Какой должна быть численность отдела продаж?
                        </li>
                        <li>
                            <input type="checkbox" name="q4v5"> Какие цели компания стремится достичь на рынке?
                        </li>
                    </ul>
                    <p>
                        <i id="q5"></i>5. Какие положения должна содержать организационная концепция компании? Укажите все правильные варианты.
                    </p>
                    <ul style="margin-left: 50px; list-style-type: none">
                        <li>
                            <input type="checkbox" name="q5v1"> Состав процессов верхнего уровня
                        </li>
                        <li>
                            <input type="checkbox" name="q5v2"> Карта процессов
                        </li>
                        <li>
                            <input type="checkbox" name="q5v3"> Регламенты процессов
                        </li>
                        <li>
                            <input type="checkbox" name="q5v4"> Инструкции исполнителей
                        </li>
                        <li>
                            <input type="checkbox" name="q5v5"> Схема центров ответственности
                        </li>
                    </ul>
                    <p>
                        <i id="q6"></i>6. Среди перечисленных характеристик, определяемых в ходе идентификации процессов, одна лишняя. Укажите, какая.
                    </p>
                    <ul style="margin-left: 50px; list-style-type: none">
                        <li>
                            <input type="checkbox" name="q6v1"> Клиенты процесса
                        </li>
                        <li>
                            <input type="checkbox" name="q6v2"> Цели процесса
                        </li>
                        <li>
                            <input type="checkbox" name="q6v3"> Результаты процесса
                        </li>
                        <li>
                            <input type="checkbox" name="q6v4"> Проблемы процесса
                        </li>
                        <li>
                            <input type="checkbox" name="q6v5"> Поставщики процесса
                        </li>
                    </ul>
                    <p>
                        <i id="q7"></i>7. Среди перечисленных типов показателей процессов один лишний. Укажите, какой.
                    </p>
                    <ul style="margin-left: 50px; list-style-type: none">
                        <li>
                            <input type="checkbox" name="q7v1"> Результативность
                        </li>
                        <li>
                            <input type="checkbox" name="q7v2"> Эффективность
                        </li>
                        <li>
                            <input type="checkbox" name="q7v3"> Качество
                        </li>
                        <li>
                            <input type="checkbox" name="q7v4"> Процент брака
                        </li>
                        <li>
                            <input type="checkbox" name="q7v5"> Производительность
                        </li>
                    </ul>
                    <p>
                        <i id="q8"></i>8. Для чего разрабатывается модель процесса на этапе проектирования? Укажите все правильные варианты.
                    </p>
                    <ul style="margin-left: 50px; list-style-type: none">
                        <li>
                            <input type="checkbox" name="q8v1"> Чтобы согласовать интересы всех заинтересованных сторон
                        </li>
                        <li>
                            <input type="checkbox" name="q8v2"> Чтобы сформировать единое видение процесса всеми сторонами
                        </li>
                        <li>
                            <input type="checkbox" name="q8v3"> Чтобы определить последовательность действий в процессе и функции участников
                        </li>
                        <li>
                            <input type="checkbox" name="q8v4"> Чтобы выявить проблемы в процессе и наметить пути их решения
                        </li>
                        <li>
                            <input type="checkbox" name="q8v5"> Чтобы определить виновных в проблемах данного процесса
                        </li>
                    </ul>
                    <p>
                        <i id="q9"></i>9. Какие разделы не должен содержать регламент процесса?
                    </p>
                    <ul style="margin-left: 50px; list-style-type: none">
                        <li>
                            <input type="checkbox" name="q9v1"> Схема процесса
                        </li>
                        <li>
                            <input type="checkbox" name="q9v2"> Описание процесса
                        </li>
                        <li>
                            <input type="checkbox" name="q9v3"> Функции исполнителей
                        </li>
                        <li>
                            <input type="checkbox" name="q9v4"> KPI исполнителей процесса
                        </li>
                        <li>
                            <input type="checkbox" name="q9v5"> План совершенствования процесса
                        </li>
                    </ul>
                    <p>
                        <i id="q10"></i>10. Какие условия важны для успешного внедрения процессно-ориентированного подхода к управлению? Укажите все правильные варианты.
                    </p>
                    <ul style="margin-left: 50px; list-style-type: none">
                        <li>
                            <input type="checkbox" name="q10v1"> Постоянное внимание руководителя компании к проекту внедрения
                        </li>
                        <li>
                            <input type="checkbox" name="q10v2"> Вовлеченность сотрудников
                        </li>
                        <li>
                            <input type="checkbox" name="q10v3"> Следование проверенной методике
                        </li>
                        <li>
                            <input type="checkbox" name="q10v4"> Хорошо организованное управление проектом
                        </li>
                        <li>
                            <input type="checkbox" name="q10v5"> Удачное расположение звезд
                        </li>
                    </ul>
                    <input id="formtest" class="btn" type="submit" value="Получить результат" style="float: right">
                </form>
            </ol>
            {{ session('result') }}
        </div>
        <div id="pox" style="margin-top: 90px">

        </div>
        <form id="linkqw" action="https://iteam.ru/master-test/send-certificate/system" method="get" class="hidden">
            <input style="width:250px; height:30px; border:1px solid grey;margin-bottom:5px; text-align:center; font-size:14px;" type="text" type="text" name="name" placeholder="ФИО" required>
            <input style="width:180px; height:30px; border:none; border-radius:4px; margin-bottom:5px;background-color:#AD0011 !important;color:#fff;font-weight:bold;font-size:14px;" type="submit" value="Получить сертификат">
        </form>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script>
        $(document).ready(function () {
            $("#formqw").submit(function (e) {
                e.preventDefault();
                var data = $(this).serialize();
                $.ajax({
                    url: "master-test/system",
                    type: "get",
                    data: data,
                    success: function (response) {
                        $("#pox").empty();
                        $("#pox").append(response.text);
                        var q = 0;
                        for (var i = 1; i <= 10; i++) {
                            $("#q"+i).addClass('fa fa-close').css('color', 'red');
                        }
                        for (var j in response.true_answer) {
                            $("#q"+j).removeClass('fa fa-close');
                            $("#q"+j).addClass('fa fa-check').css('color', 'green');
                            q++;
                        }
                        if (q >= 8) {
                            $("#linkqw").removeClass("hidden");
                        } else {
                            $("#linkqw").addClass("hidden");
                        }
                    }
                });
            });
//            $("#linkqw").submit(function (e) {
//                e.preventDefault();
//                var data = $(this).serialize();
//                $.ajax({
//                    url: "master-test/send-certificate",
//                    type: "get",
//                    data: data,
//                    success: function (response) {
//                        $("#pox").append(response.text);
//                    }
//                });
//            });
        });
    </script>
@stop



