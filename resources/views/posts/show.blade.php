@extends('layout')

@section('content')
    
<article class="post image-w-text container">
    <div class="content-post">
        <header class="container-flex space-between">
            <div class="date">
                <span class="c-gris">{{ $post->published_at->format('d M Y') }}</span>
            </div>
            <div class="post-category">
                <span class="category">{{ $post->category->name }}</span>
            </div>
        </header>
        <h1>{{ $post->title }}</h1>
        <div class="divider"></div>
        <div class="image-w-text">
            <figure class="block-left"><img src="img/img-post-2.png" alt=""></figure>
            <div>
                {!! $post->body !!}

            </div>
        </div>

        <footer class="container-flex space-between">
            <div class="buttons-social-media-share">
                <ul class="share-buttons">
                    <li><a href="https://www.facebook.com/sharer/sharer.php?u=&t=" title="Share on Facebook" target="_blank"><img alt="Share on Facebook" src="/img/flat_web_icon_set/Facebook.png"></a></li>
                    <li><a href="https://twitter.com/intent/tweet?source=&text=:%20" target="_blank" title="Tweet"><img alt="Tweet" src="/img/flat_web_icon_set/Twitter.png"></a></li>
                    <li><a href="https://plus.google.com/share?url=" target="_blank" title="Share on Google+"><img alt="Share on Google+" src="/img/flat_web_icon_set/Google-plus.png"></a></li>
                    <li><a href="http://pinterest.com/pin/create/button/?url=&description=" target="_blank" title="Pin it"><img alt="Pin it" src="/img/flat_web_icon_set/Pinterest.png"></a></li>
                </ul>
            </div>
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

@push('scripts')

    <script id="dsq-count-scr" src="//zendero.disqus.com/count.js" async></script>

@endpush