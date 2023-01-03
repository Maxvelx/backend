@extends('admin.components.layouts.main_layouts')

@section('content')

    <div class="col-12 py-3 mx-3">
        <a class="btn btn-primary" href="{{route('user.create')}}">Додати нового</a>
    </div>
    <div class="row col-12 mx-2">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Список користувачів</h3>

                    <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="table_search" class="form-control float-right"
                                   placeholder="Search">

                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                        <tr>
                            <th>Взаємодія</th>
                            <th>Ім'я</th>
                            <th>Email адреса</th>
                            <th>Фамілія</th>
                            <th>По батькові</th>
                            <th>Номер телефону</th>
                            <th>Поштова адреса</th>
                            <th>Права</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td class="row"><a href="{{route('user.edit', $user->id)}}"><i
                                            class="text-success fas fa-edit"></i></a>
                                    <form action="{{route('user.destroy', $user->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-danger bg-transparent border-0"
                                                data-toggle="modal" data-target="#modal-danger"><i
                                                class="fas fa-trash-alt"></i></button>
                                    </form>
                                    <a href="{{route('user.show', $user->id)}}"><i class="text-success fas fa-user"></i></a>
                                </td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->lastName}}</td>
                                <td>{{$user->patronymic}}</td>
                                <td>{{$user->phone_number}}</td>
                                <td>{{$user->address}}</td>
                                <td>{{$user->roleName}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                {{$users->render()}}
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection
