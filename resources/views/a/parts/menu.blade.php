            <aside id="sidebar" class="sidebar c-overflow">

                <ul class="main-menu">
                    <li class="{{  url()->current() === route('admin.home')  ? 'active' : '' }}">
                        <a href="{{ route('admin.home') }}"><i class="zmdi zmdi-home"></i> Главная</a>
                    </li>
					
					
                    <li>
                        <a href="{{ route('admin.home') }}"><i class="zmdi zmdi-quote"></i> Статьи/Рубрики</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.home') }}"><i class="zmdi zmdi-flash"></i> Новости</a>
                    </li>
					
					<li class="sub-menu">
                        <a href="{{ route('articles.index') }}"><i class="zmdi zmdi-file-text"></i> Информация</a>
                        <ul>
                            <li><a href="{{ route('articles.index') }}">Список</a></li>
                            <li><a href="{{ route('articles.create') }}">Добавить</a></li>
                        </ul>
                    </li>
					
                    <li>
                        <a href="{{ route('admin.home') }}"><i class="zmdi zmdi-balance"></i> Company.Страницы</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.home') }}"><i class="zmdi zmdi-graduation-cap"></i> Мастер-проекты/Мастер-классы</a>
                    </li>
					
                    <li>
                        <a href="{{ route('admin.home') }}"><i class="zmdi zmdi-calendar-check"></i> События</a>
                    </li>
					
                    <li>
                        <a href="{{ route('admin.home') }}"><i class="zmdi zmdi-shopping-cart"></i> Заказы</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.home') }}"><i class="zmdi zmdi-money-box"></i> Транзакции</a>
                    </li>
					
                    <li>
                        <a href="{{ route('admin.home') }}"><i class="zmdi zmdi-accounts-alt"></i> Пользователи</a>
                    </li>
					
                    <li>
                        <a href="{{ route('admin.home') }}"><i class="zmdi zmdi-email"></i> Письма</a>
                    </li>
					
                    <li>
                        <a href="{{ route('admin.home') }}"><i class="zmdi zmdi-notifications-none"></i> Задачи</a>
                    </li>
					
                    <li class="{{  str_is( url()->current() . '*', route('admin.files') ) ? 'active' : '' }}">
                        <a href="{{ route('admin.files') }}"><i class="zmdi zmdi-collection-folder-image"></i> Файлы</a>
                    </li>
					
  
                </ul>
            </aside>