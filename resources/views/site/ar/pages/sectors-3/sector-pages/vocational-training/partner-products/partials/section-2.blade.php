@php
    $perPage = 6;

    $partnerId = (int) request()->query('partner_id', 0);
    $partnerNameFromQuery = trim((string) request()->query('name', ''));

    $resolvedPartner = null;

    if ($partnerId > 0) {
        $resolvedPartner = \App\Models\SectorsPageVocationalTrainingPartner::query()->find($partnerId);
    }

    if (!$resolvedPartner && $partnerNameFromQuery !== '') {
        $resolvedPartner = \App\Models\SectorsPageVocationalTrainingPartner::query()
            ->where('partner_name', $partnerNameFromQuery)
            ->first();
    }

    $partnerName = $resolvedPartner?->partner_name ?: ($partnerNameFromQuery !== '' ? $partnerNameFromQuery : 'Pearson');
    $partnerNameHasLatin = preg_match('/[A-Za-z]/', $partnerName) === 1;

    $productsPaginator = null;
    $usingFallbackProducts = false;

    if ($resolvedPartner) {
        $productsPaginator = \App\Models\SectorsPageVocationalTrainingPartnerProduct::query()
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
                'name' => 'برنامج مهارات الحاسوب',
                'description' => 'برنامج تدريبي تأسيسي يساعد على بناء المهارات التقنية الأساسية للاستخدام المهني اليومي.',
            ],
            [
                'image' => asset('assets/images/section/1.png'),
                'name' => 'برنامج الشبكات',
                'description' => 'مسار تدريبي يركز على المفاهيم العملية في الشبكات وإعداد البيئات التقنية الأساسية.',
            ],
            [
                'image' => asset('assets/images/section/1.png'),
                'name' => 'برنامج التصميم الهندسي',
                'description' => 'يوفر تدريباً مناسباً على أدوات ومهارات التصميم المستخدمة في المجالات الفنية والهندسية.',
            ],
            [
                'image' => asset('assets/images/section/1.png'),
                'name' => 'برنامج الصيانة المهنية',
                'description' => 'محتوى تدريبي عملي يركز على مهارات الصيانة الأساسية وأساليب العمل المنهجي في الورش.',
            ],
            [
                'image' => asset('assets/images/section/1.png'),
                'name' => 'برنامج الإدارة المكتبية',
                'description' => 'برنامج يساعد على تطوير مهارات التنظيم والتواصل وإدارة الأعمال اليومية داخل المؤسسات.',
            ],
            [
                'image' => asset('assets/images/section/1.png'),
                'name' => 'برنامج السلامة المهنية',
                'description' => 'يركز على مفاهيم السلامة وإجراءات الوقاية ورفع الوعي في بيئات العمل المختلفة.',
            ],
            [
                'image' => asset('assets/images/section/1.png'),
                'name' => 'ورشة مهارات التوظيف',
                'description' => 'تدريب قصير يهدف إلى تحسين الجاهزية المهنية وبناء المهارات المطلوبة للدخول إلى سوق العمل.',
            ],
            [
                'image' => asset('assets/images/section/1.png'),
                'name' => 'برنامج خدمة العملاء',
                'description' => 'يعزز مهارات التعامل والاتصال وحل المشكلات في البيئات الخدمية والتشغيلية.',
            ],
            [
                'image' => asset('assets/images/section/1.png'),
                'name' => 'برنامج التسويق المهني',
                'description' => 'يقدم أساسيات التسويق العملي ومهارات العرض والترويج المناسبة لمختلف الأنشطة.',
            ],
            [
                'image' => asset('assets/images/section/1.png'),
                'name' => 'برنامج اللغة المهنية',
                'description' => 'يساعد على تنمية مهارات اللغة المستخدمة في العمل والتواصل داخل البيئات المؤسسية.',
            ],
            [
                'image' => asset('assets/images/section/1.png'),
                'name' => 'دورات قصيرة متخصصة',
                'description' => 'مجموعة برامج مرنة لتلبية احتياجات تطوير مهارات محددة خلال فترة زمنية قصيرة.',
            ],
            [
                'image' => asset('assets/images/section/1.png'),
                'name' => 'حزم تدريب مؤسسية',
                'description' => 'حلول تدريبية موجهة للجهات والمؤسسات بهدف رفع كفاءة الفرق وتحسين النتائج التشغيلية.',
            ],
        ])->map(function ($product) use ($partnerName) {
            $product['description'] .= ' مقدم ضمن عرض شريك ' . $partnerName . '.';
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

<section class="lp-section lp-partnerProducts" id="vocational-training-partner-products" aria-label="منتجات {{ $partnerName }}">
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
      @else
        <p class="lp-partnerProducts__subtitle">
          هذه بيانات افتراضية مؤقتة لقطاع التدريب المهني، وبعد الربط مع لوحة التحكم ستظهر منتجات كل شريك بشكل ديناميكي.
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