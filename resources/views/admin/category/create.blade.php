@extends('admin.layouts.app')
@section('head')

@endsection
@section('title', 'Create Category')
@section('pagehead', 'Create Category')
@section('maincontent')
<div class="d-flex justify-content-around">
    <div class="col-md-6">
        <div class="card card-info card-outline card-tabs">
            <div class="card-header">
                <div class="d-flex justify-content-between d-flex align-items-center">
                    <h3 class="card-title">Add new Category</h3>
                    <div>
                        <a href="{{route('category.index')}}"> <button type="button" class="btn btn-info ">Back</button></a>
                    </div>
                </div>
            </div>
            <x-alert />
            <form role="form" class="card-body" action="{{route('category.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body ">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" placeholder="name" name="name" value="{{ old('name') }}">
                    </div>
                    <div class="form-group">
                        <label>Color</label>
                        <select class="form-control select2" id="color_id" name="color_id" style="width: 100%;">
                            <option selected="selected">Select Color</option>
                            @foreach ($colors as $color)
                            <option value="{{ $color->id }}">{{ $color->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" rows="4" placeholder="Enter Description here" name="description" value="">{{ old('description') }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-info">Create New Record</button></a>
                </div>

            </form>
        </div>

    </div>
</div>

@section('foot')


@endsection
@endsection
