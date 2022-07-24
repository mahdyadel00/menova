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

        $reply =  Comment::query()->create([

            'user_id'  => auth()->user()->id,
            'parent_id'  => $request->discussess_id,
            'comment'  =>   $request->comment,
        ]);

        session()->flash('success', __('site.sent_mail_for_reviewing'));
        return redirect()->back();
    }



}
