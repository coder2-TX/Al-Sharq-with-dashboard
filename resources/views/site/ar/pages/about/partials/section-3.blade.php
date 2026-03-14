@php
    $aboutPageVisionMissionValuesSection = \App\Models\AboutPageVisionMissionValuesSection::query()->first();

    $visionAr = $aboutPageVisionMissionValuesSection?->vision_text_ar_display
        ?: 'أن نكون شركة رائدة في مجال استيراد وتسويق وتوزيع الأصناف ذات الجودة العالية وتقديم خدمات ذات مستوى عالٍ لعملائنا.';

    $missionAr = $aboutPageVisionMissionValuesSection?->mission_text_ar_display
        ?: 'توفير مجموعة متكاملة من المنتجات والخدمات عالية الجودة بتكاليف منافسة ومناسبة، من خلال التركيز على الجودة والتحسين المستمر والسعي لتلبية الطلبات المتزايدة والمتنوعة للعملاء وتقديم منتجات عالية الجودة وخدمات موثوقة من شركات عالمية مبتكرة لعملائنا بميزات تنافسية.';

    $valuesAr = $aboutPageVisionMissionValuesSection?->values_text_ar_display
        ?: 'ترتكز قيمنا على خدمة وإرضاء العملاء، والجودة والابتكار، والأخلاقيات والنزاهة، وتمكين وتطوير أداء العاملين بما يضمن تقديم منتجات وخدمات موثوقة ومتميزة.';
@endphp

<section class="lp-section lp-vmv" id="vmv" aria-label="الرؤية والرسالة والقيم">
  <div class="lp-vmv__inner">
    <div class="lp-vmv__top" role="list">
      <article class="lp-vmv__item lp-vmv__card lp-vmv__card--top" role="listitem" aria-label="رؤيتنا">
        <img class="lp-vmv__icon" src="{{ asset('assets/images/icon/vision.svg') }}" alt="أيقونة الرؤية" />
        <h2 class="lp-vmv__title">رؤيتنا</h2>
        <div class="lp-vmv__text lp-vmv__text--center">
          {!! $visionAr !!}
        </div>
      </article>

      <article class="lp-vmv__item lp-vmv__card lp-vmv__card--top" role="listitem" aria-label="رسالتنا">
        <img class="lp-vmv__icon" src="{{ asset('assets/images/icon/Message.svg') }}" alt="أيقونة الرسالة" />
        <h2 class="lp-vmv__title">رسالتنا</h2>
        <div class="lp-vmv__text lp-vmv__text--center">
          {!! $missionAr !!}
        </div>
      </article>
    </div>

    <section class="lp-vmv__values" aria-label="قيمنا">
      <div class="lp-vmv__valuesCard lp-vmv__card">
        <div class="lp-vmv__valuesHead">
          <img class="lp-vmv__icon lp-vmv__icon--values" src="{{ asset('assets/images/icon/Values.svg') }}" alt="أيقونة القيم" />
          <h2 class="lp-vmv__title lp-vmv__title--values">قيمنا</h2>
        </div>

        <div class="lp-vmv__valuesBody">
          <div class="lp-vmv__text lp-vmv__text--values">
            {!! $valuesAr !!}
          </div>
        </div>
      </div>
    </section>
  </div>
</section>