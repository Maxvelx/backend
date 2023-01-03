@extends('admin.components.layouts.main_layouts')

@section('content')
    @if(session('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
    @endif
@endsection
