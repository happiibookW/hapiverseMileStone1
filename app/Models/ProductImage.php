<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    use HasFactory;
    protected $table = 'businessproductimages';

    public function ad()
    {
        return $this->belongsTo(BusinessAd::class, 'productId', 'adContent');
    }
}
