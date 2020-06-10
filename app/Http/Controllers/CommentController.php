<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
    public function commentsByPost($id)
    {

        $comments = Comment::with('user')
            ->where(   'post_id', '=', $id)
            ->where('parent_id', '=', 0)
            ->paginate(10);

        return response()->json($comments);
    }

    public function commentChildren($id)
    {

    }

}
