@extends('layouts.master')
@section('title','Post')
@section('content')

    <div class="container mt-3">
      <div class="col-md-12">
        <div>
          <img class="rounded-lg" style="width: 600px; height: 300px;" src="{{asset('upload/'.$post->image)}}"
            class="card-img-top" alt="Image is not abaliable">
        </div>
        <div class="card">          
          <div class="card-body">
            <h5 class="card-title">{{$post->title}}</h5>
            <p class="card-text">{{$post->content}}</p>
            <p>Post By: {{$post->user->name}} on {{$post->created_at->diffForHumans()}}</p>
          <div><button class="btn btn-info btn-sm"><a href="{{url('/')}}"><i class="fa fa-angle-double-left"></i> Back</a></button></div>
          </div>
        </div>
        
        @foreach($comments as $comment)
          <p>&nbsp;&nbsp;&nbsp;{{$comment->user->name}} : {{$comment->content}}</p>
        @endforeach
      </div>
      @if(Auth::check())
      <div class="col-md-8 mt-3">
        <form method="post" action="{{url('admin/post/comment')}}">
          @csrf
          <div class="form-group">
            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
            <input type="hidden" name="commendable_id" value="{{$post->id}}">
            <input type="hidden" name="commendable_type" value="App\Post">
            <textarea class="form-control" rows="3" placeholder="Comment" name="content"></textarea>
          </div>
            <button class="btn btn-primary" type="submit">Comment</button>
          
          
        </form>
      </div>
      @endif
  </div>
@endsection