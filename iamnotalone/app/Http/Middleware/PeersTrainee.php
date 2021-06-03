<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\UserEventController;

class PeersTrainee
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $eventsController = new EventsController;
        $userEventController = new UserEventController;
        $eventId = 0;
        $training = $eventsController->peersTrainingEvent();
        
        if ($training) {
            $eventId = $training->id;
        }

        if ($userEventController->hasRegistered($eventId, Auth::user()->id)) {
            return $next($request);
        } else {
            notify()->info("You have to register for the peers training event first.");
            return back();
        }
    }
}
