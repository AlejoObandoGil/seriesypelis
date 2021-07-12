@extends('admin.layout')

@section('header')

<h1 class="m-0">{{ config('app.name')}} 
    <small>Lista de Publicaciones</small>
</h1>
<ol class="breadcrumb">
    <li><a href="{{ route('admin.admin') }}"> <i class="fa fa-home"></i> Inicio </a></li>
    <li><a href="{{ route('admin.posts.index') }}"> <i class="fa fa-list"></i> Publicaciones</a></li>
</ol>

@stop

@section('content')
    
<div class="card card-dark">
    <div class="card-header">     
        <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"> 
            <i class="fa fa-plus"></i>Nueva Publicación</button>
            <br>
            <br>
        <h3 class="card-title">Lista de Películas y Series</h3>    
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="post-table" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Descripcion</th>
                    <th>Resumen</th>
                    <th>Fecha</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->description }}</td>
                        <td>{{ $post->body }}</td>
                        <td>{{ $post->published_at }}</td>
                        <td>
                            <a href="" class="btn btn-xs btn-info"><i class="fa fa-plus"></i></a>
                            <a href="" class="btn btn-xs btn-danger"><i class="fa fa-times"></i></a>
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
<link rel="stylesheet" href="adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

@endpush

@push('scripts')

<!-- DataTables  & Plugins -->
<script src="adminlte/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="adminlte/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="adminlte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="adminlte/plugins/jszip/jszip.min.js"></script>
<script src="adminlte/plugins/pdfmake/pdfmake.min.js"></script>
<script src="adminlte/plugins/pdfmake/vfs_fonts.js"></script>
<script src="adminlte/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="adminlte/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="adminlte/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<!-- Page specific script TABLA-->
<script>
    $(function () {
        $("#post-table").DataTable({
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

