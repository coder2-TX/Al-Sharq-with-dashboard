@php
    $perPage = 6;

    $partnerId = (int) request()->query('partner_id', isset($partner) ? $partner->id : 0);
    $partnerNameFromQuery = trim((string) request()->query('name', ''));

    $resolvedPartner = $partner ?? null;

    if (!$resolvedPartner && $partnerId > 0) {
        $resolvedPartner = \App\Models\SectorsPageMilkFoodPartner::query()->find($partnerId);
    }

    if (!$resolvedPartner && $partnerNameFromQuery !== '') {
        $resolvedPartner = \App\Models\SectorsPageMilkFoodPartner::query()
            ->where('partner_name', $partnerNameFromQuery)
            ->first();
    }

    $partnerName = trim((string) ($resolvedPartner?->partner_name ?: ($partnerNameFromQuery !== '' ? $partnerNameFromQuery : 'NutriBaby')));

    $partnerUrl = trim((string) ($resolvedPartner?->partner_url ?? ''));

    if ($partnerUrl !== '' && !preg_match('~^(?:[a-z][a-z0-9+\-.]*:)?//~i', $partnerUrl)) {
        $partnerUrl = 'https://' . ltrim($partnerUrl, '/');
    }

    $hasPartnerUrl = $partnerUrl !== '';

    $productsPaginator = null;
    $usingFallbackProducts = false;

    if ($resolvedPartner) {
        $productsPaginator = \App\Models\SectorsPageMilkFoodPartnerProduct::query()
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
                'name' => 'Infant Formula Stage 1',
                'description' => 'A temporary sample product used to preview the product card layout until real dashboard products are added.',
            ],
            [
                'image' => asset('assets/images/section/1.png'),
                'name' => 'Infant Formula Stage 2',
                'description' => 'A placeholder item created to test the product grid and the connection with the selected partner page.',
            ],
            [
                'image' => asset('assets/images/section/1.png'),
                'name' => 'Follow-Up Formula Stage 3',
                'description' => 'A demo product card prepared only to complete the visual presentation before real products are entered.',
            ],
            [
                'image' => asset('assets/images/section/1.png'),
                'name' => 'Fortified Baby Cereal',
                'description' => 'A sample nutrition product showing how complementary food items can appear inside this section.',
            ],
            [
                'image' => asset('assets/images/section/1.png'),
                'name' => 'Baby Rice Meal',
                'description' => 'A temporary content item used to represent early nutrition products in the current product grid.',
            ],
            [
                'image' => asset('assets/images/section/1.png'),
                'name' => 'Baby Wheat Meal',
                'description' => 'A simple preview description placed temporarily to show the text and image positions inside the card.',
            ],
            [
                'image' => asset('assets/images/section/1.png'),
                'name' => 'Fruit Puree for Babies',
                'description' => 'A placeholder food product that can later be fully replaced by real dashboard-driven data.',
            ],
            [
                'image' => asset('assets/images/section/1.png'),
                'name' => 'Vegetable Puree for Babies',
                'description' => 'A temporary product card used to keep the section visually complete before actual content is added.',
            ],
            [
                'image' => asset('assets/images/section/1.png'),
                'name' => 'Nutritious Baby Biscuit',
                'description' => 'A basic sample product showing the final card design and the product pagination behavior.',
            ],
            [
                'image' => asset('assets/images/section/1.png'),
                'name' => 'Healthy Snack for Babies',
                'description' => 'A demo content item prepared to test the visual balance and number of cards in this section.',
            ],
            [
                'image' => asset('assets/images/section/1.png'),
                'name' => 'Low-Lactose Infant Milk',
                'description' => 'An additional sample item showing that specialized nutrition categories can also appear on this partner page.',
            ],
            [
                'image' => asset('assets/images/section/1.png'),
                'name' => 'Baby Nutrition Supplement',
                'description' => 'The final placeholder product in this set, automatically replaced once real dashboard products are added.',
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
          @elseif($usingFallbackProducts)
            <p class="lp-partnerProducts__subtitle">
              These are temporary preview items prepared only to display the design. Once the layout is approved, products will be connected directly from the dashboard for the selected partner.
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