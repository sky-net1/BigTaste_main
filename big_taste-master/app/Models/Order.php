<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'address',
        'latitude',
        'longitude',
        'amount',
        'payment_method',
        'delivery_method',
        'delivery_instruction',
    ];

    protected $appends = ['order_details'];

    /**
     * Get all of the orderDetails for the Order
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function order_details()
    {
        return $this->hasMany(OrderDetails::class, 'order_id', 'id');
    }

    public function getOrderDetailsAttribute()
    {
        return $this->order_details()->get();
    }
}
