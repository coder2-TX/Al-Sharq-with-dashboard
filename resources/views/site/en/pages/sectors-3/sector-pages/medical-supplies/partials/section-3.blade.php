@php
    $partners = collect([
        (object) [
            'id' => 1,
            'default_image' => 'assets/images/parteners/6.png',
            'partner_name' => 'MediLine',
            'description_en' => 'A sample partner representing companies specialized in essential medical consumables and practical supply lines for healthcare facilities.',
        ],
        (object) [
            'id' => 2,
            'default_image' => 'assets/images/parteners/16.png',
            'partner_name' => 'SteriPro',
            'description_en' => 'A sample partner used to reflect suppliers focused on sterilization, protection products, and safety-supporting medical supplies.',
        ],
        (object) [
            'id' => 3,
            'default_image' => 'assets/images/parteners/4.png',
            'partner_name' => 'CarePoint',
            'description_en' => 'A sample partner representing companies that provide practical tools and supplies for clinics, laboratories, and daily medical use.',
        ],
        (object) [
            'id' => 4,
            'default_image' => 'assets/images/parteners/8.png',
            'partner_name' => 'SafeKit',
            'description_en' => 'A sample partner designed to present product lines related to protection tools and basic medical setup needs.',
        ],
        (object) [
            'id' => 5,
            'default_image' => 'assets/images/parteners/5.png',
            'partner_name' => 'OrthoPlus',
            'description_en' => 'A sample partner representing supportive medical tools and supply categories used in professional clinical environments.',
        ],
        (object) [
            'id' => 6,
            'default_image' => 'assets/images/parteners/3.png',
            'partner_name' => 'ScanTech',
            'description_en' => 'A sample partner used to showcase suppliers that offer varied supplies and supportive device categories for daily medical operations.',
        ],
    ]);
@endphp

<section
  class="lp-section lp-communicationsS3"
  id="medical-supplies-partners"
  aria-label="Our Partners"
  data-slider
  data-autoplay="5000"
>
  <div class="lp-communicationsS3__inner">
    <article class="lp-communicationsS3__card">
      <h2 class="lp-communicationsS3__title lp-latinTextFix" dir="ltr" lang="en">
        Our Partners
      </h2>

      <button
        class="lp-communicationsS3__nav lp-communicationsS3__nav--prev"
        type="button"
        aria-label="Previous partner"
        data-dir="prev"
      >
        <i class="fa-solid fa-chevron-left" aria-hidden="true"></i>
      </button>

      <button
        class="lp-communicationsS3__nav lp-communicationsS3__nav--next"
        type="button"
        aria-label="Next partner"
        data-dir="next"
      >
        <i class="fa-solid fa-chevron-right" aria-hidden="true"></i>
      </button>

      <div class="lp-communicationsS3__viewport" data-slider-viewport aria-live="polite">
        @foreach ($partners as $partner)
          @php
              $partnerImage = asset($partner->default_image);
              $partnerUrl = route('site.en.medical_supplies.partner-products', [
                  'partner_id' => $partner->id,
                  'name' => $partner->partner_name,
              ]);
          @endphp

          <article class="lp-communicationsS3__slide {{ $loop->first ? 'is-active' : '' }}" data-slide aria-hidden="{{ $loop->first ? 'false' : 'true' }}">
            <div class="lp-communicationsS3__row">
              <div class="lp-communicationsS3__media">
                <img
                  src="{{ $partnerImage }}"
                  alt="{{ $partner->partner_name }}"
                  loading="lazy"
                  decoding="async"
                />
              </div>

              <div class="lp-communicationsS3__content">
                <h3 class="lp-communicationsS3__partnerName lp-latinTextFix" dir="ltr" lang="en">
                  {{ $partner->partner_name }}
                </h3>

                <div class="lp-communicationsS3__text lp-latinTextFix" dir="ltr" lang="en">
                  {!! \App\Support\Text\DisplayTextFormatter::fromPlainText($partner->description_en) !!}
                </div>

                <div class="lp-communicationsS3__actions">
                  <a
                    class="lp-cta lp-cta--partner"
                    href="{{ $partnerUrl }}"
                    aria-label="View {{ $partner->partner_name }} products"
                  >
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