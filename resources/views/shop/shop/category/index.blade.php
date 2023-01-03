@extends('shop.components.layouts.main.main')

@section('content')
    <div class="container py-md-8">
        <div class="row">
            @foreach($rootCategories as $rootCategory)
                <div class="col-md-3"><a href="{{route('shop.category.show', $rootCategory)}}">
                        <img src="{{Storage::url($rootCategory->image_category)}}"
                             style="width: 240px; height: 150px;" alt="">
                    </a>
                    <p class="h5">{{$rootCategory->name}}</p>
                </div>
            @endforeach
        </div>
    </div>
@endsection
