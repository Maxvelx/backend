@extends('admin.components.layouts.main_layouts')

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Редагування категорії</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{route('brands.update', $brand)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="card-body col-5">
                <div class="form-group input-group-lg">
                    <label for="category">Ім'я категорії</label>
                    <input class="form-control" id="category" name="brand_auto" type="text"
                           placeholder="Name Category" value="{{$brand->brand_auto}}">
                </div>
                <div class="form-group"><label for="exampleSelectBorder">Вибір до якої належить ця категорія</label>
                    <select class="custom-select form-control-border" name="parent_id" id="exampleSelectBorder">
                        <option value="0">--Головна категорія--</option>
                        @include('admin.brands.func.models')
                    </select>
                </div>
                <div class="form-group">
                    @if(!empty($brand->image_brand))
                        <div>
                            <img src="{{Storage::url($brand->image_brand)}}" alt="image" class="w-25"> Зараз у
                            бренду або моделі таке зображення
                        </div>
                    @endif
                    <label for="exampleInputFile">Зображення для бренду або моделі (не обов'язково)</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" name="image_brand" class="custom-file-input" id="exampleInputFile">
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
