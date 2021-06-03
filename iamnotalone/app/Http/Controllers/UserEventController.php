<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserEvent;

class UserEventController extends Controller
{
    /**
     * Register user event
     * 
     * @param integer $userId user id
     * @param integer $eventId event id
     * 
     * @return bool
     */
    public function registerEvent($userId, $eventId)
    {
        $userEvent = new UserEvent();
        $userEvent->user_id = $userId;
        $userEvent->event_id = $eventId;
        return $userEvent->save();
    }

    /**
     * Get user events
     * 
     * @param integer $id user id
     * 
     * @return object
     */
    public function userRegisteredEvents($id)
    {
        return UserEvent::where('user_id', $id)->paginate(16);
    }

    /**
     * Check if user has regstered for an event
     * 
     * @param integer $eventId Event id
     * @param integer $userId User id
     * 
     * @return bool
     */
    public function hasRegistered($eventId, $userId)
    {
        if (UserEvent::where('user_id', $userId)->where('event_id', $eventId)->first()) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Get the number of users registered for an event
     * 
     * @return integer
     */
    public function attendees()
    {
        return UserEvent::all()->count();
    }

}
