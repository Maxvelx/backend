{{--@foreach($brandAutos as $brandAuto)--}}
{{--    <option value="{{$brandAuto->id}}"--}}
{{--            @isset($part->brand->id)--}}
{{--                @if($brandAuto->id == $part->brand->parent_id)--}}
{{--                    selected--}}
{{--            @endif--}}

{{--            @if($brandAuto->id == $part->brand->id)--}}
{{--                disabled--}}
{{--        @endif--}}
{{--        @endisset--}}
{{--    >{{$brandAuto->brand_auto ?? ''}}</option>--}}

{{--    @isset($brandAuto->children)--}}
{{--        @include('admin.parts.func.brand_models',[--}}
{{--            'brandAutos' => $brandAuto->children])--}}
{{--    @endisset--}}

{{--@endforeach--}}

@foreach($brandAutos as $brandAuto)
    <option value="{{$brandAuto->id}}">{{$brandAuto->brand_auto}}</option>
@endforeach
