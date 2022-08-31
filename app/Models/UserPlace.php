<?php

namespace App\Models;

use App\Models\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserPlace extends Model
{
    use HasFactory, Notifiable, UuidTrait;


    public $incrementing = false;

    protected $keyType = 'uuid';

    protected $table = 'user_places';

    protected $fillable = [
        'user_id', 'zipcode', 'address', 'address_number', 'neighborhood', 'complement', 'state', 'city'
    ];

    public function motorist(){
        return $this->belongsTo(User::class);
    }
}
