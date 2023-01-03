<?php

namespace App\Http\Controllers\API\client\Parts;

use App\Http\Controllers\Controller;
use App\Http\Resources\API\client\PartsResource;
use App\Models\Parts;

class PartsController extends Controller
{
    public function __invoke()
    {
        $parts = Parts::limit(6)->where('category_id','>',0)->orderBy('id', 'asc')->get();
        return PartsResource::collection($parts);
    }
}
