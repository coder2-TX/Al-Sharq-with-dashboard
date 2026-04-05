@php
    $perPage = 6;

    $partnerId = (int) request()->query('partner_id', 1);
    $partnerNameFromQuery = trim((string) request()->query('name', ''));

    $resolvedPartner = null;

    if ($partnerId > 0) {
        $resolvedPartner = \App\Models\SectorsPageMedicalSuppliesPartner::query()->find($partnerId);
    }

    if (!$resolvedPartner && $partnerNameFromQuery !== '') {
        $resolvedPartner = \App\Models\SectorsPageMedicalSuppliesPartner::query()
            ->where('partner_name', $partnerNameFromQuery)
            ->first();
    }

    $partnerName = trim((string) ($resolvedPartner?->partner_name ?: ($partnerNameFromQuery !== '' ? $partnerNameFromQuery : 'MediLine')));

    $partnerUrl = trim((string) ($resolvedPartner?->partner_url ?? ''));

    if ($partnerUrl !== '' && !preg_match('~^(?:[a-z][a-z0-9+\-.]*:)?//~i', $partnerUrl)) {
        $partnerUrl = 'https://' . ltrim($partnerUrl, '/');
    }

    $hasPartnerUrl = $partnerUrl !== '';

    $productsPaginator = null;
    $usingFallbackProducts = false;

    if ($resolvedPartner) {
        $productsPaginator = \App\Models\SectorsPageMedicalSuppliesPartnerProduct::query()
            ->where('partner_id', $resolvedPartner->id)
            ->orderBy('sort_order')
            ->orderBy('id')
            ->paginate($perPage)
            ->withQueryString();
    }

    if (!$productsPaginator || $productsPaginator->total() === 0) {
        $usingFallbackProducts = true;

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