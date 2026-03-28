@php
    $sectorsPageMainSection = \App\Models\SectorsPageMainSection::query()->first();

    $sectorsPageHeroVideo = $sectorsPageMainSection?->hero_video
        ? \Illuminate\Support\Facades\Storage::url($sectorsPageMainSection->hero_video)
        : asset('assets/videos/sector/main.mp4');
@endphp

<!doctype html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Sectors | Al Sharq Company</title>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/css/header.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/css/footer.css') }}" />

  <link rel="stylesheet" href="{{ asset('assets/css/pages/sectors-3/section-1.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/css/sectors.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/css/pages/sectors-3/section-2.css') }}" />

  <script src="{{ asset('assets/js/header.js') }}" defer></script>
  <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js" defer></script>
  <script src="{{ asset('assets/js/hero.js') }}" defer></script>
  <script src="{{ asset('assets/js/sectors.js') }}" defer></script>
  <script src="{{ asset('assets/js/app.js') }}" defer></script>
</head>

<body
  class="lp-page--sectors3"
  data-show-brand="true"
  data-brand-src="{{ asset('assets/images/header/Brand_Mark.png') }}"
  data-brand-href="{{ route('site.en.home') }}"
>
  @include('site.en.partials.header')

  <main id="sectors3-page">
    <section class="lp-section lp-sectorsHero2" id="sectors-hero-2" aria-label="Company sectors hero section">
      <video
        class="lp-sectorsHero2__video"
        autoplay
        muted
        playsinline
        preload="auto"
      >
        <source src="{{ $sectorsPageHeroVideo }}" type="video/mp4" />
      </video>

      <div class="lp-sectorsHero2__graphics" aria-hidden="true">
        <svg class="lp-lines lp-lines--topStart" viewBox="0 0 620 160" xmlns="http://www.w3.org/2000/svg">
          <line class="lp-line lp-line--w10" x1="620" y1="44" x2="200" y2="44"></line>
          <line class="lp-line lp-line--w4" x1="620" y1="72" x2="230" y2="72"></line>
          <line class="lp-line lp-line--w1" x1="620" y1="100" x2="300" y2="100"></line>
        </svg>

        <svg class="lp-lines lp-lines--bottomEnd" viewBox="0 0 620 160" xmlns="http://www.w3.org/2000/svg">
          <line class="lp-line lp-line--w10" x1="0" y1="100" x2="420" y2="100"></line>
          <line class="lp-line lp-line--w4" x1="0" y1="72" x2="410" y2="72"></line>
          <line class="lp-line lp-line--w1" x1="0" y1="44" x2="340" y2="44"></line>
        </svg>
      </div>

      <div class="lp-sectorsHero2__inner">
        <header class="lp-sectorsHero2__head">
          <h2 class="lp-sectorsHero2__title">
            Company <span class="lp-sectorsHero2__titleAccent">Sectors</span>
          </h2>
        </header>
      </div>
    </section>

    @include('site.en.pages.sectors-3.partials.section-2')
  </main>

  @include('site.en.partials.footer')

  <script>
    document.addEventListener('DOMContentLoaded', function () {
      if (typeof window.lpInitHeader === 'function' && !window.__lpHeaderInited) {
        window.__lpHeaderInited = true;
        window.lpInitHeader();
      }

      if (typeof window.lpInitHeroLines === 'function' && !window.__lpHeroLinesInited) {
        window.__lpHeroLinesInited = true;
        window.lpInitHeroLines();
      }

      if (typeof window.lpInitSectors === 'function' && !window.__lpSectorsInited) {
        window.__lpSectorsInited = true;
        window.lpInitSectors();
      }
    });
  </script>
</body>
</html>