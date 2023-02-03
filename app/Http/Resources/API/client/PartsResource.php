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
        $convert     = null;
        $canDelivery = null;
        $time        = null;

        if ($this->label) {
            $supplier = Supplier::where('title', $this->label)->first();
            if ($supplier) {
                $convert     = $supplier->convert;
                $canDelivery = $supplier->canDelivery;
                $time        = $supplier->delivery_time;
            }
        }


        return [
            'id'              => $this->id,
            'part_brand'      => $this->brand_part,
            'part_number'     => $this->num_part,
            'part_number_oem' => $this->num_oem,
            'part_name'       => $this->name_parts,
            'qty'             => $this->quantity,
            'price'           => $convert === 1 || $this->is_published === 'true'
                ? $this->priceWithCoefficient($this)
                : $this->priceWithCoefficientWoutConvert($this),
            'image'           => $this->imageUrlFirst,
            'currency'        => $convert === 1 || $this->is_published === 'true'
                ? '₴' : $this->currencyName,
            'label'           => $this->label,
            'canDelivery'     => $canDelivery == 0 ? 'no' : 'yes',
            'time'            => $time,
        ];
    }
}
