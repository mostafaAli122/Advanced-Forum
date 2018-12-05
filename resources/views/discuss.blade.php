@extends('layouts.app')

@section('content')
   <div class="card">
       <div class="card-header text-center">Create a New Discussion</div>

       <div class="card-body">
           @if (session('status'))
               <div class="alert alert-success" role="alert">
                   {{ session('status') }}
               </div>
           @endif

           <form action="{{ route('discussions.store')}}" method="post">
                {{csrf_field}}
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" class="form-group">
                </div>
                <div class="form-group">
                    <label for="channel" class="form-control">Pick a Channel</label>
                    <select name="channel_id" id="channel_id" class="form-control">
                        @foreach($channels as $channel)
                            <option value="{{$channel->id}}">{{$channel->title}}</option>
                        @endforeach
                        
                    </select>
                </div>
                <div class="form-group">
                    <label for="content">Ask a question</label>
                    <textarea name="content" id="content" cols="30" rows="10" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <button class="btn btn-success pull-right" type="submit">Creaate a Discussion</button>
                </div>
           </form>
       </div>
   </div>
       
@endsection
