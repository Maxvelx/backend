@extends('admin.components.layouts.main_layouts')

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Редагування тегу</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{route('tags.edit', $tag)}}" method="post">
            @csrf
            @method('PATCH')
            <div class="card-body col-5">
                <div class="form-group input-group-lg">
                    <label for="tag">Ім'я тегу</label>
                    <input class="form-control" id="tag" name="title" type="text"
                           placeholder="Name Category" value="{{$tag->title}}">
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Зберегти зміни</button>
            </div>
        </form>
    </div>
@endsection
