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

                <div class="col-md-10 offset-md-1">
                    <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Role</th>
                        </tr>
                    </thead>
                @foreach($users as $user)
                    <tbody>
                        <tr>
                        <th scope="row">{{$user->id}}</th>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->role}}</td>
                        </tr>
                    </tbody>
                @endforeach    
                    </table>
                </div>
            
        </div>
       
    </div>
</div>
@endsection