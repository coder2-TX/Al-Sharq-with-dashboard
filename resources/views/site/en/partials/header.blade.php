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

            $isMedicinesRoute =
                request()->routeIs('site.en.sectors.medicines') ||
                request()->routeIs('site.en.medicines.partner-products') ||
                request()->routeIs('site.en.sectors.medicines.pharmacovigilance') ||
                request()->routeIs('site.en.sectors.medical.pharmacovigilance');

            $isMedicalSuppliesRoute =
                request()->routeIs('site.en.sectors.medical_supplies') ||
                request()->routeIs('site.en.medical_supplies.partner-products');

            $isMilkFoodRoute =
                request()->routeIs('site.en.sectors.milk_food') ||
                request()->routeIs('site.en.milk-food.partner-products');

            $isCarsRoute =
                request()->routeIs('site.en.sectors.cars') ||
                request()->routeIs('site.en.cars.partner-products');

            $isCommunicationsRoute =
                request()->routeIs('site.en.sectors.communications') ||
                request()->routeIs('site.en.communications.partner-products');

            $isAdvertisingRoute =
                request()->routeIs('site.en.sectors.advertising') ||
                request()->routeIs('site.en.advertising.partner-products');

            $isPaintsRoute =
                request()->routeIs('site.en.sectors.paints') ||
                request()->routeIs('site.en.paints.partner-products');

            $isVocationalTrainingRoute =
                request()->routeIs('site.en.sectors.vocational_training') ||
                request()->routeIs('site.en.vocational_training.partner-products');

            $isMedicalGroupRoute =
                request()->routeIs('site.en.sectors.medical') ||
                request()->routeIs('site.en.sectors.medical.page') ||
                $isMedicinesRoute ||
                $isMedicalSuppliesRoute ||
                $isMilkFoodRoute;

            $isCommercialGroupRoute =
                request()->routeIs('site.en.sectors.commercial') ||
                request()->routeIs('site.en.sectors.commercial.page') ||
                $isCarsRoute ||
                $isCommunicationsRoute ||
                $isAdvertisingRoute ||
                $isPaintsRoute ||
                $isVocationalTrainingRoute;

            $isSectorRoute =
                request()->routeIs('site.en.sectors') ||
                request()->routeIs('site.en.sectors.*') ||
                request()->routeIs('site.en.medicines.*') ||
                request()->routeIs('site.en.medical_supplies.*') ||
                request()->routeIs('site.en.milk-food.*') ||
                request()->routeIs('site.en.advertising.*') ||
                request()->routeIs('site.en.communications.*') ||
                request()->routeIs('site.en.cars.*') ||
                request()->routeIs('site.en.paints.*') ||
                request()->routeIs('site.en.vocational_training.*');
        @endphp

        <div class="lp-drawer__top">
            <a class="lp-cta lp-drawer__langBtn"
               href="{{ \Illuminate\Support\Facades\Route::has($langRouteName) ? route($langRouteName, $langRouteParams) : route('site.ar.home') }}"
               aria-label="التبديل إلى العربية">
                <span class="lp-cta__stroke" aria-hidden="true"></span>
                <span class="lp-cta__layer" aria-hidden="true">
                    <span class="lp-cta__text">AR</span>
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
                    data-nav-href="{{ route('site.en.sectors') }}"
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
                            data-nav-href="{{ route('site.en.sectors.medical') }}"
                        >
                            <span>Medical Sector</span>

                            <span class="lp-drawer__subChevron" aria-hidden="true" data-toggle-only>
                                <i class="fa-solid fa-chevron-down" data-toggle-only></i>
                            </span>
                        </summary>

                        <div class="lp-drawer__subItems">
                            <a
                                class="lp-drawer__subLink {{ $isMedicinesRoute ? 'is-active' : '' }}"
                                href="{{ route('site.en.sectors.medicines') }}"
                                @if($isMedicinesRoute) aria-current="page" @endif
                            >
                                Medicines Sector
                            </a>

                            <a
                                class="lp-drawer__subLink {{ $isMedicalSuppliesRoute ? 'is-active' : '' }}"
                                href="{{ route('site.en.sectors.medical_supplies') }}"
                                @if($isMedicalSuppliesRoute) aria-current="page" @endif
                            >
                                Medical Supplies Sector
                            </a>

                            <a
                                class="lp-drawer__subLink {{ $isMilkFoodRoute ? 'is-active' : '' }}"
                                href="{{ route('site.en.sectors.milk_food') }}"
                                @if($isMilkFoodRoute) aria-current="page" @endif
                            >
                                Infant Formula &amp; Food Sector
                            </a>
                        </div>
                    </details>

                    <details class="lp-drawer__subGroup" @if($isCommercialGroupRoute) open @endif>
                        <summary
                            class="lp-drawer__subSectionTitle lp-drawer__subSectionTitle--toggle"
                            data-nav-href="{{ route('site.en.sectors.commercial') }}"
                        >
                            <span>Commercial Sector</span>

                            <span class="lp-drawer__subChevron" aria-hidden="true" data-toggle-only>
                                <i class="fa-solid fa-chevron-down" data-toggle-only></i>
                            </span>
                        </summary>

                        <div class="lp-drawer__subItems">
                            <a
                                class="lp-drawer__subLink {{ $isCarsRoute ? 'is-active' : '' }}"
                                href="{{ route('site.en.sectors.cars') }}"
                                @if($isCarsRoute) aria-current="page" @endif
                            >
                                Automotive Sector
                            </a>

                            <a
                                class="lp-drawer__subLink {{ $isCommunicationsRoute ? 'is-active' : '' }}"
                                href="{{ route('site.en.sectors.communications') }}"
                                @if($isCommunicationsRoute) aria-current="page" @endif
                            >
                                Telecommunications Sector
                            </a>

                            <a
                                class="lp-drawer__subLink {{ $isAdvertisingRoute ? 'is-active' : '' }}"
                                href="{{ route('site.en.sectors.advertising') }}"
                                @if($isAdvertisingRoute) aria-current="page" @endif
                            >
                                Advertising Sector
                            </a>

                            <a
                                class="lp-drawer__subLink {{ $isPaintsRoute ? 'is-active' : '' }}"
                                href="{{ route('site.en.sectors.paints') }}"
                                @if($isPaintsRoute) aria-current="page" @endif
                            >
                                Paints Sector
                            </a>

                            <a
                                class="lp-drawer__subLink {{ $isVocationalTrainingRoute ? 'is-active' : '' }}"
                                href="{{ route('site.en.sectors.vocational_training') }}"
                                @if($isVocationalTrainingRoute) aria-current="page" @endif
                            >
                                Vocational Training Sector
                            </a>
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