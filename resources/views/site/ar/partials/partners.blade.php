@php
    $partnerLogos = \App\Models\PartnerLogo::query()
        ->orderBy('sort_order')
        ->get();

    $defaultPartnerFiles = [
        '1.png',
        '2.png',
        '3.png',
        '4.png',
        '5.png',
        '6.png',
        '8.png',
        '9.png',
        '10.png',
        '11.png',
        '12.png',
        '13.png',
        '14.png',
        '15.png',
        '16.png',
        '17.png',
        '18.png',
        '19.png',
        '20.png',
        '21.png',
        '22.png',
        '23.png',
        '24.png',
        '25.png',
        '26.png',
    ];
@endphp

<section class="lp-partners lp-section" id="partners" dir="rtl" lang="ar" aria-label="شركاء الشرق">
  <div class="lp-partners__inner">
    <h2 class="lp-partners__title">
      شركاء <span class="lp-partners__titleAccent">الشرق</span>
    </h2>

    <div class="lp-partners__slider">
      <div id="lp-partners-logos" class="splide" aria-label="شعارات الشركاء">
        <div class="splide__track">
          <ul class="splide__list">
            @if($partnerLogos->count())
              @foreach($partnerLogos as $partnerLogo)
                <li class="splide__slide">
                  <img
                    src="{{ $partnerLogo->image_url }}"
                    alt="شعار شريك {{ $loop->iteration }}"
                    class="lp-partners__image"
                  >
                </li>
              @endforeach
            @else
              @foreach($defaultPartnerFiles as $file)
                <li class="splide__slide">
                  <img
                    src="{{ asset('assets/images/parteners/' . $file) }}"
                    alt="شعار شريك {{ $loop->iteration }}"
                    class="lp-partners__image"
                  >
                </li>
              @endforeach
            @endif
          </ul>
        </div>
      </div>
    </div>

  </div>
</section>