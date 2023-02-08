<?php

namespace App\Http\Controllers\API\admin\Home;

use App\Http\Resources\API\admin\parts\PartsAdminResource;
use App\Models\Parts;
use Illuminate\Support\Facades\DB;

class IndexController
{
    public function __invoke()
    {
        DB::statement("SET SESSION sql_mode=(SELECT REPLACE(@@sql_mode,'ONLY_FULL_GROUP_BY',''))");

        $parts =  Parts::groupBy('id')
            ->join('parts_users', 'parts_users.part_id', '=', 'parts.id')
            ->select('parts.*', DB::raw('count(part_id) as total'))
            ->orderByDesc('total')
            ->get();

        DB::statement("SET sql_mode=(SELECT CONCAT(@@sql_mode, ',ONLY_FULL_GROUP_BY'));");

        return PartsAdminResource::collection($parts);
    }
}