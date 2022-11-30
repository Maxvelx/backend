@extends('shop.components.layouts.main.main')

@section('content')
    <div class="row py-5 px-5 justify-content-center">
        @foreach($rootCategories as $rootCategory)
            <a href="{{route('shop.category.show', $rootCategory)}}"><img src="{{Storage::url($rootCategory->image_category)}}" alt="image" class="w-25"></a>
        @endforeach
    </div>

@endsection
