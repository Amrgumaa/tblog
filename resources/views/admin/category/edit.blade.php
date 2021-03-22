@extends('admin.layouts.app')
@section('head')

@endsection
@section('title', 'Edit Category')
@section('pagehead', 'Edit Category')
@section('maincontent')

<div class="d-flex justify-content-around">
    <div class="col-md-6">
        <div class="card card-info card-outline card-tabs">
            <div class="card-header">
                <div class="d-flex justify-content-between ">
                    <h3 class="card-title btn btn-outline-info">Edit Record ID| {{ $category->id }}</h3>
                    <div>
                        <a href="{{route('category.index')}}"> <button type="button" class="btn btn-info ">Back</button></a>
                    </div>

                </div>
            </div>
            <x-alert />
            <form role="form" class="card-body" action="{{route('category.update',$category->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="card-body ">
                    <div class="form-group">
                        <label for="name">Category ID:</label>
                        <label for="name">{{ $category->id }}</label>
                    </div>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" placeholder="name" name="name" value="{{$category->name}}">
                    </div>
                    <div class="form-group">
                        <label>Color</label>
                        <select class="form-control select2" id="color_id" name="color_id" style="width: 100%;">

                            <option selected="selected">Select Color</option>
                            @foreach ($colors as $color)
                            <option value="{{ $color->id }}" @if($category->color_id == $color->id) selected @endif >{{ $color->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="slug">Slug</label>
                        <input type="text" class="form-control" disabled id="slug" placeholder="slug" name="slug" value="{{$category->slug}}">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" rows="4" placeholder="Enter Description here" name="description" value=" ">{{$category->description}}</textarea>
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
