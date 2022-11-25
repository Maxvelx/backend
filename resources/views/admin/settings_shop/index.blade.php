@extends('admin.components.layouts.main_layouts')

@section('content')

    <section>
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Налаштування магазину</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{route('settings.update')}}" method="post">
                @csrf
                @method('PATCH')
                <div class="card-body col-5">
                    <div class="form-group input-group-lg">
                        <label for="coef">Націнка для запчастин у форматі: 30% = 1.3</label>
                        <input class="form-control" id="coef" name="coef" type="text"
                               placeholder="Введіть націнку формат: 1.3*" value="{{$coef}}">
                        @error('coef')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Зберегти зміни</button>
                </div>
            </form>
    </section>

@endsection
