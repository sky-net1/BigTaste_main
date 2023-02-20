<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'product_id',
        'quantity',
        'price'
    ];

    protected $appends = ['product'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function getProductAttribute()
    {
        return $this->product()->get();
    }
}
