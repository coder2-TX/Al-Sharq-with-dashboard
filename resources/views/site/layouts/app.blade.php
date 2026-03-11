<!doctype html>
<html lang="{{ $lang ?? 'ar' }}" dir="{{ $dir ?? 'rtl' }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>{{ $title ?? 'Al Sharq' }}</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />

    <link rel="stylesheet" href="{{ asset('assets/css/header.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/about.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/iso.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/sectors.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/numbers.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/partners.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/footer.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/hero.css') }}" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css">

    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide-extension-auto-scroll@0.5.3/dist/js/splide-extension-auto-scroll.min.js" defer></script>

    <script src="{{ asset('assets/js/header.js') }}" defer></script>
    <script src="{{ asset('assets/js/hero.js') }}" defer></script>
    <script src="{{ asset('assets/js/sectors.js') }}" defer></script>
    <script src="{{ asset('assets/js/numbers.js') }}" defer></script>
    <script src="{{ asset('assets/js/partners.js') }}" defer></script>
    <script src="{{ asset('assets/js/app.js') }}" defer></script>
</head>
<body>
    @yield('content')
</body>
</html>