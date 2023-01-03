@extends('admin.components.layouts.main_layouts')

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Додати нову категорію</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{route('import.parts')}}" method="post" enctype="multipart/form-data">
            @csrf
                <div class="form-group">
                    <label for="exampleInputFile">Зображення для категорії (не обов'язково)</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" name="file_import" class="custom-file-input" id="exampleInputFile">
                            <label class="custom-file-label" for="exampleInputFile">Виберіть файл</label>
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
