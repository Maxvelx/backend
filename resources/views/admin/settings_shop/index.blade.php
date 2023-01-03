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
                <div class="row">
                    <div class="card-body col-3">
                        <div class="form-group input-group-lg">
                            <label for="coef">Націнка для запчастин: 30% = 1.3</label>
                            <input class="form-control" id="coef" name="coef" type="text"
                                   placeholder="Введіть націнку" value="{{$coef}}">
                            @error('coef')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="card-body col-3">
                        <div class="form-group input-group-lg">
                            <label for="usd">Курс USD</label>
                            <input class="form-control" id="usd" name="usd" type="text"
                                   placeholder="Введіть курс USD" value="{{\DB::table ('settings')->value ('usd')}}">
                            @error('usd')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="card-body col-3">
                        <div class="form-group input-group-lg">
                            <label for="euro">Курс EURO</label>
                            <input class="form-control" id="euro" name="euro" type="text"
                                   placeholder="Введіть курс EURO" value="{{\DB::table ('settings')->value ('euro')}}">
                            @error('euro')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Зберегти зміни</button>
                </div>
            </form>
        </div>
    </section>

@endsection
