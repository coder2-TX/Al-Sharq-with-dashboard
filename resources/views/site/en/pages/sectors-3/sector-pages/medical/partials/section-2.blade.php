@php
    $sectorsPageMedicalPage = \App\Models\SectorsPageMedicalPage::query()->first();

    $fallbackArticleEn = <<<'HTML'
<p>
Since its establishment in mid-<span class="lp-enDigits" dir="ltr" lang="en">1991</span>, Al Sharq Trading &amp; Agencies Co. has played an important role in contributing to the improvement of the health and lives of its customers by providing effective, high-quality products from leading and trusted international companies, and by reaching the largest possible number of customers and consumers across the Republic of Yemen through a wide distribution network and a professional team. The company also continues to diversify its business sectors to satisfy customers and make their daily lives easier:
</p>
<ul>
    <li>Medicines</li>
    <li>Vitamins &amp; Nutritional Supplements</li>
    <li>Medical Supplies</li>
</ul>
HTML;

    $articleEn = \App\Support\Text\DisplayTextFormatter::fromRichEditor($sectorsPageMedicalPage?->article_en);

    if ($articleEn === '') {
        $articleEn = $fallbackArticleEn;
    }
@endphp

<section class="lp-section lp-medicalS2" id="medical-about-sector" aria-label="About the sector">
  <div class="lp-medicalS2__inner">

    <h2 class="lp-medicalS2__title">About the Sector</h2>

    <div class="lp-medicalS2__text">
      {!! $articleEn !!}
    </div>

  </div>
</section>