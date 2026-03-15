<header class="lp-header" id="lpHeader">
    <a class="lp-headerBrand" id="lpHeaderBrand" href="{{ route('site.ar.home') }}" aria-label="العودة للرئيسية" hidden>
        <img id="lpHeaderBrandImg" src="{{ asset('assets/images/header/Brand_Mark.png') }}" alt="Brand Mark" decoding="async" />
    </a>

    <button class="lp-menuBtn" id="lpMenuBtn" type="button" aria-label="فتح القائمة" aria-controls="lpDrawer" aria-expanded="false">
        <span class="lp-menuBtn__stroke" aria-hidden="true"></span>
        <span class="lp-menuBtn__layer" aria-hidden="true">
            <i class="fa-solid fa-bars" aria-hidden="true"></i>
        </span>
    </button>
</header>

<div class="lp-drawer" id="lpDrawer" aria-hidden="true">
    <div class="lp-drawer__backdrop" data-lp-drawer-close aria-hidden="true"></div>

    <aside class="lp-drawer__panel" role="dialog" aria-modal="true" aria-label="القائمة" tabindex="-1">
        @php
            $currentRouteName = request()->route()?->getName();
            $langRouteName = $currentRouteName
                ? preg_replace('/^site\.ar\./', 'site.en.', $currentRouteName)
                : 'site.en.home';

            $langRouteParams = request()->route()?->parameters() ?? [];

            $isHomeRoute = request()->routeIs('site.ar.home');
            $isAboutRoute = request()->routeIs('site.ar.about');
            $isNewsRoute = request()->routeIs('site.ar.news');
            $isSectorRoute = request()->routeIs('site.ar.sectors*') || request()->routeIs('site.ar.sector*');
        @endphp

        <div class="lp-drawer__top">
            <a class="lp-cta lp-drawer__langBtn"
               href="{{ \Illuminate\Support\Facades\Route::has($langRouteName) ? route($langRouteName, $langRouteParams) : route('site.en.home') }}"
               aria-label="Switch to English">
                <span class="lp-cta__stroke" aria-hidden="true"></span>
                <span class="lp-cta__layer" aria-hidden="true">
                    <span class="lp-cta__text">English</span>
                </span>
            </a>
        </div>

        <nav class="lp-drawer__nav" aria-label="روابط الهيدر">
            <a class="lp-drawer__link {{ $isHomeRoute ? 'is-active' : '' }}"
               href="{{ route('site.ar.home') }}"
               @if($isHomeRoute) aria-current="page" @endif>
                الرئيسية
            </a>

            <a class="lp-drawer__link {{ $isAboutRoute ? 'is-active' : '' }}"
               href="{{ route('site.ar.about') }}"
               @if($isAboutRoute) aria-current="page" @endif>
                عن الشركة
            </a>

            <a class="lp-drawer__link {{ $isNewsRoute ? 'is-active' : '' }}"
               href="{{ route('site.ar.news') }}"
               @if($isNewsRoute) aria-current="page" @endif>
                الاخبار
            </a>

            <details class="lp-drawer__group">
                <summary class="lp-drawer__link lp-drawer__link--toggle {{ $isSectorRoute ? 'is-active' : '' }}">
                    <span>القطاعات</span>
                    <span class="lp-drawer__chevron" aria-hidden="true">
                        <i class="fa-solid fa-chevron-down"></i>
                    </span>
                </summary>

                <div class="lp-drawer__subNav" aria-label="أقسام القطاعات">
                    <details class="lp-drawer__subGroup">
                        <summary class="lp-drawer__subSectionTitle lp-drawer__subSectionTitle--toggle">
                            <span>القطاع الطبي</span>
                            <span class="lp-drawer__subChevron" aria-hidden="true">
                                <i class="fa-solid fa-chevron-down"></i>
                            </span>
                        </summary>

                        <div class="lp-drawer__subItems">
                            <button class="lp-drawer__subLink" type="button">قطاع حليب الأطفال والأغذية</button>
                        </div>
                    </details>

                    <details class="lp-drawer__subGroup">
                        <summary class="lp-drawer__subSectionTitle lp-drawer__subSectionTitle--toggle">
                            <span>القطاع التجاري</span>
                            <span class="lp-drawer__subChevron" aria-hidden="true">
                                <i class="fa-solid fa-chevron-down"></i>
                            </span>
                        </summary>

                        <div class="lp-drawer__subItems">
                            <button class="lp-drawer__subLink" type="button">قطاع زيوت المحركات</button>
                            <button class="lp-drawer__subLink" type="button">قطاع الدعاية والإعلان</button>
                            <button class="lp-drawer__subLink" type="button">قطاع الإتصالات</button>
                            <button class="lp-drawer__subLink" type="button">قطاع التدريب</button>
                        </div>
                    </details>
                </div>
            </details>
        </nav>

        <div class="lp-drawer__cta">
            <a class="lp-cta" href="{{ route('site.ar.contact') }}" aria-label="زر تواصل معنا">
                <span class="lp-cta__stroke" aria-hidden="true"></span>
                <span class="lp-cta__layer" aria-hidden="true">
                    <span class="lp-cta__text">تواصل معنا</span>
                </span>
            </a>
        </div>
    </aside>
</div>
