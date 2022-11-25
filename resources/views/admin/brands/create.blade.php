@extends('admin.components.layouts.main_layouts')

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Додати новий бренд або модель автомобіля</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{route('brands.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card-body col-5">
                <div class="form-group input-group-lg">
                    <label for="brand">Імя бренду або моделі</label>
                    <input class="form-control" id="brand" name="brand_auto" type="text"
                           placeholder="Назва моделі або бренду" value="{{old('brand_auto')}}">
                </div>
                <div class="form-group"><label for="exampleSelectBorder">Якщо модель - вибір бренду</label>
                    <select class="custom-select form-control-border" name="parent_id" id="exampleSelectBorder">
                        <option value="0">--Це бренд автомобіля--</option>
                    @include('admin.brands.func.models')
                    </select>
                </div>
                <div class="form-group">
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
                <button type="submit" class="btn btn-primary">Додати в базу</button>
            </div>
        </form>
    </div>

@endsection
