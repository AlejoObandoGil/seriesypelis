@extends('layout')

@section('meta-title', $post->title)
@section('meta-description', $post->description)


@section('content')

<article class="post image-w-text container">
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
                <span class="c-gris">{{ $post->published_at->format('d M Y') }}</span>
            </div>
            <div class="post-category">
                <span class="category">{{ $post->category->name }}</span>
            </div>
        </header>
        <h1>{{ $post->title }}</h1>
        <div class="divider">
            <div class="image-w-text">
                <figure class="block-left"><img src="img/img-post-2.png" alt=""></figure>
                <div >
                    {!! $post->body !!}
                </div>
            </div>
        </div>
        @if($post->iframe)
            <div class="video" style="padding-top:25px">
                {!! $post->iframe !!}
            </div>
        @endif
        <footer class="container-flex space-between">
            @include('partials.social-links')
            <div class="tags container-flex">
                @foreach ($post->tags as $tag)
                    <span class="tag c-gray-1 text-capitalize">#{{ $tag->name }}</span>
                @endforeach
            </div>
        </footer>
        <div class="comments">
            <div class="divider"></div>
            <div id="disqus_thread"></div>
            @include('partials.disqus-script')
        </div><!-- .comments -->
    </div>
</article>

@endsection

@push('styles')
    <link rel="stylesheet" type="text/css" href="/css/twitter-bootstrap.css">

@endpush

@push('scripts')

    <script id="dsq-count-scr" src="//zendero.disqus.com/count.js" async></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="/js/twitter-bootstrap.js"></script>

@endpush
