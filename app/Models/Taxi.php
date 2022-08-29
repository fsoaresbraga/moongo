<?php

namespace App\Models;

use App\Models\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Taxi extends Authenticatable
{
    use HasFactory, Notifiable, UuidTrait, HasApiTokens;


    public $incrementing = false;

    protected $keyType = 'uuid';

    protected $table = 'taxis';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'cpf', 'phone', 'date_birth', 'gender', 'password',
        'image', 'hash', 'qr_code', 'status', 'accept_lgpd'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password'
    ];


    public $genderOptions = [
        'mas' => 'Masculino',
        'fem' => 'Feminino',
        'out' => 'Outros'
    ];

    public $statusOptions = [
        0 => 'Inativo',
        1 => 'Ativo'
    ];

    public function car() {
        return $this->hasOne(TaxiCar::class);
    }

    public function place() {
        return $this->hasOne(TaxiPlace::class);
    }
}
