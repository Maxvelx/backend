<?php

namespace App\Service\Admin;

use App\Models\BrandAuto;

class BrandAutoService
{
    public function store($data)
    {

        try {
            \DB::beginTransaction();

            if (!empty($data['image_brand'])) {
                $data['image_brand'] = \Storage::disk('public')->put('/image', $data['image_brand']);
            }

            BrandAuto::firstOrCreate($data);

            \DB::commit();

        } catch (\Exception $exception) {
            \DB::rollBack();
            abort(500);
        }
    }

    public function update($data, $brand)
    {

        try {
            \DB::beginTransaction();

            if (!empty($data['image_brand'])) {
                $data['image_brand'] = \Storage::disk('public')->put('/image', $data['image_brand']);
            }
            $brand->update($data);

            \DB::commit();

        } catch (\Exception $exception) {
            \DB::rollBack();
            abort(500);
        }
    }
}
