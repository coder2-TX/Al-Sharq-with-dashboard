@php
    $perPage = 6;

    $partnerId = (int) request()->query('partner_id', 0);
    $partnerNameFromQuery = trim((string) request()->query('name', ''));

    $partners = collect([
        ['id' => 1, 'name' => 'TOYOTA'],
        ['id' => 2, 'name' => 'BOSCH'],
        ['id' => 3, 'name' => 'DENSO'],
        ['id' => 4, 'name' => 'MOBIL'],
        ['id' => 5, 'name' => 'MICHELIN'],
        ['id' => 6, 'name' => 'ACDelco'],
    ]);

    $resolvedPartner = $partners->firstWhere('id', $partnerId);

    if (!$resolvedPartner && $partnerNameFromQuery !== '') {
        $resolvedPartner = $partners->first(function ($item) use ($partnerNameFromQuery) {
            return mb_strtolower($item['name']) === mb_strtolower($partnerNameFromQuery);
        });
    }

    $partnerName = $resolvedPartner['name'] ?? ($partnerNameFromQuery !== '' ? $partnerNameFromQuery : 'TOYOTA');

    $defaultProducts = collect([
        ['image' => asset('assets/images/section/1.png'), 'name' => 'Advanced Engine Oil', 'description' => 'A reliable lubrication product designed to support engine efficiency and everyday performance.'],
        ['image' => asset('assets/images/section/1.png'), 'name' => 'Original Air Filter', 'description' => 'Helps improve airflow quality and supports smoother vehicle operation over time.'],
        ['image' => asset('assets/images/section/1.png'), 'name' => 'Car Battery', 'description' => 'Provides stable starting power and dependable electrical support for different vehicle types.'],
        ['image' => asset('assets/images/section/1.png'), 'name' => 'Brake Pads', 'description' => 'A key safety component that supports effective stopping response in daily driving conditions.'],
        ['image' => asset('assets/images/section/1.png'), 'name' => 'Multi-Purpose Tires', 'description' => 'A practical tire solution that balances durability, grip, and driving comfort.'],
        ['image' => asset('assets/images/section/1.png'), 'name' => 'Spark Plugs', 'description' => 'Supports cleaner ignition performance and helps maintain stable engine behavior.'],
        ['image' => asset('assets/images/section/1.png'), 'name' => 'Shock Absorbers', 'description' => 'Designed to improve ride stability, comfort, and overall suspension response.'],
        ['image' => asset('assets/images/section/1.png'), 'name' => 'Transmission Fluid', 'description' => 'Helps maintain smooth shifting performance and supports transmission reliability.'],
        ['image' => asset('assets/images/section/1.png'), 'name' => 'Oil Filter', 'description' => 'Assists in keeping engine oil cleaner and supports longer component life.'],
        ['image' => asset('assets/images/section/1.png'), 'name' => 'Coolant', 'description' => 'A vital solution that helps regulate engine temperature during operation.'],
        ['image' => asset('assets/images/section/1.png'), 'name' => 'Maintenance Parts', 'description' => 'A practical range of service items designed for preventive and routine maintenance.'],
        ['image' => asset('assets/images/section/1.png'), 'name' => 'Vehicle Accessories', 'description' => 'Additional products that enhance comfort, organization, and daily vehicle usability.'],
    ]);

    $products = $defaultProducts->map(function ($product) use ($partnerName) {
        $product['description'] .= ' Offered as part of the ' . $partnerName . ' partner showcase.';
        return $product;
    });

    $currentPage = max((int) request()->query('page', 1), 1);

    $productsPaginator = new \Illuminate\Pagination\LengthAwarePaginator(
        $products->forPage($currentPage, $perPage)->values(),
        $products->count(),
        $perPage,
        $currentPage,
        [
            'path' => url()->current(),
            'query' => request()->except('page'),
        ]
    );
@endphp

<section class="lp-section lp-partnerProducts" id="cars-partner-products" aria-label="{{ $partnerName }} Products">
  <div class="lp-partnerProducts__inner">

    <header class="lp-partnerProducts__head">
      <h2 class="lp-sectors__title lp-partnerProducts__title">
        Products
        <span class="lp-sectors__titleAccent">
          <span class="lp-autoLatin" dir="ltr" lang="en">{{ $partnerName }}</span>
        </span>
      </h2>

      <p class="lp-partnerProducts__subtitle">
        These are temporary sample products for the Automotive Sector. Once the dashboard integration is completed, each partner’s real products will appear dynamically here.
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
            <h3 class="lp-partnerProducts__name">
              <span class="lp-autoLatin" dir="ltr" lang="en">{{ $product['name'] }}</span>
            </h3>
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
            dir="ltr"
            lang="en"
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