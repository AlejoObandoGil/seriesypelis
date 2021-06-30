@extends('admin.layout')

@section('header')

<h1 class="m-0">{{ config('app.name')}} </h1>
<ol class="breadcrumb">
    <li><a href="{{ route('admin.admin') }}"> <i class="fa fa-home"></i> Inicio </a></li>
    <li><a href="{{ route('admin.posts.index') }}"> <i class="fa fa-list"></i> Publicaciones</a></li>
</ol>

@stop

@section('content')

    <h1>Dashboard</h1>

@stop