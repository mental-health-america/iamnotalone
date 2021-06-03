<?php

namespace App\Http\Controllers;
use App\Models\PeersForum;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\PeersForumCommentsController;


use Illuminate\Http\Request;

class PeersForumController extends Controller
{
    private $eventController;
    private $commentsController;

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('peers.trainee');
        $this->eventController = new EventsController;
        $this->commentsController = new PeersForumCommentsController;   
    }

     /**
     * Create new PeersForum
     * 
     * @param string $title PeersForum title
     * @param string $body PeersForum body/content
     * @param integer $userId user id
     * 
     * @return boolean
     */
    public function new($title, $body, $userId)
    {
        $peersForum = new PeersForum;
        $peersForum->title = $title;
        $peersForum->event_id = $this->eventController->peersTrainingEvent()->id;
        $peersForum->body = $body;
        $peersForum->user_id = $userId;
        return $peersForum->save();
    }

    /**
     * Returns Paginated posts made in the peers forum
     * 
     * @return object
     */
    public function fetchPosts()
    {
        return PeersForum::paginate(10);
    }

    /**
     * Return PeersForums made by user
     * 
     * @param integer $userId user id
     * 
     * @return object
     */
    public function getUserPosts($userId)
    {
        return PeersForum::where('user_id', $userId)->paginate(10);
    }

    /**
     * Return a single Post
     * 
     * @param integer $postId
     * 
     * @return object
     */
    public function getPost($postId)
    {
        return PeersForum::find($postId);
    }

    /**
     * Fetch PeersForums with the most comments
     * 
     * @return object
     */
    public function fetchMostCommentedPosts()
    {
        return DB::table('peers_forums')->join('peers_forum_comments', 'peers_forums.id', '=', 'peers_forum_comments.post_id')
            ->groupBy('peers_forum_comments.post_id')
            ->select('peers_forums.id', 'peers_forums.title', DB::raw("count('peers_forum_comments.post_id') AS postComments"))
            ->orderBy(DB::raw("count('peers_forum_comments.post_id')"), 'desc')
            ->get();
    }

    /**
     * Returns peers forum training page
     * 
     * @return mixed
     */
    public function forum()
    {
        $ncp = $this->fetchMostCommentedPosts();
        $posts = $this->fetchPosts();
        return view('peers.forum', compact('posts', 'ncp'));
    }

    /**
     * Register a new forum
     * 
     * @param Request $request
     * 
     * @return mixed
     */
    public function newPost(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'post'=>'required',
        ]);

        if ($this->new($request->title, $request->post, Auth::user()->id)) {
            notify()->success('Post created', 'Success');
            return redirect()->route('peers.forum');
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
        $post = $this->getPost($postId);
        if ($post) {
            $ncp = $this->fetchMostCommentedPosts();
            $comments = $post->comments;
            return view('peers.post', compact('post', 'comments', 'ncp'));
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

        if ($this->commentsController->newComment($request->post, $request->comment, Auth::user()->id)) {
            notify()->success('Comment posted', 'Success');
        } else {
            notify()->info('Something went wrong, please try again', 'Error');
        }
        return back();
    }

    /**
     * Returns posts made by user
     * 
     * @return view
     */
    public function userPosts()
    {
        $ncp = $this->fetchMostCommentedPosts();
        $posts = $this->getUserPosts(Auth::user()->id);
        return view('peers.user_topics', compact('posts', 'ncp'));
    }

    /**
     * Returns comments made by user
     * 
     * @return view
     */
    public function userComments()
    {
        $ncp = $this->fetchMostCommentedPosts();
        $comments = $this->commentsController->userComments(Auth::user()->id);
        return view('peers.user_answers', compact('comments', 'ncp'));
    }

    /**
     * Returns topics on the system
     * 
     * @return view
     */
    public function topics()
    {
        $ncp = $this->fetchMostCommentedPosts();
        $posts = $this->fetchPosts();
        return view('peers.topics', compact('posts', 'ncp'));
    }
}
