@extends('admin.template')

@section('main')

    <div class="block-header">
        <h2><i class="zmdi zmdi-shopping-cart"></i>Заказ №{{ $testsAnswer[0]->order->id }} <b>{!! $testsAnswer[0]->order->test_name->name !!}</b></h2>
    </div>

    <div class="card">
        <div class="listview lv-bordered lv-lg">
            <div class="lv-header-alt clearfix">
                <h2 class="lvh-label hidden-xs" title="">
                    <i class="zmdi zmdi-shopping-cart"></i> Результаты участников теста
                </h2>

                <form class="search">
                    <div class="lvh-search">
                        <input type="text" name="search" placeholder="Поиск по email или Названию компании..." class="lvhs-input" value="{{ Request::input('search') ? Request::input('search') : '' }}" >
                        <i class="lvh-search-close">&times;</i>
                    </div>
                    <ul class="lv-actions actions">
                        <li style="float: left; padding-left: 20px">
                            Всего участников: <b>{{ count($testsAnswer) }}</b>
                        </li>
                        <li style="float: left; padding-left: 20px">
                            Средний рейтинг: <b>{{ $avgRating }}%</b>
                        </li>
                    </ul>
                </form>
            </div>

            @if($testsAnswer && $testsAnswer->count())
                @foreach($testsAnswer AS $testAnswer)
                    <div class="lv-item media">
                        <div class="media-body">
                            <small class="lv-small">
                                Имя: {!! $testAnswer->user->username !!}</li><br>
                                Почта: <a href="mailto:{{$testAnswer->user->email}}">{!! $testAnswer->user->email !!}</a>
                            </small>
                            <span class="pull-right">
                                Рейтинг за тест: <b>{{ $testAnswer->rating }}</b>
                            </span>
                        </div>
                    </div>
                @endforeach

                @else
                    <div class="lv-item media">Ничего не найдено</div>
                @endif
        </div>
    </div>

@stop

@section('scripts')

    <script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />

@stop