@extends('layouts.app')

@section('content')
   <div class="card">
       <div class="card-header text-center">Update a Discussion</div>

       <div class="card-body">
           @if (session('status'))
               <div class="alert alert-success" role="alert">
                   {{ session('status') }}
               </div>
           @endif

           <form action="{{ route('discussion.update',['id'=>$discussion->id])}}" method="post">
                {{csrf_field}}
       
              
                <div class="form-group">
                    <label for="content">Ask a question</label>
                    <textarea name="content" id="content" cols="30" rows="10" class="form-control">{{$discussion->content}}</textarea>
                </div>
                <div class="form-group">
                    <button class="btn btn-success pull-right" type="submit">Save Discussion Changes</button>
                </div>
           </form>
       </div>
   </div>
       
@endsection
