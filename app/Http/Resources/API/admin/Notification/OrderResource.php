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
            'time'            => Carbon::createFromFormat('Y-m-d H:i:s', $this->created_at)
                ->format('F j, Y'),
            'delivery_status' => $this->delivery_status,
            'payment_status'  => $this->payment_status,
        ];
    }
}
