<?php

namespace App\Http\Resources\API\client;

use Illuminate\Http\Resources\Json\JsonResource;

class PartsSearchResource extends JsonResource
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
            'id'          => $this->id,
            'part_brand'  => $this->brand_part,
            'part_number' => $this->num_part,
            'number_oem'  => $this->num_oem,
            'part_name'   => $this->name_parts,
            'qty'         => $this->quantity,
            'time'        => $this->delivery_time,
            'price'       => $this->convert == 1 || $this->is_published ? $this->getPriceWithCoefficient($this)
                : $this->getPriceWithCoefficientWoutConvert($this),
            'currency'    => $this->is_published ? '₴' : $this->currencyName,
        ];
    }
}
