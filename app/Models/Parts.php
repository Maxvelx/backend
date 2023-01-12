<?php

namespace App\Models;

use App\Http\Controllers\Shop\PriceCurrency;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Parts extends Model
{

    protected $table = 'parts';

    const PRICE_UAH  = 0;
    const PRICE_USD  = 1;
    const PRICE_EURO = 2;

    public static function getCurrencyStatus()
    {
        return [
            self::PRICE_UAH  => 'Гривня',
            self::PRICE_USD  => 'Долар',
            self::PRICE_EURO => 'Євро',
        ];
    }

    public function getCurrencyNameAttribute()
    {
        return self::getCurrencyStatus()[$this->price_currency];
    }

    public function getPrice($part)
    {
        return PriceCurrency::getCurrencyPrice($part);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function brands()
    {
        return $this->belongsToMany(BrandAuto::class, 'brand_parts', 'part_id', 'brand_auto_id');
    }

    public function likes(): HasMany
    {
        return $this->hasMany(PartsUser::class, 'part_id', 'id');
    }

    public function images(): HasMany
    {
        return $this->hasMany(PartsImages::class, 'part_id');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'parts_tags', 'part_id', 'tag_id');
    }

    public function getImageUrlFirstAttribute()
    {
        if ($this->images()->value('path_image') !== null) {
            return url(\Storage::url($this->images()->value('path_image')));
        }

        return 0;
    }


    protected $fillable
        = [
            'brand_model_auto_id',
            'brand_part',
            'num_part',
            'num_oem',
            'name_parts',
            'quantity',
            'price_1',
            'price_2',
            'price_currency',
            'category_id',
            'delivery_time',
            'label',
            'is_published',
        ];
}
