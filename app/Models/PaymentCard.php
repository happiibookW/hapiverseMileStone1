<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentCard extends Model
{
    use HasFactory;
    protected $table = 'userpaymentcard';
    public $timestamps = false;
    protected $fillable = [
        'cardNumber',
        'cvc',
        'expiryMonth',
        'expiryYear',
        'userId',
        'cardHolderName'
    ];
}
