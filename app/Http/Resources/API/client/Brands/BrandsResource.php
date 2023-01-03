<?php

namespace App\Http\Resources\API\client\Brands;

use Illuminate\Http\Resources\Json\JsonResource;

class BrandsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray( $request )
    {
        return [
            'id' => $this->id,
            'image' => url(\Storage::url($this->image_brand)),
            'name' => $this->brand_auto,
        ];
    }
}
