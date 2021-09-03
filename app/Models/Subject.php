<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Subject extends Model
{
    use HasFactory;

    /**
     * Set the subject's name.
     *
     * @param  string  $value
     * @return void
     */
    // public function setNameAttribute($value)
    // {
    //     $this->attributes['name'] = strtolower($value);
    // }

    /**
     * Set the subject's slug.
     *
     * @param  string  $value
     * @return void
     */
    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = Str::slug($value, '-');
    }

    /**
     * Get the optons for the question.
     */
    public function questions()
    {
        return $this->hasMany(Question::class);
    }
}
