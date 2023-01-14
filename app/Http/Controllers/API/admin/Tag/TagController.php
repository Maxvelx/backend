<?php

namespace App\Http\Controllers\API\admin\Tag;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Tags\StoreTagRequest;
use App\Http\Requests\Admin\Tags\UpdateTagRequest;
use App\Http\Resources\API\admin\brand\BrandForTagsResource;
use App\Http\Resources\API\admin\tag\TagResource;
use App\Models\BrandAuto;
use App\Models\Tag;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $tags   = Tag::all();
        return TagResource::collection($tags);
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        $brands = BrandAuto::where('parent_id', '!=', 0)->get();

        return BrandForTagsResource::collection($brands);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Admin\Tags\StoreTagRequest  $request
     */
    public function store(StoreTagRequest $request)
    {
        Tag::firstOrCreate($request->validated());

        return response(status: 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     */
    public function show(Tag $tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     */
    public function edit(Tag $tag)
    {
        $brands = BrandAuto::where('parent_id', '!=', 0)->get();

        return ['brands' => BrandForTagsResource::collection($brands),'tag' => $tag];
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Admin\Tags\UpdateTagRequest  $request
     * @param  \App\Models\Tag  $tag
     */
    public function update(UpdateTagRequest $request, Tag $tag)
    {
        $tag->update($request->validated());

        return response(status: 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tag  $tag
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();

        return response(status: 200);
    }
}
