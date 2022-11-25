@extends('admin.components.layouts.main_layouts')

@section('content')

    <div class="col-12 py-3 mx-3">
        <a class="btn btn-primary" href="{{route('brands.create')}}">Додати нову модель або бренд автомобіля</a>
    </div>
    <div class="row col-12 mx-2">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Список брендів та моделей авто</h3>


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
                            <th>ID</th>
                            <th>Ім'я моделі</th>
                            <th>Ім'я бренду</th>
                            <th>Коли створена</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($brandAutos as $brandAuto)
                            <tr>
                                <td class="row"><a href="{{route('brands.edit', $brandAuto)}}"><i
                                            aria-placeholder="Редагувати" class="text-success fas fa-edit"></i></a>
                                    <form action="{{route('brands.destroy', $brandAuto)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-danger bg-transparent border-0"><i
                                                aria-placeholder="Видалити" class="fas fa-trash-alt"></i></button>
                                    </form>
                                </td>
                                <td>{{$brandAuto->id}}</td>
                                @if($brandAuto->parent_id == 0)
                                    <td>Це автомобільний бренд</td>
                                    <td>{{$brandAuto->brand_auto}}</td>
                                @endif
                                @if($brandAuto->parent_id > 0)
                                    <td>{{$brandAuto->brand_auto}}</td>
                                    <td>{{$brandAuto->brandOrModel($brandAuto->parent_id)['brand_auto']}}</td>
                                @endif
                                <td>{{$brandAuto->created_at}}</td>
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
