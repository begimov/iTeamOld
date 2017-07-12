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
        <h2><i class="zmdi zmdi-store"></i> {{ Request::input('search') ? link_to_route('admin.tests.index','Тесты') : 'Отчеты по месяцам' }}</h2>
    </div>

    <div class="card">
        <div class="listview lv-bordered lv-lg">
            <div class="lv-header-alt clearfix">
                <h2 class="lvh-label hidden-xs"><i class="zmdi zmdi-store"></i> Отчеты</h2>

                <form class="search">

                    <div class="lvh-search">
                        <input type="text" name="search" placeholder="Поиск по названию компании" class="lvhs-input" value="{{ Request::input('search') ? Request::input('search') : '' }}" >
                        <i class="lvh-search-close">&times;</i>
                    </div>

                    <ul class="lv-actions actions">
                        <li>
                            <a href="" class="lvh-search-trigger">
                                <i class="zmdi zmdi-search"></i>
                            </a>
                        </li>


                        <li class="dropdown">
                            <a href="" data-toggle="dropdown" aria-expanded="true">
                                <i class="zmdi zmdi-sort"></i>
                            </a>

                            <ul class="dropdown-menu dropdown-menu-right">

                            </ul>
                        </li>

                    </ul>
                </form>
            </div>

            {{--@foreach($tests AS $test)--}}
                {{--<div class="lv-item media">--}}
                    {{--<div class="media-body">--}}
                        {{--<div class="lv-title">--}}
                            {{--<a href="{{ route('admin.test.edit', ['id' => $test->id]) }}"><b>{{ $test->name }}</b></a>--}}
                        {{--</div>--}}
                        {{--<small class="lv-small">{!! $test->short_description  !!}</small>--}}
                    {{--</div>--}}
                    {{--<span class="pull-right">--}}
                        {{--<a href="{{ route('admin.test.edit', ['id' => $test->id]) }}" class="btn-link before-glyphicon glyphicon-edit">Править</a>--}}
                        {{--<a href="{{ route('admin.test.destroy', ['id' => $test->id]) }}" class="btn-link before-glyphicon before-glyphicon-danger glyphicon-trash delete">Удалить</a>--}}
					{{--</span>--}}
                {{--</div>--}}
            {{--@endforeach--}}

            <table class="table">
                <tr>
                    <th>Период</th>
                    <th>Объем продаж</th>
                </tr>
                @foreach($orders as $key => $ordersMonth)
                    <div class="hidden">{{ $sum = 0 }}</div>
                    @foreach($ordersMonth as $order)
                        @if($order->fact_sum != 0)
                            <div class="hidden">{{ $sum += $order->fact_sum }}</div>
                        @else
                            <div class="hidden">{{ $sum += $order->sum }}</div>
                        @endif
                    @endforeach
                @if($sum != 0)
                    <tr>
                        <td>{{ $key }}</td>
                        <td>{{ $sum }} Руб.</td>
                    </tr>
                @endif
                @endforeach
            </table>

        </div>
    </div>
@stop