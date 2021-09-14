<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\TrainingEpisodes;

class TrainingEpisodesController extends Controller
{
    /**
     * Register new training episode
     * 
     * @param string $episode title
     * @param string $url Youtube url
     * @param integer $trainingId Event id
     * 
     * @return bool
     */
    public function new($episode, $url, $trainingId)
    {
        
        $series = new TrainingEpisodes();
        $series->title = $episode;
        $series->event_id = $trainingId;
        $series->url = $url;
        if ($series->save()) {
            return $series->id;
        } else {
            return false;
        }
    }

    /**
     * Remove training episode
     * 
     * @param integer $id training episode id
     * 
     * @return bool
     */
    public function delete($id)
    {
        $episode = TrainingEpisodes::find($id);
        if ($episode) {
            return TrainingEpisodes::destroy($id);
        } 
        return false;
    }

    /**
     * Retyrn training episode
     * 
     * @param integer $id
     * 
     * @return object
     */
    public function get($id)
    {
        return TrainingEpisodes::find($id);
    }

    /**
     * Return first available training Episode of event
     * 
     * @param integer $eventId
     * 
     * @return object
     */
    public function firstEpisode($eventId)
    {
        return TrainingEpisodes::where('event_id', $eventId)->first();
    }
    /**
     * Update training episode
     * 
     * @param string $episode title
     * @param string $url Youtube url
     * @param integer $trainingId Event id
     * @param integer $description Description
     * 
     * @return bool
     */
    public function updateEpisode($episode, $url, $trainingId, $id)
    {
        
        $episodes = TrainingEpisodes::find($id);
        $episodes->title = $episode;
        $episodes->url = $url;
        if ($episodes->save()) {
            return $episodes->id;
        } else {
            return false;
        }
    }
}
