<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Misc\FileHandler;
use App\Mail\DisapprovedEvent;
use App\Mail\EventApproved;


class AdminController extends Controller
{
    private $userController;
    private $eventsController;
    private $userEventsController;
    private $fileHandler;
    private $trainingEpisodesController;
    private $episodeMaterial;

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');

        $this->userController = new UserController;
        $this->eventsController = new EventsController;
        $this->userEventsController = new UserEventController;
        $this->fileHandler = new FileHandler;
        $this->episodeMaterial = new EpisodeMaterialController;
        $this->trainingEpisodesController = new TrainingEpisodesController;
    }

    /**
     * Return admin dashboard
     * 
     * @return mixed
     */
    public function dashboard()
    {
        $pendingEvents = $this->eventsController->pendingEvents()->count();
        $approvedEvents = $this->eventsController->approvedEvents()->count();
        $organizers = $this->userController->organizers()->count();
        $attendees = $this->userEventsController->attendees();
        $events = $this->eventsController->allEvents();

        return view('admin.dashboard', compact('pendingEvents', 'approvedEvents', 'organizers', 'attendees', 'events'));
    }

    /**
     * Return users page
     * 
     * @return mixed
     */
    public function users()
    {
        $users = $this->userController->allUsers();

        return view('admin.users', compact('users'));
    }

    /**
     * Pending Events
     * 
     * @return mixed
     */
    public function pendingEvents()
    {
        $pendingEvents = $this->eventsController->pendingEvents();
        return view('admin.pending_events', compact('pendingEvents'));
    }

    /**
     * Returns approved events
     * 
     * @return mixed
     */
    public function approvedEvents()
    {
        $approvedEvents = $this->eventsController->approvedEvents();
        return view('admin.approved_events', compact('approvedEvents'));
    }

    /**
     * Approve an event 
     * 
     * @param integer $id event id
     * 
     * @return mixed
     */
    public function approveEvent($id)
    {
        if ($this->eventsController->approveEvent($id)) {
            notify()->success('Event approved', 'Success');
            try {
                $event = $this->eventsController->getEvent($id);
                $user = $event->organizer;
                Mail::to($user)->send(new EventApproved($user, $event));
            } catch (\Throwable $th) {
                //throw $th;
                Log::error($th);
            }
            //return redirect()->route('admin.events.approved');
        } else {
            notify()->info('something went wrong, please try again');
        }
        return back();
    }

    /**
     * Decline an event 
     * 
     * @param integer $id event id
     * 
     * @return mixed
     */
    private function declineEvent($id)
    {
        if ($this->eventsController->declineEvent($id)) {
            notify()->success('Event Declined', 'Success');
            return back();
        } else {
            notify()->info('something went wrong, please try again');
            return back();
        }
    }

    /**
     * Return event details page
     * 
     * @param integer $id event id
     * 
     * @return mixed
     */
    public function eventDetails($id)
    {
        $event = $this->eventsController->getEvent($id);
        if ($event) {
            $accomodations = $event->accomodations;
             return view('admin.event_details', compact('event', 'accomodations'));
        } else {
            notify()->info("Event not found.",'Oops!');
            return back();
        }
    }

    /**
     * Send email
     * 
     * @param Request $request
     * 
     * @return mixed
     */
    public function sendMessage(Request $request)
    {
        $request->validate([
            'msg'=>'required',
            'uid'=>'required',
            'eid'=>'required'
        ]);
        if ($this->declineEvent($request->eid)) {
            try {
                $user = $this->userController->getUser($request->uid);
                Mail::to($user)->send(new DisapprovedEvent($request));
            } catch (\Throwable $th) {
                Log::error($th);
            }
            notify()->success("Event Deleted", "Success");
        } else {
            notify()->info("Something went wrong", "Try again");
        }
        return back();
    }

    /**
     * Return Training Page
     * 
     * @return view
     */
    public function training()
    {
        $trainings = $this->eventsController->fetchTrainings();
        return view('admin.training', compact('trainings'));
    }

    /**
     * Create new training
     * 
     * @param Request $request
     * 
     * @return bool
     */
    public function newTraining(Request $request)
    {
        $val = $request->validate([
            'title'=>'required',
            'start_date'=>'required',
            'start_time'=>'required',
            'end_date'=>'required',
            'description'=>'required',
            'banner'=>'required|file|image|mimes:jpeg,jpg,png,webp|max:200'
        ]);

        $path = 'event/banner/';
        $extension = $request->file('banner')->getClientOriginalExtension();
        $fileName = 'banner-'.time().'.'.$extension;

        if ($this->fileHandler->uploadFile($path, $fileName, $val['banner'])) {
            $fileName = 'storage/' . $path . $fileName;

            $trainingId = $this->eventsController->newTraining(Auth::user()->id, $request->title, $fileName, $request->description, $request->start_date, $request->start_time, $request->end_date, $request->end_time);
            if ($trainingId) {
                notify()->success('Training Created', 'Success');
                return redirect()->route('admin.training.details', ['id'=>$trainingId]);
            } else {
                notify()->info('Something went wrong, please try again', 'Error');
            }
        } else{
            notify()->info('Something went wrong, please try again');
        }
        return back();
    }

     /**
     * Update training details
     * 
     * @param Request $request
     * 
     * @return bool
     */
    public function updateTraining(Request $request)
    {
        $val = $request->validate([
            'id'=>'required|numeric',
            'title'=>'required',
            'description'=>'required',
            'start_date'=>'required',
            'start_time'=>'required',
            'end_date'=>'required',
            'banner'=>'file|image|mimes:jpeg,jpg,png,webp|max:200'
        ]);

        $banner = null;

        if ($request->file('banner')) {
            $path = 'event/banner/';
            $extension = $request->file('banner')->getClientOriginalExtension();
            $fileName = 'banner-'.time().'.'.$extension;

            if ($this->fileHandler->uploadFile($path, $fileName, $val['banner'])) {
                $banner = 'storage/' . $path . $fileName;
            }
        }

        if ($this->eventsController->updateTraining($request->id, $request->title, $banner, $request->description, $request->start_date, $request->start_time, $request->end_date, $request->end_time, $banner)) {
            notify()->success('Training Details Updated', 'Success');
        } else {
            notify()->info('Something went wrong, please try again', 'Error');
        }
        return back();
    }

    /**
     * Delete training
     * 
     * @param integer $id Training id
     * 
     * @return mixed
     */
    public function removeTraining($id)
    {
        if ($this->eventsController->delete($id)) {
            notify()->success('Event Deleted', 'Success');
        } else {
            notify()->info('Something went wrong, please try again', 'Error');
        }
        return redirect()->route('admin.dashboard');
    }

    /**
     * Return training details page
     * 
     * @param integer $id training id
     * 
     * @return mixed
     */
    public function trainingDetails($id)
    {
        $training = $this->eventsController->getEvent($id);
        if ($training) {
            $episodes = $training->episodes;
            return view('admin.training_details', compact('training', 'episodes'));
        } else {
            notify()->info('Training not found', 'Oops');
            return back();
        }
    }

    /**
     * Create new training episode
     * 
     * @param Request $request
     * 
     * @return bool
     */
    public function newTrainingEpisode(Request $request)
    {
        
        $val = $request->validate([
            'title'=>'required',
            'url'=>'required',
            'training'=>'required',
            'episode_description'=>'required',
            'material.*'=>'file|mimetypes:application/pdf'
        ]);
        $episodeId = $this->trainingEpisodesController->new($request->title, $request->url, $request->training, $request->episode_description);

        if ($episodeId) {

            $materials = $request->file('material');
            $c = 1;

            if ($materials) {
                foreach ($materials as $material) {
                    $path = 'training/episode/material/';
                    $extension = $material->getClientOriginalExtension();
                    $fileName = 'material-' .$c. '-'. time() . '.' . $extension;

                    if ($this->fileHandler->uploadFile($path, $fileName, $material)) {
                        $mp = 'storage/' . $path . $fileName;
                        $this->episodeMaterial->new($episodeId, $mp);
                    }
                    ++$c;
                }
            }

            notify()->success('Training Episode Created', 'Success');
        } else {
            notify()->info('Something went wrong, please try again', 'Error');
        }
        return back();
    }

    /**
     * Delete a training series episode
     * 
     * @param integer $id episode id
     * 
     * @return mixed
     */
    public function removeTrainingEpisode($id)
    {
        if ($this->trainingEpisodesController->delete($id)) {
            notify()->success('Training Episode Deleted', 'Success');
        } else {
            notify()->info('Something went wrong, please try again', 'Error');
        }
        return back();
    }
}
