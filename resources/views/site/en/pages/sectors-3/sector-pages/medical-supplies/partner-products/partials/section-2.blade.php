@php
    $perPage = 6;

    $defaultProducts = collect([
        [
            'image' => asset('assets/images/section/1.png'),
            'name' => 'Medical Gloves',
            'description' => 'A sample product representing essential daily-use medical consumables for clinics and healthcare facilities.',
        ],
        [
            'image' => asset('assets/images/section/1.png'),
            'name' => 'Medical Masks',
            'description' => 'A placeholder item used to present protective products commonly required in medical environments.',
        ],
        [
            'image' => asset('assets/images/section/1.png'),
            'name' => 'Sterile Syringes',
            'description' => 'A temporary product card representing single-use supply categories commonly distributed to healthcare providers.',
        ],
        [
            'image' => asset('assets/images/section/1.png'),
            'name' => 'Gauze & Dressings',
            'description' => 'A default product entry reflecting wound-care and nursing-support supply lines.',
        ],
        [
            'image' => asset('assets/images/section/1.png'),
            'name' => 'Blood Pressure Monitor',
            'description' => 'A sample product representing basic monitoring devices used in clinics and healthcare facilities.',
        ],
        [
            'image' => asset('assets/images/section/1.png'),
            'name' => 'Glucose Meter',
            'description' => 'A placeholder card prepared to display one of the medical monitoring categories within the partner products layout.',
        ],
        [
            'image' => asset('assets/images/section/1.png'),
            'name' => 'Digital Thermometer',
            'description' => 'A temporary item representing one of the basic medical measurement tools supplied through this sector.',
        ],
        [
            'image' => asset('assets/images/section/1.png'),
            'name' => 'Laboratory Supplies',
            'description' => 'A sample entry designed to represent supply categories related to laboratory and diagnostic environments.',
        ],
        [
            'image' => asset('assets/images/section/1.png'),
            'name' => 'Sterilization Materials',
            'description' => 'A preview product card reflecting hygiene, sterilization, and safety-supporting supply products.',
        ],
        [
            'image' => asset('assets/images/section/1.png'),
            'name' => 'Operating Room Consumables',
            'description' => 'A placeholder product used to present one of the more specialized supply categories within the sector.',
        ],
        [
            'image' => asset('assets/images/section/1.png'),
            'name' => 'Dental Clinic Supplies',
            'description' => 'A sample item representing specialized supply groups that can later be managed dynamically from the dashboard.',
        ],
        [
            'image' => asset('assets/images/section/1.png'),
            'name' => 'First Aid Tools',
            'description' => 'A temporary default product prepared to reflect quick-response and primary-care supporting supply lines.',
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
@endphp

<section class="lp-section lp-partnerProducts" id="partner-products" aria-label="{{ $partnerName }} products">
  <div class="lp-partnerProducts__inner">

    <header class="lp-partnerProducts__head">
      <h2 class="lp-sectors__title lp-partnerProducts__title">
        Products of <span class="lp-sectors__titleAccent">{{ $partnerName }}</span>
      </h2>

      <p class="lp-partnerProducts__subtitle">
        These are temporary default products prepared to preview the page design. Later, each partner can be connected to real products from the dashboard.
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