@php
    $page = \App\Models\SectorsPageVocationalTrainingPage::query()->first();

    $articleAr = $page?->article_ar ?: <<<'HTML'
<p>
يقدم قطاع التدريب المهني لدينا برامج عملية تهدف إلى تطوير المهارات ورفع جاهزية الأفراد والمؤسسات في مجالات متعددة، من خلال محتوى تدريبي منظم وأساليب تطبيقية تركز على الاحتياج الفعلي لسوق العمل. نهتم بتقديم مسارات تدريبية مناسبة للطلاب والخريجين والموظفين والجهات التي ترغب في رفع كفاءة فرقها وتحسين الأداء المهني.
</p>
<p>
وتشمل حلولنا التدريبية برامج تأسيسية ومتقدمة وورش عمل متخصصة ودورات قصيرة وطويلة المدى، مع الاهتمام بجودة المحتوى وسهولة الاستفادة ووضوح المخرجات، بما يساعد على تحقيق أثر عملي ومستدام لدى المستفيدين.
</p>
HTML;
@endphp

<section class="lp-section lp-medicalS2" id="vocational-training-about-sector" aria-label="عن قطاع التدريب المهني">
  <div class="lp-medicalS2__inner">

    <h2 class="lp-medicalS2__title">عن القطاع</h2>

    <div class="lp-medicalS2__text">
      {!! $articleAr !!}
    </div>

  </div>
</section>