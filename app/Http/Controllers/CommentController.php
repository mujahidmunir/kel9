<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function createComment(Request $request){
        Comment::create([
            'news_id' => $request->input('id'),
            'comment_usr_id' => Auth::user()->id,
            'comment' => $request->input('comment')
        ]);
        return back();
    }
}
