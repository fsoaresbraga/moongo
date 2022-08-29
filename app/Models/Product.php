<?php

namespace App\Models;

use App\Models\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory, Notifiable, UuidTrait;


    public $incrementing = false;

    protected $keyType = 'uuid';

    protected $table = 'products';

    //protected $fillable = [];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category_id', 'brand_id', 'sku', 'title', 'cost_price', 'average_cost', 'price'
    ];
}
