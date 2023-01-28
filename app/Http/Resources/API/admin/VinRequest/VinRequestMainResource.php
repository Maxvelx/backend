<?php

namespace App\Http\Resources\API\admin\VinRequest;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class VinRequestMainResource extends JsonResource
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
            'id'         => $this->id,
            'name'       => $this->user_id ? User::where('id', $this->user_id)->value('name')
                : $this->name,
            'user_id'    => $this->user_id,
            'time'       => $this->created_at->diffForHumans(),
            'phone'      => $this->phone_number,
            'vin_number' => $this->vin_number,
            'email'      => $this->email,
            'parts'      => nl2br($this->request_parts),
        ];
    }
}
