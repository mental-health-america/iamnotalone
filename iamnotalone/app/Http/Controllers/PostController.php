<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Create new post
     * 
     * @param string $title post title
     * @param integer $eventId event id
     * @param string $body post body/content
     * @param integer $userId user id
     * 
     * @return boolean
     */
    public function newPost($title, $eventId, $body, $userId)
    {
        $post = new Post;
        $post->title = $title;
        $post->event_id = $eventId;
        $post->body = $body;
        $post->user_id = $userId;
        return $post->save();
    }

    /**
     * Fetch aproved posts
     * 
     * @return object
     */
    public function fetchPost()
    {
        return Post::paginate(10);
    }

    /**
     * Return posts made by user
     * 
     * @param integer $userId user id
     * 
     * @return object
     */
    public function userPosts($userId)
    {
        return Post::where('user_id', $userId)->paginate(10);
    }

    /**
     * Return a single post
     * 
     * @param integer $postId
     * 
     * @return object
     */
    public function getPost($postId)
    {
        return Post::find($postId);
    }

    /**
     * Fetch posts with the most comments
     * 
     * @return object
     */
    public function fetchMostCommentedPosts()
    {
        return DB::table('posts')->join('comments', 'posts.id', '=', 'comments.post_id')
            ->groupBy('comments.post_id')
            ->select('posts.id', 'posts.title', DB::raw("count('comments.post_id') AS postComments"))
            ->orderBy(DB::raw("count('comments.post_id')"), 'desc')
            ->get();
    }

    /**
     * Returns posts about a particular event.
     * 
     * @param integer $id event id
     * 
     * @return object
     */
    public function eventPosts($id)
    {
        return Post::where('event_id', $id)->paginate(10);
    }
}
