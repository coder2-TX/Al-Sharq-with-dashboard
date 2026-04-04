@php
    $partnerId = (int) request()->query('partner_id', 1);
    $partnerNameFromQuery = trim((string) request()->query('name', ''));

    $partner = null;

    if ($partnerId > 0) {
        $partner = \App\Models\SectorsPageMedicalSuppliesPartner::query()->find($partnerId);
    }

    if (!$partner && $partnerNameFromQuery !== '') {
        $partner = \App\Models\SectorsPageMedicalSuppliesPartner::query()
            ->where('partner_name', $partnerNameFromQuery)
            ->first();
    }

    $partnerName = trim((string) ($partner?->partner_name ?: ($partnerNameFromQuery !== '' ? $partnerNameFromQuery : 'MediLine')));

    $partnerHeroImage = !empty($partner?->products_hero_image)
        ? \Illuminate\Support\Facades\Storage::url($partner->products_hero_image)
        : asset('assets/images/1.jpg');
@endphp

<!doctype html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>منتجات {{ $partnerName }} | شركة الشرق</title>

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
  class="lp-page--medicalSector"
  data-show-brand="true"
  data-brand-src="{{ asset('assets/images/header/Brand_Mark.png') }}"
  data-brand-href="{{ route('site.ar.home') }}"
>
  @include('site.ar.partials.header')

  <main id="medical-supplies-partner-products-page">
    @include('site.ar.pages.sectors-3.sector-pages.medical-supplies.partner-products.partials.section-1')
    @include('site.ar.pages.sectors-3.sector-pages.medical-supplies.partner-products.partials.section-2')
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