@extends('shop.components.layouts.main.main')

@section('content')
    @foreach($part->path_images as $image)
        <img src="{{Storage::url($image->path_image)}}">
    @endforeach
@endsection
