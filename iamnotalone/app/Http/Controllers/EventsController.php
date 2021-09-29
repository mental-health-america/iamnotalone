<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Events;

class EventsController extends Controller
{
    /**
     * Create new event
     * 
     * @param integer $userId user id
     * @param string $name event name
     * @param integer $category event category id
     * @param string $banner event banner
     * @param string $description Event description
     * @param boolean $peers Event for peers only
     * @param string $accomodation Event will have accomodation
     * 
     * @return bool
     */
    public function new($userId, $name, $category, $banner, $description, $peers, $accomodation)
    {
        $event = new Events;
        $event->name = $name;
        $event->user_id = $userId;
        $event->category = $category;
        $event->banner = $banner;
        $event->description = $description;
        $event->accomodation = $accomodation;
        $event->peers = $peers;
        $event->save();
        return $event->id;
    }

    /**
     * Update online event
     * 
     * @param integer $eventId event id
     * @param string $link event link
     * @param string $platform 
     */
    public function updateOnlineEvent($id, $link, $platform, $reg_link)
    {
        $event = Events::find($id);
        if ($event) {
            $event->link = $link;
            $event->registration_link = $reg_link;
            $event->platform = $platform;
            $event->online = 1;
            return $event->save();
        } else {
            return false;
        }
    }

    /**
     * Update inperson event
     * 
     * @param integer $id event id
     * @param string $venue Event venue
     * @param string $address1 Event primary address
     * @param string $address2 Event Secondary address
     * @param string $city city
     * @param string $state 
     * 
     */
    public function updateInPersonEvent($id, $venue, $address1, $address2, $state, $city)
    {
        $event = Events::find($id);
        if ($event) {
            $event->venue = $venue;
            $event->address1 = $address1;
            $event->address2 = $address2;
            $event->city = $city;
            $event->state = $state; 
            $event->inperson = 1;
            return $event->save();
        } else {
            return false;
        }
    }

    /**
     * Update hybrid event
     * 
     * @param integer $id event id
     * @param string $venue Event venue
     * @param string $address1 Event primary address
     * @param string $address2 Event Secondary address
     * @param integer $state state
     * @param integer $city
     * @param string $link event link
     * @param string $platform 
     * 
     */
    public function updateHybridEvent($id, $venue, $address1, $address2, $state, $city, $link, $platform)
    {
        $event = Events::find($id);
        if ($event) {
            $event->venue = $venue;
            $event->address1 = $address1;
            $event->address2 = $address2;
            $event->city = $city;
            $event->state = $state;
            $event->link = $link;
            $event->platform = $platform;
            $event->inperson = 1;
            $event->online = 1;
            return $event->save();
        } else {
            return false;
        }
    }

    /**
     * Update event start time and end time
     * 
     * @param integer $id event id
     * @param string $startDate Event start date
     * @param string $startTime Event start time
     * @param string $endDate Event end date
     * @param string $endTime Event end time
     * @param string $frequency
     * 
     * @return bool
     */
    public function updateEventDate($id, $startDate, $startTime, $endDate, $endTime, $frequency)
    {
        $event = Events::find($id);
        if ($event) {
            $event->start_date = $startDate;
            $event->start_time = $startTime;
            $event->end_date = $endDate;
            $event->end_time = $endTime;
            $event->frequency = $frequency;
            if ($frequency != 'once') {
                $event->recur = 1;
            }
            return $event->save();
        } else {
            return false;
        }
    }

    /**
     * Return an event
     * 
     * @param integer $id event id
     * 
     * @return object
     */
    public function getEvent($id)
    {
        return Events::find($id);
    }

    /**
     * Approve Event
     * 
     * @param integer $id event id
     * 
     * @return bool
     */
    public function approveEvent($id)
    {
        return Events::where('id', $id)->update(['approved'=>1]);
    }

    /**
     * Decline Event
     * 
     * @param integer $id event id
     * 
     * @return bool
     */
    public function declineEvent($id)
    {
        return Events::where('id', $id)->update(['approved'=>-1]);
    }

    /**
     * Returns pending events
     * 
     * @return object
     */
    public function pendingEvents()
    {
        return Events::where('approved', 0)->where('deleted', 0)->get();
    }

    /**
     * Returns appoved events
     * 
     * @param integer $training Training id
     * 
     * @return object
     */
    public function approvedEvents($training=0)
    {
        if ($training) {
            return Events::where('approved', 1)->where('deleted', 0)->get();
        }
        return Events::where('approved', 1)->where('deleted', 0)->where('training', $training)->get();
    }

    /**
     * Returns all events
     * 
     * @return object
     */
    public function allEvents()
    {
        return Events::orderBy('created_at', 'desc')->where('deleted', 0)->get();
    }


    /**
     * Returns events organizes by user
     * 
     * @param integer $id userId
     * 
     * @return object
     */
    public function userOrganizedEvents($id)
    {
        return Events::where('user_id', $id)->paginate(8);
    }

    /**
     * Fetch approved events
     * 
     * @param integer $n number of events to return
     * @param integer $training 1/0
     * 
     * @return object
     */
    public function fetchApprovedEvents($n, $training=0)
    {
        return Events::where('approved', 1)->where('deleted', 0)->where('training', $training)->orderBy('id', 'desc')->take($n)->get();
    }

    /**
     * Fetch unique event categories 
     * 
     * @return object
     */
    public function categories()
    {
        return Events::where('approved', 1)->distinct()->get(['category']);
    }

    /**
     * Create new training
     * 
     * @param integer $userId user id
     * @param string $name event name
     * @param integer $category event category id
     * @param string $banner event banner
     * @param string $description Event description
     * @param string $startDate Event start date
     * @param string $startTime Event start time
     * @param string $endDate Event end time
     * @param string $endTime Event end time
     * 
     * @return bool
     */
    public function newTraining($userId, $name, $banner, $description, $startDate, $startTime, $endDate, $endTime)
    {
        $event = new Events;
        $event->name = $name;
        $event->user_id = $userId;
        $event->category = 'training';
        $event->platform = "Youtube";
        $event->banner = $banner;
        $event->description = $description;
        $event->start_date = $startDate;
        $event->start_time = $startTime;
        $event->end_date = $endDate;
        $event->end_time = $endTime;
        $event->training = 1;
        $event->approved = 1;
        $event->online = 1;
        $event->save();
        if ($event) {
            return $event->id;
        } else {
            return false;
        }
    }

    /**
     * Update training details
     * 
     * @param integer $trainingId
     * @param string $name event name
     * @param string $banner event banner
     * @param string $description Event description
     * @param string $startDate Event start date
     * @param string $startTime Event start time
     * @param string $endDate Event end time
     * @param string $endTime Event end time
     * 
     * @return bool
     */
    public function updateTraining($trainingId, $name, $banner, $description, $startDate, $startTime, $endDate, $endTime)
    {
        $event = Events::find($trainingId);
        $event->name = $name;
        if ($banner) {
            $event->banner = $banner;
        }
        $event->description = $description;
        $event->start_date = $startDate;
        $event->start_time = $startTime;
        $event->end_date = $endDate;
        $event->end_time = $endTime;
        return $event->save();
    }

    /**
     * Fetch trainings
     * 
     * @return object 
     */
    public function fetchTrainings()
    {
        return Events::where('training', 1)->where('deleted', 0)->paginate(10);
    }

     /**
     * Delete Event
     * 
     * @param integer $id event id
     * 
     * @return bool
     */
    public function delete($id)
    {
        return Events::where('id', $id)->update(['deleted'=> 1]);
    }

    /**
     * Get peers training event
     * 
     * @return object
     */
    public function peersTrainingEvent()
    {
        return Events::where('training', 1)->first();
    }

}
