<?php

namespace App\Models;

use App\Models\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Company extends Model
{
    use HasFactory, UuidTrait;


    public $incrementing = false;

    protected $keyType = 'uuid';

    public $timestamps = false;

    protected $table = 'companies';

    protected $fillable = [
        'name', 'code', 'cnpj', 'zipcode', 'address', 'address_number',
        'neighborhood', 'complement', 'state', 'city', 'status'
    ];
}

