<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PartsImages extends Model
{
    use HasFactory;

    protected $table = 'parts_images';
    protected $guarded = false;
}
