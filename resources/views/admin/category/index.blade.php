@extends('admin.layouts/app')
@section('head')
<!-- DataTables -->
<link rel="stylesheet" href="{{asset ('admin/assets2/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{asset ('admin/assets2/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{asset ('admin/assets2/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection
@section('title', 'Categories')
@section('pagehead', 'Categories')
@section('maincontent')
<div class="d-flex justify-content-center">
    <div class="col-md-10 card card-info card-outline card-tabs">
        <div class="card-header">
            <h3 class="card-title"> <a href="{{route('category.create')}}"> <button type="button" class="btn btn-info">Create new</button></a> </h3>
        </div>
        <div class="card-body">
            <table class="table table-hover" id="example1" style="width:100%">
                <thead class="text-center">
                    <tr>
                        <th width="10px">
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input custom-control-input-danger custom-control-input-outline" type="checkbox" id="selectall">
                                <label for="selectall" class="custom-control-label"></label>
                            </div>
                        </th>
                        <th width="10px">ID</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Color</th>
                        <th>Count</th>
                        <th width="10px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if($categories->count())
                    @foreach ($categories as $index=>$category)
                    <tr>
                        <td>
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input custom-control-input-danger custom-control-input-outline" type="checkbox" id="{{$category->id }}" name=" {{ $category->id   }}">
                                <label for="{{ $category->id }}" class="custom-control-label"></label>
                            </div>
                        </td>
                        <td class="text-center"><a href="">{{ $category->id }}</a></td>
                        <td>{{ ucfirst($category->name) }}</td>
                        <td>{{ ucfirst($category->slug) }}</td>
                        <td>
                            <Span class="badge badge-{{$category->color->name}} ">
                                {{ ucfirst($category->color->name)}}
                            </Span>
                        </td>
                        <td class="text-center">{{$category->id}}</td>
                        <td class="btn-group btn-group-toggle">
                            <a class="btn btn-info btn-xs mr-1" href="{{route('category.edit',$category->id) }}"> <i class="fas fa-edit "> </i></a>
                            <form action="{{ route('category.destroy',$category->id) }}" method="POST" class="mr-1">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-danger btn-xs"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    @else
                    <td colspan="5">
                        <h6 class="text-center">No Records found. Create new </h6>
                    </td>
                    @endif

                </tbody>
            </table>
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
