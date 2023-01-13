<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BrandAuto extends Model
{
    use HasFactory, SoftDeletes;

    protected $table   = 'brand_autos';
    protected $guarded = false;

    public function parts()
    {
        return $this->belongsToMany(Parts::class, 'brand_parts', 'brand_auto_id', 'part_id');
    }

    public function brandOrModel($parent_id)
    {
        $brand  = [];
        $brands = self::where('id', $parent_id)->get();
        foreach ($brands as $brandItem) {
            $brand = $brandItem;
        }

        return $brand;
    }

    public static function tree()
    {
        $allBrandAutos  = self::all();
        $rootBrandsAuto = $allBrandAutos->where('parent_id', 0);
        self::formatTree($rootBrandsAuto, $allBrandAutos);

        return $rootBrandsAuto;
    }


    private static function formatTree($brandAutos, $allBrandAutos)
    {
        foreach ($brandAutos as $brandAuto) {
            $brandAuto->children = $allBrandAutos->where('parent_id', $brandAuto->id)->values();
            if ( ! empty($brandAuto->children)) {
                self::formatTree($brandAuto->children, $allBrandAutos);
            }
        }
    }
}
