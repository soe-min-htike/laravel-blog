@extends('layouts.master')
@section('title','My Media')
@section('content')

<div class="container-fluid jumbotrom" style="background-color: #e9ecef;">
  <div class="view"
    style="background-image: url('https://mdbootstrap.com/img/Photos/Others/images/91.jpg'); background-repeat: no-repeat; background-size: cover; background-position: center center;">
    <h1 class="display-3" style="color: antiquewhite;">Knowledge Share</h1>
    <div class="container col-md-8 col-md-offset-2">
      <h4 style="color: blanchedalmond;">The eventual demarcation of philosophy from science was made possible by the notion that philosophy's core was "theory
      of knowledge," a theory distinct from the sciences because it was their foundation... Without this idea of a "theory of
      knowledge," it is hard to imagine what "philosophy" could have been in the age of modern science.</h4>
    </div>
  </div>

    <div class="container">
      <div class="row col-md-6">
        <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="search" name="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fa fa-search"></i></button>
        </form>
      </div>
    </div>

  <div class="container mt-3">
    <div class="row">
      @foreach($posts as $post)
      <div class="col-md-4 mb-3">
        <div class="card">
          <a href="{{url("post/view/$post->id")}}">
          <img class="img-fluid rounded-lg" src="{{asset('upload/'.$post->image)}}" class="card-img-top" alt="Image is not abaliable"></a> 
          
          <div class="card-body">
            <h5 class="card-title"><a style="color: black;" href="{{url("post/view/$post->id")}}">{{$post->title}}</a></h5>

            <p class="card-text">{{ Str::limit($post->content, 200, '...')}}
              <a style="color:rgb(6, 151, 156);" href="{{url("post/view/$post->id")}}">Read More</a></p>
            <p>Post By: {{$post->user->name}} on {{$post->created_at->diffForHumans()}}</p>
            <!-- For Category Name -->
            <button class="btn btn-secondary btn-sm"><a href="{{url("postbycategory/$post->category_id")}}">{{$post->category->name}}</a></button>
          </div>
        </div>
      </div>
      <!-- pagination -->
      @endforeach
      <div class="container col-md-12">
        {{ $posts->links() }}
      </div>
    </div>
  </div>
  </div>
    
  @endsection