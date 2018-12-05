@extends('layouts.app')

@section('content')
   
   @foreach($discussions as $d)
        <div class="card">
            <div class="card-header">
                <img src="{{ $d->user->avatar}}" alt="" width="70px" hight="70px" >
            </div>

            <div class="card-body">
                {{$d->content}}
            </div>
        </div>
   @endforeach  

   <div class="text-center">
        {{$discussions->links()}}
   </div>  
@endsection
