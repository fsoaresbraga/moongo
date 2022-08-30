<?php

namespace App\Models;

use App\Models\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Movement extends Model
{
    use HasFactory, Notifiable, UuidTrait;


    public $incrementing = false;

    protected $keyType = 'uuid';

    protected $table = 'movements';

    //protected $fillable = [];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'taxi_id', 'origin_id', 'destination_id', 'category_movement_id', 'type_movement_id',
        'product_id', 'bar_code', 'quantity', 'expiration', 'cost'
    ];


    public function product() {
        return $this->belongsTo(Product::class);
    }

    public function origin() {
        return $this->belongsTo(Origin::class);
    }

    public function destination() {
        return $this->belongsTo(Destination::class);
    }

    public function categoryMovement() {
        return $this->belongsTo(CategoryMovement::class);
    }

    public function typeMovement() {
        return $this->belongsTo(TypeMovement::class);
    }
}

