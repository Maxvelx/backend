@extends('admin.components.layouts.main_layouts')

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Редагування категорії</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{route('category.update', $category)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="card-body col-5">
                <div class="form-group input-group-lg">
                    <label for="category">Ім'я категорії</label>
                    <input class="form-control" id="category" name="name" type="text"
                           placeholder="Name Category" value="{{$category->name}}">
                </div>
                <div class="form-group"><label for="exampleSelectBorder">Вибір до якої належить ця категорія</label>
                    <select class="custom-select form-control-border" name="parent_id" id="exampleSelectBorder">
                        <option value="0">--Головна категорія--</option>
                        @include('admin.category.func.category')
                    </select>
                </div>
                <div class="form-group">
                    @if(!empty($category->image_category))
                        <div>
                            <img src="{{Storage::url($category->image_category)}}" alt="image" class="w-25"> Зараз у
                            категорії таке зображення
                        </div>
                    @endif
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
                <button type="submit" class="btn btn-primary">Зберегти зміни</button>
            </div>
        </form>
    </div>
@endsection
