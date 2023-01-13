<?php

namespace App\Http\Controllers\API\admin\BrandAuto;

use App\Http\Requests\Admin\BrandAuto\StoreBrandAutoRequest;
use App\Http\Requests\Admin\BrandAuto\UpdateBrandAutoRequest;
use App\Http\Resources\API\admin\brand\BrandsResource;
use App\Models\BrandAuto;

class BrandAutoController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $brandAutos = BrandAuto::all();
        $mainBrand  = BrandAuto::where( 'parent_id', 0 )->get();
        return [ 'data' => $brandAutos, 'main' => $mainBrand ];
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return BrandAuto::where('parent_id', 0)->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\Admin\BrandAuto\StoreBrandAutoRequest $request
     */
    public function store( StoreBrandAutoRequest $request )
    {
        $data = $request->validated();
        $this->service->store( $data );
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\BrandAuto $brand
     */
    public function show( BrandAuto $brand )
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\BrandAuto $brand
     */
    public function edit( BrandAuto $brand )
    {
        $mainBrands = BrandAuto::where('parent_id', 0)->get();
        return [ 'brand'=>  new BrandsResource($brand), 'main' => BrandsResource::collection($mainBrands)];
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\Admin\BrandAuto\UpdateBrandAutoRequest $request
     * @param \App\Models\BrandAuto $brand
     */
    public function update( UpdateBrandAutoRequest $request, BrandAuto $brand )
    {
        $data = $request->validated();
        $this->service->update( $data, $brand );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\BrandAuto $brand
     */
    public function destroy( BrandAuto $brand )
    {
        $brand->delete();
    }
}
