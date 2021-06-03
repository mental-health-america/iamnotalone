<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainingSeries extends Model
{
    use HasFactory;

    /**
     * Return training series belongs to
     * 
     * @return object
     */
    public function training()
    {
        return $this->belongsTo('App\Models\Training');
    }
}
