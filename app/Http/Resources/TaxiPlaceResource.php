<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TaxiPlaceResource extends JsonResource
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
            'zipcode' => $this->zipcode,
            'address' => $this->address,
            'address_number' => $this->address_number == null ? '' :  $this->address_number,
            'neighborhood' => $this->neighborhood,
            'complement' => $this->complement == null ? '' : $this->complement,
            'state' => $this->state,
            'city' => $this->city,
        ];
    }
}
