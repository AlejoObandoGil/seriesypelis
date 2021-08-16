<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<title>@yield('meta-title', config('app.name') . " | Blog")</title>
    <meta name="description" content="@yield('meta-description', 'Blog de películas y series clásicas y de estreno 2021, para ver online y descargar en full hd 1024p.')">

	<link rel="stylesheet" href="/css/normalize.css">
	<link rel="stylesheet" href="/css/framework.css">
	<link rel="stylesheet" href="/css/style.css">
	<link rel="stylesheet" href="/css/responsive.css">
	<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    {{-- <link rel="stylesheet" href="{{ mix('/css/app.css') }}"> --}}

    @stack('styles')

</head>
<body>
	<div class="preload"></div>
	<header class="space-inter">
		<div class="container container-flex space-between">
            <a href="{{ route('home') }}"">
                <figure class="logo"><img  src="/img/logo.png" alt=""></figure>
            </a>
            <h1>{{ config('app.name') }}</h1>

            @include('partials.nav')

            <figure class="logo-xs"><img src="/img/logo-p.png" alt=""></figure>
		</div>
	</header>

    {{-- contenido --}}
    @yield('content')

    <footer>
        <div class="container">
            <figure class="logo"><img class="brand-image img-circle elevation-3" src="/img/logo.png" alt=""></figure>
            <nav>
                <ul class="container-flex space-center list-unstyled">
                    <li><a href="/" class="text-uppercase c-white">home</a></li>
                    <li><a href="about.html" class="text-uppercase c-white">about</a></li>
                    <li><a href="archive.html" class="text-uppercase c-white">archive</a></li>
                    <li><a href="contact.html" class="text-uppercase c-white">contact</a></li>
                </ul>
            </nav>
            <div class="divider-2"></div>
            <p>Nunc placerat dolor at lectus hendrerit dignissim. Ut tortor sem, consectetur nec hendrerit ut, ullamcorper ac odio. Donec viverra ligula at quam tincidunt imperdiet. Nulla mattis tincidunt auctor.</p>
            <div class="divider-2" style="width: 80%;"></div>
            {{-- <p>© 2017 - Zendero. All Rights Reserved. Designed & Developed by <span class="c-white">Agencia De La Web</span></p> --}}
            <ul class="social-media-footer list-unstyled">
                <li><a href="#" class="fb"></a></li>
                <li><a href="#" class="tw"></a></li>
                <li><a href="#" class="in"></a></li>
                <li><a href="#" class="pn"></a></li>
            </ul>
        </div>
    </footer>
    <script src={{"mix('js/app.js')"}}></script>
    <script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>

    @stack('scripts')

</body>
</html>
