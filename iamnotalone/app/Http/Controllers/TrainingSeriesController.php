<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TrainingSeries;

class TrainingSeriesController extends Controller
{
    /**
     * Register new training series
     * 
     * @param string $episode Series title
     * @param string $url Youtube url
     * @param string $material Material path
     * @param integer $trainingId Trainng id
     * 
     * @return bool
     */
    public function new($episode, $url, $material, $trainingId)
    {
        $series = new TrainingSeries();
        $series->title = $episode;
        $series->training_id = $trainingId;
        $series->url = $url;
        $series->material = $material;
        return $series->save();
    }

    /**
     * Remove training series
     * 
     * @param integer $id training series id
     * 
     * @return bool
     */
    public function delete($id)
    {
        return TrainingSeries::destroy($id);
    }
}
