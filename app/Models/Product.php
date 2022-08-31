<?php

namespace App\Models;

use App\Models\ProductBrand;
use App\Models\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory, Notifiable, UuidTrait, SoftDeletes;


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
        'category_id', 'brand_id', 'sku', 'title', 'cost', 'last_purchase_cost', 'average_cost',
         'sale_price', 'user_delete'
    ];


    public function brand() {
        return $this->belongsTo(ProductBrand::class);
    }

    public function category() {
        return $this->belongsTo(ProductCategory::class);
    }
}


