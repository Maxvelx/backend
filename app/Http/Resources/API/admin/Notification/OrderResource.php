<?php

namespace App\Http\Resources\API\admin\Notification;

use App\Models\User;
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

            'id'              => $this->id,
            'parts'           => $this->parts,
            'number'          => $this->order_number,
            'user'            => User::where('id', $this->user_id)->value('name'),
            'user_id'         => $this->user_id,
            'time'            => $this->created_at->locale('uk')->isoFormat('DD MMMM YYYY'),
            'timeAgo'         => $this->created_at->locale('uk')->diffForHumans(),
            'delivery_status' => $this->delivery_status,
            'payment_status'  => $this->payment_status,
        ];
    }
}
