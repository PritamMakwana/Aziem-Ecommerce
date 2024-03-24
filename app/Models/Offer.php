<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Offer extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = ['offer_name'];

    protected $dates = ['deleted_at'];


    public function shop_owners()
    {
        return $this->hasMany(ShopOwner::class);
    }

    public function shops()
    {
        return $this->hasMany(Shop::class);
    }
}
