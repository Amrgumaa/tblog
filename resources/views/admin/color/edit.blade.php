@extends('admin.layouts.app')
@section('head')

@endsection
@section('title', 'Edit color')
@section('pagehead', 'Edit color')
@section('maincontent')
<div class="d-flex justify-content-around">
    <div class="col-md-6">

        <div class="card card-info card-outline card-tabs">
            <div class="card-header">
                <div class="d-flex justify-content-between ">
                    <h3 class="card-title btn btn-outline-info">Edit Record ID| {{ $color->id }}</h3>
                    <div>
                        <a href="{{route('color.index')}}"> <button type="button" class="btn btn-info ">Back</button></a>
                    </div>
                </div>
            </div>
            <x-alert />
            <form role="form" class="card-body" action="{{route('color.update',$color->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="card-body ">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" placeholder="name" name="name" value="{{$color->name}}">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" rows="4" placeholder="Enter Description here" name="description" value=" ">{{$color->description}}</textarea>
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
