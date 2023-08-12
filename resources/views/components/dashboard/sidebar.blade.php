<header class="main-nav">
    <div class="sidebar-user text-center">
        <img class="img-90 rounded-circle" src="../assets/images/dashboard/1.png" alt="">
        <a href="user-profile.html">
            <h6 class="mt-3 f-14 f-w-600">{{ Auth::user()->name }}</h6>
        </a>
    </div>
    <nav>
        <div class="main-navbar">
            <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
            <div id="mainnav">
                <ul class="nav-menu custom-scrollbar">
                    <li class="back-btn">
                        <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
                    </li>
                    <li class="sidebar-main-title">
                        <div>
                            <h6>Меню</h6>
                        </div>
                    </li>
                    <li class="dropdown"><a class="nav-link menu-title" href="javascript:void(0)"><i data-feather="home"></i><span>Dropdown</span></a>
                        <ul class="nav-submenu menu-content">
                            <li><a href="dashboard-02.html">Лист</a></li>
                            <li><a href="index.html">Создать</a></li>
                        </ul>
                    </li>
                    {{-- <li class="dropdown"><a class="nav-link menu-title link-nav" href="jsgrid-table.html"><i data-feather="file-text"></i><span>Link</span></a></li> --}}
                    
                    <li class="dropdown">
                        <a class="nav-link menu-title link-nav" href="{{route('dashboard.slider.index')}}"><i data-feather="file-text"></i>
                            <span>Слайдеры</span>
                        </a>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title link-nav" href="{{route('dashboard.about.index')}}"><i data-feather="file-text"></i>
                            <span>О нас</span>
                        </a>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title link-nav" href="{{route('dashboard.value.index')}}"><i data-feather="file-text"></i>
                            <span>Наши ценности</span>
                        </a>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title link-nav" href="{{route('dashboard.curriculum.index')}}"><i data-feather="file-text"></i>
                            <span>Учебный план</span>
                        </a>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title link-nav" href="{{route('dashboard.facilities.index')}}"><i data-feather="file-text"></i>
                            <span>Удобства</span>
                        </a>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title link-nav" href="{{route('dashboard.teams.index')}}"><i data-feather="file-text"></i>
                            <span>Команды</span>
                        </a>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title link-nav" href="{{route('dashboard.learning.index')}}"><i data-feather="file-text"></i>
                            <span>Обучение</span>
                        </a>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title link-nav" href="{{route('dashboard.admission.index')}}"><i data-feather="file-text"></i>
                            <span>Прием</span>
                        </a>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title link-nav" href="{{route('dashboard.employment.index')}}"><i data-feather="file-text"></i>
                            <span>Работа</span>
                        </a>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title link-nav" href="{{route('dashboard.studentlife.index')}}"><i data-feather="file-text"></i>
                            <span>Студенческая жизнь</span>
                        </a>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title link-nav" href="{{route('dashboard.news.index')}}"><i data-feather="file-text"></i>
                            <span>Новости</span>
                        </a>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title link-nav" href="{{route('dashboard.words.index')}}"><i data-feather="file-text"></i>
                            <span>Словарь</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
        </div>
    </nav>
</header>