@php
    $aboutPageTodaySection = \App\Models\AboutPageTodaySection::query()->first();

    $subtitleEn = $aboutPageTodaySection?->subtitle_en_display
        ?: 'Today, Al Sharq Trading & Agencies enjoys strong respect and a distinguished position among the import, marketing, and distribution companies operating in this market, and we remain committed to continuing the expansion of our services and the continuous improvement of quality and performance.';

    $imageUrl = $aboutPageTodaySection?->image_url
        ?: asset('assets/images/pages/about/section4/1.jpeg');
@endphp

<section
  class="lp-section lp-aboutS6 lp-aboutS6--en"
  id="about-today"
  aria-label="Al Sharq today"
>
  <div class="lp-aboutS6__inner">
    <header class="lp-aboutS6__mobileHead" aria-label="Al Sharq today title">
      <h2 class="lp-sectors__title lp-aboutS6__title">
        Al Sharq
        <span class="lp-sectors__titleAccent lp-aboutS6__titleAccent">Trading</span>
        Today
      </h2>
    </header>

    <div class="lp-aboutS6__grid">
      <div class="lp-aboutS6__media" aria-label="Al Sharq today image">
        <div class="lp-aboutS6Media" role="group" aria-label="Al Sharq today image">
          <span class="lp-aboutS6Media__stroke" aria-hidden="true"></span>

          <div class="lp-aboutS6Media__layer">
            <img
              class="lp-aboutS6Media__img"
              src="{{ $imageUrl }}"
              alt="Al Sharq today"
            />
          </div>
        </div>
      </div>

      <div class="lp-aboutS6__content">
        <header class="lp-aboutS6__head lp-aboutS6__deskHead">
          <h2 class="lp-sectors__title lp-aboutS6__title">
            Al Sharq
            <span class="lp-sectors__titleAccent lp-aboutS6__titleAccent">Trading</span>
            Today
          </h2>
        </header>

        <div class="lp-aboutS6__text">
          {!! $subtitleEn !!}
        </div>
      </div>
    </div>
  </div>
</section>