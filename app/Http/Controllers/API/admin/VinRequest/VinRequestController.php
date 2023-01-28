<?php

namespace App\Http\Controllers\API\admin\VinRequest;

use App\Http\Controllers\Controller;
use App\Http\Resources\API\admin\VinRequest\VinRequestMainResource;
use App\Models\VinRequest;
use Illuminate\Http\Request;

class VinRequestController extends Controller
{

    public function index()
    {
        $requests = VinRequest::where('viewed', '=', 0)
            ->latest()
            ->paginate(10, ['*'], 'page');

        return VinRequestMainResource::collection($requests);
    }


    public function store(Request $request)
    {
        //
    }

    public function show(VinRequest $vinRequest)
    {
        return new VinRequestMainResource($vinRequest);
    }

    public function update(Request $request, VinRequest $vinRequest)
    {
        $data = $request->validate([
            'viewed' => 'required|integer|max:2',
        ]);

        $vinRequest->update($data);

        return response(status: 200);
    }


    public function destroy(VinRequest $vinRequest)
    {
        $vinRequest->delete();

        return response(status: 200);
    }
}
