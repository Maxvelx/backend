@extends('shop.components.layouts.main.main')

@section('content')
    <!-- ...:::: Start Shop Section:::... -->
    <div class="shop-section" style="margin-top: 50px">
        <div class="container">
            <div class="row flex-column-reverse flex-lg-row">
                <div class="col-lg-3">
                    <!-- Start Sidebar Area -->
                    <div class="siderbar-section">

                        <!-- Start Single Sidebar Widget -->
                        <div class="sidebar-single-widget">
                            <h6 class="sidebar-title">FILTER BY PRICE</h6>
                            <div class="sidebar-content">
                                <div id="slider-range"></div>
                                <div class="filter-type-price">
                                    <label for="amount">Price range:</label>
                                    <input type="text" id="amount">
                                </div>
                            </div>
                        </div> <!-- End Single Sidebar Widget -->

                        <!-- Start Single Sidebar Widget -->
                        <div class="sidebar-single-widget">
                            <h6 class="sidebar-title">CATEGORIES</h6>
                            <div class="sidebar-content">
                                <div class="filter-type-select">
                                    <ul>
                                        <li>
                                            <label class="checkbox-default" for="catagory_1">
                                                <input type="checkbox" id="catagory_1">
                                                <span>Catagory (1)</span>
                                            </label>
                                        </li>
                                        <li>
                                            <label class="checkbox-default" for="catagory_2">
                                                <input type="checkbox" id="catagory_2">
                                                <span>Catagory (2)</span>
                                            </label>
                                        </li>
                                        <li>
                                            <label class="checkbox-default" for="catagory_3">
                                                <input type="checkbox" id="catagory_3">
                                                <span>Catagory (3)</span>
                                            </label>
                                        </li>
                                        <li>
                                            <label class="checkbox-default" for="catagory_4">
                                                <input type="checkbox" id="catagory_4">
                                                <span>Catagory (4)</span>
                                            </label>
                                        </li>
                                        <li>
                                            <label class="checkbox-default" for="catagory_5">
                                                <input type="checkbox" id="catagory_5">
                                                <span>Catagory (5)</span>
                                            </label>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div> <!-- End Single Sidebar Widget -->
                        <!-- Start Single Sidebar Widget -->
                        <div class="sidebar-single-widget">
                            <h6 class="sidebar-title">MANUFACTURER</h6>
                            <div class="sidebar-content">
                                <div class="filter-type-select">
                                    <ul>
                                        <li>
                                            <label class="checkbox-default" for="brakeParts">
                                                <input type="checkbox" id="brakeParts">
                                                <span>Brake Parts(6)</span>
                                            </label>
                                        </li>
                                        <li>
                                            <label class="checkbox-default" for="accessories">
                                                <input type="checkbox" id="accessories">
                                                <span>Accessories (10)</span>
                                            </label>
                                        </li>
                                        <li>
                                            <label class="checkbox-default" for="EngineParts">
                                                <input type="checkbox" id="EngineParts">
                                                <span>Engine Parts (4)</span>
                                            </label>
                                        </li>
                                        <li>
                                            <label class="checkbox-default" for="hermes">
                                                <input type="checkbox" id="hermes">
                                                <span>hermes (10)</span>
                                            </label>
                                        </li>
                                        <li>
                                            <label class="checkbox-default" for="tommyHilfiger">
                                                <input type="checkbox" id="tommyHilfiger">
                                                <span>Tommy Hilfiger(7)</span>
                                            </label>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div> <!-- End Single Sidebar Widget -->

                        <!-- Start Single Sidebar Widget -->
                        <div class="sidebar-single-widget">
                            <h6 class="sidebar-title">SELECT BY COLOR</h6>
                            <div class="sidebar-content">
                                <div class="filter-type-select">
                                    <ul>
                                        <li>
                                            <label class="checkbox-default" for="black">
                                                <input type="checkbox" id="black">
                                                <span>Black (6)</span>
                                            </label>
                                        </li>
                                        <li>
                                            <label class="checkbox-default" for="blue">
                                                <input type="checkbox" id="blue">
                                                <span>Blue (8)</span>
                                            </label>
                                        </li>
                                        <li>
                                            <label class="checkbox-default" for="brown">
                                                <input type="checkbox" id="brown">
                                                <span>Brown (10)</span>
                                            </label>
                                        </li>
                                        <li>
                                            <label class="checkbox-default" for="Green">
                                                <input type="checkbox" id="Green">
                                                <span>Green (6)</span>
                                            </label>
                                        </li>
                                        <li>
                                            <label class="checkbox-default" for="pink">
                                                <input type="checkbox" id="pink">
                                                <span>Pink (4)</span>
                                            </label>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div> <!-- End Single Sidebar Widget -->

                        <!-- Start Single Sidebar Widget -->
                        <div class="sidebar-single-widget">
                            <div class="sidebar-content">
                                <a href="product-details-default.html" class="sidebar-banner">
                                    <img class="img-fluid" src="assets/images/banner_images/aments_banner_04.jpg"
                                         alt="">
                                </a>
                            </div>
                        </div> <!-- End Single Sidebar Widget -->

                    </div> <!-- End Sidebar Area -->
                </div>
                <div class="col-lg-9">
                    <!-- Start Shop Product Sorting Section -->
                    <div class="shop-sort-section">
                        <div class="container">
                            <div class="row">
                                <!-- Start Sort Wrapper Box -->
                                <div
                                    class="sort-box d-flex justify-content-between align-items-md-center align-items-start flex-md-row flex-column">
                                    <!-- Start Sort tab Button -->
                                    <div class="sort-tablist">
                                        <ul class="tablist nav sort-tab-btn">
                                            <li><a class="nav-link active" data-toggle="tab"
                                                   href="#layout-3-grid"><img
                                                        src="assets/images/icon/bkg_grid.png" alt=""></a></li>
                                            <li><a class="nav-link" data-toggle="tab" href="#layout-list"><img
                                                        src="assets/images/icon/bkg_list.png" alt=""></a></li>
                                        </ul>
                                    </div> <!-- End Sort tab Button -->

                                    <!-- Start Sort Select Option -->
                                    <div class="sort-select-list">
                                        <form action="#">
                                            <fieldset>
                                                <select name="speed" id="speed">
                                                    <option>Sort by average rating</option>
                                                    <option>Sort by popularity</option>
                                                    <option selected="selected">Sort by newness</option>
                                                    <option>Sort by price: low to high</option>
                                                    <option>Sort by price: high to low</option>
                                                    <option>Product Name: Z</option>
                                                </select>
                                            </fieldset>
                                        </form>
                                    </div> <!-- End Sort Select Option -->

                                    <!-- Start Page Amount -->
                                    <div class="page-amount">
                                        <span>Showing 1–9 of 21 results</span>
                                    </div> <!-- End Page Amount -->

                                </div> <!-- Start Sort Wrapper Box -->
                            </div>
                        </div>
                    </div> <!-- End Section Content -->

                    <!-- Start Tab Wrapper -->
                    <div class="sort-product-tab-wrapper">
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <div class="tab-content tab-animate-zoom">
                                        <!-- Start Grid View Product -->
                                        <div class="tab-pane active show sort-layout-single" id="layout-3-grid">
                                            <div class="row">
                                                @foreach($parts as $part)
                                                    <div class="col-xl-4 col-sm-6 col-12">
                                                        <!-- Start Product Defautlt Single -->
                                                        <div class="product-default-single border-around">
                                                            <div class="product-img-warp">
                                                                <a href="product-details-default.html"
                                                                   class="product-default-img-link">
                                                                        <img src="{{Storage::url($part->images->value('path_image'))}}"
                                                                             class="product-default-img img-fluid">
                                                                </a>
                                                                <div class="product-action-icon-link">
                                                                    <ul>
                                                                        @auth()
                                                                            <li>
                                                                                <form action="{{route('shop.wishlist.store', $part->id)}}"
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
                                                                            </li>
                                                                        @endauth
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
                                                                                    class="icon-shopping-cart"></i></a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="product-default-content">
                                                                <h6 class="cuttedText product-default-link"
                                                                    style="height: 5em"><a
                                                                        href="{{route('parts_shop.show', $part->id)}}">{{$part->name_parts}}</a>
                                                                </h6>
                                                                <span class="product-default-price">
                                                @include('shop.components.etc.price')
                                                </span>
                                                            </div>
                                                        </div> <!-- End Product Defautlt Single -->
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div> <!-- End Grid View Product -->
                                        <!-- Start List View Product -->
                                        <div class="tab-pane sort-layout-single" id="layout-list">
                                            <div class="row">
                                                <div class="col-12">
                                                    <!-- Start Product Defautlt Single -->
                                                    <div class="product-list-single border-around">
                                                        <a href="product-details-default.html"
                                                           class="product-list-img-link">
                                                            <img
                                                                src="assets/images/products_images/aments_products_image_5.jpg"
                                                                alt="" class="img-fluid">
                                                        </a>
                                                        <div class="product-list-content">
                                                            <h5 class="product-list-link"><a
                                                                    href="product-details-default.html">New Balance
                                                                    Fresh Foam Kaymin Car Purts</a></h5>
                                                            <span class="product-list-price"><del
                                                                    class="product-list-price-off">$30.12</del> $25.12</span>
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing
                                                                elit.
                                                                Nobis ad, iure incidunt. Ab consequatur temporibus
                                                                non
                                                                eveniet inventore doloremque necessitatibus sed,
                                                                ducimus
                                                                quisquam, ad asperiores</p>
                                                            <div class="product-action-icon-link-list">
                                                                <ul>
                                                                    <li><a href="wishlist.html"><i
                                                                                class="icon-heart"></i></a></li>
                                                                    <li><a href="compare.html"><i
                                                                                class="icon-repeat"></i></a></li>
                                                                    <li><a href="#" data-toggle="modal"
                                                                           data-target="#modalQuickview"><i
                                                                                class="icon-eye"></i></a></li>
                                                                    <li><a href="#" data-toggle="modal"
                                                                           data-target="#modalAddcart"><i
                                                                                class="icon-shopping-cart"></i></a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div> <!-- End Product Defautlt Single -->
                                                </div>
                                                <div class="col-12">
                                                    <!-- Start Product Defautlt Single -->
                                                    <div class="product-list-single border-around">
                                                        <a href="product-details-default.html"
                                                           class="product-list-img-link">
                                                            <img
                                                                src="assets/images/products_images/aments_products_image_2.jpg"
                                                                alt="" class="img-fluid">
                                                        </a>
                                                        <div class="product-list-content">
                                                            <h5 class="product-list-link"><a
                                                                    href="product-details-default.html">New Balance
                                                                    Fresh Foam Kaymin Car Purts</a></h5>
                                                            <span class="product-list-price"><del
                                                                    class="product-list-price-off">$30.12</del> $25.12</span>
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing
                                                                elit.
                                                                Nobis ad, iure incidunt. Ab consequatur temporibus
                                                                non
                                                                eveniet inventore doloremque necessitatibus sed,
                                                                ducimus
                                                                quisquam, ad asperiores</p>
                                                            <div class="product-action-icon-link-list">
                                                                <ul>
                                                                    <li><a href="wishlist.html"><i
                                                                                class="icon-heart"></i></a></li>
                                                                    <li><a href="compare.html"><i
                                                                                class="icon-repeat"></i></a></li>
                                                                    <li><a href="#" data-toggle="modal"
                                                                           data-target="#modalQuickview"><i
                                                                                class="icon-eye"></i></a></li>
                                                                    <li><a href="#" data-toggle="modal"
                                                                           data-target="#modalAddcart"><i
                                                                                class="icon-shopping-cart"></i></a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div> <!-- End Product Defautlt Single -->
                                                </div>
                                                <div class="col-12">
                                                    <!-- Start Product Defautlt Single -->
                                                    <div class="product-list-single border-around">
                                                        <a href="product-details-default.html"
                                                           class="product-list-img-link">
                                                            <img
                                                                src="assets/images/products_images/aments_products_image_1.jpg"
                                                                alt="" class="img-fluid">
                                                        </a>
                                                        <div class="product-list-content">
                                                            <h5 class="product-list-link"><a
                                                                    href="product-details-default.html">New Balance
                                                                    Fresh Foam Kaymin Car Purts</a></h5>
                                                            <span class="product-list-price"><del
                                                                    class="product-list-price-off">$30.12</del> $25.12</span>
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing
                                                                elit.
                                                                Nobis ad, iure incidunt. Ab consequatur temporibus
                                                                non
                                                                eveniet inventore doloremque necessitatibus sed,
                                                                ducimus
                                                                quisquam, ad asperiores</p>
                                                            <div class="product-action-icon-link-list">
                                                                <ul>
                                                                    <li><a href="wishlist.html"><i
                                                                                class="icon-heart"></i></a></li>
                                                                    <li><a href="compare.html"><i
                                                                                class="icon-repeat"></i></a></li>
                                                                    <li><a href="#" data-toggle="modal"
                                                                           data-target="#modalQuickview"><i
                                                                                class="icon-eye"></i></a></li>
                                                                    <li><a href="#" data-toggle="modal"
                                                                           data-target="#modalAddcart"><i
                                                                                class="icon-shopping-cart"></i></a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div> <!-- End Product Defautlt Single -->
                                                </div>
                                                <div class="col-12">
                                                    <!-- Start Product Defautlt Single -->
                                                    <div class="product-list-single border-around">
                                                        <a href="product-details-default.html"
                                                           class="product-list-img-link">
                                                            <img
                                                                src="assets/images/products_images/aments_products_image_4.jpg"
                                                                alt="" class="img-fluid">
                                                        </a>
                                                        <div class="product-list-content">
                                                            <h5 class="product-list-link"><a
                                                                    href="product-details-default.html">New Balance
                                                                    Fresh Foam Kaymin Car Purts</a></h5>
                                                            <span class="product-list-price"><del
                                                                    class="product-list-price-off">$30.12</del> $25.12</span>
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing
                                                                elit.
                                                                Nobis ad, iure incidunt. Ab consequatur temporibus
                                                                non
                                                                eveniet inventore doloremque necessitatibus sed,
                                                                ducimus
                                                                quisquam, ad asperiores</p>
                                                            <div class="product-action-icon-link-list">
                                                                <ul>
                                                                    <li><a href="wishlist.html"><i
                                                                                class="icon-heart"></i></a></li>
                                                                    <li><a href="compare.html"><i
                                                                                class="icon-repeat"></i></a></li>
                                                                    <li><a href="#" data-toggle="modal"
                                                                           data-target="#modalQuickview"><i
                                                                                class="icon-eye"></i></a></li>
                                                                    <li><a href="#" data-toggle="modal"
                                                                           data-target="#modalAddcart"><i
                                                                                class="icon-shopping-cart"></i></a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div> <!-- End Product Defautlt Single -->
                                                </div>
                                                <div class="col-12">
                                                    <!-- Start Product Defautlt Single -->
                                                    <div class="product-list-single border-around">
                                                        <a href="product-details-default.html"
                                                           class="product-list-img-link">
                                                            <img
                                                                src="assets/images/products_images/aments_products_image_3.jpg"
                                                                alt="" class="img-fluid">
                                                        </a>
                                                        <div class="product-list-content">
                                                            <h5 class="product-list-link"><a
                                                                    href="product-details-default.html">New Balance
                                                                    Fresh Foam Kaymin Car Purts</a></h5>
                                                            <span class="product-list-price"><del
                                                                    class="product-list-price-off">$30.12</del> $25.12</span>
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing
                                                                elit.
                                                                Nobis ad, iure incidunt. Ab consequatur temporibus
                                                                non
                                                                eveniet inventore doloremque necessitatibus sed,
                                                                ducimus
                                                                quisquam, ad asperiores</p>
                                                            <div class="product-action-icon-link-list">
                                                                <ul>
                                                                    <li><a href="wishlist.html"><i
                                                                                class="icon-heart"></i></a></li>
                                                                    <li><a href="compare.html"><i
                                                                                class="icon-repeat"></i></a></li>
                                                                    <li><a href="#" data-toggle="modal"
                                                                           data-target="#modalQuickview"><i
                                                                                class="icon-eye"></i></a></li>
                                                                    <li><a href="#" data-toggle="modal"
                                                                           data-target="#modalAddcart"><i
                                                                                class="icon-shopping-cart"></i></a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div> <!-- End Product Defautlt Single -->
                                                </div>
                                            </div>
                                        </div> <!-- End List View Product -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- End Tab Wrapper -->

                    <!-- Start Pagination -->
                    <div class="page-pagination text-center">
                        <ul>
                            <li><a href="#">Previous</a></li>
                            <li><a class="active" href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">Next</a></li>
                        </ul>
                    </div> <!-- End Pagination -->
                </div> <!-- End Shop Product Sorting Section  -->
            </div>
        </div>
    </div>
    <!-- ...:::: End Shop Section:::... -->

    <!-- ...:::: Modal Section:::... -->
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
