<?php

namespace App\Http\Controllers\API\client;

use App\Http\Controllers\Controller;
use App\Http\Requests\Search\app\SearchRequest;
use App\Http\Resources\API\client\PartsSearchResource;
use App\Models\Parts;
use App\Models\Supplier;

class SearchOemController extends Controller
{
    public function __invoke(SearchRequest $request)
    {
        $data = $request->validated();

        $parts = Parts::where('num_part', $data['search'])
            ->orderByRaw('quantity > 0 desc')
            ->orderBy(Supplier::select('delivery_time')
                ->whereColumn('parts.label', 'suppliers.title'))
            ->paginate(7, ['*'], 'page');


        if ($parts->count() > 0) {
            return PartsSearchResource::collection($parts);
        }

        return response(['message' => 'Not found']);
    }
}
