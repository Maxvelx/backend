<?php

namespace App\Http\Controllers\API\client;

use App\Http\Controllers\Controller;
use App\Http\Requests\Search\app\SearchRequest;
use App\Http\Resources\API\client\PartsSearchResource;
use App\Models\Parts;

class SearchController extends Controller
{
    public function __invoke(SearchRequest $request)
    {
        $data         = $request->validated();
        $searchResult = Parts::where('num_oem', $data['search'])
            ->orWhere('num_part', $data['search'])
            ->paginate(10, ['*'], 'page', $data['page']);

        if ($searchResult->count() > 0) {
            return PartsSearchResource::collection($searchResult);
        }

        return response(['message' => 'Not found']);
    }

}
