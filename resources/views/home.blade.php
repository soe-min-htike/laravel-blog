@extends('layouts.master')
@section('content')
<div class="container-fluid">
    <div class="row mt-3">
        <div class="col-md-3">
            <div class="card" style="background-color:#94C6F7">
                <div class="card-header">
                    <ul class="list-unstyled">
                        <li><h3>{{Auth::user()->name}}</h3></li>
                        <li>{{Auth::user()->email}}</li>
                    </ul>
                </div>
                <div class="card-body">
                    
                    <a href="{{url('admin/post/create')}}"><button class="btn btn-primary btn-lg btn-block">Create Post</button></a>
                    @can('isAdmin')
                    <a href="{{url('admin/users/all')}}"><button class="btn btn-primary btn-lg btn-block">All Users</button></a>
                    @endcan
                </div>
            </div>
        </div>
        <div class="col-md-8">
                <!-- For Success Alert -->
            @if(session('status')) 
                <div class="alert alert-success alert-dismissible fade show" role="alert">{{session('status')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                </div>
            @endif
            @foreach($posts as $post)
            <div class="card mb-5">

                <div class="card-header">
                    <div>
                        <img rounded-lg" style="width: 200px; height: 100px;" src="{{asset('upload/'. $post->image)}}" class="card-img-top" alt="Image is not abaliable">
                    </div>                    
                    <strong>{{$post->title}}</strong>                    
                </div>
                <div class="card-body">
                    <p>{{$post->content}}</p>
                    <a href="{{url("admin/post/edit/$post->id")}}"><button class="btn btn-primary data-toggle="tooltip" data-placement="bottom" title="Edit"><i class="fa fa-edit"></i></button></a>
                    <a href="{{url("admin/post/delete/$post->id")}}"><button class="btn btn-primary data-toggle="tooltip" data-placement="bottom" title="Edit"><i class="fa fa-trash"></i></button></a>
                </div>
            </div>
            @endforeach
            <div class="container col-md-12">
                {{ $posts->links() }}
            </div>
        </div>
       
    </div>
</div>
@endsection
