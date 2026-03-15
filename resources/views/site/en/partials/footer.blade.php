@php
    $siteFooterSection = \App\Models\SiteFooterSection::query()->first();

    $homeUrl = route('site.en.home');
    $aboutUrl = route('site.en.about');
    $newsUrl = route('site.en.news');
    $sectorsUrl = \Illuminate\Support\Facades\Route::has('site.en.sectors')
        ? route('site.en.sectors')
        : route('site.en.home') . '#sectors';
    $contactUrl = route('site.en.contact');

    $links = [
        'home' => [
            'label' => 'Home',
            'url' => $homeUrl,
            'description' => $siteFooterSection?->home_description_en_display ?: 'Al Sharq is one of the leading companies in import, marketing, and distribution in the Republic of Yemen, representing a large number of international agencies.',
        ],
        'about' => [
            'label' => 'About',
            'url' => $aboutUrl,
            'description' => $siteFooterSection?->about_description_en_display ?: 'Learn more about Al Sharq, its journey, vision, mission, and the values that drive its business.',
        ],
        'news' => [
            'label' => 'News',
            'url' => $newsUrl,
            'description' => $siteFooterSection?->news_description_en_display ?: 'Follow the latest company news, events, activities, and participation across different sectors.',
        ],
        'sectors' => [
            'label' => 'Sectors',
            'url' => $sectorsUrl,
            'description' => $siteFooterSection?->sectors_description_en_display ?: 'Explore the sectors and services in which Al Sharq operates and the solutions it provides to the market.',
        ],
        'contact' => [
            'label' => 'Contact Us',
            'url' => $contactUrl,
            'description' => $siteFooterSection?->contact_description_en_display ?: 'Get in touch with us through our contact channels to learn more about our services, branches, and contact details.',
        ],
    ];

    $currentKey = 'home';

    if (request()->routeIs('site.en.about')) {
        $currentKey = 'about';
    } elseif (request()->routeIs('site.en.news*')) {
        $currentKey = 'news';
    } elseif (request()->routeIs('site.en.sectors')) {
        $currentKey = 'sectors';
    } elseif (request()->routeIs('site.en.contact')) {
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
    $addressDisplay = $siteFooterSection?->address_en_display ?: 'Sana’a, Al-Siteen Street - Behind the United Nations Building';
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
        <a class="lp-footer__logo" href="{{ $homeUrl }}" aria-label="Back to home">
          <img
            class="lp-footer__logoImg"
            src="{{ asset('assets/images/header/logo.png') }}"
            alt="Al Sharq logo"
          />
        </a>

        <div class="lp-footer__socialWrap">
          <div
            class="lp-footer__social lp-footer__social--compact"
            aria-label="Social links"
          >
            <a
              class="lp-socialIcon lp-socialIcon--sm"
              href="{{ $whatsappHref }}"
              aria-label="WhatsApp"
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
              aria-label="Facebook"
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
              aria-label="Instagram"
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
        <nav class="lp-footer__linksRow" aria-label="Quick links">
          <a class="lp-footer__link @if($currentKey === 'home') lp-footer__link--active @endif" href="{{ $links['home']['url'] }}">Home</a>
          <a class="lp-footer__link @if($currentKey === 'about') lp-footer__link--active @endif" href="{{ $links['about']['url'] }}">About</a>
          <a class="lp-footer__link @if($currentKey === 'news') lp-footer__link--active @endif" href="{{ $links['news']['url'] }}">News</a>
          <a class="lp-footer__link @if($currentKey === 'sectors') lp-footer__link--active @endif" href="{{ $links['sectors']['url'] }}">Sectors</a>
          <a class="lp-footer__link @if($currentKey === 'contact') lp-footer__link--active @endif" href="{{ $links['contact']['url'] }}">Contact Us</a>
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
            <div class="lp-footer__label">Phone</div>
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
            <div class="lp-footer__label">Email</div>
            <a class="lp-footer__value" href="{{ $emailHref }}">{!! $emailDisplay !!}</a>
          </div>

          <div class="lp-footer__contactBlock">
            <div class="lp-footer__label">Address</div>
            <div class="lp-footer__value">
              {!! $addressDisplay !!}
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="lp-footer__bottom">
      © <span class="lp-enDigits" dir="ltr" lang="en">{{ now()->year }}</span> All rights reserved. Al Sharq Trading & Agencies Company.
    </div>
  </div>
</footer>