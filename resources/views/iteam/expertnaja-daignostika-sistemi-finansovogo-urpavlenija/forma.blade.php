<?php
////require_once 'PHPExcel-1.8/Classes/PHPExcel.php';
//
//if ($_POST['submit']) {
//
//
//    foreach ($arr as $k => $v) {
//        /* Каждый раз делаем активной 1-ю страницу и получаем её, потом записываем в неё данные */
//        $page->setCellValue("F1", "АНКЕТА");
//        $page->setCellValue("F2", $_POST['email']);
//        $page->setCellValue("A3", "Вопрос");
//        $page->setCellValue("B3", "Ответ");
//        $page->setCellValue("C3", "Кмментарий");
//        $page->setCellValue("A" . $count, $k);
//        $page->setCellValue("B" . $count, $v[0]);
//        $page->setCellValue("C" . $count, $v[1]);
//
//        $count++;
//    }
//    $page->setTitle("Test"); // Ставим заголовок "Test" на странице
//    /* Начинаем готовиться к записи информации в xlsx-файл */
//    $objWriter = PHPExcel_IOFactory::createWriter($phpexcel, 'Excel2007');
//    /* Записываем в файл */
//    $objWriter->save("forma.xlsx");
//
//}
?>
        <!DOCTYPE html>
<html>
<head>
    <title>Экспертная диагностика системы финансового управления</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="description" content="ITeam"/>
    <meta name="keywords" content="ITeam"/>

    <meta property="og:image" content="/images/logo.gif"/>
    <meta property="og:title" content="Разработка стратегии шаг за шагом"/>
    <meta property="og:description"
          content='Рекомендую бесплатный мастер-класс "Разработка стратегии шаг за шагом" консалтинговой компании iTeam'/>

    <link rel="shortcut icon" href="/favicon.ico"/>
    <style type="text/css">
        * {
            background-attachment: scroll;
            background-color: rgba(0, 0, 0, 0);
            background-position: 95% center;
            background-repeat: no-repeat;
            margin: 0;
            padding: 0;
        }

        body {
            background-color: #EFEFEF;
            color: #003366;
            font: 20px Times New Roman, serif;
            margin: 0;
            max-width: 1280px;
            min-height: 100%;
            min-width: 960px;
            padding: 0;
        }

        table, tr, td, th {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 5px;
        }

        #body {
            width: 800px;
            overflow: hidden;
        }

        #header {
            position: relative;
            height: 96px;
            margin: 0;
            width: 100%;
        }

        #logo {
            height: 70px;
            margin: 0 auto;
            width: 140px;
        }

        .logo {
            width: 200px;
            height: 70px;
            background: url('data:image/png;base64,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') no-repeat scroll 0 -70px transparent;
            font: 70px/70px Arial, Verdana sans-serif;
            text-indent: 201px;
            display: block;
            overflow: hidden;
            border: 0 none;
            text-decoration: none;
            color: #202;
            letter-spacing: 35px;
        }

        .logo:hover {
            background: url('data:image/png;base64,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') no-repeat scroll 0 0 transparent;
        }

        #logo:hover {
            cursor: default;
        }

        a.logo:hover {
            cursor: pointer;
        }

        #wrapper {
            clear: both;
            float: none;
        }

        s {
            text-decoration: none;
        }

        #page {
            background-color: #FFFFFF;
            margin: 40px auto;
            padding: 40px;
            width: 800px;
        }

        p {
            padding: 0 0 16px;
        }

        p big {
            color: rgb(204, 0, 0);
            font-size: 22px;
            line-height: 26px;
            margin: 0 0 32px;
            display: block;
        }

        .block {
            display: block;
        }

        #main .button_block {
            display: block;
            padding: 20px 0;
            position: relative;
        }

        #main .button_block a {
            background-color: rgb(221, 0, 17);
            border-radius: 8px;
            color: rgb(255, 255, 255);
            display: block;
            font: 18px/1 sans-serif;
            margin: 0 auto;
            padding: 8px;
            text-align: center;
            text-decoration: none;
            width: 250px;
        }

        #main .button_block a:hover {
            background-color: rgb(221, 0, 0);
        }

        .more {
            background-color: rgb(239, 239, 239);
            margin: 0 0 24px;
            padding: 24px;
            text-align: center;
        }

        .more h1, .more h2 {
            color: rgb(204, 0, 0);
            line-height: 1.4;
        }

        .button10 {
            display: inline-block;
            color: black;
            font-size: 125%;
            font-weight: 700;
            text-decoration: none;
            user-select: none;
            padding: .25em .5em;
            outline: none;
            border: 1px solid rgb(250, 172, 17);
            border-radius: 7px;
            background: rgb(255, 212, 3) linear-gradient(rgb(255, 212, 3), rgb(248, 157, 23));
            box-shadow: inset 0 -2px 1px rgba(0, 0, 0, 0), inset 0 1px 2px rgba(0, 0, 0, 0), inset 0 0 0 60px rgba(255, 255, 0, 0);
            transition: box-shadow .2s, border-color .2s;
        }

        .button10:hover {
            box-shadow: inset 0 -1px 1px rgba(0, 0, 0, 0), inset 0 1px 2px rgba(0, 0, 0, 0), inset 0 0 0 60px rgba(255, 255, 0, .5);
        }

        .button10:active {
            padding: calc(.25em + 1px) .5em calc(.25em - 1px);
            border-color: rgba(177, 159, 0, 1);
            box-shadow: inset 0 -1px 1px rgba(0, 0, 0, .1), inset 0 1px 2px rgba(0, 0, 0, .3), inset 0 0 0 60px rgba(255, 255, 0, .45);
        }

    </style>
    <script type="text/javascript" src="//code.jquery.com/jquery-latest.js"></script>
</head>
<body>
<div id="page">
    <div id="body">
        <div id="header">

            <div id="logo">
                <a class="logo" href="/">ITeam</a>
            </div>

        </div>
        <div id="wrapper">
            <h1 style="text-align: center">Анкета</h1>
            <h2 style="text-align: center">ЭКСПЕРТНАЯ ДИАГНОСТИКА СИСТЕМЫ ФИНАНСОВОГО УПРАВЛЕНИЯ</h2>
            <form method="post" action="{{ route('emailTest.EmailSend.sendMail') }}">
                {{--<form method="post">--}}
                <table>
                    <tr>
                        <th colspan="4">I. Общие сведения</th>
                    </tr>
                    <tr>
                        <th>№</th>
                        <th>Вопрос</th>
                        <th>Ответ</th>
                        <th>Комментарий</th>
                    </tr>
                    <tr>
                        <td>1.</td>
                        <td><label for="q1">Сколько в вашей компании юридических лиц</label></td>
                        <td><input id="q1" type="text" name="q[Сколько в вашей компании юридических лиц][]"></td>
                        <td><label><textarea name="q[Сколько в вашей компании юридических лиц][]"></textarea></label>
                        </td>
                    </tr>
                    <tr>
                        <td>2.</td>
                        <td><label for="q2">Количество банковских счетов</label></td>
                        <td><input id="q2" type="text" name="q[Количество банковских счетов][]"></td>
                        <td><label><textarea name="q[Количество банковских счетов][]"></textarea></label></td>
                    </tr>
                    <tr>
                        <td>3.</td>
                        <td><label for="q3">Число видов деятельности (БЕ - бизнес-единиц)</label></td>
                        <td><input id="q3" type="text" name="q[Число видов деятельности (БЕ - бизнес-единиц)][]"></td>
                        <td><label><textarea
                                        name="q[Число видов деятельности (БЕ - бизнес-единиц)][]"></textarea></label>
                        </td>
                    </tr>
                    <tr>
                        <td>4.</td>
                        <td><label for="q4">Количество центров доходов (БН - бизнес направлений)</label></td>
                        <td><input id="q4" type="text" name="q[Количество центров доходов (БН - бизнес направлений)][]">
                        </td>
                        <td><label><textarea
                                        name="q[Количество центров доходов (БН - бизнес направлений)][]"></textarea></label>
                        </td>
                    </tr>
                    <tr>
                        <td>5.</td>
                        <td><label for="q5">Оцените среднее количество поступлений от покупателей за месяц</label></td>
                        <td><input id="q5" type="text"
                                   name="q[Оцените среднее количество поступлений от покупателей за месяц][]"></td>
                        <td><label><textarea
                                        name="q[Оцените среднее количество поступлений от покупателей за месяц][]"></textarea></label>
                        </td>
                    </tr>
                    <tr>
                        <td>6.</td>
                        <td><label for="q6">Оцените среднее число расходных банковских операций в месяц</label></td>
                        <td><input id="q6" type="text"
                                   name="q[Оцените среднее число расходных банковских операций в месяц][]"></td>
                        <td><label><textarea
                                        name="q[Оцените среднее число расходных банковских операций в месяц][]"></textarea></label>
                        </td>
                    </tr>
                    <tr>
                        <th colspan="4">II. Оценка финансового состояния</th>
                    </tr>
                    <tr>
                        <th>№</th>
                        <th>Вопрос</th>
                        <th>Ответ</th>
                        <th>Комментарий</th>
                    </tr>
                    <tr>
                        <td>1.</td>
                        <td><label for="q7">Оцените оборот вашего бизнеса (продажи млн руб в год)</label></td>
                        <td><input id="q7" type="text"
                                   name="q[Оцените оборот вашего бизнеса (продажи млн руб в год)][]"></td>
                        <td><label><textarea
                                        name="q[Оцените оборот вашего бизнеса (продажи млн руб в год)][]"></textarea></label>
                        </td>
                    </tr>
                    <tr>
                        <td>2.</td>
                        <td><label for="q8">Оцените произвоственную маржу (мнн руб в год)</label></td>
                        <td><input id="q8" type="text" name="q[Оцените произвоственную маржу (мнн руб в год)][]"></td>
                        <td><label><textarea
                                        name="q[Оцените произвоственную маржу (мнн руб в год)][]"></textarea></label>
                        </td>
                    </tr>
                    <tr>
                        <td>3.</td>
                        <td><label for="q9">Оцените операцинную прибыль (млн руб в год)</label></td>
                        <td><input id="q9" type="text" name="q[Оцените операцинную прибыль (млн руб в год)][]"></td>
                        <td><label><textarea name="q[Оцените операцинную прибыль (млн руб в год)][]"></textarea></label>
                        </td>
                    </tr>
                    <tr>
                        <td>4.</td>
                        <td><label for="q10">Оцените чистую прибыль (млн руб в год)</label></td>
                        <td><input id="q10" type="text" name="q[Оцените чистую прибыль (млн руб в год)][]"></td>
                        <td><label><textarea name="q[Оцените чистую прибыль (млн руб в год)][]"></textarea></label></td>
                    </tr>
                    <tr>
                        <td>5.</td>
                        <td><label for="q11">Как можно охарактеризовать ваш бизнес - розница, оптовые продажи,
                                производство, услуги, проектная деятельность</label></td>
                        <td><input id="q11" type="text" name="q[Как можно охарактеризовать ваш бизнес - розница, оптовые продажи,
                                производство, услуги, проектная деятельность][]"></td>
                        <td><label><textarea name="q[Как можно охарактеризовать ваш бизнес - розница, оптовые продажи,
                                производство, услуги, проектная деятельность][]"></textarea></label></td>
                    </tr>
                    <tr>
                        <td>6.</td>
                        <td><label for="q12">Оцените сумму расходов на персонал (ФОТ) млн руб в год</label></td>
                        <td><input id="q12" type="text"
                                   name="q[Оцените сумму расходов на персонал (ФОТ) млн руб в год][]"></td>
                        <td><label><textarea
                                        name="q[Оцените сумму расходов на персонал (ФОТ) млн руб в год][]"></textarea></label>
                        </td>
                    </tr>
                    <tr>
                        <th colspan="4">III. Источники финансирования</th>
                    </tr>
                    <tr>
                        <th>№</th>
                        <th>Вопрос</th>
                        <th>Ответ</th>
                        <th>Комментарий</th>
                    </tr>
                    <tr>
                        <td>1.</td>
                        <td><label for="q13">Оцените максимальную величину кассового разрыва (млн руб)</label></td>
                        <td><input id="q13" type="text"
                                   name="q[Оцените максимальную величину кассового разрыва (млн руб)][]"></td>
                        <td><label><textarea
                                        name="q[Оцените максимальную величину кассового разрыва (млн руб)][]"></textarea></label>
                        </td>
                    </tr>
                    <tr>
                        <td>2.</td>
                        <td><label for="q14">Оцените средний объем привлечение кредитов (млн руб в год)</label></td>
                        <td><input id="q14" type="text"
                                   name="q[Оцените средний объем привлечение кредитов (млн руб в год)][]"></td>
                        <td><label><textarea
                                        name="q[Оцените средний объем привлечение кредитов (млн руб в год)][]"></textarea></label>
                        </td>
                    </tr>
                    <tr>
                        <td>3.</td>
                        <td><label for="q15">Оцените банковские проценты (млн руб в год)</label></td>
                        <td><input id="q15" type="text" name="q[Оцените банковские проценты (млн руб в год)][]"></td>
                        <td><label><textarea name="q[Оцените банковские проценты (млн руб в год)][]"></textarea></label>
                        </td>
                    </tr>
                    <tr>
                        <td>4.</td>
                        <td><label for="q16">Оцените динамику ДЗ покупателей по месяцам млн руб</label></td>
                        <td><input id="q16" type="text" name="q[Оцените динамику ДЗ покупателей по месяцам млн руб][]">
                        </td>
                        <td><label><textarea name="q[Оцените динамику ДЗ покупателей по месяцам млн руб][]"></textarea></label>
                        </td>
                    </tr>
                    <tr>
                        <td>5.</td>
                        <td><label for="q17">Оцените динамику авансов от покупателей КЗ 61 счет млн руб</label></td>
                        <td><input id="q17" type="text"
                                   name="q[Оцените динамику авансов от покупателей КЗ 61 счет млн руб][]"></td>
                        <td><label><textarea
                                        name="q[Оцените динамику авансов от покупателей КЗ 61 счет млн руб][]"></textarea></label>
                        </td>
                    </tr>
                    <tr>
                        <td>6.</td>
                        <td><label for="q18">Оцените динамику КЗ поставщиков по месяцам млн руб</label></td>
                        <td><input id="q18" type="text" name="q[Оцените динамику КЗ поставщиков по месяцам млн руб][]">
                        </td>
                        <td><label><textarea name="q[Оцените динамику КЗ поставщиков по месяцам млн руб][]"></textarea></label>
                        </td>
                    </tr>
                    <tr>
                        <td>7.</td>
                        <td><label for="q19">Оцените динамику авансов поставщикам млн руб</label></td>
                        <td><input id="q19" type="text" name="q[Оцените динамику авансов поставщикам млн руб][]"></td>
                        <td><label><textarea
                                        name="q[Оцените динамику авансов поставщикам млн руб][]"></textarea></label>
                        </td>
                    </tr>
                    <tr>
                        <td>8.</td>
                        <td><label for="q20">Оцените динамику запасов по месяца млн руб</label></td>
                        <td><input id="q20" type="text" name="q[Оцените динамику запасов по месяца млн руб][]"></td>
                        <td><label><textarea name="q[Оцените динамику запасов по месяца млн руб][]"></textarea></label>
                        </td>
                    </tr>
                    <tr>
                        <td>9.</td>
                        <td><label for="q21">Оцените прочие потоки (анпример, ОС, НМА, финансовые вложнния)</label></td>
                        <td><input id="q21" type="text"
                                   name="q[Оцените прочие потоки (анпример, ОС, НМА, финансовые вложнния)][]"></td>
                        <td><label><textarea
                                        name="q[Оцените прочие потоки (анпример, ОС, НМА, финансовые вложнния)][]"></textarea></label>
                        </td>
                    </tr>
                    <tr>
                        <td>10.</td>
                        <td><label for="q22">Есть ли у вас прочие источники финансирования</label></td>
                        <td><input id="q22" type="text" name="q[Есть ли у вас прочие источники финансирования][]"></td>
                        <td><label><textarea
                                        name="q[Есть ли у вас прочие источники финансирования][]"></textarea></label>
                        </td>
                    </tr>
                    <tr>
                        <th colspan="4">IV. Планирование продаж и поступлений</th>
                    </tr>
                    <tr>
                        <th>№</th>
                        <th>Вопрос</th>
                        <th>Ответ</th>
                        <th>Комментарий</th>
                    </tr>
                    <tr>
                        <td>1.</td>
                        <td><label for="q23">Оцените объем розничных продаж (млн руб в год)</label></td>
                        <td><input id="q23" type="text" name="q[Оцените объем розничных продаж (млн руб в год)][]"></td>
                        <td><label><textarea
                                        name="q[Оцените объем розничных продаж (млн руб в год)][]"></textarea></label>
                        </td>
                    </tr>
                    <tr>
                        <td>2.</td>
                        <td><label for="q24">Оцените объем оптовых продаж (млн руб в год)</label></td>
                        <td><input id="q24" type="text" name="q[Оцените объем оптовых продаж (млн руб в год)][]"></td>
                        <td><label><textarea
                                        name="q[Оцените объем оптовых продаж (млн руб в год)][]"></textarea></label>
                        </td>
                    </tr>
                    <tr>
                        <td>3.</td>
                        <td><label for="q25">Оцените число крупных проектов (сумма продаж Top 20 млн в год)</label></td>
                        <td><input id="q25" type="text"
                                   name="q[Оцените число крупных проектов (сумма продаж Top 20 млн в год)][]"></td>
                        <td><label><textarea
                                        name="q[Оцените число крупных проектов (сумма продаж Top 20 млн в год)][]"></textarea></label>
                        </td>
                    </tr>
                    <tr>
                        <td>4.</td>
                        <td><label for="q26">Оцените число контрактов в год</label></td>
                        <td><input id="q26" type="text" name="q[Оцените число контрактов в год][]"></td>
                        <td><label><textarea name="q[Оцените число контрактов в год][]"></textarea></label></td>
                    </tr>
                    <tr>
                        <td>5.</td>
                        <td><label for="q27">Используете ли вы системы планирования продаж и поступлений (CRM)</label>
                        </td>
                        <td><input id="q27" type="text"
                                   name="q[Используете ли вы системы планирования продаж и поступлений (CRM)][]"></td>
                        <td><label><textarea
                                        name="q[Используете ли вы системы планирования продаж и поступлений (CRM)][]"></textarea></label>
                        </td>
                    </tr>
                    <tr>
                        <td>6.</td>
                        <td><label for="q28">Дайте характеристику стандартных схем оплат от покупателей (например 30%
                                аванс, 70% - по факту)</label></td>
                        <td><input id="q28" type="text" name="q[Дайте характеристику стандартных схем оплат от покупателей (например 30%
                                аванс, 70% - по факту)][]"></td>
                        <td><label><textarea name="q[Дайте характеристику стандартных схем оплат от покупателей (например 30%
                                аванс, 70% - по факту)][]"></textarea></label></td>
                    </tr>
                    <tr>
                        <th colspan="4">V. Бюджетирование</th>
                    </tr>
                    <tr>
                        <th>№</th>
                        <th>Вопрос</th>
                        <th>Ответ</th>
                        <th>Комментарий</th>
                    </tr>
                    <tr>
                        <td>1.</td>
                        <td><label for="q29">Дайте характеристику бюджета - год, квартал, мес</label></td>
                        <td><input id="q29" type="text" name="q[Дайте характеристику бюджета - год, квартал, мес][]">
                        </td>
                        <td><label><textarea
                                        name="q[Дайте характеристику бюджета - год, квартал, мес][]"></textarea></label>
                        </td>
                    </tr>
                    <tr>
                        <td>2.</td>
                        <td><label for="q30">Есть ли у вас бюджет движения денежных средства год - квартал - мес</label>
                        </td>
                        <td><input id="q30" type="text"
                                   name="q[Есть ли у вас бюджет движения денежных средства год - квартал - мес][]"></td>
                        <td><label><textarea
                                        name="q[Есть ли у вас бюджет движения денежных средства год - квартал - мес][]"></textarea></label>
                        </td>
                    </tr>
                    <tr>
                        <td>3.</td>
                        <td><label for="q31">Опишите схему учета общих расходов. Используете ли вы методику direct cost.
                                Какие расходы вы распределяете</label></td>
                        <td><input id="q31" type="text" name="q[Опишите схему учета общих расходов. Используете ли вы методику direct cost.
                                Какие расходы вы распределяете][]"></td>
                        <td><label><textarea name="q[Опишите схему учета общих расходов. Используете ли вы методику direct cost.
                                Какие расходы вы распределяете][]"></textarea></label></td>
                    </tr>
                    <tr>
                        <td>4.</td>
                        <td><label for="q32">Есть ли у вас кассовые лимиты по БЕ</label></td>
                        <td><input id="q32" type="text" name="q[Есть ли у вас кассовые лимиты по БЕ][]"></td>
                        <td><label><textarea name="q[Есть ли у вас кассовые лимиты по БЕ][]"></textarea></label></td>
                    </tr>
                    <tr>
                        <th colspan="4">VI. Управление денежными средствами</th>
                    </tr>
                    <tr>
                        <th>№</th>
                        <th>Вопрос</th>
                        <th>Ответ</th>
                        <th>Комментарий</th>
                    </tr>
                    <tr>
                        <td>1.</td>
                        <td><label for="q33">Есть ли у вас казначейская служба</label></td>
                        <td><input id="q33" type="text" name="q[Есть ли у вас казначейская служба][]"></td>
                        <td><label><textarea name="q[Есть ли у вас казначейская служба][]"></textarea></label></td>
                    </tr>
                    <tr>
                        <td>2.</td>
                        <td><label for="q34">Есть ли у вас кассовые планы год-квартал-мес-неделя</label></td>
                        <td><input id="q34" type="text" name="q[Есть ли у вас кассовые планы год-квартал-мес-неделя][]">
                        </td>
                        <td><label><textarea name="q[Есть ли у вас кассовые планы год-квартал-мес-неделя][]"></textarea></label>
                        </td>
                    </tr>
                    <tr>
                        <td>3.</td>
                        <td><label for="q35">Дайте характеристику системы согласования платежей</label></td>
                        <td><input id="q35" type="text" name="q[Дайте характеристику системы согласования платежей][]">
                        </td>
                        <td><label><textarea name="q[Дайте характеристику системы согласования платежей][]"></textarea></label>
                        </td>
                    </tr>
                    <tr>
                        <td>4.</td>
                        <td><label for="q36">Есть ли у вас учет ленежных средств по БЕ</label></td>
                        <td><input id="q36" type="text" name="q[Есть ли у вас учет ленежных средств по БЕ][]"></td>
                        <td><label><textarea name="q[Есть ли у вас учет ленежных средств по БЕ][]"></textarea></label>
                        </td>
                    </tr>
                    <tr>
                        <td>5.</td>
                        <td><label for="q37">Дайте характеристику вашей системе оперативного планирования денежных
                                потоков квартал - месяц - неделя</label></td>
                        <td><input id="q37" type="text" name="q[Дайте характеристику вашей системе оперативного планирования денежных
                                потоков квартал - месяц - неделя][]"></td>
                        <td><label><textarea name="q[Дайте характеристику вашей системе оперативного планирования денежных
                                потоков квартал - месяц - неделя][]"></textarea></label></td>
                    </tr>
                </table>
                <br/>
                <label for="email" style="font-weight: bold">Введите свой адрес электронной почты, чтобы отправить
                    анкету: </label>
                <input id="email" type="email" name="email" required>
                <br/>
                <label for="phone" style="font-weight: bold">Введите свой номер телефона: </label>
                <input style="text-align: right" id="phone" type="tel" name="phone" required><br />
                <input type="submit" value="Отправить анкету" class="button10" name="submit">
            </form>
        </div>
    </div>
</div>
</body>
</html>