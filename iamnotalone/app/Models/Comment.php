<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
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
     * Return post comment was made on
     *
     * @return object
     */
    public function post()
    {
        return $this->belongsTo('App\Models\Post');
    }
}
