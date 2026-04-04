@php
    $partners = \App\Models\SectorsPageMilkFoodPartner::query()
        ->orderBy('sort_order')
        ->orderBy('id')
        ->get();

    if ($partners->isEmpty()) {
        $partners = collect([
            (object) [
                'id' => 1,
                'partner_image' => null,
                'default_image' => 'assets/images/parteners/6.png',
                'partner_name' => 'NutriBaby',
                'description_en' => 'A temporary sample partner specialized in infant milk formulas and early nutrition solutions, added only to preview the section until real dashboard content is entered.',
            ],
            (object) [
                'id' => 2,
                'partner_image' => null,
                'default_image' => 'assets/images/parteners/16.png',
                'partner_name' => 'PureGrow',
                'description_en' => 'A placeholder nutrition partner used to display the partner slider structure clearly before actual partner records are added from the dashboard.',
            ],
            (object) [
                'id' => 3,
                'partner_image' => null,
                'default_image' => 'assets/images/parteners/4.png',
                'partner_name' => 'LactoCare',
                'description_en' => 'A sample partner for the milk-food sector that demonstrates the independent partner name, image, description, and products page flow.',
            ],
            (object) [
                'id' => 4,
                'partner_image' => null,
                'default_image' => 'assets/images/parteners/8.png',
                'partner_name' => 'HappyBites',
                'description_en' => 'Temporary content prepared for previewing the partner section in the milk-food sector using a fully separate dashboard connection.',
            ],
            (object) [
                'id' => 5,
                'partner_image' => null,
                'default_image' => 'assets/images/parteners/5.png',
                'partner_name' => 'BabyMeal',
                'description_en' => 'Demo content used to test the partner slider, view products button, and navigation flow until real records are created.',
            ],
            (object) [
                'id' => 6,
                'partner_image' => null,
                'default_image' => 'assets/images/parteners/3.png',
                'partner_name' => 'VitaJunior',
                'description_en' => 'A final placeholder item to make sure the section works completely with the milk-food partner data source instead of communications.',
            ],
        ]);
    }
@endphp

<section
  class="lp-section lp-communicationsS3"
  id="milk-food-partners"
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

              $partnerUrl = route('site.en.milk-food.partner-products', [
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