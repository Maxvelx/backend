<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BrandParts extends Model
{
    use HasFactory;

    protected $table = 'brand_parts';
    protected $guarded = false;
}
