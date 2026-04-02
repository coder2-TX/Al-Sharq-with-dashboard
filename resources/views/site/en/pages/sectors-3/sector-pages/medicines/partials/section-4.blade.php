@php
    $partners = collect([
        (object) [
            'id' => 1,
            'default_image' => 'assets/images/parteners/6.png',
            'partner_name' => 'PharmaNova',
            'description_en' => 'A sample partner representing companies focused on general therapeutic medicines and pharmaceutical lines supplied to institutional and retail markets.',
        ],
        (object) [
            'id' => 2,
            'default_image' => 'assets/images/parteners/16.png',
            'partner_name' => 'VitaCure',
            'description_en' => 'A sample partner reflecting companies that provide supportive pharmaceutical solutions for everyday care and chronic treatment categories.',
        ],
        (object) [
            'id' => 3,
            'default_image' => 'assets/images/parteners/4.png',
            'partner_name' => 'MediCore',
            'description_en' => 'A sample partner used to present pharmaceutical suppliers offering diversified medicine lines for hospitals and pharmacies.',
        ],
        (object) [
            'id' => 4,
            'default_image' => 'assets/images/parteners/8.png',
            'partner_name' => 'BioThera',
            'description_en' => 'A sample partner representing companies that support the medicines sector with reliable treatment products and multiple product lines.',
        ],
        (object) [
            'id' => 5,
            'default_image' => 'assets/images/parteners/5.png',
            'partner_name' => 'Healix',
            'description_en' => 'A sample partner designed to reflect brands that combine product efficiency, steady availability, and practical distribution support.',
        ],
        (object) [
            'id' => 6,
            'default_image' => 'assets/images/parteners/3.png',
            'partner_name' => 'CareMeds',
            'description_en' => 'A sample partner showcasing companies that contribute to the medicines sector through varied pharmaceutical solutions and healthcare support products.',
        ],
    ]);
@endphp

<section
  class="lp-section lp-communicationsS3"
  id="medicines-partners"
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
              $partnerUrl = route('site.en.medicines.partner-products', [
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