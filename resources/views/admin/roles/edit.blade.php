@extends('admin.layout')

@section('header')

<h1 class="m-0">{{ config('app.name')}}
    <small>Editar Role</small>
</h1>
<ol class="breadcrumb">
    <li><a href="{{ route('admin.admin') }}"> <i class="fa fa-home"></i> Inicio </a></li>
    <li><a href="{{ route('admin.posts.index') }}"> <i class="fa fa-list"></i> Role</a></li>
</ol>

@stop
@section('content')
@if ($errors->any())
    <ul class="list group">
        @foreach ($errors->all() as $error)
            <li class="list-group-item list-group-item-danger">
                {{ $error }}
            </li>
        @endforeach
    </ul>
@endif
<div class="row">
    <div class="col-md-6">
        <div class="card card-primary card-outline">
            <div class="card-header with-border">
                <h3 class="box-title">Datos del Role</h3>
            </div>
            <div class="card-body card-profile">
                <form method="POST" action="{{ route('admin.roles.update', $role) }}">
                    {{ method_field('PUT') }}

                    @include('admin.roles.form')

                    <button href="#" class="btn btn-primary btn-block">Actualizar Role</button>
                </form>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
@endsection
