<?php

namespace App\Http\Controllers;
use App\Discussion;
use Auth;
use App\Reply;
use Session;
use App\User;
use Notification;
use Illuminate\Http\Request;

class DiscussionController extends Controller
{
    public function create(){
        return view('discuss'); 
    }
    public function store(){
        $r=request();
        $this->validate($r,[
            'channel_id'=>'required',
            'content'=>'required',
            'title'=>'required',
            'slug'=>str_slug($r->title)
        ]);
        $discussion=Discussion::create([
            'title'=>$r->title,
            'content'=>$r->content,
            'channel_id'=>$r->channel_id,
            'user_id'=>Auth::id( )
        ]);
        Session::flash('success','Discussion Successfully Created .');
        return redirect()->route('discussion',['slug'=>$discussion->slug]);
    }
    public function show($slug){
        $discussion=Discussion::where('slug',$slug)->first();
        return view('discussion.show')->with('d',$discussion);
    }
    public function reply($id){
        $discussion=Discussion::find($id);
        $reply=Reply::create([
            'user_id'=>Auth::id(),
            'discussion_id'=>$id,
            'content'=>request()->reply
        ]);
        $watchers=array();
        foreach($discussion->watchers as $watcher)
            array_push($watchers,User::find($watcher->user_id));
        Notification::send($watchers,new \App\Notifications\NewReplyAdded($discussion));

        Session::flash('success',' Successfully Reply To The Discussion.');
        return redirect()->back();
    }
}
