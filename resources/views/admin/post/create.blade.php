@extends('admin.layouts.app')
@section('head')
<!-- select2 start -->
<link rel="stylesheet" href="{{ asset('admin/assets/plugins/select2/css/select2.min.css') }}" />
<link rel="stylesheet" href="{{ asset('admin/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}" />
<!-- select2end -->
<!-- sumernote start -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
<!-- summernote end -->
@endsection
@section('title', 'Create Post')
@section('pagehead', 'Create Post')
@section('maincontent')
<section>
    <div class="d-flex justify-content-around">
        <div class="col-md-12">
            <div class="card card-info card-outline card-tabs">
                <div class="card-header ">
                    <div class="d-flex justify-content-between d-flex align-items-center">
                        <h3 class="card-title">Add new post</h3>
                        <div>
                            <a href="{{route('post.index')}}"> <button type="button" class="btn btn-info ">Back</button></a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <x-alert />
                    <form role="form" class="card-body" action="{{route('post.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-6">

                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" id="title" placeholder="title" name="title" value="{{ old('title') }}">
                            </div>
                            <div class="form-group">
                                <label>Category</label>
                                <select class="form-control select2" id="category_id" name="category_id" style="width: 100%;">
                                    <option selected="selected">Select Category</option>
                                    @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Tag</label>
                                <select class="select2" multiple="multiple" id="tag" data-placeholder="Select Tag" name="tags[]" style="width: 100%;">
                                    @foreach ($tags as $tag)
                                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group ">
                                <label for="image" class="col-form-label">Upload Image</label>
                                <div class="">
                                    <input id="image" type="file" class="form-control-file" name="image">
                                </div>
                            </div>
                        </div>

                        <div class="card-body pad">
                            <div class="mb-3">
                                <textarea class="textarea" id="body" name="description" id="description" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ old('description')}}</textarea>
                            </div>
                        </div>


                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-info">Create New Record</button>
                </div>

                </form>
            </div>
        </div>
    </div>
</section>
@section('foot')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script>
    $(function() {
        $("#tag").select2({});
    });
</script>
<script>
    $('#body').summernote({
        tabsize: 2,
        height: 100,
    });
</script>
@endsection
@endsection
