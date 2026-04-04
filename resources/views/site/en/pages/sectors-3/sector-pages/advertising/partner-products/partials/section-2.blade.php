@php
    $perPage = 6;

    $partnerId = (int) request()->query('partner_id', isset($partner) ? $partner->id : 0);
    $partnerNameFromQuery = trim((string) request()->query('name', ''));

    $resolvedPartner = $partner ?? null;

    if (!$resolvedPartner && $partnerId > 0) {
        $resolvedPartner = \App\Models\SectorsPageAdvertisingPartner::query()->find($partnerId);
    }

    if (!$resolvedPartner && $partnerNameFromQuery !== '') {
        $resolvedPartner = \App\Models\SectorsPageAdvertisingPartner::query()
            ->where('partner_name', $partnerNameFromQuery)
            ->first();
    }

    $partnerName = trim((string) ($resolvedPartner?->partner_name ?: ($partnerNameFromQuery !== '' ? $partnerNameFromQuery : 'BrandSpark')));

    $productsPaginator = null;
    $usingFallbackProducts = false;

    if ($resolvedPartner) {
        $productsPaginator = \App\Models\SectorsPageAdvertisingPartnerProduct::query()
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
                'name' => 'Outdoor Billboard Campaign',
                'description' => 'A temporary sample product used to preview the advertising product card layout until real dashboard items are added.',
            ],
            [
                'image' => asset('assets/images/section/1.png'),
                'name' => 'Digital Screen Advertising',
                'description' => 'A placeholder advertising service prepared to test the partner products page and its visual structure.',
            ],
            [
                'image' => asset('assets/images/section/1.png'),
                'name' => 'Social Media Promotion Package',
                'description' => 'A demo product card added to complete the visual preview before actual partner products are entered.',
            ],
            [
                'image' => asset('assets/images/section/1.png'),
                'name' => 'Brand Identity Design',
                'description' => 'A temporary creative service item showing how branding-related products can appear in this section.',
            ],
            [
                'image' => asset('assets/images/section/1.png'),
                'name' => 'Event Branding Package',
                'description' => 'A preview-only product representing event advertising and visual identity support.',
            ],
            [
                'image' => asset('assets/images/section/1.png'),
                'name' => 'Printed Marketing Materials',
                'description' => 'A temporary placeholder used to present print advertising items in the current product grid.',
            ],
            [
                'image' => asset('assets/images/section/1.png'),
                'name' => 'Promotional Video Production',
                'description' => 'A sample media product illustrating how production services can be displayed on the partner page.',
            ],
            [
                'image' => asset('assets/images/section/1.png'),
                'name' => 'Motion Graphics Design',
                'description' => 'A visual preview item created to keep the page layout complete until real products are added.',
            ],
            [
                'image' => asset('assets/images/section/1.png'),
                'name' => 'Exhibition Stand Branding',
                'description' => 'A placeholder product showing how exhibition and booth branding services may appear.',
            ],
            [
                'image' => asset('assets/images/section/1.png'),
                'name' => 'Retail Store Signage',
                'description' => 'A temporary advertising product added to test the page flow and card balance.',
            ],
            [
                'image' => asset('assets/images/section/1.png'),
                'name' => 'Campaign Strategy Service',
                'description' => 'A simple fallback service item prepared for preview and later replacement from real dashboard data.',
            ],
            [
                'image' => asset('assets/images/section/1.png'),
                'name' => 'Integrated Media Planning',
                'description' => 'The final placeholder product in this set, automatically replaced once dashboard products are added.',
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
      <h2 class="lp-sectors__title lp-partnerProducts__title">
        Products of <span class="lp-sectors__titleAccent">{{ $partnerName }}</span>
      </h2>

      @if($usingFallbackProducts && $resolvedPartner)
        <p class="lp-partnerProducts__subtitle">
          These are temporary default products for this partner. They will be replaced automatically as soon as dashboard products are added.
        </p>
      @elseif($usingFallbackProducts)
        <p class="lp-partnerProducts__subtitle">
          These are temporary preview items prepared only to display the design. Once approved, products will be connected directly from the dashboard for the selected partner.
        </p>
      @endif
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