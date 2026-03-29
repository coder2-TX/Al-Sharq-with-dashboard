@php
    $sectorsPageMilkFoodPage = \App\Models\SectorsPageMilkFoodPage::query()->first();

    $fallbackArticleEn = <<<'HTML'
<p>
Al Sharq Trading &amp; Agencies Co. represents, as an agent, well-known brands in the field of infant nutrition, including the Régilait brand (France Lait). Régilait is considered a global leader in milk powder, and the company offers a complete range of premium additives and high-quality milk products. These products have been developed in a laboratory with <span class="lp-enDigits" dir="ltr" lang="en">50</span> years of expertise, working in collaboration with French pediatric units that are recognized as leaders in their specialties.
</p>
<p>
Laïta Dairy International, one of the companies within the Laïta (Vitale) Enterprises Group, was established in Brittany, France in <span class="lp-enDigits" dir="ltr" lang="en">1962</span>. The group owns <span class="lp-enDigits" dir="ltr" lang="en">8</span> factories, including the Laïta Dairy International plant specialized in infant formula production. An investment of <span class="lp-enDigits" dir="ltr" lang="en">94</span> million euros was made in the plant, and it has a production capacity of up to <span class="lp-enDigits" dir="ltr" lang="en">18,000</span> tons annually. The plant began production in <span class="lp-enDigits" dir="ltr" lang="en">2021</span>, and uses advanced MES (Manufacturing Execution System) technology, making it one of the most modern infant formula production facilities in the world.
</p>
HTML;

    $articleEn = \App\Support\Text\DisplayTextFormatter::fromRichEditor($sectorsPageMilkFoodPage?->article_en);

    if ($articleEn === '') {
        $articleEn = $fallbackArticleEn;
    }
@endphp

<section class="lp-section lp-medicalS2" id="milk-food-about-sector" aria-label="About the sector">
  <div class="lp-medicalS2__inner">

    <h2 class="lp-medicalS2__title">About the Sector</h2>

    <div class="lp-medicalS2__text">
      {!! $articleEn !!}
    </div>

  </div>
</section>