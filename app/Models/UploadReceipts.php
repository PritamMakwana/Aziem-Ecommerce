<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UploadReceipts extends Model
{
    use HasFactory;

    protected $table = 'upload_receipts';

    protected $fillable = ['receipt', 'customer_id', 'shop_id', 'approved'];

    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
