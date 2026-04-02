@php
    $partners = collect([
        (object) [
            'id' => 1,
            'partner_image' => asset('assets/images/parteners/6.png'),
            'partner_name' => 'JOTUN',
            'description_ar' => 'علامة عالمية معروفة في الدهانات والحلول الوقائية، تقدم منتجات متنوعة للمشاريع السكنية والتجارية والصناعية.',
        ],
        (object) [
            'id' => 2,
            'partner_image' => asset('assets/images/parteners/16.png'),
            'partner_name' => 'Hempel',
            'description_ar' => 'شركة متخصصة في الطلاءات الواقية والدهانات عالية الأداء، وتخدم قطاعات البناء والبنية التحتية والصناعة.',
        ],
        (object) [
            'id' => 3,
            'partner_image' => asset('assets/images/parteners/4.png'),
            'partner_name' => 'National Paints',
            'description_ar' => 'توفر حلولاً متنوعة في الدهانات والزخارف والتشطيبات، مع خيارات مناسبة للاستخدامات الداخلية والخارجية.',
        ],
        (object) [
            'id' => 4,
            'partner_image' => asset('assets/images/parteners/8.png'),
            'partner_name' => 'SIKA',
            'description_ar' => 'مزود معروف في مواد البناء والحماية والعزل، ويقدم منتجات مكملة مهمة لقطاع الدهانات والتشطيبات.',
        ],
        (object) [
            'id' => 5,
            'partner_image' => asset('assets/images/parteners/5.png'),
            'partner_name' => 'KAPCI',
            'description_ar' => 'علامة متخصصة في دهانات السيارات والطلاءات الصناعية، مع حلول مناسبة لورش الصيانة والتشطيب المهني.',
        ],
        (object) [
            'id' => 6,
            'partner_image' => asset('assets/images/parteners/3.png'),
            'partner_name' => 'MIDO',
            'description_ar' => 'توفر مجموعة عملية من الدهانات ومنتجات المعاجين والتشطيبات بما يخدم احتياجات المشاريع المختلفة.',
        ],
    ]);
@endphp

<section
  class="lp-section lp-communicationsS3"
  id="paints-partners"
  aria-label="شركاؤنا في قطاع الدهانات"
  data-slider
  data-autoplay="5000"
>
  <div class="lp-communicationsS3__inner">
    <article class="lp-communicationsS3__card">
      <h2 class="lp-communicationsS3__title">شركاؤنا</h2>

      <button
        class="lp-communicationsS3__nav lp-communicationsS3__nav--prev"
        type="button"
        aria-label="الشريك السابق"
        data-dir="prev"
      >
        <i class="fa-solid fa-chevron-right" aria-hidden="true"></i>
      </button>

      <button
        class="lp-communicationsS3__nav lp-communicationsS3__nav--next"
        type="button"
        aria-label="الشريك التالي"
        data-dir="next"
      >
        <i class="fa-solid fa-chevron-left" aria-hidden="true"></i>
      </button>

      <div class="lp-communicationsS3__viewport" data-slider-viewport aria-live="polite">
        @foreach ($partners as $partner)
          @php
              $partnerName = trim((string) ($partner->partner_name ?? 'شريكنا'));

              $partnerDescription = \App\Support\Text\DisplayTextFormatter::fromPlainText(
                  (string) ($partner->description_ar ?? '')
              );

              $partnerUrl = route('site.ar.paints.partner-products', [
                  'partner_id' => $partner->id ?? null,
                  'name' => $partnerName,
              ]);
          @endphp

          <article class="lp-communicationsS3__slide {{ $loop->first ? 'is-active' : '' }}" data-slide aria-hidden="{{ $loop->first ? 'false' : 'true' }}">
            <div class="lp-communicationsS3__row">
              <div class="lp-communicationsS3__media">
                <img
                  src="{{ $partner->partner_image }}"
                  alt="{{ $partnerName }}"
                  loading="lazy"
                  decoding="async"
                />
              </div>

              <div class="lp-communicationsS3__content">
                <h3 class="lp-communicationsS3__partnerName">
                  <span class="lp-autoLatin" dir="ltr" lang="en">{{ $partnerName }}</span>
                </h3>

                <div class="lp-communicationsS3__text">
                  {!! $partnerDescription !!}
                </div>

                <div class="lp-communicationsS3__actions">
                  <a
                    class="lp-cta lp-cta--partner"
                    href="{{ $partnerUrl }}"
                    aria-label="عرض منتجات {{ $partnerName }}"
                  >
                    <span class="lp-cta__stroke" aria-hidden="true"></span>
                    <span class="lp-cta__layer" aria-hidden="true">
                      <span class="lp-cta__text">عرض المنتجات</span>
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