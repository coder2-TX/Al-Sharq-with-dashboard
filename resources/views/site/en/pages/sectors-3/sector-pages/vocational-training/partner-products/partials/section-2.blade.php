@php
    $perPage = 6;
    $partnerNameFromQuery = trim((string) request()->query('name', ''));
    $partnerName = $partnerNameFromQuery !== '' ? $partnerNameFromQuery : 'Pearson';

    $defaultProducts = collect([
        ['image' => asset('assets/images/section/1.png'), 'name' => 'Computer Skills Program', 'description' => 'A foundational training program that supports core digital and workplace technology skills.'],
        ['image' => asset('assets/images/section/1.png'), 'name' => 'Networking Program', 'description' => 'A practical training path focused on essential networking concepts and real technical readiness.'],
        ['image' => asset('assets/images/section/1.png'), 'name' => 'Engineering Design Program', 'description' => 'Supports technical development in design-related fields through practical learning exposure.'],
        ['image' => asset('assets/images/section/1.png'), 'name' => 'Professional Maintenance Program', 'description' => 'A structured training option focused on applied maintenance skills and workshop-based readiness.'],
        ['image' => asset('assets/images/section/1.png'), 'name' => 'Office Administration Program', 'description' => 'Helps strengthen daily organizational, communication, and office workflow capabilities.'],
        ['image' => asset('assets/images/section/1.png'), 'name' => 'Occupational Safety Program', 'description' => 'Builds awareness and practical understanding of safety procedures in work environments.'],
        ['image' => asset('assets/images/section/1.png'), 'name' => 'Employability Workshop', 'description' => 'A short-form training experience that improves professional readiness for the job market.'],
        ['image' => asset('assets/images/section/1.png'), 'name' => 'Customer Service Program', 'description' => 'Develops practical communication and service skills for customer-facing environments.'],
        ['image' => asset('assets/images/section/1.png'), 'name' => 'Professional Marketing Program', 'description' => 'Introduces practical marketing fundamentals and presentation-oriented workplace skills.'],
        ['image' => asset('assets/images/section/1.png'), 'name' => 'Workplace Language Program', 'description' => 'Supports professional communication through language skills relevant to work settings.'],
        ['image' => asset('assets/images/section/1.png'), 'name' => 'Specialized Short Courses', 'description' => 'Flexible short-duration learning options designed for focused upskilling and targeted outcomes.'],
        ['image' => asset('assets/images/section/1.png'), 'name' => 'Institutional Training Packages', 'description' => 'Structured training bundles created to improve team capability and organizational development.'],
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

<section class="lp-section lp-partnerProducts" id="vocational-training-partner-products" aria-label="{{ $partnerName }} Products">
  <div class="lp-partnerProducts__inner">

    <header class="lp-partnerProducts__head">
      <h2 class="lp-sectors__title lp-partnerProducts__title">
        Products
        <span class="lp-sectors__titleAccent">
          <span class="lp-autoLatin" dir="ltr" lang="en">{{ $partnerName }}</span>
        </span>
      </h2>

      <p class="lp-partnerProducts__subtitle">
        These are temporary sample products for the Vocational Training Sector. Once the dashboard integration is completed, each partner’s real offerings will be shown dynamically.
      </p>
    </header>

    <div class="lp-partnerProducts__grid" aria-label="Products list">
      @foreach ($productsPaginator as $product)
        <article class="lp-partnerProducts__card" aria-label="{{ $product['name'] }}">
          <div class="lp-partnerProducts__media">
            <img src="{{ $product['image'] }}" alt="{{ $product['name'] }}" loading="lazy" decoding="async" />
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
          <a class="lp-partnerProducts__pageBtn lp-partnerProducts__pageBtn--num" dir="ltr" lang="en" href="{{ $productsPaginator->url($page) }}" @if($productsPaginator->currentPage() === $page) aria-current="page" @endif>
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