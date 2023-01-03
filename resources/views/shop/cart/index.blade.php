@extends('shop.components.layouts.main.main')

@section('content')

    <!-- ...:::: Start Cart Section:::... -->
    <div class="row mx-4 mt-3">
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-md-9">
                    <div class="ibox">
                        <div class="ibox-title">
                            <span
                                class="pull-right">(<strong>{{$countParts = Cart::session($_COOKIE['cart_id'])->getContent()->count()}}</strong>)
                            @if($countParts == 1)
                                    запчастина
                                @elseif($countParts > 1 && $countParts < 5)
                                    запчастини
                                @else
                                    запчастин
                                @endif
                            </span>
                            <h5>Запчастини у вашому замовленні</h5>
                        </div>
                        <form action="{{route('order.store')}}" method="post">
                            @csrf
                            @foreach($parts as $part)
                                <div class="ibox-content">
                                    <div class="table-responsive">
                                        <table class="table shoping-cart-table" style="border: 0px">
                                            <tbody>
                                            <tr>
                                                <td width="90">
                                                    <input type="hidden" name="number[]" value="{{$part->attributes->number}}"> {{$part->attributes->number}}
                                                    <input type="hidden" name="part_id[]" value="{{$part->id}}">

                                                </td>
                                                <td class="desc">
                                                    <p style="font-size: 12px;">
                                                        <input type="hidden" name="name[]" value="{{$part->name}}">{{$part->name}}
                                                    </p>
                                                    <div class="m-t-sm">
                                                        <form action="{{route('cart.deleting', $part->id)}}"
                                                              method="post">
                                                            @csrf
                                                            <button type="submit">
                                                                <i class="fa fa-trash"></i> Remove item
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                                <td>
                                                    <input type="hidden" name="price[]" value="{{$part->price}}"> {{$part->price. ' грн'}}
                                                </td>
                                                <td width="10">
                                                    <input type="text" class="form-control" name="quantity[]"
                                                           value="{{$part->quantity}}">
                                                </td>
                                                <td>
                                                    <h4>
                                                        {{$part->price*$part->quantity.' грн'}}
                                                    </h4>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            @endforeach
                            <div class="ibox-content">
                                <input type="hidden" name="order_id" value="{{$_COOKIE['cart_id']}}">
                                <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                                <button type="submit" class="btn btn-primary pull-right"><i
                                        class="fa fa fa-shopping-cart"></i> Checkout
                                </button>
                                <button class="btn btn-white"><i class="fa fa-arrow-left"></i> Continue shopping
                                </button>
                            </div>
                        </form>


                    </div>
                </div>

            </div>
            <div class="col-md-3">
                <div class="ibox">
                    <div class="ibox-title">
                        <h5>Cart Summary</h5>
                    </div>
                    <div class="ibox-content">
                        <span>
                            Total
                        </span>
                        <h2 class="font-bold">
                            $390,00
                        </h2>

                        <hr>
                        <span class="text-muted small">
                            *For United States, France and Germany applicable sales tax will be applied
                        </span>
                        <div class="m-t-sm">
                            <div class="btn-group">
                                <a href="#" class="btn btn-primary btn-sm"><i class="fa fa-shopping-cart"></i>
                                    Checkout</a>
                                <a href="#" class="btn btn-white btn-sm"> Cancel</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="ibox">
                    <div class="ibox-title">
                        <h5>Support</h5>
                    </div>
                    <div class="ibox-content text-center">
                        <h3><i class="fa fa-phone"></i> +43 100 783 001</h3>
                        <span class="small">
                            Please contact with us if you have any questions. We are avalible 24h.
                        </span>
                    </div>
                </div>

                <div class="ibox">
                    <div class="ibox-content">

                        <p class="font-bold">
                            Other products you may be interested
                        </p>
                        <hr>
                        <div>
                            <a href="#" class="product-name"> Product 1</a>
                            <div class="small m-t-xs">
                                Many desktop publishing packages and web page editors now.
                            </div>
                            <div class="m-t text-righ">

                                <a href="#" class="btn btn-xs btn-outline btn-primary">Info <i
                                        class="fa fa-long-arrow-right"></i> </a>
                            </div>
                        </div>
                        <hr>
                        <div>
                            <a href="#" class="product-name"> Product 2</a>
                            <div class="small m-t-xs">
                                Many desktop publishing packages and web page editors now.
                            </div>
                            <div class="m-t text-righ">

                                <a href="#" class="btn btn-xs btn-outline btn-primary">Info <i
                                        class="fa fa-long-arrow-right"></i> </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    {{--    <div class="col-md-12 mt-3">--}}
    {{--    <div class="row col-md-12 mt-3">--}}
    {{--        <table class="col-md-7 ml-10" style="text-align: center">--}}
    {{--            <!-- Start Cart Table Head -->--}}
    {{--            <thead>--}}
    {{--            <tr>--}}
    {{--                <th style="width: 50px;"></th>--}}
    {{--                <th style="width: 130px;"></th>--}}
    {{--                <th style="width: 400px;"></th>--}}
    {{--                <th style="width: 80px;"></th>--}}
    {{--                <th style="width: 80px;"></th>--}}
    {{--                <th style="width: 80px;"></th>--}}
    {{--            </tr>--}}
    {{--            </thead> <!-- End Cart Table Head -->--}}
    {{--            <tbody>--}}
    {{--            <!-- Start Cart Single Item-->--}}
    {{--            @foreach($parts as $part)--}}
    {{--                <tr style="border-bottom: 0.1px solid">--}}
    {{--                    <td>--}}
    {{--                        <form action="{{route('cart.deleting', $part->id)}}" method="post">--}}
    {{--                            @csrf--}}
    {{--                            <button type="submit">--}}
    {{--                                <i class="fa fa-trash-o"></i>--}}
    {{--                            </button>--}}
    {{--                        </form>--}}
    {{--                    </td>--}}
    {{--                    <td class="px-3"><a href="product-details-default.html"><img--}}
    {{--                                src="assets/images/products_images/aments_products_image_1.jpg"--}}
    {{--                                style="height: 100px;width: 100px" alt=""></a>--}}
    {{--                    </td>--}}
    {{--                    <td class="pr-1" style="text-align: left; font-size: small"><a--}}
    {{--                            href="product-details-default.html">{{$part->name}}</a></td>--}}
    {{--                    <td class="pr-1" style="padding-bottom: 20px">--}}
    {{--                        <div style="font-size: smaller">Ціна</div>--}}
    {{--                        <div style="font-size: small; font-weight: bold">{{$part->price. ' грн'}}</div>--}}
    {{--                    </td>--}}
    {{--                    <td class="pr-1" style="padding-bottom: 20px;">--}}
    {{--                        <div style="font-size: smaller">Кількість</div>--}}
    {{--                        <div style="font-size: small; font-weight: bold">{{$part->quantity}}</div>--}}
    {{--                    </td>--}}
    {{--                    <td style="padding-bottom: 20px">--}}
    {{--                        <div style="font-size: smaller">Сума</div>--}}
    {{--                        <div style="font-size: small; font-weight: bold">{{$part->price*$part->quantity.' грн'}}</div>--}}
    {{--                    </td>--}}
    {{--                </tr>--}}
    {{--            @endforeach--}}
    {{--            <!-- End Cart Single Item-->--}}
    {{--            </tbody>--}}
    {{--        </table>--}}
    {{--        <!-- Checkout -->--}}
    {{--        <div class="col-md-4 ml-4 mt-10">--}}
    {{--            <p>Замовлення</p>--}}
    {{--            <div class="cart_subtotal">--}}
    {{--                <p>{{$countParts = Cart::session($_COOKIE['cart_id'])->getContent()->count()}}--}}
    {{--                    @if($countParts == 1)--}}
    {{--                        товар--}}
    {{--                    @elseif($countParts > 1 && $countParts < 5)--}}
    {{--                        товара--}}
    {{--                    @else--}}
    {{--                        товарів--}}
    {{--                    @endif--}}
    {{--                </p>--}}
    {{--                <p class="cart_amount">На суму: {{$preTotal = Cart::session($_COOKIE['cart_id'])->getTotal(). ' грн'}}</p>--}}
    {{--            </div>--}}
    {{--            <div class="cart_subtotal">--}}
    {{--                <p>Доставка</p>--}}
    {{--                <p class="cart_amount">По тарифу перевізника</p>--}}
    {{--            </div>--}}
    {{--            <div class="cart_subtotal">--}}
    {{--                <p>До сплати: </p>--}}
    {{--                <p class="cart_amount">{{$preTotal}}</p>--}}
    {{--            </div>--}}
    {{--            <div style="text-align: right">--}}
    {{--                <a class="btn btn-success" href="#">Proceed to Checkout</a>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}



@endsection
