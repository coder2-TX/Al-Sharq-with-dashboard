@php
    $sectorsPageMainSection = \App\Models\SectorsPageMainSection::query()->first();
@endphp

<section class="lp-section lp-sectors" id="sectors-3-section-2" aria-label="Al Sharq company sectors">
  <div class="lp-sectors__inner">

    <div class="lp-sectors__sliderWrap" aria-label="Company sectors">
      <div class="lp-sectors__slider lp-focus" tabindex="0">
        <div class="lp-sectors__track">

          <article class="lp-sectorCard" aria-label="Medical Sector">
            <img
              src="{{ $sectorsPageMainSection?->medical_sector_image ? \Illuminate\Support\Facades\Storage::url($sectorsPageMainSection->medical_sector_image) : asset('assets/images/section/1.png') }}"
              alt="Medical Sector"
            >
            <a
              class="lp-iconBtn lp-sectorCard__btn"
              href="{{ route('site.en.sectors.medical') }}"
              aria-label="Go to the Medical Sector page"
            >
              <span class="lp-iconBtn__stroke" aria-hidden="true"></span>
              <span class="lp-iconBtn__layer" aria-hidden="true">
                <i class="fa-solid fa-chevron-right" aria-hidden="true"></i>
              </span>
            </a>
            <div class="lp-sectorCard__name">Medical Sector</div>
          </article>

          <article class="lp-sectorCard" aria-label="Commercial Sector">
            <img
              src="{{ $sectorsPageMainSection?->commercial_sector_image ? \Illuminate\Support\Facades\Storage::url($sectorsPageMainSection->commercial_sector_image) : asset('assets/images/section/2.jpeg') }}"
              alt="Commercial Sector"
            >
            <a
              class="lp-iconBtn lp-sectorCard__btn"
              href="{{ route('site.en.sectors.commercial') }}"
              aria-label="Go to the Commercial Sector page"
            >
              <span class="lp-iconBtn__stroke" aria-hidden="true"></span>
              <span class="lp-iconBtn__layer" aria-hidden="true">
                <i class="fa-solid fa-chevron-right" aria-hidden="true"></i>
              </span>
            </a>
            <div class="lp-sectorCard__name">Commercial Sector</div>
          </article>

        </div>
      </div>
    </div>

  </div>
</section>