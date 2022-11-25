@foreach($brandAutos as $brandAuto)
    <option value="{{$brandAuto->id}}"
            @isset($brand->id)
                @if($brandAuto->id == $brand->parent_id)
                    selected
            @endif

            @if($brandAuto->id == $brand->id)
                disabled
        @endif
        @endisset
    >{{$delimiter ?? ''}}{{$brandAuto->brand_auto ?? ''}}</option>

    @isset($brandAuto->children)
        @include('admin.brands.func.models',[
            'brandAutos' => $brandAuto->children,
            'delimiter' => ' -- '.$delimiter,
            ])
    @endisset

@endforeach
