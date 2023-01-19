<?php

namespace App\Http\Controllers\API\admin\Parts;

use App\Http\Requests\Admin\Parts\StorePartsRequest;
use App\Http\Requests\Admin\Parts\UpdatePartsRequest;
use App\Http\Resources\API\client\PartsResource;
use App\Models\BrandAuto;
use App\Models\BrandParts;
use App\Models\Category;
use App\Models\Parts;
use App\Models\PartsImages;
use App\Models\PartsTag;
use App\Models\Tag;
use Illuminate\Support\Facades\Cache;

class PartsController extends BaseController
{

    public static function forgetCaches($prefix)
    {
        // Increase loop if you need, the loop will stop when key not found
        for ($i = 1; $i < 1000; $i++) {
            $key = $prefix.$i;
            if (Cache::has($key)) {
                Cache::forget($key);
            } else {
                break;
            }
        }
    }

    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $page  = request()->page;
        $parts = Cache::remember('admin_parts'.$page, 60 * 60 * 24, function () {
            return Parts::orderBy('id', 'desc')->paginate(20, ['*'], 'page');
        });

        return PartsResource::collection($parts);
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        $currency   = Parts::getCurrencyStatus();
        $brandAutos = BrandAuto::where('parent_id', '>', 0)->get(['id', 'brand_auto']);
        $tags       = Tag::get(['id', 'title']);
        $categories = Category::get(['id', 'name']);

        return [
            'currency'   => $currency,
            'brand'      => $brandAutos,
            'tags'       => $tags,
            'categories' => $categories,
        ];
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
        self::forgetCaches('admin_parts');

        return response(status: 200);
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
        $currency         = Parts::getCurrencyStatus();
        $brandAutos       = BrandAuto::where('parent_id', '>', 0)->get(['id', 'brand_auto']);
        $tags             = Tag::get(['id', 'title']);
        $categories       = Category::get(['id', 'name']);
        $brandSelected    = BrandParts::where('part_id', $part->id)->get('brand_auto_id');
        $tagSelected      = PartsTag::where('part_id', $part->id)->get('tag_id');
        $currencySelected = $part->price_currency;

        return [
            'currency'    => $currency,
            'brand'       => $brandAutos,
            'tags'        => $tags,
            'brandIds'    => $brandSelected,
            'tagIds'      => $tagSelected,
            'currencyIds' => $currencySelected,
            'partCurrent' => $part,
            'categories'  => $categories,
        ];
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
        self::forgetCaches('admin_parts');

        return response(status: 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Parts  $part
     */
    public function destroy(Parts $part)
    {
        $part->tags()->detach();
        $part->images()->delete();
        $part->brands()->delete();
        $part->likes()->delete();
        $part->delete();
        self::forgetCaches('admin_parts');

        return response(status: 200);
    }
}
