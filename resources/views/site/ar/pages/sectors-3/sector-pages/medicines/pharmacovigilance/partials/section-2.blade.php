@php
    $pharmacovigilancePage = \App\Models\SectorsPageMedicalPharmacovigilancePage::query()->first();

    $fallbackArticleAr = <<<'HTML'
<p class="lp-pharmaSection2__text">
  كشركة محترفة وواحدة من الشركات التي تضم قسم PV والمستهلك في
  مخططاتها التنظيمية ، نلتزم بالقيام بهذه الأنشطة من أجل سلامة المرضى.
</p>

<p class="lp-pharmaSection2__text">
  للإبلاغ عن أي اعراض جانبية أو شكاوى من المنتجات أو معلومات تتعلق
  بمنتجاتنا ، يرجى الاتصال بنا على عناوين البريد الإلكتروني وارقام
  الهاتف
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
  يهدف نظام المراقبة الدوائية إلى ضمان الاستخدام الآمن للأدوية عبر
  مراقبة مستمرة لأعراضها الجانبية وتقييم نسبة الفائدة/ المخاطر لهذه
  المنتجات.
</p>
HTML;

    $articleAr = \App\Support\Text\DisplayTextFormatter::fromRichEditor($pharmacovigilancePage?->article_ar);
    if ($articleAr === '') {
        $articleAr = $fallbackArticleAr;
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
  aria-label="بيانات الإبلاغ عن الأعراض الجانبية للأدوية"
>
  <div class="lp-pharmaSection2__inner">
    <div class="lp-pharmaSection2__card">

      <div class="lp-pharmaSection2__layout">

        <aside
          class="lp-pharmaSection2__reportWays"
          aria-label="يمكنك الإبلاغ عن أي أعراض جانبية عن طريق"
        >
          <div class="lp-pharmaSection2__reportWaysHead">
            يمكنك الإبلاغ عن اي اعراض جانبية عن طريق
          </div>

          <div class="lp-pharmaSection2__reportWaysBody">

            <div class="lp-pharmaSection2__infoBlock" aria-label="بريد الكتروني">
              <div class="lp-pharmaSection2__iconCircle" aria-hidden="true">
                <i class="fa-solid fa-envelope"></i>
              </div>

              <div class="lp-pharmaSection2__infoLabel">بريد الكتروني</div>

              <div
                class="lp-pharmaSection2__infoText lp-pharmaSection2__infoText--ltr"
                dir="ltr"
                lang="en"
                style="unicode-bidi:isolate; font-family: Arial, Helvetica, sans-serif;"
              >
                {!! $reportEmails !!}
              </div>
            </div>

            <div class="lp-pharmaSection2__infoBlock" aria-label="موبايل رقم">
              <div class="lp-pharmaSection2__iconCircle" aria-hidden="true">
                <i class="fa-solid fa-mobile-screen-button"></i>
              </div>

              <div class="lp-pharmaSection2__infoLabel">موبايل رقم</div>

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
            <h2 class="lp-pharmaSection2__title">التيقض الدوائي</h2>

            <div class="lp-pharmaSection2__article">
              {!! $articleAr !!}
            </div>
          </div>
        </div>

      </div>

    </div>
  </div>
</section>