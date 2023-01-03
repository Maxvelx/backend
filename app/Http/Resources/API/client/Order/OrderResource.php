<?php

namespace App\Http\Resources\API\client\Order;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray( $request )
    {
        return [
            'id'           => $this->id,
            'order_number' => $this->order_number,
            'total_price'  => $this->total_price,
            'parts'        => json_decode( $this->parts ),
            'time'         => Carbon::createFromFormat('Y-m-d H:i:s', $this->created_at)->format('F j, Y'),
        ];
    }
}
