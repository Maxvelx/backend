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
            'id'    => $this->id,
            'title' => $this->title,
            'model' => BrandAuto::where('id', $this->model_id)->value('brand_auto'),
        ];
    }
}
