@php
    $partners = collect([
        (object) [
            'id' => 1,
            'partner_image' => asset('assets/images/parteners/6.png'),
            'partner_name' => 'Pearson',
            'description_ar' => 'مؤسسة تعليمية معروفة تقدم حلولاً تدريبية ومحتوى تطوير مهني يخدم الأفراد والجهات التعليمية والمؤسسية.',
        ],
        (object) [
            'id' => 2,
            'partner_image' => asset('assets/images/parteners/16.png'),
            'partner_name' => 'Cisco',
            'description_ar' => 'توفر مسارات تدريبية تقنية احترافية تساعد على بناء المهارات العملية في الشبكات والتقنيات الحديثة.',
        ],
        (object) [
            'id' => 3,
            'partner_image' => asset('assets/images/parteners/4.png'),
            'partner_name' => 'Autodesk',
            'description_ar' => 'علامة معروفة في الحلول التعليمية المرتبطة بالتصميم والهندسة، وتدعم برامج تدريبية ذات طابع تطبيقي واضح.',
        ],
        (object) [
            'id' => 4,
            'partner_image' => asset('assets/images/parteners/8.png'),
            'partner_name' => 'CompTIA',
            'description_ar' => 'جهة متخصصة في الشهادات والتدريب المهني التقني، وتوفر مسارات مناسبة للتأهيل العملي والمهني.',
        ],
        (object) [
            'id' => 5,
            'partner_image' => asset('assets/images/parteners/5.png'),
            'partner_name' => 'Coursera',
            'description_ar' => 'منصة تعليمية تقدم برامج تدريبية متنوعة يمكن الاستفادة منها في تطوير المهارات وبناء المسارات المهنية.',
        ],
        (object) [
            'id' => 6,
            'partner_image' => asset('assets/images/parteners/3.png'),
            'partner_name' => 'Udemy Business',
            'description_ar' => 'توفر محتوى تدريبي متنوعاً للجهات والأفراد في مجالات مهنية وتقنية وإدارية متعددة.',
        ],
    ]);
@endphp

<section
  class="lp-section lp-communicationsS3"
  id="vocational-training-partners"
  aria-label="شركاؤنا في قطاع التدريب المهني"
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

              $partnerUrl = route('site.ar.vocational_training.partner-products', [
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