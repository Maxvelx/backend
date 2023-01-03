
@extends('admin.components.layouts.main_layouts')

@section('content')

    <div class="col-12 py-3 mx-3">
        <a class="btn btn-primary" href="{{route('tags.create')}}">Додати новий тег</a>
    </div>
    <div class="row col-12 mx-2">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Список тегів</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                        <tr>
                            <th>Взаемодія</th>
                            <th>ID</th>
                            <th>Назва тегу</th>
                            <th>Коли створена</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($tags as $tag)
                            <tr>
                                <td class="row"><a href="{{route('tags.edit', $tag)}}"><i
                                            aria-placeholder="Редагувати" class="text-success fas fa-edit"></i></a>
                                    <form action="{{route('tags.destroy', $tag)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-danger bg-transparent border-0"><i
                                                aria-placeholder="Видалити" class="fas fa-trash-alt"></i></button>
                                    </form>
                                </td>
                                <td>{{$tag->id}}</td>
                                <td>{{$tag->title}}</td>
                                <td>{{$tag->created_at}}</td>
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
