<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserEventController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\TrainingEpisodesController; 
use App\Http\Controllers\EventAccomodationController;
use App\Http\Controllers\Misc\FileHandler;

class UsersController extends Controller
{
    private $eventController;
    private $cityController;
    private $userController;
    private $userEventController;
    private $postController;
    private $commentController;
    private $fileHandler;
    private $trainingEpisodesController;
    private $eventAcomodationController;

    public function __construct()
    {
        $this->middleware('auth');
        $this->eventController = new EventsController;
        $this->cityController = new CityController;
        $this->userController = new UserController;
        $this->userEventController = new UserEventController;
        $this->postController = new PostController;
        $this->commentController = new CommentController;
        $this->fileHandler = new FileHandler;
        $this->trainingEpisodesController = new TrainingEpisodesController;
        $this->eventAcomodationController = new EventAccomodationController;
    }

    /**
     * Create a new event
     * 
     * @return mixed
     */
    public function newEvent()
    {
        if (Session('eventId')) {
            return redirect()->route('event.inperson');
        }
        return view('create_event');
    }

    /**
     * Create a new event
     * 
     * @param Request $requst 
     * 
     * @return bool
     */
    public function createEvent(Request $request)
    {
        
        $val = $request->validate([
            'name'=>'required',
            'description'=>'required',
            'category'=>'required',
            'peers'=>'nullable|boolean',
            'accomodation'=>'nullable',
            'banner'=>'file|image|mimes:jpeg,jpg,png,webp|max:2048'
        ]);
        $path = 'event/banner/';
        $banner = NULL;
        if($request->file('banner')){
            $extension = $request->file('banner')->getClientOriginalExtension();
            $fileName = 'banner-'.time().'.'.$extension;
            if ($this->fileHandler->uploadFile($path, $fileName, $val['banner'])) {
                $banner = 'storage/'.$path.$fileName;
            }
        }
        
            $eventId = $this->eventController->new(Auth::user()->id, $request->name, $request->category, $banner, $request->description, $request->has('peers'), null);
            if ($eventId) {
                $accomodations = $request->accomodation;

                if ($accomodations) {
                    for ($i=0; $i < count($accomodations); $i++) { 
                        $this->eventAcomodationController->new($eventId, $accomodations[$i]);    
                    }
                }

                if (!Auth::user()->organizer) {
                    $this->userController->makeOrganizer(Auth::user()->id);
                }
                
                Session(['eventId' => $eventId]);
                return redirect()->route('event.inperson');
            } else {
                notify()->info("Something went wrong, please try again", "Notice");
                return back();
            }
    }

    /**
     * Redirect to inperson event creation page
     * 
     * @return mixed
     */
    public function inpersonEvent()
    {
        if (Session('eventId')) {
            return view('inperson_event');
        } else {
            return redirect()->route('home');
        }
    }

    /**
     * Update inpersons event
     * 
     * @param Request $request
     * 
     * @return mixed
     */
    public function updateInpersonEvent(Request $request)
    {
        $request->validate([
            'venue'=>'required',
            'address1'=>'required',
            'address2'=>'nullable',
            'city'=>'required',
            'state'=>'required'
        ]);
        
        $eventId = Session('eventId');
        if ($this->eventController->updateInPersonEvent($eventId, $request->venue, $request->address1, $request->address2, $request->state, $request->city)) {
            return redirect()->route('event.date');
        } else {
            notify()->info("Something went wrong, please try again", "Error");
            return back();
        }
        
    }

    /**
     * Redirect to inperson event creation page
     * 
     * @return mixed
     */
    public function onlineEvent()
    {
        if (Session('eventId')) {
            return view('online_event');
        } else {
            return redirect()->route('home');
        }
    }

    /**
     * Update online event
     * 
     * @param Request $request
     * 
     * @return mixed
     */
    public function updateOnlineEvent(Request $request)
    {
        $request->validate([
            'registration_link'=>'required_without:link',
            'link'=>'required_without:registration_link',
     //       'platform'=>'required'
        ]);
        $eventId = Session('eventId');
        if ($this->eventController->updateOnlineEvent($eventId, $request->link, $request->platform, $request->registration_link)) {
            return redirect()->route('event.date');
        } else {
            notify()->info("Something went wrong, please try again", "Error");
            return back();
        }
    }

    /**
     * Redirect to to be announced events creation page
     * 
     * @return mixed
     */
    public function hybridEvent()
    {
        if (Session('eventId')) {
            return view('hybrid_event');
        } else {
            return redirect()->route('home');
        }
    }

    /**
     * Update inpersons event
     * 
     * @param Request $request
     * 
     * @return mixed
     */
    public function updateHybridEvent(Request $request)
    {
        $request->validate([
            'venue'=>'required',
            'address1'=>'required',
            'address2'=>'nullable',
            'city'=>'required',
            'state'=>'required',
            'link'=>'required',
            'platform'=>'required'
        ]);
        $eventId = Session('eventId');
        if ($this->eventController->updateHybridEvent($eventId, $request->venue, $request->address1, $request->address2, $request->state, $request->city, $request->link, $request->platform) ) {
            return redirect()->route('event.date');
        } else {
            notify()->info("Something went wrong, please try again", "Error");
            return back();
        }
    }

    /**
     * Redirect to set event date page
     * 
     * @return mixed
     */
    public function eventDate()
    {
        if (Session('eventId')) {
            return view('event_date');
        } else {
            return redirect()->route('home');
        }
    }

    /**
     * Update inpersons event
     * 
     * @param Request $request
     * 
     * @return mixed
     */
    public function setDate(Request $request)
    {
        $request->validate([
            'start_time'=>'required',
            'start_date'=>'required',
            'end_time'=>'required',
            'end_date'=>'required',
            'frequency'=>'required'
        ]);
        
        $eventId = $request->session()->pull('eventId');
        if ($this->eventController->updateEventDate($eventId, $request->start_date, $request->start_time, $request->end_date, $request->end_time, $request->frequency)) {
            notify()->success("Your event will be reviewed in 48 hours. You will be notified if your event was approved.", "Success");
            return redirect()->route('event.created', ['id'=>$eventId]);
        } else {
            notify()->info("Something went wrong, please try again", "Error");
            return back();
        }
    }

    /**
     * Return event created page
     * 
     * @param integer $id event id
     * 
     * @return mixed
     */
    public function eventCreated($id)
    {
        $event = $this->eventController->getEvent($id);
        return view('event_created', compact('event'));
    }

     /**
     * User successfully registered for event
     * 
     * @param integer $id event id
     * 
     * @return mixed
     */
    public function successfulyRegistered($id)
    {
        $event = $this->eventController->getEvent($id);
        return view('registered', compact('event'));
    }

    /**
     * Register user for event
     * 
     * @param integer $id event id
     * 
     * @return mixed
     */
    public function registerForEvent($id)
    {
        if ($this->userEventController->hasRegistered($id, Auth::user()->id)) {
            notify()->info('You have registered for this event already.', "Note!");
        } else {
            if ($this->userEventController->registerEvent(Auth::user()->id, $id)) {
                notify()->success("Event registration complete", "Success");
            } else {
                notify()->info("Seomething went wrong, please try again", "Info!");
                return back();
            }
        }
        return redirect()->route('event.register.success', ['id'=>$id]);
    }

    /**
     * Returns user events page
     * 
     * @return view
     */
    public function userEvents()
    {
        $events = $this->userEventController->userRegisteredEvents(Auth::user()->id);
        $oevents = $this->eventController->userOrganizedEvents(Auth::user()->id);
        return view('user_events', compact('events', 'oevents'));
    }

    /**
     * Register a new forum
     * 
     * @param Request $request
     * 
     * @return mixed
     */
    public function newForum(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'post'=>'required',
            'event'=>'required'
        ]);

        if ($this->postController->newPost($request->title, $request->event, $request->post, Auth::user()->id)) {
            notify()->success('Post created', 'Success');
            return redirect()->route('forum');
        } else {
            notify()->info('Something went wrong, please try again', 'Error');
            return back();
        }
    }

    /**
     * Get and display single post with comments
     * 
     * @param integer $postId post id
     * 
     * @return mixed
     */
    public function post($postId)
    {
        $post = $this->postController->getPost($postId);
        if ($post) {
            $sideEvents = $this->eventController->fetchApprovedEvents(5);
            $ncp = $this->postController->fetchMostCommentedPosts();

            $comments = $post->comments;
            $events = $this->eventController->approvedEvents();
            return view('post', compact('post', 'events', 'comments', 'sideEvents', 'ncp'));
        } else {
            notify()->info('Post not found');
            return back();
        }
    }

     /**
     * Register a new post comment
     * 
     * @param Request $request
     * 
     * @return mixed
     */
    public function newComment(Request $request)
    {
        $request->validate([
            'post'=>'required|numeric',
            'comment'=>'required'
        ]);

        if ($this->commentController->newComment($request->post, $request->comment, Auth::user()->id)) {
            notify()->success('Comment posted', 'Success');
        } else {
            notify()->info('Something went wrong, please try again', 'Error');
        }
        return back();
    }

    /**
     * Returns posts about an event
     * 
     * @param integer $id Event id
     * 
     * @return view
     */
    public function eventTopics($id)
    {
        $sideEvents = $this->eventController->fetchApprovedEvents(5);
        $ncp = $this->postController->fetchMostCommentedPosts();
        $events = $this->eventController->approvedEvents();
        $event = $this->eventController->getEvent($id);
        $posts = $this->postController->eventPosts($id);
        return view('event_topics', compact('events', 'posts', 'ncp', 'sideEvents', 'event'));
    }

    /**
     * Returns posts made by user
     * 
     * @return view
     */
    public function userPosts()
    {
        $sideEvents = $this->eventController->fetchApprovedEvents(5);
        $ncp = $this->postController->fetchMostCommentedPosts();
        $events = $this->eventController->approvedEvents();
        $posts = $this->postController->userPosts(Auth::user()->id);
        return view('user_topics', compact('events', 'posts', 'ncp', 'sideEvents'));
    }

    /**
     * Returns comments made by user
     * 
     * @return view
     */
    public function userComments()
    {
        $sideEvents = $this->eventController->fetchApprovedEvents(5);
        $ncp = $this->postController->fetchMostCommentedPosts();
        $events = $this->eventController->approvedEvents();
        $comments = Auth::user()->comments;
        return view('user_answers', compact('comments', 'events', 'ncp', 'sideEvents'));
    }

    /**
     * Returns topics on the system
     * 
     * @return view
     */
    public function topics()
    {
        $sideEvents = $this->eventController->fetchApprovedEvents(5);
        $ncp = $this->postController->fetchMostCommentedPosts();
        $events = $this->eventController->approvedEvents();
        $posts = $this->postController->fetchPost();
        return view('topics', compact('posts', 'events', 'ncp', 'sideEvents'));
    }

    /**
     * Return training videos and materials
     * 
     * @param integer $id Training Id
     * @param integer $eid Episode Id
     * 
     * @return Mixed
     */
    public function startTraining($id, $eId=null)
    {
        $event = $this->eventController->getEvent($id);
        $episodes = $event->episodes;
        if ($eId) {
            $currentEpisode = $this->trainingEpisodesController->get($eId);
        } else {
            $currentEpisode = $this->trainingEpisodesController->firstEpisode($id);
        }
        return view('training', compact('event', 'episodes', 'currentEpisode'));
    }
}
