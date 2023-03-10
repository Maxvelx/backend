<?php

namespace App\Http\Resources\API\client\Personal;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class UserResource extends JsonResource
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
            'id'               => $this->id,
            'name'             => $this->name,
            'lastName'         => $this->lastName,
            'patronymic'       => $this->patronymic,
            'phone'            => $this->phone_number,
            'email'            => $this->email,
            'address'          => $this->address,
            'delivery_company' => $this->delivery_company,
            'image'            => $this->image ? url(Storage::url($this->image)) : null,
        ];
    }
}
