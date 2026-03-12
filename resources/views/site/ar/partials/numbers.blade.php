@php
    $homePageNumbersSection = \App\Models\HomePageNumbersSection::query()->first();

    $item1Name = $homePageNumbersSection?->item_1_name_ar ?: 'سنة خبرة في السوق';
    $item1Number = $homePageNumbersSection?->item_1_number ?? 15;

    $item2Name = $homePageNumbersSection?->item_2_name_ar ?: 'فرع ونقطة بيع';
    $item2Number = $homePageNumbersSection?->item_2_number ?? 20;

    $item3Name = $homePageNumbersSection?->item_3_name_ar ?: 'شريك تجاري';
    $item3Number = $homePageNumbersSection?->item_3_number ?? 29;

    $item4Name = $homePageNumbersSection?->item_4_name_ar ?: 'منتج';
    $item4Number = $homePageNumbersSection?->item_4_number ?? 20;

    $item5Name = $homePageNumbersSection?->item_5_name_ar ?: 'عميل';
    $item5Number = $homePageNumbersSection?->item_5_number ?? 50;

    $item6Name = $homePageNumbersSection?->item_6_name_ar ?: 'موظف متخصص';
    $item6Number = $homePageNumbersSection?->item_6_number ?? 110;
@endphp

<section class="lp-section lp-stats" id="stats" aria-label="لغة الارقام تتحدث عنا">
  <div class="lp-stats__inner">
    <h2 class="lp-stats__headline">
      <span class="lp-stats__headlineMain">لغة الارقام</span>
      <span class="lp-stats__headlineAccent">تتحدث عنا</span>
    </h2>

    <div class="lp-stats__grid">
      <div class="lp-stats__item">
        <div class="lp-stats__badge" aria-hidden="true">
          <span class="lp-stats__badgeStroke"></span>
          <div class="lp-stats__badgeLayer">
            <div class="lp-stats__value lp-enDigits" dir="ltr">
              <span class="lp-stats__plus">+</span>
              <span class="lp-stats__num" data-countup="{{ $item1Number }}">0</span>
            </div>
          </div>
        </div>
        <div class="lp-stats__label">{{ $item1Name }}</div>
      </div>

      <div class="lp-stats__item">
        <div class="lp-stats__badge" aria-hidden="true">
          <span class="lp-stats__badgeStroke"></span>
          <div class="lp-stats__badgeLayer">
            <div class="lp-stats__value lp-enDigits" dir="ltr">
              <span class="lp-stats__plus">+</span>
              <span class="lp-stats__num" data-countup="{{ $item2Number }}">0</span>
            </div>
          </div>
        </div>
        <div class="lp-stats__label">{{ $item2Name }}</div>
      </div>

      <div class="lp-stats__item">
        <div class="lp-stats__badge" aria-hidden="true">
          <span class="lp-stats__badgeStroke"></span>
          <div class="lp-stats__badgeLayer">
            <div class="lp-stats__value lp-enDigits" dir="ltr">
              <span class="lp-stats__plus">+</span>
              <span class="lp-stats__num" data-countup="{{ $item3Number }}">0</span>
            </div>
          </div>
        </div>
        <div class="lp-stats__label">{{ $item3Name }}</div>
      </div>

      <div class="lp-stats__item">
        <div class="lp-stats__badge" aria-hidden="true">
          <span class="lp-stats__badgeStroke"></span>
          <div class="lp-stats__badgeLayer">
            <div class="lp-stats__value lp-enDigits" dir="ltr">
              <span class="lp-stats__plus">+</span>
              <span class="lp-stats__num" data-countup="{{ $item4Number }}">0</span>
            </div>
          </div>
        </div>
        <div class="lp-stats__label">{{ $item4Name }}</div>
      </div>

      <div class="lp-stats__item">
        <div class="lp-stats__badge" aria-hidden="true">
          <span class="lp-stats__badgeStroke"></span>
          <div class="lp-stats__badgeLayer">
            <div class="lp-stats__value lp-enDigits" dir="ltr">
              <span class="lp-stats__plus">+</span>
              <span class="lp-stats__num" data-countup="{{ $item5Number }}">0</span>
            </div>
          </div>
        </div>
        <div class="lp-stats__label">{{ $item5Name }}</div>
      </div>

      <div class="lp-stats__item">
        <div class="lp-stats__badge" aria-hidden="true">
          <span class="lp-stats__badgeStroke"></span>
          <div class="lp-stats__badgeLayer">
            <div class="lp-stats__value lp-enDigits" dir="ltr">
              <span class="lp-stats__plus">+</span>
              <span class="lp-stats__num" data-countup="{{ $item6Number }}">0</span>
            </div>
          </div>
        </div>
        <div class="lp-stats__label">{{ $item6Name }}</div>
      </div>
    </div>
  </div>
</section>