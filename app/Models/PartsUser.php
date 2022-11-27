<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartsUser extends Model
{
    use HasFactory;

    protected $table = 'parts_users';
    protected $guarded = false;
}
