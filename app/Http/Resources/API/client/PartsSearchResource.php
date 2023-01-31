<?php

namespace App\Http\Resources\API\client;

use App\Models\Supplier;
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
        $canDelivery = Supplier::where('title', $this->label)->value('canDelivery');
        $convert     = Supplier::where('title', $this->label)->value('convert');

        return [
            'id'          => $this->id,
            'part_brand'  => $this->brand_part,
            'part_number' => $this->num_part,
            'part_name'   => $this->name_parts,
            'qty'         => $this->quantity,
            'time'        => $this->delivery_time,
            'price'       => $convert === 1 || $this->is_published === 'true'
                ? $this->getPriceWithCoefficient($this)
                : $this->getPriceWithCoefficientWoutConvert($this),
            'currency'    => $convert === 1 || $this->is_published === 'true'
                ? '₴' : $this->currencyName,
            'canDelivery' => $canDelivery == 0 ? 'no' : 'yes',
            'label'       => $this->label,
        ];
    }
}
