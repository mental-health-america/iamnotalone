<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TrainingController;
use App\Http\Controllers\UserEventController;

class ExtraController extends Controller
{
    private $userController;
    private $cityController;
    private $eventController;
    private $stateController;
    private $postController;
    private $trainingController;
    private $userEventsController;

    public function __construct()
    {
        $this->userController = new UserController;
        $this->cityController = new CityController;
        $this->eventController = new EventsController;
        $this->stateController = new StateController;
        $this->postController = new PostController;
        $this->trainingController = new TrainingController;
        $this->userEventsController = new UserEventController;
    }

    /**
     * Handles user signup
     * 
     * @param Request $request
     * 
     * @return bool
     */
    public function signup(Request $request)
    {
        $request->validate([
            'first_name'=>'required',
            'last_name'=>'required',
            'pronoun'=>'required',
            'email'=>'required|unique:users',
            'password'=>'required|confirmed|min:7'
        ]);
        
        $response = $this->userController->
            new($request->first_name, $request->last_name, $request->pronoun, $request->email, $request->phone, $request->state, $request->password);
        if ($response) {
            Auth::loginUsingId($response);
            notify()->success("Signup complete", "Success");
            return redirect()->route('home');
        } else {
            notify()->info("Something went wrong, please try again", "Error");
            return back();
        }
        
    }

    /**
     * Create default admin account
     * 
     * @return bool
     */
    public function defaultAdmin()
    {
        $response = $this->userController->
            new('MHA', 'Admin', 'Him/Her', 'admin@mha.com', '0000000000', 'USA',    'secret');
        if ($response) {
            $this->userController->makeAdmin($response);
            notify()->success('Admin account created', 'Success');
            return redirect()->route('login');
        } else {
            notify()->info("Something went wrong, please try again", "Error");
            return back();
        }
    }

    /**
     * Authenticates a user
     *
     * @param Request $request
     *
     * @return mixed
     */
    public function auth(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return $this->redirect();
        } else {
            notify()->info('Invalid email or password', 'Login Failed');
            return redirect()->route('login');
        }
    }

    /**
     * Redirect user based on role
     * 
     * @return mixed
     */
    public function redirect()
    {
        if (Auth::user()->admin) {
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->intended('home');
        }
        
    }

    /**
     * Logs out a user
     *
     * @return Mixed
     */
    public function signout()
    {
        Auth::logout();
        Session()->flush();
        return redirect()->route('login');
    }

    /**
     * Get cities recommendations
     * 
     * @param string $name city name entered
     * 
     * @return object
     */
    public function getCities($name)
    {
        $cities = $this->cityController->suggestCities($name);

        $locations = array();
        $c = 0;
        foreach($cities as $location)
            $locations[$c++] = $location->city.' - '.$location->state_code;
        return json_encode($locations);
    }

    /**
     * Get states recommendations
     * 
     * @param string $name states name entered
     * 
     * @return object
     */
    public function getStates($name)
    {
        $cities = $this->cityController->suggestCities($name);

        $locations = array();
        $c = 0;
        foreach($cities as $location)
            $locations[$c++] = $location->city.' - '.$location->state_code;
        return json_encode($locations);
    }

    /**
     * Returns homepage with approved events
     * 
     * @return view
     */
    public function home()
    {
        $events = $this->eventController->approvedEvents(1);
        $categories = $this->eventController->categories();
        return view('welcome', compact('events', 'categories'));
    }

    /**
     * Returns event details page
     * 
     * @return view
     */
    public function eventDetails($id)
    {
        $event = $this->eventController->getEvent($id);
        if ($event) {
            $accomodations = $event->accomodations;
            if (Auth::user()) {
                if ($event->training && $this->userEventsController->hasRegistered($event->id, Auth::user()->id)) {
                    return redirect()->route('event.training.start', ['id' => $event->id]);
                } else {
                    return view('event', compact('event', 'accomodations'));
                }
            } else {
                return view('event', compact('event', 'accomodations'));
            }
        } else {
            notify()->info('Something went wrong, please try again', 'Oops.');
            return redirect()->route('home');
        }
    }

    /**
     * Returns forum page
     * 
     * @return view
     */
    public function forum()
    {
        $sideEvents = $this->eventController->fetchApprovedEvents(5);
        $ncp = $this->postController->fetchMostCommentedPosts();
        $events = $this->eventController->approvedEvents();
        $posts = $this->postController->fetchPost();
        return view('forum', compact('events', 'posts', 'ncp', 'sideEvents'));
    }

    /**
     * Return donate page
     * 
     * @return view
     */
    public function donate()
    {
        return view('donate');
    }

    /**
     * Return page with events
     * 
     * @return view
     */
    public function events()
    {
        $events = $this->eventController->approvedEvents(1);
        $categories = $this->eventController->categories();
        return view('events', compact('events', 'categories'));
    }

    /**
     * Redirect user previous page
     * 
     * @return mixed
     */
    public function pageStorer()
    {
        //  our url is now stored as $_POST['location'] (posted from login.php). If it's blank, let's ignore it. Otherwise, let's do something with it.
        $redirect = NULL;
        if($_POST['location'] != '') {
            $redirect = $_POST['location'];
        }

        if((empty($username) OR empty($password) AND !isset($_SESSION['id_login']))) {
            $url = 'login.php?p=1';
            // if we have a redirect URL, pass it back to login.php so we don't forget it
            if(isset($redirect)) {
                $url .= '&location=' . urlencode($redirect);
            }
        header("Location: " . $url);
        exit();
        }
        elseif (!user_exists($username,$password) AND !isset($_SESSION['id_login'])) {
            $url = 'login.php?p=2';
            if(isset($redirect)) {
                $url .= '&location=' . urlencode($redirect);
            }
        header("Location:" . $url);
        exit();
        }
        elseif(isset($_SESSION['id_login'])) {
            // if login is successful and there is a redirect address, send the user directly there
            if($redirect) {
                header("Location:". $redirect);
            } else {
                header("Location:login.php?p=3");
            }
            exit();
        }
        
    }


}