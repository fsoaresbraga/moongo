<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TaxiCarResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'car_plate' => $this->car_plate,
            'car_renamed' => $this->car_renamed,
            'model' => $this->model,
            'year' => $this->year,
            'color' => $this->color,
        ];
    }
}
