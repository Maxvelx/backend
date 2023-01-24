<?php

namespace App\Service\Client;

use App\Models\Garage;
use Intervention\Image\Facades\Image;

class GarageAutoService
{
    public function store($data)
    {
        try {
            \DB::beginTransaction();

            if ( ! empty($data['image'])) {
                $image = $data['image'];
                $path  = $image->hashName();

                Image::make($image)->resize(null, 400, function ($constraint) {
                    $constraint->aspectRatio();
                })->save(storage_path('app/public/image/garage/'.$path));

                $data['image'] = 'image/garage/'.$path;
            }

            Garage::firstOrCreate($data);

            \DB::commit();
        } catch (\Exception $exception) {
            \DB::rollBack();
            abort(500);
        }
    }

    public function update($data, $garage)
    {
        try {
            \DB::beginTransaction();

            if ( ! empty($data['image'])) {
                $image = $data['image'];
                $path  = $image->hashName();
                if ($garage->image) {
                    \Storage::disk('public')->delete($garage->image);
                }
                Image::make($image)->resize(null, 400, function ($constraint) {
                    $constraint->aspectRatio();
                })->save(storage_path('app/public/image/garage/'.$path));
                $data['image'] = 'image/garage/'.$path;
            }
            $garage->update($data);

            \DB::commit();
        } catch (\Exception $exception) {
            \DB::rollBack();
            abort(500);
        }
    }
}
