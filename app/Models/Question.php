<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    public function optionExplanation()
    {
      //  return $this->option()->where('correct', 1)->value('description');
    }

    // public function correctOption()
    // {
    //     return $this->options();
    // }

    /**
     * Get the optons for the question.
     */
    // public function option()
    // {
    //     return $this->hasMany(Option::class);
    // }

    /**
     * Get the subject that owns the question.
     */
    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    /**
     * The tests that belong to the question.
     */
    public function tests()
    {
        return $this->belongsToMany(Test::class)->withTimestamps();
    }

    public function options()
    {
        return $this->belongsToMany(Option::class)->withTimestamps();
    }

    
}
