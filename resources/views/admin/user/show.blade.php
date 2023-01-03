@extends('admin.components.layouts.main_layouts')

@section('content')
    <!-- Main content -->
    <section class="content py-4">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-5">
                    <!-- Widget: user widget style 1 -->
                    <div class="card card-widget widget-user shadow">
                        <!-- Add the bg color to the header using any of the bg-* classes -->
                        <div class="widget-user-header text-white"
                             style="background: url('/dist/img/photo1.png') center bottom;">
                            <h3 class="widget-user-username text-right">{{$user->name}} {{$user->patronymic}}</h3>
                            <h5 class="widget-user-desc text-right">{{$user->roleName}}</h5>
                        </div>
                        <div class="widget-user-image">
                            <img class="img-circle elevation-2" src="/dist/img/user7-128x128.jpg" alt="User Avatar">
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-sm-4 border-right">
                                    <div class="description-block">
                                        <h3 class="text">2</h3>
                                        <span class="text">Усього зроблено замовлень</span>
                                    </div>
                                    <!-- /.description-block -->
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-4 border-right">
                                    <div class="description-block">
                                        <h3 class="text">10 років</h3>
                                        <span class="text">З нами на протязі</span>
                                    </div>
                                    <!-- /.description-block -->
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-4">
                                    <div class="description-block">
                                        <h3 class="text">{{$user->GetLikedParts->count()}}</h3>
                                        <span class="text">Додано обраних запчастин</span>
                                    </div>
                                    <!-- /.description-block -->
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                        </div>
                    </div>
                    <!-- /.widget-user -->
                </div>

                <div class="col-md-7">
                    <!-- About Me Box -->
                    <div class="card card-widget widget-user shadow">
                        <div class="card-header">
                            <h3 class="card-title">Інформація про клієнта {{$user->name}} {{$user->patronymic}}</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <strong class="row pb-1">
                                <div class="col-3">
                                    <i class="fas fa-phone mr-2"></i> Телефон
                                </div>
                                <div class="col-3">
                                    <i class="fas fa-mail-bulk mr-2"></i> Email адреса
                                </div>
                                <div class="col-2">
                                    <i class="fas fa-viber"></i>viber
                                </div>
                                <div class="col-2">
                                    <i class="fas fa-telegram"></i>teleg
                                </div>
                                <div class="col-2">
                                    <i class="fas fa-instagram"></i>instag
                                </div>
                            </strong>
                            <div class="row pb-4">
                                <div class="col-3">
                                    {{$user->phone_number}}
                                </div>
                                <div class="col-3">
                                    {{$user->email}}
                                </div>
                            </div>
                            <strong class="row pb-1">
                                <div class="col-5">
                                    <i class="fas fa-book mr-2"></i> Прізвище Ім'я По батькові
                                </div>
                                <div class="col-7">
                                    <i class="fas fa-truck mr-2"></i> Адреса для доставки
                                </div>
                            </strong>
                            <div class="row pb-4">
                                <div class="col-5">
                                    {{$user->lastName}} {{$user->name}} {{$user->patronymic}}
                                </div>
                                <div class="col-7">
                                    {{$user->address}}
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                    <!--Edit Delete Button -->
                    <div class="row px-2 pb-3 justify-content-end">
                        <a type="button" class="btn bg-gradient-primary btn-lg"
                           href="{{route('user.edit', $user->id)}}">Редагувати
                        </a>
                        <form action="{{route('user.destroy', $user->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="ml-2 btn bg-gradient-danger btn-lg">Видалити</button>
                        </form>
                    </div>
                    <!-- /Edit Delete Button -->
                </div>
            </div>
            <!-- /.col Client-->
            <!--Client activity -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-widget widget-user shadow">
                        <div class="card-header p-2">
                            <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Замовлення
                                        клієнта</a></li>
                                <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Автомобілі
                                        клієнта</a></li>
                                <li class="nav-item"><a class="nav-link" href="#wishlist" data-toggle="tab">Обрані
                                        запчастини</a></li>
                            </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="active tab-pane" id="activity">

                                </div>
                                <!-- /.tab-pane -->
                                <div class="tab-pane" id="timeline">
                                    <!-- The timeline -->
                                </div>
                                <!-- /.tab-pane -->

                                <div class="tab-pane" id="wishlist">
                                    <div class="card-body table-responsive p-0">
                                        <table class="table table-hover text-nowrap">
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
                                                        <form action="{{route('wishlist.destroy', $part)}}"
                                                              method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"><i class="fas fa-trash"></i></button>
                                                        </form>
                                                    </td>
                                                    <td class="product_thumb"><a
                                                            href="product-details-default.html"><img
                                                                src=""
                                                                alt=""></a></td>
                                                    <td class="product_name"><a
                                                            href="{{route('parts.show', $part->id)}}">{{$part->name_parts}}</a>
                                                    </td>
                                                    <td class="product-price">@include('shop.components.etc.price')</td>
                                                    <td class="product_stock">{{$part->quantity > 0 ? 'У наявності' : 'Під замовлення'}}</td>
                                                    <td>
                                                        <button class="btn btn-outline-danger" href="#"
                                                                data-toggle="modal"
                                                                data-target="#modalAddcart">До замовлення
                                                        </button>
                                                    </td>
                                                </tr> <!-- End Wishlist Single Item-->
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- /.tab-pane -->
                            </div>
                        </div><!-- /.card-body -->
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
@endsection
