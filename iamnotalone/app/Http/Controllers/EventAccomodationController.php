<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EventAccomodation;

class EventAccomodationController extends Controller
{
    /**
     * Register new event accomodation
     * 
     * @param integer $eventId Event id
     * @param string $accomodation Accomodation option
     * 
     * @return boolean
     */
    public function new($eventId, $acc)
    {
        $accomodation = new EventAccomodation();
        $accomodation->event_id = $eventId;
        $accomodation->accomodation = $acc;
        return $accomodation->save();
    }
}
