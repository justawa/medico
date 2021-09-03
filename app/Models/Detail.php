<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Detail extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'phone'
        
    ];





      /**
     * Set the course's name.
     *
     * @param  string  $value
     * @return void
     */
    // public function setNameAttribute($value)
    // {
    //     $this->attributes['name'] = strtolower($value);
    // }

    /**
     * Set the course's slug.
     *
     * @param  string  $value
     * @return void
     */
    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = Str::slug($value, '-');
    }

    /**
     * The user that belong to the details.
    */
    public function Users()
    {
        return $this->belongsToMany(User::class);
    }
}
