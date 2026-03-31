@php
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

    $perPage = 6;
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
@endphp

<section class="lp-section lp-partnerProducts" id="partner-products" aria-label="{{ $partnerName }} products">
  <div class="lp-partnerProducts__inner">

    <header class="lp-partnerProducts__head">
      <h2 class="lp-sectors__title lp-partnerProducts__title">
        Products of <span class="lp-sectors__titleAccent">{{ $partnerName }}</span>
      </h2>

      <p class="lp-partnerProducts__subtitle">
        These are temporary default items prepared only for previewing the design. Once the layout is approved, we can connect the products dynamically from the dashboard based on the selected partner.
      </p>
    </header>

    <div class="lp-partnerProducts__grid" aria-label="Products list">
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