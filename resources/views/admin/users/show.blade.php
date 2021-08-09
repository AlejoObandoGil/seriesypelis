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
    <div class="row">
        <div class="col-md-3">
            <div class="card card-primary card-outline">
                <div class="card-header with-border">
                    <h3 classs="box-title">Datos de usuario</h3>
                </div>
                <div class="card-body card-profile">
                    <div class="text-center">
                        <img class="profile-user-img img-fluid img-circle" src="/adminlte/img/user4-128x128.jpg" alt="{{ $user->name }}">
                    </div>

                    <h3 class="profile-username text-center">{{ $user->name }}</h3>

                    <p class="text-muted text-center">{{ $user->getRoleNames()->implode(', ') }}</p>

                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <b>Email</b> <a class="float-right">{{ $user->email }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Publicaciones</b> <a class="float-right">{{ $user->posts->count() }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Roles</b> <a class="float-right">{{ $user->getRoleNames()->implode(', ') }}</a>
                        </li>
                    </ul>
                    <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-primary btn-block"><b>Editar Perfil</b></a>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card card-primary card-outline">
                <div class="card-header with-border">
                    <h3 classs="box-title">Publicaciones</h3>
                </div>
                <div class="card-body">
                    @forelse ($user->posts as $post)
                        <a href="{{ route('posts.show', $post) }}">
                            <strong>{{ $post->title }}</strong> <br>
                        </a>
                        <small class="text-muted">Publicado el {{ $post->published_at->format('d/m/Y')}}</small>
                        <p classs="text-muted">{{ $post->description }}</p>
                        @unless ($loop->last)
                            <hr>
                        @endunless
                    @empty
                        <small class="text-muted">Sin publicaciones</small>
                    @endforelse
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card card-primary card-outline">
                <div class="card-header with-border">
                    <h3 classs="box-title">Roles</h3>
                </div>
                <div class="card-body">
                    @forelse ($user->roles as $role)
                        <strong>{{ $role->name }}</strong> <br>
                        @if ($role->permissions->count())
                            <small class="text-muted">Permisos: {{ $role->permissions->pluck('name')->implode(', ') }}</small>
                        @endif
                        @unless ($loop->last)
                            <hr>
                        @endunless
                    @empty
                        <small class="text-muted">No tiene roles asiganados</small>
                    @endforelse
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card card-primary card-outline">
                <div class="card-header with-border">
                    <h3 classs="box-title">Permisos adicionales</h3>
                </div>
                <div class="card-body">
                    @forelse ($user->permissions as $permission)
                        <strong>{{ $permission->name }}</strong> <br>
                        @unless ($loop->last)
                            <hr>
                        @endunless
                    @empty
                        <small class="text-muted">No tiene permisos adicionales</small>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
@endsection
