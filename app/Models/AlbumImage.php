<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlbumImage extends Model
{
    use HasFactory;
    protected $table = 'albumimages';
    public $timestamps = false;
    protected $fillable = ['albumId', 'userId', 'imageUrl'];
}
