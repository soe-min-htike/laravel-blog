@extends('layouts.master')
@section('title','My Media')
@section('content')

<div class="container-fluid jumbotrom" style="background-color: #e9ecef;">
  <div class="view"
    style="background-image: url('https://mdbootstrap.com/img/Photos/Others/images/91.jpg'); background-repeat: no-repeat; background-size: cover; background-position: center center;">
    <h1 class="display-3" style="color: antiquewhite;">City Media</h1>
    <div class="container col-md-8 col-md-offset-2">
      <p style="color: black;">This is a template for a simple marketing or informational website. It includes
        large callout called a jumbotron and three supporting pieces of content. Use it as a starting point to create
        something more unique.</p>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-md-9">
      </div>
         
    </div> 
  </div>
  </div>

  <div class="container mt-3">
    <div class="row">
      @foreach($posts as $post)
      <div class="col-md-6 mb-3">
        <div class="card">
          <img src="..." class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title"><a style="color: black;" href="{{url("post/view/$post->id")}}">{{$post->title}}</a></h5>

            <p class="card-text">{{ Str::limit($post->content, 200, '...')}}<a style="color:blue;" href="{{url("post/view/$post->id")}}">See More</a></p>
            <p>Post By: {{$post->user->name}} on {{$post->created_at->diffForHumans()}}</p>
            <!-- For Category Name -->
            <button class="btn btn-secondary btn-sm"><a href="{{url("postbycategory/$post->category_id")}}">{{$post->category->name}}</a></button>
          </div>
        </div>
      </div>
      @endforeach
      <div class="col-md-12">
        {{ $posts->links() }}
      </div>
    </div>
  </div>
    
  @endsection