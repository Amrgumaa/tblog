@extends('admin.layouts/app')
@section('head')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

@endsection

@section('title', 'My Posts')
@section('pagehead', 'My Posts')

@section('maincontent')


<a href="{{route('posts.create')}}"> <button type="button" class="btn btn-primary">Create new</button></a>

<p></p>
<p></p>
<x-alert />
<table class="display" id="data" style="width:100%">
    <thead>
        <tr>
            <th>No</th>
            <th>ID</th>
            <th>Posted By</th>
            <th>Title</th>
            <th>Subtitle</th>
            <th>Category</th>
            <th>Tags</th>
            <th>Slug</th>
            <th>Body</th>
            <th>Image</th>
            <th>Likes</th>
            <th>Dislikes</th>
            <th>Status</th>
            <th>Created at</th>
            <th width="">Action</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($posts as $index=> $post)
        <tr>
            <td>{{ $index+1 }}</td>
            <td> <a href="">{{ $post->id }}</a></td>
            <td> <a href=""></a>{{ $post->admin->name}}</td>
            <td>{{ $post->title }}</td>
            <td>{{ $post->subtitle }}</td>
            <td>{{ $post->cateogry }}</td>
            <td>{{ $post->tag }}</td>
            <td>{{ $post->slug }}</td>
            <td>{{ $post->body }}</td>
            <td>{{ $post->image}}</td>
            <td>{{ $post->likes }}</td>
            <td>{{ $post->dislikes }}</td>
            <td>{{ $post->status }}</td>
            <td>{{ $post->created_at }}</td>


            <form action="{{ route('posts.destroy',$post->id) }}" method="POST">
                <div class="row mx-2">
                    <a class="primary mx-3" href="{{ route('posts.edit',$post->id) }}"><i
                            class="fas fa-edit 2x"></i></a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-danger cursor-pointer mx-1"><i class="fas fa-minus"
                            aria-hidden="true"></i></button>
                </div>
            </form>
            </td>
        </tr>
        @endforeach
    <tfoot>
        <tr>
            <th>No</th>
            <th>ID</th>
            <th>Posted By</th>
            <th>Title</th>
            <th>Subtitle</th>
            <th>Category</th>
            <th>Tags</th>
            <th>Slug</th>
            <th>Body</th>
            <th>Image</th>
            <th>Likes</th>
            <th>Dislikes</th>
            <th>Status</th>
            <th>Created at</th>
            <th width="">Action</th>
        </tr>
    </tfoot>
    </tbody>


</table>

@section('foot')
<script src=" https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.jqueryui.min.js
"></script>

<script>
    $(document).ready(function() {
        $('#data').DataTable();
    });
</script>
@endsection
@endsection
