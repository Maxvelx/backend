<?php

namespace App\Http\Resources\API\client\Category;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
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
            'image' => url(\Storage::url($this->image_category)),
            'name' => $this->name,
        ];
    }
}
