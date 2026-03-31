@php
    $partners = \App\Models\SectorsPageCommunicationsPartner::query()
        ->orderBy('sort_order')
        ->orderBy('id')
        ->get();

    if ($partners->isEmpty()) {
        $partners = collect([
            (object) [
                'partner_image' => null,
                'partner_name' => 'ITA POWER',
                'description_en' => "A leading Italian company established by a team with more than 20 years of experience in the fields of energy and information technology. Headquartered in Milan, it also has a support and manufacturing center in Dubai to serve Europe, the Middle East, and Africa.",
            ],
        ]);
    }
@endphp

<section
  class="lp-section lp-communicationsS3"
  id="communications-partners"
  aria-label="Our Parteners"
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
        Our Parteners
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
                  : asset('assets/images/parteners/6.png');

              $partnerDescription = \App\Support\Text\DisplayTextFormatter::fromPlainText($partner->description_en);

              $partnerUrl = route('site.en.communications.partner-products', [
                  'name' => $partnerName,
              ]);
          @endphp

          <article class="lp-communicationsS3__slide {{ $loop->first ? 'is-active' : '' }}" data-slide aria-hidden="{{ $loop->first ? 'false' : 'true' }}">
            <div class="lp-communicationsS3__row">
              <a
                class="lp-communicationsS3__media lp-communicationsS3__mediaLink"
                href="{{ $partnerUrl }}"
                aria-label="Open {{ $partnerName }} products"
              >
                <img
                  src="{{ $partnerImage }}"
                  alt="{{ $partnerName }}"
                  loading="lazy"
                  decoding="async"
                />
              </a>

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
              </div>
            </div>
          </article>
        @endforeach
      </div>
    </article>
  </div>
</section>