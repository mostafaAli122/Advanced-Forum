@extends('layouts.app')

@section('content')
        <div class="card">
            <div class="card-header">
                <img src="{{ $d->user->avatar}}" alt="" width="40px" hight="40px" >&nbsp;&nbsp;&nbsp;
                <span>{{ $d->user->name}}, <b>{{$d->created_at->diffForHumans()}} </b> </span>
                <a href="{{ route('discussion',['slug'=>$d->slug])}}" class="btn btn-default float-right">View</a>
            </div>

            <div class="card-body">
                <h6 class="text-center"><b>{{$d->title}}</b></h6>
               <hr> <p class="text-center">{{$d->content}}</p>
            </div>
            <div class="card-footer">
                <p>{{$d->replies->count()}}Replies</p>
            </div>
        </div>
        @foreach($d->replies as $r)
            <div class="card">
                <div class="card-header">
                    <img src="{{ $r->user->avatar}}" alt="" width="40px" hight="40px" >&nbsp;&nbsp;&nbsp;
                    <span>{{ $r->user->name}}, <b>{{$r->created_at->diffForHumans()}} </b> </span>
                </div>

                <div class="card-body">
                    <p class="text-center">{{$r->content}}</p>
                </div>
                <div class="card-footer">
                    <p>Like</p>
                </div>
            </div>
        @endforeach
@endsection
