@extends('admin.layout')

@section('header')

<h1 class="m-0">{{ config('app.name')}} </h1>
<ol class="breadcrumb">
    <li><a href="#"> <i class="fa fa-dashboard"></i> Inicio</a></li>
    <li class="active">/Posts</li>
</ol>

@stop

@section('content')
    
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Lista de Peliculas & Series</h3>
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