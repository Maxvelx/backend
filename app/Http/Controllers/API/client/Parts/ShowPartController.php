<?php

namespace App\Http\Controllers\API\client\Parts;

use App\Http\Controllers\Controller;
use App\Http\Resources\API\client\PartsKitResource;
use App\Http\Resources\API\client\PartsResource;
use App\Models\MaintenanceKit;
use App\Models\Parts;
use App\Models\Replace;
use App\Models\Supplier;
use Illuminate\Support\Facades\DB;

class ShowPartController extends Controller
{
    public function __invoke(Parts $part)
    {
        if (MaintenanceKit::where('kit_id', $part->id)->count() > 0) {
            DB::statement("SET SESSION sql_mode=(SELECT REPLACE(@@sql_mode,'ONLY_FULL_GROUP_BY',''))");

            $parts_on_kit = MaintenanceKit::where('kit_id', $part->id)
                ->groupBy('kit_part_id')
                ->join('parts', 'parts.id', 'maintenance_kits.kit_part_id')
                ->leftJoin('parts_images', 'parts_images.part_id','maintenance_kits.kit_part_id')
                ->select('parts.*', 'parts_images.path_image','kit_part_id', DB::raw('count(kit_part_id) as total'))
                ->get();

            DB::statement("SET sql_mode=(SELECT CONCAT(@@sql_mode, ',ONLY_FULL_GROUP_BY'));");


            return [
                'data'         => new PartsResource($part),
                'parts_on_kit' => PartsKitResource::collection($parts_on_kit),
            ];
        }

        $parts_replace = [];

        $replace = Replace::where('numbers', 'LIKE', '%'.','.$part->num_part.','.'%')
            ->value('numbers');
        if ($replace) {
            $replace = explode(',', $replace);

            foreach ($replace as $key => $value) {
                $replace_parts[][] = $value;
            }
            $parts_replace = Parts::whereIn('num_part', $replace_parts)
                ->where('num_part', '!=', $part->num_part)
                ->with('images')
                ->orderByRaw('quantity > 0 desc')
                ->orderBy(Supplier::select('delivery_time')
                    ->whereColumn('parts.label', 'suppliers.title'))
                ->get();
        }

        $parts_oem = Parts::where('num_part', $part->num_part)
            ->where('id', '!=', $part->id)
            ->with('images')
            ->orderByRaw('quantity > 0 desc')
            ->orderBy(Supplier::select('delivery_time')
                ->whereColumn('parts.label', 'suppliers.title'))
            ->get();


        return [
            'data'      => new PartsResource($part),
            'parts_oem' => PartsResource::collection($parts_oem),
            'replace'   => PartsResource::collection($parts_replace),
        ];
    }

}
