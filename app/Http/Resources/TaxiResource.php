<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use App\Http\Resources\TaxiCarResource;
use App\Http\Resources\TaxiPlaceResource;
use Illuminate\Http\Resources\Json\JsonResource;

class TaxiResource extends JsonResource
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
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'cpf' => $this->cpf,
            'date_birth' => Carbon::parse($this->date_birth)->format('d/m/Y'),
            'gender' => $this->genderOptions[$this->gender],
            'image' => $this->image,
            'hash' => $this->hash,
            'qr_code' => $this->qr_code,
            'status' => $this->statusOptions[$this->status],
            'created_at' => Carbon::parse($this->created_at)->format('d/m/Y'),
            'place' => new TaxiPlaceResource($this->place),
            'car' => new TaxiCarResource($this->car),

        ];
    }
}

