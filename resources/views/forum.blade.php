@extends('layouts.app')

@section('content')
   
   @foreach($discussions as $d)
        <div class="card">
            <div class="card-header">
                <img src="{{ $d->user->avatar}}" alt="" width="40px" hight="40px" >&nbsp;&nbsp;&nbsp;
                <span>{{ $d->user->name}}, <b>{{$d->created_at->diffForHumans()}} </b> </span>
                
                <a href="{{ route('discussion',['slug'=>$d->slug])}}" class="btn btn-default btn-xs float-right" style="margin-left:9px;">View</a>
                @if($d->hasBestAnswer())
                    <span class="btn btn float-rigth bnt-success btn-xs">Closed</span>
                @else
                    <span class="btn btn float-rigth bnt-danger btn-xs">Open</span>
                @endif
            </div>

            <div class="card-body">
                <h6 class="text-center"><b>{{$d->title}}</b></h6>
                <p class="text-center">{{str_limit($d->content,50)}}</p>
            </div>
            <div class="card-footer">
                <span>{{$d->replies->count()}}Replies</span>
                <a href="{{ route('channel',['slug'=>$d->channel->slug])}} " class="float-right btn btn-default btn-xs">{{$d->channel->title}}</a>
            </div>
        </div>
   @endforeach

   <div class="float-center">
        {{$discussions->links()}}
   </div>  
@endsection
