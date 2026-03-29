@php
    $advertisingPage = \App\Models\SectorsPageAdvertisingPage::query()->first();

    $fallbackArticleEn = <<<'HTML'
<p>
The advertising and publicity sector at Al Sharq Trading &amp; Agencies Co. is considered a leading sector in the field of supplying, designing, and manufacturing premium and distinctive promotional materials. This sector focuses on highlighting the importance of promotional materials in the marketing process both internally and externally. It plays a major role in increasing customers’ sales and expanding the activity’s market share by meeting all of our clients’ promotional needs in the market with a high level of quality, outstanding designs, and successful creative ideas.
</p>
<ul>
  <li>Main Activities:</li>
  <li>Advertising and Promotional Materials</li>
  <li>Printing and Publishing</li>
  <li>Signboards and Illuminated Displays</li>
  <li>New Product Launch and Brand Promotion</li>
  <li>Advertising and Campaigns</li>
  <li>Multimedia Advertising</li>
</ul>
HTML;

    $articleEn = \App\Support\Text\DisplayTextFormatter::fromRichEditor($advertisingPage?->article_en);

    if ($articleEn === '') {
        $articleEn = $fallbackArticleEn;
    }
@endphp

<section class="lp-section lp-medicalS2" id="advertising-about-sector" aria-label="About the sector">
  <div class="lp-medicalS2__inner">

    <h2 class="lp-medicalS2__title">About the Sector</h2>

    <div class="lp-medicalS2__text">
      {!! $articleEn !!}
    </div>

  </div>
</section>