<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeersForum extends Model
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
        return $this->hasMany('App\Models\PeersForumComments', 'post_id');
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
