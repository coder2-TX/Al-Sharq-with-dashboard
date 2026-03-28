<header class="lp-header" id="lpHeader">
    <a class="lp-headerBrand" id="lpHeaderBrand" href="{{ route('site.en.home') }}" aria-label="Back to home" hidden>
        <img id="lpHeaderBrandImg" src="{{ asset('assets/images/header/Brand_Mark.png') }}" alt="Brand Mark" decoding="async" />
    </a>

    <button class="lp-menuBtn" id="lpMenuBtn" type="button" aria-label="Open menu" aria-controls="lpDrawer" aria-expanded="false">
        <span class="lp-menuBtn__stroke" aria-hidden="true"></span>
        <span class="lp-menuBtn__layer" aria-hidden="true">
            <i class="fa-solid fa-bars" aria-hidden="true"></i>
        </span>
    </button>
</header>

<div class="lp-drawer" id="lpDrawer" aria-hidden="true">
    <div class="lp-drawer__backdrop" data-lp-drawer-close aria-hidden="true"></div>

    <aside class="lp-drawer__panel" role="dialog" aria-modal="true" aria-label="Menu" tabindex="-1">
        @php
            $currentRouteName = request()->route()?->getName();
            $langRouteName = $currentRouteName
                ? preg_replace('/^site\.en\./', 'site.ar.', $currentRouteName)
                : 'site.ar.home';

            $langRouteParams = request()->route()?->parameters() ?? [];

            $isHomeRoute = request()->routeIs('site.en.home');
            $isAboutRoute = request()->routeIs('site.en.about');
            $isNewsRoute = request()->routeIs('site.en.news');
            $isSectorRoute = request()->routeIs('site.en.sectors*') || request()->routeIs('site.en.sector*');

            $isMedicalGroupRoute =
                request()->routeIs('site.en.sectors.medical') ||
                request()->routeIs('site.en.sectors.medical.page') ||
                request()->routeIs('site.en.sectors.milk_food') ||
                request()->routeIs('site.en.sectors.medical.pharmacovigilance');

            $isCommercialGroupRoute =
                request()->routeIs('site.en.sectors.commercial') ||
                request()->routeIs('site.en.sectors.advertising') ||
                request()->routeIs('site.en.sectors.communications');

            $hasEnSectorsRoute = \Illuminate\Support\Facades\Route::has('site.en.sectors');
            $hasEnMedicalSectorRoute = \Illuminate\Support\Facades\Route::has('site.en.sectors.medical');
            $hasEnCommercialSectorRoute = \Illuminate\Support\Facades\Route::has('site.en.sectors.commercial');
            $hasEnMilkFoodRoute = \Illuminate\Support\Facades\Route::has('site.en.sectors.milk_food');
            $hasEnAdvertisingRoute = \Illuminate\Support\Facades\Route::has('site.en.sectors.advertising');
            $hasEnCommunicationsRoute = \Illuminate\Support\Facades\Route::has('site.en.sectors.communications');
        @endphp

        <div class="lp-drawer__top">
            <a class="lp-cta lp-drawer__langBtn"
               href="{{ \Illuminate\Support\Facades\Route::has($langRouteName) ? route($langRouteName, $langRouteParams) : route('site.ar.home') }}"
               aria-label="التبديل إلى العربية">
                <span class="lp-cta__stroke" aria-hidden="true"></span>
                <span class="lp-cta__layer" aria-hidden="true">
                    <span class="lp-cta__text">العربية</span>
                </span>
            </a>
        </div>

        <nav class="lp-drawer__nav" aria-label="Header links">
            <a class="lp-drawer__link {{ $isHomeRoute ? 'is-active' : '' }}"
               href="{{ route('site.en.home') }}"
               @if($isHomeRoute) aria-current="page" @endif>
                Home
            </a>

            <a class="lp-drawer__link {{ $isAboutRoute ? 'is-active' : '' }}"
               href="{{ route('site.en.about') }}"
               @if($isAboutRoute) aria-current="page" @endif>
                About
            </a>

            <a class="lp-drawer__link {{ $isNewsRoute ? 'is-active' : '' }}"
               href="{{ route('site.en.news') }}"
               @if($isNewsRoute) aria-current="page" @endif>
                News
            </a>

            <details class="lp-drawer__group" @if($isSectorRoute) open @endif>
                <summary
                    class="lp-drawer__link lp-drawer__link--toggle {{ $isSectorRoute ? 'is-active' : '' }}"
                    @if($hasEnSectorsRoute) data-nav-href="{{ route('site.en.sectors') }}" @endif
                >
                    <span>Sectors</span>

                    <span class="lp-drawer__chevron" aria-hidden="true" data-toggle-only>
                        <i class="fa-solid fa-chevron-down" aria-hidden="true" data-toggle-only></i>
                    </span>
                </summary>

                <div class="lp-drawer__subNav" aria-label="Sector categories">
                    <details class="lp-drawer__subGroup" @if($isMedicalGroupRoute) open @endif>
                        <summary
                            class="lp-drawer__subSectionTitle lp-drawer__subSectionTitle--toggle"
                            @if($hasEnMedicalSectorRoute) data-nav-href="{{ route('site.en.sectors.medical') }}" @endif
                        >
                            <span>Medical Sector</span>

                            <span class="lp-drawer__subChevron" aria-hidden="true" data-toggle-only>
                                <i class="fa-solid fa-chevron-down" data-toggle-only></i>
                            </span>
                        </summary>

                        <div class="lp-drawer__subItems">
                            @if($hasEnMilkFoodRoute)
                                <a
                                    class="lp-drawer__subLink {{ request()->routeIs('site.en.sectors.milk_food') ? 'is-active' : '' }}"
                                    href="{{ route('site.en.sectors.milk_food') }}"
                                    @if(request()->routeIs('site.en.sectors.milk_food')) aria-current="page" @endif
                                >
                                    Infant Formula &amp; Food Sector
                                </a>
                            @else
                                <button class="lp-drawer__subLink" type="button">Infant Formula &amp; Food Sector</button>
                            @endif
                        </div>
                    </details>

                    <details class="lp-drawer__subGroup" @if($isCommercialGroupRoute) open @endif>
                        <summary
                            class="lp-drawer__subSectionTitle lp-drawer__subSectionTitle--toggle"
                            @if($hasEnCommercialSectorRoute) data-nav-href="{{ route('site.en.sectors.commercial') }}" @endif
                        >
                            <span>Commercial Sector</span>

                            <span class="lp-drawer__subChevron" aria-hidden="true" data-toggle-only>
                                <i class="fa-solid fa-chevron-down" data-toggle-only></i>
                            </span>
                        </summary>

                        <div class="lp-drawer__subItems">
                            <button class="lp-drawer__subLink" type="button">Motor Oils Sector</button>

                            @if($hasEnAdvertisingRoute)
                                <a
                                    class="lp-drawer__subLink {{ request()->routeIs('site.en.sectors.advertising') ? 'is-active' : '' }}"
                                    href="{{ route('site.en.sectors.advertising') }}"
                                    @if(request()->routeIs('site.en.sectors.advertising')) aria-current="page" @endif
                                >
                                    Advertising Sector
                                </a>
                            @else
                                <button class="lp-drawer__subLink" type="button">Advertising Sector</button>
                            @endif

                            @if($hasEnCommunicationsRoute)
                                <a
                                    class="lp-drawer__subLink {{ request()->routeIs('site.en.sectors.communications') ? 'is-active' : '' }}"
                                    href="{{ route('site.en.sectors.communications') }}"
                                    @if(request()->routeIs('site.en.sectors.communications')) aria-current="page" @endif
                                >
                                    Telecommunications Sector
                                </a>
                            @else
                                <button class="lp-drawer__subLink" type="button">Telecommunications Sector</button>
                            @endif

                            <button class="lp-drawer__subLink" type="button">Training Sector</button>
                        </div>
                    </details>
                </div>
            </details>
        </nav>

        <div class="lp-drawer__cta">
            <a class="lp-cta" href="{{ route('site.en.contact') }}" aria-label="Contact us button">
                <span class="lp-cta__stroke" aria-hidden="true"></span>
                <span class="lp-cta__layer" aria-hidden="true">
                    <span class="lp-cta__text">Contact Us</span>
                </span>
            </a>
        </div>
    </aside>
</div>

<script>
(function () {
    if (window.__lpDrawerSummaryNavBound) return;
    window.__lpDrawerSummaryNavBound = true;

    document.addEventListener('click', function (e) {
        const summary = e.target.closest('summary[data-nav-href]');
        if (!summary) return;

        if (e.target.closest('[data-toggle-only]')) {
            return;
        }

        e.preventDefault();
        e.stopPropagation();

        const href = summary.getAttribute('data-nav-href');
        if (href) {
            window.location.href = href;
        }
    });
})();
</script>