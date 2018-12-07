@extends('layouts.app')

@section('content')
        <div class="card">
            <div class="card-header">
                <img src="{{ $d->user->avatar}}" alt="" width="40px" hight="40px" >&nbsp;&nbsp;&nbsp;
                <span>{{ $d->user->name}}, <b>{{$d->created_at->diffForHumans()}} </b> </span>
                    @if($d->is_being_watched_by_auth_user())
                        <a href="{{ route('discussion.unwatch',['id'=>$d->id])}}" class="btn btn-default btn-xs float-right">Unwatch</a>
                    @else
                        <a href="{{ route('discussion.watch',['id'=>$d->id])}}" class="btn btn-default btn-xs float-right">Watch</a>
                    @endif
            </div>

            <div class="card-body">
                <h6 class="text-center"><b>{{$d->title}}</b></h6>
               <hr> <p class="text-center">{{$d->content}}</p>
               <hr>
               @if($best_answer)
                    <div class="text-center" style="padding:40px">
                        <h3 class="text-center">Best Answer</h3>
                        <div class="panel panel-success">
                            <div class="panel-heading">
                                <img src="{{ $best_answer->user->avatar}}" alt="" width="40px" hight="40px" >&nbsp;&nbsp;&nbsp;
                                <span>{{ $best_answer->user->name}}</span>
                            </div>
                            <div class="panel-body">
                                {{$best_answer->content}}
                            </div>
                        </div>
                    </div>
                @endif
            </div>
            <div class="card-footer">
                <span>{{$d->replies->count()}}Replies</span>
                <a href="{{ route('channel',['slug'=>$d->channel->slug])}} " class="float-right btn btn-default btn-xs">{{$d->channel->title}}</a>
            </div>
        </div>
        @foreach($d->replies as $r)
            <div class="card">
                <div class="card-header">
                    <img src="{{ $r->user->avatar}}" alt="" width="40px" hight="40px" >&nbsp;&nbsp;&nbsp;
                    <span>{{ $r->user->name}}, <b>{{$r->created_at->diffForHumans()}} </b> </span>
                    @if(!$best_answer)
                        <a href="{{ route('discussion.best.answer',['id'=>$r->id])}} " class="btn btn-xs btn-info float-right">Mark as best answer</a>
                    @endif
                </div>

                <div class="card-body">
                    <p class="text-center">{{$r->content}}</p>
                </div>
                <div class="card-footer">
                    @if($r->is_liked_by_auth_user())
                        <a href="{{ route('reply.unlike',['id'=>$r->id])}}" class="btn btn-danger btn-xs">Unlike <span class="badge">{{$r->likes->count()}} </span> </a>
                    @else
                    <a href=" {{ route('reply.unlike',['id'=>$r->id])}}" class="btn btn-success btn-xs">Like <span class="badge">{{$r->likes->count()}} </span></a>
                    @endif
                </div>
            </div>
        @endforeach
        <div class="card">
            <div class="card-body">
                @if(Auth::check())
                    <form action="{{route('discussion.reply',['id'=>$d->id])}}" method="POST">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="reply">Leave a Reply ....</label>
                            <textarea name="reply" id="reply" cols="30" rows="10" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <button class="btn float-right">Reply</button>     
                        </div>
                    </form>
                @else
                    <div class="float-center"><h2>Sign In To Reply</h2> </div>
                @endif
            </div>
        </div>
@endsection
