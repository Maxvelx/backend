<?php

namespace App\Models;

use App\Http\Controllers\PriceCoefCurrency;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Parts extends Model
{
    protected $table   = 'parts';
    protected $guarded = false;


    const PRICE_UAH  = 0;
    const PRICE_USD  = 1;
    const PRICE_EURO = 2;
    const PRICE_UNDF = '';

    public static function getCurrencyStatus()
    {
        return [
            self::PRICE_UAH  => '₴',
            self::PRICE_USD  => '$',
            self::PRICE_EURO => '€',
            self::PRICE_UNDF => '',
        ];
    }

    public function getCurrencyNameAttribute()
    {
        return self::getCurrencyStatus()[$this->price_currency];
    }

    public static function priceWithCoefficient($part)
    {
        return PriceCoefCurrency::getPriceWithCoef($part);
    }

    public static function priceWithCoefficientWoutConvert($part)
    {
        return PriceCoefCurrency::getPriceWithCoefWoutConvert($part);
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

    public function maintenanceKit()
    {
        return $this->belongsToMany(MaintenanceKit::class, 'maintenance_kits','kit_id', 'kit_part_id');
    }

    public function getImageUrlFirstAttribute()
    {
        $image = $this->images->value('path_image');
        if ($image !== null) {
            return url(\Storage::url($image));
        }

        return 0;
    }

    public static function ImageUrlFirst($part)
    {
        $image = PartsImages::where('part_id', $part->kit_part_id)->value('path_image');
        if ($image !== null) {
            return url(\Storage::url($image));
        }

        return 0;
    }

//    protected $fillable
//        = [
//            'brand_model_auto_id',
//            'brand_part',
//            'num_part',
//            'num_oem',
//            'name_parts',
//            'quantity',
//            'price_1',
//            'price_2',
//            'price_currency',
//            'category_id',
//            'delivery_time',
//            'label',
//            'is_published',
//            'price_show',
//        ];

    public function scopeActive($query)
    {
        return $query->where('is_published', 'true');
    }

    public function scopeCategoryFilter($query, $data)
    {
        return $query->when(isset($data['category_id']), function ($query) use ($data) {
            $query->where('category_id', $data['category_id']);
        });
    }

    public function scopeTagsFilter($query, $data)
    {
        return $query->when(count($data['tags']) > 0, function ($query) use ($data) {
            $query->whereHas('tags', function ($query) use ($data) {
                $query->whereIn('tag_id', $data['tags']);
            });
        });
    }

    public function scopeSortPriceAsc($query, $data)
    {
        return $query->when(isset($data['orderBy']) && $data['orderBy'] == 1, function ($query) {
            $query->orderBy('price_show');
        });

    }


    public function scopeSortPriceDesc($query, $data)
    {
        return $query->when(isset($data['orderBy']) && $data['orderBy'] == 2, function ($query) {
            $query->orderByDesc('price_show');
        });
    }

    public function scopeNewest($query, $data)
    {
        return $query->when(isset($data['orderBy']) && $data['orderBy'] == 3, function ($query) {
            $query->latest();
        });
    }

}
