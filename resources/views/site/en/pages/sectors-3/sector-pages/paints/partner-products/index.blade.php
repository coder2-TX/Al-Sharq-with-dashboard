@php
    $partnerNameFromQuery = trim((string) request()->query('name', ''));
    $partnerName = $partnerNameFromQuery !== '' ? $partnerNameFromQuery : 'JOTUN';
    $partnerHeroImage = asset('assets/images/sectors/sector-details/commercial/9.png');
@endphp

<!doctype html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>{{ $partnerName }} Products | Al Sharq Company</title>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/css/header.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/css/sectors.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/css/footer.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/css/iso.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/css/pages/sectors-3/sector-pages/medical/section-1.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/css/pages/sectors-3/sector-pages/communications/partner-products/section-2.css') }}" />

  <script src="{{ asset('assets/js/header.js') }}" defer></script>
  <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js" defer></script>
  <script src="{{ asset('assets/js/hero.js') }}" defer></script>
  <script src="{{ asset('assets/js/app.js') }}" defer></script>
</head>

<body
  class="lp-page--paintsSector lp-page--medicalSector"
  data-show-brand="true"
  data-brand-src="{{ asset('assets/images/header/Brand_Mark.png') }}"
  data-brand-href="{{ route('site.en.home') }}"
>
  @include('site.en.partials.header')

  <main id="paints-partner-products-page">
    @include('site.en.pages.sectors-3.sector-pages.paints.partner-products.partials.section-1')
    @include('site.en.pages.sectors-3.sector-pages.paints.partner-products.partials.section-2')
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
    });
  </script>
</body>
</html>