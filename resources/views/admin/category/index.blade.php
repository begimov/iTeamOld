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

    <div class="card">
        <div class="listview lv-bordered lv-lg">
            <div class="lv-header-alt clearfix">
                <h2 class="lvh-label hidden-xs">Категории</h2>
            </div>
            <div>
                <ol>
                    @foreach($categories as $category)
                        <li>{{ $category->name }} <a href="{{ route('admin.category-learn.destroy', ['id' => $category->id]) }}" class="btn-link before-glyphicon before-glyphicon-danger glyphicon-trash delete"></a></li>
                    @endforeach
                </ol>
            </div>
            <form action="{{ route('admin.category-learn.store') }}" method="POST">
                {{ csrf_field() }}
                <div class="col-md-6">
                    <input type="text" name="name" placeholder="Название категории" style="width: 100%">
                </div>
                <input type="submit" value="Добавить">
            </form>
        </div>
    </div>
@stop

@section('scripts')
    <script src="/a/vendors/bower_components/chosen/chosen.jquery.min.js"></script>
    <script>
        $('form.search input[type="text"]').keyup(function(event){
            if (event.which == 13 || event.keyCode == 13){
                var form_search = $('form.search');
                form_search.submit();
            }
        });
        $('form.search select, form.search input[type="radio"]').change(function(event){
            var form_search = $('form.search');
            form_search.submit();
        });
        $('input[name="order_by"]').change(function(){
            $('input[name="sort_by"]').prop('checked',false);
            $(this).parent('label').next('input[name="sort_by"]').prop('checked',true);
            $('form.search').submit();
        });
    </script>
@stop