<?php

namespace App\Models;

use App\Http\Controllers\Shop\PriceCurrency;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Parts extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'parts';

    const PRICE_UAH  = 0;
    const PRICE_USD  = 1;
    const PRICE_EURO = 2;

    public static function getCurrencyStatus()
    {
        return [
            self::PRICE_UAH  => 'Гривня',
            self::PRICE_USD  => 'Доллар',
            self::PRICE_EURO => 'Євро',
        ];
    }

    public function getCurrencyNameAttribute()
    {
        return self::getCurrencyStatus()[$this->price_currency];
    }

    public function getPrice($part)
    {
        return PriceCurrency::getСurrencyPrice($part);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function brands()
    {
        return $this->belongsToMany(BrandParts::class, 'brand_parts', 'part_id', 'brand_auto_id');
    }

    public function likes()
    {
        return $this->hasMany(PartsUser::class, 'part_id', 'id');
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
        'price_currency',
        'category_id',
    ];
}
