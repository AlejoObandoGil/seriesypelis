@extends('admin.layout')

@section('header')

<h1 class="m-0">{{ config('app.name')}}
    <small>Lista de Roles</small>
</h1>
<ol class="breadcrumb">
    <li><a href="{{ route('admin.admin') }}"> <i class="fa fa-home"></i> Inicio </a></li>
    <li><a href="{{ route('admin.posts.index') }}"> <i class="fa fa-list"></i> Roles</a></li>
</ol>

@stop

@section('content')

<div class="card card-dark">
    <div class="card-header">
        <h3 class="card-title">Lista de Roles</h3>
        @can('create', $roles->first())
            <a href="{{ route('admin.roles.create')}}"class="btn btn-primary float-right">
                <i class="fa fa-plus"></i>Nuevo Role
            </a>
        @endcan
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="role-table" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Role</th>
                    <th>Nombre</th>
                    <th>Guard name</th>
                    <th>Permisos</th>
                    <th>Fecha de creación</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($roles as $role)
                    <tr>
                        <td>{{ $role->id }}</td>
                        <td>{{ $role->name }}</td>
                        <td>{{ $role->display_name }}</td>
                        <td>{{ $role->guard_name }}</td>
                        <td>{{ $role->permissions->pluck('display_name')->implode(', ') }}</td>
                        <td>{{ $role->created_at }}</td>
                        {{-- <td>{{ $role->permission }}</td> --}}
                        <td>
                            @can('update', $role)
                            <a href="{{ route('admin.roles.edit', $role) }}"
                                class="btn btn-xs btn-info">
                                <i class="fa fa-plus"></i>
                            </a>
                            @endcan
                            @can('delete', $role)
                            @if ($role->id !== 1)
                                <form method="POST"
                                    action="{{ route('admin.roles.destroy', $role) }}"
                                    style="display: inline">
                                    {{ csrf_field() }} {{ method_field('DELETE') }}
                                    <button class="btn btn-xs btn-danger"
                                        onclick="return confirm('¿Seguro que quieres eliminar este role?')">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </form>
                            @endif
                            @endcan
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
</div>

@stop

@push('styles')
<!-- DataTables -->
<link rel="stylesheet" href="/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="/adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="/adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

@endpush

@push('scripts')

<!-- DataTables  & Plugins -->
<script src="/adminlte/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="/adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="/adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="/adminlte/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="/adminlte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="/adminlte/plugins/jszip/jszip.min.js"></script>
<script src="/adminlte/plugins/pdfmake/pdfmake.min.js"></script>
<script src="/adminlte/plugins/pdfmake/vfs_fonts.js"></script>
<script src="/adminlte/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="/adminlte/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="/adminlte/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<!-- Page specific script TABLA-->
<script>
    $(function () {
        $("#role-table").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>

@endpush

