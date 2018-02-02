<div class="header-body">
    <div class="header-logo-svg">
        <svg id="svg1" width="48" height="48" fill="#c00" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 140 140" xmlns="http://www.w3.org/2000/svg">
            <g id="svg1g0"><circle id="svg1c0" r="20" cy="70" cx="70"/></g>
            <g id="svg1g1"><circle id="svg1c1" r="20" cy="20" cx="70"/><path id="svg1p1" fill="none" stroke="#c00" stroke-width="16" d="M36,34 A47,47 0 0 1 104,34" /></g>
            <g id="svg1g2" transform="rotate(120,70,70)"><circle id="svg1c2" r="20" cy="20" cx="70"/><path id="svg1p2" fill="none" stroke="#c00" stroke-width="16" d="M36,34 A47,47 0 0 1 104,34" /></g>
            <g id="svg1g3" transform="rotate(-120,70,70)"><circle id="svg1c3" r="20" cy="20" cx="70"/><path id="svg1p3" fill="none" stroke="#c00" stroke-width="16" d="M36,34 A47,47 0 0 1 104,34" /></g>
        </svg>
    </div>

    <div class="header-logo">
        @if(Request::is('/'))
            <h1 class="iteam_logo_png_36">
                <a href="https://iteam.ru/"><span class="iteam_logo_text">{{ trans('front/site.title') }}</span></a>
            </h1>
        @else
            <a href="/" class="iteam_logo_png_36" title="{{ trans('front/site.title') }} {{ trans('front/site.sub-title') }}">
                <span class="iteam_logo_text">{{ trans('front/site.title') }}</span>
            </a>
        @endif
    </div>

    <div class="header-description" style="float: left;font-size: 14px;line-height: 1; padding-left: 14px;  margin-top: -10px;">
        <div class="header-description-title">МАСТЕРСКАЯ УПРАВЛЕНИЯ</div>
        <div class="header-description-desc" style="font-style: italic;font-weight: 300;margin-top: 4px;line-height: 1.2;">«Консультируем и обучаем<br>собственников и топ-менеджеров<br>управлять компанией»</div>
    </div>

    <div class="header-auth _css_float--right navbar-right">
        @if(Auth::user())
            <span class="dropdown">
                <a href="/i" class="dropdown-toggle img-circle" id="userMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    @if(Auth::user()->avatar)
                        <img style="max-width:32px;max-height:32px;border:1px solid gray;" src="/filemanager/userfiles/user{{ Auth::user()->id }}/100/{!! Auth::user()->avatar !!}" alt="iam" class="img-circle">
                    @else
                        <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                    @endif
                </a>
                <ul class="dropdown-menu" aria-labelledby="userMenu">
                    <li class="dropdown-header">{!! Auth::user()->username !!}</li>
                    <li role="separator" class="divider"></li>
                    @if(Auth::user()->role_id<3)
                        <li><a href="/~">Управление</a></li>
                        <li role="separator" class="divider"></li>
                    @endif
                    <li><a href="/i">Профиль</a></li>
                    <li><a href="/i/order">Мои заказы</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="/auth/logout">Выход</a></li>
                </ul>
            </span>
        @else
            <a href="/auth/login" id="userLink" class="auth-link img-circle">
                <span class="glyphicon glyphicon-lock" aria-hidden="true"></span>
            </a>
        @endif
    </div>

    <div class="header-search _css_float--right">
        <form id="cse-search-box" class="search-form" action="/search">
            <input type="hidden" name="siteurl" value="">
            <input type="hidden" name="ref" value="">
            <input type="hidden" name="ss">
            <input type="hidden" value="partner-pub-2457866150117626:somrxulncq7" name="cx">
            <input type="hidden" value="FORID:9" name="cof">
            <input type="hidden" value="utf-8" name="ie">
            <input type="text" size="20" autocomplete="off" id="q" name="q" spellcheck="false">
            <button type="submit" name="sa" value="🔍"><i class="material-icons">&#xE8B6;</i></button>
        </form>
    </div>

    <div class="header-in-out">
        <a href="https://iteam.ru/i/auth" class="btn">войти</a>
        <a href="https://iteam.ru/i/auth" class="btn">регистрация</a></div>
        <div class="header-contact-info">
            <div class="header-contact-info-title">
                <a href="tel:+74991102684">+7 (499) 110 26 84</a>
            </div>
        </div>
    </div>
</div>
