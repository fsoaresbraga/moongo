<?php

namespace App\Models;

use App\Models\UserCar;
use App\Models\UserPlace;
use App\Models\Traits\UuidTrait;
use Laravel\Sanctum\HasApiTokens;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, UuidTrait, HasApiTokens;


    public $incrementing = false;

    protected $keyType = 'uuid';

    protected $table = 'users';

    //protected $fillable = [];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'company_id','name', 'email', 'cpf', 'phone', 'date_birth',
         'gender', 'password','image', 'hash', 'qr_code', 'status', 
         'accept_lgpd'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
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
        return $this->hasOne(UserCar::class);
    }

    public function place() {
        return $this->hasOne(UserPlace::class);
    }

}
