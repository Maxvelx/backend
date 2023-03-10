<?php

namespace App\Http\Controllers\API\admin\Parts;

use App\Http\Requests\Admin\Parts\StorePartsRequest;
use App\Http\Requests\Admin\Parts\UpdatePartsRequest;
use App\Http\Resources\API\admin\parts\PartsAdminResource;
use App\Models\BrandAuto;
use App\Models\BrandParts;
use App\Models\Category;
use App\Models\MaintenanceKit;
use App\Models\Parts;
use App\Models\PartsTag;
use App\Models\Tag;
use Illuminate\Support\Facades\DB;

class PartsController extends BaseController
{

//    public static function forgetCaches($prefix)
//    {
//        // Increase loop if you need, the loop will stop when key not found
//        for ($i = 1; $i < 1000; $i++) {
//            $key = $prefix.$i;
//            if (Cache::has($key)) {
//                Cache::forget($key);
//            } else {
//                break;
//            }
//        }
//    }

    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
//        $parts = Cache::remember('admin_parts'.$page, 60 * 60 * 24, function () {
        $parts = Parts::where('is_published', 'true')
            ->orWhereNull('label')
            ->orderBy('id', 'desc')
            ->paginate(20, ['*'], 'page');

//        });

        return PartsAdminResource::collection($parts);
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

//        self::forgetCaches('admin_parts');

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
        $part_kit         = MaintenanceKit::where('kit_id', $part->id)->pluck('kit_part_id');
        DB::statement("SET SESSION sql_mode=(SELECT REPLACE(@@sql_mode,'ONLY_FULL_GROUP_BY',''))");

        $part_kit_show = MaintenanceKit::where('kit_id', $part->id)
            ->groupBy('kit_part_id')
            ->join('parts', 'parts.id', 'maintenance_kits.kit_part_id')
            ->select('parts.*', 'kit_part_id', DB::raw('count(kit_part_id) as total'))
            ->get();

        DB::statement("SET sql_mode=(SELECT CONCAT(@@sql_mode, ',ONLY_FULL_GROUP_BY'));");

        return [
            'currency'      => $currency,
            'brand'         => $brandAutos,
            'tags'          => $tags,
            'brandIds'      => $brandSelected,
            'tagIds'        => $tagSelected,
            'currencyIds'   => $currencySelected,
            'partCurrent'   => $part,
            'categories'    => $categories,
            'part_kit'      => $part_kit,
            'part_kit_show' => $part_kit_show,
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

//        self::forgetCaches('admin_parts');

        return response(status: 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Parts  $part
     */
    public function destroy(Parts $part)
    {
        MaintenanceKit::where('kit_id', $part->id)->delete();
        $part->brands ? $part->brands()->detach() : false;
        $part->tags ? $part->tags()->detach() : false;
        $part->images ? $part->images()->delete() : false;

        $part->delete();

//        self::forgetCaches('admin_parts');

        return response(status: 200);
    }
}
