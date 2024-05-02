<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SponsoredAccount extends Model
{
    use HasFactory;
    protected $table = 'sponseraccountinfo';
    public $timestamps = false;
    protected $primaryKey = 'infoId';
    protected $fillable = [
        'alreadyAccountCreated',];
}
