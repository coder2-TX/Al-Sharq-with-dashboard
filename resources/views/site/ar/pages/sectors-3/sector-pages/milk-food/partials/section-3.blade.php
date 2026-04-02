@php
    $partners = \App\Models\SectorsPageCommunicationsPartner::query()
        ->orderBy('sort_order')
        ->orderBy('id')
        ->get();

    if ($partners->isEmpty()) {
        $partners = collect([
            (object) [
                'id' => 1,
                'partner_image' => null,
                'default_image' => 'assets/images/parteners/6.png',
                'partner_name' => 'ITA POWER',
                'description_ar' => 'شركة إيطالية رائدة تأسست على يد فريق خبرة يفوق 20 عاماً في مجال الطاقة وتقنيات تكنولوجيا المعلومات مقرها في ميلانو، مع مركز دعم وتصنيع في دبي لتغطية منطقة أوروبا والشرق الأوسط وأفريقيا',
            ],
            (object) [
                'id' => 2,
                'partner_image' => null,
                'default_image' => 'assets/images/parteners/16.png',
                'partner_name' => 'XONTEL',
                'description_ar' => 'الأولى عربياً في تقنيات الاتصالات الذكية، تأسست عام 2004 في الكويت بأيدي مهندسين مختصين وهي علامة تجارية مسجلة في الاتحاد الأوروبي، حاصلة على شهادات IEEE، FCC، CE، SASO',
            ],
            (object) [
                'id' => 3,
                'partner_image' => null,
                'default_image' => 'assets/images/parteners/4.png',
                'partner_name' => 'Ruijie & Reyee',
                'description_ar' => 'إحدى الشركات الرائدة عالمياً في البنية التحتية للشبكات، والتي تأسست عام 2003 وتخدم أكثر من 90 دولة عبر تقنيات متقدمة وفريق بحث وتطوير عالمي',
            ],
            (object) [
                'id' => 4,
                'partner_image' => null,
                'default_image' => 'assets/images/parteners/8.png',
                'partner_name' => 'INSPUR',
                'description_ar' => 'مزود عالمي لحلول البنية الرقمية المتقدمة، يقدم تقنيات عالية الكفاءة في الخوادم ومراكز البيانات والمنصات الذكية، بما يدعم المؤسسات في بناء أنظمة اتصال وتشغيل موثوقة وقابلة للتوسع.',
            ],
            (object) [
                'id' => 5,
                'partner_image' => null,
                'default_image' => 'assets/images/parteners/5.png',
                'partner_name' => 'HUAWEI',
                'description_ar' => 'شريك تقني رائد في حلول الاتصالات والشبكات الذكية، يوفر منظومة متكاملة تشمل البنية التحتية للشبكات والحلول المؤسسية وأنظمة الربط الحديثة، مع تركيز على الاعتمادية والأداء والاستدامة التقنية.',
            ],
            (object) [
                'id' => 6,
                'partner_image' => null,
                'default_image' => 'assets/images/parteners/3.png',
                'partner_name' => 'ENSMART',
                'description_ar' => 'شركة متخصصة في حلول الطاقة الذكية والأنظمة الداعمة للبنية التقنية، تقدم تقنيات موثوقة لإدارة الطاقة والحماية الكهربائية واستمرارية التشغيل، بما يعزز كفاءة شبكات الاتصالات واستقرارها في مختلف البيئات التشغيلية.',
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