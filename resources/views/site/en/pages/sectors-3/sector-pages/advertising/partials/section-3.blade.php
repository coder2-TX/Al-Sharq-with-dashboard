@php
    $partners = \App\Models\SectorsPageAdvertisingPartner::query()
        ->orderBy('sort_order')
        ->orderBy('id')
        ->get();

    if ($partners->isEmpty()) {
        $partners = collect([
            (object) [
                'id' => 1,
                'partner_image' => null,
                'default_image' => 'assets/images/parteners/6.png',
                'partner_name' => 'BrandSpark',
                'description_en' => 'A sample advertising partner added temporarily to preview the partner slider and the products page flow until real dashboard content is entered.',
            ],
            (object) [
                'id' => 2,
                'partner_image' => null,
                'default_image' => 'assets/images/parteners/16.png',
                'partner_name' => 'MediaFlow',
                'description_en' => 'A placeholder advertising and media partner used to present the section structure before actual records are created from the dashboard.',
            ],
            (object) [
                'id' => 3,
                'partner_image' => null,
                'default_image' => 'assets/images/parteners/4.png',
                'partner_name' => 'Vision Ads',
                'description_en' => 'A temporary sample partner that demonstrates how the partner image, description, and products button will work in the advertising sector.',
            ],
            (object) [
                'id' => 4,
                'partner_image' => null,
                'default_image' => 'assets/images/parteners/8.png',
                'partner_name' => 'Creative Hub',
                'description_en' => 'Demo content used to preview the independent advertising partner slider before the final dashboard content is added.',
            ],
            (object) [
                'id' => 5,
                'partner_image' => null,
                'default_image' => 'assets/images/parteners/5.png',
                'partner_name' => 'Impact Media',
                'description_en' => 'A sample record prepared only for visual testing of the advertising section and the partner products page.',
            ],
            (object) [
                'id' => 6,
                'partner_image' => null,
                'default_image' => 'assets/images/parteners/3.png',
                'partner_name' => 'PromoWorks',
                'description_en' => 'A final placeholder partner ensuring that the slider works completely with the advertising data source instead of communications.',
            ],
        ]);
    }
@endphp

<section
  class="lp-section lp-communicationsS3"
  id="advertising-partners"
  aria-label="Our Partners"
  data-slider
  data-autoplay="5000"
>
  <div class="lp-communicationsS3__inner">
    <article class="lp-communicationsS3__card">
      <h2
        class="lp-communicationsS3__title lp-latinTextFix"
        dir="ltr"
        lang="en"
      >
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
              $partnerName = trim((string) ($partner->partner_name ?? 'Our Partner'));

              $partnerImage = !empty($partner->partner_image)
                  ? \Illuminate\Support\Facades\Storage::url($partner->partner_image)
                  : (!empty($partner->default_image)
                      ? asset($partner->default_image)
                      : asset('assets/images/parteners/6.png'));

              $partnerDescription = \App\Support\Text\DisplayTextFormatter::fromPlainText(
                  (string) ($partner->description_en ?? '')
              );

              $partnerUrl = route('site.en.advertising.partner-products', [
                  'partner_id' => $partner->id ?? null,
                  'name' => $partnerName,
              ]);
          @endphp

          <article class="lp-communicationsS3__slide {{ $loop->first ? 'is-active' : '' }}" data-slide aria-hidden="{{ $loop->first ? 'false' : 'true' }}">
            <div class="lp-communicationsS3__row">
              <div class="lp-communicationsS3__media">
                <img
                  src="{{ $partnerImage }}"
                  alt="{{ $partnerName }}"
                  loading="lazy"
                  decoding="async"
                />
              </div>

              <div class="lp-communicationsS3__content">
                <h3
                  class="lp-communicationsS3__partnerName lp-latinTextFix"
                  dir="ltr"
                  lang="en"
                >
                  {{ $partnerName }}
                </h3>

                <div
                  class="lp-communicationsS3__text lp-latinTextFix"
                  dir="ltr"
                  lang="en"
                >
                  {!! $partnerDescription !!}
                </div>

                <div class="lp-communicationsS3__actions">
                  <a
                    class="lp-cta lp-cta--partner"
                    href="{{ $partnerUrl }}"
                    aria-label="View {{ $partnerName }} products"
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