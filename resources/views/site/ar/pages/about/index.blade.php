<!doctype html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>عن الشركة | شركة الشرق</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/header.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/footer.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/sectors.css') }}" />

    <link rel="stylesheet" href="{{ asset('assets/css/pages/about/section-1.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/pages/about/section-2.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/pages/about/section-3.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/pages/about/section-4.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/pages/about/section-6.css') }}" />

    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js" defer></script>

    <script src="{{ asset('assets/js/header.js') }}" defer></script>
    <script src="{{ asset('assets/js/hero.js') }}" defer></script>
</head>
<body>
    @include('site.ar.partials.header')

    <main id="about-page">
        @include('site.ar.pages.about.partials.section-1')
        @include('site.ar.pages.about.partials.section-2')
        @include('site.ar.pages.about.partials.section-3')
        @include('site.ar.pages.about.partials.section-4')
        @include('site.ar.pages.about.partials.section-6')
    </main>

    @include('site.ar.partials.footer')

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            if (typeof window.lpInitHeader === 'function') {
                window.lpInitHeader();
            }

            if (typeof window.lpInitHeroLines === 'function') {
                const footer = document.querySelector('.lp-footer');
                if (footer) {
                    window.lpInitHeroLines(footer);
                }
            }
        });
    </script>
</body>
</html>