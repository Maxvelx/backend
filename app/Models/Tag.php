<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table = 'tags';
    protected $guarded = false;

    public function brand()
    {
        return $this->belongsTo(BrandAuto::class, 'model_id', 'id', 'brand_autos');
    }
}
