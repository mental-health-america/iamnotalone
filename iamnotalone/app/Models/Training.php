<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    use HasFactory;
    protected $table = "training";

    /**
     * Return training series
     * 
     * @return object
     */
    public function series()
    {
        return $this->hasMany('App\Models\TrainingSeries', 'training_id');
    }
}
