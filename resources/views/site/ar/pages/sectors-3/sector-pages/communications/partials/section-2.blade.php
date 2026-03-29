@php
    $communicationsPage = \App\Models\SectorsPageCommunicationsPage::query()->first();

    $fallbackArticleAr = <<<'HTML'
<p>
تعتبر شركتنا الرائدة في مجال توريد معدات الاتصالات وتقنية المعلومات، حيث نوفر حلولًا متكاملة لعملائنا من مختلف القطاعات والمجالات. تقدم شركتنا مجموعة واسعة من المنتجات والخدمات، بما في ذلك أنظمة الاتصالات، وشبكات الكمبيوتر، وحلول الأمن السيبراني، والخوادم، وخدمات الدعم التقني والصيانة. وتتميز منتجاتنا بالجودة العالية والأداء المتميز، كما نوفر خدمة عملاء ممتازة تساعد عملائنا على تحقيق أهدافهم بكفاءة وسلاسة. باختصار، فإن شركتنا تسعى جاهدة لتوفير أفضل الحلول في مجال توريد معدات الاتصالات وتقنية المعلومات، وتحقيق رضا العملاء ونجاحهم.
</p>
HTML;

    $articleAr = \App\Support\Text\DisplayTextFormatter::fromRichEditor($communicationsPage?->article_ar);

    if ($articleAr === '') {
        $articleAr = $fallbackArticleAr;
    }
@endphp

<section class="lp-section lp-medicalS2" id="communications-about-sector" aria-label="عن القطاع">
  <div class="lp-medicalS2__inner">

    <h2 class="lp-medicalS2__title">عن القطاع</h2>

    <div class="lp-medicalS2__text">
      {!! $articleAr !!}
    </div>

  </div>
</section>