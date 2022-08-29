<?php

namespace App\Models;

use App\Models\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductBrand extends Model
{
    use HasFactory, Notifiable, UuidTrait;


    public $incrementing = false;

    protected $keyType = 'uuid';

    protected $table = 'product_brands';

    //protected $fillable = [];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'status'
    ];
}
