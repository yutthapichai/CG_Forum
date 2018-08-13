<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Like;
use Auth;
use Session;
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
}
