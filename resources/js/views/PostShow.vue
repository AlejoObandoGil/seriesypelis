<template>
<!-- {{-- ---------------------------------------HEADER------------------------------- --}} -->
<section class="post container">
    <!-- @if ($post->photos->count() === 1) -->
    <div class="img-center-2">
        <!-- <img src="{{ $post->photos->first()->url }}" class="img-p-2"> -->
    </div>
    <!-- @elseif($post->photos->count() > 1)
        @include('posts.carousel')
    @endif -->
    <div class="content-post-2">
        <!-- header -->
        <post-header :post='post'></post-header>

<!-- {{-- ---------------------------------------CONTENT------------------------------- --}} -->
        <div class="divider">
            <div class="image-w-text">
                <!-- <figure class="block-left"><img src="img/img-post-2.png" alt=""></figure> -->
                <div >
                    <!-- {!! $post->body !!} -->
                </div>
            </div>
        </div>
        <!-- @if($post->iframe) -->
            <div class="video" style="padding-top:25px">
                <!-- {!! $post->iframe !!} -->
            </div>
        <!-- @endif -->

<!-- {{-- ---------------------------------------FOOTER------------------------------- --}} -->
        <footer class="container-flex space-between">
            <div class="tags container-flex" style="padding-top: 20px">
                <span class="c-gris">{{ post.owner.name }}</span>
                <!-- <span class="c-gris">Publicado por: {{ $post->owner->name }} -->
                <!-- </span> -->
            </div>
            <div class="tags container-flex" style="padding-top: 20px">
                <!-- @foreach ($post->tags as $tag) -->
                    <span class="tag c-gray-1 text-capitalize">
                        <!-- <a href="{{ route('tag.show', $tag) }}">#{{ $tag->name }}</a> -->
                    </span>
                <!-- @endforeach -->
            </div>
        </footer>

        <div class="comments"><!-- .comments -->
            <div class="divider" style="padding-top: 50px">
                <!-- @include('partials.social-links') -->
            </div>
            <div id="disqus_thread">
                <!-- @include('partials.disqus-script') -->
            </div>
        </div>
    </div>
</section>
</template>

<script>

export default {
    data() {
        return{
            post: {
                category: {},
                owner: {}
            }
        }
    },
    mounted(){
        axios.get(`/api/inicio/${this.$route.params.url}`)
            .then(res => {
                this.post = (res.data)
            })
            .catch(err => {
                console.log(err)
            })
    }
}
</script>

