<?php

namespace App\Http\Controllers\API\client\Parts;

use App\Http\Controllers\Controller;
use App\Http\Resources\API\client\PartsResource;
use App\Models\Parts;

class ShowPartController extends Controller
{
    public function __invoke(Parts $part)
    {
        return new PartsResource($part);
    }
}
