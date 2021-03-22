@extends('admin.layouts.app')
@section('head')

@endsection
@section('title', 'Create New Tag')
@section('pagehead', 'Create New Tag')
@section('maincontent')
<div class="d-flex justify-content-around">
    <div class="col-md-6">
        <div class="card card-info card-outline card-tabs">
            <div class="card-header">
                <div class="d-flex justify-content-between d-flex align-items-center">
                    <h3 class="card-title">Add new Tag </h3>
                    <div>
                        <a href="{{route('tag.index')}}"> <button type="button" class="btn btn-info ">Back</button></a>
                    </div>
                </div>
            </div>
            <x-alert />
            <form role="form" class="card-body" action="{{route('tag.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body ">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" placeholder="name" name="name" value="{{ old('name') }}">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" rows="4" placeholder="Enter Description here" name="description" value=" ">{{ old('description') }}</textarea>
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
