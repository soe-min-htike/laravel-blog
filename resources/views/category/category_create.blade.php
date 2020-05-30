@extends('layouts.master')
@section('title','Category Create')
@section('content')
<div class="container col-md-8 col-md-offset-2">
    <div class="well mt-5">
        <form method="post">
            @foreach($errors->all() as $error)
            <p class="alert alert-danger">{{$error}}</p>
            @endforeach
            @csrf
            <div class="form-group">
                <label for="fortitle">Add Category Name</label>
                <input type="text" class="form-control" name="name" id="fortitle" placeholder="Category Name">
            </div>
            <div>
                <button type="submit" class="btn btn-primary">Create</button>
            </div>
        </form>
    </div>
</div>
@endsection