<?php

namespace App\Service\Admin;

use App\Models\MaintenanceKit;
use App\Models\Parts;
use App\Models\PartsImages;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class PartsAutoService
{

    private $brandIds;
    private $imageIds;
    private $tagsIds;
    private $kit_part_id;

    public function setPriceShow($data)
    {
        return Parts::priceWithCoefficient($data);
    }

    public function checkEmptyAndUnsetIfNot($data)
    {
        if (!empty($data['brands'])) {
            $this->brandIds = $data['brands'];
            unset($data['brands']);
        }
        if (!empty($data['image'])) {
            $this->imageIds = $data['image'];
            unset($data['image']);
        }
        if (!empty($data['tags'])) {
            $this->tagsIds = $data['tags'];
            unset($data['tags']);
        }
        if (!empty($data['parts_kit_id'])) {
            $this->kit_part_id = $data['parts_kit_id'];
            unset($data['parts_kit_id']);
        }

        return $data;
    }

    public function store($data)
    {
        try {
            DB::beginTransaction();

            $data = $this->checkEmptyAndUnsetIfNot($data);

            $data['price_show'] = $this->setPriceShow($data);

            $part = Parts::firstOrCreate($data);

            if (!empty($this->brandIds)) {
                $part->brands()->attach($this->brandIds);
            }
            if (!empty($this->tagsIds)) {
                $part->tags()->attach($this->tagsIds);
            }
            if (!empty($this->kit_part_id)) {
                $part->maintenanceKit()->attach($this->kit_part_id);
            }
//            if (!empty($this->imageIds)) {
//                foreach ($this->imageIds as $image) {
//                    $image = Storage::disk('public')->put('/image/parts', $image);
//                    PartsImages::firstOrCreate(['path_image' => $image, 'part_id' => $part['id']]);
//                }
//            }
            if (!empty($this->imageIds)) {
                foreach ($this->imageIds as $image) {
                    $path = $image->hashName();
                    Image::make($image)->resize(550, null, function ($constraint) {
                        $constraint->aspectRatio();
                    })->save(storage_path('app/public/image/parts/'.$path));
                    PartsImages::firstOrCreate(['path_image' => '/image/parts/'.$path, 'part_id' => $part['id']]);
                }
            }

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }
    }

    public function update($data, $part)
    {
        try {
            DB::beginTransaction();

        $data = $this->checkEmptyAndUnsetIfNot($data);

        $data['price_show'] = $this->setPriceShow($data);

        $part->update($data);

        if (!empty($this->brandIds)) {
            $part->brands()->sync($this->brandIds);
        }
        if (!empty($this->tagsIds)) {
            $part->tags()->sync($this->tagsIds);
        }
        if (!empty($this->kit_part_id)) {
            MaintenanceKit::where('kit_id', $part->id)->delete();
            $part->maintenanceKit()->attach($this->kit_part_id);
        }

        if (!empty($this->imageIds)) {
            $partImages = PartsImages::where('part_id', $part->id)->pluck('path_image');
            foreach ($partImages as $partImage) {
                Storage::disk('public')->delete($partImage);
            }
            $part->images()->delete();
            foreach ($this->imageIds as $image) {
                $path  = $image->hashName();
                Image::make($image)->resize(550, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->save(storage_path('app/public/image/parts/'.$path));
                PartsImages::firstOrCreate([
                    'path_image' => '/image/parts/'.$path, 'part_id' => $part->id,
                ]);
            }
        }

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }
    }
}
