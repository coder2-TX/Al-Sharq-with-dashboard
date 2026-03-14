@php
    $aboutPageVisionMissionValuesSection = \App\Models\AboutPageVisionMissionValuesSection::query()->first();

    $visionEn = $aboutPageVisionMissionValuesSection?->vision_text_en_display
        ?: 'To be a leading company in the import, marketing, and distribution of high-quality products and in providing a high level of service to our customers.';

    $missionEn = $aboutPageVisionMissionValuesSection?->mission_text_en_display
        ?: 'To provide an integrated range of high-quality products and services at competitive and suitable costs by focusing on quality, continuous improvement, and striving to meet increasing and diverse customer demands, while delivering reliable services and premium products from innovative global companies with competitive advantages.';

    $valuesEn = $aboutPageVisionMissionValuesSection?->values_text_en_display
        ?: 'Our values are built on customer service and satisfaction, quality and innovation, ethics and integrity, and empowering and developing employee performance to ensure reliable and distinguished products and services.';
@endphp

<section class="lp-section lp-vmv" id="vmv" aria-label="Vision, mission, and values">
  <div class="lp-vmv__inner">
    <div class="lp-vmv__top" role="list">
      <article class="lp-vmv__item lp-vmv__card lp-vmv__card--top" role="listitem" aria-label="Our vision">
        <img class="lp-vmv__icon" src="{{ asset('assets/images/icon/vision.svg') }}" alt="Vision icon" />
        <h2 class="lp-vmv__title">Our Vision</h2>
        <div class="lp-vmv__text lp-vmv__text--center">
          {!! $visionEn !!}
        </div>
      </article>

      <article class="lp-vmv__item lp-vmv__card lp-vmv__card--top" role="listitem" aria-label="Our mission">
        <img class="lp-vmv__icon" src="{{ asset('assets/images/icon/Message.svg') }}" alt="Mission icon" />
        <h2 class="lp-vmv__title">Our Mission</h2>
        <div class="lp-vmv__text lp-vmv__text--center">
          {!! $missionEn !!}
        </div>
      </article>
    </div>

    <section class="lp-vmv__values" aria-label="Our values">
      <div class="lp-vmv__valuesCard lp-vmv__card">
        <div class="lp-vmv__valuesHead">
          <img class="lp-vmv__icon lp-vmv__icon--values" src="{{ asset('assets/images/icon/Values.svg') }}" alt="Values icon" />
          <h2 class="lp-vmv__title lp-vmv__title--values">Our Values</h2>
        </div>

        <div class="lp-vmv__valuesBody">
          <div class="lp-vmv__text lp-vmv__text--values">
            {!! $valuesEn !!}
          </div>
        </div>
      </div>
    </section>
  </div>
</section>