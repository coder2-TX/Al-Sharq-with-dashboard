@php
    $partners = \App\Models\SectorsPageCarsPartner::query()
        ->orderBy('sort_order')
        ->orderBy('id')
        ->get();

    if ($partners->isEmpty()) {
        $partners = collect([
            (object) [
                'id' => 1,
                'partner_image' => asset('assets/images/parteners/6.png'),
                'partner_name' => 'TOYOTA',
                'description_ar' => 'علامة عالمية معروفة في قطاع السيارات، تشتهر بالاعتمادية العالية وتنوع المنتجات والحلول المناسبة للأفراد والشركات والأساطيل التشغيلية.',
            ],
            (object) [
                'id' => 2,
                'partner_image' => asset('assets/images/parteners/16.png'),
                'partner_name' => 'BOSCH',
                'description_ar' => 'مزود دولي لحلول السيارات وقطع الغيار والأنظمة التقنية، يقدم منتجات عملية تساعد على رفع الكفاءة وتحسين الأداء والاستدامة التشغيلية.',
            ],
            (object) [
                'id' => 3,
                'partner_image' => asset('assets/images/parteners/4.png'),
                'partner_name' => 'DENSO',
                'description_ar' => 'شركة متخصصة في مكونات وأنظمة السيارات الحديثة، توفر حلولاً متنوعة في مجالات التبريد والإشعال والإدارة الذكية للمركبات.',
            ],
            (object) [
                'id' => 4,
                'partner_image' => asset('assets/images/parteners/8.png'),
                'partner_name' => 'MOBIL',
                'description_ar' => 'شريك معروف في مجال زيوت وتشحيم المركبات، يقدم منتجات موثوقة تدعم المحركات وتحافظ على الأداء في ظروف التشغيل المختلفة.',
            ],
            (object) [
                'id' => 5,
                'partner_image' => asset('assets/images/parteners/5.png'),
                'partner_name' => 'MICHELIN',
                'description_ar' => 'علامة رائدة في الإطارات وحلول الحركة، توفر خيارات متعددة تناسب الاستخدام الشخصي والتجاري وتدعم مستويات أعلى من الأمان والثبات.',
            ],
            (object) [
                'id' => 6,
                'partner_image' => asset('assets/images/parteners/3.png'),
                'partner_name' => 'ACDelco',
                'description_ar' => 'توفر مجموعة واسعة من قطع الغيار والبطاريات والفلاتر ومنتجات الصيانة، بما يلبي احتياجات المركبات المختلفة بصورة عملية وفعالة.',
            ],
        ]);
    }
@endphp

<section
  class="lp-section lp-communicationsS3"
  id="cars-partners"
  aria-label="شركاؤنا في قطاع السيارات"
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
                  : asset('assets/images/parteners/6.png');

              $partnerDescription = \App\Support\Text\DisplayTextFormatter::fromPlainText(
                  (string) ($partner->description_ar ?? '')
              );

              $partnerUrl = route('site.ar.cars.partner-products', [
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