@extends('admin.layouts/app')
@section('head')
<!-- DataTables -->
<link rel="stylesheet" href="{{asset ('admin/assets2/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{asset ('admin/assets2/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{asset ('admin/assets2/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection

@section('title', 'Colors')
@section('pagehead', 'Colors')

@section('maincontent')
<div class="d-flex justify-content-center">
    <div class="col-md-10 card card-info card-outline card-tabs">
        <div class="card-header">
            <h3 class="card-title"> <a href="{{route('color.create')}}"> <button type="button" class="btn btn-info">Create new</button></a> </h3>
        </div>
        <div class="card-body">
            <table class="table table-hover" id="example1" style="width:100%">
                <thead class="text-center">
                    <tr>
                        <th width="">ID</th>
                        <th>Name</th>
                        <th>Desciption</th>
                        <th>Color</th>
                        <th width="10px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if($colors->count())
                    @foreach ($colors as $color)
                    <tr>
                        <td class="text-center"><a href="{{ $color->id }}">{{ $color->id }}</a></td>
                        <td>{{ucfirst($color->name) }}</td>
                        <td>{{ $color->description }}</td>
                        <td><span class="badge badge-{{$color->name}} ">{{ucfirst($color->name) }} </span></td>
                        <td class="btn-group btn-group-toggle">
                            <a class="btn btn-info btn-xs mr-1" href="{{route('color.edit',$color->id) }}"><i class="fas fa-edit "> </i></a>
                            <form action="{{ route('color.destroy',$color->id) }}" method="POST" class="mr-1">
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
