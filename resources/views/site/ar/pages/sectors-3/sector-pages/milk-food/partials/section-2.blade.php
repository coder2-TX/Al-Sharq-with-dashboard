@php
    $sectorsPageMilkFoodPage = \App\Models\SectorsPageMilkFoodPage::query()->first();

    $fallbackArticleAr = <<<'HTML'
<p>
تمثل شركة الشرق للتجارة والتوكيلات (بصفتها وكيلًا) العلامات التجارية المشهورة في مجال تغذية الرضع وهي علامة ريجيليه (فرانس ليه). وتعد ريجيليه الشركة الرائدة عالمياً في مسحوق الحليب وتقدم الشركة مجموعة كاملة من الإضافات ومنتجات الحليب عالي الجودة. وقد تم تطوير هذه المنتجات في مختبر يتمتع بخبرة <span class="lp-enDigits" dir="ltr" lang="en">50</span> عاماً ويعمل بالتعاون مع وحدات طب الأطفال الفرنسية الذين يتميزون بالريادة في تخصصاته.
</p>
<p>
سيل ديري انترناشيونال إحدى شركات مجموعة شركات سيل (فيتالي) إنتربرايسز، التي تأسست في مقاطعة بريتاني في فرنسا عام <span class="lp-enDigits" dir="ltr" lang="en">1962</span>. تمتلك المجموعة <span class="lp-enDigits" dir="ltr" lang="en">8</span> مصانع، ومن بينها مصنع سيل ديري انترناشيونال المتخصص في إنتاج الحليب الصناعي للأطفال. تم استثمار <span class="lp-enDigits" dir="ltr" lang="en">94</span> مليون يورو في المصنع، ويتميز بطاقة إنتاجية تصل إلى <span class="lp-enDigits" dir="ltr" lang="en">18,000</span> طن سنوياً. بدأ المصنع الإنتاج في عام <span class="lp-enDigits" dir="ltr" lang="en">2021</span>، ويستخدم تقنية "MES" (نظام تنفيذ التصنيع) العالية ليعد واحداً من أحدث مصانع إنتاج الحليب الصناعي للأطفال في العالم.
</p>
HTML;

    $articleAr = \App\Support\Text\DisplayTextFormatter::fromRichEditor($sectorsPageMilkFoodPage?->article_ar);

    if ($articleAr === '') {
        $articleAr = $fallbackArticleAr;
    }
@endphp

<section class="lp-section lp-medicalS2" id="milk-food-about-sector" aria-label="عن القطاع">
  <div class="lp-medicalS2__inner">

    <h2 class="lp-medicalS2__title">عن القطاع</h2>

    <div class="lp-medicalS2__text">
      {!! $articleAr !!}
    </div>

  </div>
</section>