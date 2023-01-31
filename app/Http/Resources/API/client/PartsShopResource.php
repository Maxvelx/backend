<?php

namespace App\Http\Resources\API\client;

use App\Http\Resources\API\admin\tag\TagResource;
use App\Models\Supplier;
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
        $convert     = Supplier::where('title', $this->label)->value('convert');

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
            'currency'        => $convert === 1 || $this->is_published === 'true'
                ? '₴' : $this->currencyName,
            'label'           => $this->label,
        ];
    }
}
