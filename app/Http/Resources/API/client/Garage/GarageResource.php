<?php

namespace App\Http\Resources\API\client\Garage;

use Illuminate\Http\Resources\Json\JsonResource;

class GarageResource extends JsonResource
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
            'power'        => $this->power,
            'vincode'      => $this->vincode,
            'color'        => $this->color,
            'model'        => $this->model,
            'engine'       => $this->engine,
            'year'         => $this->year,
            'body'         => $this->body,
            'transmission' => $this->transmission,
            'drive'        => $this->drive,
            'packageAuto'  => $this->packageAuto,
            'image'        => $this->image ? url(\Storage::url($this->image)) : 0,
        ];
    }
}
