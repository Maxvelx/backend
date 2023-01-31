<?php

namespace App\Http\Controllers\API\client\Parts;

use App\Http\Controllers\Controller;
use App\Http\Resources\API\client\PartsResource;
use App\Models\Parts;
use App\Models\Replace;

class ShowPartController extends Controller
{
    public function __invoke(Parts $part)
    {
        $replace = Replace::where('numbers', 'LIKE', '%'.','.$part->num_part.','.'%')
            ->value('numbers');
        if ($replace) {
            $replace = explode(',', $replace);

            foreach ($replace as $key => $value) {
                $replace_parts[][] = $value;
            }
            $parts_replace = Parts::whereIn('num_part', $replace_parts)
                ->orderByDesc('quantity')
                ->orderBy('delivery_time')
                ->get();


        } else {
            $parts_replace = Parts::where('num_part', $part->num_part)
                ->orderByDesc('quantity')
                ->orderBy('delivery_time')
                ->get();
        }

        return [
            'data'    => new PartsResource($part),
            'replace' => PartsResource::collection($parts_replace),
        ];
    }
}
