<?php

namespace App\Http\Controllers\API\admin\Search;

use App\Http\Controllers\Controller;
use App\Http\Resources\API\admin\parts\PartsOrderAddResource;
use App\Models\Parts;
use App\Models\Replace;
use Illuminate\Http\Request;

class SearchForOrderController extends Controller
{
    public function __invoke(Request $request)
    {
        $data = $request->validate([
            'keywords' => 'required|string|max:255',
        ]);

        $replace = Replace::where('numbers', 'LIKE', '%'.','.$data['keywords'].','.'%')
            ->value('numbers');
        if ($replace) {
            $replace = explode(',', $replace);

            foreach ($replace as $key => $value) {
                $replace_parts[][] = $value;
            }
            $parts_replace = Parts::whereIn('num_part', $replace_parts)->get();

            return PartsOrderAddResource::collection($parts_replace);
        }

        $parts = Parts::where('num_part', $data['keywords'])->get();

        return PartsOrderAddResource::collection($parts);
    }
}
