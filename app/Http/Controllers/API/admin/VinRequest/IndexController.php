<?php

namespace App\Http\Controllers\API\admin\VinRequest;

use App\Http\Resources\API\admin\VinRequest\VinRequestMainResource;
use App\Models\VinRequest;

class IndexController
{
    public function __invoke()
    {
        $requests = VinRequest::latest()->paginate(15, ['*'], 'page');

        return VinRequestMainResource::collection($requests);
    }
}