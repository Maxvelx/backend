<?php

namespace App\Http\Controllers\API\client;

use App\Http\Controllers\Controller;
use App\Http\Requests\Search\app\SearchRequest;
use App\Http\Resources\API\client\PartsSearchResource;
use App\Models\Parts;

class SearchOemController extends Controller
{
    public function __invoke(SearchRequest $request)
    {
        $data = $request->validated();

        $parts = Parts::where('num_part', $data['search'])
            ->orderByDesc('quantity')
            ->orderBy('delivery_time')
            ->paginate(5, ['*'], 'page');


        if ($parts->count() > 0) {
            return PartsSearchResource::collection($parts);
        }

        return response(['message' => 'Not found']);
    }
}
