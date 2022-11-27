@extends('admin.components.layouts.main_layouts')

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Редагувати запчастину {{$part->name_parts}}</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{route('parts.update', $part)}}" method="post">
            @csrf
            @method('PATCH')
            <div class="card-body col-5">
                <div class="form-group input-group-lg">
                    <label for="brand_auto">Бренд автомобіля</label>
                    <select class="custom-select form-control-border" name="brand_model_auto_id" id="brand_auto">
                        <option value="1">Ford</option>
                        <option value="2">Suzuki</option>
                    </select>
                    @error('brand_auto')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group input-group-lg">
                    <label for="brand_part">Бренд запчастини</label>
                    <input class="form-control" id="brand_part" name="brand_part" type="text"
                           placeholder="Введіть ім'я бренду запчастини" value="{{$part->brand_part ?? old('brand_part')}}">
                    @error('brand_part')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group input-group-lg">
                    <label for="num_part">Номер запчастини</label>
                    <input class="form-control" id="num_part" name="num_part" type="text"
                           placeholder="Введіть номер запчастини" value="{{$part->num_part ?? old('num_part')}}">
                    @error('num_part')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group input-group-lg">
                    <label for="num_oem">Номер оригінальний (для аналогів)</label>
                    <input class="form-control" id="num_oem" name="num_oem" type="text"
                           placeholder="Введіть номер оригінальний" value="{{$part->num_oem ?? old('num_oem')}}">
                    @error('num_oem')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group input-group-lg">
                    <label for="name_parts">Назва запчастини</label>
                    <input class="form-control" id="name_parts" name="name_parts" type="text"
                           placeholder="Назва запчастини" value="{{$part->name_parts ?? old('name_parts')}}">
                    @error('name_parts')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group input-group-lg">
                    <label for="quantity">Кількість на складі</label>
                    <input class="form-control" id="quantity" name="quantity" type="text"
                           placeholder="Кількість у наявності" value="{{$part->quantity ?? old('quantity')}}">
                    @error('quantity')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group input-group-lg">
                    <label for="price_currency">Вибір валюти</label>
                    <select id="price_currency" name="price_currency" class="custom-select">
                        @foreach($currency as $id => $currency_id)
                            <option {{$part->price_currency == $id ? 'selected' : ''}} value="{{$id}}">{{$currency_id}}</option>
                        @endforeach
                    </select>
                    @error('price_currency')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group input-group-lg">
                    <label for="price_1">Ціна товару закупочна</label>
                    <input class="form-control" id="price_1" name="price_1" type="text"
                           placeholder="Ціна закупочна" value="{{$part->price_1 ?? old('price_1')}}">
                    @error('price_1')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group input-group-lg">
                    <label for="price_2">Ціна товару для продажу</label>
                    <input class="form-control" id="price_2" name="price_2" type="text"
                           placeholder="Ціна товару для продажу" value="{{$part->price_2 ?? old('price_2')}}">
                    @error('price_2')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group input-group-lg">
                    <label for="category_id">Виберіть категорію товару</label>
                    <select class="custom-select form-control-border" name="category_id" id="category_id">
                        @include('admin.parts.func.category')
                    </select>
                    @error('category_id')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Зберегти зміни</button>
            </div>
        </form>
    </div>
@endsection
