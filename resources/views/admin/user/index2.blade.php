@extends('admin.layouts/app')
@section('head')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">

@endsection

@section('title', 'User')
@section('pagehead', 'User')

@section('maincontent')
<div class="card">
    <div class="card-header">
        <h3 class="card-title"> <a href="{{route('user.create')}}"> <button type="button" class="btn btn-primary">Create new</button></a> </h3>
    </div>
    <div class="card-body">
        <table class="compact hover stripe" id="data2" style="width:100%">
            <thead class="text-center">
                <tr>
                    <th width="5">ID</th>
                    <th>Profile Photo</th>
                    <th>Name</th>
                    <th>email</th>
                    <th width="">Roles</th>
                    <th width="">Action</th>
                </tr>
            </thead>
            <tbody>
                @if($users->count())
                @foreach ($users as $user)
                <tr>
                    <td width=""> <a href="">{{ $user->id }}</a></td>
                    <td width="80px">
                        <div class="image">
                            <img src="{{asset('storage/users/'.$user->id.'/'.$user->image)}}" alt="{{$user->image}}" class=" img-circle elevation-2" style="width:45px; height:45px; left:10px; border-radius:50%">
                        </div>
                    </td>
                    <td> {{ ucfirst($user->name) }}</td>
                    <td>{{ ucfirst($user->email) }}</td>
                    <td>Roles</td>
                    <td class="row offset-3">
                        <a class="btn btn-primary btn-xs mr-1" href="{{route('user.edit',$user->id) }}"> <i class="fas fa-edit "> </i></a>
                        <form action="{{ route('user.destroy',$user->id) }}" method="POST" class="mr-1">
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

@section('foot')
<script src=" https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>


<script>
    $(document).ready(function() {
        $('#data2').DataTable({});

    });
</script>

@endsection
@endsection
