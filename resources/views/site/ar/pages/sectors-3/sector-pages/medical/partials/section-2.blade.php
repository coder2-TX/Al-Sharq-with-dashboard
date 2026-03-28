@php
    $sectorsPageMedicalPage = \App\Models\SectorsPageMedicalPage::query()->first();

    $fallbackArticleAr = <<<'HTML'
<p>
تقوم شركة الشرق للتجارة والتوكيلات منذ تأسيسها في منتصف <span class="lp-enDigits" dir="ltr" lang="en">1991</span> بدورًا هامًا في المساهمة في تحسين صحة وحياة عملائها عن طريق توفير منتجات فعالة وعالية الجودة من شركات عالمية رائدة وموثوقة والوصول إلى أكبر عدد من العملاء والمستهلكين بامتداد الجمهورية اليمنية من خلال شبكة توزيع واسعة وفريق عمل محترف، كما تعمل على تنويع قطاعات الأعمال للوصول إلى إرضاء العملاء وتسهيل حياتهم اليومية باستمرار:
</p>
<ul>
    <li>الأدوية</li>
    <li>فيتامينات ومكملات غذائية</li>
    <li>المستلزمات الطبية</li>
</ul>
HTML;

    $articleAr = \App\Support\Text\DisplayTextFormatter::fromRichEditor($sectorsPageMedicalPage?->article_ar);

    if ($articleAr === '') {
        $articleAr = $fallbackArticleAr;
    }
@endphp

<section class="lp-section lp-medicalS2" id="medical-about-sector" aria-label="عن القطاع">
  <div class="lp-medicalS2__inner">

    <h2 class="lp-medicalS2__title">عن القطاع</h2>

    <div class="lp-medicalS2__text">
      {!! $articleAr !!}
    </div>

  </div>
</section>