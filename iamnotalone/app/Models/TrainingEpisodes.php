<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainingEpisodes extends Model
{
    use HasFactory;

    /**
     * Return training event episode belongs to
     * 
     * @return object
     */
    public function event()
    {
        return $this->belongsTo('App\Models\Events');
    }

    public function materials()
    {
        return $this->hasMany('App\Models\EpisodeMaterial', 'episode_id');
    }
}
