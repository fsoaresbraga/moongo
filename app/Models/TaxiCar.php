<?php

namespace App\Models;

use App\Models\Traits\UuidTrait;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TaxiCar extends Model
{
    use HasApiTokens, HasFactory, Notifiable, UuidTrait;


    public $incrementing = false;

    protected $keyType = 'uuid';

    protected $table = 'taxi_cars';

    protected $fillable = [
        'id_taxi', 'car_plate', 'car_renamed', 'model', 'year', 'color'
    ];

    public function taxi(){
        return $this->belongsTo(Taxi::class);
    }
}
