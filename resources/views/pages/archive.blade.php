@extends('pages.layout')

@section('content')
<section class="pages container">
    <div class="page page-archive">
        <h1 class="text-capitalize">Archivo de Categorias</h1>
        <p>Nam efficitur, massa quis fringilla volutpat, ipsum massa consequat nisi, sed eleifend orci sem sodales lorem. Curabitur molestie eros urna, eleifend molestie risus placerat sed.</p>
        <div class="divider-2" style="margin: 35px 0;"></div>
        <div class="container-flex space-between">
            <div class="authors-categories">
                <h3 class="text-capitalize">autores</h3>
                <ul class="list-unstyled">
                    @foreach ($authors as $author)
                        <li>{{ $author->name }}</li>
                    @endforeach
                </ul>
                <h3 class="text-capitalize">categorias o géneros</h3>
                <ul class="list-unstyled">
                    @foreach ($categories as $category)
                        <a href="{{ route('category.show', $category) }}">
                            <li>{{ $category->name }}</li>
                        </a>
                    @endforeach
                </ul>
            </div>
            <div class="latest-posts">
                <h3 class="text-capitalize">Ultimas publicaciones</h3>
                @foreach ($posts as $post)
                <a href="{{ route('posts.show', $post) }}">
                    <p>{{ $post->title }}</p>
                </a>
                @endforeach

                <h3 class="text-capitalize">Películas y series por año</h3>
                <ul class="list-unstyled">
                    @foreach ($archive as $date)
                    <li>{{ $date->year }} {{ $date->posts }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</section>
@endsection
