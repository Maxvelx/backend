<?php

namespace App\Http\Resources\API\client;

use App\Models\Supplier;
use Illuminate\Http\Resources\Json\JsonResource;

class PartsResource extends JsonResource
{

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public
    function toArray(
        $request
    ) {
        $canDelivery = Supplier::where('title', $this->label)->value('canDelivery');

        return [
            'id'              => $this->id,
            'part_brand'      => $this->brand_part,
            'part_number'     => $this->num_part,
            'part_number_oem' => $this->num_oem,
            'part_name'       => $this->name_parts,
            'qty'             => $this->quantity,
            'price'           => $this->getPriceWithCoefficient($this),
            'image'           => $this->imageUrlFirst,
            'currency'        => PriceResource::getCurrency($this),
            'label'           => $this->label,
            'canDelivery'     => $canDelivery == 0 ? 'no' : 'yes',
        ];
    }
}
