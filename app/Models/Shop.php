<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Shop extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['category_id', 'name', 'address', 'image', 'email', 'mobile', 'offer', 'status', 'so_id'];

    protected $dates = ['deleted_at'];

    public function shop_owner()
    {
        return $this->belongsTo(ShopOwner::class, 'so_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

    public function offers()
    {
        return $this->belongsTo(Offer::class, 'offer');
    }
}
