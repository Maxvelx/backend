<?php

namespace App\Http\Resources\API\admin\brand;

use Illuminate\Http\Resources\Json\JsonResource;

class BrandForTagsResource extends JsonResource
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
            'id'    => $this->id,
            'title' => $this->brand_auto,
        ];
    }
}
