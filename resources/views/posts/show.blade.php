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
                {{-- <figure class="block-left"><img src="img/img-post-2.png" alt=""></figure> --}}
                <div >
                    {!! $post->body !!}
                </div>
            </div>
        </div>
        <div class="trailer" style="padding-top:50px; padding-bottom:20px; text-align:center">
            <h3>Trailer</h3>
            @if($post->iframe)
                <div class="video" style="text-align:center">
                    {!! $post->iframe !!}
                </div>
            @endif
        </div>

        <div>
            <div>
                @foreach ($post->videos as $video)
                    @if ($video->url_chapter == $chapter)
                        <h3 style="padding-top:20px; padding-bottom:1px; text-align:center">
                            {{$season}}  {{ $chapter }}
                        </h3>
                        <iframe src="{{ $video->iframe_chapter }}"
                            width="740" height="480"
                            id="iframe" frameborder="0"
                            allowfullscreen="true" webkitallowfullscreen="true"
                            mozallowfullscreen="true">
                        </iframe>
                    @endif
                @endforeach
            </div>
            <div>
                @foreach ($post->seasons as $season)
                    <div class="season">
                        <p><a href="#">{{ $season->season }}</a></p>
                    </div>
                    @forelse ($season->videos as $video)
                        <div class="chapter">
                            <p>
                                <a
                                {{-- variables en la ruta son opcionales ? : "" --}}
                                    href="/inicio/{{ $post->url }}/{{ $season->url_season }}/{{ $video->url_chapter }}">
                                    {{ $video->chapter }}
                                </a>
                            </p>
                        </div>
                    @empty
                        No hay capítulos o película
                    @endforelse
                @endforeach

            </div>
        </div>

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
