@php
    $homePageAboutSection = \App\Models\HomePageAboutSection::query()->first();
    $isoCertificateContent = \App\Models\IsoCertificateContent::query()->first();

    $certificateShort = $isoCertificateContent?->certificate_short_display ?: 'ISO';
    $certificateName = $isoCertificateContent?->certificate_name_display ?: 'ISO-9001:2015';
    $descriptionAr = $isoCertificateContent?->description_ar_display
        ?: 'شركة الشرق حاصلة على شهادة <span class="lp-enDigits" dir="ltr" lang="en">ISO-9001:2015</span> تأكيدًا لالتزامها بنظام إدارة الجودة وفق المعايير الدولية.';
    $certificateIcon = $isoCertificateContent?->certificate_icon_url
        ?: asset('assets/images/iso-9001.png');
    $videoUrl = $homePageAboutSection?->youtube_url ?: 'https://www.youtube.com/watch?v=T90XuuZx9ws';
@endphp

<section class="lp-section lp-iso" aria-label="شهادة {{ strip_tags($certificateName) }}">
  <div class="lp-iso__inner">

    <div class="lp-isoCard" role="group" aria-label="{{ strip_tags($certificateName) }}">
      <span class="lp-isoCard__stroke" aria-hidden="true"></span>

      <div class="lp-isoCard__layer">
        <div class="lp-isoCard__row">

          <div class="lp-isoCard__main">
            <img
              class="lp-isoCard__icon"
              src="{{ $certificateIcon }}"
              alt="شعار شهادة {{ strip_tags($certificateName) }}"
            />
            <span class="lp-isoCard__iso lp-enDigits" dir="ltr" lang="en">{{ $certificateShort }}</span>
          </div>

          <p class="lp-isoCard__text">
            {!! $descriptionAr !!}
          </p>

          <a
            class="lp-isoCard__play"
            href="{{ $videoUrl }}"
            target="_blank"
            rel="noopener noreferrer"
            aria-label="تشغيل فيديو شهادة {{ strip_tags($certificateName) }}"
          >
            <span class="lp-isoCard__playStroke" aria-hidden="true"></span>
            <span class="lp-isoCard__playLayer" aria-hidden="true">
              <i class="fa-solid fa-play" aria-hidden="true"></i>
            </span>
          </a>

        </div>
      </div>
    </div>

  </div>
</section>