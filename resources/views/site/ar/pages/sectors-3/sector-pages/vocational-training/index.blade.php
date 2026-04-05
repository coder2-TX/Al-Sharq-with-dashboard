@php
    $page = \App\Models\SectorsPageVocationalTrainingPage::query()->first();

    $vocationalTrainingHeroImage = $page?->hero_image
        ? \Illuminate\Support\Facades\Storage::url($page->hero_image)
        : asset('assets/images/section/8.jpeg');
@endphp

<!doctype html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>قطاع التدريب المهني | شركة الشرق</title>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/css/header.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/css/sectors.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/css/footer.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/css/iso.css') }}" />

  <link rel="stylesheet" href="{{ asset('assets/css/pages/sectors-3/sector-pages/medical/section-1.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/css/pages/sectors-3/sector-pages/medical/section-2.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/css/pages/sectors-3/sector-pages/communications/section-3.css') }}" />

  <script src="{{ asset('assets/js/header.js') }}" defer></script>
  <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js" defer></script>
  <script src="{{ asset('assets/js/hero.js') }}" defer></script>
  <script src="{{ asset('assets/js/communications-section-3-slider.js') }}" defer></script>
  <script src="{{ asset('assets/js/app.js') }}" defer></script>
</head>

<body
  class="lp-page--vocationalTrainingSector lp-page--medicalSector"
  data-show-brand="true"
  data-brand-src="{{ asset('assets/images/header/Brand_Mark.png') }}"
  data-brand-href="{{ route('site.ar.home') }}"
>
  @include('site.ar.partials.header')

  <main id="vocational-training-sector-page">

    <section
      class="lp-section lp-medicalS1"
      id="vocational-training-hero"
      aria-label="قطاع التدريب المهني"
      style="position: relative; overflow: hidden; isolation: isolate;"
    >
      <div
        aria-hidden="true"
        style="position:absolute; inset:0; background-image:url('{{ $vocationalTrainingHeroImage }}'); background-size:cover; background-position:center; background-repeat:no-repeat; z-index:0;"
      ></div>

      <div
        aria-hidden="true"
        style="position:absolute; inset:0; background:rgba(0,0,0,.35); z-index:1;"
      ></div>

      <div class="lp-medicalS1__graphics" aria-hidden="true" style="position:relative; z-index:2;">
        <svg class="lp-lines lp-lines--topStart" viewBox="0 0 620 160" xmlns="http://www.w3.org/2000/svg">
          <line class="lp-line lp-line--w10" x1="620" y1="44"  x2="200" y2="44"></line>
          <line class="lp-line lp-line--w4"  x1="620" y1="72"  x2="230" y2="72"></line>
          <line class="lp-line lp-line--w1"  x1="620" y1="100" x2="300" y2="100"></line>
        </svg>

        <svg class="lp-lines lp-lines--bottomEnd" viewBox="0 0 620 160" xmlns="http://www.w3.org/2000/svg">
          <line class="lp-line lp-line--w10" x1="0" y1="100" x2="420" y2="100"></line>
          <line class="lp-line lp-line--w4"  x1="0" y1="72"  x2="410" y2="72"></line>
          <line class="lp-line lp-line--w1"  x1="0" y1="44"  x2="340" y2="44"></line>
        </svg>
      </div>

      <div class="lp-medicalS1__content" style="position:relative; z-index:2;">
        <div class="lp-medicalS1__contentRow">
          <div class="lp-medicalS1__text">
            <h1 class="lp-medicalS1__title lp-sectors__title">
              <span class="lp-medicalS1__titleLine">
                قطاع <span class="lp-medicalS1__accentWord">التدريب المهني</span>
              </span>
            </h1>
          </div>
        </div>
      </div>
    </section>

    @include('site.ar.pages.sectors-3.sector-pages.vocational-training.partials.section-2')
    @include('site.ar.pages.sectors-3.sector-pages.vocational-training.partials.section-3')

  </main>

  @include('site.ar.partials.footer')

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
    });
  </script>
</body>
</html>