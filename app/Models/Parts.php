<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Parts extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'parts';

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function brands()
    {
        return $this->belongsToMany(BrandParts::class, 'brand_parts', 'part_id', 'brand_auto_id');
    }

    protected $fillable = [
        'brand_model_auto_id',
        'brand_part',
        'num_part',
        'num_oem',
        'name_parts',
        'quantity',
        'price_1',
        'price_2',
        'category_id',
    ];
}
