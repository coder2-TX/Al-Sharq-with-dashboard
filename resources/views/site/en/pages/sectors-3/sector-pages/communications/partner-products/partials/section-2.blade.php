@php
    $perPage = 6;

    $partnerId = (int) request()->query('partner_id', isset($partner) ? $partner->id : 0);
    $partnerNameFromQuery = trim((string) request()->query('name', ''));

    $resolvedPartner = $partner ?? null;

    if (!$resolvedPartner && $partnerId > 0) {
        $resolvedPartner = \App\Models\SectorsPageCommunicationsPartner::query()->find($partnerId);
    }

    if (!$resolvedPartner && $partnerNameFromQuery !== '') {
        $resolvedPartner = \App\Models\SectorsPageCommunicationsPartner::query()
            ->where('partner_name', $partnerNameFromQuery)
            ->first();
    }

    $partnerName = trim((string) ($resolvedPartner?->partner_name ?: ($partnerNameFromQuery !== '' ? $partnerNameFromQuery : 'ITA POWER')));

    $partnerUrl = trim((string) ($resolvedPartner?->partner_url ?? ''));

    if ($partnerUrl !== '' && !preg_match('~^(?:[a-z][a-z0-9+\-.]*:)?//~i', $partnerUrl)) {
        $partnerUrl = 'https://' . ltrim($partnerUrl, '/');
    }

    $hasPartnerUrl = $partnerUrl !== '';

    $normalizedPartnerName = strtoupper((string) preg_replace('/\s+/', ' ', $partnerName));
    $isItaPower = $normalizedPartnerName === 'ITA POWER';

    $assetFromPublic = static function (string $path): string {
        $normalized = trim(str_replace('\\', '/', $path), '/');
        $segments = array_map('rawurlencode', explode('/', $normalized));
        return asset(implode('/', $segments));
    };

    $productsPaginator = null;
    $usingFallbackProducts = false;
    $fallbackMode = null;

    if ($resolvedPartner) {
        $productsPaginator = \App\Models\SectorsPageCommunicationsPartnerProduct::query()
            ->where('partner_id', $resolvedPartner->id)
            ->orderBy('sort_order')
            ->orderBy('id')
            ->paginate($perPage)
            ->withQueryString();
    }

    $shouldUseItaPowerFallback = $isItaPower && (!$resolvedPartner || ($productsPaginator && $productsPaginator->total() === 0));

    if ($shouldUseItaPowerFallback) {
        $usingFallbackProducts = true;
        $fallbackMode = 'ita_power';

        $defaultProducts = collect([
            [
                'image' => $assetFromPublic('assets/images/sectors/sector-pages/communications/partner-products/Ermes T 100-600 opened.png'),
                'name' => 'Ermes T 100-600 - Opened',
                'description' => 'A default ITA POWER product prepared to present the available product visuals clearly on the page.',
            ],
            [
                'image' => $assetFromPublic('assets/images/sectors/sector-pages/communications/partner-products/Ermes T 100-600 front.png'),
                'name' => 'Ermes T 100-600 - Front',
                'description' => 'A placeholder product card created to display the current product image until dashboard data is added.',
            ],
            [
                'image' => $assetFromPublic('assets/images/sectors/sector-pages/communications/partner-products/Ermes T 100-600 front-sideR.png'),
                'name' => 'Ermes T 100-600 - Front Side R',
                'description' => 'A temporary preview item from ITA POWER used to showcase the available visuals to the client.',
            ],
            [
                'image' => $assetFromPublic('assets/images/sectors/sector-pages/communications/partner-products/Ermes T 100-600 front-side.png'),
                'name' => 'Ermes T 100-600 - Front Side',
                'description' => 'A default product entry prepared for visual presentation and easy replacement later from the dashboard.',
            ],
            [
                'image' => $assetFromPublic('assets/images/sectors/sector-pages/communications/partner-products/Ermes interno con batterie.png'),
                'name' => 'Ermes Interno Con Batterie',
                'description' => 'A temporary ITA POWER product item used to present another available product image in the layout.',
            ],
            [
                'image' => $assetFromPublic('assets/images/sectors/sector-pages/communications/partner-products/Ermes gruppo.jpg'),
                'name' => 'Ermes Gruppo',
                'description' => 'A default showcase product added to help display the full range of currently available partner visuals.',
            ],

            [
                'image' => $assetFromPublic('assets/images/sectors/sector-pages/communications/partner-products/Smart rack/14.2.jpg'),
                'name' => 'Smart Rack 14.2',
                'description' => 'A placeholder item from the Smart Rack series added to display available ITA POWER product images.',
            ],
            [
                'image' => $assetFromPublic('assets/images/sectors/sector-pages/communications/partner-products/Smart rack/14.1.jpg'),
                'name' => 'Smart Rack 14.1',
                'description' => 'A simple default description prepared to preview this product image on the partner products page.',
            ],
            [
                'image' => $assetFromPublic('assets/images/sectors/sector-pages/communications/partner-products/Smart rack/13.4.jpg'),
                'name' => 'Smart Rack 13.4',
                'description' => 'A temporary Smart Rack product card created to show the client all currently available images.',
            ],
            [
                'image' => $assetFromPublic('assets/images/sectors/sector-pages/communications/partner-products/Smart rack/13.3.jpg'),
                'name' => 'Smart Rack 13.3',
                'description' => 'A visual-only default product entry that can later be replaced by real dashboard content.',
            ],
            [
                'image' => $assetFromPublic('assets/images/sectors/sector-pages/communications/partner-products/Smart rack/13.2.jpg'),
                'name' => 'Smart Rack 13.2',
                'description' => 'A preview item from the Smart Rack line added to complete the temporary ITA POWER showcase.',
            ],
            [
                'image' => $assetFromPublic('assets/images/sectors/sector-pages/communications/partner-products/Smart rack/12.4.jpg'),
                'name' => 'Smart Rack 12.4',
                'description' => 'A default showcase product prepared to present this image within the current partner layout.',
            ],
            [
                'image' => $assetFromPublic('assets/images/sectors/sector-pages/communications/partner-products/Smart rack/12.2.jpg'),
                'name' => 'Smart Rack 12.2',
                'description' => 'A temporary visual entry used to display another Smart Rack model until dynamic data is connected.',
            ],
            [
                'image' => $assetFromPublic('assets/images/sectors/sector-pages/communications/partner-products/Smart rack/12.1.jpg'),
                'name' => 'Smart Rack 12.1',
                'description' => 'A placeholder card included to keep the client-facing gallery full and visually consistent.',
            ],
            [
                'image' => $assetFromPublic('assets/images/sectors/sector-pages/communications/partner-products/Smart rack/11.4.jpg'),
                'name' => 'Smart Rack 11.4',
                'description' => 'A temporary default item from ITA POWER that helps present all available Smart Rack images.',
            ],
            [
                'image' => $assetFromPublic('assets/images/sectors/sector-pages/communications/partner-products/Smart rack/11.3.jpg'),
                'name' => 'Smart Rack 11.3',
                'description' => 'A simple placeholder product card prepared for preview and later replacement from real data.',
            ],
            [
                'image' => $assetFromPublic('assets/images/sectors/sector-pages/communications/partner-products/Smart rack/11.2.jpg'),
                'name' => 'Smart Rack 11.2',
                'description' => 'A default presentation item added to make sure the current visual set appears fully to the client.',
            ],
            [
                'image' => $assetFromPublic('assets/images/sectors/sector-pages/communications/partner-products/Smart rack/11.1.jpg'),
                'name' => 'Smart Rack 11.1',
                'description' => 'A temporary ITA POWER showcase product used only to display the image in the page design.',
            ],

            [
                'image' => $assetFromPublic('assets/images/sectors/sector-pages/communications/partner-products/Smart plus/10.1.jpg'),
                'name' => 'Smart Plus 10.1',
                'description' => 'A default product from the Smart Plus range created for client preview and layout presentation.',
            ],
            [
                'image' => $assetFromPublic('assets/images/sectors/sector-pages/communications/partner-products/Smart plus/8.5.jpg'),
                'name' => 'Smart Plus 8.5',
                'description' => 'A placeholder Smart Plus item prepared to show the available partner product visuals more completely.',
            ],
            [
                'image' => $assetFromPublic('assets/images/sectors/sector-pages/communications/partner-products/Smart plus/8.3.jpg'),
                'name' => 'Smart Plus 8.3',
                'description' => 'A temporary product entry added only to display this image until actual product records are entered.',
            ],
            [
                'image' => $assetFromPublic('assets/images/sectors/sector-pages/communications/partner-products/Smart plus/8.2.jpg'),
                'name' => 'Smart Plus 8.2',
                'description' => 'A visual-only fallback item from ITA POWER used to enrich the partner products presentation.',
            ],

            [
                'image' => $assetFromPublic('assets/images/sectors/sector-pages/communications/partner-products/Lite/4.6.jpg'),
                'name' => 'Lite 4.6',
                'description' => 'A default Lite series product prepared to display the current available image within the page design.',
            ],
            [
                'image' => $assetFromPublic('assets/images/sectors/sector-pages/communications/partner-products/Lite/4.5.jpg'),
                'name' => 'Lite 4.5',
                'description' => 'A simple placeholder card used to present this Lite model to the client during the preview stage.',
            ],
            [
                'image' => $assetFromPublic('assets/images/sectors/sector-pages/communications/partner-products/Lite/4.2.jpg'),
                'name' => 'Lite 4.2',
                'description' => 'A temporary fallback product added to keep the ITA POWER gallery complete and visually balanced.',
            ],
            [
                'image' => $assetFromPublic('assets/images/sectors/sector-pages/communications/partner-products/Lite/3.3.jpg'),
                'name' => 'Lite 3.3',
                'description' => 'A preview-only Lite product card that can later be replaced by real dashboard-driven content.',
            ],
            [
                'image' => $assetFromPublic('assets/images/sectors/sector-pages/communications/partner-products/Lite/3.2.jpg'),
                'name' => 'Lite 3.2',
                'description' => 'A final default Lite item added to ensure that all currently available ITA POWER images are shown.',
            ],
        ]);

        $currentPage = max((int) request()->query('page', 1), 1);

        $productsPaginator = new \Illuminate\Pagination\LengthAwarePaginator(
            $defaultProducts->forPage($currentPage, $perPage)->values(),
            $defaultProducts->count(),
            $perPage,
            $currentPage,
            [
                'path' => url()->current(),
                'query' => request()->except('page'),
            ]
        );
    } elseif (!$resolvedPartner) {
        $usingFallbackProducts = true;
        $fallbackMode = 'generic';

        $defaultProducts = collect([
            [
                'image' => asset('assets/images/section/1.png'),
                'name' => 'Enterprise Router',
                'description' => 'A practical connectivity solution for offices and businesses, offering stable performance and reliable daily operation.',
            ],
            [
                'image' => asset('assets/images/section/1.png'),
                'name' => 'Smart Network Switch',
                'description' => 'A flexible switching solution designed to manage and distribute network traffic efficiently across devices.',
            ],
            [
                'image' => asset('assets/images/section/1.png'),
                'name' => 'IP Calling System',
                'description' => 'A modern internal communication system that delivers clear voice quality and easier call management.',
            ],
            [
                'image' => asset('assets/images/section/1.png'),
                'name' => 'Fiber Distribution Unit',
                'description' => 'A structured solution for organizing and distributing fiber optic lines safely across project environments.',
            ],
            [
                'image' => asset('assets/images/section/1.png'),
                'name' => 'SMS Gateway',
                'description' => 'A fast and effective platform for sending alerts, notifications, and operational messages.',
            ],
            [
                'image' => asset('assets/images/section/1.png'),
                'name' => 'Vehicle Tracking Device',
                'description' => 'A useful tool for monitoring location and movement with simplified reports for field operations.',
            ],
            [
                'image' => asset('assets/images/section/1.png'),
                'name' => 'Surveillance Camera Solution',
                'description' => 'A visual monitoring system suitable for facilities and operational sites with practical control features.',
            ],
            [
                'image' => asset('assets/images/section/1.png'),
                'name' => 'Backup Power Unit',
                'description' => 'A dependable power support solution that helps maintain continuity for critical network systems.',
            ],
            [
                'image' => asset('assets/images/section/1.png'),
                'name' => 'Network Management Platform',
                'description' => 'A unified dashboard for monitoring devices, services, and daily network activity more clearly.',
            ],
            [
                'image' => asset('assets/images/section/1.png'),
                'name' => 'Outdoor Antenna',
                'description' => 'A practical option for improving signal coverage in open areas and remote operational locations.',
            ],
            [
                'image' => asset('assets/images/section/1.png'),
                'name' => 'Mobile POS System',
                'description' => 'A simple and effective point-of-sale solution for field payment operations and mobile workflows.',
            ],
            [
                'image' => asset('assets/images/section/1.png'),
                'name' => 'Cloud Control Panel',
                'description' => 'A centralized interface for viewing data and monitoring services and products in an organized way.',
            ],
        ]);

        $currentPage = max((int) request()->query('page', 1), 1);

        $productsPaginator = new \Illuminate\Pagination\LengthAwarePaginator(
            $defaultProducts->forPage($currentPage, $perPage)->values(),
            $defaultProducts->count(),
            $perPage,
            $currentPage,
            [
                'path' => url()->current(),
                'query' => request()->except('page'),
            ]
        );
    }
@endphp

<section class="lp-section lp-partnerProducts" id="partner-products" aria-label="{{ $partnerName }} products">
  <div class="lp-partnerProducts__inner">

    <header class="lp-partnerProducts__head">
      <div class="lp-partnerProducts__headMain {{ $hasPartnerUrl ? '' : 'lp-partnerProducts__headMain--centered' }}">
        <div class="lp-partnerProducts__headContent {{ $hasPartnerUrl ? '' : 'lp-partnerProducts__headContent--centered' }}">
          <h2 class="lp-sectors__title lp-partnerProducts__title">
            Products of <span class="lp-sectors__titleAccent">{{ $partnerName }}</span>
          </h2>

          @if($usingFallbackProducts && $fallbackMode === 'ita_power')
            <p class="lp-partnerProducts__subtitle">
              These are default products prepared specifically for ITA POWER. They will be replaced automatically by dashboard products as soon as items are added for this partner.
            </p>
          @elseif($usingFallbackProducts)
            <p class="lp-partnerProducts__subtitle">
              These are temporary default items prepared only for previewing the design. Once the layout is approved, we can connect the products dynamically from the dashboard based on the selected partner.
            </p>
          @elseif($productsPaginator->total() === 0)
            <p class="lp-partnerProducts__subtitle">
              There are no products added for this partner yet.
            </p>
          @endif
        </div>

        @if($hasPartnerUrl)
          <div class="lp-partnerProducts__headAction">
            <a
              class="lp-cta lp-cta--partnerSite"
              href="{{ $partnerUrl }}"
              target="_blank"
              rel="noopener noreferrer"
              aria-label="Go to {{ $partnerName }} website"
            >
              <span class="lp-cta__stroke" aria-hidden="true"></span>
              <span class="lp-cta__layer" aria-hidden="true">
                <span class="lp-cta__text">Go to Partner Website</span>
              </span>
            </a>
          </div>
        @endif
      </div>
    </header>

    <div class="lp-partnerProducts__grid" aria-label="Products list">
      @if($usingFallbackProducts)
        @foreach ($productsPaginator as $product)
          <article class="lp-partnerProducts__card" aria-label="{{ $product['name'] }}">
            <div class="lp-partnerProducts__media">
              <img
                src="{{ $product['image'] }}"
                alt="{{ $product['name'] }}"
                loading="lazy"
                decoding="async"
              />
            </div>

            <div class="lp-partnerProducts__body">
              <h3 class="lp-partnerProducts__name">{{ $product['name'] }}</h3>
              <p class="lp-partnerProducts__desc">{{ $product['description'] }}</p>
            </div>
          </article>
        @endforeach
      @else
        @forelse ($productsPaginator as $product)
          @php
              $productImage = !empty($product->product_image)
                  ? \Illuminate\Support\Facades\Storage::url($product->product_image)
                  : asset('assets/images/section/1.png');

              $productName = trim((string) ($product->name_en ?? 'Product'));
              $productDescription = trim((string) ($product->description_en ?? ''));
          @endphp

          <article class="lp-partnerProducts__card" aria-label="{{ $productName }}">
            <div class="lp-partnerProducts__media">
              <img
                src="{{ $productImage }}"
                alt="{{ $productName }}"
                loading="lazy"
                decoding="async"
              />
            </div>

            <div class="lp-partnerProducts__body">
              <h3 class="lp-partnerProducts__name">{{ $productName }}</h3>
              <p class="lp-partnerProducts__desc">{{ $productDescription }}</p>
            </div>
          </article>
        @empty
          <p style="grid-column: 1 / -1; text-align: center; margin: 0;">
            There are no products added for this partner yet.
          </p>
        @endforelse
      @endif
    </div>

    @if($productsPaginator->hasPages())
      <nav class="lp-partnerProducts__pagination" aria-label="Products pagination">
        @if($productsPaginator->onFirstPage())
          <span class="lp-partnerProducts__pageBtn lp-partnerProducts__pageBtn--wide" aria-disabled="true">Previous</span>
        @else
          <a class="lp-partnerProducts__pageBtn lp-partnerProducts__pageBtn--wide" href="{{ $productsPaginator->previousPageUrl() }}">Previous</a>
        @endif

        @for($page = 1; $page <= $productsPaginator->lastPage(); $page++)
          <a
            class="lp-partnerProducts__pageBtn lp-partnerProducts__pageBtn--num"
            href="{{ $productsPaginator->url($page) }}"
            @if($productsPaginator->currentPage() === $page) aria-current="page" @endif
          >
            {{ $page }}
          </a>
        @endfor

        @if($productsPaginator->hasMorePages())
          <a class="lp-partnerProducts__pageBtn lp-partnerProducts__pageBtn--wide" href="{{ $productsPaginator->nextPageUrl() }}">Next</a>
        @else
          <span class="lp-partnerProducts__pageBtn lp-partnerProducts__pageBtn--wide" aria-disabled="true">Next</span>
        @endif
      </nav>
    @endif

  </div>
</section>