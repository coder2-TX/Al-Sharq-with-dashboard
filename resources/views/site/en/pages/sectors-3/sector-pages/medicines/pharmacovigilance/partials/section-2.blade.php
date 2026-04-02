@php
    $pharmacovigilancePage = \App\Models\SectorsPageMedicalPharmacovigilancePage::query()->first();

    $fallbackArticleEn = <<<'HTML'
<p class="lp-pharmaSection2__text">
  As a professional company and one of the companies that includes a PV department and the consumer in its organizational structure, we are committed to carrying out these activities for patient safety.
</p>

<p class="lp-pharmaSection2__text">
  To report any adverse effects, product complaints, or information related to our products, please contact us through the email addresses and phone numbers
  <span
    class="lp-pharmaSection2__textInline lp-pharmaSection2__textInline--ltr"
    dir="ltr"
    lang="en"
    style="unicode-bidi:isolate; font-family: Arial, Helvetica, sans-serif;"
  >
    pv@ata-yemen.com
  </span>
  <br>
  <span
    class="lp-pharmaSection2__textInline lp-pharmaSection2__textInline--ltr"
    dir="ltr"
    lang="en"
    style="unicode-bidi:isolate; font-family: Arial, Helvetica, sans-serif;"
  >
    00967 1 444455
  </span>
  <span
    class="lp-pharmaSection2__textInline lp-pharmaSection2__textInline--ltr"
    dir="ltr"
    lang="en"
    style="unicode-bidi:isolate; font-family: Arial, Helvetica, sans-serif;"
  >
    00967 1 444454
  </span>
</p>

<p class="lp-pharmaSection2__text">
  The pharmacovigilance system aims to ensure the safe use of medicines through continuous monitoring of their adverse effects and evaluation of the benefit-risk ratio of these products.
</p>
HTML;

    $articleEn = \App\Support\Text\DisplayTextFormatter::fromRichEditor($pharmacovigilancePage?->article_en);
    if ($articleEn === '') {
        $articleEn = $fallbackArticleEn;
    }

    $reportEmails = \App\Support\Text\DisplayTextFormatter::fromPlainText(
        $pharmacovigilancePage?->report_emails ?: "abeer.sami@ata-yemen.com\npv@ata-yemen.com\nranda.mahmoud@ata-yemen.com"
    );

    $reportPhones = \App\Support\Text\DisplayTextFormatter::fromPlainText(
        $pharmacovigilancePage?->report_phones ?: "00967 775805888\n00967 773593139"
    );
@endphp

<section
  class="lp-section lp-pharmaSection2"
  id="pharma-section-2"
  aria-label="Adverse drug reaction reporting information"
>
  <div class="lp-pharmaSection2__inner">
    <div class="lp-pharmaSection2__card">

      <div class="lp-pharmaSection2__layout">

        <aside
          class="lp-pharmaSection2__reportWays"
          aria-label="You can report any adverse effects through"
        >
          <div class="lp-pharmaSection2__reportWaysHead">
            You can report any adverse effects through
          </div>

          <div class="lp-pharmaSection2__reportWaysBody">

            <div class="lp-pharmaSection2__infoBlock" aria-label="Email">
              <div class="lp-pharmaSection2__iconCircle" aria-hidden="true">
                <i class="fa-solid fa-envelope"></i>
              </div>

              <div class="lp-pharmaSection2__infoLabel">Email</div>

              <div
                class="lp-pharmaSection2__infoText lp-pharmaSection2__infoText--ltr"
                dir="ltr"
                lang="en"
                style="unicode-bidi:isolate; font-family: Arial, Helvetica, sans-serif;"
              >
                {!! $reportEmails !!}
              </div>
            </div>

            <div class="lp-pharmaSection2__infoBlock" aria-label="Mobile Number">
              <div class="lp-pharmaSection2__iconCircle" aria-hidden="true">
                <i class="fa-solid fa-mobile-screen-button"></i>
              </div>

              <div class="lp-pharmaSection2__infoLabel">Mobile Number</div>

              <div
                class="lp-pharmaSection2__infoText lp-pharmaSection2__infoText--ltr"
                dir="ltr"
                lang="en"
                style="unicode-bidi:isolate; font-family: Arial, Helvetica, sans-serif;"
              >
                {!! $reportPhones !!}
              </div>
            </div>

          </div>
        </aside>

        <div class="lp-pharmaSection2__content">
          <div class="lp-pharmaSection2__textWrap">
            <h2 class="lp-pharmaSection2__title">Pharmacovigilance</h2>

            <div class="lp-pharmaSection2__article">
              {!! $articleEn !!}
            </div>
          </div>
        </div>

      </div>

    </div>
  </div>
</section>