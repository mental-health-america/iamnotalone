<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PeersForumComments;

class PeersForumCommentsController extends Controller
{
    /**
     * Create new comment
     *
     * @param integer $postId post id
     * @param string $com post comment
     * @param integer $userId user id
     * 
     * @return boolean
     */
    public function newComment($postId, $com, $userId)
    {
        $comment = new PeersForumComments();
        $comment->post_id = $postId;
        $comment->comment = $com;
        $comment->user_id = $userId;
        return $comment->save();
    }

    /**
     * Get users comments
     * 
     * @param integer $id userId
     * 
     * @return object
     */
    public function userComments($id)
    {
        return PeersForumComments::where('user_id', $id)->paginate(10);
    }
}
