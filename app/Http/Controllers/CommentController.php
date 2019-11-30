<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function commentsByPost($id)
    {
        $comments = Comment::with('user')
            ->where('post_id', '=', $id)
            ->where('parent_id', '=', 0)
            ->get();


        dd($comments);
        die();
        return response()->json($comments);
    }

    public function commentChildren($id)
    {

    }

}
