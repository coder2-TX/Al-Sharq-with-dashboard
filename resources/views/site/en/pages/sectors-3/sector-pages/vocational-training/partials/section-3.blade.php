@php
    $partners = \App\Models\SectorsPageVocationalTrainingPartner::query()
        ->orderBy('sort_order')
        ->orderBy('id')
        ->get();

    if ($partners->isEmpty()) {
        $partners = collect([
            (object) [
                'id' => 1,
                'partner_image' => asset('assets/images/parteners/6.png'),
                'partner_name' => 'Pearson',
                'description_en' => 'A recognized educational organization offering structured learning solutions and professional development content for institutions and individuals.',
            ],
            (object) [
                'id' => 2,
                'partner_image' => asset('assets/images/parteners/16.png'),
                'partner_name' => 'Cisco',
                'description_en' => 'Provides technical learning paths that help learners build practical and career-relevant skills in modern technology fields.',
            ],
            (object) [
                'id' => 3,
                'partner_image' => asset('assets/images/parteners/4.png'),
                'partner_name' => 'Autodesk',
                'description_en' => 'Known for training-linked design and engineering tools that support professional and technical development environments.',
            ],
            (object) [
                'id' => 4,
                'partner_image' => asset('assets/images/parteners/8.png'),
                'partner_name' => 'CompTIA',
                'description_en' => 'A specialized provider of technical certification and vocational learning tracks that support workforce readiness.',
            ],
            (object) [
                'id' => 5,
                'partner_image' => asset('assets/images/parteners/5.png'),
                'partner_name' => 'Coursera',
                'description_en' => 'A digital learning platform that offers a wide range of professional development and upskilling opportunities.',
            ],
            (object) [
                'id' => 6,
                'partner_image' => asset('assets/images/parteners/3.png'),
                'partner_name' => 'Udemy Business',
                'description_en' => 'Offers varied training content for organizations and individuals across business, technical, and professional subjects.',
            ],
        ]);
    }
@endphp

<section
  class="lp-section lp-communicationsS3"
  id="vocational-training-partners"
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

              $partnerImage = !empty($partner->partner_image)
                  ? (\Illuminate\Support\Str::startsWith((string) $partner->partner_image, ['http://', 'https://'])
                      ? $partner->partner_image
                      : \Illuminate\Support\Facades\Storage::url($partner->partner_image))
                  : asset('assets/images/parteners/6.png');

              $partnerDescription = \App\Support\Text\DisplayTextFormatter::fromPlainText((string) ($partner->description_en ?? ''));

              $partnerUrl = route('site.en.vocational_training.partner-products', [
                  'partner_id' => $partner->id ?? null,
                  'name' => $partnerName,
              ]);
          @endphp

          <article class="lp-communicationsS3__slide {{ $loop->first ? 'is-active' : '' }}" data-slide aria-hidden="{{ $loop->first ? 'false' : 'true' }}">
            <div class="lp-communicationsS3__row">
              <div class="lp-communicationsS3__media">
                <img src="{{ $partnerImage }}" alt="{{ $partnerName }}" loading="lazy" decoding="async" />
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