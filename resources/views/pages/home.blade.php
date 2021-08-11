@extends('pages.layout')

@section('content')
{{-- ---------------------------------------HEADER------------------------------- --}}
<section class="posts container">
    @if (isset($title))
        <h1>{{ $title }}</h1>
    @endif
    @forelse ($posts as $post)
		<article class="post">
            @if ($post->photos->count() === 1)
            <div class="img-center">
                <img src="{{ $post->photos->first()->url }}" class="img-p">
            </div>
            @elseif($post->photos->count() > 1)
                @include('posts.carousel')
            @endif
			<div class="content-post">
				<header class="container-flex space-between">
					<div class="date">
						<span class="c-gris">Estreno: {{ $post->published_at->format('d M Y') }}</span>
					</div>
					<div class="post-category">
						<span class="category text-capitalize">
                            <a href="{{ route('category.show', $post->category) }}">
                                {{ $post->category->name }}
                            </a>
                        </span>
					</div>
				</header>
				<h1>{{ $post->title }}</h1>

{{-- ---------------------------------------CONTENT------------------------------- --}}
				<div class="divider"></div>
				<p>{{ $post->description }}</p>

{{-- ---------------------------------------FOOTER------------------------------- --}}
				<footer class="container-flex space-between">
					<div class="read-more">
						<a href="/inicio/{{ $post->url }}" class="text-uppercase c-green">Leer más</a>
					</div>
					<div class="tags container-flex">
						@foreach ($post->tags as $tag)
							<span class="tag c-gray-1 text-capitalize"> <a href="{{ route('tag.show', $tag) }}">#{{ $tag->name }}</a></span>
						@endforeach
					</div>
				</footer>
			</div>
		</article>
    @empty
    <article class="post">

        <div class="content-post">
            <h1>No hay publicaciones todavia en esta categoria</h1>
        </div>
    </article>
    @endforelse
</section>
<!-- fin del div.posts.container -->

{{ $posts->appends(request()->all())->links() }}

@stop

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

{{-- <div class="gallery-photos masonry">
{{-- '{ "itemSelector": ".gird-item", "columnWidth": 464 }'>
    @foreach($post->photos->take(4) as $photo)
        <figure class="grid-item grid-item--height2">
            @if($loop->iteration === 4)
                <div class="overlay">+ {{ $post->photos->count() }} Imagenes</div>
            @endif
            <img src="{{ url($photo->url) }}" class="img-responsive" alt="">
        </figure>
    @endforeach
</div> --}}
