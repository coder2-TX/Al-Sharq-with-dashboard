@php
    $page = \App\Models\SectorsPagePaintsPage::query()->first();

    $articleEn = $page?->article_en ?: <<<'HTML'
<p>
Our Paints Sector offers a diverse portfolio of solutions for residential, commercial, and industrial projects. This includes interior and exterior paints, protective coatings, finishing materials, wall care products, and complementary solutions designed to deliver dependable visual and functional results.
</p>
<p>
We focus on product quality, color stability, ease of application, and project suitability. Through trusted partnerships and practical product selection, we help clients choose the right materials for decorative, protective, and specialized finishing requirements across different environments.
</p>
HTML;
@endphp

<section class="lp-section lp-medicalS2" id="paints-about-sector" aria-label="About the Paints Sector">
  <div class="lp-medicalS2__inner">
    <h2 class="lp-medicalS2__title">About the Sector</h2>
    <div class="lp-medicalS2__text">
      {!! $articleEn !!}
    </div>
  </div>
</section>