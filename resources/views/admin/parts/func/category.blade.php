@foreach($categories as $categoryItem)
    <option value="{{$categoryItem->id}}"
            @isset($part->category->id)
                @if($categoryItem->id == $part->category->id)
                    selected
            @endif
        @endisset
    >{{$delimiter ?? ''}}{{$categoryItem->name ?? ''}}</option>

    @isset($categoryItem->children)
        @include('admin.parts.func.category',[
            'categories' => $categoryItem->children,
            'delimiter' => ' -- '.$delimiter,
            ])
    @endisset

@endforeach
