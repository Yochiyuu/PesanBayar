<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'restaurant_id',
        'customer_name',
        'table_number',
        'total_price',
        'payment_status',
        'order_status',
        'snap_token',
    ];

  public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }
}