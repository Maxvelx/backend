<?php

namespace App\Http\Controllers\API\client\Parts;

use App\Http\Controllers\Controller;
use App\Http\Resources\API\client\PartsShopResource;
use App\Models\Parts;

class PartsController extends Controller
{
    public function __invoke()
    {
        $parts = Parts::limit(5)
            ->active()
            ->with('images')
            ->latest()
            ->get();

        return PartsShopResource::collection($parts);
    }
}
