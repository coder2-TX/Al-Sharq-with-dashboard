@php
    $page = \App\Models\SectorsPageVocationalTrainingPage::query()->first();

    $articleEn = $page?->article_en ?: <<<'HTML'
<p>
Our Vocational Training Sector delivers practical development programs designed to strengthen skills and improve readiness for real work environments. We focus on structured learning paths that support students, graduates, employees, and institutions seeking measurable professional growth.
</p>
<p>
Our solutions include foundational and advanced training programs, short courses, workshops, and specialized learning tracks. We emphasize clarity of outcomes, relevance to real market needs, and effective content delivery that helps participants translate knowledge into practical capability.
</p>
HTML;
@endphp

<section class="lp-section lp-medicalS2" id="vocational-training-about-sector" aria-label="About the Vocational Training Sector">
  <div class="lp-medicalS2__inner">
    <h2 class="lp-medicalS2__title">About the Sector</h2>
    <div class="lp-medicalS2__text">
      {!! $articleEn !!}
    </div>
  </div>
</section>