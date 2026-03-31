@php
    $partners = \App\Models\SectorsPageCommunicationsPartner::query()
        ->orderBy('sort_order')
        ->orderBy('id')
        ->get();

    if ($partners->isEmpty()) {
        $partners = collect([
            (object) [
                'id' => 0,
                'partner_image' => null,
                'partner_name' => 'ITA POWER',
                'description_ar' => "شركة إيطالية رائدة تأسست على يد فريق خبرة يفوق 20 عاماً في مجال الطاقة وتقنيات تكنولوجيا المعلومات مقرها في ميلانو، مع مركز دعم وتصنيع في دبي لتغطية منطقة أوروبا والشرق الأوسط وأفريقيا",
            ],
        ]);
    }
@endphp

<section
  class="lp-section lp-communicationsS3"
  id="communications-partners"
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
                  : asset('assets/images/parteners/6.png');

              $partnerDescription = \App\Support\Text\DisplayTextFormatter::fromPlainText((string) ($partner->description_ar ?? ''));

              $partnerUrl = route('site.ar.communications.partner-products', [
                  'partner_id' => $partner->id ?? null,
                  'name' => $partnerName,
              ]);
          @endphp

          <article class="lp-communicationsS3__slide {{ $loop->first ? 'is-active' : '' }}" data-slide aria-hidden="{{ $loop->first ? 'false' : 'true' }}">
            <div class="lp-communicationsS3__row">
              <a
                class="lp-communicationsS3__media lp-communicationsS3__mediaLink"
                href="{{ $partnerUrl }}"
                aria-label="فتح منتجات {{ $partnerName }}"
              >
                <img
                  src="{{ $partnerImage }}"
                  alt="{{ $partnerName }}"
                  loading="lazy"
                  decoding="async"
                />
              </a>

              <div class="lp-communicationsS3__content">
                <h3 class="lp-communicationsS3__partnerName">{{ $partnerName }}</h3>
                <div class="lp-communicationsS3__text">
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