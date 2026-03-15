@php
    $contactPageAdditionalInfoSection = \App\Models\ContactPageAdditionalInfoSection::query()->first();

    $phones = $contactPageAdditionalInfoSection?->phones_display;
    $emails = $contactPageAdditionalInfoSection?->emails_display;
    $addressesAr = $contactPageAdditionalInfoSection?->addresses_ar_display;

    if (empty($phones)) {
        $phones = [
            \App\Support\Text\DisplayTextFormatter::fromPlainText('+967 1444 454', false),
            \App\Support\Text\DisplayTextFormatter::fromPlainText('+967 1444 455', false),
        ];
    }

    if (empty($emails)) {
        $emails = [
            \App\Support\Text\DisplayTextFormatter::fromPlainText('info@ata-yemen.com', false),
            \App\Support\Text\DisplayTextFormatter::fromPlainText('m.sabri@ata-yemen.com', false),
        ];
    }

    if (empty($addressesAr)) {
        $addressesAr = [
            \App\Support\Text\DisplayTextFormatter::fromPlainText("شارع الستين، جوار مبنى برنامج الأمم المتحدة الإنمائي"),
            \App\Support\Text\DisplayTextFormatter::fromPlainText("ص.ب 15317 صنعاء"),
            \App\Support\Text\DisplayTextFormatter::fromPlainText("الجمهورية اليمنية"),
        ];
    }
@endphp

<section class="lp-section lp-contactSection3" id="contact-section-3" aria-label="معلومات التواصل الإضافية">
  <div class="lp-contactSection3__inner">
    <div class="lp-contactSection2__contactStrip" aria-label="معلومات التواصل الإضافية">
      <div class="lp-contactSection2__stackItem" aria-label="هواتف إضافية">
        <div class="lp-contactSection2__iconCircle" aria-hidden="true">
          <i class="fa-solid fa-phone"></i>
        </div>
        <div class="lp-contactSection2__stackText lp-contactSection2__stackText--ltr" dir="ltr" lang="en">
          @foreach($phones as $phone)
            <div>{!! $phone !!}</div>
          @endforeach
        </div>
      </div>

      <div class="lp-contactSection2__stackItem" aria-label="بريد إلكتروني إضافي">
        <div class="lp-contactSection2__iconCircle" aria-hidden="true">
          <i class="fa-solid fa-envelope"></i>
        </div>
        <div class="lp-contactSection2__stackText lp-contactSection2__stackText--ltr" dir="ltr" lang="en">
          @foreach($emails as $email)
            <div>{!! $email !!}</div>
          @endforeach
        </div>
      </div>

      <div class="lp-contactSection2__stackItem" aria-label="عنوان إضافي">
        <div class="lp-contactSection2__iconCircle" aria-hidden="true">
          <i class="fa-solid fa-location-dot"></i>
        </div>
        <div class="lp-contactSection2__stackText">
          @foreach($addressesAr as $address)
            <div>{!! $address !!}</div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</section>