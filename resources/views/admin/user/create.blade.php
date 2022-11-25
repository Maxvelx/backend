@extends('admin.components.layouts.main_layouts')

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Додати нового користувача</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{route('user.store')}}" method="post">
            @csrf
            <div class="card-body col-5">
                <div class="form-group input-group-lg">
                    <label for="name">Ім'я</label>
                    <input class="form-control" id="name" name="name" type="text"
                           placeholder="Введіть ім'я" value="{{old('name')}}">
                    @error('name')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group input-group-lg">
                    <label for="email">Email адреса</label>
                    <input class="form-control" id="email" name="email" type="email"
                           placeholder="Введіть електронну адресу" value="{{old('email')}}">
                    @error('email')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group input-group-lg">
                    <label for="password">Пароль</label>
                    <input class="form-control" id="password" name="password" type="password"
                           placeholder="Введіть пароль (не менше 8 символів)" value="{{old('password')}}">
                    @error('password')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group input-group-lg">
                    <label for="password_conf">Підтвердження пароля</label>
                    <input class="form-control" id="password_conf" name="password_confirmation" type="password"
                           placeholder="Підтвердіть пароль" value="{{old('password_confirmation')}}">
                    @error('password_confirmation')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group input-group-lg">
                    <label for="lastname">Фамілія</label>
                    <input class="form-control" id="lastname" name="lastName" type="text"
                           placeholder="Введіть фамілію" value="{{old('lastName')}}">
                    @error('lastname')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group input-group-lg">
                    <label for="patronymic">Прізвище</label>
                    <input class="form-control" id="patronymic" name="patronymic" type="text"
                           placeholder="Введіть прізвище" value="{{old('patronymic')}}">
                    @error('patronymic')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group input-group-lg">
                    <label for="phone_number">Телефон</label>
                    <input class="form-control" id="phone_number" name="phone_number" type="text"
                           placeholder="Введіть телефон" value="{{old('phone_number')}}">
                    @error('phone_number')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group input-group-lg">
                    <label for="address">Почтова адреса</label>
                    <textarea class="form-control" rows="3" id="address" name="address"
                              placeholder="Введіть одну або декілька адрес для доставки">{{old('address')}}</textarea>
                    @error('address')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group input-group-lg">
                    <label for="roleId">Вибір привілеїв користувача</label>
                    <select id="roleId" name="roleId" class="custom-select">
                        @foreach($roles as $id => $role)
                            <option value="{{$id}}">{{$role}}</option>
                        @endforeach
                    </select>
                    @error('roleId')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>

            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Add user</button>
            </div>
        </form>
    </div>

@endsection
