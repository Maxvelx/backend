<?php

namespace App\Http\Controllers\Admin\BrandAuto;

use App\Http\Requests\Admin\BrandAuto\StoreBrandAutoRequest;
use App\Http\Requests\Admin\BrandAuto\UpdateBrandAutoRequest;
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
        return view('admin.brands.index', compact('brandAutos'));

    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        $brandAutos = BrandAuto::tree();
        $delimiter  = '';
        return view('admin.brands.create', compact('brandAutos', 'delimiter'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\Admin\BrandAuto\StoreBrandAutoRequest $request
     */
    public function store(StoreBrandAutoRequest $request)
    {
        $data = $request->validated();
        $this->service->store($data);
        return redirect()->route('brands.index');

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\BrandAuto $brand
     */
    public function show(BrandAuto $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\BrandAuto $brand
     */
    public function edit(BrandAuto $brand)
    {
        $brandAutos = BrandAuto::tree();
        $delimiter  = '';
        return view('admin.brands.edit', compact('brandAutos', 'delimiter', 'brand'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\Admin\BrandAuto\UpdateBrandAutoRequest $request
     * @param \App\Models\BrandAuto $brand
     */
    public function update(UpdateBrandAutoRequest $request, BrandAuto $brand)
    {
        $data = $request->validated();
        $this->service->update($data, $brand);
        return redirect()->route('brands.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\BrandAuto $brand
     */
    public function destroy(BrandAuto $brand)
    {
        $brand->delete();
        return redirect()->route('brands.index');
    }
}
