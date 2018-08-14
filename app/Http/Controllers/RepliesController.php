<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Like;
use Auth;
use Session;
use App\Reply;
class RepliesController extends Controller
{
    public function like($id)
    {
      Like::create([
        'reply_id' => $id,
        'user_id' => Auth::id()
      ]);
      Session::flash('success', 'You liked the reply');
      return redirect()->back();
    }

    public function unlike($id)
    {
      $like_id = Like::where('reply_id', $id)->where('user_id', Auth::id())->first();
      $like_id->delete();
      Session::flash('danger', 'You have been unlike!');
      return redirect()->back();
    }

    public function best_answer($id)
    {
      $reply = Reply::find($id);
      $reply->best_answer = 1;
      $reply->save();

      $reply->user->points += 100;
      $reply->user->save();

      Session::flash('success', 'You have been marked as the best answer!');
      return redirect()->back();
    }

    public function unbest_answer($id)
    {
      $reply = Reply::find($id);
      $reply->best_answer = 0;
      $reply->save();
      Session::flash('info', 'You have been unmarked!!');
      return redirect()->back();
    }
}
