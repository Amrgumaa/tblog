@extends('admin.layouts/app')
@section('head')

<!-- DataTables -->
<link rel="stylesheet" href="{{asset ('admin/assets2/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet"
    href="{{asset ('admin/assets2/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{asset ('admin/assets2/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection

@section('title', 'All Posts')
@section('pagehead', 'All Posts')


@section('maincontent') 

<div class="d-flex justi fy-content-center">
    <div class="col-md-10">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"> <a href="{{route('post.create')}}"> <button type="button"
                            class="btn btn-info">Create new</button></a> </h3>
            </div>
            <div class="card-body">
                <table class="table table-hover" id="example1" style="font-size: 14px;">

                    <thead class="text-center">
                        <tr>
                            <th width="10px">
                                <div class="custom-control custom-checkbox">
                                    <input
                                        class="custom-control-input custom-control-input-danger custom-control-input-outline"
                                        type="checkbox" id="selectall">
                                    <label for="selectall" class="custom-control-label"></label>
                                </div>
                            </th>
                            <th>ID</th>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Categories</th>
                            <th>tags</th>
                            <th>Views</th>
                            <th>Posted By</th>
                            <th>Created at</th>
                            <th width="30px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($posts->count())
                        @foreach ($posts as $post)
                        <tr>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input
                                        class="custom-control-input custom-control-input-danger custom-control-input-outline"
                                        type="checkbox" id="{{ $post->id}}">
                                    <label for="{{ $post->id}}" class="custom-control-label"></label>
                                </div>
                            </td>
                            <td> <a href="">{{ $post->id }}</a></td>
                            <td>
                                <div style=" max-width: 60px; max-height:50px;overflow:hidden ">
                                    <img src="@if($post->image)  {{ $post->image }} @else {{asset('storage/posts/'.$post->id.'/'.$post->image)}} @endif"
                                        class=" img-fluid" alt="{{$post->image}}">
                                </div>
                            </td>
                            <td>{{ $post->title }}</td>
                            <td>
                                <Span class="badge badge-{{$post->category->color->name }}">
                                    {{ucfirst($post->category->name) }}
                                </Span>
                            </td>
                            <td>
                                @foreach($post->tags as $tag)
                                <Span class="badge badge-secondary">
                                    {{$tag->name}}
                                </Span>
                                @endforeach
                            </td>
                            <td> {{ ($post->views)}}</td>
                            <td> {{ ucfirst($post->user->name)}}</td>
                            <td>{{ $post->created_at }}</td>
                            <td>
                                <div class="btn-group btn-group-toggle">
                                    <a class="btn btn-success btn-xs mr-1" href="{{route('post.show',$post->id) }}"> <i
                                            class="fas fa-eye "> </i></a>
                                    <a class="btn btn-info btn-xs mr-1" href="{{route('post.edit',$post->id) }}"> <i
                                            class="fas fa-edit "> </i></a>
                                    <form action="{{ route('post.destroy',$post->id) }}" method="POST" class="mr-1">

                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-danger btn-xs"><i
                                                class="fas fa-trash"></i></button>
                                    </form>
                                </div>
                            </td>
                            </form>
                            </td>
                        </tr>
                        @endforeach
                        @else
                        <td colspan="12">
                            <h6 class="text-center">No Records found. Create new </h6>
                        </td>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@section('foot')


<!-- jQuery -->
<script src="{{asset ('assets2/plugins/jquery/jquery.min.js') }}"></script>
<!-- DataTables  & Plugins -->
<script src="{{asset ('admin/assets2/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{asset ('admin/assets2/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{asset ('admin/assets2/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{asset ('admin/assets2/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{asset ('admin/assets2/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{asset ('admin/assets2/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{asset ('admin/assets2/plugins/jszip/jszip.min.js') }}"></script>
<script src="{{asset ('admin/assets2/plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{asset ('admin/assets2/plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{asset ('admin/assets2/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{asset ('admin/assets2/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{asset ('admin/assets2/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>

<script>
$(function() {
    $("#example1").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

});
</script>


@endsection
@endsection
