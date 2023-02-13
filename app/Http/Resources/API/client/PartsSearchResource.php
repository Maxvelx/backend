<?php

namespace App\Http\Resources\API\client;

use App\Models\Parts;
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
            'id'          => $this->id,
            'part_brand'  => $this->brand_part,
            'part_number' => $this->num_part,
            'part_name'   => $this->name_parts,
            'qty'         => $this->quantity,
            'time'        => $time,
            'price'       => $convert === 1 || $this->is_published === 'true'
                ? Parts::priceWithCoefficient($this)
                : Parts::priceWithCoefficientWoutConvert($this),
            'currency'    => $convert === 1 || $this->is_published === 'true'
                ? '₴' : $this->currencyName,
            'canDelivery' => $canDelivery == 0 ? 'no' : 'yes',
            'label'       => $this->label,
        ];
    }
}
