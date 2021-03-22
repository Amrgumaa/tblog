@extends('admin.layouts.app')
@section('head')

@endsection
@section('title', 'Edit User')
@section('pagehead', 'Edit User')
@section('maincontent')
<div class="card card-outline-light col-md-6 offset-2">
    <div class="card-header">
        <div class="d-flex justify-content-between ">
            <h3 class="card-title btn btn-outline-primary">Edit Record id ({{ $user->id }})</h3>
            <div>
                <a href="{{route('user.index')}}"> <button type="button" class="btn btn-primary ">Back</button></a>
            </div>
        </div>
    </div>
    <x-alert />
    <form role="form" class="card-body" action="{{route('user.update',$user->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="card-body">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" placeholder="name" name="name" value="{{ ucfirst($user->name) }}">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" id="" aria-describedby="helpId" placeholder="Enter Email" value=" {{ucfirst($user->email)}}">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="Enter password">
            </div>


            <div class=" form-group">
                <label>Description</label>
                <textarea class="form-control" rows="3" placeholder="Enter Description" name="description">{{ $user->description}}</textarea>
            </div>
            <div class="form-group">
                <label for="image" class="col-form-label">Upload Image</label>
                <div class="">
                    <input id="image" type="file" class="form-control-file" name="image">
                </div>
            </div>
            <button type="submit" class="btn btn-success">Update Record</button>
        </div>
    </form>


</div>
@section('foot')

@endsection
@endsection
