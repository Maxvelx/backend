<!-- ...:::: Start Header Section:::... -->
<header class="header-section d-lg-block d-none">
    <!-- Start Header Top Area -->
    <div class="header-top">
        <div class="container">
            <div class="row d-flex justify-content-between align-items-center">
                <div class="col-6">
                    <div class="header-top--left">
                        <span>Вітаемо Вас у нашому магазині!</span>
                    </div>
                </div>
                <div class="col-6">
                    <div class="header-top--right">
                        <!-- Start Header Top Menu -->
                        <ul class="header-user-menu">
                            <li class="has-user-dropdown">
                                <i class="fas fa-money-bill-alt"></i>
                                <a href=""> USD - Доллар</a>
                                <!-- Header Top Menu's Dropdown -->
                                <ul class="user-sub-menu"><i class="fas fa-money-bill-alt"></i>
                                    <a href=""> UAH – Гривня</a>
                                </ul>
                            </li>
                            @auth()
                                <li><a href="{{route('personal.index')}}"><i class="fas fa-user"></i> Мій кабінет</a></li>
                                <li><a href="{{route('logout')}}"><i class="fas fa-arrow-right"></i> Вихід</a></li>
                            @endauth
                            @guest()
                                <li><a href="{{route('register')}}"><i class="fas fa-user"></i>  Зареєструватися</a></li>
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
                                <input class="default-search-style-input-box border-around border-right-none" name="search" type="search" placeholder="Пошук запчастини по номеру, назві, тощо..." required>
                                <button class="default-search-style-input-btn" type="submit"><i class="icon-search"></i></button>
                            </div>
                        </form>
                    </div> <!-- End Header Search -->
                </div>
                <div class="col-3 text-right">
                    <!-- Start Header Action Icon -->
                    <ul class="header-action-icon">
                        <li>
                            <a href="#offcanvas-wishlish" class="offcanvas-toggle">
                                <i class="icon-heart"></i>
                                <span class="header-action-icon-item-count">3</span>
                            </a>
                        </li>
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
                    <div class="main-menu">
                        <nav>
                            <ul>
                                <li>
                                    <a href="{{route('shop.home.index')}}">Головна</a>
                                </li>
                                <li class="has-dropdown has-megaitem">
                                    <a href="product-details-default.html">Shop <i class="fa fa-angle-down"></i></a>
                                    <!-- Mega Menu -->
                                    <div class="mega-menu">
                                        <ul class="mega-menu-inner">
                                            <!-- Mega Menu Sub Link -->
                                            <li class="mega-menu-item">
                                                <a href="#" class="mega-menu-item-title">Shop Layouts</a>
                                                <ul class="mega-menu-sub">
                                                    <li><a href="shop-grid-sidebar-left.html">Grid Left Sidebar</a></li>
                                                    <li><a href="shop-grid-sidebar-right.html">Grid Right Sidebar</a></li>
                                                    <li><a href="shop-full-width.html">Full Width</a></li>
                                                    <li><a href="shop-list-sidebar-left.html">List Left Sidebar</a></li>
                                                    <li><a href="shop-list-sidebar-right.html">List Right Sidebar</a></li>
                                                </ul>
                                            </li>
                                            <!-- Mega Menu Sub Link -->
                                            <li class="mega-menu-item">
                                                <a href="#" class="mega-menu-item-title">Other Pages</a>
                                                <ul class="mega-menu-sub">
                                                    <li><a href="cart.html">Cart</a></li>
                                                    <li><a href="wishlist.html">Wishlist</a></li>
                                                    <li><a href="compare.html">Compare</a></li>
                                                    <li><a href="checkout.html">Checkout</a></li>
                                                    <li><a href="login.html">Login</a></li>
                                                    <li><a href="my-account.html">My Account</a></li>
                                                </ul>
                                            </li>
                                            <!-- Mega Menu Sub Link -->
                                            <li class="mega-menu-item">
                                                <a href="#" class="mega-menu-item-title">Product Types</a>
                                                <ul class="mega-menu-sub">
                                                    <li><a href="product-details-default.html">Product Default</a></li>
                                                    <li><a href="product-details-variable.html">Product Variable</a></li>
                                                    <li><a href="product-details-affiliate.html">Product Referral</a></li>
                                                    <li><a href="product-details-group.html">Product Group</a></li>
                                                    <li><a href="product-details-single-slide.html">Product Slider</a></li>
                                                </ul>
                                            </li>
                                            <!-- Mega Menu Sub Link -->
                                            <li class="mega-menu-item">
                                                <a href="#" class="mega-menu-item-title">Product Types</a>
                                                <ul class="mega-menu-sub">
                                                    <li><a href="product-details-tab-left.html">Product Tab Left</a></li>
                                                    <li><a href="product-details-tab-right.html">Product Tab Right</a></li>
                                                    <li><a href="product-details-gallery-left.html">Product Gallery Left</a></li>
                                                    <li><a href="product-details-gallery-right.html">Product Gallery Right</a></li>
                                                    <li><a href="product-details-sticky-left.html">Product Sticky Left</a></li>
                                                    <li><a href="product-details-sticky-right.html">Product Sticky right</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                        <div class="menu-banner">
                                            <a href="" class="menu-banner-link">
                                                <img class="menu-banner-img" src="assets/images/banner/menu-banner.jpg" alt="">
                                            </a>
                                        </div>
                                    </div>
                                </li>
                                <li class="has-dropdown">
                                    <a href="blog-single-sidebar-left.html">Blog <i class="fa fa-angle-down"></i></a>
                                    <!-- Sub Menu -->
                                    <ul class="sub-menu">
                                        <li><a href="blog-grid-sidebar-left.html">Blog Grid Sidebar left</a></li>
                                        <li><a href="blog-grid-sidebar-right.html">Blog Grid Sidebar Right</a></li>
                                        <li><a href="blog-full-width.html">Blog Full Width</a></li>
                                        <li><a href="blog-single-sidebar-left.html">Blog Single Sidebar left</a></li>
                                        <li><a href="blog-single-sidebar-right.html">Blog Single Sidebar Right</a></li>
                                    </ul>
                                </li>
                                <li class="has-dropdown">
                                    <a href="#">Pages <i class="fa fa-angle-down"></i></a>
                                    <!-- Sub Menu -->
                                    <ul class="sub-menu">
                                        <li><a href="service.html">Service</a></li>
                                        <li><a href="faq.html">Frequently Questions</a></li>
                                        <li><a href="privacy-policy.html">Privacy Policy</a></li>
                                        <li><a href="404.html">404 Page</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="{{route('shop.about')}}">Про нас</a>
                                </li>
                                <li>
                                    <a href="{{route('shop.contacts')}}">Контакти</a>
                                </li>
                            </ul>
                        </nav>
                    </div> <!-- Header Main Menu Start -->
                </div>
            </div>
        </div>
    </div> <!-- End Bottom Area -->
</header>
<!-- ...:::: End Header Section:::... -->
