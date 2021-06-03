<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    use HasFactory;

    /**
     * Get city event will bw taking place
     * 
     * @return object
     */
    public function city()
    {
        return $this->belongsTo('App\Models\City');
    }

    /**
     * Get event organizer
     * 
     * @return object
     */
    public function organizer()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    /**
     * Get posts about event
     * 
     * @return object
     */
    public function posts()
    {
        return $this->hasMany('App\Models\Post', 'event_id');
    }

    /**
     * Training Episodes
     * 
     * @return object
     */
    public function episodes()
    {
        return $this->hasMany('App\Models\TrainingEpisodes', 'event_id');
    }

    /**
     * Accomodation provided by event organizers for people with disability
     * 
     * @return object
     */
    public function accomodations()
    {
        return $this->hasMany('App\Models\EventAccomodation', 'event_id');
    }
}
