<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Training;

class TrainingController extends Controller
{
    /**
     * Create new training
     * 
     * @param string $title training title
     * @param string $startDate start date
     * @param string $endDate end date
     * @param string $startTime start time
     * @param string $endTIme end time
     * 
     * @return bool
     */
    public function new($title, $startDate, $endDate, $startTime, $endTime)
    {
        $training = new Training();
        $training->name = $title;
        $training->start_date = $startDate;
        $training->start_time = $startTime;
        $training->end_time = $endTime;
        $training->end_date = $endDate;
        return $training->save();
    }

    /**
     * Update Training details
     * 
     * @param integer $id Training Id
     * @param string $title training title
     * @param string $startDate start date
     * @param string $endDate end date
     * @param string $startTime start time
     * @param string $endTIme end time
     * 
     * @return bool
     */
    public function update($id, $title, $startDate, $endDate, $startTime, $endTime)
    {
        $training = Training::find($id);
        $training->name = $title;
        $training->start_date = $startDate;
        $training->start_time = $startTime;
        $training->end_time = $endTime;
        $training->end_date = $endDate;
        return $training->save();
    }

    /**
     * Get all trainings
     * 
     * @return object 
     */
    public function fetch()
    {
        return Training::where('status', 1)->paginate(10);
    }

    /**
     * Delete a training
     * 
     * @param integer $id Training id
     * 
     * @return boolean
     */
    public function delete($id)
    {
        return Training::where('id', $id)->update(['status'=>0]);
    }

    /**
     * Get training details
     * 
     * @param integer $id training id
     * 
     * @return object
     */
    public function get($id)
    {
        return Training::find($id);
    }

    /**
     * Trainings that will be displayed on the welcome page
     * 
     * @return object
     */
    public function homeTraining()
    {
        return Training::orderBy('start_date')->take(3)->get();
    }
}
