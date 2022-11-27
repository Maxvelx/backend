<!-- ...:::: Start Mobile Header Section:::... -->
<div class="mobile-header-section d-block d-lg-none">
    <!-- Start Mobile Header Wrapper -->
    <div class="mobile-header-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-12 d-flex justify-content-between align-items-center">
                    <div class="mobile-header--left">
                        <a href="" class="mobile-logo-link">
                            <img src="assets/images/logo/logo.png" alt="" class="mobile-logo-img">
                        </a>
                    </div>
                    <div class="mobile-header--right">
                        <a href="#mobile-menu-offcanvas" class="mobile-menu offcanvas-toggle">
                            <span class="mobile-menu-dash"></span>
                            <span class="mobile-menu-dash"></span>
                            <span class="mobile-menu-dash"></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End Mobile Header Wrapper -->
</div><!-- ...:::: Start Mobile Header Section:::... -->

<!-- ...:::: Start Offcanvas Mobile Menu Section:::... -->
<div id="mobile-menu-offcanvas" class="offcanvas offcanvas-leftside offcanvas-mobile-menu-section">
    <!-- Start Offcanvas Header -->
    <div class="offcanvas-header text-right">
        <button class="offcanvas-close"><i class="fa fa-times"></i></button>
    </div> <!-- End Offcanvas Header -->
    <!-- Start Offcanvas Mobile Menu Wrapper -->
    <div class="offcanvas-mobile-menu-wrapper">
        <!-- Start Mobile Menu User Top -->
        <div class="mobile-menu-top">
            <span>Вітаемо Вас у нашому магазині!</span>
            <!-- Start Header Top Menu -->
            <ul class="mobile-menu-user-menu">
                <li class=" has-mobile-user-dropdown">
                    <i class="fas fa-money-bill-alt"></i>
                    <a class="mobile-user-menu-link" href=""> USD - Доллар</a>
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
        </div> <!-- End Mobile Menu User Top -->
        <!-- Start Mobile Menu User Center -->
        <div class="mobile-menu-center">
            <form action="{{route('shop.search.index')}}" method="post">
                @csrf
                <div class="header-search-box default-search-style d-flex">
                    <input class="default-search-style-input-box border-around border-right-none" name="search"
                           type="search" placeholder="Пошук запчастини по номеру, назві ..." required>
                    <button class="default-search-style-input-btn" type="submit"><i class="icon-search"></i>
                    </button>
                </div>
            </form>
            <div class="mobile-menu-customer-support">
                <div class="mobile-menu-customer-support-icon">
                    <img src="assets/images/icon/support-icon.png" alt="">
                </div>
                <div class="mobile-menu-customer-support-text">
                    <span>Звязок з нами</span>
                    <a class="mobile-menu-customer-support-text-phone" href="tel:(08)123456789">(099) 999 46 79</a>
                </div>
            </div>
            <!-- Start Header Action Icon -->
            <ul class="mobile-action-icon">
                <li class="mobile-action-icon-item">
                    <a href="wishlist.html" class="mobile-action-icon-link">
                        <i class="icon-heart"></i>
                        <span class="mobile-action-icon-item-count">3</span>
                    </a>
                </li>
                <li class="mobile-action-icon-item">
                    <a href="cart.html" class="mobile-action-icon-link">
                        <i class="icon-shopping-cart"></i>
                        <span class="mobile-action-icon-item-count">3</span>
                    </a>
                </li>
            </ul> <!-- End Header Action Icon -->
        </div> <!-- End Mobile Menu User Center -->
        <!-- Start Mobile Menu Bottom -->
        <div class="mobile-menu-bottom">
            <!-- Start Mobile Menu Nav -->
            <div class="offcanvas-menu">
                <ul>
                    <li>
                        <a href="#"><span>Home</span></a>
                    </li>
                    <li>
                        <a href="#"><span>Shop</span></a>
                        <ul class="mobile-sub-menu">
                            <li>
                                <a href="#">Shop Layout</a>
                                <ul class="mobile-sub-menu">
                                    <li><a href="shop-grid-sidebar-left.html">Grid Left Sidebar</a></li>
                                    <li><a href="shop-grid-sidebar-right.html">Grid Right Sidebar</a></li>
                                    <li><a href="shop-full-width.html">Full Width</a></li>
                                    <li><a href="shop-list-sidebar-left.html">List Left Sidebar</a></li>
                                    <li><a href="shop-list-sidebar-right.html">List Right Sidebar</a></li>
                                </ul>
                            </li>
                        </ul>
                        <ul class="mobile-sub-menu">
                            <li>
                                <a href="#">Shop Pages</a>
                                <ul class="mobile-sub-menu">
                                    <li><a href="cart.html">Cart</a></li>
                                    <li><a href="wishlist.html">Wishlist</a></li>
                                    <li><a href="compare.html">Compare</a></li>
                                    <li><a href="checkout.html">Checkout</a></li>
                                    <li><a href="login.html">Login</a></li>
                                    <li><a href="my-account.html">My Account</a></li>
                                    <li><a href="404.html">Error 404</a></li>
                                </ul>
                            </li>
                        </ul>
                        <ul class="mobile-sub-menu">
                            <li>
                                <a href="#">Product Single</a>
                                <ul class="mobile-sub-menu">
                                    <li><a href="product-details-default.html">Product Default</a></li>
                                    <li><a href="product-details-variable.html">Product Variable</a></li>
                                    <li><a href="product-details-affiliate.html">Product Referral</a></li>
                                    <li><a href="product-details-group.html">Product Group</a></li>
                                    <li><a href="product-details-single-slide.html">Product Slider</a></li>
                                    <li><a href="product-details-tab-left.html">Product Tab Left</a></li>
                                    <li><a href="product-details-tab-right.html">Product Tab Right</a></li>
                                    <li><a href="product-details-gallery-left.html">Product Gallery Left</a></li>
                                    <li><a href="product-details-gallery-right.html">Product Gallery Right</a></li>
                                    <li><a href="product-details-sticky-left.html">Product Sticky Left</a></li>
                                    <li><a href="product-details-sticky-right.html">Product Sticky right</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><span>Blogs</span></a>
                        <ul class="mobile-sub-menu">
                            <li>
                                <a href="#">Blog Grid</a>
                                <ul class="mobile-sub-menu">
                                    <li><a href="blog-grid-sidebar-left.html">Blog Grid Sidebar left</a></li>
                                    <li><a href="blog-grid-sidebar-right.html">Blog Grid Sidebar Right</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="blog-full-width.html">Blog Full Width</a>
                            </li>
                            <li>
                                <a href="#">Blog Single</a>
                                <ul class="mobile-sub-menu">
                                    <li><a href="blog-single-sidebar-left.html">Blog Single Sidebar left</a></li>
                                    <li><a href="blog-single-sidebar-right.html">Blog Single Sidebar Right</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><span>Pages</span></a>
                        <ul class="mobile-sub-menu">
                            <li><a href="about-us.html">About Us</a></li>
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
            </div> <!-- End Mobile Menu Nav -->

            <!-- Mobile Manu Mail Address -->
            <a class="mobile-menu-email icon-text-right" href="mailto:info@yourdomain.com"><i
                    class="fa fa-envelope-o"> info@yourdomain.com</i></a>

            <!-- Mobile Manu Social Link -->
            <ul class="mobile-menu-social">
                <li><a href="" class="facebook"><i class="fa fa-facebook"></i></a></li>
                <li><a href="" class="twitter"><i class="fa fa-twitter"></i></a></li>
                <li><a href="" class="youtube"><i class="fa fa-youtube"></i></a></li>
                <li><a href="" class="pinterest"><i class="fa fa-pinterest"></i></a></li>
                <li><a href="" class="instagram"><i class="fa fa-instagram"></i></a></li>
            </ul>
        </div>
        <!-- End Mobile Menu Bottom -->
    </div> <!-- End Offcanvas Mobile Menu Wrapper -->
</div><!-- ...:::: End Offcanvas Mobile Menu Section:::... -->

<!-- ...:::: Start Offcanvas Addcart Section корзина + избранное:::... -->
<div id="offcanvas-add-cart" class="offcanvas offcanvas-rightside offcanvas-add-cart-section">
    <!-- Start Offcanvas Header -->
    <div class="offcanvas-header text-right">
        <button class="offcanvas-close"><i class="fa fa-times"></i></button>
    </div>
    <!-- End Offcanvas Header -->

    <!-- Start  Offcanvas Addcart Wrapper -->
    <div class="offcanvas-add-cart-wrapper">
        <h4 class="offcanvas-title">Shopping Cart</h4>
        <ul class="offcanvas-cart">
            <li class="offcanvas-cart-item-single">
                <div class="offcanvas-cart-item-block">
                    <a href="" class="offcanvas-cart-item-image-link">
                        <img src="assets/images/products_images/aments_products_image_6.jpg" alt=""
                             class="offcanvas-cart-image">
                    </a>
                    <div class="offcanvas-cart-item-content">
                        <a href="" class="offcanvas-cart-item-link">Car Wheel</a>
                        <div class="offcanvas-cart-item-details">
                            <span class="offcanvas-cart-item-details-quantity">1 x </span>
                            <span class="offcanvas-cart-item-details-price">$49.00</span>
                        </div>
                    </div>
                </div>
                <div class="offcanvas-cart-item-delete text-right">
                    <a href="#" class="offcanvas-cart-item-delete"><i class="fa fa-trash-o"></i></a>
                </div>
            </li>
            <li class="offcanvas-cart-item-single">
                <div class="offcanvas-cart-item-block">
                    <a href="" class="offcanvas-cart-item-image-link">
                        <img src="assets/images/categories_images/aments_categories_08.jpg" alt=""
                             class="offcanvas-cart-image">
                    </a>
                    <div class="offcanvas-cart-item-content">
                        <a href="" class="offcanvas-cart-item-link">Car Vails</a>
                        <div class="offcanvas-cart-item-details">
                            <span class="offcanvas-cart-item-details-quantity">3 x </span>
                            <span class="offcanvas-cart-item-details-price">$500.00</span>
                        </div>
                    </div>
                </div>
                <div class="offcanvas-cart-item-delete text-right">
                    <a href="#" class="offcanvas-cart-item-delete"><i class="fa fa-trash-o"></i></a>
                </div>
            </li>
            <li class="offcanvas-cart-item-single">
                <div class="offcanvas-cart-item-block">
                    <a href="" class="offcanvas-cart-item-image-link">
                        <img src="assets/images/products_images/aments_products_image_2.jpg" alt=""
                             class="offcanvas-cart-image">
                    </a>
                    <div class="offcanvas-cart-item-content">
                        <a href="" class="offcanvas-cart-item-link">Shock Absorber</a>
                        <div class="offcanvas-cart-item-details">
                            <span class="offcanvas-cart-item-details-quantity">1 x </span>
                            <span class="offcanvas-cart-item-details-price">$350.00</span>
                        </div>
                    </div>
                </div>
                <div class="offcanvas-cart-item-delete text-right">
                    <a href="#" class="offcanvas-cart-item-delete"><i class="fa fa-trash-o"></i></a>
                </div>
            </li>
        </ul>
        <div class="offcanvas-cart-total-price">
            <span class="offcanvas-cart-total-price-text">Subtotal:</span>
            <span class="offcanvas-cart-total-price-value">$170.00</span>
        </div>
        <ul class="offcanvas-cart-action-button">
            <li class="offcanvas-cart-action-button-list"><a href="" class="offcanvas-cart-action-button-link">View
                    Cart</a></li>
            <li class="offcanvas-cart-action-button-list"><a href="" class="offcanvas-cart-action-button-link">Checkout</a>
            </li>
        </ul>
    </div> <!-- End  Offcanvas Addcart Wrapper -->

</div><!-- ...:::: End  Offcanvas Addcart Section :::... -->

<!-- ...:::: Start Offcanvas Mobile Menu Section избранное для моб:::... -->
<div id="offcanvas-wishlish" class="offcanvas offcanvas-rightside offcanvas-add-cart-section">
    <!-- Start Offcanvas Header -->
    <div class="offcanvas-header text-right">
        <button class="offcanvas-close"><i class="fa fa-times"></i></button>
    </div> <!-- ENd Offcanvas Header -->

    <!-- Start Offcanvas Mobile Menu Wrapper -->
    <div class="offcanvas-wishlist-wrapper">
        <h4 class="offcanvas-title">Wishlist</h4>
        <ul class="offcanvas-wishlist">
            <li class="offcanvas-wishlist-item-single">
                <div class="offcanvas-wishlist-item-block">
                    <a href="" class="offcanvas-wishlist-item-image-link">
                        <img src="assets/images/products_images/aments_products_image_6.jpg" alt=""
                             class="offcanvas-wishlist-image">
                    </a>
                    <div class="offcanvas-wishlist-item-content">
                        <a href="" class="offcanvas-wishlist-item-link">Car Wheel</a>
                        <div class="offcanvas-wishlist-item-details">
                            <span class="offcanvas-wishlist-item-details-quantity">1 x </span>
                            <span class="offcanvas-wishlist-item-details-price">$49.00</span>
                        </div>
                    </div>
                </div>
                <div class="offcanvas-wishlist-item-delete text-right">
                    <a href="#" class="offcanvas-wishlist-item-delete"><i class="fa fa-trash-o"></i></a>
                </div>
            </li>
            <li class="offcanvas-wishlist-item-single">
                <div class="offcanvas-wishlist-item-block">
                    <a href="" class="offcanvas-wishlist-item-image-link">
                        <img src="assets/images/categories_images/aments_categories_08.jpg" alt=""
                             class="offcanvas-wishlist-image">
                    </a>
                    <div class="offcanvas-wishlist-item-content">
                        <a href="" class="offcanvas-wishlist-item-link">Car Vails</a>
                        <div class="offcanvas-wishlist-item-details">
                            <span class="offcanvas-wishlist-item-details-quantity">3 x </span>
                            <span class="offcanvas-wishlist-item-details-price">$500.00</span>
                        </div>
                    </div>
                </div>
                <div class="offcanvas-wishlist-item-delete text-right">
                    <a href="#" class="offcanvas-wishlist-item-delete"><i class="fa fa-trash-o"></i></a>
                </div>
            </li>
            <li class="offcanvas-wishlist-item-single">
                <div class="offcanvas-wishlist-item-block">
                    <a href="" class="offcanvas-wishlist-item-image-link">
                        <img src="assets/images/products_images/aments_products_image_2.jpg" alt=""
                             class="offcanvas-wishlist-image">
                    </a>
                    <div class="offcanvas-wishlist-item-content">
                        <a href="" class="offcanvas-wishlist-item-link">Shock Absorber</a>
                        <div class="offcanvas-wishlist-item-details">
                            <span class="offcanvas-wishlist-item-details-quantity">1 x </span>
                            <span class="offcanvas-wishlist-item-details-price">$350.00</span>
                        </div>
                    </div>
                </div>
                <div class="offcanvas-wishlist-item-delete text-right">
                    <a href="#" class="offcanvas-wishlist-item-delete"><i class="fa fa-trash-o"></i></a>
                </div>
            </li>
        </ul>
        <ul class="offcanvas-wishlist-action-button">
            <li class="offcanvas-wishlist-action-button-list"><a href=""
                                                                 class="offcanvas-wishlist-action-button-link">View
                    wishlist</a></li>
        </ul>
    </div> <!-- End Offcanvas Mobile Menu Wrapper -->

</div><!-- ...:::: End Offcanvas Mobile Menu Section:::... -->

<div class="offcanvas-overlay"></div>
