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

            $isMedicinesRoute =
                request()->routeIs('site.ar.sectors.medicines') ||
                request()->routeIs('site.ar.medicines.partner-products') ||
                request()->routeIs('site.ar.sectors.medicines.pharmacovigilance') ||
                request()->routeIs('site.ar.sectors.medical.pharmacovigilance');

            $isMedicalSuppliesRoute =
                request()->routeIs('site.ar.sectors.medical_supplies') ||
                request()->routeIs('site.ar.medical_supplies.partner-products');

            $isMilkFoodRoute =
                request()->routeIs('site.ar.sectors.milk_food') ||
                request()->routeIs('site.ar.milk-food.partner-products');

            $isCarsRoute =
                request()->routeIs('site.ar.sectors.cars') ||
                request()->routeIs('site.ar.cars.partner-products');

            $isCommunicationsRoute =
                request()->routeIs('site.ar.sectors.communications') ||
                request()->routeIs('site.ar.communications.partner-products');

            $isAdvertisingRoute =
                request()->routeIs('site.ar.sectors.advertising') ||
                request()->routeIs('site.ar.advertising.partner-products');

            $isPaintsRoute =
                request()->routeIs('site.ar.sectors.paints') ||
                request()->routeIs('site.ar.paints.partner-products');

            $isVocationalTrainingRoute =
                request()->routeIs('site.ar.sectors.vocational_training') ||
                request()->routeIs('site.ar.vocational_training.partner-products');

            $isMedicalGroupRoute =
                request()->routeIs('site.ar.sectors.medical') ||
                request()->routeIs('site.ar.sectors.medical.page') ||
                $isMedicinesRoute ||
                $isMedicalSuppliesRoute ||
                $isMilkFoodRoute;

            $isCommercialGroupRoute =
                request()->routeIs('site.ar.sectors.commercial') ||
                request()->routeIs('site.ar.sectors.commercial.page') ||
                $isCarsRoute ||
                $isCommunicationsRoute ||
                $isAdvertisingRoute ||
                $isPaintsRoute ||
                $isVocationalTrainingRoute;

            $isSectorRoute =
                request()->routeIs('site.ar.sectors') ||
                request()->routeIs('site.ar.sectors.*') ||
                request()->routeIs('site.ar.medicines.*') ||
                request()->routeIs('site.ar.medical_supplies.*') ||
                request()->routeIs('site.ar.milk-food.*') ||
                request()->routeIs('site.ar.advertising.*') ||
                request()->routeIs('site.ar.communications.*') ||
                request()->routeIs('site.ar.cars.*') ||
                request()->routeIs('site.ar.paints.*') ||
                request()->routeIs('site.ar.vocational_training.*');
        @endphp

        <div class="lp-drawer__top">
            <a class="lp-cta lp-drawer__langBtn"
               href="{{ \Illuminate\Support\Facades\Route::has($langRouteName) ? route($langRouteName, $langRouteParams) : route('site.en.home') }}"
               aria-label="Switch to English">
                <span class="lp-cta__stroke" aria-hidden="true"></span>
                <span class="lp-cta__layer" aria-hidden="true">
                    <span class="lp-cta__text">EN</span>
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
                الأخبار
            </a>

            <details class="lp-drawer__group" @if($isSectorRoute) open @endif>
                <summary
                    class="lp-drawer__link lp-drawer__link--toggle {{ $isSectorRoute ? 'is-active' : '' }}"
                    data-nav-href="{{ route('site.ar.sectors') }}"
                >
                    <span>القطاعات</span>

                    <span class="lp-drawer__chevron" aria-hidden="true" data-toggle-only>
                        <i class="fa-solid fa-chevron-down" aria-hidden="true" data-toggle-only></i>
                    </span>
                </summary>

                <div class="lp-drawer__subNav" aria-label="أقسام القطاعات">
                    <details class="lp-drawer__subGroup" @if($isMedicalGroupRoute) open @endif>
                        <summary
                            class="lp-drawer__subSectionTitle lp-drawer__subSectionTitle--toggle"
                            data-nav-href="{{ route('site.ar.sectors.medical') }}"
                        >
                            <span>القطاع الطبي</span>

                            <span class="lp-drawer__subChevron" aria-hidden="true" data-toggle-only>
                                <i class="fa-solid fa-chevron-down" data-toggle-only></i>
                            </span>
                        </summary>

                        <div class="lp-drawer__subItems">
                            <a
                                class="lp-drawer__subLink {{ $isMedicinesRoute ? 'is-active' : '' }}"
                                href="{{ route('site.ar.sectors.medicines') }}"
                                @if($isMedicinesRoute) aria-current="page" @endif
                            >
                                قطاع الأدوية
                            </a>

                            <a
                                class="lp-drawer__subLink {{ $isMedicalSuppliesRoute ? 'is-active' : '' }}"
                                href="{{ route('site.ar.sectors.medical_supplies') }}"
                                @if($isMedicalSuppliesRoute) aria-current="page" @endif
                            >
                                قطاع المستلزمات الطبية
                            </a>

                            <a
                                class="lp-drawer__subLink {{ $isMilkFoodRoute ? 'is-active' : '' }}"
                                href="{{ route('site.ar.sectors.milk_food') }}"
                                @if($isMilkFoodRoute) aria-current="page" @endif
                            >
                                قطاع الحليب وغذاء الأطفال
                            </a>
                        </div>
                    </details>

                    <details class="lp-drawer__subGroup" @if($isCommercialGroupRoute) open @endif>
                        <summary
                            class="lp-drawer__subSectionTitle lp-drawer__subSectionTitle--toggle"
                            data-nav-href="{{ route('site.ar.sectors.commercial') }}"
                        >
                            <span>القطاع التجاري</span>

                            <span class="lp-drawer__subChevron" aria-hidden="true" data-toggle-only>
                                <i class="fa-solid fa-chevron-down" data-toggle-only></i>
                            </span>
                        </summary>

                        <div class="lp-drawer__subItems">
                            <a
                                class="lp-drawer__subLink {{ $isCarsRoute ? 'is-active' : '' }}"
                                href="{{ route('site.ar.sectors.cars') }}"
                                @if($isCarsRoute) aria-current="page" @endif
                            >
                                قطاع السيارات
                            </a>

                            <a
                                class="lp-drawer__subLink {{ $isCommunicationsRoute ? 'is-active' : '' }}"
                                href="{{ route('site.ar.sectors.communications') }}"
                                @if($isCommunicationsRoute) aria-current="page" @endif
                            >
                                قطاع الاتصالات
                            </a>

                            <a
                                class="lp-drawer__subLink {{ $isAdvertisingRoute ? 'is-active' : '' }}"
                                href="{{ route('site.ar.sectors.advertising') }}"
                                @if($isAdvertisingRoute) aria-current="page" @endif
                            >
                                قطاع الدعاية والإعلان
                            </a>

                            <a
                                class="lp-drawer__subLink {{ $isPaintsRoute ? 'is-active' : '' }}"
                                href="{{ route('site.ar.sectors.paints') }}"
                                @if($isPaintsRoute) aria-current="page" @endif
                            >
                                قطاع الدهانات
                            </a>

                            <a
                                class="lp-drawer__subLink {{ $isVocationalTrainingRoute ? 'is-active' : '' }}"
                                href="{{ route('site.ar.sectors.vocational_training') }}"
                                @if($isVocationalTrainingRoute) aria-current="page" @endif
                            >
                                قطاع التدريب المهني
                            </a>
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