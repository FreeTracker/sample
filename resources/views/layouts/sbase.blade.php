@include('layouts.head', ['title' => 'Главная страница'])
<body>
<section class="navbar-wrapper">
    <div class="open-offcanvas-menu visible-md visible-sm visible-xs" data-toggle="offcanvas">
        <i class="fa fa-bars"></i>
    </div>
    <div class="navbar-logo">
        <a class="hidden-xs hidden-sm" href="/">TorrentHub</a>
        <a href='/' class='logo-image'><img src='{{ url('/main/images/modules/tracker.png') }}' alt='Tracker'></a><a href='/'>Трекер</a>
    </div>
    <div class="vertical-divider-navbar"></div>
        @if(Auth::guest())
            <div class='navbar navbar-user'>
                <ul>
                    <li class='dropdown_user'>
                        <a href='#' class='dropdown-toggle' data-toggle='dropdown'>
                            <img src='{{ url('/main/images/default.png') }}' alt='Гость' class='navbar-user-avatar'>Гость
                        </a>
                        <br>
                        <ul class='dropdown-menu dropdown-menu-right'>
                            <li><a href='{{ url('/auth/socialite/vk') }}'><i class='fa fa-vk fa-fw'></i> Вконтакте</a></li>
                            <li><a href='{{ url('/auth/socialite/ok') }}'><i class='fa fa-odnoklassniki fa-fw'></i> Одноклассники</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        @else
        <div class='navbar navbar-user'>
            <ul>
                <li class='dropdown_user'>
                    <a href='#' class='dropdown-toggle' data-toggle='dropdown'>
                        <img src='{{ Auth::user()->avatar }}' alt='{{ Auth::user()->name }}' class='navbar-user-avatar'>{{ Auth::user()->name }}
                    </a>
                    <br>
                    <ul class='dropdown-menu dropdown-menu-right'>
                        <li><a href='index.php?module=account'><i class='fa fa-user fa-fw'></i> Мой профиль</a></li>
                        <li><a href='index.php?module=account&do=controls'><i class='fa fa-cogs fa-fw'></i> Личные настройки</a></li>
                        <li><a href='index.php?module=account&do=favorite'><i class='fa fa-cogs fa-cloud'></i> Закладки</a></li>
                        <li class='divider'></li>
                        <li><a href='{{ url('/logout') }}'><i class='fa fa-sign-out fa-fw'></i> Выйти</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        @endif
    <div class="navbar-notification navbar-bell">
        <i class="fa fa-fw fa-bell navbar-notification-toggle toggle-bell"></i><span class="label label-success notifications-count">0</span>
        <ul class="dropdown-notifications dropdown-bell" style="display: none;">
            <li class="dropdown-header"><i class="fa fa-fw fa-bell"></i> Уведомления</li>

        </ul>
    </div>

    <div class="navbar-notification navbar-search">
        <i class="fa fa-fw fa-search navbar-notification-toggle toggle-search"></i>
        <ul class="dropdown-notifications dropdown-search" id="resSearch" style="display: none;">
            <li class="dropdown-header"><i class="fa fa-fw fa-search"></i> Поиск </li>
            <li class="dropdown-header">
                <form action="{{ url('/tracker/searchpublic') }}" method="post" name="form" onsubmit="return false;">
                    <div class="input-group" style="padding: 7px;">
                        <input class="form-control" name="search" type="text" id="search"  placeholder="Публикации">
                        <span class="input-group-addon" id="basic-addon2">ок</span>
                    </div>
                </form>
            </li>
            <span id="item-search"></span>
        </ul>
    </div>

    <nav class="navbar apps-menu">
        <ul>
            <li class="services-menu-toggle">
                <i class="fa fa-fw fa-th"></i>
            </li>
        </ul>
    </nav>

    <div class="container-fluid services-menu" style="display: none;">
        <div class="col-xs-12 col-md-8 col-lg-6 col-xs-offset-0 col-md-offset-2 col-lg-offset-3 services-menu-content">
            <a class='services-menu-content-item dev col-xs-3' href=''><img src='/main/images/modules/tracker.png' alt='Треккер'><br>Треккер</a>
    <a class='services-menu-content-item col-xs-3' href=''><img src='/main/images/modules/forum.png' alt='{$lang['forum']}'><br>{$lang['forum']}</a>
    <a class='services-menu-content-item col-xs-3' href=''><img src='/main/images/modules/contact.png' alt='{$lang['contact']}'><br>{$lang['contact']}</a>
    <a class='services-menu-content-item col-xs-3' href=''><img src='/main/images/modules/account.png' alt='{$lang['account']}'><br>{$lang['account']}</a>
    <a class='services-menu-content-item col-xs-3' href=''><img src='/main/images/modules/recommend.png' alt='{$lang['recommend']}'><br>{$lang['recommend']}</a>
            <div class="clearfix"></div>
        </div>
    </div>
</section>
<div class="services-menu-background"></div>
<section class="offcanvas-wrapper">
    <div class="container-fluid">
        <div class="row row-offcanvas row-offcanvas-left">
            <!--BEGIN leftblock--><aside class="col-xs-6 col-sm-6 col-md-4 col-lg-3 sidebar-offcanvas"> @yield('left')
            </aside>   <!--END leftblock-->
            <article class="content col-xs-12 col-sm-12 col-md-12 <?php // echo "".(isset($_GET['module']) AND $_GET['module']=='forum')?"col-lg-12":"col-lg-9"; ?>">
                <div class="content-wrapper">@yield('content')
                    <div class="col-xs-12 col-md-5"><!--BEGIN rightblock--> @yield('right') <!--END rightblock--></div>
                    @yield('pagination')
                </div>
            </article>
        </div>
        <div class="clearfix"></div>
        <div class="container-fluid footer">
            <div class="row">
                <div class="col-md-12">
                    Все права защищены. © TorrentHub.ru 2014-2016
                    <nav class="footer-nav text-right pull-right">
                        <a href="/about"><i class="fa fa-info-circle"></i> О проекте</a>
                        <a href="/contact"><i class="fa fa-envelope-o"></i> Контакты</a>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="/main/js/jasny-bootstrap.min.js"></script>
<script src="/main/js/template.js"></script>
<script src="/main/js/hoverForMore.js"></script>
</body>
</html>