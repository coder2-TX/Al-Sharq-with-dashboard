@php
    $sectorsPageMedicalSectorSection = \App\Models\SectorsPageMedicalSectorSection::query()->first();

    $medicalPageHref = route('site.en.sectors.medical.page');
    $milkFoodHref = route('site.en.sectors.milk_food');
@endphp

<section class="lp-section lp-sectors lp-sectorsDetailCards" id="medical-sector-cards" aria-label="Medical sector details">
  <div class="lp-sectors__inner">

    <div class="lp-sectors__sliderWrap" aria-label="Medical sector cards">
      <div class="lp-sectors__slider">
        <div class="lp-sectors__track lp-sectors__track--three">

          <article class="lp-sectorCard" aria-label="Medicines Sector">
            <img
              src="{{ $sectorsPageMedicalSectorSection?->medicines_image ? \Illuminate\Support\Facades\Storage::url($sectorsPageMedicalSectorSection->medicines_image) : asset('assets/images/sectors/sector-details/medical/4.jpeg') }}"
              alt="Medicines Sector"
            >
            <a class="lp-iconBtn lp-sectorCard__btn" href="{{ $medicalPageHref }}" aria-label="Go to the Medicines Sector page">
              <span class="lp-iconBtn__stroke" aria-hidden="true"></span>
              <span class="lp-iconBtn__layer" aria-hidden="true">
                <i class="fa-solid fa-chevron-right" aria-hidden="true"></i>
              </span>
            </a>
            <div class="lp-sectorCard__name">Medicines Sector</div>
          </article>

          <article class="lp-sectorCard" aria-label="Medical Supplies Sector">
            <img
              src="{{ $sectorsPageMedicalSectorSection?->medical_supplies_image ? \Illuminate\Support\Facades\Storage::url($sectorsPageMedicalSectorSection->medical_supplies_image) : asset('assets/images/1.jpg') }}"
              alt="Medical Supplies Sector"
            >
            <a class="lp-iconBtn lp-sectorCard__btn" href="{{ $medicalPageHref }}" aria-label="Go to the Medical Supplies Sector page">
              <span class="lp-iconBtn__stroke" aria-hidden="true"></span>
              <span class="lp-iconBtn__layer" aria-hidden="true">
                <i class="fa-solid fa-chevron-right" aria-hidden="true"></i>
              </span>
            </a>
            <div class="lp-sectorCard__name">Medical Supplies Sector</div>
          </article>

          <article class="lp-sectorCard" aria-label="Infant Formula and Food Sector">
            <img
              src="{{ $sectorsPageMedicalSectorSection?->milk_food_image ? \Illuminate\Support\Facades\Storage::url($sectorsPageMedicalSectorSection->milk_food_image) : asset('assets/images/sectors/sector-details/medical/2.jpeg') }}"
              alt="Infant Formula and Food Sector"
            >
            <a class="lp-iconBtn lp-sectorCard__btn" href="{{ $milkFoodHref }}" aria-label="Go to the Infant Formula and Food Sector page">
              <span class="lp-iconBtn__stroke" aria-hidden="true"></span>
              <span class="lp-iconBtn__layer" aria-hidden="true">
                <i class="fa-solid fa-chevron-right" aria-hidden="true"></i>
              </span>
            </a>
            <div class="lp-sectorCard__name">Infant Formula &amp; Food Sector</div>
          </article>

        </div>
      </div>
    </div>

  </div>
</section>