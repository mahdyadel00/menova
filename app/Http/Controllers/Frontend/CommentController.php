<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\CommentRequest;
use App\Models\Discuss;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(CommentRequest $request)
    {
        $comment = new Comment();

        $comment->comment = $request->comment;

        $comment->user()->associate($request->user());

        $discuss = Discuss::find($request->discuss_id);

        $discuss->comments()->save($comment);

        return back();
    }

    public function replyStore(CommentRequest $request)
    {
        $reply = new Comment();

        $reply->comment = $request->get('comment');

        $reply->user()->associate($request->user());

        $reply->parent_id = $request->get('comment_id');

        $discuss = Discuss::find($request->get('discuss_id'));
        // dd($discuss);

        $discuss->comments()->save($reply);

        return back();
    }
}