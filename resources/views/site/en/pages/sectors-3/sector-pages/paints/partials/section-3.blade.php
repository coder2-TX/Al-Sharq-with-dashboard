@php
    $partners = collect([
        (object) [
            'id' => 1,
            'partner_image' => asset('assets/images/parteners/6.png'),
            'partner_name' => 'JOTUN',
            'description_en' => 'A globally recognized brand in paints and protective coatings, offering solutions for residential, commercial, and industrial use.',
        ],
        (object) [
            'id' => 2,
            'partner_image' => asset('assets/images/parteners/16.png'),
            'partner_name' => 'Hempel',
            'description_en' => 'A specialized provider of high-performance coatings serving construction, infrastructure, and industrial sectors.',
        ],
        (object) [
            'id' => 3,
            'partner_image' => asset('assets/images/parteners/4.png'),
            'partner_name' => 'National Paints',
            'description_en' => 'Offers a wide range of paints, decorative solutions, and finishing materials for interior and exterior projects.',
        ],
        (object) [
            'id' => 4,
            'partner_image' => asset('assets/images/parteners/8.png'),
            'partner_name' => 'SIKA',
            'description_en' => 'Known for construction and protection solutions that complement the paints and finishing industry in practical ways.',
        ],
        (object) [
            'id' => 5,
            'partner_image' => asset('assets/images/parteners/5.png'),
            'partner_name' => 'KAPCI',
            'description_en' => 'A recognized name in automotive and industrial paints, serving workshops and professional finishing environments.',
        ],
        (object) [
            'id' => 6,
            'partner_image' => asset('assets/images/parteners/3.png'),
            'partner_name' => 'MIDO',
            'description_en' => 'Provides a practical range of paints, putties, and finishing products for different project needs.',
        ],
    ]);
@endphp

<section
  class="lp-section lp-communicationsS3"
  id="paints-partners"
  aria-label="Our Partners"
  data-slider
  data-autoplay="5000"
>
  <div class="lp-communicationsS3__inner">
    <article class="lp-communicationsS3__card">
      <h2 class="lp-communicationsS3__title">Our Partners</h2>

      <button class="lp-communicationsS3__nav lp-communicationsS3__nav--prev" type="button" aria-label="Previous partner" data-dir="prev">
        <i class="fa-solid fa-chevron-left" aria-hidden="true"></i>
      </button>

      <button class="lp-communicationsS3__nav lp-communicationsS3__nav--next" type="button" aria-label="Next partner" data-dir="next">
        <i class="fa-solid fa-chevron-right" aria-hidden="true"></i>
      </button>

      <div class="lp-communicationsS3__viewport" data-slider-viewport aria-live="polite">
        @foreach ($partners as $partner)
          @php
              $partnerName = trim((string) ($partner->partner_name ?? 'Our Partner'));
              $partnerDescription = \App\Support\Text\DisplayTextFormatter::fromPlainText((string) ($partner->description_en ?? ''));
              $partnerUrl = route('site.en.paints.partner-products', [
                  'partner_id' => $partner->id ?? null,
                  'name' => $partnerName,
              ]);
          @endphp

          <article class="lp-communicationsS3__slide {{ $loop->first ? 'is-active' : '' }}" data-slide aria-hidden="{{ $loop->first ? 'false' : 'true' }}">
            <div class="lp-communicationsS3__row">
              <div class="lp-communicationsS3__media">
                <img src="{{ $partner->partner_image }}" alt="{{ $partnerName }}" loading="lazy" decoding="async" />
              </div>

              <div class="lp-communicationsS3__content">
                <h3 class="lp-communicationsS3__partnerName">
                  <span class="lp-autoLatin" dir="ltr" lang="en">{{ $partnerName }}</span>
                </h3>

                <div class="lp-communicationsS3__text">
                  {!! $partnerDescription !!}
                </div>

                <div class="lp-communicationsS3__actions">
                  <a class="lp-cta lp-cta--partner" href="{{ $partnerUrl }}" aria-label="View {{ $partnerName }} products">
                    <span class="lp-cta__stroke" aria-hidden="true"></span>
                    <span class="lp-cta__layer" aria-hidden="true">
                      <span class="lp-cta__text">View Products</span>
                    </span>
                  </a>
                </div>
              </div>
            </div>
          </article>
        @endforeach
      </div>
    </article>
  </div>
</section>