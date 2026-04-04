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
    $partnerNameHasLatin = preg_match('/[A-Za-z]/', $partnerName) === 1;

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
                'name' => 'تركيبة حليب أطفال المرحلة الأولى',
                'description' => 'منتج افتراضي مخصص لعرض شكل بطاقة المنتج داخل الصفحة حتى يتم إدخال المنتجات الحقيقية من لوحة التحكم.',
            ],
            [
                'image' => asset('assets/images/section/1.png'),
                'name' => 'تركيبة حليب أطفال المرحلة الثانية',
                'description' => 'عنصر تجريبي مؤقت يساعد على اختبار شبكة المنتجات وربطها بالشريك المحدد في هذه الصفحة.',
            ],
            [
                'image' => asset('assets/images/section/1.png'),
                'name' => 'تركيبة متابعة المرحلة الثالثة',
                'description' => 'بطاقة افتراضية لمنتج تغذية أطفال تم وضعها فقط لاستكمال العرض البصري قبل إضافة البيانات الفعلية.',
            ],
            [
                'image' => asset('assets/images/section/1.png'),
                'name' => 'حبوب أطفال مدعمة',
                'description' => 'منتج افتراضي يعرض مثالاً على الأغذية المساندة للأطفال مع وصف مبسط يمكن استبداله لاحقاً.',
            ],
            [
                'image' => asset('assets/images/section/1.png'),
                'name' => 'وجبة أرز للأطفال',
                'description' => 'عنصر مؤقت لعرض أنواع الأغذية المبكرة الخاصة بالأطفال ضمن شبكة المنتجات الحالية.',
            ],
            [
                'image' => asset('assets/images/section/1.png'),
                'name' => 'وجبة قمح للأطفال',
                'description' => 'وصف تجريبي تم وضعه مؤقتاً ليوضح مكان النص والصورة داخل بطاقة المنتج.',
            ],
            [
                'image' => asset('assets/images/section/1.png'),
                'name' => 'هريس فواكه للأطفال',
                'description' => 'نموذج افتراضي لمنتج غذائي يمكن لاحقاً استبداله بالكامل ببيانات فعلية من الداشبورد.',
            ],
            [
                'image' => asset('assets/images/section/1.png'),
                'name' => 'هريس خضار للأطفال',
                'description' => 'بطاقة عرض مؤقتة تضمن ظهور المنتجات بشكل كامل حتى قبل ربط المحتوى الحقيقي.',
            ],
            [
                'image' => asset('assets/images/section/1.png'),
                'name' => 'بسكويت أطفال مغذي',
                'description' => 'منتج افتراضي بسيط لعرض شكل التصميم وآلية الترتيب والتصفح بين صفحات المنتجات.',
            ],
            [
                'image' => asset('assets/images/section/1.png'),
                'name' => 'وجبة خفيفة صحية للأطفال',
                'description' => 'محتوى تجريبي يساعد على اختبار عدد البطاقات والتوزيع البصري داخل هذا السكشن.',
            ],
            [
                'image' => asset('assets/images/section/1.png'),
                'name' => 'حليب قليل اللاكتوز للأطفال',
                'description' => 'عنصر افتراضي إضافي يوضح إمكانية عرض أصناف متخصصة داخل نفس صفحة الشريك.',
            ],
            [
                'image' => asset('assets/images/section/1.png'),
                'name' => 'مكمل تغذية للأطفال',
                'description' => 'آخر منتج افتراضي في هذه المجموعة، وسيتم استبداله مباشرة عند إضافة منتجات حقيقية من لوحة التحكم.',
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

<section class="lp-section lp-partnerProducts" id="partner-products" aria-label="منتجات {{ $partnerName }}">
  <div class="lp-partnerProducts__inner">

    <header class="lp-partnerProducts__head">
      <h2 class="lp-sectors__title lp-partnerProducts__title">
        منتجات
        <span class="lp-sectors__titleAccent">
          @if($partnerNameHasLatin)
            <span class="lp-autoLatin" dir="ltr" lang="en">{{ $partnerName }}</span>
          @else
            {{ $partnerName }}
          @endif
        </span>
      </h2>

      @if($usingFallbackProducts && $resolvedPartner)
        <p class="lp-partnerProducts__subtitle">
          هذه منتجات افتراضية مؤقتة لهذا الشريك، وستُستبدل تلقائياً بمنتجات لوحة التحكم بمجرد إضافتها.
        </p>
      @elseif($usingFallbackProducts)
        <p class="lp-partnerProducts__subtitle">
          هذه بيانات افتراضية مؤقتة لعرض التصميم فقط، وبعد اعتماد الشكل النهائي سنربط المنتجات مباشرة من لوحة التحكم حسب الشريك المحدد.
        </p>
      @endif
    </header>

    <div class="lp-partnerProducts__grid" aria-label="قائمة المنتجات">
      @if($usingFallbackProducts)
        @foreach ($productsPaginator as $product)
          @php
              $productName = (string) $product['name'];
              $productNameHasLatin = preg_match('/[A-Za-z]/', $productName) === 1;
          @endphp

          <article class="lp-partnerProducts__card" aria-label="{{ $productName }}">
            <div class="lp-partnerProducts__media">
              <img
                src="{{ $product['image'] }}"
                alt="{{ $productName }}"
                loading="lazy"
                decoding="async"
              />
            </div>

            <div class="lp-partnerProducts__body">
              <h3 class="lp-partnerProducts__name">
                @if($productNameHasLatin)
                  <span class="lp-autoLatin" dir="ltr" lang="en">{{ $productName }}</span>
                @else
                  {{ $productName }}
                @endif
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

              $productName = trim((string) ($product->name_ar ?: $product->name_en ?: 'منتج'));
              $productDescription = trim((string) ($product->description_ar ?: $product->description_en ?: ''));
              $productNameHasLatin = preg_match('/[A-Za-z]/', $productName) === 1;
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
                @if($productNameHasLatin)
                  <span class="lp-autoLatin" dir="ltr" lang="en">{{ $productName }}</span>
                @else
                  {{ $productName }}
                @endif
              </h3>
              <p class="lp-partnerProducts__desc">{{ $productDescription }}</p>
            </div>
          </article>
        @empty
          <p style="grid-column: 1 / -1; text-align: center; margin: 0;">
            لا توجد منتجات مضافة لهذا الشريك حالياً.
          </p>
        @endforelse
      @endif
    </div>

    @if($productsPaginator->hasPages())
      <nav class="lp-partnerProducts__pagination" aria-label="التنقل بين صفحات المنتجات">
        @if($productsPaginator->onFirstPage())
          <span class="lp-partnerProducts__pageBtn lp-partnerProducts__pageBtn--wide" aria-disabled="true">السابق</span>
        @else
          <a class="lp-partnerProducts__pageBtn lp-partnerProducts__pageBtn--wide" href="{{ $productsPaginator->previousPageUrl() }}">السابق</a>
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
          <a class="lp-partnerProducts__pageBtn lp-partnerProducts__pageBtn--wide" href="{{ $productsPaginator->nextPageUrl() }}">اللاحق</a>
        @else
          <span class="lp-partnerProducts__pageBtn lp-partnerProducts__pageBtn--wide" aria-disabled="true">اللاحق</span>
        @endif
      </nav>
    @endif

  </div>
</section>