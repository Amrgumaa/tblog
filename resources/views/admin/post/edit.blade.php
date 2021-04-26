@extends('admin.layouts.app')
@section('head')
<!-- select2 start-->
<link rel="stylesheet" href="{{ asset('admin/assets/plugins/select2/css/select2.min.css') }}" />

<!-- sumernote start -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
</script>

<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
</script>
@endsection
@section('title', 'Edit Post')
@section('pagehead', 'Edit Post')
@section('maincontent')

<div class="d-flex justify-content-around">
    <div class="col-md-12">
        <div class="card card-info card-outline card-tabs">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h3 class="card-title btn btn-outline-info">Edit Record ID| {{ $post->id }}</h3>
                    <div>
                        <a href="{{route('post.index')}}"> <button type="button" class="btn btn-info ">Back</button></a>
                    </div>
                </div>
            </div>
            <x-alert />
            <form role="form" class="card-body" action="{{route('post.update',$post->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="card-body ">
                    <div style=" max-width: 400px; max-height:300px overflow-hidden;" class="col-md-12">
                        <img src="@if($post->image){{ $post->image }} @else   {{asset('storage/posts/'.$post->id.'/'.$post->image)}} @endif" class=" img-fluid" alt="{{$post->image}}">
                    </div>
                    <br>
                    <div class="row col-md-12">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Post ID:</label>
                                <label for="name">{{ $post->id }}</label>
                            </div>
                            <div class="form-group">
                                <label for="Created_at">Created at :{{ ($post->created_at )}} </label>
                            </div>
                            <div class="form-group">
                                <label for="Author">Author name :{{ ucfirst($post->user->name )}} </label>
                            </div>


                            <div class=" form-group">
                                <label for="image" class="col-form-label">Upload Image</label>
                                <div class="">
                                    <input id="image" type="file" class="form-control-file" name="image">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">

                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" id="title" placeholder="title" name="title" value="{{ $post->title }}">
                            </div>

                            <div class="form-group">
                                <label>Category</label>
                                <select class="form-control select2" id="category_id" name="category_id" style="width: 100%;">
                                    <option selected="selected">Select Category</option>
                                    @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" @if($post->category_id == $category->id) selected @endif >{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Tag</label>

                                <select class="select2" multiple="multiple" id="tag" data-placeholder="Select Tag" name="tags[]" style="width: 100%;">
                                    @foreach($tags as $tag)
                                    @foreach ($post->tags as $pt)
                                    <option value="{{ $tag->id }}" @if($tag->id == $pt->id) selected @endif >{{ $tag->name }}</option>
                                    @endforeach
                                    @endforeach
                                </select>
                            </div>

                        </div>

                        <div class="form-group">
                            <label for="">Sample post view : <a class="btn btn-success btn-xs mr-1" href="{{route('post.show',$post->id) }}"> <i class="fas fa-eye xl"> </i></a> </label><small>test purpose only</small>
                        </div>


                        <div class="card card-outline card-info">
                            <div class="card-header">
                                <h3 class="card-title">
                                    Bootstrap WYSIHTML5
                                    <textarea id="body" name="description" value="{{$post->description}}">{{$post->description}}</textarea>
                                </h3>
                                <script>
                                    $('#body').summernote({
                                        placeholder: 'Hello Bootstrap amr',
                                        value: 'oldbody',
                                        tabsize: 4,
                                        height: 100
                                    });
                                </script>
                                <div class=" card-tools">
                                    <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                        <i class="fas fa-minus"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-info">Update Record</button></a>
                </div>
            </form>
        </div>
    </div>
</div>
@section('foot')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script>
    $(function() {
        $("#tag").select2({});

    });
</script>
@endsection
@endsection
