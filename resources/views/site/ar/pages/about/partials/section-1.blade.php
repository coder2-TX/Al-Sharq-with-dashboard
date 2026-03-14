@php
    $aboutPageIntroSection = \App\Models\AboutPageIntroSection::query()->first();

    $subtitleAr = $aboutPageIntroSection?->subtitle_ar_display
        ?: 'تعتبر شركة الشرق للتجارة والتوكيلات';

    $articleAr = $aboutPageIntroSection?->article_ar_display
        ?: 'واحدة من أهم الشركات الرائدة في مجال الإستيراد والتسويق والتوزيع في اليمن. وتمثل عدد كبير من الشركات العالمية حيث شهدت الشركة نمواً وتوسعاً في الآونه الأخيرة وتنويع الأنشطة وفقاً لرؤية تهدف إلى الإرتقاء بالأداء العام للشركة وفق بناء مؤسسي يحقق الميزة التنافسية على أساس الإلتزام بدرجة أكبر بالمعايير العالمية والمبادئ والأخلاق المهنية من أجل زيادة رضى العملاء عن طريق تلبية توقعاتهم واحتياجاتهم ومتطلباتهم التنظيمية والمعيشية وترتكز أعمال الشركة على قطاعات أساسية هي الأدوية والأجهزة الطبية , حليب واغذية الأطفال , زيوت المعدات , الإتصالات , الدعاية والإعلان والخدمات اللوجستيه.';
@endphp

<section class="lp-section lp-aboutS1" id="about" aria-label="عن الشركة">
  <div class="lp-aboutS1__inner">

    <header class="lp-aboutS1__head">
      <h1 class="lp-sectors__title lp-aboutS1__title">
        كلمة عن شركة <span class="lp-sectors__titleAccent">الشرق</span>
      </h1>

      <div class="lp-aboutS1__subTitle">
        {!! $subtitleAr !!}
      </div>
    </header>

    <div class="lp-aboutS1__text">
      {!! $articleAr !!}
    </div>

  </div>
</section>