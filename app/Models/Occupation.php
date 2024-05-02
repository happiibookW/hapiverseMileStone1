<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Occupation extends Model
{
    use HasFactory;
    protected $table = 'occupation';

    protected $fillable = [
        'userId',
        'title',
        'description',
        'location',
        'startDate',
        'endDate',
        'current_working',
        'workSpaceName',
        'occupation_id'
    ];
}
