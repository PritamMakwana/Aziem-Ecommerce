<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ConfirmedOrders extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable =
        [
            'product_id',
            'customer_id',
            'shop_id',
            'quantity',
            'order_id',
            'status',
            'total_amount',
            'discount_amount'
        ];

    protected $dates = ['deleted_at'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
