@php
    $perPage = 6;

    $partnerId = (int) request()->query('partner_id', 0);
    $partnerNameFromQuery = trim((string) request()->query('name', ''));

    $partners = collect([
        ['id' => 1, 'name' => 'TOYOTA'],
        ['id' => 2, 'name' => 'BOSCH'],
        ['id' => 3, 'name' => 'DENSO'],
        ['id' => 4, 'name' => 'MOBIL'],
        ['id' => 5, 'name' => 'MICHELIN'],
        ['id' => 6, 'name' => 'ACDelco'],
    ]);

    $resolvedPartner = $partners->firstWhere('id', $partnerId);

    if (!$resolvedPartner && $partnerNameFromQuery !== '') {
        $resolvedPartner = $partners->first(function ($item) use ($partnerNameFromQuery) {
            return mb_strtolower($item['name']) === mb_strtolower($partnerNameFromQuery);
        });
    }

    $partnerName = $resolvedPartner['name'] ?? ($partnerNameFromQuery !== '' ? $partnerNameFromQuery : 'TOYOTA');
    $partnerNameHasLatin = preg_match('/[A-Za-z]/', $partnerName) === 1;

    $defaultProducts = collect([
        [
            'image' => asset('assets/images/section/1.png'),
            'name' => 'زيوت محركات متقدمة',
            'description' => 'منتج مناسب لدعم كفاءة المحرك وتقليل الاستهلاك مع مستوى موثوق من الحماية اليومية.',
        ],
        [
            'image' => asset('assets/images/section/1.png'),
            'name' => 'فلاتر هواء أصلية',
            'description' => 'تساعد على تحسين جودة الهواء الداخل للمحرك والمساهمة في استقرار الأداء على المدى الطويل.',
        ],
        [
            'image' => asset('assets/images/section/1.png'),
            'name' => 'بطاريات سيارات',
            'description' => 'توفر طاقة تشغيل مستقرة وموثوقة لتلبية احتياجات المركبات المختلفة في ظروف الاستخدام المتنوعة.',
        ],
        [
            'image' => asset('assets/images/section/1.png'),
            'name' => 'أقمشة فرامل',
            'description' => 'مكون مهم يعزز السلامة ويوفر استجابة مناسبة أثناء التوقف والاستخدام داخل المدن وخارجها.',
        ],
        [
            'image' => asset('assets/images/section/1.png'),
            'name' => 'إطارات متعددة الاستخدام',
            'description' => 'حل عملي يحقق توازناً بين الثبات والعمر التشغيلي والراحة أثناء القيادة اليومية.',
        ],
        [
            'image' => asset('assets/images/section/1.png'),
            'name' => 'شمعات إشعال',
            'description' => 'تدعم كفاءة الاحتراق داخل المحرك وتساعد على تحسين التشغيل وتقليل التقطيع في الأداء.',
        ],
        [
            'image' => asset('assets/images/section/1.png'),
            'name' => 'مساعدات تعليق',
            'description' => 'توفر ثباتاً أفضل وراحة أكبر للمركبة في الطرق المختلفة وتدعم سلامة القيادة.',
        ],
        [
            'image' => asset('assets/images/section/1.png'),
            'name' => 'زيت ناقل حركة',
            'description' => 'يساهم في سلاسة الانتقال بين السرعات والمحافظة على كفاءة نظام الحركة لفترات أطول.',
        ],
        [
            'image' => asset('assets/images/section/1.png'),
            'name' => 'فلاتر زيت',
            'description' => 'تساعد على تنقية الزيت وتقليل الشوائب بما يحافظ على المحرك ويطيل عمر مكوناته.',
        ],
        [
            'image' => asset('assets/images/section/1.png'),
            'name' => 'سائل تبريد',
            'description' => 'منتج أساسي للمحافظة على درجة حرارة المحرك وتقليل مخاطر الارتفاع الحراري أثناء التشغيل.',
        ],
        [
            'image' => asset('assets/images/section/1.png'),
            'name' => 'قطع صيانة دورية',
            'description' => 'مجموعة حلول مناسبة للصيانة الوقائية وتخفيض الأعطال المفاجئة في الاستخدام اليومي.',
        ],
        [
            'image' => asset('assets/images/section/1.png'),
            'name' => 'ملحقات مركبات',
            'description' => 'تشمل احتياجات إضافية تدعم الراحة والتنظيم وتحسين تجربة استخدام المركبة بصورة عامة.',
        ],
    ]);

    $products = $defaultProducts->map(function ($product) use ($partnerName) {
        $product['description'] .= ' مقدم ضمن عرض شريك ' . $partnerName . '.';
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

<section class="lp-section lp-partnerProducts" id="cars-partner-products" aria-label="منتجات {{ $partnerName }}">
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

      <p class="lp-partnerProducts__subtitle">
        هذه بيانات افتراضية مؤقتة لقطاع السيارات، وبعد الربط مع لوحة التحكم ستظهر منتجات كل شريك بشكل ديناميكي.
      </p>
    </header>

    <div class="lp-partnerProducts__grid" aria-label="قائمة المنتجات">
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