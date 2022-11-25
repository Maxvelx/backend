@foreach($categories as $categoryItem)
    <option value="{{$categoryItem->id}}"
            @isset($category->id)
                @if($categoryItem->id == $category->parent_id)
                    selected
            @endif

            @if($categoryItem->id == $category->id)
                disabled
        @endif
        @endisset
    >{{$delimiter ?? ''}}{{$categoryItem->name ?? ''}}</option>

    @isset($categoryItem->children)
        @include('admin.category.func.category',[
            'categories' => $categoryItem->children,
            'delimiter' => ' -- '.$delimiter,
            ])
    @endisset

@endforeach
