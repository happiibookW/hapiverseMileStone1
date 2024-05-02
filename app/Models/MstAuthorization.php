<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class MstAuthorization extends Model
{
    use HasFactory;
    protected $table = 'mstauthorization';
    protected $fillable = [
        'userId',
        'userTypeId',
        'email',
        'verificationCode',
        'password',
        'token'
    ];
    public $timestamps = false;
    public function setPasswordAttribute($pass)
    {

        $this->attributes['password'] = Hash::make($pass);
    }
}
