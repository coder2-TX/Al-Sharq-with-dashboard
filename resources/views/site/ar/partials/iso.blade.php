@php
    $isoCertificateContent = \App\Models\IsoCertificateContent::query()->first();

    $certificateShort = $isoCertificateContent?->certificate_short_display ?: 'ISO';
    $certificateName = $isoCertificateContent?->certificate_name_display ?: 'ISO-9001:2015';
    $descriptionAr = $isoCertificateContent?->description_ar_display
        ?: 'شركة الشرق حاصلة على شهادة <span class="lp-enDigits" dir="ltr" lang="en">ISO-9001:2015</span> تأكيدًا لالتزامها بنظام إدارة الجودة وفق المعايير الدولية.';
    $certificateIcon = $isoCertificateContent?->certificate_icon_url
        ?: asset('assets/images/iso-9001.png');
@endphp

<section class="lp-section lp-iso" aria-label="شهادة {{ $certificateName }}">
  <div class="lp-iso__inner">

    <div class="lp-isoCard" role="group" aria-label="{{ $certificateName }}">
      <span class="lp-isoCard__stroke" aria-hidden="true"></span>

      <div class="lp-isoCard__layer">
        <div class="lp-isoCard__row">

          <div class="lp-isoCard__main">
            <img class="lp-isoCard__icon"
                 src="{{ $certificateIcon }}"
                 alt="أيقونة {{ $certificateName }}" />
            <span class="lp-isoCard__iso lp-enDigits" dir="ltr" lang="en">{{ $certificateShort }}</span>
          </div>

          <p class="lp-isoCard__text">
            {!! $descriptionAr !!}
          </p>

          <a class="lp-cta lp-cta--iso" href="{{ route('site.ar.iso') }}" aria-label="تفاصيل شهادة {{ $certificateName }}">
            <span class="lp-cta__stroke" aria-hidden="true"></span>
            <span class="lp-cta__layer" aria-hidden="true">
              <span class="lp-cta__text">تفاصيل</span>
            </span>
          </a>

        </div>
      </div>
    </div>

  </div>
</section>