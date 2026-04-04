@php
    $page = \App\Models\SectorsPageCarsPage::query()->first();

    $articleEn = $page?->article_en ?: <<<'HTML'
<p>
Our Automotive Sector provides integrated solutions that support the needs of the local market as well as commercial and operational entities. We offer a wide range of products and services including vehicles, spare parts, lubricants, batteries, tires, accessories, and supporting services designed to improve reliability and performance.
</p>
<p>
We also work with trusted international partners to ensure a diverse portfolio that meets the expectations of individuals, businesses, and fleet-based operations. Our focus is on quality, continuity of supply, technical support, and practical value that helps clients maintain efficiency and long-term operational stability.
</p>
HTML;
@endphp

<section class="lp-section lp-medicalS2" id="cars-about-sector" aria-label="About the Automotive Sector">
  <div class="lp-medicalS2__inner">

    <h2 class="lp-medicalS2__title">About the Sector</h2>

    <div class="lp-medicalS2__text">
      {!! $articleEn !!}
    </div>

  </div>
</section>