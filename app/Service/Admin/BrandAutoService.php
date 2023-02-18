<?php

namespace App\Service\Admin;

use App\Models\BrandAuto;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class BrandAutoService
{
    public function store($data)
    {
        try {
            DB::beginTransaction();

            if ( ! empty($data['image_brand'])) {
                $image = $data['image_brand'];
                $path  = $image->hashName();

                Image::make($image)->resize(null, 240, function ($constraint) {
                    $constraint->aspectRatio();
                })->save(storage_path('app/public/image/'.$path));

                $data['image_brand'] = 'image/'.$path;
            }

            BrandAuto::firstOrCreate($data);

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }
    }

    public function update($data, $brand)
    {
        try {
            DB::beginTransaction();

            if ( ! empty($data['image_brand'])) {
                $image = $data['image_brand'];
                $path  = $image->hashName();
                Storage::disk('public')->delete($brand->image_brand);
                Image::make($image)->resize(null, 240, function ($constraint) {
                    $constraint->aspectRatio();
                })->save(storage_path('app/public/image/'.$path));
                $data['image_brand'] = 'image/'.$path;
            }
            $brand->update($data);

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }
    }
}
