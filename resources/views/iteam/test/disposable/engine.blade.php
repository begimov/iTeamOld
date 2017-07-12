@extends('iteam.template')

@section('title')
    {{--{{ @$page->meta_title ? $page->meta_title . ' ' : (@$page->title ? $page->title . ' ' : '') }}--}}
    Инженерный подход к созданию системы управления процессами
@stop

@section('main')
    <div class="row">
        <h2 class="text-center">Тест для мастер класса «Инженерный подход к созданию системы управления процессами»</h2>
        <p>Тест содержит 10 вопросов по материалам мастер-класса.</p>
        <p>Слушатели, давшие правильные ответы на 8 вопросов из 10 получают сертификат участника мастер-класса «Инженерный подход к внедрению системы управления процессами».</p>
    </div>
    <div class="row" style="margin-top: 30px">
        <div class="box">
            <ol>
                <form action="{{ route('master-test.engine') }}" method="get" id="formqw">
                    {{ csrf_field() }}
                    <p style="margin-top: 40px;">
                        <i id="q1"></i>1.	Какие задачи необходимо решить для создания системы управления процессами. Укажите все правильные варианты.
                    </p>
                    <ul style="margin-left: 50px; list-style-type: none">
                        <li>
                            <input type="checkbox" name="q1v1"> Выявить процессы, необходимые для управления организацией
                        </li>
                        <li>
                            <input type="checkbox" name="q1v2"> Определить последовательность процессов и их взаимосвязь
                        </li>
                        <li>
                            <input type="checkbox" name="q1v3"> Определить критерии и методы измерения результативности процессов
                        </li>
                        <li>
                            <input type="checkbox" name="q1v4"> Наблюдать, измерять и анализировать процессы
                        </li>
                        <li>
                            <input type="checkbox" name="q1v5"> Организовать систему непрерывного совершенствования процессов
                        </li>
                    </ul>
                    <p style="margin-top: 40px;">
                        <i id="q2"></i>2.	В чем причины неудачных попыток внедрения KPI? Укажите все правильные варианты.
                    </p>
                    <ul style="margin-left: 50px; list-style-type: none">
                        <li>
                            <input type="checkbox" name="q2v1"> KPI сотрудников не связаны с показателями процессов, в которых они являются исполнителями
                        </li>
                        <li>
                            <input type="checkbox" name="q2v2"> Сотрудники не участвуют в разработке KPI
                        </li>
                        <li>
                            <input type="checkbox" name="q2v3"> При внедрении KPI не проводится обучение сотрудников и разъяснение всех особенностей работы в новых условиях
                        </li>
                        <li>
                            <input type="checkbox" name="q2v4"> Целевые значения KPI устанавливаются произвольно, сотрудники не понимают как их достичь
                        </li>
                        <li>
                            <input type="checkbox" name="q2v5"> Руководители устраняются от управления, отправляя сотрудников в погоню за показателями
                        </li>
                    </ul>
                    <p style="margin-top: 40px; list-style-type: none">
                        <i id="q3"></i>3.	Почему необходимо привлекать сотрудников к созданию системы управления процессами. Укажите все правильные варианты.
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
                        <i id="q4"></i>4.	Какие формы участия сотрудников в создании системы управления процессами необходимо использовать? Укажите все правильные варианты.
                    </p>
                    <ul style="margin-left: 50px; list-style-type: none">
                        <li>
                            <input type="checkbox" name="q4v1"> Обсуждение и анализ проблем, препятствующих достижению лучших результатов
                        </li>
                        <li>
                            <input type="checkbox" name="q4v2"> Определение процессов и выявление клиентов и поставщиков в каждом процессе
                        </li>
                        <li>
                            <input type="checkbox" name="q4v3"> Определение показателей процессов
                        </li>
                        <li>
                            <input type="checkbox" name="q4v4"> Разработка схем процессов и определение порядка взаимодействия всех участников
                        </li>
                        <li>
                            <input type="checkbox" name="q4v5"> Изучение недостатков в процессах и осуществление мероприятий по их улучшению
                        </li>
                    </ul>
                    <p>
                        <i id="q5"></i>5.	Как добиться выполнения регламентов процессов? Укажите все правильные варианты.
                    </p>
                    <ul style="margin-left: 50px; list-style-type: none">
                        <li>
                            <input type="checkbox" name="q5v1"> Проводить обучение сотрудников методам работы по новым регламентам
                        </li>
                        <li>
                            <input type="checkbox" name="q5v2"> Проводить обучение новых сотрудников методам работы по регламентам
                        </li>
                        <li>
                            <input type="checkbox" name="q5v3"> Проводить анализ проблем в работе сотрудников и актуализировать регламенты
                        </li>
                        <li>
                            <input type="checkbox" name="q5v4"> Добиваться сознательного отношения сотрудников к выполнению регламентов
                        </li>
                        <li>
                            <input type="checkbox" name="q5v5"> Обеспечить систематический контроль и разбор нарушений регламентов
                        </li>
                    </ul>
                    <p>
                        <i id="q6"></i>6.	Какие области управления оказывают влияние на систему управления процессами? Укажите все правильные варианты.
                    </p>
                    <ul style="margin-left: 50px; list-style-type: none">
                        <li>
                            <input type="checkbox" name="q6v1"> Стратегическое управление
                        </li>
                        <li>
                            <input type="checkbox" name="q6v2"> Целеполагание (установление целей на долгосрочный, среднесрочный и краткосрочный периоды и контроль их достижения)
                        </li>
                        <li>
                            <input type="checkbox" name="q6v3"> Формирование и изменение организационной структуры
                        </li>
                        <li>
                            <input type="checkbox" name="q6v4"> Корпоративная культура
                        </li>
                        <li>
                            <input type="checkbox" name="q6v5"> Влияние на процессы со стороны других подсистем управления можно не учитывать
                        </li>
                    </ul>
                    <p>
                        <i id="q7"></i>7.	Какую роль играет продуктивная корпоративная культура при построении системы управления процессами? Укажите все правильные варианты.
                    </p>
                    <ul style="margin-left: 50px; list-style-type: none">
                        <li>
                            <input type="checkbox" name="q7v1"> Создает основу для доверия и сотрудничества при проведении изменений и внедрении процессного подхода
                        </li>
                        <li>
                            <input type="checkbox" name="q7v2"> Помогает преодолевать барьеры во взаимодействии  между подразделениями
                        </li>
                        <li>
                            <input type="checkbox" name="q7v3"> Способствует нахождению решений при возникновении ситуаций, не отраженных в регламентах
                        </li>
                        <li>
                            <input type="checkbox" name="q7v4"> Способствует пробуждению инициатив, направленных на улучшение процессов
                        </li>
                        <li>
                            <input type="checkbox" name="q7v5"> Никак не влияет
                        </li>
                    </ul>
                    <p>
                        <i id="q8"></i>8.	Какую роль играет стратегия при построении системы управления процессами? Укажите все правильные варианты.
                    </p>
                    <ul style="margin-left: 50px; list-style-type: none">
                        <li>
                            <input type="checkbox" name="q8v1"> Определяет требования к процессной структуре компании
                        </li>
                        <li>
                            <input type="checkbox" name="q8v2"> Определяет требования к целям процессов
                        </li>
                        <li>
                            <input type="checkbox" name="q8v3"> Определяет требования к результатам процессов
                        </li>
                        <li>
                            <input type="checkbox" name="q8v4"> Определяет направления совершенствования процессов
                        </li>
                        <li>
                            <input type="checkbox" name="q8v5"> Никак не влияет
                        </li>
                    </ul>
                    <p>
                        <i id="q9"></i>9.	Какие условия важны для успешного внедрения процессно-ориентированного подхода к управлению? Укажите все правильные варианты.
                    </p>
                    <ul style="margin-left: 50px; list-style-type: none">
                        <li>
                            <input type="checkbox" name="q9v1"> Постоянное внимание руководителя компании к проекту внедрения
                        </li>
                        <li>
                            <input type="checkbox" name="q9v2"> Вовлеченность сотрудников
                        </li>
                        <li>
                            <input type="checkbox" name="q9v3"> Следование проверенной методике
                        </li>
                        <li>
                            <input type="checkbox" name="q9v4"> Хорошо организованное управление проектом
                        </li>
                        <li>
                            <input type="checkbox" name="q9v5"> Удачное расположение звезд
                        </li>
                    </ul>
                    <p>
                        <i id="q10"></i>10.	Сколько этапов включает предложенная iTeam дорожная карта внедрения основных элементов системы управления процессами?
                    </p>
                    <ul style="margin-left: 50px; list-style-type: none">
                        <li>
                            <input type="checkbox" name="q10v1"> Восемь
                        </li>
                        <li>
                            <input type="checkbox" name="q10v2"> Девять
                        </li>
                        <li>
                            <input type="checkbox" name="q10v3"> Десять
                        </li>
                        <li>
                            <input type="checkbox" name="q10v4"> Одиннадцать
                        </li>
                        <li>
                            <input type="checkbox" name="q10v5"> Двенадцать
                        </li>
                    </ul>
                    <input id="formtest" class="btn" type="submit" value="Получить результат" style="float: right">
                </form>
            </ol>
            {{ session('result') }}
        </div>
        <div id="pox" style="margin-top: 90px">

        </div>
        <form id="linkqw" action="https://iteam.ru/master-test/send-certificate/engine" method="get" class="hidden">
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
                    url: "master-test/engine",
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



