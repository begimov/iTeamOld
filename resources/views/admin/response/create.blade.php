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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.5.5/tinymce.min.js"></script>

@stop

@section('main')

    <div class="block-header">
        @if(isset($response))
            <h2><i class="zmdi zmdi-comment-alert"></i> Редактирование отзыва</h2>
        @else
            <h2><i class="zmdi zmdi-comment-alert"></i> Создание отзыва</h2>
        @endif

    </div>

    <div class="card">
        <div class="listview lv-bordered lv-lg" style="padding: 30px">
            @if(isset($response))
                <form action="{{ route('admin.response.update', ['id' => $response->id]) }}" method="POST" class="center-block" enctype="multipart/form-data" style="width: 800px; border: 1px solid #999; padding: 10px; border-radius: 5px">
                    @else
                        <form action="{{ route('admin.response.store') }}" method="POST" class="center-block" enctype="multipart/form-data" style="width: 800px; border: 1px solid #999; padding: 10px; border-radius: 5px">
                            @endif
                            {{ csrf_field() }}
                            <input type="text" name="author_id" value="0" hidden>
                            <div class="fg-line form-group">
                                <span>Аватар автора</span>
                                @if(isset($response->author_avatar))
                                    <img src="{{ $response->author_avatar }}" alt="" style="width: 100px; display: block">
                                @endif
                                <input class="form-control" type="file" name="author_avatar" accept="image/*,image/jpeg">
                            </div>
                            <div class="fg-line form-group">
                                <span>Имя автора</span>
                                <input class="form-control" type="text" name="author_name" value="{{ isset($response->author_name) ? $response->author_name : '' }}">
                            </div>
                            <div class="fg-line form-group">
                                <span>Информация об авторе</span>
                                <input class="form-control" type="text" name="author_info" value="{{ isset($response->author_info) ? $response->author_info : '' }}">
                            </div>
                            <div class="fg-line form-group">
                                <span>Информация о компании</span>
                                <input class="form-control" type="text" name="company_info" value="{{ isset($response->company_info) ? $response->company_info : '' }}">
                            </div>
                            <div class="fg-line form-group">
                                <span>Отзыв</span>
                                <textarea class="form-control" name="text" id="" cols="30" rows="10">{{ isset($response->text) ? $response->text : '' }}</textarea>
                            </div>
                            <div class="fg-line form-group">
                                <span>Список курсов</span>
                                <select name="learn_id" style="width: 100%">
                                    <option value="{{ isset($response->learn_id ) ? $response->learn_id : '' }}" selected="selected">{{ isset($response->learn2->title) ? $response->learn2->title : '' }}</option>
                                    @foreach($learns as $learn)
                                        <option value="{{ $learn->id }}">{{ $learn->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="fg-line form-group">
                                <span>Опубликовать:</span>
                                <input type="checkbox" name="public" {{ isset($response->public) ? 'checked' : 'unchecked' }}>
                            </div>
                            <input type="submit">
                        </form>
        </div>
    </div>

@stop

{{--@section('scripts')--}}

{{--<script src="/a/vendors/bower_components/chosen/chosen.jquery.min.js"></script>--}}

{{--<script>--}}

{{--$('form.search input[type="text"]').keyup(function(event){--}}
{{--if (event.which == 13 || event.keyCode == 13){--}}
{{--var form_search = $('form.search');--}}
{{--form_search.submit();--}}
{{--}--}}
{{--});--}}

{{--$('input[name="public[]"]').change(function(){--}}
{{--var _this = $(this), _a = _this.parent('label').parent('a');--}}
{{--if(_this.is(':checked')) _a.addClass('bg-info');--}}
{{--else _a.removeClass('bg-info');--}}
{{--});--}}

{{--$('input[name="year"]').change(function(){--}}
{{--$('form.search').submit();--}}
{{--});--}}

{{--$('input[name="order_by"]').change(function(){--}}
{{--$('input[name="sort_by"]').prop('checked',false);--}}
{{--$(this).parent('label').next('input[name="sort_by"]').prop('checked',true);--}}
{{--$('form.search').submit();--}}
{{--});--}}

{{--</script>--}}

{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>--}}
{{--<script>--}}
{{--$( "#accordion" ).accordion({--}}
{{--animate: 200--}}
{{--});--}}
{{--</script>--}}
{{--<script>--}}
{{--tinymce.init({--}}
{{--selector: 'textarea',--}}
{{--height: 200,--}}
{{--menubar: false,--}}
{{--plugins: [--}}
{{--'advlist autolink lists link image charmap print preview anchor',--}}
{{--'searchreplace visualblocks code fullscreen',--}}
{{--'insertdatetime media table contextmenu paste code'--}}
{{--],--}}
{{--toolbar: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',--}}
{{--content_css: '//www.tinymce.com/css/codepen.min.css'--}}
{{--});--}}
{{--</script>--}}

{{--@stop--}}

@section('scripts')

    {!! HTML::script('ckeditor/ckeditor.js?f5=' . time() ) !!}

    <script src="/a/vendors/bower_components/typeahead.js/dist/typeahead.bundle.min.js"></script>
    <script src="/a/vendors/bower_components/chosen/chosen.jquery.min.js"></script>

    <script src="/js/main.js"></script>

    <script src="/a/vendors/fileinput/fileinput.min.js"></script>

    <script>

        CKEDITOR.timestamp={{ time() }};

        var configText = {
            skin: 'flat',
            codeSnippet_theme: 'Monokai',
            defaultLanguage: 'ru',
            language: '{{ config('app.locale') }}',

            //extraPlugins: 'uploadimage',
            extraPlugins: 'btgrid,youtube,impaste,image2',
            image_prefillDimensions: false,
            image2_prefillDimensions: false,
            image2_alignClasses: [ 'image-left', 'image-center', 'image-right' ],
            //image2_disableResizer: true,
            contentsCss: ['/css/bootstrap.min.css','/css/style.css'],

            height: 400,
            {{--filebrowserBrowseUrl: '{!! url($url) !!}',--}}
                    {{--filebrowserImageUploadUrl: '{!! url($url) !!}',--}}

            allowedContent: true,

            toolbarGroups: [
                { name: 'clipboard',   groups: [ 'clipboard', 'undo' ] },
                { name: 'editing',     groups: [ 'find', 'selection', 'spellchecker' ] },
                { name: 'links' },
                { name: 'insert' },
                { name: 'forms' },
                { name: 'tools' },
                { name: 'document',	   groups: [ 'mode', 'document', 'doctools' ] },
                { name: 'others' },
                '/',
                { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
                { name: 'paragraph',   groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ] },
                { name: 'styles' },
                { name: 'colors' }
            ],

            addButtons: 'Underline,Subscript,Superscript',
            removeButtons: 'CodeSnippet'

        };

        CKEDITOR.replace('text', configText);

        var configSummary = {
            skin: 'flat',
            codeSnippet_theme: 'Monokai',
            defaultLanguage: 'ru',
            language: '{{ config('app.locale') }}',

            height: 100,
            {{--filebrowserBrowseUrl: '{!! url($url) !!}',--}}

            toolbarGroups: [
                { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
                { name: 'paragraph',   groups: [ 'list', 'blocks', 'align', 'bidi' ] },
                { name: 'links' },
                { name: 'insert' },
                { name: 'document',	   groups: [ 'mode', 'document', 'doctools' ] },
            ],

            removeButtons: 'Underline,Strike_,Subscript,Superscript,Anchor,Table,SpecialChar,HorizontalRule,CodeSnippet'
        };
        CKEDITOR.replace('intro', configSummary);
        CKEDITOR.replace('outro', configSummary);

        CKEDITOR.instances['intro'].on('change', function() {
            var intro_text = $(CKEDITOR.instances['intro'].getData()).text(), meta_description = $("#meta_description");
            if(!meta_description.val() || meta_description.data('new')) {
                meta_description.val( intro_text );
                meta_description.data('new',true);
            }
        });
        CKEDITOR.instances['text'].on('change', function() {
            var text_text = $(CKEDITOR.instances['text'].getData()).text(), meta_keywords = $("#meta_keywords");
            if(!meta_keywords.val() || meta_keywords.data('new')) {
                meta_keywords.val( SemCore(text_text, 2, 1).join(', ') );
                meta_keywords.data('new',true);
            }
        });


        $("#title").on('keyup change blur',function(){
            var title = $(this), wid = $("#wid"), meta_title = $("#meta_title");
            if(!wid.val() || wid.data('new')) {
                var str = Translit(title.val());
                wid.val(str);
                wid.data('new',true);
            }
            if(!meta_title.val() || meta_title.data('new')) {
                meta_title.val(title.val());
                meta_title.data('new',true);
            }
        });

        $("#intro1").on('change',function(){
            alert($(this).val());
            var intro = $(this), meta_description = $("#meta_description");
            if(!meta_description.val() || meta_description.data('new')) {
                meta_description.val(intro.val());
                meta_description.data('new',true);
            }
        });

    </script>

@stop