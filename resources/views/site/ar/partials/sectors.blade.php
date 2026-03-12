@php
    $homePageSectorsSection = \App\Models\HomePageSectorsSection::query()->first();

    $firstSectorName = $homePageSectorsSection?->first_sector_name_ar ?: 'القطاع الطبي';
    $secondSectorName = $homePageSectorsSection?->second_sector_name_ar ?: 'القطاع التجاري';

    $firstSectorImage = $homePageSectorsSection?->first_sector_image
        ? \Illuminate\Support\Facades\Storage::url($homePageSectorsSection->first_sector_image)
        : asset('assets/images/section/1.png');

    $secondSectorImage = $homePageSectorsSection?->second_sector_image
        ? \Illuminate\Support\Facades\Storage::url($homePageSectorsSection->second_sector_image)
        : asset('assets/images/section/2.jpeg');
@endphp

<section class="lp-section lp-sectors" id="sectors" aria-label="قطاعات شركة الشرق">
  <div class="lp-sectors__inner">

    <header class="lp-sectors__head">
      <h2 class="lp-sectors__title">
        قطاعات شركة <span class="lp-sectors__titleAccent">الشرق</span>
      </h2>
    </header>

    <div class="lp-sectors__sliderWrap" aria-label="قطاعات الشركة">
      <div class="lp-sectors__slider lp-focus" tabindex="0">
        <div class="lp-sectors__track">

          <article class="lp-sectorCard" aria-label="{{ $firstSectorName }}">
            <img src="{{ $firstSectorImage }}" alt="{{ $firstSectorName }}">
            <a class="lp-iconBtn lp-sectorCard__btn" href="#contact" aria-label="تفاصيل {{ $firstSectorName }}">
              <span class="lp-iconBtn__stroke" aria-hidden="true"></span>
              <span class="lp-iconBtn__layer" aria-hidden="true">
                <i class="fa-solid fa-chevron-left" aria-hidden="true"></i>
              </span>
            </a>
            <div class="lp-sectorCard__name">{{ $firstSectorName }}</div>
          </article>

          <article class="lp-sectorCard" aria-label="{{ $secondSectorName }}">
            <img src="{{ $secondSectorImage }}" alt="{{ $secondSectorName }}">
            <a class="lp-iconBtn lp-sectorCard__btn" href="#contact" aria-label="تفاصيل {{ $secondSectorName }}">
              <span class="lp-iconBtn__stroke" aria-hidden="true"></span>
              <span class="lp-iconBtn__layer" aria-hidden="true">
                <i class="fa-solid fa-chevron-left" aria-hidden="true"></i>
              </span>
            </a>
            <div class="lp-sectorCard__name">{{ $secondSectorName }}</div>
          </article>

        </div>
      </div>
    </div>

  </div>
</section>