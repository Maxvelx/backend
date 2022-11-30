@extends('shop.components.layouts.main.main')

@section('title')
    Home
@endsection

@section('content')
    @if(session('message'))
        <div class="alert alert-warning">
            {{session('message')}}
        </div>
    @endif
    <!-- ...:::: Start Hero Area Section Слайдер:::... -->
    <div class="hero-area">
        <div class="hero-area-wrapper hero-slider-dots fix-slider-dots">
            <!-- Start Hero Slider Single -->
            <div class="hero-area-single">
                <div class="hero-area-bg">
                    <img class="hero-img" src="{{Storage::url ('/image/slider-2.jpg')}}" alt="">
                </div>
                <div class="hero-content">
                    <div class="container">
                        <div class="row">
                            <div class="col-10 col-md-8 col-xl-6">
                                <h5>World Best Quality</h5>
                                <h2>New Car Parts</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit sed do eiu</p>
                                <a href="{{url ('category/4')}}" class="hero-button">Shopping Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- End Hero Slider Single -->
            <!-- Start Hero Slider Single -->
            <div class="hero-area-single">
                <div class="hero-area-bg">
                    <img class="hero-img" src="{{Storage::url ('/image/slider-1.webp')}}" alt="">
                </div>
                <div class="hero-content">
                    <div class="container">
                        <div class="row">
                            <div class="col-10 col-md-8 col-xl-6">
                                <h5>Боже який пікап</h5>
                                <h2>Дуже класний</h2>
                                <p>Купи на цей автомобіль запчастини перейшовши по посиланню знизу</p>
                                <a href="{{url ('category/5')}}" class="hero-button">Купуй зараз!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- End Hero Slider Single -->
        </div>
    </div><!-- ...:::: End Hero Area Section:::... -->

    <!-- ...:::: Start Product Tab Section новые поступления:::... -->
    <div class="product-tab-section section-top-gap-100">
        <!-- Start Section Content -->
        <div class="section-content-gap">
            <div class="container">
                <div class="row">
                    <div
                        class="section-content d-flex justify-content-between align-items-md-center align-items-start flex-md-row flex-column">
                        <h3 class="section-title" data-aos="fade-right" data-aos-delay="0">Нові надхоження</h3>
                        <ul class="tablist nav product-tab-btn" data-aos="fade-left" data-aos-delay="0">
                            <li><a class="nav-link active" data-toggle="tab" href="#car_and_drive">Нові надходження</a>
                            </li>
                            <li><a class="nav-link" data-toggle="tab" href="#motorcycle">Нові надходження оливи</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div> <!-- End Section Content -->

        <!-- Start Tab Wrapper -->
        <div class="product-tab-wrapper" data-aos="fade-up" data-aos-delay="100">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="tab-content tab-animate-zoom">
                            <div class="tab-pane show active" id="car_and_drive">
                                <div class="product-default-slider product-default-slider-4grids-1row">
                                    <!-- Start Product Defautlt Single -->
                                    @foreach($parts as $part)
                                        <div class="product-default-single border-around" style="height: 450px">

                                            <div class="product-img-warp">
                                                <a href="product-details-default.html" class="product-default-img-link">
                                                    <img src="assets/images/products_images/aments_products_image_2.jpg"
                                                         alt="" class="product-default-img img-fluid">
                                                </a>
                                                <div class="product-action-icon-link">
                                                    <ul>
                                                        <li>
                                                            @auth()
                                                                <form id="some"
                                                                      action="{{route('shop.wishlist.store', $part->id)}}"
                                                                      method="post">
                                                                    @csrf
                                                                    <a>
                                                                        <button type="submit">

                                                                            @if(auth()->user()->GetLikedParts->contains($part->id))
                                                                                <i class="fas fa-heart"></i>
                                                                            @else
                                                                                <i class="far fa-heart"></i>
                                                                            @endif

                                                                        </button>
                                                                    </a>
                                                                </form>
                                                            @endauth
                                                        </li>
                                                                @guest()
                                                                    <li><a href="{{route('login')}}"><i
                                                                                class="icon-heart"></i></a>
                                                                    </li>
                                                                @endguest
                                                                <li><a href="#" data-toggle="modal"
                                                                       data-target="#modalQuickview{{$part->id}}"><i
                                                                            class="icon-eye"></i></a></li>
                                                                <li><a href="#" data-toggle="modal"
                                                                       data-target="#modalAddcart"><i
                                                                            class="icon-shopping-cart"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-default-content">
                                                <h6 class="cuttedText product-default-link" style="height: 5em"><a
                                                        href="product-details-default.html">{{$part->name_parts}}</a>
                                                </h6>
                                                <span class="product-default-price">
                                                @include('shop.components.etc.price')
                                                </span>
                                            </div>
                                        </div>
                                    @endforeach
                                    <!-- End Product Defautlt Single -->
                                </div>
                            </div>
                            <div class="tab-pane" id="motorcycle">
                                <div class="product-default-slider product-default-slider-4grids-1row">
                                    <div class="product-default-single border-around">
                                        <div class="product-img-warp">
                                            <a href="product-details-default.html" class="product-default-img-link">
                                                <img src="assets/images/products_images/aments_products_image_2.jpg"
                                                     alt="" class="product-default-img img-fluid">
                                            </a>
                                            <div class="product-action-icon-link">
                                                <ul>
                                                    <li><a href="wishlist.html"><i class="icon-heart"></i></a></li>
                                                    <li><a href="compare.html"><i class="icon-repeat"></i></a></li>
                                                    <li><a href="#" data-toggle="modal" data-target="#modalQuickview"><i
                                                                class="icon-eye"></i></a></li>
                                                    <li><a href="#" data-toggle="modal" data-target="#modalAddcart"><i
                                                                class="icon-shopping-cart"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="product-default-content">
                                            <h6 class="product-default-link"><a href="product-details-default.html">New
                                                    Balance Fresh Foam Kaymin Car Purts</a></h6>
                                            <span class="product-default-price"><del class="product-default-price-off">$30.12</del> $25.12</span>
                                        </div>
                                    </div> <!-- End Product Defautlt Single -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- End Catagory Wrapper -->

    </div>
    <!-- ...:::: Start Product Tab Section:::... -->

    <div class="banner-section section-top-gap-100" data-aos="fade-up" data-aos-delay="50">
        <!-- Start Banner Wrapper -->
        <div class="banner-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <!-- Start Banner Single -->
                        <div class="banner-single">
                            <a href="product-details-default.html" class="banner-img-link">
                                <img class="banner-img banner-img-big"
                                     src="{{Storage::url ('/image/slider-3.png')}}" alt="">
                            </a>
                            <div class="banner-content">
                                <span class="banner-text-small">2021 Latest Collection</span>
                                <h2 class="banner-text-big"><span class="banner-text-big-highlight">-40%</span> Offer
                                    All Car Parts</h2>
                            </div>
                        </div> <!-- End Banner Single -->
                    </div>
                </div>
            </div>
        </div> <!-- End Banner Wrapper -->
    </div> <!-- ...:::: End Product Catagory Section:::... -->
    <!-- ...:::: Start Company Logo Section:::... -->
    <div class="company-logo-section section-top-gap-100" data-aos="fade-up" data-aos-delay="0">
        <!-- Start Company Logo Wrapper -->
        <div class="company-logo-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="company-logo-slider">
                            <!-- Start Company logo Single -->
                            <div class="company-logo-single" data-aos="fade-up" data-aos-delay="0">
                                <img src="{{Storage::url ('/image/ford-logo.png')}}" alt=""
                                     class="img-fluid company-logo-image">
                            </div> <!-- End Company logo Single -->
                            <!-- Start Company logo Single -->
                            <div class="company-logo-single" data-aos="fade-up" data-aos-delay="200">
                                <img src="{{Storage::url ('/image/linkoln-logo.png')}}" alt=""
                                     class="img-fluid company-logo-image">
                            </div> <!-- End Company logo Single -->
                            <!-- Start Company logo Single -->
                            <div class="company-logo-single" data-aos="fade-up" data-aos-delay="400">
                                <img src="{{Storage::url ('/image/ford-logo.png')}}" alt=""
                                     class="img-fluid company-logo-image">
                            </div> <!-- End Company logo Single -->
                            <!-- Start Company logo Single -->
                            <div class="company-logo-single" data-aos="fade-up" data-aos-delay="600">
                                <img src="{{Storage::url ('/image/linkoln-logo.png')}}" alt=""
                                     class="img-fluid company-logo-image">
                            </div> <!-- End Company logo Single -->
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- End Company Logo Wrapper -->
    </div> <!-- ...:::: End Company Logo Section:::... -->

    <!-- ...:::: Start Blog Feed Section:::... -->
    <div class="blog-feed-section section-top-gap-100">
        <!-- Start Section Content -->
        <div class="section-content-gap" data-aos="fade-up" data-aos-delay="50">
            <div class="container">
                <div class="row">
                    <div class="section-content">
                        <h3 class="section-title" data-aos="fade-up" data-aos-delay="200">Цікаві факти про
                            автомобілі</h3>
                    </div>
                </div>
            </div>
        </div> <!-- End Section Content -->

        <!-- Start Blog Feed Wrapper -->
        <div class="blog-feed-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-12">
                        <!-- Start Blog Feed Single -->
                        <div class="blog-feed-single" data-aos="fade-up" data-aos-delay="0">
                            <a href="blog-single-sidebar-left.html" class="blog-feed-img-link">
                                <img src="assets/images/blog_images/aments_blog_01.jpg" alt="" class="blog-feed-img">
                            </a>
                            <div class="blog-feed-content">
                                <div class="blog-feed-post-meta">
                                    <span>By:</span>
                                    <a href="" class="blog-feed-post-meta-author">Admin</a> -
                                    <a href="" class="blog-feed-post-meta-date">Sep 14, 2020</a>
                                </div>
                                <h5 class="blog-feed-link"><a href="blog-single-sidebar-left.html">Lorem ipsum dolor
                                        amet cons adipisicing elit</a></h5>
                            </div>
                        </div><!-- End Blog Feed Single -->
                    </div>
                    <div class="col-lg-4 col-md-6 col-12">
                        <!-- Start Blog Feed Single -->
                        <div class="blog-feed-single" data-aos="fade-up" data-aos-delay="200">
                            <a href="blog-single-sidebar-left.html" class="blog-feed-img-link">
                                <img src="assets/images/blog_images/aments_blog_02.jpg" alt="" class="blog-feed-img">
                            </a>
                            <div class="blog-feed-content">
                                <div class="blog-feed-post-meta">
                                    <span>By:</span>
                                    <a href="" class="blog-feed-post-meta-author">Admin</a> -
                                    <a href="" class="blog-feed-post-meta-date">Sep 14, 2020</a>
                                </div>
                                <h5 class="blog-feed-link"><a href="blog-single-sidebar-left.html">Lorem ipsum dolor
                                        amet cons adipisicing elit</a></h5>
                            </div>
                        </div><!-- End Blog Feed Single -->
                    </div>
                    <div class="col-lg-4 col-md-6 col-12">
                        <!-- Start Blog Feed Single -->
                        <div class="blog-feed-single" data-aos="fade-up" data-aos-delay="400">
                            <a href="blog-single-sidebar-left.html" class="blog-feed-img-link">
                                <img src="assets/images/blog_images/aments_blog_03.jpg" alt="" class="blog-feed-img">
                            </a>
                            <div class="blog-feed-content">
                                <div class="blog-feed-post-meta">
                                    <span>By:</span>
                                    <a href="" class="blog-feed-post-meta-author">Admin</a> -
                                    <a href="" class="blog-feed-post-meta-date">Sep 14, 2020</a>
                                </div>
                                <h5 class="blog-feed-link"><a href="blog-single-sidebar-left.html">Lorem ipsum dolor
                                        amet cons adipisicing elit</a></h5>
                            </div>
                        </div><!-- End Blog Feed Single -->
                    </div>
                </div>
            </div>
        </div> <!-- End Blog Feed Wrapper -->


    </div> <!-- ...:::: End Blog Feed Section:::... -->
    <!-- material-scrolltop button -->
    <button class="material-scrolltop" type="button"></button>

    <!-- Start Modal Add cart -->
    <div class="modal fade" id="modalAddcart" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col text-right">
                                <button type="button" class="close modal-close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true"> <i class="fa fa-times"></i></span>
                                </button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-7">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="modal-add-cart-product-img">
                                            <img class="img-fluid"
                                                 src="assets/images/products_images/aments_products_image_1.jpg" alt="">
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="modal-add-cart-info"><i class="fa fa-check-square"></i>Added to cart
                                            successfully!
                                        </div>
                                        <div class="modal-add-cart-product-cart-buttons">
                                            <a href="cart.html">View Cart</a>
                                            <a href="checkout.html">Checkout</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5 modal-border">
                                <ul class="modal-add-cart-product-shipping-info">
                                    <li><strong><i class="icon-shopping-cart"></i> There Are 5 Items In Your
                                            Cart.</strong>
                                    </li>
                                    <li><strong>TOTAL PRICE: </strong> <span>$187.00</span></li>
                                    <li class="modal-continue-button"><a href="#" data-dismiss="modal">CONTINUE
                                            SHOPPING</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End Modal Add cart -->

    <!-- Start Modal Quickview cart -->
    @foreach($parts as $part)
        <div class="modal fade" id="modalQuickview{{$part->id}}" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog  modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col text-right">
                                    <button type="button" class="close modal-close" data-dismiss="modal"
                                            aria-label="Close">
                                        <span aria-hidden="true"> <i class="fa fa-times"></i></span>
                                    </button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="product-details-gallery-area">
                                        <div class="product-large-image modal-product-image-large">
                                            <div class="product-image-large-single">
                                                <img class="img-fluid"
                                                     src="assets/images/products_images/aments_products_image_1.jpg"
                                                     alt="">
                                            </div>
                                        </div>
                                        <div class="product-image-thumb modal-product-image-thumb">
                                            <div class="product-image-thumb-single">
                                                <img class="img-fluid"
                                                     src="assets/images/products_images/aments_products_image_6.jpg"
                                                     alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="product-details-content-area">
                                        <!-- Start  Product Details Text Area-->
                                        <div class="product-details-text">
                                            <h4 class="title" style="max-width: 15em">{{$part->name_parts}}</h4>
                                            <div class="price">@include('shop.components.etc.price')</div>
                                        </div> <!-- End  Product Details Text Area-->
                                        <!-- Start Product Variable Area -->
                                        <div class="product-details-variable">
                                            <!-- Product Variable Single Item -->
                                            <div class="variable-single-item ">
                                                <span>Кількість</span>
                                                <div class="product-variable-quantity">
                                                    <input min="1" max="100" value="1" type="number">
                                                </div>
                                            </div>
                                        </div> <!-- End Product Variable Area -->
                                        <!-- Start  Product Details Meta Area-->
                                        <div class="product-details-meta mb-20">
                                            <ul>
                                                <form action="{{route('shop.wishlist.store', $part->id)}}"
                                                      method="post">
                                                    @csrf
                                                    <button type="submit" style="background:transparent; border:0">
                                                        @auth()
                                                            @if(auth()->user()->GetLikedParts->contains($part->id))
                                                                <li><i class="fas fa-heart"></i> Видалити з
                                                                    обраного
                                                                </li>
                                                            @else
                                                                <li><i class="far fa-heart"></i> Додати до
                                                                    обраного
                                                                </li>
                                                            @endif
                                                        @endauth
                                                    </button>
                                                </form>
                                                @guest()
                                                    <li><a href="{{route('login')}}"><i class="icon-heart"></i> Додати
                                                            до обраного (зарееструватися)</a>
                                                    </li>
                                                @endguest
                                                <li><a href="#" data-toggle="modal" data-target="#modalQuickview"><i
                                                            class="icon-shopping-cart"></i> Додати в корзину</a></li>
                                            </ul>
                                        </div> <!-- End  Product Details Meta Area-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- End Modal Quickview cart -->
    @endforeach

@endsection
