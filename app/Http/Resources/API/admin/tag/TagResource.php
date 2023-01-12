<?php

namespace App\Http\Resources\API\admin\tag;

use App\Models\BrandAuto;
use Illuminate\Http\Resources\Json\JsonResource;

class TagResource extends JsonResource
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
            'title' => $this->title,
            'model' => $this->brand->brand_auto,
            'id'    => $this->id,
        ];
    }
}
