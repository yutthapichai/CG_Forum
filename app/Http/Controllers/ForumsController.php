<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Discussion;
use App\Channel;
class ForumsController extends Controller
{
    public function index()
    {
      $discussions = Discussion::orderBy('created_at', 'desc')->paginate(3);
      return view('forum', ['discussions' => $discussions]);
    }

    public function channel($slug)
    {
      $channel = Channel::where('slug',$slug)->first();
      //channel * Model method discussions() if use another method ->paginate should has ()
      return view('channel')->with('discussions',$channel->discussions()->orderBy('created_at', 'desc')->paginate(10));
    }
}
