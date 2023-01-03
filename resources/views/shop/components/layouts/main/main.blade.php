<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title')</title>
    <base href="{{asset('/')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @include('shop.components.layouts.asset.stylesheet')
</head>
<body>
@include('shop.components.layouts.header')
@include('shop.components.layouts.mobile')
@yield('content')
@include('shop.components.layouts.footer')
@include('shop.components.layouts.asset.script')
</body>
</html>
