@extends('admin.components.layouts.main_layouts')

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Редагування користувача {{$user->name}}</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{route('user.update', $user)}}" method="post">
            @csrf
            @method('PATCH')
            <div class="card-body col-5">
                <div class="form-group input-group-lg">
                    <label for="name">Ім'я</label>
                    <input class="form-control" id="name" name="name" type="text"
                           placeholder="Введіть ім'я" value="{{$user->name ?? old('name')}}">
                    @error('name')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group input-group-lg">
                    <label for="email">Email адреса</label>
                    <input class="form-control" id="email" name="email" type="email"
                           placeholder="Введіть електронну адресу" value="{{$user->email ?? old('email')}}">
                    @error('email')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group input-group-lg">
                    <label for="lastname">Фамілія</label>
                    <input class="form-control" id="lastname" name="lastName" type="text"
                           placeholder="Введіть фамілію" value="{{$user->lastName ?? old('lastName')}}">
                    @error('lastname')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group input-group-lg">
                    <label for="patronymic">По батькові</label>
                    <input class="form-control" id="patronymic" name="patronymic" type="text"
                           placeholder="Введіть прізвище" value="{{$user->patronymic ?? old('patronymic')}}">
                    @error('patronymic')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group input-group-lg">
                    <label for="phone_number">Телефон</label>
                    <input class="form-control" id="phone_number" name="phone_number" type="text"
                           placeholder="Введіть телефон" value="{{$user->phone_number ?? old('phone_number')}}">
                    @error('phone_number')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group input-group-lg">
                    <label for="address">Почтова адреса</label>
                    <textarea class="form-control" rows="3" id="address" name="address"
                              placeholder="Введіть одну або декілька адрес для доставки">{{$user->address ?? old('address')}}</textarea>
                    @error('address')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group input-group-lg">
                    <label for="roleId">Вибір привілеїв користувача</label>
                    <select id="roleId" name="roleId" class="custom-select">
                        @foreach($roles as $id => $role)
                            <option {{$user->roleId === $id ? 'selected' : ''}} value="{{$id}}">{{$role}}</option>
                        @endforeach
                    </select>
                    @error('roleId')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>

            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Зберегти</button>
            </div>
        </form>
    </div>
@endsection
