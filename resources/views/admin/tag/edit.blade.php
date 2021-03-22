@extends('admin.layouts.app')
@section('head')

@endsection
@section('title', 'Edit Tag')
@section('pagehead', 'Edit Tag')
@section('maincontent')
<div class="d-flex justify-content-around">
    <div class="col-md-6">
        <div class="card card-info card-outline card-tabs">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h3 class="card-title btn btn-outline-info">Edit Record ID| {{ $tag->id }}</h3>
                    <div>
                        <a href="{{route('tag.index')}}"> <button type="button" class="btn btn-info ">Back</button></a>
                    </div>
                </div>
            </div>
            <x-alert />
            <form role="form" class="card-body" action="{{route('tag.update',$tag->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="card-body ">
                    <div class="form-group">
                        <label for="name">Tag ID:</label>
                        <label for="name">{{ $tag->id }}</label>
                    </div>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" placeholder="name" name="name" value="{{$tag->name}}">
                    </div>
                    <div class="form-group">
                        <label for="slug">Slug</label>
                        <input type="text" class="form-control" disabled id="slug" placeholder="slug" name="slug" value="{{$tag->slug}}">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" rows="4" placeholder="Enter Description here" name="description" value=" ">{{$tag->description}}</textarea>
                    </div>
                    <button type="submit" class="btn btn-info">Update Record</button></a>
                </div>

            </form>

        </div>
    </div>
</div>
@section('foot')

@endsection
@endsection
