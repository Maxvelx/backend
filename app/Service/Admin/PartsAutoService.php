<?php

namespace App\Service\Admin;

use App\Models\Parts;

class PartsAutoService
{
    public function store($data)
    {

        try {
            \DB::beginTransaction();

            if(!empty($data['brands'])){
                $brandIds = $data['brands'];
                unset($data['brands']);
            }
            if (!empty($data['image_brand'])) {
                $data['image_brand'] = \Storage::disk('public')->put('/image', $data['image_brand']);
            }

            $part = Parts::firstOrCreate($data);

            if (!empty($brandIds)){
                $part->brands()->attach($brandIds);
            }

            \DB::commit();

        } catch (\Exception $exception) {
            \DB::rollBack();
            abort(500);
        }
    }

    public function update($data, $part)
    {

        try {
            \DB::beginTransaction();

            if(!empty($data['brands'])){
                $brandIds = $data['brands'];
                unset($data['brands']);
            }
            if (!empty($data['image_brand'])) {
                $data['image_brand'] = \Storage::disk('public')->put('/image', $data['image_brand']);
            }

            $part->update($data);

            if (!empty($brandIds)) {
                $part->brands()->sync($brandIds);
            }

            \DB::commit();

        } catch (\Exception $exception) {
            \DB::rollBack();
            abort(500);
        }
    }
}
