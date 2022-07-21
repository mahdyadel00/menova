<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\DiscussRequest;
use App\Mail\PublishDiscussMail;
use App\Models\Comment;
use App\Models\Discuss;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class DiscussController extends Controller
{

    public function index()
    {
        $discusses = Discuss::published()->with(['user', 'topic'])
            ->orderBy('id', 'DESC')
            ->limit(10)
            ->get();
        $trending_topics = $this->getTrendingList();

        $topics = Topic::with('discusses')->get();
        return view('frontend.discuss', compact('discusses', 'trending_topics','topics'));
    }

    public function create()
    {
        $trending_topics = $this->getTrendingList();
        $topics = Topic::get();
        $comments = Comment::with(['user' , 'replies'])->get();
        $discusses = Discuss::where('published' , 1)->with(['user', 'topic'])
        ->orderBy('id', 'DESC')
        ->limit(10)
        ->get();

        return view('frontend.discuss', compact('trending_topics', 'topics' , 'comments' , 'discusses'));
    }

    public function store(DiscussRequest $request)
    {
        // dd($request->all());
        $data = $request->validated();

        $data['user_id'] = auth()->id();

        $discuss = Discuss::create($data);

        // Send mail to admin for approval.
        // Mail::to(env('MAIL_FROM_ADDRESS'))->send(new PublishDiscussMail(['discuss' => $discuss]));

        session()->flash('success', __('site.sent_mail_for_reviewing'));
        return redirect()->route('discusses.create');
    }

    public function show($uuid)
    {
        $discuss = Discuss::with(['topic', 'user', 'comments.user', 'likes'])
            ->published()
            ->whereUuid($uuid)
            ->get();
        if (!$discuss)
            abort(404);
        $trending_topics = $this->getTrendingList();
        return view('frontend.discusses.show', compact('trending_topics', 'discuss'));
    }

    private function getTrendingList()
    {
        return Topic::with([
            'discusses' => function($query){

                $query->where('published' , 1);
            }
            ])
            ->withCount('discusses')
            ->orderBy('discusses_count', 'desc')
            ->limit(10)
            ->get();
    }

    protected function single(Request $request){

        $trending_topics = $this->getTrendingList();
        $topics = Topic::get();
        $comments = Comment::with(['user' , 'replies'])->get();
        $discusses = Discuss::where('published' , 1)->with(['user', 'topic'])
        ->orderBy('id', 'DESC')
        ->limit(10)
        ->get();

        return view('frontend.discuss01' , compact('discusses'));
    }
}
