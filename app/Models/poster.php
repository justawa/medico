<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class poster extends Model
{
    use HasFactory;
    protected $table = 'posters';
    protected $fillable = [
        'title',
        'profile_image',
        'link',
        'category',
        'discription',
        'status',

    ];
}
