@php
    $partners = \App\Models\SectorsPageMedicinesPartner::query()
        ->orderBy('sort_order')
        ->orderBy('id')
        ->get();

    if ($partners->isEmpty()) {
        $partners = collect([
            (object) [
                'id' => 1,
                'default_image' => 'assets/images/parteners/6.png',
                'partner_name' => 'PharmaNova',
                'description_ar' => 'شريك افتراضي يمثل فئة الشركات المتخصصة في الأدوية العلاجية العامة والمستحضرات الدوائية الموجهة للسوق المؤسسي والتجزئة.',
            ],
            (object) [
                'id' => 2,
                'default_image' => 'assets/images/parteners/16.png',
                'partner_name' => 'VitaCure',
                'description_ar' => 'شريك افتراضي يعكس الشركات التي تقدم حلولاً دوائية داعمة للرعاية اليومية والأمراض المزمنة مع تركيز على الجودة والاستمرارية.',
            ],
            (object) [
                'id' => 3,
                'default_image' => 'assets/images/parteners/4.png',
                'partner_name' => 'MediCore',
                'description_ar' => 'شريك افتراضي لعرض الشركات التي توفر أصنافًا دوائية متنوعة للمستشفيات والصيدليات وفق احتياج السوق المحلي.',
            ],
            (object) [
                'id' => 4,
                'default_image' => 'assets/images/parteners/8.png',
                'partner_name' => 'BioThera',
                'description_ar' => 'شريك افتراضي يعبّر عن الجهات التي تدعم القطاع الدوائي بمنتجات علاجية موثوقة وخيارات متعددة ضمن خطوط مختلفة.',
            ],
            (object) [
                'id' => 5,
                'default_image' => 'assets/images/parteners/5.png',
                'partner_name' => 'Healix',
                'description_ar' => 'شريك افتراضي مخصص لتمثيل العلامات التي تجمع بين كفاءة المنتج وسهولة التوزيع والتوافر المستمر في السوق.',
            ],
            (object) [
                'id' => 6,
                'default_image' => 'assets/images/parteners/3.png',
                'partner_name' => 'CareMeds',
                'description_ar' => 'شريك افتراضي يعرض نموذج الشركات الداعمة لقطاع الأدوية عبر مستحضرات متنوعة وحلول مناسبة لاحتياجات الرعاية الصحية.',
            ],
        ]);
    }
@endphp

<section
  class="lp-section lp-communicationsS3"
  id="medicines-partners"
  aria-label="شركاؤنا"
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

              $partnerImage = !empty($partner->partner_image)
                  ? (\Illuminate\Support\Str::startsWith((string) $partner->partner_image, ['http://', 'https://'])
                      ? $partner->partner_image
                      : \Illuminate\Support\Facades\Storage::url($partner->partner_image))
                  : (!empty($partner->default_image)
                      ? asset($partner->default_image)
                      : asset('assets/images/parteners/6.png'));

              $partnerUrl = route('site.ar.medicines.partner-products', [
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
                <h3 class="lp-communicationsS3__partnerName">
                  <span class="lp-autoLatin" dir="ltr" lang="en">{{ $partnerName }}</span>
                </h3>

                <div class="lp-communicationsS3__text">
                  {!! \App\Support\Text\DisplayTextFormatter::fromPlainText((string) ($partner->description_ar ?? '')) !!}
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