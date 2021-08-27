@extends('pages.layout')

@section('meta-title', $post->title)
@section('meta-description', $post->description)

@section('content')
{{-- ---------------------------------------HEADER------------------------------- --}}
<article class="post container">
    @if ($post->photos->count() === 1)
    <div class="img-center-2">
        <img src="{{ $post->photos->first()->url }}" class="img-p-2">
    </div>
    @elseif($post->photos->count() > 1)
        @include('posts.carousel')
    @endif
    <div class="content-post-2">
        <header class="container-flex space-between">
            <div class="date">
                <span class="c-gris">Estreno: {{ optional($post->published_at)->format('d M Y') }}</span>
            </div>
            @if ($post->category)
            <div class="post-category">
                <span class="category text-capitalize">
                    <a href="{{ route('category.show', $post->category) }}">
                        {{ $post->category->name }}
                    </a>
                </span>
            </div>
            @endif
        </header>
        <h1>{{ $post->title }}</h1>

{{-- ---------------------------------------CONTENT------------------------------- --}}
        <div class="divider">
            <div class="image-w-text">
                <figure class="block-left"><img src="img/img-post-2.png" alt=""></figure>
                <div >
                    {!! $post->body !!}
                </div>
            </div>
        </div>
        <div class="trailer">
            <h3>Trailer</h3>
            @if($post->iframe)
                <div class="video" style="padding-top:25px">
                    {!! $post->iframe !!}
                </div>
            @endif
        </div>

        temporada 1
        cap 1
        <iframe src="https://gcs.megaplay.cc/index.php?h=WEdZM1RiREEzSEFhZEJhQXVSenBjL3d3L00rbUkxL1RuSzBJQ2FKRzBJaDh2cGlNU1BsUHVnTUZwRnZIVHdjZw==&bg=/image.tmdb.org/t/p/w780/l3mOi1hYf7SMmO28SJ69ynCDpvW.jpg" width="740" height="480"></iframe>
        temporada 1
        cap 2
        <iframe src="https://gcs.megaplay.cc/index.php?h=WEdZM1RiREEzSEFhZEJhQXVSenBjNFFFVjNqWnpyT1Z0cXZLNUIxMEdyS3Q4ODlJN0pJSzBWUDd0dTlFdkN1Tg==&bg=/image.tmdb.org/t/p/w780/d3c3iXv04bPmTv0V9QTGew0n36k.jpg" width="740" height="480"></iframe>
        temporada 1
        cap 3
        <iframe src="https://gcs.megaplay.cc/index.php?h=WEdZM1RiREEzSEFhZEJhQXVSenBjMGZyYU1VRjIzVzVlQ0x4WVJPRUNQcW5CYk41Q3lUbW9BMHZqMGN2VTI1ZA==&bg=/image.tmdb.org/t/p/w780/jG5jjxTcpvxn74cY4LFIzeqGph3.jpg" width="740" height="480"></iframe>
        temporada 1
        cap 4
        <iframe src="https://gcs.megaplay.cc/index.php?h=WEdZM1RiREEzSEFhZEJhQXVSenBjeFIvTmFRa09vb0JmZnZRcUFlWi82dzJDclNVVEJFUGIxV3AxTUpGMVJpaw==&bg=/image.tmdb.org/t/p/w780/2BPHWlIVes7uNniuM5jyoflAbap.jpg" width="740" height="480"></iframe>
        temporada 1
        cap 5
        <iframe src="https://gcs.megaplay.cc/index.php?h=WEdZM1RiREEzSEFhZEJhQXVSenBjMzRDMUlMNEM5UXR3Y0RyKzVFdmRYdFZob0NYdDVWQkJJOWpnUlhodzRGYg==&bg=/image.tmdb.org/t/p/w780/piwRYraJ1jUE8pcuQJfWPgs6hdy.jpg" width="740" height="480"></iframe>

        {{-- <iframe id="iframe" frameborder="0" allowfullscreen="true" webkitallowfullscreen="true" mozallowfullscreen="true" src="https://gcs.megaplay.cc/index.php?h=WEdZM1RiREEzSEFhZEJhQXVSenBjL3d3L00rbUkxL1RuSzBJQ2FKRzBJaDh2cGlNU1BsUHVnTUZwRnZIVHdjZw==&amp;bg=/image.tmdb.org/t/p/w780/l3mOi1hYf7SMmO28SJ69ynCDpvW.jpg"></iframe> --}}
{{-- ---------------------------------------FOOTER------------------------------- --}}
        <footer class="container-flex space-between">
            <div class="tags container-flex" style="padding-top: 20px">
                <span class="c-gris">Publicado por: {{ $post->owner->name }}
                </span>
            </div>
            <div class="tags container-flex" style="padding-top: 20px">
                @foreach ($post->tags as $tag)
                    <span class="tag c-gray-1 text-capitalize">
                        <a href="{{ route('tag.show', $tag) }}">#{{ $tag->name }}</a>
                    </span>
                @endforeach
            </div>
        </footer>

        <div class="comments"><!-- .comments -->
            <div class="divider" style="padding-top: 50px">
                @include('partials.social-links')
            </div>
            <div id="disqus_thread">
                @include('partials.disqus-script')
            </div>
        </div>
    </div>
</article>

@endsection

@push('styles')

    <link rel="stylesheet" type="text/css" href="/css/twitter-bootstrap.css">

@endpush

@push('scripts')

    <script id="dsq-count-scr" src="//zendero.disqus.com/count.js" async></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
    crossorigin="anonymous"></script>
    <script src="/js/twitter-bootstrap.js"></script>

@endpush
