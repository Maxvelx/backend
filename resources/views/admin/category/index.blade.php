@extends('admin.components.layouts.main_layouts')

@section('content')

    <div class="col-12 py-3 mx-3">
        <a class="btn btn-primary" href="{{route('category.create')}}">Додати нову</a>
    </div>
    <div class="row col-12 mx-2">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Список категорій</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                        <tr>
                            <th>Взаемодія</th>
                            <th>ID</th>
                            <th>Ім'я категорії</th>
                            <th>Коли створена</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $сategory)
                            <tr>
                                <td class="row"><a href="{{route('category.edit', $сategory)}}"><i
                                           aria-placeholder="Редагувати" class="text-success fas fa-edit"></i></a>
                                    <form action="{{route('category.destroy', $сategory)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-danger bg-transparent border-0"><i
                                                aria-placeholder="Видалити" class="fas fa-trash-alt"></i></button>
                                    </form>
                                </td>
                                <td>{{$сategory->id}}</td>
                                <td>{{$сategory->name}}</td>
                                <td>{{$сategory->created_at}}</td>
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
