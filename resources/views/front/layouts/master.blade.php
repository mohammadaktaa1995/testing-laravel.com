<!DOCTYPE html>
<html lang="en" class="overflow-x-hidden">
    <head>
        <meta charset="utf-8">
        <link rel="dns-prefetch" href="//fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link rel="dns-prefetch" href="//use.fontawesome.com">
        <link rel="dns-prefetch" href="//www.googletagmanager.com">
        @include('partials.gtm-head')

        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title', 'Testing Laravel')</title>
        <meta name="description" content="@yield('description')">
        <link rel="canonical" href="{{ url()->current() }}"/>

        <script src="https://kit.fontawesome.com/5a9e7acf39.js" crossorigin="anonymous"></script>
        <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600;800&display=swap" rel="stylesheet">
        <link href="{{ mix('css/app.css') }}" rel="stylesheet">

        @include('partials.favicon')

        <meta name="twitter:card" content="summary_large_image"/>
        <meta name="twitter:creator" content="@spatie_be"/>
        <meta name="twitter:site" content="@spatie_be"/>
        <meta name="twitter:title" content="@yield('title')"/>
        <meta name="twitter:description"
        content="@yield('description')"/>
        <meta name="twitter:image" content="{{ url()->to('/images/og-image.jpg') }}"/>

        <meta property="og:site_name" content="Testing Laravel">
        <meta property="og:locale" content="en_US">
        <meta property="og:url" content="{{ url()->current() }}"/>
        <meta property="og:type" content="product"/>
        <meta property="og:title" content="@yield('title')"/>
        <meta property="og:description"
            content="@yield('description')"/>
        <meta property="og:image" content="{{ url()->to('/images/og-image.jpg') }}"/>

        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.0/dist/alpine.min.js" defer></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-parallax-js@5.6.1/dist/simpleParallax.min.js"></script>

        @production
            <script src="https://scope.spatie.be/js/scope.js" data-uuid="87c42274-bea0-4b2d-8d3a-35b4f832ee92" data-endpoint="https://scope.spatie.be/scope"></script>
        @endproduction
        @bukStyles()
        @bukScripts()
    </head>
    <body class="w-full overflow-x-hidden font-sans text-red-900">
        @yield('content')

        @include('partials.footer')

        @include('partials.gtm-body')

        <script>
            new simpleParallax(document.getElementsByClassName('parallax-dude'), {
                overflow: true,
                orientation: 'up',
                scale: 1.5
            });

            new simpleParallax(document.getElementsByClassName('parallax-dizzy'), {
                overflow: true,
                orientation: 'down',
                scale: 1.5
            });

            new simpleParallax(document.getElementsByClassName('parallax-monorail-01'), {
                overflow: true,
                orientation: 'left',
                scale: 1.05
            });

            new simpleParallax(document.getElementsByClassName('parallax-monorail-02'), {
                overflow: true,
                orientation: 'right',
                scale: 1.2
            });

        </script>
    </body>
</html>
