@php
    $contactPageAdditionalInfoSection = \App\Models\ContactPageAdditionalInfoSection::query()->first();

    $phones = $contactPageAdditionalInfoSection?->phones_display;
    $emails = $contactPageAdditionalInfoSection?->emails_display;
    $addressesEn = $contactPageAdditionalInfoSection?->addresses_en_display;

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

    if (empty($addressesEn)) {
        $addressesEn = [
            \App\Support\Text\DisplayTextFormatter::fromPlainText('60th Street. Near UNDP BLDG.'),
            \App\Support\Text\DisplayTextFormatter::fromPlainText('P.O.Box 15317 Sana’a'),
            \App\Support\Text\DisplayTextFormatter::fromPlainText('Republic of Yemen'),
        ];
    }
@endphp

<section class="lp-section lp-contactSection3" id="contact-section-3" aria-label="Additional contact information">
  <div class="lp-contactSection3__inner">
    <div class="lp-contactSection2__contactStrip" aria-label="Additional contact information">
      <div class="lp-contactSection2__stackItem" aria-label="Additional phones">
        <div class="lp-contactSection2__iconCircle" aria-hidden="true">
          <i class="fa-solid fa-phone"></i>
        </div>
        <div class="lp-contactSection2__stackText lp-contactSection2__stackText--ltr" dir="ltr" lang="en">
          @foreach($phones as $phone)
            <div>{!! $phone !!}</div>
          @endforeach
        </div>
      </div>

      <div class="lp-contactSection2__stackItem" aria-label="Additional email">
        <div class="lp-contactSection2__iconCircle" aria-hidden="true">
          <i class="fa-solid fa-envelope"></i>
        </div>
        <div class="lp-contactSection2__stackText lp-contactSection2__stackText--ltr" dir="ltr" lang="en">
          @foreach($emails as $email)
            <div>{!! $email !!}</div>
          @endforeach
        </div>
      </div>

      <div class="lp-contactSection2__stackItem" aria-label="Additional address">
        <div class="lp-contactSection2__iconCircle" aria-hidden="true">
          <i class="fa-solid fa-location-dot"></i>
        </div>
        <div class="lp-contactSection2__stackText lp-contactSection2__stackText--ltr" dir="ltr" lang="en">
          @foreach($addressesEn as $address)
            <div>{!! $address !!}</div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</section>