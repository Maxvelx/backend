@extends('admin.components.layouts.main_layouts')

@section('content')
    @if(session('message'))
        <div class="alert alert-warning">
            {{session('message')}}
        </div>
    @endif
    <div class="col-12 py-3 mx-3">
        <a class="btn btn-primary" href="{{route('parts.create')}}">Додати запчастину</a>
    </div>

    <div class="container-fluid mb-4">
        <h4 class="text-center display-6">Пошук запчастини по номеру, назві, тощо</h4>
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <form action="{{route('search.index')}}" method="post">
                    @csrf
                    <div class="input-group">
                        <input type="search" name="search" class="form-control form-control-lg"
                               placeholder="Пошук запчастини">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-lg btn-default">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="row col-12 mx-2">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Список категорій</h3>

                    <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="table_search" class="form-control float-right"
                                   placeholder="Search">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                        <tr>
                            <th>Взаемодія</th>
                            <th>Номер зап.</th>
                            <th>Бренд</th>
                            <th>Номер ориг.</th>
                            <th>Ціна</th>
                            <th>Роздріб</th>
                            <th>Назва</th>
                            <th>Наявність</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($parts as $part)
                            <tr>
                                <td class="row"><a href="{{route('parts.edit', $part->id)}}"><i
                                            aria-placeholder="Редагувати" class="text-success fas fa-edit"></i></a>
                                    <form action="{{route('parts.destroy', $part->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-danger bg-transparent border-0"><i
                                                aria-placeholder="Видалити" class="fas fa-trash-alt"></i></button>
                                    </form>
                                </td>
                                <td>{{$part->num_part}}</td>
                                <td>{{$part->brand_part}}</td>
                                <td>
                                    <form action="{{route('search.index')}}" method="post">
                                        @csrf
                                        <input type="submit" value="{{$part->num_oem}}" name="search"
                                               class="bg-transparent border-0 text-light">
                                    </form>
                                </td>
                                <td>{{$part->price_1}}</td>
                                <td>{{isset($coef) ? $part->price_1*$coef : '--'}}</td>
                                <td>{{$part->name_parts}}</td>
                            @if($part->quantity > 0)
                                    <td class="text-success">У наявності</td>
                                @elseif($part->quantity <= 0)
                                    <td class="text-orange">Під замовлення</td>
                                @endif
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection
