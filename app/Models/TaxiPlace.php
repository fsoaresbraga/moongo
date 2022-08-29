<?php

namespace App\Models;

use App\Models\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TaxiPlace extends Model
{
    use HasFactory, Notifiable, UuidTrait;


    public $incrementing = false;

    protected $keyType = 'uuid';

    protected $table = 'taxi_places';

    protected $fillable = [
        'id_taxi', 'zipcode', 'address', 'address_number', 'neighborhood', 'complement', 'state', 'city'
    ];

    public function taxi(){
        return $this->belongsTo(Taxi::class);
    }
}
