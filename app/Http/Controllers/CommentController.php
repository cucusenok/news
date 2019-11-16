<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function commentsByPost($id){
       $comments = Comment::with('user')
                    ->where('post_id', '=', $id)
                    ->get();

        return response()->json($comments);
    }
}
