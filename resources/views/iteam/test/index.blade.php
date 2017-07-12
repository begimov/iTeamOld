@extends('iteam.template_no_fb')

@section('title')
    {{--{{ @$page->meta_title ? $page->meta_title . ' ' : (@$page->title ? $page->title . ' ' : '') }}--}}
@stop

@section('main')

    <div class="row">
        <div class="box">
            <div class="col-lg-12 text-center">
               
               <div id="test-top">
                <h2>
                    СИСТЕМА ТЕСТИРОВАНИЯ
                </h2>
               </div>
               <img id="test-top-image" alt="Тесты iTeam.ru" src="/filemanager/userfiles/user0/content/testing2.jpg" />
            </div>
            <div class="col-lg-12">
                <p>
                    
                </p>
            </div>
        </div>

        @if(@$tests)
            <div class="row media_list" style="padding:50px;">

                @include('iteam.test.loop')

            </div>
            
            {{--{!! $tests->links() !!}--}}
        @endif

    </div>

@stop