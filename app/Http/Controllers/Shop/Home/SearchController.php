<?php

namespace App\Http\Controllers\Shop\Home;

use App\Http\Controllers\Controller;
use App\Http\Requests\Search\app\SearchRequest;
use App\Models\Parts;

class SearchController extends Controller
{
    public function __invoke( SearchRequest $request )
    {
        $data         = $request->validated();
        $searchResult = Parts::where( 'num_oem', 'LIKE', '%' . $data['search'] . '%' )
            ->orWhere( 'num_part', 'LIKE', '%' . $data['search'] . '%' )
            ->orWhere( 'brand_part', 'LIKE', '%' . $data['search'] . '%' )
            ->orWhere( 'name_parts', 'LIKE', '%' . $data['search'] . '%' )
            ->paginate( 10 )
            ->setPath( '/parts_search' . '?' . 'search=' . $data['search'] );
        foreach( $searchResult as $searchResult1 ) {
            $searchString = $searchResult1['num_oem'];
        }

        if( $searchResult->count() == 1 ) {
            $parts = Parts::where( 'num_oem', $searchString )->paginate( 10 )
                ->setPath( '/parts_search' . '?' . 'search=' . $data['search'] );
        } elseif( $searchResult->count() > 1 ) {
            $parts = $searchResult;
        } else {
            return redirect()->route( 'shop.home.index' )->with( 'message', 'За цим запитом нічого не знайдено' );
        }
        $parts->appends( $data['search'] );
        return view( 'shop.search.index', compact( 'parts' ) );

    }

}
