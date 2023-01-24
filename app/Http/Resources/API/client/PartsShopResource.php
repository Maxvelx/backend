<?php

namespace App\Http\Resources\API\client;

use App\Http\Resources\API\admin\tag\TagResource;
use Illuminate\Http\Resources\Json\JsonResource;

class PartsShopResource extends JsonResource
{

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'              => $this->id,
            'part_brand'      => $this->brand_part,
            'part_number'     => $this->num_part,
            'part_number_oem' => $this->num_oem,
            'part_name'       => $this->name_parts,
            'qty'             => $this->quantity,
            'price'           => $this->getPriceWithCoefficient($this),
            'image'           => $this->imageUrlFirst,
            'tags'            => TagResource::collection($this->tags),
            'currency'        => $this->is_published ? 'грн' : PriceResource::getCurrency($this),
        ];
    }
}
