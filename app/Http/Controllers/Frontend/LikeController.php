<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Discuss;
use App\Models\Like;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function like(Request $request)
    {
        if ($request->ajax()) {
            $discuss = Discuss::find($request->id);
            if ($discuss->likes->contains('user_id', auth()->id())) {
                $discuss->likes()->where('user_id', auth()->id())->delete();
            } else {
                $like = new Like();
                $like->user()->associate($request->user());
                $discuss->likes()->save($like);
            }
            return response()->json(['likes' => $discuss->likes()->count()]);
        }

        return redirect()->back();
    }
}