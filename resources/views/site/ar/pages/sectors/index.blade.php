<!doctype html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>القطاعات | شركة الشرق</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/header.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/footer.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/sectors.css') }}" />

    <link rel="stylesheet" href="{{ asset('assets/css/pages/sectors-2/section-1.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/pages/sectors-2/section-2.css') }}" />

    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js" defer></script>

    <script src="{{ asset('assets/js/header.js') }}" defer></script>
    <script src="{{ asset('assets/js/hero.js') }}" defer></script>
    <script src="{{ asset('assets/js/pages/sectors-2/section-2.js') }}" defer></script>
</head>
<body class="lp-page--sectors2">
    @include('site.ar.partials.header')

    <main id="sectors-page">
        @include('site.ar.pages.sectors.partials.section-1')
        @include('site.ar.pages.sectors.partials.section-2')
    </main>

    @include('site.ar.partials.footer')

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            if (typeof window.lpInitHeader === 'function') {
                window.lpInitHeader();
            }

            if (typeof window.initSector2Reveal === 'function') {
                window.initSector2Reveal();
            }

            if (typeof window.lpInitHeroLines === 'function') {
                const intro = document.querySelector('.lp-sectors2S1');
                if (intro) {
                    window.lpInitHeroLines(intro);
                }

                const footer = document.querySelector('.lp-footer');
                if (footer) {
                    window.lpInitHeroLines(footer);
                }
            }
        });
    </script>
</body>
</html>