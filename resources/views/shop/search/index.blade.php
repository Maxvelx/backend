@extends('shop.components.layouts.main.main')
@section('content')

    <div class="row col-12 mx-2">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Список запчастин</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-center">
                        <thead>
                        <tr>
                            <th>Номер зап.</th>
                            <th>Бренд</th>
                            <th>Номер ориг.</th>
                            <th>Ціна</th>
                            <th>Назва</th>
                            <th>Термін поставки</th>
                            <th>Наявність</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($parts as $part)
                            <tr>
                                <td>{{$part->num_part}}</td>
                                <td>{{$part->brand_part}}</td>
                                <td>
                                    <form action="{{route('shop.search.index')}}" method="get">
                                        <input type="submit" value="{{$part->num_oem}}" name="search"
                                               class="bg-transparent border-0 text-dark">
                                    </form>
                                </td>
                                <td>@include('shop.components.etc.price')</td>
                                <td style="max-width: 200px; overflow: hidden; white-space: nowrap">{{$part->name_parts}}</td>
                                <td>21 день</td>
                                @if($part->quantity > 0)
                                    <td class="text-green">У наявності</td>
                                @elseif($part->quantity <= 0)
                                    <td class="text-orange">Під замовлення</td>
                                @endif
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                {{$parts->render()}}
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>

@endsection
