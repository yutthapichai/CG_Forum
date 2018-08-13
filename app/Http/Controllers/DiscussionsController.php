<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Discussion;
use Auth;
use Session;
class DiscussionsController extends Controller
{
    public function create()
    {
      return view('discussions.create');
    }

    public function show($slug)
    {
      $discussion = Discussion::where('slug', $slug)->first();
      return view('discussions.show')->with('discussion', $discussion);
    }

    public function store()
    {
      $r = request();
      $this->validate($r,[
        'title' => 'required',
        'content' => 'required',
        'channel_id' => 'required'
      ]);
       $discussion = Discussion::create([
        'title' => $r->title,
        'content' => $r->content,
        'channel_id' => $r->channel_id,
        'user_id' => Auth::id(),
        'slug' => str_slug($r->title)
      ]);

      Session::flash('success', 'Discussion successfully create');
      return redirect()->route('discussion.show', ['slug' => $discussion->slug ]);
    }
}
