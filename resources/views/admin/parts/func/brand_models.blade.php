@foreach($brandAutos as $brandAuto)
    <option value="{{$brandAuto->id}}"
            @isset($part->brands)
                @foreach($part->brands as $brand)
                    @if($brandAuto->id === $brand->id)
                        selected
            @endif
            @endforeach
            @endisset
            @if($brandAuto->parent_id === 0)
                disabled
        @endif
    >{{$delimiter ?? ''}}{{$brandAuto->brand_auto ?? ''}}</option>

    @isset($brandAuto->children)
        @include('admin.parts.func.brand_models',[
            'brandAutos' => $brandAuto->children,
            'delimiter' => ' -- '.$delimiter,])
    @endisset

@endforeach
