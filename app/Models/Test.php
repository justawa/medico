<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Test extends Model
{
    use HasFactory;

    /**
     * Set the test's name.
     *
     * @param  string  $value
     * @return void
     */
    // public function setNameAttribute($value)
    // {
    //     $this->attributes['name'] = strtolower($value);
    // }

    /**
     * Set the test's slug.
     *
     * @param  string  $value
     * @return void
     */
    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = Str::slug($value, '-');
    }

    /**
     * The questions that belong to the test.
     */
    public function questions()
    {
        return $this->belongsToMany(Question::class)->withTimestamps();
    }
}
