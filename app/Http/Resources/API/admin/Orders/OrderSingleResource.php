<?php

namespace App\Http\Resources\API\admin\Orders;

use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderSingleResource extends JsonResource
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

            'id'              => $this->id,
            'parts'           => $this->parts,
            'number'          => $this->order_number,
            'user'            => User::where('id', $this->user_id)->first(),
            'user_id'         => $this->user_id,
            'time'            => $this->created_at->locale('uk')->isoFormat('DD MMMM YYYY'),
            'timeAgo'         => $this->created_at->locale('uk')->diffForHumans(),
            'delivery_status' => $this->delivery_status,
            'payment_status'  => $this->payment_status,
            'viewed'          => $this->viewed,
            'label'           => $this->label,
            'message_order'   => nl2br($this->message_order),
        ];
    }
}
