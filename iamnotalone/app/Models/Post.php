<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    /**
     * Return user who made post
     * 
     * @return object
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    /**
     * Return user who made post
     * 
     * @return object
     */
    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }
    
     /**
     * Return event post was made concerning
     * 
     * @return object
     */
    public function event()
    {
        return $this->belongsTo('App\Models\Events');
    }
}
