<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class ShopOwner extends Authenticatable
{
    use HasFactory,SoftDeletes;

    protected $table = 'shop_owners';
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'address',
        'nationality',
        'city',
        'shop_name',
        'shop_category',
        'cr_number',
        'offer',
        'images',
        'approved',
        'owner_id',
        'hold'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'shop_category', 'id');
    }

    public function offers()
    {
        return $this->belongsTo(Offer::class, 'offer');
    }

    public function shop()
    {
        return $this->hasMany(Shop::class);
    }
}
