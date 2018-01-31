@extends('c.template')

@section('title')
	Мастер-классы{{-- {{ $page->meta_title ? $page->meta_title . ' ' : ($page->title ? $page->title . ' ' : '') }} --}}
	|
@stop

@section('head')
<style>
.panel-body {
	background-color: #DDD;
	padding: 10px 30px 30px 30px;
}
.vertical-align {
	display: flex;
	align-items: center;
}
a, a:hover, a:visited {
	color: #870100;
}
.btn {
	background: #870100;
	border-color: #870100 !important;
}
@media (max-width: 767px) {
	.row.vertical-align {
		display: block;
	}
}
</style>
@stop

@section('header')
	<!-- Header -->
	<header class="learn-header">
		<div class="row">
			<div class="col-md-12 text-center">
				<h1 class="main-title">Мастер-классы</h1>
			</div>
		</div>
		<hr>
	</header>
@stop

@section('main')

    <!-- LISTING -->
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="row vertical-align">
						<div class="col-md-2">
							<!-- LINK -->
							<img src="https://iteam.ru/img/icon.png">
						</div>
						<div class="col-md-8">
							<!-- LINK -->
							<h3><a href="https://iteam.ru/landing/template/nalogovyi-gambit.html">НАЛОГОВЫЙ ГАМБИТ. КАК ВЗАИМОДЕЙСТВОВАТЬ С&nbsp;НАЛОГОВОЙ, ЧТОБЫ НЕ&nbsp;ПОПАСТЬ В&nbsp;ЗОНУ РИСКА</a></h3>
							<p>
								При отлично проработанной стратегии и&nbsp;замечательном коллективе, почти любая компания может попасть в&nbsp;зону налогового риска. Доначисления налоговиков могут разрушить бизнес, казавшийся нерушимым. Бабурина Ирина&nbsp;&mdash; эксперт по&nbsp;налоговой безопасности, расскажет:
								<ul>
								    <li>как уберечь бизнес от&nbsp;прогнозируемых налоговых рисков;</li>
								    <li>как правильно выстроить отношения с&nbsp;налоговиками и&nbsp;не&nbsp;сообщать о&nbsp;себе лишней информации;</li>
								    <li>как использовать примеры из&nbsp;судебной практики по&nbsp;налоговым спорам в&nbsp;своих интересах.</li>
								</ul>
							</p>
						</div>
						<div class="col-md-2 text-center">
							<h3>Бесплатно</h3>
							<!-- LINK -->
							<a href="https://iteam.ru/landing/template/nalogovyi-gambit.html"><button class="btn btn-danger">Подробнее</button></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- END OF LISTING -->
    
    <!-- LISTING -->
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="row vertical-align">
						<div class="col-md-2">
							<!-- LINK -->
							<img src="https://iteam.ru/img/icon.png">
						</div>
						<div class="col-md-8">
							<!-- LINK -->
							<h3><a href="https://iteam.ru/landing/template/fin-uchet-vnedrenie.html">ВНЕДРЕНИЕ УПРАВЛЕНЧЕСКОГО ФИНАНСОВОГО УЧЕТА: ШАГ ЗА&nbsp;ШАГОМ</a></h3>
							<p>
								На&nbsp;мастер-классе подробно рассматривается каждый этап проекта внедрения системы управленческого финансового учета: готовый пошаговый алгоритм проектирования и&nbsp;внедрения автоматизированной системы управленческого финансового учета. Мастер-класс является вводным для мастер-проекта <a href="https://iteam.ru/landing/template/sozdanie-sistemy-fin-ucheta.html">&laquo;Создание системы управленческого финансового учета&raquo;</a>
							</p>
						</div>
						<div class="col-md-2 text-center">
							<h3>Бесплатно</h3>
							<!-- LINK -->
							<a href="https://iteam.ru/landing/template/fin-uchet-vnedrenie.html"><button class="btn btn-danger">Подробнее</button></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- END OF LISTING -->
    <!-- LISTING -->
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="row vertical-align">
						<div class="col-md-2">
							<!-- LINK -->
							<img src="https://iteam.ru/img/icon.png">
						</div>
						<div class="col-md-8">
							<!-- LINK -->
							<h3><a href="https://iteam.ru/landing/template/fin-uchet-systema-podderzhki-resheniy.html">УПРАВЛЕНЧЕСКИЙ ФИНАНСОВЫЙ УЧЕТ: СИСТЕМА ПОДДЕРЖКИ РЕШЕНИЙ</a></h3>
							<p>
								На&nbsp;мастер-классе обсудим: как провести аудит финансовой системы; как изменить систему учёта, чтобы иметь понятную, внятную информацию о&nbsp;бизнесе; как избежать типичных ошибок, совершаемых многими управленцами при создании системы управленческого финансового учёта. Готовое практическое руководство к&nbsp;действию. Мастер-класс является вводным для мастер-проекта <a href="https://iteam.ru/landing/template/sozdanie-sistemy-fin-ucheta.html">&laquo;Создание системы управленческого финансового учета&raquo;</a>
							</p>
						</div>
						<div class="col-md-2 text-center">
							<h3>Бесплатно</h3>
							<!-- LINK -->
							<a href="https://iteam.ru/landing/template/fin-uchet-systema-podderzhki-resheniy.html"><button class="btn btn-danger">Подробнее</button></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- END OF LISTING -->
	<!-- LISTING -->
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="row vertical-align">
						<div class="col-md-2">
							<!-- LINK -->
							<img src="https://iteam.ru/img/icon.png">
						</div>
						<div class="col-md-8">
							<!-- LINK -->
							<h3><a href="https://iteam.ru/landing/template/razrabotka-planov-kompanii.html">РАЗРАБОТКА ПЛАНОВ И&nbsp;БЮДЖЕТОВ КОМПАНИИ НА&nbsp;2018&nbsp;ГОД</a></h3>
							<p>
								Как создать инструменты управления на&nbsp;основе планирования, которые будут работать? Пошаговый алгоритм работы по&nbsp;созданию комплекса годовых планов и&nbsp;бюджетов на&nbsp;2018&nbsp;год. Обсудим и&nbsp;разработаем на&nbsp;мастер-классе: цели вашей компании на&nbsp;год, план маркетинга и&nbsp;план продаж, производственные планы и&nbsp;планы ресурсные, бюджет доходов и&nbsp;расходов, инвестиционный бюджет, бюджет движения денежных средств, процессы управления на&nbsp;основе планов и&nbsp;бюджетов.
							</p>
						</div>
						<div class="col-md-2 text-center">
							<h3>Бесплатно</h3>
							<!-- LINK -->
							<a href="https://iteam.ru/landing/template/razrabotka-planov-kompanii.html"><button class="btn btn-danger">Подробнее</button></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- END OF LISTING -->
	<!-- LISTING -->
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="row vertical-align">
						<div class="col-md-2">
							<!-- LINK -->
							<img src="https://iteam.ru/img/icon.png">
						</div>
						<div class="col-md-8">
							<!-- LINK -->
							<h3><a href="https://iteam.ru/landing/template/razrabotka-pokazateley-kpi.html">РАЗРАБОТКА ПОКАЗАТЕЛЕЙ KPI</a></h3>
							<p>
								Как научиться грамотно применять KPI для мотивации сотрудников? Как создать систему контроллинга процессов? На&nbsp;мастер-классе мы&nbsp;подробно разберем план разработки и&nbsp;внедрения показателей KPI, методы измерения показателей процессов, понятие вариабельности и&nbsp;статистические методы контроля процессов. В&nbsp;комплект дополнительных материалов входят: готовые шаблоны, методика разработки показателей деятельности сотрудников, примеры отчётов и&nbsp;показателей KPI сотрудников.
							</p>
						</div>
						<div class="col-md-2 text-center">
							<h3>4&thinsp;000&nbsp;&#8381;</h3>
							<!-- LINK -->
							<a href="https://iteam.ru/landing/template/razrabotka-pokazateley-kpi.html"><button class="btn btn-danger">Подробнее</button></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- END OF LISTING -->
	<!-- LISTING -->
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="row vertical-align">
						<div class="col-md-2">
							<!-- LINK -->
							<img src="https://iteam.ru/img/icon.png">
						</div>
						<div class="col-md-8">
							<!-- LINK -->
							<h3><a href="https://iteam.ru/landing/template/razrabatyvaem-plan-marketinga-na-2018-god.html">РАЗРАБАТЫВАЕМ ПЛАН МАРКЕТИНГА НА&nbsp;2018&nbsp;ГОД</a></h3>
							<p>
								Маркетинг&nbsp;&mdash; это прежде всего ваша стратегия продаж. Именно поэтому, после определения целей компании, в&nbsp;первую очередь создается план маркетинга. Только после этого формируются планы продаж, производства, закупок и&nbsp;все остальные. На&nbsp;мастер-классе мы&nbsp;подробно рассматриваем порядок разработки плана маркетинга компании. Дополнительные материалы: комплект готовых шаблонов, презентация PDF и&nbsp;видеозапись. <a href="https://iteam.ru/landing/template/razrabotka-planov-i-budzhetov-MP.html">Второй этап мастер-проекта &laquo;Разработка планов и&nbsp;бюджетов компании на&nbsp;год&raquo;</a> начинается с&nbsp;этого мастер-класса.
							</p>
						</div>
						<div class="col-md-2 text-center">
							<h3>4&thinsp;000&nbsp;&#8381;</h3>
							<!-- LINK -->
							<a href="https://iteam.ru/landing/template/razrabatyvaem-plan-marketinga-na-2018-god.html"><button class="btn btn-danger">Подробнее</button></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- END OF LISTING -->
	<!-- LISTING -->
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="row vertical-align">
						<div class="col-md-2">
							<!-- LINK -->
							<img src="https://iteam.ru/img/icon.png">
						</div>
						<div class="col-md-8">
							<!-- LINK -->
							<h3><a href="https://iteam.ru/landing/template/stavim-celi-kompanii-na-2018-god.html">СТАВИМ ЦЕЛИ КОМПАНИИ НА&nbsp;2018&nbsp;ГОД</a></h3>
							<p>
								Планирование любого уровня начинается с&nbsp;постановки правильных целей. Как организовать работу управленческой команды для определения целей компании на&nbsp;год? Как провести продуктивное обсуждение и&nbsp;оформить результаты работы? Вы&nbsp;разобрались с&nbsp;целями, что делать дальше? <a href="https://iteam.ru/landing/template/razrabotka-planov-i-budzhetov-MP.html">Первый этап мастер-проекта &laquo;Разработка планов и&nbsp;бюджетов компании на&nbsp;год&raquo;</a> начинается с&nbsp;этого мастер-класса. Дополнительные материалы: регламент рабочей сессии по&nbsp;определению целей, презентация и&nbsp;готовый шаблон документа &laquo;Цели компании на&nbsp;2018&nbsp;год&raquo;.
							</p>
						</div>
						<div class="col-md-2 text-center">
							<h3>4&thinsp;000&nbsp;&#8381;</h3>
							<!-- LINK -->
							<a href="https://iteam.ru/landing/template/stavim-celi-kompanii-na-2018-god.html"><button class="btn btn-danger">Подробнее</button></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- END OF LISTING -->
	<!-- LISTING -->
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="row vertical-align">
						<div class="col-md-2">
							<!-- LINK -->
							<img src="https://iteam.ru/img/icon.png">
						</div>
						<div class="col-md-8">
							<!-- LINK -->
							<h3><a href="https://iteam.ru/landing/template/strategicheskii-analiz-problem-kompanii.html">СТРАТЕГИЧЕСКИЙ АНАЛИЗ ПРОБЛЕМ КОМПАНИИ</a></h3>
							<p>
								Не&nbsp;знаете, с&nbsp;чего начать разработку стратегии компании? Начните с&nbsp;этого мастер-класса! В&nbsp;программе: анализ внутренних и&nbsp;внешних ограничений и&nbsp;рисков, построение карты проблемной области и&nbsp;определение главных стратегических проблем компании. Все участники получают готовый комплект рабочих материалов. Первый этап <a href="https://iteam.ru/learn/course/razrabotka-strategii-kompanii">мастер-проекта &laquo;Разработка стратегии и&nbsp;миссии компании&raquo;</a> начинается с&nbsp;этого мастер-класса.
							</p>
						</div>
						<div class="col-md-2 text-center">
							<h3>4&thinsp;000&nbsp;&#8381;</h3>
							<!-- LINK -->
							<a href="https://iteam.ru/landing/template/strategicheskii-analiz-problem-kompanii.html"><button class="btn btn-danger">Подробнее</button></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- END OF LISTING -->
	<!-- LISTING -->
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="row vertical-align">
						<div class="col-md-2">
							<!-- LINK -->
							<img src="https://iteam.ru/img/icon.png">
						</div>
						<div class="col-md-8">
							<!-- LINK -->
							<h3><a href="https://iteam.ru/landing/template/razrabotka-strategii-i-missii-kompanii.html">КОМПЛЕКТ ИЗ 3 КУРСОВ: РАЗРАБОТКА СТРАТЕГИИ И МИССИИ КОМПАНИИ</a></h3>
							<p>
								Чтобы создать действительно работающую стратегию компании, используйте комплект из&nbsp;3-х мастер-классов: &laquo;Как найти миссию компании?&raquo;, &laquo;Управление стратегией с&nbsp;помощью сбалансированной системы показателей (BSC)&raquo; и&nbsp;&laquo;Как создается стратегия. Краткое руководство по&nbsp;проектированию будущего&raquo;. Внутри вы&nbsp;найдете: 3&nbsp;мастер-класса (6&nbsp;часов видео), 3&nbsp;рабочих тетради по&nbsp;стратегии (бери-и-внедряй) и&nbsp;готовые пошаговые инструкции.
							</p>
						</div>
						<div class="col-md-2 text-center">
							<h3>5&thinsp;000&nbsp;&#8381;</h3>
							<!-- LINK -->
							<a href="https://iteam.ru/landing/template/razrabotka-strategii-i-missii-kompanii.html"><button class="btn btn-danger">Подробнее</button></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- END OF LISTING -->
	<!-- LISTING -->
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="row vertical-align">
						<div class="col-md-2">
							<!-- LINK -->
							<img src="https://iteam.ru/img/icon.png">
						</div>
						<div class="col-md-8">
							<!-- LINK -->
							<h3><a href="https://iteam.ru/landing/template/11practic_tehobuchenija_uprdengami.html">ПРАКТИКИ ДЕЛЯТСЯ ОПЫТОМ: КАК&nbsp;ЭФФЕКТИВНО УПРАВЛЯТЬ ДЕНЕЖНЫМИ СРЕДСТВАМИ</a></h3>
							<p>
							    &laquo;О&nbsp;чем&nbsp;бы вы&nbsp;ни&nbsp;говорили, речь всегда идет о&nbsp;деньгах ...&raquo; . Как эффективно управлять финансами компании, если это ваша обязанность?<br>
                                Как выбрать эффективную стратегию управления деньгами? Как обеспечить наличие денег на&nbsp;счетах для проведения платежей?<br>
                                На&nbsp;мастер-классе разбираем кейсы компаний из&nbsp;разных сфер деятельности. Ведущий&nbsp;&mdash; Дмитрий Корнилин, преподаватель MBI, эксперт, специалист-практик, последние 12&nbsp;лет занимает должность финансового директора.
							</p>
						</div>
						<div class="col-md-2 text-center">
							<h3>Бесплатно</h3>
							<!-- LINK -->
							<a href="https://iteam.ru/landing/template/11practic_tehobuchenija_uprdengami.html"><button class="btn btn-danger">Подробнее</button></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- END OF LISTING -->
	<!-- LISTING -->
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="row vertical-align">
						<div class="col-md-2">
							<!-- LINK -->
							<img src="https://iteam.ru/img/icon.png">
						</div>
						<div class="col-md-8">
							<!-- LINK -->
							<h3><a href="https://iteam.ru/landing/template/tehnologii_obuchenija_new.html">ТЕХНОЛОГИЯ ОБУЧЕНИЯ УПРАВЛЕНЦЕВ. СЕМЬ ПРОБЛЕМ — ОДНО РЕШЕНИЕ</a></h3>
							<p>
								Мы&nbsp;выделили семь главных проблем, которые препятствуют развитию большинства компаний, на&nbsp;основании нашего 20-летнего опыта работы в&nbsp;управленческом консалтинге. Проблем может быть много, но&nbsp;решение одно&nbsp;&mdash; повышение управленческой квалификации руководителей. Дополнительно: комплект материалов, разработанных нами для обучения управленцев; технология их&nbsp;применения для повышения квалификации руководителей; проверенные на&nbsp;практике инструменты для решения ключевых проблем, которые мешают росту и&nbsp;развитию бизнеса.
							</p>
						</div>
						<div class="col-md-2 text-center">
							<h3>Бесплатно</h3>
							<!-- LINK -->
							<a href="https://iteam.ru/landing/template/tehnologii_obuchenija_new.html"><button class="btn btn-danger">Подробнее</button></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- END OF LISTING -->
	<!-- LISTING -->
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="row vertical-align">
						<div class="col-md-2">
							<!-- LINK -->
							<img src="https://iteam.ru/img/icon.png">
						</div>
						<div class="col-md-8">
							<!-- LINK -->
							<h3><a href="https://iteam.ru/landing/template/11ef_practic_organizacii_komandnoi_raboti.html">11&nbsp;ЭФФЕКТИВНЫХ ПРАКТИК ДЛЯ&nbsp;ОРГАНИЗАЦИИ КОМАНДНОЙ РАБОТЫ В&nbsp;ВАШЕМ БИЗНЕСЕ</a></h3>
							<p>
							    Команда&nbsp;&mdash; это согласованность действий, взаимная поддержка, общее видение целей, драйв от&nbsp;работы, в&nbsp;которой каждый растет как профессионал и&nbsp;как личность. Много&nbsp;ли сильных управленческих команд мы&nbsp;видим вокруг себя? Мы&nbsp;дадим вам 11&nbsp;практик, внедрение которых в&nbsp;вашей компании станет прорывом в&nbsp;организации командной работы управленцев. В&nbsp;комплекте материалов вы&nbsp;найдете: видеозапись и&nbsp;презентацию мастер-класса, тест ролей в&nbsp;команде, тест квалификации команды, тест командного взаимодействия, методика проведения тестирования, регламент работы управленческой команды, дневник команды, а&nbsp;также список рекомендованных книг для корпоративной библиотеки.
							</p>
						</div>
						<div class="col-md-2 text-center">
							<h3>Бесплатно</h3>
							<!-- LINK -->
							<a href="https://iteam.ru/landing/template/11ef_practic_organizacii_komandnoi_raboti.html"><button class="btn btn-danger">Подробнее</button></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- END OF LISTING -->
	<!-- LISTING -->
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="row vertical-align">
						<div class="col-md-2">
							<!-- LINK -->
							<img src="https://iteam.ru/img/icon.png">
						</div>
						<div class="col-md-8">
							<!-- LINK -->
							<h3><a href="https://iteam.ru/landing/template/kak-sozdaty-sistemu-upravleniya-processami.html">КАК СОЗДАТЬ СИСТЕМУ УПРАВЛЕНИЯ ПРОЦЕССАМИ ЗА&nbsp;4&nbsp;МЕСЯЦА</a></h3>
							<p>
								Каждая компания состоит из&nbsp;процессов, преобразующих ресурсы в&nbsp;результаты, востребованные клиентами. Но&nbsp;лишь немногие компании добиваются повышения эффективности с&nbsp;помощью процессного подхода к&nbsp;управлению. Мы&nbsp;даем ключ к&nbsp;овладению мастерством управления процессами. Этот мастер-класс служит введением к&nbsp;<a href="https://iteam.ru/learn/course/kak-postroit-sistemu-upravlenija-protsessami-za-4-mesjatsa">мастер-проекту «Создание системы управления процессами компании»</a>
							</p>
						</div>
						<div class="col-md-2 text-center">
							<h3>4000&nbsp;&#8381;</h3>
							<!-- LINK -->
							<a href="https://iteam.ru/landing/template/kak-sozdaty-sistemu-upravleniya-processami.html"><button class="btn btn-danger">Подробнее</button></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- END OF LISTING -->

	<!-- LISTING -->
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="row vertical-align">
						<div class="col-md-2">
							<!-- LINK -->
							<img src="https://iteam.ru/img/icon.png">
						</div>
						<div class="col-md-8">
							<!-- LINK -->
							<h3><a href="https://iteam.ru/learn/webinar/manage_rightly">УПРАВЛЯТЬ ПО-НАСТОЯЩЕМУ</a></h3>
							<p>
								Компания, действующая на&nbsp;конкурентном рынке, должна быть похожа на&nbsp;боевой истребитель, у&nbsp;которого есть все, что&nbsp;нужно для&nbsp;поражения цели, и&nbsp;ничего лишнего. Чтобы&nbsp;превратить свою компанию в&nbsp;боевую машину, нужно решить пять главных управленческих задач. Этот мастер-класс служит введением <a href="https://iteam.ru/learn/course/effective_company">к&nbsp;мастер-проекту «Целевое управление. Как сделать компанию управляемой и эффективной»</a>
							</p>
						</div>
						<div class="col-md-2 text-center">
							<h3>Бесплатно</h3>
							<!-- LINK -->
							<a href="https://iteam.ru/learn/webinar/manage_rightly"><button class="btn btn-danger">Подробнее</button></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- END OF LISTING -->
	<!-- LISTING -->
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="row vertical-align">
						<div class="col-md-2">
							<!-- LINK -->
							<img src="https://iteam.ru/img/icon.png">
						</div>
						<div class="col-md-8">
							<!-- LINK -->
							<h3><a href="https://iteam.ru/learn/webinar/effective_planning">КАК ОРГАНИЗОВАТЬ ПЛАНИРОВАНИЕ В&nbsp;КОМПАНИИ ОТ&nbsp;СТРАТЕГИЧЕСКОГО ДО&nbsp;ОПЕРАТИВНОГО УРОВНЯ</a></h3>
							<p>
								Планирование часто путают с&nbsp;предсказанием, прогнозированием или&nbsp;директивной постановкой целей. Это&nbsp;не&nbsp;имеет ничего общего с&nbsp;тем, что&nbsp;на&nbsp;самом деле нужно сделать для&nbsp;создания системы управления компанией на&nbsp;основе планирования. Мастер-класс дает тщательно отработанную методику построения системы планирования от&nbsp;стратегического до&nbsp;оперативного уровня.</a>
							</p>
						</div>
						<div class="col-md-2 text-center">
							<h3>2&thinsp;400&nbsp;&#8381;</h3>
							<!-- LINK -->
							<a href="https://iteam.ru/learn/webinar/effective_planning"><button class="btn btn-danger">Подробнее</button></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- END OF LISTING -->
	<!-- LISTING -->
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="row vertical-align">
						<div class="col-md-2">
							<!-- LINK -->
							<img src="https://iteam.ru/img/icon.png">
						</div>
						<div class="col-md-8">
							<!-- LINK -->
							<h3><a href="https://iteam.ru/learn/webinar/secret_weapon_2">ИЗМЕНИТЕ ПОДХОД К&nbsp;МОТИВАЦИИ ВАШИХ СОТРУДНИКОВ</a></h3>
							<p>
								Этот&nbsp;мастер-класс опровергает традиционные, широко распространенные представления о&nbsp;мотивации людей к&nbsp;труду и&nbsp;дает альтернативный подход к&nbsp;вовлечению людей в&nbsp;трудовую деятельность. Этот&nbsp;подход основан на&nbsp;многочисленных исследованиях в&nbsp;области психологии и&nbsp;практике организаций, сумевших добиться выдающихся результатов благодаря эффективному использованию энергии и&nbsp;интеллекта своих сотрудников. Вам&nbsp;не&nbsp;следует это&nbsp;смотреть, если вы&nbsp;твердо убеждены, что&nbsp; кнут и пряник — лучшие методы управления людьми.</a>
							</p>
						</div>
						<div class="col-md-2 text-center">
							<h3>4&thinsp;000&nbsp;&#8381;</h3>
							<!-- LINK -->
							<a href="https://iteam.ru/learn/webinar/secret_weapon_2"><button class="btn btn-danger">Подробнее</button></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- END OF LISTING -->
	<!-- LISTING -->
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="row vertical-align">
						<div class="col-md-2">
							<!-- LINK -->
							<img src="https://iteam.ru/img/icon.png">
						</div>
						<div class="col-md-8">
							<!-- LINK -->
							<h3><a href="https://iteam.ru/learn/webinar/baza-znanij-russkij-menedzhment">БАЗА ЗНАНИЙ «РУССКИЙ МЕНЕДЖМЕНТ»</a></h3>
							<p>
								Корпоративная обучающая видеотека по управлению: 42&nbsp;мастер-класса, 3&nbsp;видеокурса, 124+&nbsp;часов полезного видео. Обучите менеджменту всех сотрудников компании! Неограниченный доступ по&nbsp;времени и&nbsp;количеству скачиваний ко&nbsp;всем мастер-классам и&nbsp;видеокурсам iTeam. Все&nbsp;тренинги по&nbsp;управлению в&nbsp;одном комплекте.</a>
							</p>
						</div>
						<div class="col-md-2 text-center">
							<h3>80&thinsp;000&nbsp;&#8381;</h3>
							<!-- LINK -->
							<a href="https://iteam.ru/learn/webinar/baza-znanij-russkij-menedzhment"><button class="btn btn-danger">Подробнее</button></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- END OF LISTING -->
	<!-- LISTING -->
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="row vertical-align">
						<div class="col-md-2">
							<!-- LINK -->
							<img src="https://iteam.ru/img/icon.png">
						</div>
						<div class="col-md-8">
							<!-- LINK -->
							<h3><a href="https://iteam.ru/learn/webinar/middle_manager">ЧЕМУ И&nbsp;КАК НУЖНО ОБУЧАТЬ РУКОВОДИТЕЛЕЙ</a></h3>
							<p>
								Квалификация управленцев&nbsp;–&nbsp;слабое звено практически каждой компании. Существующие методы обучения не&nbsp;дают эффективного решения этой проблемы. Мы&nbsp;даем уникальный метод обучения руководителей, интегрированный с&nbsp;их&nbsp;практической деятельностью и&nbsp;обеспечивающий максимальную эффективность усвоения новых знаний и&nbsp;навыков.</a>
							</p>
						</div>
						<div class="col-md-2 text-center">
							<h3>400&nbsp;&#8381;</h3>
							<!-- LINK -->
							<a href="https://iteam.ru/learn/webinar/middle_manager"><button class="btn btn-danger">Подробнее</button></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- END OF LISTING -->
	<!-- LISTING -->
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="row vertical-align">
						<div class="col-md-2">
							<!-- LINK -->
							<img src="https://iteam.ru/img/icon.png">
						</div>
						<div class="col-md-8">
							<!-- LINK -->
							<h3><a href="https://iteam.ru/learn/webinar/calculate-cost-products">КАК&nbsp;ПРАВИЛЬНО РАССЧИТАТЬ СЕБЕСТОИМОСТЬ ПРОДУКТОВ И&nbsp;УСЛУГ</a></h3>
							<p>Определение себестоимости продуктов и&nbsp;услуг&nbsp;–&nbsp;это область многочисленных заблуждений и&nbsp;ошибок. Эти&nbsp;ошибки дорого обходятся компаниям, поскольку влекут за&nbsp;собой убийственную ценовую политику и&nbsp;порочные стратегические решения.

								Мы анализируем ошибки, допускаемые управленцами в&nbsp;вопросах себестоимости и&nbsp;ценообразования, и&nbsp;даем верную методику расчета себестоимости продуктов и&nbsp;услуг.</a>
							</p>
						</div>
						<div class="col-md-2 text-center">
							<h3>4&thinsp;200&nbsp;&#8381;</h3>
							<!-- LINK -->
							<a href="https://iteam.ru/learn/webinar/calculate-cost-products"><button class="btn btn-danger">Подробнее</button></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- END OF LISTING -->
	<!-- LISTING -->
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="row vertical-align">
						<div class="col-md-2">
							<!-- LINK -->
							<img src="https://iteam.ru/img/icon.png">
						</div>
						<div class="col-md-8">
							<!-- LINK -->
							<h3><a href="https://iteam.ru/learn/webinar/strategy_vision">КАК СОЗДАЕТСЯ СТРАТЕГИЯ. КРАТКОЕ РУКОВОДСТВО ПО&nbsp;ПРОЕКТИРОВАНИЮ БУДУЩЕГО</a></h3>
							<p>
								Мастер-класс посвящен подробному рассмотрению процесса разработки стратегии компании. Дается последовательность этапов работы над&nbsp;стратегией, обсуждаются задачи каждого этапа и&nbsp;результаты, которые необходимо получить.

								Материалы этого&nbsp;мастер-класса можно использовать как&nbsp;эталон для&nbsp;организации проекта разработки стратегии компании.</a>
							</p>
						</div>
						<div class="col-md-2 text-center">
							<h3>4&thinsp;000&nbsp;&#8381;</h3>
							<!-- LINK -->
							<a href="https://iteam.ru/learn/webinar/strategy_vision"><button class="btn btn-danger">Подробнее</button></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- END OF LISTING -->
	<!-- LISTING -->
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="row vertical-align">
						<div class="col-md-2">
							<!-- LINK -->
							<img src="https://iteam.ru/img/icon.png">
						</div>
						<div class="col-md-8">
							<!-- LINK -->
							<h3><a href="https://iteam.ru/learn/webinar/what-is-roi">ЧТО ТАКОЕ ROI И&nbsp;КАК РАССЧИТАТЬ ОТДАЧУ НА&nbsp;ИНВЕСТИЦИИ</a></h3>
							<p>
								На нашем мастер-классе мы рассмотрели проблемы, связанные с&nbsp;ROI (Return On Investments&nbsp;-&nbsp;показатель отдачи на&nbsp;инвестиции), и&nbsp;дали методику этого&nbsp;показателя, который является наиболее адекватной оценкой бизнеса.</a>
							</p>
						</div>
						<div class="col-md-2 text-center">
							<h3>4&thinsp;000&nbsp;&#8381;</h3>
							<!-- LINK -->
							<a href="https://iteam.ru/learn/webinar/what-is-roi"><button class="btn btn-danger">Подробнее</button></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- END OF LISTING -->
	<!-- LISTING -->
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="row vertical-align">
						<div class="col-md-2">
							<!-- LINK -->
							<img src="https://iteam.ru/img/icon.png">
						</div>
						<div class="col-md-8">
							<!-- LINK -->
							<h3><a href="https://iteam.ru/learn/webinar/balanced_system">УПРАВЛЕНИЕ СТРАТЕГИЕЙ КОМПАНИИ С&nbsp;ПОМОЩЬЮ СБАЛАНСИРОВАННОЙ СИСТЕМЫ ПОКАЗАТЕЛЕЙ (BSC)</a></h3>
							<p>
								Мастер-класс дает четко определенную методику построения сбалансированной системы показателей. ССП&nbsp;позиционируется как&nbsp;инструмент стратегического контроллинга, обеспечивающий управление стратегией компании. Определены этапы разработки ССП, дано подробное описание порядка выполнения каждого этапа, представлены практические примеры из&nbsp;проектов разработка стратегически показателе.

								Этот мастер-класс служит введением в&nbsp;<a href="https://iteam.ru/learn/course/bsc_strategy_management">мастер-проект «Управление стратегией с&nbsp;помощью сбалансированной системы показателей»</a>
							</p>
						</div>
						<div class="col-md-2 text-center">
							<h3>4&thinsp;000&#8381;</h3>
							<!-- LINK -->
							<a href="https://iteam.ru/learn/webinar/balanced_system"><button class="btn btn-danger">Подробнее</button></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- END OF LISTING -->
	<!-- LISTING -->
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="row vertical-align">
						<div class="col-md-2">
							<!-- LINK -->
							<img src="https://iteam.ru/img/icon.png">
						</div>
						<div class="col-md-8">
							<!-- LINK -->
							<h3><a href="https://iteam.ru/learn/webinar/razrabotka-strategii-shag-za-shagom">РАЗРАБОТКА СТРАТЕГИИ ШАГ ЗА&nbsp;ШАГОМ</a></h3>
							<p>
								Этот мастер-класс служит введением в&nbsp;мастер-проект <a href="https://iteam.ru/learn/course/razrabotka-strategii-kompanii"«Разработка стратегии компании»></a> Он&nbsp;дает полное представление о&nbsp;том, как&nbsp;организован проект разработки стратегии, из&nbsp;каких этапов он&nbsp;состоит, какие задачи решаются на&nbsp;каждом этап, что&nbsp;является результатом каждого этапа и&nbsp;проекта в&nbsp;целом.</a>
							</p>
						</div>
						<div class="col-md-2 text-center">
							<h3>4&thinsp;000&nbsp;&#8381;</h3>
							<!-- LINK -->
							<a href="https://iteam.ru/learn/webinar/razrabotka-strategii-shag-za-shagom"><button class="btn btn-danger">Подробнее</button></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- END OF LISTING -->
	<!-- LISTING -->
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="row vertical-align">
						<div class="col-md-2">
							<!-- LINK -->
							<img src="https://iteam.ru/img/icon.png">
						</div>
						<div class="col-md-8">
							<!-- LINK -->
							<h3><a href="https://iteam.ru/learn/webinar/mysli-globalno-dejstvuj-lokalno">МЫСЛИ ГЛОБАЛЬНО, ДЕЙСТВУЙ ЛОКАЛЬНО

							</a></h3>
							<p>
								Увидеть, каким станет наше будущее, не&nbsp;так&nbsp;уж сложно. Ведь будущее живет с&nbsp;нами уже&nbsp;сегодня. Все, что&nbsp;будет определять жизнь людей через 10-20 лет, существует в&nbsp;настоящее время в&nbsp;виде тенденций, инновационных проектов, прорывных технологий, опытных образцов продукции будущего. Нам&nbsp;остается только представить, каким станет наш&nbsp;мир, когда все&nbsp;это войдет в&nbsp;нашу жизнь как повседневная реальность.</a>
							</p>
						</div>
						<div class="col-md-2 text-center">
							<h3>4&thinsp;000&nbsp;&#8381;</h3>
							<!-- LINK -->
							<a href="https://iteam.ru/learn/webinar/mysli-globalno-dejstvuj-lokalno"><button class="btn btn-danger">Подробнее</button></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- END OF LISTING -->
	<!-- LISTING -->
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="row vertical-align">
						<div class="col-md-2">
							<!-- LINK -->
							<img src="https://iteam.ru/img/icon.png">
						</div>
						<div class="col-md-8">
							<!-- LINK -->
							<h3><a href="https://iteam.ru/learn/webinar/offset-investment">ОКУПАЮТСЯ&nbsp;ЛИ ВАШИ ИНВЕСТИЦИИ В&nbsp;РАЗВИТИЕ? СЧИТАЕМ И&nbsp;АНАЛИЗИРУЕМ

							</a></h3>
							<p>
								Говорим о&nbsp;том, как&nbsp;анализировать инвестиции в развитие бизнеса: критерии, инструменты, выводы.</a>
							</p>
						</div>
						<div class="col-md-2 text-center">
							<h3>4&thinsp;000&nbsp;&#8381;</h3>
							<!-- LINK -->
							<a href="https://iteam.ru/learn/webinar/offset-investment"><button class="btn btn-danger">Подробнее</button></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- END OF LISTING -->
	<!-- LISTING -->
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="row vertical-align">
						<div class="col-md-2">
							<!-- LINK -->
							<img src="https://iteam.ru/img/icon.png">
						</div>
						<div class="col-md-8">
							<!-- LINK -->
							<h3><a href="https://iteam.ru/learn/webinar/findir-duties">ЧЕМ ДОЛЖЕН ЗАНИМАТЬСЯ ФИНАНСОВЫЙ ДИРЕКТОР?</a></h3>
							<p>
								Роль финансового директора в&nbsp;компании зачастую понимается неверно и&nbsp;ее потенциал реализуется в&nbsp;крайне ограниченном объеме. Такая деформация управленческих функций негативно отражается на&nbsp;результативности и&nbsp;эффективности бизнеса. Как этого избежать, поговорим на мастер-классе.</a>
							</p>
						</div>
						<div class="col-md-2 text-center">
							<h3>4&thinsp;000&nbsp;&#8381;</h3>
							<!-- LINK -->
							<a href="https://iteam.ru/learn/webinar/findir-duties"><button class="btn btn-danger">Подробнее</button></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- END OF LISTING -->
	<!-- LISTING -->
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="row vertical-align">
						<div class="col-md-2">
							<!-- LINK -->
							<img src="https://iteam.ru/img/icon.png">
						</div>
						<div class="col-md-8">
							<!-- LINK -->
							<h3><a href="https://iteam.ru/learn/webinar/indirect-cost-allocation">МЕТОДЫ РАСПРЕДЕЛЕНИЯ КОСВЕННЫХ РАСХОДОВ</a></h3>
							<p>
								Какие расходы следует относить на&nbsp;продукты и&nbsp;в&nbsp;какой пропорции? Это темы непрекращающихся дискуссий между финансистами, маркетологами и производственниками. А кем являетесь вы?</a>
							</p>
						</div>
						<div class="col-md-2 text-center">
							<h3>4&thinsp;000&nbsp;&#8381;</h3>
							<!-- LINK -->
							<a href="https://iteam.ru/learn/webinar/indirect-cost-allocation"><button class="btn btn-danger">Подробнее</button></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- END OF LISTING -->
	<!-- LISTING -->
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="row vertical-align">
						<div class="col-md-2">
							<!-- LINK -->
							<img src="https://iteam.ru/img/icon.png">
						</div>
						<div class="col-md-8">
							<!-- LINK -->
							<h3><a href="https://iteam.ru/learn/webinar/finance">ЧТО&nbsp;ДОЛЖЕН ЗНАТЬ КАЖДЫЙ РУКОВОДИТЕЛЬ О&nbsp;ФИНАНСАХ

							</a></h3>
							<p>
								Мастер-класс дает четко определенную модель финансового учета компании. Определены конкретные требования к&nbsp;построению структуры доходов, расходов и&nbsp;прибыли. Представлены стандарты финансовой отчетности и&nbsp;ключевые финансовые показатели. Дана структура финансовой службы и&nbsp;ее&nbsp;функции. Эти&nbsp;знания необходимы каждому руководителю компании, чтобы&nbsp;ставить конкретные задачи финансовой службе и&nbsp;оценивать результаты ее&nbsp;работы.

							</a>
						</p>
					</div>
					<div class="col-md-2 text-center">
						<h3>4&thinsp;000&nbsp;&#8381;</h3>
						<!-- LINK -->
						<a href="https://iteam.ru/learn/webinar/finance"><button class="btn btn-danger">Подробнее</button></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- END OF LISTING -->
<!-- LISTING -->
<div class="row">
	<div class="col-md-10 col-md-offset-1">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="row vertical-align">
					<div class="col-md-2">
						<!-- LINK -->
						<img src="https://iteam.ru/img/icon.png">
					</div>
					<div class="col-md-8">
						<!-- LINK -->
						<h3><a href="https://iteam.ru/learn/webinar/project_man">УПРАВЛЕНИЕ ПРОЕКТАМИ: СУТЬ&nbsp;ДЕЛА</a></h3>
						<p>
							Проектный менеджмент перегружен множеством понятий и&nbsp;методов, мало применимых в&nbsp;практике большинства компаний. Излишнее усложнение этой области управления является серьезным препятствием для&nbsp;большинства менеджеров. Мы&nbsp;даем простую и&nbsp;практически применимую концепцию управления проектами, которой может овладеть любая компания.</a>
						</p>
					</div>
					<div class="col-md-2 text-center">
						<h3>4&thinsp;000&nbsp;&#8381;</h3>
						<!-- LINK -->
						<a href="https://iteam.ru/learn/webinar/project_man"><button class="btn btn-danger">Подробнее</button></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- END OF LISTING -->
<!-- LISTING -->
<div class="row">
	<div class="col-md-10 col-md-offset-1">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="row vertical-align">
					<div class="col-md-2">
						<!-- LINK -->
						<img src="https://iteam.ru/img/icon.png">
					</div>
					<div class="col-md-8">
						<!-- LINK -->
						<h3><a href="https://iteam.ru/learn/webinar/process_structure">КАК НАЙТИ И&nbsp;УКРЕПИТЬ САМОЕ СЛАБОЕ ЗВЕНО В&nbsp;ЦЕПИ ПРОЦЕССОВ</a></h3>
						<p>
							Этот&nbsp;мастер-класс поможет овладеть базовыми понятиями и&nbsp;методиками, применяемыми при&nbsp;построении бизнес-процессов: измерение вариабельности (изменчивости) процессов, нахождение слабого звена в&nbsp;цепи процессов, оценка уровня зрелости процессов.</a>
						</p>
					</div>
					<div class="col-md-2 text-center">
						<h3>4&thinsp;000&nbsp;&#8381;</h3>
						<!-- LINK -->
						<a href="https://iteam.ru/learn/webinar/process_structure"><button class="btn btn-danger">Подробнее</button></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- END OF LISTING -->
<!-- LISTING -->
<div class="row">
	<div class="col-md-10 col-md-offset-1">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="row vertical-align">
					<div class="col-md-2">
						<!-- LINK -->
						<img src="https://iteam.ru/img/icon.png">
					</div>
					<div class="col-md-8">
						<!-- LINK -->
						<h3><a href="https://iteam.ru/learn/webinar/improve_business">КАК&nbsp;УЛУЧШИТЬ БИЗНЕС-ПРОЦЕССЫ КОМПАНИИ</a></h3>
						<p>
							Всё, что&nbsp;производит компания, все&nbsp;её продукты и&nbsp;услуги – это&nbsp;результаты бизнес-процессов, то&nbsp;есть последовательность определенных действий с&nbsp;запланированным итогом.

							Поэтому так&nbsp;важно улучшать бизнес-процессы компании, добиваясь стабильности результатов, большей продуктивности и&nbsp;большей отдачи на&nbsp;затраченные ресурсы.</a>
						</p>
					</div>
					<div class="col-md-2 text-center">
						<h3>4&thinsp;000&nbsp;&#8381;</h3>
						<!-- LINK -->
						<a href="https://iteam.ru/learn/webinar/improve_business"><button class="btn btn-danger">Подробнее</button></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- END OF LISTING -->
<!-- LISTING -->
<div class="row">
	<div class="col-md-10 col-md-offset-1">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="row vertical-align">
					<div class="col-md-2">
						<!-- LINK -->
						<img src="https://iteam.ru/img/icon.png">
					</div>
					<div class="col-md-8">
						<!-- LINK -->
						<h3><a href="https://iteam.ru/learn/webinar/diagnostics">ПОСТАВЬТЕ ДИАГНОЗ СВОЕМУ БИЗНЕСУ

						</a></h3>
						<p>
							Необходимость в&nbsp;организационной диагностике возникает в&nbsp;тех случаях, когда компания сталкивается с&nbsp;проблемами, причины которых не&nbsp;вполне ясны. Мы&nbsp;даем дорожную карту проведения организационной диагностики. Вы получите четкий план: что&nbsp;и&nbsp;в&nbsp;какой последовательности необходимо обследовать, на&nbsp;какие вопросы нужно получить конкретные ответы, чтобы&nbsp;обнаружить корни проблем и&nbsp;выработать действенные меры по&nbsp;их&nbsp;преодолению.

						</a>
					</p>
				</div>
				<div class="col-md-2 text-center">
					<h3>4&thinsp;000&nbsp;&#8381;</h3>
					<!-- LINK -->
					<a href="https://iteam.ru/learn/webinar/diagnostics"><button class="btn btn-danger">Подробнее</button></a>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
<!-- END OF LISTING -->
<!-- LISTING -->
<div class="row">
	<div class="col-md-10 col-md-offset-1">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="row vertical-align">
					<div class="col-md-2">
						<!-- LINK -->
						<img src="https://iteam.ru/img/icon.png">
					</div>
					<div class="col-md-8">
						<!-- LINK -->
						<h3><a href="https://iteam.ru/learn/webinar/kpi">КАК СОЗДАТЬ СИСТЕМУ&nbsp;KPI. ПРИМЕНЕНИЕ ПОКАЗАТЕЛЕЙ ДЕЯТЕЛЬНОСТИ ДЛЯ&nbsp;МОТИВАЦИИ СОТРУДНИКОВ

						</a></h3>
						<p>
							Система показателей деятельности (KPI) обычно создается как&nbsp;средство решения проблемы мотивации сотрудников. Однако в&nbsp;большинстве случаев эта&nbsp;цель не&nbsp;достигается&nbsp;или, хуже того, возрастает демотивация работников. На&nbsp;мастер-классе мы&nbsp;объясняем причины неудач подобных проектов и&nbsp;даем тщательно отработанную методику построения системы показателей деятельности. Суть дела в&nbsp;системном подходе к&nbsp;решению этой&nbsp;задачи.

						</a>
					</p>
				</div>
				<div class="col-md-2 text-center">
					<h3>4&thinsp;000&nbsp;&#8381;</h3>
					<!-- LINK -->
					<a href="https://iteam.ru/learn/webinar/kpi"><button class="btn btn-danger">Подробнее</button></a>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
<!-- END OF LISTING -->
<!-- LISTING -->
<div class="row">
	<div class="col-md-10 col-md-offset-1">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="row vertical-align">
					<div class="col-md-2">
						<!-- LINK -->
						<img src="https://iteam.ru/img/icon.png">
					</div>
					<div class="col-md-8">
						<!-- LINK -->
						<h3><a href="https://iteam.ru/learn/webinar/kak-vyjavit-skrytye-strategicheskie-problemy">КАК&nbsp;ВЫЯВИТЬ СКРЫТЫЕ СТРАТЕГИЧЕСКИЕ ПРОБЛЕМЫ ПОСЛЕ ПРОВЕДЕННОГО АНАЛИЗА

						</a></h3>
						<p>
							Дается методика работы управленческой команды по&nbsp;проведению всестороннего анализа стратегических проблем и&nbsp;выявлению направлений, имеющих потенциал развития для&nbsp;компании. Рассматривается практический пример проведения такого анализа. Этот&nbsp;мастер-класс является частью <a href="https://iteam.ru/learn/course/razrabotka-strategii-kompanii">мастер-проекта «Разработка стратегии компании»</a>.

						</a>
					</p>
				</div>
				<div class="col-md-2 text-center">
					<h3>4&thinsp;000&nbsp;&#8381;</h3>
					<!-- LINK -->
					<a href="https://iteam.ru/learn/webinar/kak-vyjavit-skrytye-strategicheskie-problemy"><button class="btn btn-danger">Подробнее</button></a>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
<!-- END OF LISTING -->
<!-- LISTING -->
<div class="row">
	<div class="col-md-10 col-md-offset-1">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="row vertical-align">
					<div class="col-md-2">
						<!-- LINK -->
						<img src="https://iteam.ru/img/icon.png">
					</div>
					<div class="col-md-8">
						<!-- LINK -->
						<h3><a href="https://iteam.ru/learn/webinar/org_change_architecture">АРХИТЕКТУРА ОРГАНИЗАЦИОННЫХ ИЗМЕНЕНИЙ

						</a></h3>
						<p>
							В&nbsp;проведении организационных изменений есть определенная логика и&nbsp;последовательность, такая&nbsp;же, как&nbsp;при&nbsp;строительстве здания. Нарушение этой логики ведет к&nbsp;неудачам в&nbsp;проектах организационного развития. Мы&nbsp;даем четко отработанную на&nbsp;практике последовательность проведения организационных изменений и&nbsp;подробное описание каждого этапа такого проекта.

						</a>
					</p>
				</div>
				<div class="col-md-2 text-center">
					<h3>4&thinsp;000&nbsp;&#8381;</h3>
					<!-- LINK -->
					<a href="https://iteam.ru/learn/webinar/org_change_architecture"><button class="btn btn-danger">Подробнее</button></a>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
<!-- END OF LISTING -->
<!-- LISTING -->
<div class="row">
	<div class="col-md-10 col-md-offset-1">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="row vertical-align">
					<div class="col-md-2">
						<!-- LINK -->
						<img src="https://iteam.ru/img/icon.png">
					</div>
					<div class="col-md-8">
						<!-- LINK -->
						<h3><a href="https://iteam.ru/learn/webinar/fast_company">БЫСТРАЯ КОМПАНИЯ. КАК&nbsp;СДЕЛАТЬ ИЗМЕНЕНИЯ ПОСТОЯННЫМИ

						</a></h3>
						<p>
							В&nbsp;быстро меняющемся мире компания должна меняться теми&nbsp;же темпами, с&nbsp;которыми происходят изменения в&nbsp;окружающей среде. Это&nbsp;условие выживания. Мы&nbsp;говорим о&nbsp;том, в&nbsp;каких направлениях необходимо развивать систему управления компанией, чтобы&nbsp;она&nbsp;стала способна своевременно реагировать на&nbsp;изменения в&nbsp;окружающем мире и&nbsp;быстро проводить необходимые изменения.

						</a>
					</p>
				</div>
				<div class="col-md-2 text-center">
					<h3>4&thinsp;000&nbsp;&#8381;</h3>
					<!-- LINK -->
					<a href="https://iteam.ru/learn/webinar/fast_company"><button class="btn btn-danger">Подробнее</button></a>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
<!-- END OF LISTING -->
<!-- LISTING -->
<div class="row">
	<div class="col-md-10 col-md-offset-1">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="row vertical-align">
					<div class="col-md-2">
						<!-- LINK -->
						<img src="https://iteam.ru/img/icon.png">
					</div>
					<div class="col-md-8">
						<!-- LINK -->
						<h3><a href="https://iteam.ru/learn/webinar/organization">ОРГАНИЗАЦИЯ КАК&nbsp;СИСТЕМА

						</a></h3>
						<p>
							Мастер-класс дает основные принципы построения системы управления компанией. Эта&nbsp;модель лежит в&nbsp;основе всех методов и&nbsp;управленческих технологий, применяемых экспертами iTeam при&nbsp;решении задач организационного развития. Этот&nbsp;мастер-класс полезен&nbsp;тем, кто&nbsp;обладает системным мышлением и&nbsp;хочет дойти до&nbsp;понимания сути механизмов управления организациями.

						</a>
					</p>
				</div>
				<div class="col-md-2 text-center">
					<h3>4&thinsp;000&nbsp;&#8381;</h3>
					<!-- LINK -->
					<a href="https://iteam.ru/learn/webinar/organization"><button class="btn btn-danger">Подробнее</button></a>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
<!-- END OF LISTING -->
<!-- LISTING -->
<div class="row">
	<div class="col-md-10 col-md-offset-1">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="row vertical-align">
					<div class="col-md-2">
						<!-- LINK -->
						<img src="https://iteam.ru/img/icon.png">
					</div>
					<div class="col-md-8">
						<!-- LINK -->
						<h3><a href="https://iteam.ru/learn/webinar/target">ЦЕЛЕВОЕ УПРАВЛЕНИЕ. BSC,&nbsp;KPI,&nbsp;КОНТРОЛЛИНГ</a></h3>
						<p>
							На&nbsp;мастер-классе мы&nbsp;расскажем вам, как&nbsp;преобразовать компанию, плывущую по течению, в&nbsp;целенаправленную систему, способную действовать результативно и&nbsp;эффективно, подобно ракете, запущенной в цель. Ведь&nbsp;именно система целевого управления обеспечивает концентрацию усилий всех сотрудников и&nbsp;подразделений компании на&nbsp;достижении ее&nbsp;стратегических целей.</a>
						</p>
					</div>
					<div class="col-md-2 text-center">
						<h3>4&thinsp;000&nbsp;&#8381;</h3>
						<!-- LINK -->
						<a href="https://iteam.ru/learn/webinar/target"><button class="btn btn-danger">Подробнее</button></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- END OF LISTING -->
<!-- LISTING -->
<div class="row">
	<div class="col-md-10 col-md-offset-1">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="row vertical-align">
					<div class="col-md-2">
						<!-- LINK -->
						<img src="https://iteam.ru/img/icon.png">
					</div>
					<div class="col-md-8">
						<!-- LINK -->
						<h3><a href="https://iteam.ru/learn/webinar/company_mission">КАК НАЙТИ МИССИЮ КОМПАНИИ

						</a></h3>
						<p>
							Мастер-класс дает четкое и&nbsp;конкретное определение понятия миссии и&nbsp;алгоритм работы по&nbsp;созданию миссии компании. Подробно изложена методика оценки миссии, на&nbsp;примерах продемонстрированы все&nbsp;этапы работы над&nbsp;созданием миссии.

							В комплект материалов входит методическое руководство по&nbsp;разработке миссии компании и&nbsp;примеры миссий 120 компаний, оцененных по&nbsp;методике iTeam.</a>
						</p>
					</div>
					<div class="col-md-2 text-center">
						<h3>4&thinsp;000&nbsp;&#8381;</h3>
						<!-- LINK -->
						<a href="https://iteam.ru/learn/webinar/company_mission"><button class="btn btn-danger">Подробнее</button></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- END OF LISTING -->
<!-- LISTING -->
<div class="row">
	<div class="col-md-10 col-md-offset-1">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="row vertical-align">
					<div class="col-md-2">
						<!-- LINK -->
						<img src="https://iteam.ru/img/icon.png">
					</div>
					<div class="col-md-8">
						<!-- LINK -->
						<h3><a href="https://iteam.ru/learn/webinar/marketing">ЧТО&nbsp;ДОЛЖЕН ЗНАТЬ КАЖДЫЙ РУКОВОДИТЕЛЬ О&nbsp;МАРКЕТИНГЕ. КАК&nbsp;СТАТЬ ЛОКАЛЬНЫМ МОНОПОЛИСТОМ НА&nbsp;ЦЕЛЕВОМ РЫНКЕ

						</a></h3>
						<p>
							Мы&nbsp;говорим о&nbsp;том, как&nbsp;должна быть организована функция маркетинга, чтобы компания была способна фокусироваться на&nbsp;целевом рынке и&nbsp;добиваться максимальной эффективности во&nbsp;всех компонентах бизнеса. Мастер-класс раскрывает содержание каждого из&nbsp;восьми ключевых процессов маркетинга и&nbsp;определяет подход к&nbsp;построению организационной структуры маркетинга. В&nbsp;завершении дается дорожная карта пути к&nbsp;построению эффективной функции маркетинга.

						</a>
					</p>
				</div>
				<div class="col-md-2 text-center">
					<h3>4&thinsp;000&nbsp;&#8381;</h3>
					<!-- LINK -->
					<a href="https://iteam.ru/learn/webinar/marketing"><button class="btn btn-danger">Подробнее</button></a>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
<!-- END OF LISTING -->
<!-- LISTING -->
<div class="row">
	<div class="col-md-10 col-md-offset-1">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="row vertical-align">
					<div class="col-md-2">
						<!-- LINK -->
						<img src="https://iteam.ru/img/icon.png">
					</div>
					<div class="col-md-8">
						<!-- LINK -->
						<h3><a href="https://iteam.ru/learn/webinar/change_manr">УПРАВЛЕНИЕ ИЗМЕНЕНИЯМИ: ИНЖЕНЕРНЫЙ ПОДХОД</a></h3>
						<p>
							Согласно мировой практике, более 70&thinsp;%&nbsp;проектов, связанных с&nbsp;организационными изменениями, не&nbsp;приносят ожидаемых результатов. Дело в&nbsp;том, что&nbsp;реформаторы совершают одни и&nbsp;те&nbsp;же ошибки, или попросту говоря ходят по граблям. Десять важнейших правил позволят снизить риски и&nbsp;добиться успеха в&nbsp;проведении организационных преобразований.</a>
						</p>
					</div>
					<div class="col-md-2 text-center">
						<h3>4&thinsp;000&nbsp;&#8381;</h3>
						<!-- LINK -->
						<a href="https://iteam.ru/learn/webinar/change_man"><button class="btn btn-danger">Подробнее</button></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- END OF LISTING -->
<!-- LISTING -->
<div class="row">
	<div class="col-md-10 col-md-offset-1">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="row vertical-align">
					<div class="col-md-2">
						<!-- LINK -->
						<img src="https://iteam.ru/img/icon.png">
					</div>
					<div class="col-md-8">
						<!-- LINK -->
						<h3><a href="https://iteam.ru/learn/webinar/motivation">ЧТО ДОЛЖЕН ЗНАТЬ КАЖДЫЙ РУКОВОДИТЕЛЬ О&nbsp;МОТИВАЦИИ СОТРУДНИКОВ</a></h3>
						<p>
							Представления о&nbsp;мотивации людей к&nbsp;трудовой деятельности&nbsp;– область колоссальных заблуждений огромного большинства управленцев. Мастер-класс дает верную постановку проблемы мотивации и&nbsp;подход к&nbsp;ее решению. Это&nbsp;системная проблема, и&nbsp;решать ее нужно системными методами. Эти методы излагаются ясно, конкретно с&nbsp;практических и&nbsp;рациональных позиций.</a>
						</p>
					</div>
					<div class="col-md-2 text-center">
						<h3>4&thinsp;000&nbsp;&#8381;</h3>
						<!-- LINK -->
						<a href="https://iteam.ru/learn/webinar/motivation"><button class="btn btn-danger">Подробнее</button></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- END OF LISTING -->
<!-- LISTING -->
<div class="row">
	<div class="col-md-10 col-md-offset-1">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="row vertical-align">
					<div class="col-md-2">
						<!-- LINK -->
						<img src="https://iteam.ru/img/icon.png">
					</div>
					<div class="col-md-8">
						<!-- LINK -->
						<h3><a href="https://iteam.ru/learn/webinar/thrift">КАК ПРЕДВИДЕТЬ И&nbsp;ПРЕОДОЛЕВАТЬ КРИЗИСЫ УПРАВЛЕНИЯ</a></h3>
						<p>
							Закономерности развития компаний имеют прямую аналогию с&nbsp;жизненным циклом человека: от&nbsp;младенчества до&nbsp;старости. Зная эти закономерности, вы&nbsp;можете понимать, что&nbsp;конкретно нужно делать для&nbsp;вывода компании на&nbsp;новый уровень развития, какой должна быть последовательность шагов, и&nbsp;почему нужно действовать именно так.</a>
						</p>
					</div>
					<div class="col-md-2 text-center">
						<h3>4&thinsp;000&nbsp;&#8381;</h3>
						<!-- LINK -->
						<a href="https://iteam.ru/learn/webinar/thrift"><button class="btn btn-danger">Подробнее</button></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- END OF LISTING -->
<!-- LISTING -->
<div class="row">
	<div class="col-md-10 col-md-offset-1">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="row vertical-align">
					<div class="col-md-2">
						<!-- LINK -->
						<img src="https://iteam.ru/img/icon.png">
					</div>
					<div class="col-md-8">
						<!-- LINK -->
						<h3><a href="https://iteam.ru/learn/webinar/strategicheskij-analiz-trendov">СТРАТЕГИЧЕСКИЙ АНАЛИЗ ТРЕНДОВ</a></h3>
						<p>
							Как&nbsp;повлияют на&nbsp;положение компании изменения в&nbsp;политике, экономике, технологиях, обществе? Мастер-класс посвящен тому, как&nbsp;выявлять и&nbsp;анализировать значимые для&nbsp;бизнеса изменения в&nbsp;ходе разработки стратегии компании. В&nbsp;качестве примеров мы&nbsp;рассматриваем ряд действующих сегодня трендов и&nbsp;обсуждаем их&nbsp;влияние на&nbsp;деятельность российских компаний.</a>
						</p>
					</div>
					<div class="col-md-2 text-center">
						<h3>4&thinsp;000&nbsp;&#8381;</h3>
						<!-- LINK -->
						<a href="https://iteam.ru/learn/webinar/strategicheskij-analiz-trendov"><button class="btn btn-danger">Подробнее</button></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- END OF LISTING -->
<!-- LISTING -->
<div class="row">
	<div class="col-md-10 col-md-offset-1">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="row vertical-align">
					<div class="col-md-2">
						<!-- LINK -->
						<img src="https://iteam.ru/img/icon.png">
					</div>
					<div class="col-md-8">
						<!-- LINK -->
						<h3><a href="https://iteam.ru/learn/webinar/strategicheskij-vybor">КАК&nbsp;ОСУЩЕСТВЛЯЕТСЯ СТРАТЕГИЧЕСКИЙ ВЫБОР И&nbsp;ПРИНИМАЮТСЯ СТРАТЕГИЧЕСКИЕ РЕШЕНИЯ</a></h3>
						<p>
							Дается методика работы управленческой команды по&nbsp;проведению стратегического анализа и&nbsp;выработке ключевых стратегических решений. Мастер-класс дает направление для&nbsp;движения по&nbsp;логически выверенному пути и&nbsp;стимулирует креативность при&nbsp;поиске нестандартных решений. Этот мастер-класс является частью <a href="https://iteam.ru/learn/course/razrabotka-strategii-kompanii">мастер-проекта «Разработка стратегии компании»</a></a>
						</p>
					</div>
					<div class="col-md-2 text-center">
						<h3>4&thinsp;000&nbsp;&#8381;</h3>
						<!-- LINK -->
						<a href="https://iteam.ru/learn/webinar/strategicheskij-vybor"><button class="btn btn-danger">Подробнее</button></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- END OF LISTING -->
<!-- LISTING -->
<div class="row">
	<div class="col-md-10 col-md-offset-1">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="row vertical-align">
					<div class="col-md-2">
						<!-- LINK -->
						<img src="https://iteam.ru/img/icon.png">
					</div>
					<div class="col-md-8">
						<!-- LINK -->
						<h3><a href="https://iteam.ru/learn/webinar/s-chego-nachat-vnedrenie-sistemy-upravlenija-protsessami">С&nbsp;ЧЕГО НАЧАТЬ ВНЕДРЕНИЕ СИСТЕМЫ УПРАВЛЕНИЯ ПРОЦЕССАМИ?

						</a></h3>
						<p>
							Мастер-класс освещает вопросы, возникающие в&nbsp;самом начале работы по&nbsp;внедрению процессно-ориентированного подхода к&nbsp;управлению компанией.</a>
						</p>
					</div>
					<div class="col-md-2 text-center">
						<h3>4&thinsp;000&nbsp;&#8381;</h3>
						<!-- LINK -->
						<a href="https://iteam.ru/learn/webinar/s-chego-nachat-vnedrenie-sistemy-upravlenija-protsessami"><button class="btn btn-danger">Подробнее</button></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- END OF LISTING -->
<!-- LISTING -->
<div class="row">
	<div class="col-md-10 col-md-offset-1">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="row vertical-align">
					<div class="col-md-2">
						<!-- LINK -->
						<img src="https://iteam.ru/img/icon.png">
					</div>
					<div class="col-md-8">
						<!-- LINK -->
						<h3><a href="https://iteam.ru/learn/webinar/maturity-of-processes">ЧТО&nbsp;ТАКОЕ ЗРЕЛОСТЬ ПРОЦЕССОВ И&nbsp;КАК ЕЕ ИЗМЕРЯТЬ?</a></h3>
						<p>
							Внедряя процессный подход, необходимо иметь инструмент измерения уровня развития процессов, над&nbsp;совершенствованием которых работают управленцы. Таким инструментом является методика оценки зрелости процессов.

							Мастер-класс дает тщательно отработанный метод тестирования зрелости процессов, который несложно применять в&nbsp;практической деятельности любой компании.</a>
						</p>
					</div>
					<div class="col-md-2 text-center">
						<h3>Бесплатно</h3>
						<!-- LINK -->
						<a href="https://iteam.ru/learn/webinar/maturity-of-processes"><button class="btn btn-danger">Подробнее</button></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- END OF LISTING -->
<!-- LISTING -->
<div class="row">
	<div class="col-md-10 col-md-offset-1">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="row vertical-align">
					<div class="col-md-2">
						<!-- LINK -->
						<img src="https://iteam.ru/img/icon.png">
					</div>
					<div class="col-md-8">
						<!-- LINK -->
						<h3><a href="https://iteam.ru/learn/webinar/manage-risks">ЧТО&nbsp;ЗНАЧИТ УПРАВЛЯТЬ РИСКАМИ И&nbsp;КАК ЭТО ДЕЛАЕТСЯ НА&nbsp;ПРАКТИКЕ?</a></h3>
						<p>
							Каждое наше действие сопряжено с&nbsp;потенциальным риском. Никто не&nbsp;ощущает этого острее, чем&nbsp;предприниматели, собственники компаний. Вероятно поэтому многие из&nbsp;них обращаются к&nbsp;нам с&nbsp;вопросом «как управлять рисками?». В&nbsp;полуторачасовом материале мы&nbsp;даем ответы на&nbsp;этот вопрос.</a>
						</p>
					</div>
					<div class="col-md-2 text-center">
						<h3>Бесплатно</h3>
						<!-- LINK -->
						<a href="https://iteam.ru/learn/webinar/manage-risks"><button class="btn btn-danger">Подробнее</button></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- END OF LISTING -->
<!-- LISTING -->
<div class="row">
	<div class="col-md-10 col-md-offset-1">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="row vertical-align">
					<div class="col-md-2">
						<!-- LINK -->
						<img src="https://iteam.ru/img/icon.png">
					</div>
					<div class="col-md-8">
						<!-- LINK -->
						<h3><a href="https://iteam.ru/learn/webinar/kpi_experience">ОПЫТ ПРИМЕНЕНИЯ&nbsp;KPI: ПРИЧИНЫ УСПЕХОВ И&nbsp;НЕСБЫВШИХСЯ ОЖИДАНИЙ</a></h3>
						<p>
							Мы&nbsp;провели углубленное исследование опыта применения KPI в&nbsp;компаниях России, Белоруссии и&nbsp;Украины, с&nbsp;результатами которого мы&nbsp;познакомим вас на этом мастер-классе.</a>
						</p>
					</div>
					<div class="col-md-2 text-center">
						<h3>Бесплатно</h3>
						<!-- LINK -->
						<a href="https://iteam.ru/learn/webinar/kpi_experience"><button class="btn btn-danger">Подробнее</button></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- END OF LISTING -->
<!-- LISTING -->
<div class="row">
	<div class="col-md-10 col-md-offset-1">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="row vertical-align">
					<div class="col-md-2">
						<!-- LINK -->
						<img src="https://iteam.ru/img/icon.png">
					</div>
					<div class="col-md-8">
						<!-- LINK -->
						<h3><a href="https://iteam.ru/learn/webinar/organizations-culture">ДИАГНОСТИКА И&nbsp;ИЗМЕНЕНИЕ ОРГАНИЗАЦИОННОЙ КУЛЬТУРЫ</a></h3>
						<p>
							Важно понимать, какая организационная культура свойственна вашей компании, и&nbsp;в&nbsp;каком направлении нужно ее&nbsp;изменить, чтобы привести ее&nbsp;в соответствие со&nbsp;стратегией компании и&nbsp;главными направлениями ее&nbsp;развития.</a>
						</p>
					</div>
					<div class="col-md-2 text-center">
						<h3>Бесплатно</h3>
						<!-- LINK -->
						<a href="https://iteam.ru/learn/webinar/organizations-culture"><button class="btn btn-danger">Подробнее</button></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- END OF LISTING -->
<!-- LISTING -->
<div class="row">
	<div class="col-md-10 col-md-offset-1">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="row vertical-align">
					<div class="col-md-2">
						<!-- LINK -->
						<img src="https://iteam.ru/img/icon.png">
					</div>
					<div class="col-md-8">
						<!-- LINK -->
						<h3><a href="ПРАКТИКУМ ПО ВНЕДРЕНИЮ ПРОЦЕССНОГО ПОДХОДА">ПРАКТИКУМ ПО&nbsp;ВНЕДРЕНИЮ ПРОЦЕССНОГО ПОДХОДА</a></h3>
						<p>
							Здесь наглядно, на&nbsp;примере одного из&nbsp;наших проектов, показано, как&nbsp;нужно проводить рабочую сессию управленческой команды для&nbsp;выработки единого видения бизнес-процесса, его&nbsp;реорганизации и&nbsp;регламентации. Делайте, как мы&nbsp;показываем, и&nbsp;вы&nbsp;непременно добьетесь успеха!</a>
						</p>
					</div>
					<div class="col-md-2 text-center">
						<h3>400&nbsp;&#8381;</h3>
						<!-- LINK -->
						<a href="ПРАКТИКУМ ПО ВНЕДРЕНИЮ ПРОЦЕССНОГО ПОДХОДА"><button class="btn btn-danger">Подробнее</button></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- END OF LISTING -->
<!-- LISTING -->
<div class="row">
	<div class="col-md-10 col-md-offset-1">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="row vertical-align">
					<div class="col-md-2">
						<!-- LINK -->
						<img src="https://iteam.ru/img/icon.png">
					</div>
					<div class="col-md-8">
						<!-- LINK -->
						<h3><a href="https://iteam.ru/learn/webinar/org_structure">ЧЧТО ТАКОЕ ПРАВИЛЬНАЯ ОРГАНИЗАЦИОННАЯ СТРУКТУРА И&nbsp;КАК&nbsp;ЕЕ&nbsp;ПОСТРОИТЬ

						</a></h3>
						<p>
							Правильная организационная структура – это&nbsp;продуктивные взаимоотношения между сотрудниками на&nbsp;всех уровнях организации. Но&nbsp;как определить, насколько правильна структура вашей организации? Мы&nbsp;предлагаем способ оценки организационной структуры, рассматриваем типичные ошибки, совершаемые управленцами при&nbsp;ее формировании и&nbsp;даем дорожную карту для построения полноценной структуры управления компанией.

						</a>
					</p>
				</div>
				<div class="col-md-2 text-center">
					<h3>4&thinsp;000&nbsp;&#8381;</h3>
					<!-- LINK -->
					<a href="https://iteam.ru/learn/webinar/org_structure"><button class="btn btn-danger">Подробнее</button></a>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
<!-- END OF LISTING -->
<!-- LISTING -->
<div class="row">
	<div class="col-md-10 col-md-offset-1">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="row vertical-align">
					<div class="col-md-2">
						<!-- LINK -->
						<img src="https://iteam.ru/img/icon.png">
					</div>
					<div class="col-md-8">
						<!-- LINK -->
						<h3><a href="https://iteam.ru/learn/webinar/spiralnaja-dinamika-instrument-strategii">СПИРАЛЬНАЯ ДИНАМИКА&nbsp;– ИНСТРУМЕНТ СТРАТЕГИИ

						</a></h3>
						<p>
							Спиральная динамика&nbsp;– это теория, объясняющая закономерности формирования человеческих ценностей. Она&nbsp;имеет множество практических применений, но&nbsp;наиболее ценная для&nbsp;управленцев грань этой теории&nbsp;– закономерности развития организаций. Разобравшись в&nbsp;них, можно понять, почему заканчиваются неудачами попытки организационных изменений, почему не&nbsp;приживаются те&nbsp;или&nbsp;иные нововведения, какие условия необходимы для&nbsp;безболезненного перехода на&nbsp;новый уровень развития компании.

						</a>
					</p>
				</div>
				<div class="col-md-2 text-center">
					<h3>Бесплатно</h3>
					<!-- LINK -->
					<a href="https://iteam.ru/learn/webinar/spiralnaja-dinamika-instrument-strategii"><button class="btn btn-danger">Подробнее</button></a>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
<!-- END OF LISTING -->
<!-- LISTING -->
<div class="row">
	<div class="col-md-10 col-md-offset-1">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="row vertical-align">
					<div class="col-md-2">
						<!-- LINK -->
						<img src="https://iteam.ru/img/icon.png">
					</div>
					<div class="col-md-8">
						<!-- LINK -->
						<h3><a href="https://iteam.ru/learn/webinar/pozitsionirovanie-kompanii-na-rynke">ПОЗИЦИОНИРОВАНИЕ КОМПАНИИ НА&nbsp;РЫНКЕ</a></h3>
						<p>
							Позиционирование компании на&nbsp;рынке&nbsp;– ключевой компонент стратегии. Мастер-класс дает методику разработки позиционирования и&nbsp;практические рекомендации по&nbsp;нахождению сильной дифференцирующей позиции, выделяющей компанию среди множества конкурентов. Этот мастер-класс является частью <a href="https://iteam.ru/learn/course/razrabotka-strategii-kompanii">мастер-проекта «Разработка стратегии компании»</a>.
						</p>
					</div>
					<div class="col-md-2 text-center">
						<h3>4&thinsp;000&nbsp;&#8381;</h3>
						<!-- LINK -->
						<a href="https://iteam.ru/learn/webinar/pozitsionirovanie-kompanii-na-rynke"><button class="btn btn-danger">Подробнее</button></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- END OF LISTING -->
<!-- LISTING -->
<div class="row">
	<div class="col-md-10 col-md-offset-1">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="row vertical-align">
					<div class="col-md-2">
						<!-- LINK -->
						<img src="https://iteam.ru/img/icon.png">
					</div>
					<div class="col-md-8">
						<!-- LINK -->
						<h3><a href="https://iteam.ru/learn/webinar/inzhenernyj-podhod-k-sozdaniju-sistemy-upravlenija-protsessa">ИНЖЕНЕРНЫЙ ПОДХОД К&nbsp;СОЗДАНИЮ СИСТЕМЫ УПРАВЛЕНИЯ ПРОЦЕССАМИ</a></h3>
						<p>
							Мы&nbsp;делаем разбор 10&nbsp;типичных ошибок, допускаемых управленцами при&nbsp;попытках добиться управляемости бизнес-процессов, и&nbsp;даем дорожную карту, ведущую к&nbsp;успешному овладению процессным подходом к&nbsp;управлению компанией. Этот мастер-класс служит введением к&nbsp;<a href="https://iteam.ru/learn/course/kak-postroit-sistemu-upravlenija-protsessami-za-4-mesjatsa">мастер-проекту «Создание системы управления процессами компании»</a>.
						</p>
					</div>
					<div class="col-md-2 text-center">
						<h3>4&thinsp;000&nbsp;&#8381;</h3>
						<!-- LINK -->
						<a href="https://iteam.ru/learn/webinar/inzhenernyj-podhod-k-sozdaniju-sistemy-upravlenija-protsessa"><button class="btn btn-danger">Подробнее</button></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- END OF LISTING -->

@stop

@section('footer')

	<!-- modal.learn -->
	{{-- @include('c.modals.learn') --}}
	<!-- /modal.learn -->

@stop

@section('edit-link')

	{{-- @if(Auth::user() && @Auth::user()->role_id<3)
	<div class="admin-edit"><a class="admin-edit-link" target="_blank" href="{{ route('admin.learn.show',$page->id) }}"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a></div>
@endif --}}

@stop

@section('scripts')
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.0/moment.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.0/locale/ru.js"></script>
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
				$(this).children('input').attr('checked', 'checked');
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
