<?php

namespace App\Http\Controllers\API\client\Parts;

use App\Http\Controllers\Controller;
use App\Http\Resources\API\client\PartsResource;
use App\Models\Parts;

class PartsController extends Controller
{
    public function __invoke()
    {
        $parts = Parts::limit(6)
            ->active()
            ->latest()
            ->get();

        return PartsResource::collection($parts);
    }
}
