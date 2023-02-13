<?php

namespace App\Http\Controllers\API\client;

use App\Http\Controllers\Controller;
use App\Http\Requests\Search\app\SearchRequest;
use App\Http\Resources\API\client\PartsSearchResource;
use App\Models\Parts;
use App\Models\Replace;
use App\Models\Supplier;

class SearchController extends Controller
{
    public function __invoke(SearchRequest $request)
    {
        $data = $request->validated();


        $replace = Replace::where('numbers', 'LIKE', '%'.','.$data['search'].','.'%')
            ->value('numbers');
        if ($replace) {
            $replace = explode(',', $replace);

            foreach ($replace as $key => $value) {
                $replace_parts[][] = $value;
            }

            $parts_replace = Parts::whereIn('num_part', $replace_parts)
                ->where('num_part', '!=', $data['search'])
                ->orderByRaw('quantity > 0 desc')
                ->orderBy(Supplier::select('delivery_time')
                    ->whereColumn('parts.label', 'suppliers.title'))
                ->paginate(5, ['*'], 'page');

        } else {
            $parts_replace = null;
        }

        if ($parts_replace) {
            return PartsSearchResource::collection($parts_replace);
        }

        return response(['message' => 'Not found']);
    }
}
