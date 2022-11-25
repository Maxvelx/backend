@extends('admin.components.layouts.main_layouts')

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Додати нову категорію</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{route('category.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card-body col-5">
                <div class="form-group input-group-lg">
                    <label for="category">Імя категорії</label>
                    <input class="form-control" id="category" name="name" type="text"
                           placeholder="Name category" value="{{old('name')}}">
                </div>
                <div class="form-group"><label for="exampleSelectBorder">Вибір до якої належить ця категорія</label>
                    <select class="custom-select form-control-border" name="parent_id" id="exampleSelectBorder">
                        <option value="0">--Головна категорія--</option>
                    @include('admin.category.func.category')
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputFile">Зображення для категорії (не обов'язково)</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" name="image_category" class="custom-file-input" id="exampleInputFile">
                            <label class="custom-file-label" for="exampleInputFile">Виберіть файл</label>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Створити</button>
            </div>
        </form>
    </div>

@endsection
