<?php

namespace App\Http\Resources\API\client;

use App\Models\Parts;
use App\Models\PartsImages;
use App\Models\Supplier;
use Illuminate\Http\Resources\Json\JsonResource;

class PartsKitResource extends JsonResource
{

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
            'id'              => $this->kit_part_id,
            'part_brand'      => $this->brand_part,
            'part_number'     => $this->num_part,
            'part_number_oem' => $this->num_oem,
            'part_name'       => $this->name_parts,
            'qty'             => $this->quantity,
            'price'           => $convert === 1 || $this->is_published === 'true'
                ? Parts::priceWithCoefficient($this)
                : Parts::priceWithCoefficientWoutConvert($this),
            'image'           => Parts::ImageUrlFirst($this),
            'currency'        => $convert === 1 || $this->is_published === 'true'
                ? '₴' : Parts::getCurrencyStatus()[$this->price_currency],
            'label'           => $this->label,
            'canDelivery'     => $canDelivery == 0 ? 'no' : 'yes',
            'time'            => $time,
            'total'           => $this->total,
        ];
    }
}
