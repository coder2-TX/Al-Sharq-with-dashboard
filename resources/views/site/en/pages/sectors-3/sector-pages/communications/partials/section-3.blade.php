@php
    $partners = \App\Models\SectorsPageCommunicationsPartner::query()
        ->orderBy('sort_order')
        ->orderBy('id')
        ->get();

    if ($partners->isEmpty()) {
        $partners = collect([
            (object) [
                'id' => 1,
                'partner_image' => null,
                'default_image' => 'assets/images/parteners/6.png',
                'partner_name' => 'ITA POWER',
                'description_en' => 'A leading Italian company established by a team with more than 20 years of experience in the fields of energy and information technology. Headquartered in Milan, it also has a support and manufacturing center in Dubai to serve Europe, the Middle East, and Africa.',
            ],
            (object) [
                'id' => 2,
                'partner_image' => null,
                'default_image' => 'assets/images/parteners/16.png',
                'partner_name' => 'XONTEL',
                'description_en' => 'A leading Arab brand in smart communication technologies, established in 2004 in Kuwait by specialized engineers. It is a registered trademark in the European Union and holds certifications such as IEEE, FCC, CE, and SASO.',
            ],
            (object) [
                'id' => 3,
                'partner_image' => null,
                'default_image' => 'assets/images/parteners/4.png',
                'partner_name' => 'Ruijie & Reyee',
                'description_en' => 'One of the world’s leading companies in network infrastructure, founded in 2003 and serving more than 90 countries through advanced technologies and a global research and development team.',
            ],
            (object) [
                'id' => 4,
                'partner_image' => null,
                'default_image' => 'assets/images/parteners/8.png',
                'partner_name' => 'INSPUR',
                'description_en' => 'A global provider of advanced digital infrastructure solutions, delivering high-efficiency technologies in servers, data centers, and smart platforms that help organizations build reliable and scalable communication and operational systems.',
            ],
            (object) [
                'id' => 5,
                'partner_image' => null,
                'default_image' => 'assets/images/parteners/5.png',
                'partner_name' => 'HUAWEI',
                'description_en' => 'A leading technology partner in communication and smart networking solutions, offering an integrated ecosystem that includes network infrastructure, enterprise solutions, and modern connectivity systems, with a strong focus on reliability, performance, and technological sustainability.',
            ],
            (object) [
                'id' => 6,
                'partner_image' => null,
                'default_image' => 'assets/images/parteners/3.png',
                'partner_name' => 'ENSMART',
                'description_en' => 'A company specialized in smart energy solutions and systems that support technical infrastructure, providing reliable technologies for energy management, electrical protection, and operational continuity to enhance the efficiency and stability of communication networks across different operating environments.',
            ],
        ]);
    }
@endphp

<section
  class="lp-section lp-communicationsS3"
  id="communications-partners"
  aria-label="Our Partners"
  data-slider
  data-autoplay="5000"
>
  <div class="lp-communicationsS3__inner">
    <article class="lp-communicationsS3__card">
      <h2
        class="lp-communicationsS3__title lp-latinTextFix"
        dir="ltr"
        lang="en"
      >
        Our Partners
      </h2>

      <button
        class="lp-communicationsS3__nav lp-communicationsS3__nav--prev"
        type="button"
        aria-label="Previous partner"
        data-dir="prev"
      >
        <i class="fa-solid fa-chevron-left" aria-hidden="true"></i>
      </button>

      <button
        class="lp-communicationsS3__nav lp-communicationsS3__nav--next"
        type="button"
        aria-label="Next partner"
        data-dir="next"
      >
        <i class="fa-solid fa-chevron-right" aria-hidden="true"></i>
      </button>

      <div class="lp-communicationsS3__viewport" data-slider-viewport aria-live="polite">
        @foreach ($partners as $partner)
          @php
              $partnerName = trim((string) ($partner->partner_name ?? 'Our Partner'));

              $partnerImage = !empty($partner->partner_image)
                  ? \Illuminate\Support\Facades\Storage::url($partner->partner_image)
                  : (!empty($partner->default_image)
                      ? asset($partner->default_image)
                      : asset('assets/images/parteners/6.png'));

              $partnerDescription = \App\Support\Text\DisplayTextFormatter::fromPlainText(
                  (string) ($partner->description_en ?? '')
              );

              $partnerUrl = route('site.en.communications.partner-products', [
                  'partner_id' => $partner->id ?? null,
                  'name' => $partnerName,
              ]);
          @endphp

          <article class="lp-communicationsS3__slide {{ $loop->first ? 'is-active' : '' }}" data-slide aria-hidden="{{ $loop->first ? 'false' : 'true' }}">
            <div class="lp-communicationsS3__row">
              <div class="lp-communicationsS3__media">
                <img
                  src="{{ $partnerImage }}"
                  alt="{{ $partnerName }}"
                  loading="lazy"
                  decoding="async"
                />
              </div>

              <div class="lp-communicationsS3__content">
                <h3
                  class="lp-communicationsS3__partnerName lp-latinTextFix"
                  dir="ltr"
                  lang="en"
                >
                  {{ $partnerName }}
                </h3>

                <div
                  class="lp-communicationsS3__text lp-latinTextFix"
                  dir="ltr"
                  lang="en"
                >
                  {!! $partnerDescription !!}
                </div>

                <div class="lp-communicationsS3__actions">
                  <a
                    class="lp-cta lp-cta--partner"
                    href="{{ $partnerUrl }}"
                    aria-label="View {{ $partnerName }} products"
                  >
                    <span class="lp-cta__stroke" aria-hidden="true"></span>
                    <span class="lp-cta__layer" aria-hidden="true">
                      <span class="lp-cta__text">View Products</span>
                    </span>
                  </a>
                </div>
              </div>
            </div>
          </article>
        @endforeach
      </div>
    </article>
  </div>
</section>