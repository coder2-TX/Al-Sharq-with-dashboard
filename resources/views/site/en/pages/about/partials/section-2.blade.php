@php
    $homePageAboutSection = \App\Models\HomePageAboutSection::query()->first();
    $isoCertificateContent = \App\Models\IsoCertificateContent::query()->first();

    $certificateShort = $isoCertificateContent?->certificate_short_display ?: 'ISO';
    $certificateName = $isoCertificateContent?->certificate_name_display ?: 'ISO-9001:2015';
    $descriptionEn = $isoCertificateContent?->description_en_display
        ?: 'Al Sharq Company holds the <span class="lp-enDigits" dir="ltr" lang="en">ISO-9001:2015</span> certificate, confirming its commitment to a quality management system in accordance with international standards.';
    $certificateIcon = $isoCertificateContent?->certificate_icon_url
        ?: asset('assets/images/iso-9001.png');
    $videoUrl = $homePageAboutSection?->youtube_url ?: 'https://www.youtube.com/watch?v=T90XuuZx9ws';
@endphp

<section class="lp-section lp-iso" aria-label="{{ strip_tags($certificateName) }} Certificate">
  <div class="lp-iso__inner">
    <div class="lp-isoCard" role="group" aria-label="{{ strip_tags($certificateName) }}">
      <span class="lp-isoCard__stroke" aria-hidden="true"></span>

      <div class="lp-isoCard__layer">
        <div class="lp-isoCard__row">
          <div class="lp-isoCard__main">
            <img
              class="lp-isoCard__icon"
              src="{{ $certificateIcon }}"
              alt="{{ strip_tags($certificateName) }} icon"
            />
            <span class="lp-isoCard__iso lp-enDigits" dir="ltr" lang="en">{{ $certificateShort }}</span>
          </div>

          <p class="lp-isoCard__text">
            {!! $descriptionEn !!}
          </p>

          <a
            class="lp-isoCard__play"
            href="{{ $videoUrl }}"
            target="_blank"
            rel="noopener noreferrer"
            aria-label="Play {{ strip_tags($certificateName) }} video"
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