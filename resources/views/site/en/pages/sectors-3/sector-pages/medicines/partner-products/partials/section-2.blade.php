@php
    $perPage = 6;

    $partnerId = (int) request()->query('partner_id', 1);
    $partnerNameFromQuery = trim((string) request()->query('name', ''));

    $resolvedPartner = null;

    if ($partnerId > 0) {
        $resolvedPartner = \App\Models\SectorsPageMedicinesPartner::query()->find($partnerId);
    }

    if (!$resolvedPartner && $partnerNameFromQuery !== '') {
        $resolvedPartner = \App\Models\SectorsPageMedicinesPartner::query()
            ->where('partner_name', $partnerNameFromQuery)
            ->first();
    }

    $partnerName = $resolvedPartner?->partner_name ?: ($partnerNameFromQuery !== '' ? $partnerNameFromQuery : 'PharmaNova');

    $productsPaginator = null;
    $usingFallbackProducts = false;

    if ($resolvedPartner) {
        $productsPaginator = \App\Models\SectorsPageMedicinesPartnerProduct::query()
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