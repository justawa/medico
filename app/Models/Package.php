<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    /**
     * Get the optons for the question.
     */
    public function tests()
    {
        return $this->hasMany(Test::class);
    }

    /**
     * The users that belong to the package.
     */
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
