@extends('pages.layout')

@section('content')
<section class="pages container">
    <div class="page page-about">
        <h1 class="text-capitalize">Página no Autorizada para el usuario</h1>
        <cite>{{ $exception->getMessage() }}</cite>
        <div class="divider-2" style="margin: 35px 0;"></div>
        <p>Regresar a <a href="{{ url()->previous() }}">Atrás</a></p>
    </div>
</section>
@endsection
