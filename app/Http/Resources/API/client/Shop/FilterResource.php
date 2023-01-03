<?php

namespace App\Http\Resources\API\client\Shop;

use Illuminate\Http\Resources\Json\JsonResource;

class FilterResource extends JsonResource
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
            'id'        => $this->id,
            'name'      => $this->brand_auto,
            'parent_id' => $this->parent_id,
        ];
    }
}
