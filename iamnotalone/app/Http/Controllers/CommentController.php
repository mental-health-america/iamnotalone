<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
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
        $comment = new Comment();
        $comment->post_id = $postId;
        $comment->comment = $com;
        $comment->user_id = $userId;
        return $comment->save();
    }
}
