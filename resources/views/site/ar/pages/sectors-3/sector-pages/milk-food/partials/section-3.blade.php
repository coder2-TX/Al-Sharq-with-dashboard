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
                'description_ar' => 'شريك افتراضي متخصص في تركيبات حليب الأطفال والحلول الغذائية المبكرة، تم وضعه مؤقتاً لعرض شكل السلايدر والربط حتى يتم إدخال بيانات الشركاء الفعلية من لوحة التحكم.',
            ],
            (object) [
                'id' => 2,
                'partner_image' => null,
                'default_image' => 'assets/images/parteners/16.png',
                'partner_name' => 'PureGrow',
                'description_ar' => 'علامة افتراضية لمنتجات التغذية المساندة للأطفال، أضفناها فقط لعرض تصميم الشركاء بشكل واضح قبل تعبئة البيانات الحقيقية.',
            ],
            (object) [
                'id' => 3,
                'partner_image' => null,
                'default_image' => 'assets/images/parteners/4.png',
                'partner_name' => 'LactoCare',
                'description_ar' => 'شريك افتراضي ضمن قطاع حليب الأطفال والأغذية، يوضح كيفية ظهور اسم الشريك وصورته والوصف وزر المنتجات ضمن هذا السكشن.',
            ],
            (object) [
                'id' => 4,
                'partner_image' => null,
                'default_image' => 'assets/images/parteners/8.png',
                'partner_name' => 'HappyBites',
                'description_ar' => 'محتوى تجريبي مؤقت لعرض الشركاء في واجهة قطاع حليب الأطفال والأغذية بنفس آلية قطاع الاتصالات ولكن ببيانات مستقلة.',
            ],
            (object) [
                'id' => 5,
                'partner_image' => null,
                'default_image' => 'assets/images/parteners/5.png',
                'partner_name' => 'BabyMeal',
                'description_ar' => 'بيانات افتراضية تساعد على اختبار السلايدر وزر عرض المنتجات والتنقل بين الشركاء إلى أن تتم الإضافة من الداشبورد.',
            ],
            (object) [
                'id' => 6,
                'partner_image' => null,
                'default_image' => 'assets/images/parteners/3.png',
                'partner_name' => 'VitaJunior',
                'description_ar' => 'عنصر تجريبي أخير للتأكد من أن السكشن يعمل كاملاً بالربط المستقل الخاص بقطاع حليب الأطفال والأغذية.',
            ],
        ]);
    }
@endphp

<section
  class="lp-section lp-communicationsS3"
  id="milk-food-partners"
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
                  ? \Illuminate\Support\Facades\Storage::url($partner->partner_image)
                  : (!empty($partner->default_image)
                      ? asset($partner->default_image)
                      : asset('assets/images/parteners/6.png'));

              $partnerDescription = \App\Support\Text\DisplayTextFormatter::fromPlainText(
                  (string) ($partner->description_ar ?? '')
              );

              $partnerUrl = route('site.ar.milk-food.partner-products', [
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