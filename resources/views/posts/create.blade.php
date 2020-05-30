@extends('layouts.master')
@section('title','Post Create')
@section('content')

<div class="container col-md-8 col-md-offset-2">
    <div class="well mt-5">
        <form method="post" enctype="multipart/form-data">
            <!-- For Success Alert -->
            @if(session('status'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">{{session('status')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>
            @endif

            @foreach($errors->all() as $error)
            <p class="alert alert-danger">{{$error}}</p>
            @endforeach
            @csrf
            <div class="form-group">
                <label for="inputState">Choose Category</label><span class="pull-right"><button
                        class="btn btn-secondary">
                        <a href="{{url('admin/category/create')}}">Add Category</a></button></span>
                <select id="inputState" name="category" class="form-control">
                    @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                <label for="fortitle">Title</label>
                <input type="text" class="form-control" name="title" id="fortitle" placeholder="Title">
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Content</label>
                <textarea class="form-control" name="content" id="exampleFormControlTextarea1" rows="3"
                    placeholder="Content"></textarea>
            </div>
            <div class="form-group">
                <div class="custom-file">
                    <input type="file" name="image" class="custom-file-input" id="File01">
                    <label class="custom-file-label" for="File01"></label>
                </div>
            </div>
            <div>
                <button type="submit" class="btn btn-primary">Create</button>
            </div>
        </form>
    </div>

</div>

@endsection