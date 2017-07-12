@extends('c.template')

@section('title')

@stop

@section('header')

    <!-- Header -->
    <header class="learn-header">

    </header>


@stop

@section('main')

    <section id="learn" class="content">
        <div class="container">
            <div class="row">
                <div class="box">
                    <div class="col-lg-12">
                    {{-- НАЧАЛО --}}

                        <link href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" rel="stylesheet" />
                        <style type="text/css">nav.navbar.navbar-custom.navbar-fixed-top.top-nav-collapse{
                                z-index:99999999 !important;
                            }

                            h1{
                                display:none;
                            }
                            .lp-red-block{
                                width:100%;
                                height:130px;
                                background-color:#6A0101;
                                color:#fff;
                                margin-bottom:20px;
                                border-radius:4px;
                            }
                            #lp-h1{
                                font-family:Verdana,​Geneva,​sans-serif;
                                font-size: 40px;
                                font-weight:   600;
                                padding-top:20px;
                            }
                            #data-mk{
                                font-size: 32px;
                                font-weight: 600;
                                padding-top:20px;
                                color:#6A0101;
                                text-align:center;
                            }
                            .lp-h2 {
                                font-family:Verdana,​Geneva,​sans-serif;
                                font-size: 24px;
                                font-weight:   600;
                                padding:0 !important;
                                margin-top:30px !important;
                            }
                            .lp-h3{
                                text-align:left !important;
                                font-family:Verdana,​Geneva,​sans-serif;
                                font-size: 18px;
                                font-weight:   500;
                                color: rgb(255,​ 255,​ 255);
                                letter-spacing:    0px;
                                line-height:   24px;
                                text-align:    left;
                            }
                            .lp-grey-block{
                                width:100%;
                                height:120px;
                                background-color:#7F7F7F;
                                color:#fff;
                                margin-bottom:20px;
                                line-height:160px;
                                font-weight:bold;
                                border-radius:4px;
                                font-size:28px;
                            }
                            #lp-wrapper {
                                width:1000px;
                                height:100%;
                                border:1px solid #D3D4D4;
                                margin:0 auto;
                                padding:15px !important;
                                font-family:Verdana, Geneva, sans-serif;
                                font-size:16px;
                                color:#4A4A4A;
                                border-radius:4px;
                            }

                            #lp-wrapper ul, #lp-wrapper ol {
                                font-family:Verdana, Geneva, sans-serif;
                                font-size:16px;
                            }

                            .lp-red-text{
                                color:#6A0101;
                                font-weight:bold;
                            }
                            #lp-big-number{
                                font-weight:bold;
                                font-size:100px;
                                padding-left:20px;
                                padding-right:20px;
                            }
                            .button{
                                background: #6A0101 none repeat scroll 0 0;
                                color: #ffffff;
                                font: bold 16px Verdana,Geneva,sans-serif;
                                padding: 10px 20px;
                                text-align: center;
                                text-decoration: none;
                                border-radius:4px;
                            }
                            .button:hover{
                                text-decoration:none;
                                font-weight:bold;
                                color:#ffffff;
                            }
                            .button_grey{
                                text-decoration:none;
                                text-align:center;
                                padding:7px 100px;
                                font:13px Verdana, Geneva, sans-serif;
                                font-weight:bold;
                                color:#ffffff;
                                background:#7F7F7F;
                                border-radius:4px;
                            }
                            .button_grey:hover{
                                text-decoration:none;
                                font-weight:bold;
                                color:#ffffff !important;
                                border-radius:4px;
                            }
                            .lp-big-grey-block {
                                width:100%;
                                background-color:#7F7F7F;
                                color:#fff;
                                margin:0 auto;
                                font-weight:bold;
                                padding:20px;
                                border-radius:4px;
                            }
                            blockquote {
                                background: #f7f7f7;
                                border-left: 1px solid #bbb;
                                font-style: italic;
                                margin: 1.5em 10px;
                                padding: 10px;
                                line-height:13px;
                                font-size:12px;
                                -webkit-box-shadow: 10px 9px 7px -2px rgba(204,202,204,0.58);
                                -moz-box-shadow: 10px 9px 7px -2px rgba(204,202,204,0.58);
                                box-shadow: 10px 9px 7px -2px rgba(204,202,204,0.58);
                            }

                            blockquote:before {
                                color: #bbb;
                                content: "\201C";
                                font-size: 2em;
                                line-height: 0.1em;
                                margin-right: 0.2em;
                                vertical-align: -.4em;
                            }

                            blockquote:after {
                                color: #bbb;
                                content: "\201D";
                                font-size: 2em;
                                line-height: 0.1em;
                                vertical-align: -.45em;
                            }

                            blockquote > p:first-child {
                                display: inline;
                            }
                            ol li {
                                margin-bottom:20px;
                            }
                            .lp-big-text{
                                font-size:20px;
                            }

                            html.no-js body#company_iteam.body_learn main section#learn.content div.container div.row div.box div.col-lg-12 div#lp-wrapper div div.thumbnail div.caption p.-text-center a.btn.btn-default.btn-lg {
                                background-color: #AD0011;
                                color:#fff;
                                font-weight:bold;
                                border:none;
                                border-radius:4px;
                                margin-top:10px;
                            }
                            .ui-state-active {
                                background: rgb(173, 0, 17);
                                border: 1px solid rgb(173, 0, 17);
                            }
                            .timer-flipchart-card{display:block!important;position:relative}.timer-flipchart-bounding{display:block;visibility:hidden}.timer-flipchart-face{color:#fff;background-color:#333;-webkit-backface-visibility:hidden;-ms-backface-visibility:hidden;backface-visibility:hidden;outline:1px solid transparent;position:absolute;left:0;right:0;overflow:hidden}.timer-flipchart-front{-webkit-transform:perspective(300px) rotateX(0deg);-ms-transform:perspective(300px) rotateX(0deg);transform:perspective(300px) rotateX(0deg);top:0;bottom:50%;-webkit-transform-origin:center bottom;-ms-transform-origin:center bottom;transform-origin:center bottom;z-index:5}.timer-flipchart-back{-webkit-transform:perspective(300px) rotateX(180deg);-ms-transform:perspective(300px) rotateX(180deg);transform:perspective(300px) rotateX(180deg);top:50%;bottom:0;-webkit-transform-origin:center top;-ms-transform-origin:center top;transform-origin:center top;z-index:4}.timer-flipchart-back,.timer-flipchart-bottom{line-height:0}.timer-flipchart-top,.timer-flipchart-bottom{overflow:hidden}.timer-flipchart-top{top:0;bottom:50%}.timer-flipchart-bottom{top:50%;bottom:0}.timer-flipchart-face::before{position:absolute;left:0;right:0;height:1px;content:''}.timer-flipchart-top::before,.timer-flipchart-front::before{bottom:0;background-color:rgba(0,0,0,.25)}.timer-flipchart-bottom::before,.timer-flipchart-back::before{top:0;background-color:rgba(0,0,0,.06125)}@-webkit-keyframes flipchart-front{0%{-webkit-transform:perspective(300px) rotateX(0deg);transform:perspective(300px) rotateX(0deg)}100%{-webkit-transform:perspective(300px) rotateX(-180deg);transform:perspective(300px) rotateX(-180deg)}}@-moz-keyframes flipchart-front{0%{-webkit-transform:perspective(300px) rotateX(0deg);transform:perspective(300px) rotateX(0deg)}100%{-webkit-transform:perspective(300px) rotateX(-180deg);transform:perspective(300px) rotateX(-180deg)}}@keyframes flipchart-front{0%{-webkit-transform:perspective(300px) rotateX(0deg);-ms-transform:perspective(300px) rotateX(0deg);transform:perspective(300px) rotateX(0deg)}100%{-webkit-transform:perspective(300px) rotateX(-180deg);-ms-transform:perspective(300px) rotateX(-180deg);transform:perspective(300px) rotateX(-180deg)}}@-webkit-keyframes flipchart-back{0%{-webkit-transform:perspective(300px) rotateX(180deg);transform:perspective(300px) rotateX(180deg)}100%{-webkit-transform:perspective(300px) rotateX(0deg);transform:perspective(300px) rotateX(0deg)}}@-moz-keyframes flipchart-back{0%{-webkit-transform:perspective(300px) rotateX(180deg);transform:perspective(300px) rotateX(180deg)}100%{-webkit-transform:perspective(300px) rotateX(0deg);transform:perspective(300px) rotateX(0deg)}}@keyframes flipchart-back{0%{-webkit-transform:perspective(300px) rotateX(180deg);-ms-transform:perspective(300px) rotateX(180deg);transform:perspective(300px) rotateX(180deg)}100%{-webkit-transform:perspective(300px) rotateX(0deg);-ms-transform:perspective(300px) rotateX(0deg);transform:perspective(300px) rotateX(0deg)}}@-webkit-keyframes flipchart-shadow-in{20%{opacity:0}65%{opacity:1}99%{opacity:1}100%{opacity:0}}@-moz-keyframes flipchart-shadow-in{20%{opacity:0}65%{opacity:1}99%{opacity:1}100%{opacity:0}}@keyframes flipchart-shadow-in{20%{opacity:0}65%{opacity:1}99%{opacity:1}100%{opacity:0}}@-webkit-keyframes flipchart-shadow-in-direct{10%{opacity:0}50%{opacity: .25}50.1%{opacity:0}100%{opacity:0}}@-moz-keyframes flipchart-shadow-in-direct{10%{opacity:0}50%{opacity: .25}50.1%{opacity:0}100%{opacity:0}}@keyframes flipchart-shadow-in-direct{10%{opacity:0}50%{opacity: .25}50.1%{opacity:0}100%{opacity:0}}@-webkit-keyframes flipchart-shadow-out{15%{opacity:1}70%{opacity:0}100%{opacity:0}}@-moz-keyframes flipchart-shadow-out{15%{opacity:1}70%{opacity:0}100%{opacity:0}}@keyframes flipchart-shadow-out{15%{opacity:1}70%{opacity:0}100%{opacity:0}}.timer-flipchart-front::after,.timer-flipchart-bottom::after,.timer-flipchart-top::after{position:absolute;left:0;right:0;bottom:0;top:0;content:''}.timer-flipchart-top::after{background: -webkit-linear-gradient(bottom,#000 0,transparent 100%);background:linear-gradient(to top,#000 0,transparent 100%)}.timer-flipchart-bottom::after{opacity:0;background: -webkit-linear-gradient(top,#000 25%,rgba(0,0,0,.4) 100%);background:linear-gradient(to bottom,#000 25%,rgba(0,0,0,.4) 100%)}.timer-flipchart-front::after{opacity:0;background: -webkit-linear-gradient(bottom,#000 25%,rgba(0,0,0,.4) 100%);background:linear-gradient(to top,#000 25%,rgba(0,0,0,.4) 100%)}.timer-flipchart-animate .timer-flipchart-front{-webkit-animation-name:flipchart-front;animation-name:flipchart-front}.timer-flipchart-animate .timer-flipchart-back{-webkit-animation-name:flipchart-back;animation-name:flipchart-back}.timer-flipchart-animate .timer-flipchart-top::after{-webkit-animation-name:flipchart-shadow-out;animation-name:flipchart-shadow-out}.timer-flipchart-animate .timer-flipchart-bottom::after{-webkit-animation-name:flipchart-shadow-in;animation-name:flipchart-shadow-in}.timer-flipchart-animate .timer-flipchart-front::after{-webkit-animation-name:flipchart-shadow-in-direct;animation-name:flipchart-shadow-in-direct}.timer-flipchart-front,.timer-flipchart-back,.timer-flipchart-front::after,.timer-flipchart-bottom::after,.timer-flipchart-top::after{-webkit-animation-iteration-count:1;-moz-animation-iteration-count:1;animation-iteration-count:1;-webkit-animation-duration:750ms;-moz-animation-duration:750ms;animation-duration:750ms;-webkit-animation-fill-mode:forwards;animation-fill-mode:forwards;-webkit-animation-timing-function:ease-in-out;animation-timing-function:ease-in-out}.timer-milliseconds .timer-flipchart-front,.timer-milliseconds .timer-flipchart-back,.timer-milliseconds .timer-flipchart-front::after,.timer-milliseconds .timer-flipchart-bottom::after,.timer-milliseconds .timer-flipchart-top::after{-webkit-animation-duration:100ms;animation-duration:100ms}.timer-flipchart-inner{float:left}.timer-slide-inner{display:block;-webkit-transform:perspective(100px);-ms-transform:perspective(100px);transform:perspective(100px);-webkit-transform-style:preserve-3d;-ms-transform-style:preserve-3d;transform-style:preserve-3d;overflow:hidden;float:left}.timer-slide-bounding{display:block;padding:0 .0625em;visibility:hidden}.timer-slide-new,.timer-slide-old{position:absolute;top:0;left:0;right:0;bottom:0;z-index:3;-webkit-backface-visibility:hidden;-ms-backface-visibility:hidden;backface-visibility:hidden}.timer-slide-new,.timer-slide-old,.timer-slide-bounding{text-align:center}.timer-slide-animate .timer-slide-new,.timer-slide-animate .timer-slide-old{-webkit-transition: -webkit-transform 800ms,opacity 700ms,color 400ms,-webkit-filter 400ms;transition:transform 800ms,opacity 700ms,color 400ms,filter 400ms}.timer-milliseconds .timer-slide-animate .timer-slide-new,.timer-milliseconds .timer-slide-animate .timer-slide-old{-webkit-transition: -webkit-transform 100ms,opacity 100ms,color 50ms,-webkit-filter 50ms;transition:transform 100ms,opacity 100ms,color 50ms,filter 50ms}.timer-slide-new{opacity:0;z-index:2}.timer-slide-old{opacity:1;z-index:1}.timer-slide-animate .timer-slide-new{opacity:1}.timer-slide-animate .timer-slide-old{opacity:0}.timer-slide-new{-webkit-transform:translateY(-100%);-ms-transform:translateY(-100%);transform:translateY(-100%);z-index:2;opacity:0}.timer-slide-old{-webkit-transform:translateY(0);-ms-transform:translateY(0);transform:translateY(0);z-index:1;opacity:1}.timer-slide-animate .timer-slide-new{-webkit-transform:translateY(0);-ms-transform:translateY(0);transform:translateY(0);opacity:1}.timer-slide-animate .timer-slide-old{-webkit-transform:translateY(100%);-ms-transform:translateY(100%);transform:translateY(100%);opacity:0}
                        </style>
                        <div id="lp-wrapper">
                            <div class="lp-red-block" style="text-align:center; height: 85px;">
                                <div id="lp-h1" style="line-height:45px;">ЛЕТНИЙ БЕЗЛИМИТ от iTeam</div>
                            </div>

                            <div class="lp-grey-block" style="height: 70px; line-height: 1.2;">
                                <p style="text-align:center; padding-top: 20px;">ВСЕ ТРЕНИНГИ ПО УПРАВЛЕНИЮ В ОДНОМ ПРОДУКТЕ</p>

                                <p style="text-align:center;">&nbsp;</p>
                            </div>

                            <h4 style="text-align: center">Ваша корпоративная видеотека: 42 мастер-класса, 3 видеокурса, 140+ часов полезного видео</h4>

                            <p style="text-align:center;">&nbsp;</p>

                            <p style="text-align: center;"><strong><a class="button" href="https://iteam.ru/learn/course/letnij-bezlimit-ot-iteam-oplata" style="background: rgb(173, 0, 17); padding: 15px 50px;">КУПИТЬ ЛЕТНИЙ БЕЗЛИМИТ</a></strong></p>

                            <p style="text-align:center;">&nbsp;</p>

                            <p style="text-align:center; color: rgb(173, 0, 17);"><b>Специальные&nbsp;цены только до 1 июля 2017 года:</b></p>

                            <p style="text-align:center;">&nbsp;</p>
                            <script type="text/javascript">(function(){var _id="a15a1398719c39e35c1d2222958269ed";while(document.getElementById("timer"+_id))_id=_id+"0";document.write("<div id='timer"+_id+"' style='min-width:425px;height:98px;'></div>");var _t=document.createElement("script");_t.src="https://iteam.ru/js/timer2.min.js";var _f=function(_k){var l=new MegaTimer(_id, {"view":[1,1,1,1],"type":{"currentType":"1","params":{"usertime":false,"tz":"3","utc":1498867200000}},"design":{"type":"plate","params":{"round":"10","background":"solid","background-color":"#eee","effect":"slide","space":"4","separator-margin":"10","number-font-family":{"family":"Verdana","link":"<link href='http://fonts.googleapis.com/css?family=Comfortaa&subset=latin,cyrillic' rel='stylesheet' type='text/css'>"},"number-font-size":"60","number-font-color":"#434343","padding":"12","separator-on":true,"separator-text":":","text-on":true,"text-font-family":{"family":"Verdana","link":"<link href='http://fonts.googleapis.com/css?family=Comfortaa&subset=latin,cyrillic' rel='stylesheet' type='text/css'>"},"text-font-size":"12","text-font-color":"#990000"}},"designId":2,"theme":"white","width":525,"height":98});if(_k!=null)l.run();};_t.onload=_f;_t.onreadystatechange=function(){if(_t.readyState=="loaded")_f(1);};var _h=document.head||document.getElementsByTagName("head")[0];_h.appendChild(_t);}).call(this);</script>

                            <hr />
                            <h4 style="text-align: center;"><strong>БЕЗЛИМИТ. ВЕЧНЫЙ ДОСТУП.</strong><br />
                                Вы покупаете неограниченный по времени и по количеству скачиваний доступ ко всем мастер-классам и видеокурсам iTeam!</h4>

                            <hr />
                            <p>&nbsp;</p>

                            <p style="border: 1px solid rgb(106, 1, 1); border-radius: 5px; padding: 30px; font-size: 20px; text-align: center;"><b>Купите летом - учитесь весь год!</b></p>

                            <p style="width: 700px; margin: auto auto 20px;"><b>Создайте Корпоративную обучающую видеотеку по управлению.</b> Получите 42 мастер-класса и 3 видеокурса и обучите менеджменту всех сотрудников компании за 40000 рублей!</p>

                            <p style="color: red; text-align: center; font-size: 18px;">Что в пересчете означает <strong>менее 900 рублей за один мастер-класс.</strong></p>

                            <p style="width: 700px; margin: auto auto 20px;"><b>Ключевые темы:</b> стратегия, бизнес-процессы, планирование, управление изменениями, контроллинг, маркетинг, финансы, мотивация и KPI!</p>

                            <p>&nbsp;</p>

                            <p style="border: 1px solid #6A0101; border-radius: 5px; padding: 30px; text-align: center; font-size: 20px;"><b>&nbsp;&ldquo;Летний БЕЗЛИМИТ&rdquo; получат только&nbsp;50 компаний</b></p>

                            <p style="width: 700px; margin: auto auto 20px;">&ldquo;Летний БЕЗЛИМИТ&rdquo; - это ваш личный ВИП-доступ к полной видеотеке по управлению. Именно поэтому мы берем ограниченное число участников - только 50 компаний.</p>

                            <p style="text-align: center; color: red; font-size: 18px;"><strong>Осталось мест: 32</strong></p>

                            <p>&nbsp;</p>

                            <p style="text-align: center;"><a class="button" href="https://iteam.ru/learn/course/letnij-bezlimit-ot-iteam-oplata" style="background: rgb(173, 0, 17); padding: 15px 50px;">КУПИТЬ ЛЕТНИЙ БЕЗЛИМИТ</a></p>

                            <p>&nbsp;</p>

                            <p>&nbsp;</p>

                            <p style="border: 1px solid #6A0101; border-radius: 5px; padding: 30px; text-align: center; font-size: 20px;"><b>Какие продукты входят в комплект:&nbsp;</b>42 мастер-класса, 3 видеокурса, 140+ часов полезного видео</p>

                            <div id="accordion">
                                <h5>Стратегическое управление</h5>

                                <div>
                                    <ul>
                                        <li>Стратегический анализ (6 часов)</li>
                                        <li>Глобальное видение (2 часа).</li>
                                        <li>Управленческие кризисы (2 часа).</li>
                                        <li>Организационная диагностика(2 часа).</li>
                                        <li>Разработка стратегии (4 часа).</li>
                                        <li>Создание миссии компании (2 часа).</li>
                                        <li>Управление стратегией с помощью ССП (14 часов).</li>
                                    </ul>
                                </div>

                                <h5>Управление процессами</h5>

                                <div>
                                    <ul>
                                        <li>Диагностика и идентификация бизнес-процессов (2 часа).</li>
                                        <li>Проектирование и регламентация процессов (12 часов).</li>
                                        <li>Измерение уровня зрелости процессов (2 часа).</li>
                                        <li>Разработка должностных обязанностей и инструкций (2 часа).</li>
                                        <li>Раработка KPI (4 часа).</li>
                                    </ul>
                                </div>

                                <h5>Целевое управление</h5>

                                <div>
                                    <ul>
                                        <li>Управление по показателям: ССП, KPI, контроллинг (8 часов).</li>
                                        <li>Управление финансами (8 часов).</li>
                                        <li>Маркетинг (6 часов).</li>
                                        <li>Управление сотрудниками (6 часов).</li>
                                        <li>Управление изменениями (8 часов).</li>
                                        <li>Планирование (2 часа).</li>
                                        <li>Управление рисками (2 часа).</li>
                                    </ul>
                                </div>

                                <h5>Мотивация и корпоративная культура</h5>

                                <div>
                                    <ul>
                                        <li>Управление корпоративной культурой (8 часов).</li>
                                        <li>Управление мотивацией (4 часа).</li>
                                        <li>Разработка KPI (4 часа).</li>
                                        <li>Диагностика и изменение организационной культуры (4 часа).</li>
                                        <li>Клиентоориентированный сервис (2 часа).</li>
                                    </ul>
                                </div>
                            </div>

                            <p>&nbsp;</p>

                            <p style="border: 1px solid #6A0101; border-radius: 5px; padding: 30px; text-align: center; font-size: 20px;"><b>Что не входит в &ldquo;Летний БЕЗЛИМИТ&rdquo; и можно докупить отдельно:</b></p>

                            <p>Консультация Александра Кочнева по внедрению обучающей видеотеки и разработке индивидуальной системы обучения и развития для ваших сотрудников.</p>

                            <p>&nbsp;</p>

                            <div style="border-left:15px solid #6A0101; margin-top:20px;margin-bottom:20px;width:100%; padding-left:30px; height:70px; background-color:#ccc;  font-size:28px;color:#39464A;font-weight:bold !important;line-height:70px;text-transform:uppercase !important;">Александр Кочнев</div>

                            <table style="width:100%;">
                                <tbody>
                                <tr>
                                    <td style="width:20%; vertical-align:top;"><img alt="Александр Кочнев. Управляющий партнер консалтинговой компании iTeam." src="/images/team/photo/kochnev.png" style="width: 174px;" /></td>
                                    <td style="width:80%;vertical-align:top;">
                                        <p><strong>Управляющий партнер консалтинговой компании iTeam, кандидат технических наук, член Российской ассоциации управления проектами.</strong></p>

                                        <p>Лучший, по мнению многих, специалист по управлению компанией.</p>

                                        <p>Опыт работы в управленческом консалтинге более 15 лет. Руководитель многих консалтинговых проектов в компаниях различных отраслей: заводы, торговые сети, банки, предприятия сферы услуг, многопрофильные холдинги, государственные учреждения регионального и федерального уровня.</p>
                                    </td>
                                </tr>
                                </tbody>
                            </table>

                            <p>&nbsp;</p>

                            <p style="border: 1px solid #6A0101; border-radius: 5px; padding: 30px; text-align: center; font-size: 20px;"><b>Корпоративная видеотека по управлению это:</b></p>

                            <ul>
                                <li style="margin-bottom: 15px;">Более <strong>140 часов видео по управлению на вашем корпоративном сервере</strong>.</li>
                                <li style="margin-bottom: 15px;"><strong>Все видеофайлы, шаблоны и документы вы можете скачать и выложить</strong> на корпоративный сервер.</li>
                                <li style="margin-bottom: 15px;">Практичность и доступность.</li>
                                <li style="margin-bottom: 15px;">Минимум теоретической информации по теме и <strong>максимум кейсов и примеров</strong> из практики российских компаний. Мы доносим информацию <strong>простым понятным языком</strong>, без специфических терминов и заумных понятий.</li>
                                <li style="margin-bottom: 15px;"><strong>Знания, которые вы больше нигде не получите.</strong></li>
                                <li style="margin-bottom: 15px;">Все, что мы рассказываем на наших мастер-классах, это уникальный опыт и наработки наших консультантов в сотнях проектах на протяжении 15 лет. По отзывам наших пользователей, такую информацию не дают на программах MBA. На наших материалах учатся сотрудники российских и международных консалтинговых компаний.</li>
                                <li style="margin-bottom: 15px;">Ваши сотрудники повысят свою управленческую квалификацию.</li>
                                <li style="margin-bottom: 15px;"><strong>Наши мастер-классы дают ясное понимание</strong>, как устроена система управления компанией. У менеджеров появляется четкое видение, как управлять компанией, как сделать ее лучше и эффективней.</li>
                            </ul>

                            <p>&nbsp;</p>

                            <p style="border: 1px solid #6A0101; border-radius: 5px; padding: 30px; text-align: center; font-size: 20px; color: rgb(173, 0, 17);"><b>Специальная цена на &ldquo;Летний БЕЗЛИМИТ&rdquo; только до 1 июля 2017 года !</b></p>

                            <h4 style="text-align: center;"><strong>БЕЗЛИМИТ. ВЕЧНЫЙ ДОСТУП.</strong><br />
                                Вы покупаете неограниченный по времени и по количеству скачиваний доступ ко всем мастер-классам и видеокурсам iTeam!</h4>

                            <p>&nbsp;</p>

                            <p style="text-align: center;"><a class="button" href="https://iteam.ru/learn/course/letnij-bezlimit-ot-iteam-oplata" style="background: rgb(173, 0, 17); padding: 15px 50px;">КУПИТЬ ЛЕТНИЙ БЕЗЛИМИТ</a></p>

                            <p>&nbsp;</p>

                            <p>&nbsp;</p>

                            <p style="border: 1px solid #6A0101; border-radius: 5px; padding: 30px; text-align: center; font-size: 20px;"><b>Сравним вместе: 1 день тренинга или полная корпоративная видеотека:</b></p>

                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>&nbsp;</th>
                                    <th style="color: rgb(173, 0, 17); text-align: center;">ЛЕТНИЙ БЕЗЛИМИТ</th>
                                    <th style="text-align: center;">Стандартный корпоративный тренинг</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>Скольких сотрудников вы сможете обучить за те же деньги?</td>
                                    <td>500+ человек. Всю компанию, без ограничений.</td>
                                    <td>1 тренинг-день для команды не более 10 человек.</td>
                                </tr>
                                <tr>
                                    <td>Вы можете сами выстроить систему обучения и развития?</td>
                                    <td>Конечно. Для каждого сотрудника вы можете подобрать обучающий материал.</td>
                                    <td>Система обучения одинаковая для всех, кто посещает тренинг</td>
                                </tr>
                                <tr>
                                    <td>Можно ли повторить материал и пройти тренинг заново?</td>
                                    <td>Вы можете сколько угодно раз использовать мастер-классы для обучения. ВЕЧНЫЙ ДОСТУП.</td>
                                    <td>Тренинг проводится только один раз, чтобы повторить придется оплачивать снова</td>
                                </tr>
                                <tr>
                                    <td>Уровень экспертности тренера</td>
                                    <td>Александр Кочнев - эксперт-практик с опытом работы в управленческом консалтинге более 15 лет.</td>
                                    <td>Приглашенный тренер чаще всего является специалистом только по обучению персонала. Не является экспертом в предметной области.</td>
                                </tr>
                                <tr>
                                    <td>Удобство обучения</td>
                                    <td>Вы обучаете персонал так, как хотите, когда и где угодно: в офисе, даете задание на дом, делаете выездную сессию</td>
                                    <td>Формат и время обучение стандартное и согласовывается с тренером</td>
                                </tr>
                                <tr>
                                    <td>Результат обучения</td>
                                    <td>Вы можете сколько угодно повторять материал до тех пор, пока не получите результат</td>
                                    <td>Результат не всегда измерим и очевиден. Повторить тренинг для закрепления нельзя.</td>
                                </tr>
                                </tbody>
                            </table>

                            <p>&nbsp;</p>

                            <p style="border: 1px solid #6A0101; border-radius: 5px; padding: 30px; text-align: center; font-size: 20px;"><b>Отзывы наших участников</b></p>

                            <div style="margin-bottom: 100px;">
                                <p>
                                    <i>Вашу компанию я считаю одной из самых сильных на рынке консалтинговых услуг в нашей стране. Мне нравится, что вы затрагиваете широкий диапазон управленческих проблем и освещаете их достаточно качественно и глубоко. В публикациях вашей компании я нахожу для себя много полезного, поскольку всегда интересно знакомиться с опытом профессионалов, учиться у них.</i>
                                </p>
                                <p style="float: right; max-width: 500px; font-size: 13px;">
                                    С пожеланиями успехов и процветания, Борисюк Юрий Александрович Консультант по управлению, Доктор технических наук
                                </p>
                            </div>

                            <div style="margin-bottom: 100px;">
                                <p>
                                    <i>Мне очень нравится цикл мастер-классов, которые Вы ведете. Лично я, ранее являясь руководителем фабрики, начал менять свои подходы к управлению, в т.ч. благодаря информации получаемой от Вас. Она как-то отзывалась с тем, что я делал и наблюдал на фабрике. С тех пор у меня зародилась мысль как же малоэффективна промышленная способность России и как огромен потенциал и как это можно реализовать. Лично знакомясь с проблемами разных предприятий (иногда друзья приглашают как эксперта) я вижу, как многое можно сделать, как увеличить и результативность и эффективность.</i>
                                </p>
                                <p style="float: right; max-width: 500px; font-size: 13px;">
                                    Дрягин Олег Борисович
                                </p>
                            </div>

                            <div style="margin-bottom: 100px;">
                                <p>
                                    <i>Да, мне нравятся Ваши мастер-классы, очень системный подход, владение материалом на высоком уровне и, безусловно, чувствуется большой практический опыт в тех вопросах, которые рассматриваются. Что касается нового. Т.к. бизнес-процессы для меня тема известная, то абсолютно новое найти, наверное, очень сложно. Меня привлекает то, что профессионализм и высокий уровень профессионального владения предметом у Александра, позволяет мне по другому посмотреть на уже знакомые вещи. С моей точки зрения, это очень важно, и нужно, на известные тебе вещи взглянуть по новому, т.к. в процессе операционной работы очень часто глаз "замыливается" и ты перестаешь видеть, на самом деле, очевидные вещи.</i>
                                </p>
                                <p style="float: right; max-width: 500px; font-size: 13px;">
                                    Удачного дня, Елена Федаш, Директор по персоналу, Корпорация "АТБ", г.Днепропетровск.
                                </p>
                            </div>

                            <div style="margin-bottom: 100px;">
                                <p>
                                    <i>Понравилось:
                                        1) Практическая ориентация информации;
                                        2) Структурирование и прозрачность мастер-класса;
                                        3) Освещение тем, которые не затрагиваются в классических схемах обучения;
                                        4) Виден опыт лектора в исполнении того, о чем идет речь;
                                        5) Доступность данного материала;
                                        В ближайшее время планирую структурировать текущие бизнес процессы в своей организации.
                                    </i>
                                </p>
                                <p style="float: right; max-width: 500px; font-size: 13px;">
                                    С уважением,
                                    Григорий Барановский
                                </p>
                            </div>

                            <div style="margin-bottom: 100px;">
                                <p>
                                    <i>
                                        При всей компактности излагаемого материала, наличие самого необходимого, и самое главное даётся рабочий инструмент на примерах. Не многие учебные программы  отличаются этим. Я уже посмотрел несколько мастер-классов А. Кочнева, и могу сказать, что материал хорошо структурирован, излагается доступно и внятно. Большое спасибо. Я рекомендовал эти мастер-классы своим сотрудникам.
                                    </i>
                                </p>
                                <p style="float: right; max-width: 500px; font-size: 13px;">
                                    Бородавкин А.В.
                                </p>
                            </div>

                            <div style="margin-bottom: 100px;">
                                <p>
                                    <i>
                                        Александр, большое спасибо за новые знания. Моя сфера деятельности - образование, но, проецируя с бизнес-разговора по теме на свою отрасль, получила неоценимую помощь. Многое упорядочилось, еще больше открылось. Еще раз огромное спасибо. С нетерпением буду ждать дальнейшего обучения. Подписалась на Ваш твиттер, фэйсбук, видеоканал. Посмотрю все видеозаписи. Думаю, пригодятся в решении проблем тех проектов, которыми занимаюсь.Удачи Вам.
                                    </i>
                                </p>
                                <p style="float: right; max-width: 500px; font-size: 13px;">
                                    Елена Гончарова
                                </p>
                            </div>

                            <p style="text-align: center;">
                                <a href="https://iteam.ru/company/response" style="font-size: 18px; color: rgb(173, 0, 17);">Больше отзывов наших участников</a>
                            </p>




                            <div style="text-align:center;margin-top:50px;"><script type="text/javascript">(function() {
                                        if (window.pluso) if (typeof window.pluso.start == "function") return;
                                        if (window.ifpluso==undefined) { window.ifpluso = 1;
                                            var d = document, s = d.createElement('script'), g = 'getElementsByTagName';
                                            s.type = 'text/javascript'; s.charset='UTF-8'; s.async = true;
                                            s.src = ('https:' == window.location.protocol ? 'https' : 'http')  + '://share.pluso.ru/pluso-like.js';
                                            var h=d[g]('body')[0];
                                            h.appendChild(s);
                                        }})();
                                </script>
                                <p>&nbsp;</p>

                                <div class="pluso" data-background="#ebebeb" data-description="Мастер-класс Совершенствование бизнес-процессов и структур компании. Регистрация здесь https://iteam.ru/learn/webinar/process_structure" data-options="big,square,line,horizontal,counter,theme=08" data-services="facebook,vkontakte,twitter,linkedin,google,livejournal" data-title="Мастер-класс Совершенствование бизнес-процессов и структур компании. Регистрация здесь https://iteam.ru/learn/webinar/process_structure" data-url="https://iteam.ru/learn/webinar/process_structure">&nbsp;</div>
                                <br />
                                Пожалуйста, порекомендуйте мастер-класс Вашим коллегам и друзьям.</div>
                        </div>

                        {{-- КОНЕЦ --}}
                    </div>
                </div>
            </div>
        </div>
    </section>

@stop

@section('footer')

    <!-- modal.learn -->
    {{--@include('c.modals.learn')--}}
    <!-- /modal.learn -->

@stop

@section('edit-link')

@stop

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.0/moment.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.0/locale/ru.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.0/jquery-ui.min.js"></script>
    <script>
        $( function() {
            $( "#accordion" ).accordion();
        } );
    </script>

    <script>
        (function($){

            $('.date').each(function(i, e) {
                //var time = moment($(e).data('date'));
                //if(now.diff(time, 'days') <= 1) {
                //	$(e).html(time.from(now));
                //}
                $(e).html(moment($(e).data('date')).calendar());
            });

            function getCookie(name) {
                var matches = document.cookie.match(new RegExp(
                    "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
                ));
                return matches ? decodeURIComponent(matches[1]) : undefined;
            }

            var learn_s = $('#learn'),
                user_id = learn_s.data('user_id'),
                order_id = learn_s.data('order_id'),
                product_id = learn_s.data('product_id'),
                payment_type = learn_s.data('payment_type') || getCookie('payment_type');

            if(payment_type) {
                var paymentInput = $('input[value="'+payment_type+'"]');
                paymentInput.prop('checked', true).parent('.payment-change').addClass('active');

                if(!user_id) $('#paymentTabs li:eq(1) a').tab('show').parent('li').removeClass('disabled');

            }

            $('.payment-change').click(function(){

                if(!user_id){
                    var labelButton = $(this);
                    $('.payment-change.active').removeClass('active').children('input').prop('checked', false).removeAttr('checked');

                    payment_type = labelButton.addClass('active').children('input').prop('checked', true).val();

                    document.cookie = "payment_type=" + payment_type;
                    $('#paymentTabs li:eq(1) a').tab('show').parent('li').removeClass('disabled');
                }
                else {
                    $(this).parents('form').submit();
                }

            });

            $('.nav-tabs a[data-toggle=tab]').on('click', function(e) {
                if ($(this).parent('li').hasClass('disabled')) {
                    e.preventDefault();
                    return false;
                }
            });


            var payModalHash = '#payModal', payModal = $(payModalHash);
            if(window.location.hash == payModalHash){
                payModal.modal('show');
            }

            function validateEmail(email) {
                var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                return re.test(email);
            }
            function validatePassword(password) {
                var re = /^[a-zA-Z0-9_~!@#$%^&\*\.-]+$/;
                return re.test(password);
            }
            function validateUsername(username) {
                //var re = /^[АБВГДЕЁЖЗИЙКЛМНОПРСТУФХЦЧШЩЪЫЬЭЮЯабвгдеёжзийклмнопрстуфхцчшщъыьэюяA-Za-z0-9_-.]{2,32}$/;
                //return re.test(username.toLowerCase());
                return true;
            }
            function validateInput(input) {
                var ok = 0, vu = 0, ve = 0,
                    required = input.prop('required'),
                    minlength = input.attr('minlength'),
                    maxlength = input.attr('maxlength'),
                    email = input.is('[type="email"]')
                log = input.is('[name="log"]')
                password = input.is('[type="password"]')
                confirmation = input.is('[name="password_confirmation"]') ? $('[name="password"]').val() : false,
                    val = input.val(),
                    vallength = val.length;

                if(required && !vallength) {
                    input.attr('data-original-title', (input.data('required-error') || 'Это поле обязательно к заполнению'));
                }
                else ok = 1;

                if(minlength && vallength<minlength) {
                    ok = 0;
                    input.attr('data-original-title', (input.data('minlength-error') || 'Минимальная длина поля: ' +minlength+  ' символов'));
                }
                if(maxlength && vallength>maxlength) {
                    ok = 0;
                    input.attr('data-original-title', (input.data('maxlength-error') || 'Максимальная длина поля: ' +minlength+  ' символов'));
                }
                if(email && !validateEmail(input.val())) {
                    ok = 0;
                    input.attr('data-original-title', (input.data('email-error') || 'Укажите корректный Email-адрес'));
                }
                if(log) {
                    ve = validateUsername(input.val());
                    vu = validateEmail(input.val());
                    if(! (ok = ve || vu) ) input.attr('data-original-title', (input.data('email-error') || (!ve ? 'Укажите корректный Email-адрес или Ваш Логин' : 'Для логина используют только латинские буквы, цифры и _-') ));
                }
                if(password && !validatePassword(input.val())) {
                    ok = 0;
                    input.attr('data-original-title', (input.data('password-error') || 'Допустимые символы: латинские буквы, цифры или знаки _~!@#$%^&*-.'));
                }
                // && val != $('[name="'.input.data('forname').'"]').val()
                if(password && confirmation && val!=confirmation) {
                    ok = 0;
                    input.attr('data-original-title', (input.data('confirmation-error') || 'Пароли не совпадают'));
                }
                return ok;
            }

            $('input[data-toggle="tooltip"]').on('focus',function(){
                $(this).tooltip('show');
            });

            $('form.validate input').on('change paste', function(e) {
                var input = $(this), ok = validateInput(input), tt = input.is('[data-toggle="tooltip"]');
                if(!ok){
                    input.parent().removeClass('has-success').addClass('has-error');
                    if(tt) input.tooltip('show');
                }
                else {
                    input.parent().removeClass('has-error').addClass('has-success');
                    if(tt) input.tooltip('hide');
                }
            });

            $('form.validate').on('submit', function(e) {

                var form = $(this), errors = 0;
                if(form.not('.is-valid')) {

                    var inputs = $('input[required]',form), errors = inputs.size();
                    var vallength = 0;

                    inputs.each(function(){
                        var input = $(this),
                            ok = validateInput(input);
                        errors -= ok;
                    });

                    if(!errors){

                        $('input[name="_redirect"]',form).val('https://iteam.ru/i/order/create?email='+$('input[name="email"]',form).val()+'&name='+$('input[name="firstname"]',form).val()+'&phone='+$('input[name="phone"]',form).val()+'&product_id='+product_id+'&payment_type='+payment_type);
                        form.addClass('is-valid').submit();

                    }
                    else {
                        inputs.parent().addClass('has-error');
                        inputs.tooltip('show');
                        e.preventDefault();
                        return false;
                    }

                }

            });

            $('.show-password').on('click',function(){
                var showPassword = $(this);
                if(showPassword.is('.glyphicon-eye-open')) {
                    showPassword.removeClass('glyphicon-eye-open').addClass('glyphicon-eye-close').parent('.input-group-addon').prev('input').attr('type','text');
                }
                else {
                    showPassword.removeClass('glyphicon-eye-close').addClass('glyphicon-eye-open').parent('.input-group-addon').prev('input').attr('type','password');
                }
            });


        })(jQuery);
    </script>
@stop