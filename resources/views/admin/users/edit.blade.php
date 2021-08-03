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
    <div class="col-md-8">
        <div class="card card-primary card-outline">
            <div class="card-header with-border">
                <h3 class="box-title">Datos de usuario</h3>
            </div>
            <div class="card-body card-profile">
                <div class="text-center">
                    <img class="profile-user-img img-fluid img-circle" src="/adminlte/img/user4-128x128.jpg" alt="{{ $user->name }}">
                </div>

                <h3 class="profile-username text-center">{{ $user->name }}</h3>

                <p class="text-muted text-center">{{ $user->getRoleNames()->implode(', ') }}</p>
                <form method="POST" action="{{ route('admin.users.update', $user) }}">
                    {{ csrf_field()}} {{ method_field('PUT') }}
                    <div class="form-group">
                        <label for="name">Nombre:</label>
                        <input name="name" value="{{ old('name', $user->name) }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input name="email" value="{{ old('email', $user->email) }}" class="form-control">
                    </div>
                    <button href="#" class="btn btn-primary btn-block">Actualizar usuario</button>
                </form>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
</div>
@endsection

