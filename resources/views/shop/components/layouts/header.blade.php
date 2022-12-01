<!-- ...:::: Start Header Section:::... -->
<header class="header-section d-lg-block d-none">
    <!-- Start Header Top Area -->
    <div class="header-top">
        <div class="container">
            <div class="row d-flex justify-content-between align-items-center">
                <div class="col-3">
                    <div class="header-top--left">
                        <span>Вітаемо Вас у нашому магазині!</span>
                    </div>
                </div>
                <div class="col-9">
                    <div class="header-top--right">
                        <!-- Start Header Top Menu -->
                        <ul class="header-user-menu">
                            <li><a href="tg://resolve?domain=batura_m_v">Написать в телеграм <i class="fa fa-telegram"></i></a></li>
                            <li><a href="tel:+380973332222">(097) 333 22 22</a></li>
                            <li class="has-user-dropdown">
                                <i class="fas fa-money-bill-alt"></i>
                                <a href=""> USD - Доллар</a>
                                <!-- Header Top Menu's Dropdown -->
                                <ul class="user-sub-menu"><i class="fas fa-money-bill-alt"></i>
                                    <a href=""> UAH – Гривня</a>
                                </ul>
                            </li>
                            @auth()
                                <li><a href="{{route('personal.index')}}"><i class="fas fa-user"></i> Мій кабінет</a>
                                </li>
                                <li><a href=""
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i
                                            class="fas fa-arrow-right"></i> Вихід
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            @endauth
                            @guest()
                                <li><a href="{{route('register')}}"><i class="fas fa-user"></i> Зареєструватися</a></li>
                                <li><a href="{{route('login')}}"><i class="fas fa-arrow-right"></i> Вхід</a></li>
                            @endguest
                        </ul> <!-- End Header Top Menu -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Header Top Area -->

    <!-- Start Header Center Area -->
    <div class="header-center">
        <div class="container">
            <div class="row d-flex justify-content-between align-items-center">
                <div class="col-3">
                    <!-- Logo Header -->
                    <div class="header-logo">
                        <a href="index.html"><img src="assets/images/logo/logo.png" alt=""></a>
                    </div>
                </div>
                <div class="col-6">
                    <!-- Start Header Search -->
                    <div class="header-search">
                        <form action="{{route('shop.search.index')}}" method="post">
                            @csrf
                            <div class="header-search-box default-search-style d-flex">
                                <input class="default-search-style-input-box border-around border-right-none"
                                       name="search" type="search"
                                       placeholder="Пошук запчастини по номеру, назві, тощо..." required>
                                <button class="default-search-style-input-btn" type="submit"><i class="icon-search"></i>
                                </button>
                            </div>
                        </form>
                    </div> <!-- End Header Search -->
                </div>
                <div class="col-3 text-right">
                    <!-- Start Header Action Icon -->
                    <ul class="header-action-icon">
                        @auth()
                            <li>
                                <a href="{{route('personal.index')}}">
                                    <i class="icon-heart"></i>
                                    <span class="header-action-icon-item-count">{{auth ()->user ()->GetLikedParts->count()}}</span>
                                </a>
                            </li>
                        @endauth
                        <li>
                            <a href="#offcanvas-add-cart" class="offcanvas-toggle">
                                <i class="icon-shopping-cart"></i>
                                <span class="header-action-icon-item-count">3</span>
                            </a>
                        </li>
                    </ul> <!-- End Header Action Icon -->
                </div>
            </div>
        </div>
    </div> <!-- End Header Center Area -->

    <!-- Start Bottom Area -->
    <div class="header-bottom sticky-header">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Header Main Menu -->
                    <div class="main-menu" data-aos="fade-left" data-aos-delay="100">
                        <nav>
                            <ul>
                                <li>
                                    <a href="{{route('shop.home.index')}}">Головна</a>
                                </li>
                                <li class="has-dropdown has-megaitem">
                                    <a href="{{route('shop.category.index')}}">Магазин <i class="fa fa-angle-down"></i></a>
                                    <!-- Mega Menu -->
                                    <div class="mega-menu">
                                        <ul class="mega-menu-inner">
                                            <!-- Mega Menu Sub Link -->
                                            @foreach($category_public as $category_menu)
                                                <li class="mega-menu-item">
                                                    <a href="{{route('shop.category.show', $category_menu->id)}}"
                                                       class="mega-menu-item-title">{{$category_menu->name}}</a>
                                                    <ul class="mega-menu-sub">
                                                        @foreach($cat as $cat1)
                                                            <li>
                                                                <a href="{{route('shop.category.show', $cat1->id)}}">
                                                                    {{$cat1->parent_id == $category_menu->id ? $cat1->name : ''}}</a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </li>
                                            @endforeach
                                        </ul>
                                        <div class="menu-banner">
                                            <a href="" class="menu-banner-link">
                                                <img class="menu-banner-img" src="assets/images/banner/menu-banner.jpg"
                                                     alt="">
                                            </a>
                                        </div>
                                    </div>
                                </li>
                                <li class="has-dropdown">
                                    <a href="blog-single-sidebar-left.html">Блог <i class="fa fa-angle-down"></i></a>
                                    <!-- Sub Menu -->
                                    <ul class="sub-menu">
                                        <li><a href="blog-grid-sidebar-left.html">Blog Grid Sidebar left</a></li>
                                        <li><a href="blog-grid-sidebar-right.html">Blog Grid Sidebar Right</a></li>
                                        <li><a href="blog-full-width.html">Blog Full Width</a></li>
                                        <li><a href="blog-single-sidebar-left.html">Blog Single Sidebar left</a></li>
                                        <li><a href="blog-single-sidebar-right.html">Blog Single Sidebar Right</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="{{route('shop.about')}}">Про нас</a>
                                </li>
                                <li>
                                    <a href="{{route('shop.contacts')}}">Контакти</a>
                                </li>
                                <li>
                                    <a href="tel:+380973332222">(097) 333 22 22</a>
                                </li>
                        </nav>
                    </div> <!-- Header Main Menu Start -->
                </div>
            </div>
        </div>
    </div> <!-- End Bottom Area -->
</header>
<!-- ...:::: End Header Section:::... -->
