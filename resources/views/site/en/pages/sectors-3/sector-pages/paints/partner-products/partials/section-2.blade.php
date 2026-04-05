@php
    $perPage = 6;

    $partnerId = (int) request()->query('partner_id', 0);
    $partnerNameFromQuery = trim((string) request()->query('name', ''));

    $resolvedPartner = null;

    if ($partnerId > 0) {
        $resolvedPartner = \App\Models\SectorsPagePaintsPartner::query()->find($partnerId);
    }

    if (!$resolvedPartner && $partnerNameFromQuery !== '') {
        $resolvedPartner = \App\Models\SectorsPagePaintsPartner::query()
            ->where('partner_name', $partnerNameFromQuery)
            ->first();
    }

    $partnerName = trim((string) ($resolvedPartner?->partner_name ?: ($partnerNameFromQuery !== '' ? $partnerNameFromQuery : 'JOTUN')));

    $productsPaginator = null;
    $usingFallbackProducts = false;

    if ($resolvedPartner) {
        $productsPaginator = \App\Models\SectorsPagePaintsPartnerProduct::query()
            ->where('partner_id', $resolvedPartner->id)
            ->orderBy('sort_order')
            ->orderBy('id')
            ->paginate($perPage)
            ->withQueryString();
    }

    if (!$productsPaginator || $productsPaginator->total() === 0) {
        $usingFallbackProducts = true;

        $defaultProducts = collect([
            ['image' => asset('assets/images/section/1.png'), 'name' => 'Interior Paint', 'description' => 'A quality solution for interior walls with balanced coverage and a refined visual finish.'],
            ['image' => asset('assets/images/section/1.png'), 'name' => 'Exterior Paint', 'description' => 'Designed for outdoor performance with dependable protection against environmental exposure.'],
            ['image' => asset('assets/images/section/1.png'), 'name' => 'Primer Coat', 'description' => 'Helps improve adhesion and prepares surfaces for a more consistent final result.'],
            ['image' => asset('assets/images/section/1.png'), 'name' => 'Wall Putty', 'description' => 'Supports surface preparation and helps create smoother finishing conditions before painting.'],
            ['image' => asset('assets/images/section/1.png'), 'name' => 'Protective Coating', 'description' => 'Suitable for surfaces that require extra durability and protective performance.'],
            ['image' => asset('assets/images/section/1.png'), 'name' => 'Decorative Finish', 'description' => 'Adds aesthetic value with practical finishing options for different design styles.'],
            ['image' => asset('assets/images/section/1.png'), 'name' => 'Insulation Material', 'description' => 'A complementary product that supports protection and performance in specialized applications.'],
            ['image' => asset('assets/images/section/1.png'), 'name' => 'Industrial Paint', 'description' => 'Made for demanding industrial and workshop environments that need reliable durability.'],
            ['image' => asset('assets/images/section/1.png'), 'name' => 'Automotive Paint', 'description' => 'A practical finishing option for vehicle painting with balanced appearance and function.'],
            ['image' => asset('assets/images/section/1.png'), 'name' => 'Clear Protective Coat', 'description' => 'Helps preserve surface appearance and provides an additional layer of finish protection.'],
            ['image' => asset('assets/images/section/1.png'), 'name' => 'Application Supplies', 'description' => 'Supporting materials that make paint preparation and application easier and more organized.'],
            ['image' => asset('assets/images/section/1.png'), 'name' => 'Integrated Finishing Solutions', 'description' => 'A practical mix of complementary products designed for professional finishing workflows.'],
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

<section class="lp-section lp-partnerProducts" id="paints-partner-products" aria-label="{{ $partnerName }} Products">
  <div class="lp-partnerProducts__inner">

    <header class="lp-partnerProducts__head">
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
    </header>

    <div class="lp-partnerProducts__grid" aria-label="Products list">
      @if($usingFallbackProducts)
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
              <img src="{{ $productImage }}" alt="{{ $productName }}" loading="lazy" decoding="async" />
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