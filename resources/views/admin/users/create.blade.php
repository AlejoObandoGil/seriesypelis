@extends('admin.layout')

@section('header')

<h1 class="m-0">{{ config('app.name')}}
    <small>Perfil de Usuario</small>
</h1>
<ol class="breadcrumb">
    <li><a href="{{ route('admin.admin') }}"> <i class="fa fa-home"></i> Inicio </a></li>
    <li><a href="{{ route('admin.posts.index') }}"> <i class="fa fa-list"></i> Usuarios</a></li>
</ol>

@stop
@section('content')
{{-- @if ($errors->any())
    <ul class="list group">
        @foreach ($errors->all() as $error)
            <li class="list-group-item list-group-item-danger">
                {{ $error }}
            </li>
        @endforeach
    </ul>
@endif --}}
<div class="row">
    <div class="col-md-6">
        <div class="card card-primary card-outline">
            <div class="card-header with-border">
                <h3 class="box-title">Datos de usuario</h3>
            </div>
            <div class="card-body card-profile">
                <form method="POST" action="{{ route('admin.users.store') }}">
                    {{ csrf_field()}}
                    <div class="form-group">
                        <label for="name">Nombre:</label>
                        <input name="name" value="{{ old('name') }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input name="email" value="{{ old('email') }}" class="form-control">
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>Roles:</label>
                            @include('admin.roles.checkboxes')
                        </div>
                        <div class="form-group col-md-6">
                            <label>Permisos:</label>
                            @include('admin.permissions.checkboxes')
                        </div>
                    </div>
                    <span class="help-block">La contraseña será enviada a tu correo electrónico</span>
                    <button href="#" class="btn btn-primary btn-block">Crear usuario</button>
                </form>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
@endsection
