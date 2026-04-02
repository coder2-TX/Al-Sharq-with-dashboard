@php
    $perPage = 6;

    $defaultProducts = collect([
        [
            'image' => asset('assets/images/section/1.png'),
            'name' => 'Broad-Spectrum Antibiotic',
            'description' => 'A sample product card representing general therapeutic medicine lines supplied through the medicines sector.',
        ],
        [
            'image' => asset('assets/images/section/1.png'),
            'name' => 'Pain Relief & Fever Reducer',
            'description' => 'A temporary product item used to present common daily pharmaceutical categories within the page design.',
        ],
        [
            'image' => asset('assets/images/section/1.png'),
            'name' => 'Respiratory Treatment',
            'description' => 'A placeholder product card representing treatment categories related to seasonal and respiratory needs.',
        ],
        [
            'image' => asset('assets/images/section/1.png'),
            'name' => 'Chronic Care Medicine',
            'description' => 'A sample item used to display long-term treatment lines that require steady availability and supply continuity.',
        ],
        [
            'image' => asset('assets/images/section/1.png'),
            'name' => 'Medicinal Vitamins',
            'description' => 'A preview product card reflecting supportive healthcare products and medicinal supplement categories.',
        ],
        [
            'image' => asset('assets/images/section/1.png'),
            'name' => 'Children’s Syrup',
            'description' => 'A temporary display item representing pediatric pharmaceutical products until dynamic partner data is connected.',
        ],
        [
            'image' => asset('assets/images/section/1.png'),
            'name' => 'Anti-Allergy Treatment',
            'description' => 'A sample product block prepared to present one of the commonly distributed therapeutic groups.',
        ],
        [
            'image' => asset('assets/images/section/1.png'),
            'name' => 'Digestive Care Treatment',
            'description' => 'A placeholder item representing pharmaceutical solutions used in gastrointestinal and digestive care.',
        ],
        [
            'image' => asset('assets/images/section/1.png'),
            'name' => 'IV Solution',
            'description' => 'A temporary product card used to represent hospital-use and supportive treatment preparations.',
        ],
        [
            'image' => asset('assets/images/section/1.png'),
            'name' => 'Eye Drops',
            'description' => 'A visual placeholder for one of the medicine lines that can later be replaced with real partner-driven data.',
        ],
        [
            'image' => asset('assets/images/section/1.png'),
            'name' => 'Dermatological Cream',
            'description' => 'A sample product entry used to show topical and skin-treatment product categories on the page.',
        ],
        [
            'image' => asset('assets/images/section/1.png'),
            'name' => 'Diabetes Treatment',
            'description' => 'A default product card representing one of the important chronic-care categories within the medicines sector.',
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