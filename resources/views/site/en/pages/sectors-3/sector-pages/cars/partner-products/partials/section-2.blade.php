@php
    $perPage = 6;

    $partnerId = (int) request()->query('partner_id', 0);
    $partnerNameFromQuery = trim((string) request()->query('name', ''));

    $resolvedPartner = null;

    if ($partnerId > 0) {
        $resolvedPartner = \App\Models\SectorsPageCarsPartner::query()->find($partnerId);
    }

    if (!$resolvedPartner && $partnerNameFromQuery !== '') {
        $resolvedPartner = \App\Models\SectorsPageCarsPartner::query()
            ->where('partner_name', $partnerNameFromQuery)
            ->first();
    }

    $partnerName = trim((string) ($resolvedPartner?->partner_name ?: ($partnerNameFromQuery !== '' ? $partnerNameFromQuery : 'TOYOTA')));

    $partnerUrl = trim((string) ($resolvedPartner?->partner_url ?? ''));

    if ($partnerUrl !== '' && !preg_match('~^(?:[a-z][a-z0-9+\-.]*:)?//~i', $partnerUrl)) {
        $partnerUrl = 'https://' . ltrim($partnerUrl, '/');
    }

    $hasPartnerUrl = $partnerUrl !== '';

    $productsPaginator = null;
    $usingFallbackProducts = false;

    if ($resolvedPartner) {
        $productsPaginator = \App\Models\SectorsPageCarsPartnerProduct::query()
            ->where('partner_id', $resolvedPartner->id)
            ->orderBy('sort_order')
            ->orderBy('id')
            ->paginate($perPage)
            ->withQueryString();
    }

    if (!$productsPaginator || $productsPaginator->total() === 0) {
        $usingFallbackProducts = true;

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
        ])->map(function ($product) use ($partnerName) {
            $product['description'] .= ' Offered as part of the ' . $partnerName . ' partner showcase.';
            return $product;
        });

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

<section class="lp-section lp-partnerProducts" id="cars-partner-products" aria-label="{{ $partnerName }} Products">
  <div class="lp-partnerProducts__inner">

    <header class="lp-partnerProducts__head">
      <div class="lp-partnerProducts__headMain {{ $hasPartnerUrl ? '' : 'lp-partnerProducts__headMain--centered' }}">
        <div class="lp-partnerProducts__headContent {{ $hasPartnerUrl ? '' : 'lp-partnerProducts__headContent--centered' }}">
          <h2 class="lp-sectors__title lp-partnerProducts__title">
            Products
            <span class="lp-sectors__titleAccent">
              <span class="lp-autoLatin" dir="ltr" lang="en">{{ $partnerName }}</span>
            </span>
          </h2>

          @if($usingFallbackProducts && $resolvedPartner)
            <p class="lp-partnerProducts__subtitle">
              These are temporary default products for this partner. They will be replaced automatically as soon as dashboard products are added.
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
              <h3 class="lp-partnerProducts__name">
                <span class="lp-autoLatin" dir="ltr" lang="en">{{ $product['name'] }}</span>
              </h3>
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

              $productName = trim((string) ($product->name_en ?: $product->name_ar ?: 'Product'));
              $productDescription = trim((string) ($product->description_en ?: $product->description_ar ?: ''));
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
              <h3 class="lp-partnerProducts__name">
                <span class="lp-autoLatin" dir="ltr" lang="en">{{ $productName }}</span>
              </h3>
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