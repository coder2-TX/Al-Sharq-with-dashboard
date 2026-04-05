@php
    $sectorsPageCommercialSectorSection = \App\Models\SectorsPageCommercialSectorSection::query()->first();
@endphp

<section class="lp-section lp-sectors lp-sectorsDetailCards" id="commercial-sector-cards" aria-label="تفاصيل القطاع التجاري">
  <div class="lp-sectors__inner">

    <div class="lp-sectors__sliderWrap" aria-label="بطاقات القطاع التجاري">
      <div class="lp-sectors__slider">
        <div class="lp-sectors__track lp-sectors__track--five">

          <article class="lp-sectorCard" aria-label="قطاع السيارات">
            <img
              src="{{ $sectorsPageCommercialSectorSection?->cars_image ? \Illuminate\Support\Facades\Storage::url($sectorsPageCommercialSectorSection->cars_image) : asset('assets/images/sectors/sector-details/commercial/7.jpeg') }}"
              alt="قطاع السيارات"
            >
            <a class="lp-iconBtn lp-sectorCard__btn" href="{{ route('site.ar.sectors.cars') }}" aria-label="الانتقال إلى صفحة قطاع السيارات">
              <span class="lp-iconBtn__stroke" aria-hidden="true"></span>
              <span class="lp-iconBtn__layer" aria-hidden="true">
                <i class="fa-solid fa-chevron-left" aria-hidden="true"></i>
              </span>
            </a>
            <div class="lp-sectorCard__name">قطاع السيارات</div>
          </article>

          <article class="lp-sectorCard" aria-label="قطاع الاتصالات">
            <img
              src="{{ $sectorsPageCommercialSectorSection?->communications_image ? \Illuminate\Support\Facades\Storage::url($sectorsPageCommercialSectorSection->communications_image) : asset('assets/images/sectors/sector-details/commercial/3.png') }}"
              alt="قطاع الاتصالات"
            >
            <a class="lp-iconBtn lp-sectorCard__btn" href="{{ route('site.ar.sectors.communications') }}" aria-label="الانتقال إلى صفحة قطاع الاتصالات">
              <span class="lp-iconBtn__stroke" aria-hidden="true"></span>
              <span class="lp-iconBtn__layer" aria-hidden="true">
                <i class="fa-solid fa-chevron-left" aria-hidden="true"></i>
              </span>
            </a>
            <div class="lp-sectorCard__name">قطاع الاتصالات</div>
          </article>

          <article class="lp-sectorCard" aria-label="قطاع الدعاية والإعلان">
            <img
              src="{{ $sectorsPageCommercialSectorSection?->advertising_image ? \Illuminate\Support\Facades\Storage::url($sectorsPageCommercialSectorSection->advertising_image) : asset('assets/images/sectors/sector-details/commercial/2.png') }}"
              alt="قطاع الدعاية والإعلان"
            >
            <a class="lp-iconBtn lp-sectorCard__btn" href="{{ route('site.ar.sectors.advertising') }}" aria-label="الانتقال إلى صفحة قطاع الدعاية">
              <span class="lp-iconBtn__stroke" aria-hidden="true"></span>
              <span class="lp-iconBtn__layer" aria-hidden="true">
                <i class="fa-solid fa-chevron-left" aria-hidden="true"></i>
              </span>
            </a>
            <div class="lp-sectorCard__name">قطاع الدعاية والإعلان</div>
          </article>

          <article class="lp-sectorCard" aria-label="قطاع الدهانات">
            <img
              src="{{ $sectorsPageCommercialSectorSection?->paints_image ? \Illuminate\Support\Facades\Storage::url($sectorsPageCommercialSectorSection->paints_image) : asset('assets/images/sectors/sector-details/commercial/1.png') }}"
              alt="قطاع الدهانات"
            >
            <a class="lp-iconBtn lp-sectorCard__btn" href="{{ route('site.ar.sectors.paints') }}" aria-label="الانتقال إلى صفحة قطاع الدهانات">
              <span class="lp-iconBtn__stroke" aria-hidden="true"></span>
              <span class="lp-iconBtn__layer" aria-hidden="true">
                <i class="fa-solid fa-chevron-left" aria-hidden="true"></i>
              </span>
            </a>
            <div class="lp-sectorCard__name">قطاع الدهانات</div>
          </article>

          <article class="lp-sectorCard" aria-label="قطاع التدريب المهني">
            <img
              src="{{ $sectorsPageCommercialSectorSection?->vocational_training_image ? \Illuminate\Support\Facades\Storage::url($sectorsPageCommercialSectorSection->vocational_training_image) : asset('assets/images/sectors/sector-details/commercial/8.jpeg') }}"
              alt="قطاع التدريب المهني"
            >
            <a class="lp-iconBtn lp-sectorCard__btn" href="{{ route('site.ar.sectors.vocational_training') }}" aria-label="الانتقال إلى صفحة قطاع التدريب المهني">
              <span class="lp-iconBtn__stroke" aria-hidden="true"></span>
              <span class="lp-iconBtn__layer" aria-hidden="true">
                <i class="fa-solid fa-chevron-left" aria-hidden="true"></i>
              </span>
            </a>
            <div class="lp-sectorCard__name">قطاع التدريب المهني</div>
          </article>

        </div>
      </div>
    </div>

  </div>
</section>