<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EpisodeMaterial extends Model
{
    use HasFactory;

    /**
     * Return training episode material belongs to
     * 
     * @return object
     */
    public function episode()
    {
        return $this->belongsTo('App\Models\TrainingEpisodes');
    }
}
