<?php

namespace App\Http\Controllers\API\client;

use App\Http\Controllers\Controller;
use App\Http\Requests\Search\app\SearchRequest;
use App\Http\Resources\API\CategoryResource;
use App\Http\Resources\API\client\PartsSearchResource;
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
            ->paginate( 10 , ['*'], 'page', $data['page']);
        foreach( $searchResult as $searchResult1 ) {
            $searchString = $searchResult1['num_oem'];
        }

        if( $searchResult->count() == 1 ) {
            $parts = Parts::where( 'num_oem', $searchString )->paginate(10, ['*'], 'page', $data['page']);
//                ->setPath( '/parts_search' . '?' . 'search=' . $data['search'] );
        } elseif( $searchResult->count() > 1 ) {
            $parts = $searchResult;
        } else {
            return response( [ 'Not found' ] );
        }
//        $parts->appends( $data['search'] );
        return PartsSearchResource::collection( $parts );

    }

}
