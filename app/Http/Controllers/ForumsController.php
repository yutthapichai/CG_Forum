<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use App\Discussion;
use App\Channel;
use Auth;
class ForumsController extends Controller
{
    public function index()
    {
      switch (request('filter')) {
        case 'me':
            $discussions = Discussion::where('user_id',Auth::id())->orderBy('created_at', 'desc')->paginate(3);
            break;
        case 'solved':
            $answered = array();
            foreach(Discussion::all() as $d){
              if($d->hasBestAnswer()){
                array_push($answered,$d);
              }
            }
            $discussions = new Paginator($answered, 3);
            break;
        case 'unsolved':
            $answered = array();
            foreach(Discussion::all() as $d){
              if(!$d->hasBestAnswer()){
                array_push($answered,$d);
              }
            }
            $discussions = new Paginator($answered, 3);
            break;
        default:
            $discussions = Discussion::orderBy('created_at', 'desc')->paginate(3);
            break;
      }

      return view('forum', ['discussions' => $discussions]);
    }


    public function channel($slug)
    {
      $channel = Channel::where('slug',$slug)->first();
      //channel * Model method discussions() if use another method ->paginate should has ()
      return view('channel')->with('discussions',$channel->discussions()->orderBy('created_at', 'desc')->paginate(10));
    }
}
