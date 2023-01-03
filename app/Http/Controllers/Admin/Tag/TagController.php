<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Tags\StoreTagRequest;
use App\Http\Requests\Admin\Tags\UpdateTagRequest;
use App\Models\Tag;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $tags = Tag::all();
        return view( 'admin.tags.index', compact('tags') );
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return view('admin.tags.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Admin\Tags\StoreTagRequest  $request
     */
    public function store(StoreTagRequest $request)
    {
        Tag::firstOrCreate( $request->validated() );
        return redirect()->route( 'tags.index' );
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
        return view( 'admin.tags.edit', compact( 'tag' ) );
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
        return redirect()->route( 'tags.index' );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tag  $tag
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();
        return redirect()->back();
    }
}
