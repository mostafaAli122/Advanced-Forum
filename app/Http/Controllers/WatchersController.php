<?php

namespace App\Http\Controllers;
use App\Watcher;
use Auth;
use Session;
use Illuminate\Http\Request;

class WatchersController extends Controller
{
    public function watch($id){
        Watcher::create([
            'discussion_id' => $id,
            'user_id' => Auth::id()
        ]);
        Session::falsh('success','You Are Watching This Discussion.');
        return redirect()->back();
    }
    public function unwatch($id){
       $watcher= Watcher::where('discussion_id',$id)->where('user_id',Auth::id());
       $watcher->delete();
        Session::falsh('success','You Are No Longer Watching This Discussion.');
        return redirect()->back();
    }
}
