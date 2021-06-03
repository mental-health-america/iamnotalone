<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventAccomodation extends Model
{
    use HasFactory;

    /**
     * Get event accomodations
     * 
     * @return object
     */
    public function accomodation()
    {
        return $this->belongsTo('App\Models\Events');
    }
}
