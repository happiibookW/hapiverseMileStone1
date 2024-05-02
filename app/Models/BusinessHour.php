<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessHour extends Model
{
    use HasFactory;
    protected $table = 'trnbusinesshours';
    public $timestamps = false;
    protected $primaryKey = 'hoursId';
    public $incrementing = false;
    protected $fillable = [
        'day', 'openTime', 'closeTime'
    ];
}
