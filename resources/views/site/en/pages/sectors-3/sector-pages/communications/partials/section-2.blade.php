@php
    $communicationsPage = \App\Models\SectorsPageCommunicationsPage::query()->first();

    $fallbackArticleEn = <<<'HTML'
<p>
Our company is considered a leader in the field of supplying telecommunications equipment and information technology, as we provide integrated solutions to our clients across various sectors and fields. Our company offers a wide range of products and services, including communication systems, computer networks, cybersecurity solutions, servers, technical support services, and maintenance. Our products are characterized by high quality and outstanding performance, and we also provide excellent customer service that helps our clients achieve their goals efficiently and smoothly. In short, our company strives to provide the best solutions in the field of telecommunications equipment and information technology supply, and to achieve customer satisfaction and success.
</p>
HTML;

    $articleEn = \App\Support\Text\DisplayTextFormatter::fromRichEditor($communicationsPage?->article_en);

    if ($articleEn === '') {
        $articleEn = $fallbackArticleEn;
    }
@endphp

<section class="lp-section lp-medicalS2" id="communications-about-sector" aria-label="About the sector">
  <div class="lp-medicalS2__inner">

    <h2 class="lp-medicalS2__title">About the Sector</h2>

    <div class="lp-medicalS2__text">
      {!! $articleEn !!}
    </div>

  </div>
</section>