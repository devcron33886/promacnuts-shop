<?php

namespace App\Models;

use App\Enums\OrderStatus;
use Cknow\Money\Money;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected array $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    protected $casts=[
        'created_at'=>'datetime',
        'updated_at'=>'datetime',
        'deleted_at'=>'datetime',
        'status'=>OrderStatus::class,
    ];

    protected $fillable = [
        'name',
        'slug',
        'image',
        'description',
        'price',
        'measure',
        'status',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function formattedPrice(): Money
    {
        return Money::RWF($this->price);
    }
}
