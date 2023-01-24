<?php

namespace App\Http\Controllers\API\client\Garage;

use App\Http\Requests\Personal\Garage\StoreGarageRequest;
use App\Http\Requests\Personal\Garage\UpdateGarageRequest;
use App\Http\Resources\API\client\Garage\GarageResource;
use App\Models\Garage;
use Illuminate\Http\Request;

class GarageController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index(Request $request)
    {
        return GarageResource::collection(Garage::latest()->where('user_id', auth()->user()->id)
            ->paginate(5, ['*'], 'page', $request->page));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Personal\Garage\StoreGarageRequest  $request
     *
     */
    public function store(StoreGarageRequest $request)
    {
        if (auth()->user()) {
            $data            = $request->validated();
            $data['user_id'] = auth()->user()->id;

            $this->service->store($data);

            return response(status: 200);
        }

        return response(status: 403);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Garage  $garage
     */
    public function show(Garage $garage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Garage  $garage
     */
    public function edit(Garage $garage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Personal\Garage\UpdateGarageRequest  $request
     * @param  \App\Models\Garage  $garage
     *
     */
    public function update(UpdateGarageRequest $request, Garage $garage)
    {
        if (auth()->user()) {
            $data            = $request->validated();
            $data['user_id'] = auth()->user()->id;

            $this->service->update($data, $garage);

            return response(status: 200);
        }

        return response(status: 403);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Garage  $garage
     */
    public function destroy(Garage $garage)
    {
        if (auth()->user()) {
            if ($garage->image) {
                \Storage::disk('public')->delete($garage->image);
            }
            $garage->delete();

            return response(status: 200);
        }

        return response(status: 403);
    }
}
