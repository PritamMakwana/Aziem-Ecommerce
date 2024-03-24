<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Customer extends Authenticatable
{
    use HasFactory,SoftDeletes;

    protected $table = 'customers';

    protected $dates = ['deleted_at'];


    protected $fillable = [
        'customer_id',
        'first_name',
        'last_name',
        'email',
        'password',
        'mobile',
        'address',
        'profile_image',
        'gender',
        'offer',
        'has_seen_model',
        'hold'
    ];
}
