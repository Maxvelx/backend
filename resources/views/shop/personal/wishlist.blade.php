@extends('shop.components.layouts.main.main')

@section('content')
    <!-- ...:::: Start Wishlist Section:::... -->
    <div class="wishlist-section">
        <!-- Start Cart Table -->
        <div class="wishlish-table-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="table_desc">
                            <div class="table_page table-responsive">
                                <table>
                                    <!-- Start Wishlist Table Head -->
                                    <thead>
                                    <tr>
                                        <th>Видалити</th>
                                        <th>Зображення</th>
                                        <th>Назва запчастини</th>
                                        <th>Ціна</th>
                                        <th>Наявність</th>
                                        <th>Додати до замовлення</th>
                                    </tr>
                                    </thead> <!-- End Cart Table Head -->
                                    <tbody>
                                    <!-- Start Wishlist Single Item-->
                                    @foreach($likedParts as $part)
                                        <tr>
                                            <td>
                                                <form action="{{route('wishlist.destroy', $part)}}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"><i class="fas fa-trash"></i></button>
                                                </form>
                                            </td>
                                            <td class="product_thumb"><a href="product-details-default.html"><img
                                                        src="assets/images/products_images/aments_products_image_1.jpg"
                                                        alt=""></a></td>
                                            <td class="product_name"><a
                                                    href="{{route('parts.show', $part->id)}}">{{$part->name_parts}}</a>
                                            </td>
                                            <td class="product-price">@include('shop.components.etc.price')</td>
                                            <td class="product_stock">{{$part->quantity > 0 ? 'У наявності' : 'Під замовлення'}}</td>
                                            <td><button class="btn btn-outline-danger" href="#" data-toggle="modal"
                                                                           data-target="#modalAddcart">До замовлення</button>
                                            </td>
                                        </tr> <!-- End Wishlist Single Item-->
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- End Cart Table -->
    </div>
    <!-- ...:::: End Wishlist Section:::... -->

@endsection

