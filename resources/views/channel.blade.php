@extends('layouts.app')

@section('content')
   
   @foreach($discussions as $d)
        <div class="card">
            <div class="card-header">
                <img src="{{ $d->user->avatar}}" alt="" width="40px" hight="40px" >&nbsp;&nbsp;&nbsp;
                <span>{{ $d->user->name}}, <b>{{$d->created_at->diffForHumans()}} </b> </span>
                <a href="{{ route('discussion',['slug'=>$d->slug])}}" class="btn btn-default float-right">View</a>
            </div>

            <div class="card-body">
                <h6 class="text-center"><b>{{$d->title}}</b></h6>
                <p class="text-center">{{str_limit($d->content,50)}}</p>
            </div>
            <div class="card-footer">
                <p>{{$d->replies->count()}}Replies</p>
            </div>
        </div>
   @endforeach

 
@endsection
