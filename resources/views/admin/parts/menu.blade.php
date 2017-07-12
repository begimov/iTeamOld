<aside id="sidebar" class="sidebar c-overflow">

    <ul class="main-menu">

        <li class="sub-menu {{ url()->current()===route('admin.article.index') || str_is( route('admin.article.index') . '/*', url()->current() ) ? 'active' : '' }}">
            <a href="{{ route('admin.article.index') }}"><i class="zmdi zmdi-edit"></i> Публикации</a>

            <ul style="display: none;">
                <li><a href="{{ route('admin.article.index') }}"><i class="zmdi zmdi-collection-text"></i> Список</a></li>
                <li><a href="{{ route('admin.article.create') }}"><i class="zmdi zmdi-collection-plus"></i> Создать</a></li>
            </ul>
        </li>

        <li>
            <a href="{{ route('admin.mark.index') }}"><i class="zmdi zmdi-flash"></i> Метки</a>
        </li>

        <li class="sub-menu {{ url()->current()===route('admin.news.index') || str_is( route('admin.news.index') . '/*', url()->current() ) ? 'active' : '' }}">
            <a href="{{ route('admin.news.index') }}"><i class="zmdi zmdi-flash"></i> Новости</a>

            <ul style="display: none;">
                <li><a href="{{ route('admin.news.index') }}"><i class="zmdi zmdi-collection-text"></i> Список</a></li>
                <li><a href="{{ route('admin.news.create') }}"><i class="zmdi zmdi-collection-plus"></i> Создать</a></li>
            </ul>
        </li>

        <li class="sub-menu {{ url()->current()===route('admin.learn.index') || str_is( route('admin.learn.index') . '/*', url()->current() ) ? 'active' : '' }}">
            <a href="{{ route('admin.learn.index') }}"><i class="zmdi zmdi-videocam"></i> Мастер-класс/Мастер-проекты</a>

            <ul style="display: none;">
                <li><a href="{{ route('admin.learn.index') }}"><i class="zmdi zmdi-collection-text"></i> Список</a></li>
                <li><a href="{{ route('admin.learn.create') }}"><i class="zmdi zmdi-collection-plus"></i> Создать</a></li>
            </ul>
        </li>

        <li class="sub-menu {{ url()->current()===route('admin.company.index') || str_is( route('admin.company.index') . '/*', url()->current() ) ? 'active' : '' }}">
            <a href="{{ route('admin.company.index') }}"><i class="zmdi zmdi-store"></i> Компании</a>

            <ul style="display: none;">
                <li><a href="{{ route('admin.company.index') }}"><i class="zmdi zmdi-collection-text"></i> Список</a></li>
                <li><a href="{{ route('admin.company.create') }}"><i class="zmdi zmdi-collection-plus"></i> Создать</a></li>
            </ul>
        </li>

        <li class="sub-menu {{ url()->current()===route('admin.project.index') || str_is( route('admin.project.index') . '/*', url()->current() ) ? 'active' : '' }}">
            <a href="{{ route('admin.project.index') }}"><i class="zmdi zmdi-case-check"></i> Проекты</a>

            <ul style="display: none;">
                <li><a href="{{ route('admin.project.index') }}"><i class="zmdi zmdi-collection-text"></i> Список</a></li>
                <li><a href="{{ route('admin.project.create') }}"><i class="zmdi zmdi-collection-plus"></i> Создать</a></li>
            </ul>
        </li>

        @if(Auth::user()->role_id < 2)

            <li class="{{ url()->current()===route('admin.wish.index') || str_is( route('admin.wish.index') . '/*', url()->current() ) ? 'active' : '' }}">
                <a href="{{ route('admin.wish.index') }}"><i class="zmdi zmdi-card-giftcard"></i> Желания</a>
            </li>

            <li class="sub-menu {{ url()->current()===route('admin.order.index') || str_is( route('admin.order.index') . '/*', url()->current() ) ? 'active' : '' }}">
                <a href="{{ route('admin.order.index') }}"><i class="zmdi zmdi-shopping-cart"></i> Заказы</a>

                <ul style="display: none;">
                    <li><a href="{{ route('admin.order.index') }}"><i class="zmdi zmdi-collection-text"></i> Список</a></li>
                    <li><a href="{{ route('admin.order.create') }}"><i class="zmdi zmdi-collection-plus"></i> Создать</a></li>
                    <li><a href="{{ route('admin.order.create-test') }}"><i class="zmdi zmdi-collection-plus"></i> Создать тест</a></li>
                </ul>
            </li>

            <li class="sub-menu {{ url()->current()===route('admin.order.index') || str_is( route('admin.order.index') . '/*', url()->current() ) ? 'active' : '' }}">
                <a href="#"><i class="zmdi zmdi-shopping-cart"></i> Отчеты</a>

                <ul style="display: none;">
                    <li><a href="{{ route('admin.report.month') }}"><i class="zmdi zmdi-collection-text"></i> Отчет по месяцам</a></li>
                </ul>
            </li>

            <li class="sub-menu {{ url()->current()===route('admin.user.index') || str_is( route('admin.user.index') . '/*', url()->current() ) ? 'active' : '' }}">
                <a href="{{ route('admin.user.index') }}"><i class="zmdi zmdi-accounts-alt"></i> Пользователи</a>

                <ul style="display: none;">
                    <li><a href="{{ route('admin.user.index') }}"><i class="zmdi zmdi-collection-text"></i> Список</a></li>
                    <li><a href="{{ route('admin.user.create') }}"><i class="zmdi zmdi-collection-plus"></i> Создать</a></li>
                </ul>

            </li>
        @endif

        <li class="{{ url()->current()===route('admin.files') || str_is( route('admin.files') . '/*', url()->current() ) ? 'active' : '' }}">
            <a href="{{ route('admin.files') }}"><i class="zmdi zmdi-collection-folder-image"></i> Файлы</a>
        </li>

        <li class="sub-menu">
            <a href="{{ route('admin.test.index') }}"><i class="zmdi zmdi-accounts-alt"></i> Тесты</a>
            <ul style="display: none;">
                <li><a href="{{ route('admin.test.index') }}"><i class="zmdi zmdi-collection-text"></i> Список</a></li>
                <li><a href="{{ route('admin.test.type') }}"><i class="zmdi zmdi-collection-plus"></i> Типы тестов</a></li>
            </ul>
        </li>

        <li class="sub-menu">
            <a href="{{ route('admin.test.index') }}"><i class="zmdi zmdi-accounts-alt"></i> Отзывы</a>
            <ul style="display: none;">
                <li><a href="{{ route('admin.response.index') }}"><i class="zmdi zmdi-collection-text"></i> Список</a></li>
                <li><a href="{{ route('admin.response.create') }}"><i class="zmdi zmdi-collection-plus"></i> Добавить</a></li>
            </ul>
        </li>

        <li class="sub-menu">
            <a href="{{ route('admin.test.index') }}"><i class="zmdi zmdi-accounts-alt"></i> Конструктор категорий</a>
            <ul style="display: none;">
                <li><a href="{{ route('admin.category-learn.index') }}"><i class="zmdi zmdi-collection-text"></i> Список</a></li>
            </ul>
        </li>
    </ul>
</aside>