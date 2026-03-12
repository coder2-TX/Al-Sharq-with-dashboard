@php
    $isoCertificateContent = \App\Models\IsoCertificateContent::query()->first();
    $certificateName = $isoCertificateContent?->certificate_name_display ?: 'ISO-9001:2015';
    $certificateImage = $isoCertificateContent?->certificate_image_url ?: asset('assets/images/about/ISO-9001.jpg');
@endphp

<section
  class="lp-section lp-isoShowcase"
  id="iso-certificate"
  aria-label="صورة شهادة {{ $certificateName }}"
>
  <div class="lp-isoShowcase__inner">
    <div class="lp-isoShowcase__card">
      <figure
        class="lp-isoShowcase__figure"
        role="group"
        aria-label="صورة شهادة {{ $certificateName }}"
      >
        <div class="lp-isoShowcase__media">
          <span class="lp-isoShowcase__stroke" aria-hidden="true"></span>

          <div class="lp-isoShowcase__layer">
            <img
              class="lp-isoShowcase__image"
              src="{{ $certificateImage }}"
              alt="شهادة {{ $certificateName }} الخاصة بشركة الشرق"
            />
          </div>
        </div>
      </figure>
    </div>
  </div>
</section>