@php
    $siteFooterSection = \App\Models\SiteFooterSection::query()->first();

    $homeUrl = route('site.ar.home');
    $aboutUrl = route('site.ar.about');
    $newsUrl = route('site.ar.news');
    $sectorsUrl = route('site.ar.sectors');
    $contactUrl = route('site.ar.contact');

    $links = [
        'home' => [
            'label' => 'الرئيسية',
            'url' => $homeUrl,
            'description' => $siteFooterSection?->home_description_ar_display ?: 'تعد شركة الشرق من أهم الشركات الرائدة في مجال الاستيراد والتسويق والتوزيع في الجمهورية اليمنية حيث تمثل شركة الشرق عددا كبيرا من الوكالات العالمية',
        ],
        'about' => [
            'label' => 'عن الشركة',
            'url' => $aboutUrl,
            'description' => $siteFooterSection?->about_description_ar_display ?: 'تعرف على شركة الشرق ومسيرتها ورؤيتها ورسالتها والقيم التي تنطلق منها في أعمالها المختلفة.',
        ],
        'news' => [
            'label' => 'الاخبار',
            'url' => $newsUrl,
            'description' => $siteFooterSection?->news_description_ar_display ?: 'تابع أحدث أخبار الشركة ومشاركاتها وفعالياتها والأنشطة التي تقدمها في مختلف القطاعات.',
        ],
        'sectors' => [
            'label' => 'القطاعات',
            'url' => $sectorsUrl,
            'description' => $siteFooterSection?->sectors_description_ar_display ?: 'استعرض القطاعات والخدمات التي تعمل فيها شركة الشرق وما تقدمه من حلول متنوعة للسوق.',
        ],
        'contact' => [
            'label' => 'اتصل بنا',
            'url' => $contactUrl,
            'description' => $siteFooterSection?->contact_description_ar_display ?: 'تواصل معنا عبر وسائل الاتصال المختلفة لمعرفة المزيد عن خدماتنا وفروعنا ومعلومات التواصل.',
        ],
    ];

    $currentKey = 'home';

    if (request()->routeIs('site.ar.about')) {
        $currentKey = 'about';
    } elseif (request()->routeIs('site.ar.news*')) {
        $currentKey = 'news';
    } elseif (request()->routeIs('site.ar.sectors')) {
        $currentKey = 'sectors';
    } elseif (request()->routeIs('site.ar.contact')) {
        $currentKey = 'contact';
    }

    $currentLink = $links[$currentKey];

    $whatsappHref = $siteFooterSection?->whatsapp_href ?: '#';
    $facebookUrl = $siteFooterSection?->facebook_url ?: '#';
    $instagramUrl = $siteFooterSection?->instagram_url ?: '#';
    $phoneHref = $siteFooterSection?->phone_href ?: '#';
    $phoneDisplay = $siteFooterSection?->phone_display ?: '+967 1 444454/55';
    $emailHref = $siteFooterSection?->email_href ?: 'mailto:info@ata-yemen.com';
    $emailDisplay = $siteFooterSection?->email_display ?: 'info@ata-yemen.com';
    $addressDisplay = $siteFooterSection?->address_ar_display ?: 'صنعاء , شارع الستين - خلف مبنى الأمم المتحدة';
@endphp

<footer class="lp-footer" id="contact" aria-label="Footer">
  <div class="lp-footer__graphics" aria-hidden="true">
    <svg
      class="lp-lines lp-lines--bottomEnd"
      viewBox="0 0 620 160"
      xmlns="http://www.w3.org/2000/svg"
    >
      <line
        class="lp-line lp-line--w10"
        x1="0"
        y1="100"
        x2="420"
        y2="100"
      ></line>
      <line class="lp-line lp-line--w4" x1="0" y1="72" x2="410" y2="72"></line>
      <line class="lp-line lp-line--w1" x1="0" y1="44" x2="340" y2="44"></line>
    </svg>
  </div>

  <div class="lp-footer__inner">
    <div class="lp-footer__grid">
      <div class="lp-footer__col lp-footer__col--brand">
        <a class="lp-footer__logo" href="{{ $homeUrl }}" aria-label="العودة للرئيسية">
          <img
            class="lp-footer__logoImg"
            src="{{ asset('assets/images/header/logo.png') }}"
            alt="شعار شركة الشرق"
          />
        </a>

        <div class="lp-footer__socialWrap">
          <div
            class="lp-footer__social lp-footer__social--compact"
            aria-label="روابط التواصل"
          >
            <a
              class="lp-socialIcon lp-socialIcon--sm"
              href="{{ $whatsappHref }}"
              aria-label="واتساب"
              target="_blank"
              rel="noopener noreferrer"
            >
              <span class="lp-socialIcon__stroke" aria-hidden="true"></span>
              <span class="lp-socialIcon__layer" aria-hidden="true">
                <i class="fa-brands fa-whatsapp" aria-hidden="true"></i>
              </span>
            </a>

            <a
              class="lp-socialIcon lp-socialIcon--sm"
              href="{{ $facebookUrl }}"
              aria-label="فيسبوك"
              target="_blank"
              rel="noopener noreferrer"
            >
              <span class="lp-socialIcon__stroke" aria-hidden="true"></span>
              <span class="lp-socialIcon__layer" aria-hidden="true">
                <i class="fa-brands fa-facebook-f" aria-hidden="true"></i>
              </span>
            </a>

            <a
              class="lp-socialIcon lp-socialIcon--sm"
              href="{{ $instagramUrl }}"
              aria-label="انستجرام"
              target="_blank"
              rel="noopener noreferrer"
            >
              <span class="lp-socialIcon__stroke" aria-hidden="true"></span>
              <span class="lp-socialIcon__layer" aria-hidden="true">
                <i class="fa-brands fa-instagram" aria-hidden="true"></i>
              </span>
            </a>
          </div>
        </div>
      </div>

      <div class="lp-footer__col lp-footer__col--nav">
        <nav class="lp-footer__linksRow" aria-label="روابط سريعة">
          <a class="lp-footer__link @if($currentKey === 'home') lp-footer__link--active @endif" href="{{ $links['home']['url'] }}">الرئيسية</a>
          <a class="lp-footer__link @if($currentKey === 'about') lp-footer__link--active @endif" href="{{ $links['about']['url'] }}">عن الشركة</a>
          <a class="lp-footer__link @if($currentKey === 'news') lp-footer__link--active @endif" href="{{ $links['news']['url'] }}">الاخبار</a>
          <a class="lp-footer__link @if($currentKey === 'sectors') lp-footer__link--active @endif" href="{{ $links['sectors']['url'] }}">القطاعات</a>
          <a class="lp-footer__link @if($currentKey === 'contact') lp-footer__link--active @endif" href="{{ $links['contact']['url'] }}">اتصل بنا</a>
        </nav>

        <div class="lp-footer__brandText">
          <div class="lp-footer__brandTitle">{{ $currentLink['label'] }}</div>
          <div class="lp-footer__brandDesc">
            {!! $currentLink['description'] !!}
          </div>
        </div>
      </div>

      <div class="lp-footer__col lp-footer__col--contact">
        <div class="lp-footer__contact">
          <div class="lp-footer__contactBlock">
            <div class="lp-footer__label">الهاتف</div>
            <a
              class="lp-footer__value lp-footer__value--ltr"
              href="{{ $phoneHref }}"
              dir="ltr"
              lang="en"
            >
              {!! $phoneDisplay !!}
            </a>
          </div>

          <div class="lp-footer__contactBlock">
            <div class="lp-footer__label">بريد الكتروني</div>
            <a class="lp-footer__value" href="{{ $emailHref }}">{!! $emailDisplay !!}</a>
          </div>

          <div class="lp-footer__contactBlock">
            <div class="lp-footer__label">العنوان</div>
            <div class="lp-footer__value">
              {!! $addressDisplay !!}
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="lp-footer__bottom">
      © <span class="lp-enDigits" dir="ltr" lang="en">{{ now()->year }}</span> جميع الحقوق محفوظة شركة الشرق للتجارة والتوكيلات .
    </div>
  </div>
</footer>