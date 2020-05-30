@extends('layouts.master')
@section('title','Post Edit')
@section('content')
    
<div class="container col-md-8 col-md-offset-2">
    <div class="well mt-5">
        <form method="post" enctype="multipart/form-data">
        

            @foreach($errors->all() as $error)
                <p class="alert alert-danger">{{$error}}</p>
            @endforeach

            @csrf
            <div class="form-group">
                <label for="inputState">Choose Category</label><span class="pull-right"><button class="btn btn-secondary">
                    <a href="{{url('admin/category/create')}}">Add Category</a></button></span>
                
                <select id="inputState" name="category" class="form-control">
                    @foreach($categories as $category)
                    <option value="{{$category->id}}"
                        @if($posts->category_id == $category->id)
                        selected="selected"
                        @endif
                        >{{$category->name}}</option>
                    @endforeach
                </select>

            </div>
            <div class="form-group">
                <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                <label for="fortitle">Title</label>
                <input type="text" class="form-control" name="title" id="fortitle" value="{{$posts->title}}">
            </div>

            <div class="form-group">
                <label for="exampleFormControlTextarea1">Content</label>
                <textarea class="form-control" name="content" id="exampleFormControlTextarea1" rows="3">{{$posts->content}}
                </textarea>
            </div>         
            <div class="form-group">
                <label for="exampleFormControlFile1">Image Upload</label>
                <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1">
            </div>
            <div>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>

</div>

@endsection