<?php

namespace App\Http\Resources\API\client\Order;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
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
            'id'           => $this->id,
            'order_number' => $this->order_number,
            'parts'        => json_decode($this->parts),
            'time'         => $this->created_at->locale('uk')->isoFormat('DD MMMM YYYY'),
            'label'        => $this->label,
        ];
    }
}
