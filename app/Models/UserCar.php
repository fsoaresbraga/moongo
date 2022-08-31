<?php

namespace App\Models;

use App\Models\Traits\UuidTrait;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserCar extends Model
{
    use HasApiTokens, HasFactory, Notifiable, UuidTrait;


    public $incrementing = false;

    protected $keyType = 'uuid';

    protected $table = 'taxi_cars';

    protected $fillable = [
        'user_id', 'car_plate', 'car_renamed', 'model', 'year', 'color'
    ];

    public function motorist(){
        return $this->belongsTo(User::class);
    }
}
