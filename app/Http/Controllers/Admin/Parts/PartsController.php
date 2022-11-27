<?php

namespace App\Http\Controllers\Admin\Parts;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Parts\StorePartsRequest;
use App\Http\Requests\Admin\Parts\UpdatePartsRequest;
use App\Models\BrandAuto;
use App\Models\Category;
use App\Models\Parts;

class PartsController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $parts = Parts::all();
        return view('admin.parts.index', compact('parts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        $currency = Parts::getCurrencyStatus();
        $brandAutos = BrandAuto::all();
        $categories = Category::tree();
        $delimiter = '';
        return view('admin.parts.create', compact('delimiter', 'categories', 'brandAutos', 'currency'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Admin\Parts\StorePartsRequest  $request
     */
    public function store(StorePartsRequest $request)
    {
        $data = $request->validated();
        $this->service->store($data);
        return redirect()->route('parts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Parts  $part
     */
    public function show(Parts $part)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Parts  $part
     */
    public function edit(Parts $part)
    {
        $currency = Parts::getCurrencyStatus();
        $brandAutos = BrandAuto::all();
        $categories = Category::tree();
        $delimiter = '';
        return view('admin.parts.edit', compact('part','delimiter', 'categories','brandAutos', 'currency'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Admin\Parts\UpdatePartsRequest  $request
     * @param  \App\Models\Parts  $parts
     */
    public function update(UpdatePartsRequest $request, Parts $part)
    {
        $data = $request->validated();
        $this->service->update($data, $part);
        return redirect()->route('parts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Parts  $part
     */
    public function destroy(Parts $part)
    {
        $part->delete();
        return redirect()->route('parts.index');
    }
}
