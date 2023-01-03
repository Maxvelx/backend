@extends('admin.components.layouts.main_layouts')

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Додати новий тег</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{route('tags.store')}}" method="post">
            @csrf
            <div class="card-body col-5">
                <div class="form-group input-group-lg">
                    <label for="brand">Назва тегу</label>
                    <input class="form-control" id="brand" name="title" type="text"
                           placeholder="Назва тегу" value="{{old('tag')}}">
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Додати</button>
            </div>
        </form>
    </div>

@endsection
