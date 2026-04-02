@php
    $perPage = 6;

    $partnerId = (int) request()->query('partner_id', 0);
    $partnerNameFromQuery = trim((string) request()->query('name', ''));

    $partners = collect([
        ['id' => 1, 'name' => 'JOTUN'],
        ['id' => 2, 'name' => 'Hempel'],
        ['id' => 3, 'name' => 'National Paints'],
        ['id' => 4, 'name' => 'SIKA'],
        ['id' => 5, 'name' => 'KAPCI'],
        ['id' => 6, 'name' => 'MIDO'],
    ]);

    $resolvedPartner = $partners->firstWhere('id', $partnerId);

    if (!$resolvedPartner && $partnerNameFromQuery !== '') {
        $resolvedPartner = $partners->first(function ($item) use ($partnerNameFromQuery) {
            return mb_strtolower($item['name']) === mb_strtolower($partnerNameFromQuery);
        });
    }

    $partnerName = $resolvedPartner['name'] ?? ($partnerNameFromQuery !== '' ? $partnerNameFromQuery : 'JOTUN');
    $partnerNameHasLatin = preg_match('/[A-Za-z]/', $partnerName) === 1;

    $defaultProducts = collect([
        [
            'image' => asset('assets/images/section/1.png'),
            'name' => 'دهانات داخلية',
            'description' => 'حل مناسب للجدران الداخلية يمنح تغطية جيدة ومظهراً نهائياً أنيقاً للمساحات المختلفة.',
        ],
        [
            'image' => asset('assets/images/section/1.png'),
            'name' => 'دهانات خارجية',
            'description' => 'منتج مصمم لتحمل العوامل الجوية المختلفة مع ثبات مناسب في اللون والمظهر العام.',
        ],
        [
            'image' => asset('assets/images/section/1.png'),
            'name' => 'برايمر تأسيسي',
            'description' => 'طبقة تأسيس تساعد على تحسين التصاق الطلاء ورفع جودة التشطيب النهائي للمشروع.',
        ],
        [
            'image' => asset('assets/images/section/1.png'),
            'name' => 'معجون جدران',
            'description' => 'يساعد على تسوية الأسطح وتجهيزها قبل الدهان للوصول إلى نتيجة أكثر نعومة وتناسقاً.',
        ],
        [
            'image' => asset('assets/images/section/1.png'),
            'name' => 'طلاءات واقية',
            'description' => 'مناسبة لحماية الأسطح المعدنية أو الخرسانية من الظروف التشغيلية والعوامل البيئية.',
        ],
        [
            'image' => asset('assets/images/section/1.png'),
            'name' => 'دهانات ديكورية',
            'description' => 'توفر لمسات جمالية وخيارات تشطيب متنوعة تناسب التصاميم الحديثة والكلاسيكية.',
        ],
        [
            'image' => asset('assets/images/section/1.png'),
            'name' => 'مواد عزل',
            'description' => 'حلول مساندة للدهانات تساعد على حماية الأسطح وتحسين الأداء في البيئات المختلفة.',
        ],
        [
            'image' => asset('assets/images/section/1.png'),
            'name' => 'دهانات صناعية',
            'description' => 'مخصصة للورش والمرافق الصناعية التي تحتاج إلى متانة ومقاومة أعلى من المنتجات التقليدية.',
        ],
        [
            'image' => asset('assets/images/section/1.png'),
            'name' => 'دهانات سيارات',
            'description' => 'توفر تشطيباً مناسباً للمركبات مع خيارات في اللمعان والثبات وتدرجات الألوان المختلفة.',
        ],
        [
            'image' => asset('assets/images/section/1.png'),
            'name' => 'ورنيش وحماية',
            'description' => 'طبقة إضافية للمحافظة على اللون ولمعان السطح وتعزيز الحماية في الاستخدام المستمر.',
        ],
        [
            'image' => asset('assets/images/section/1.png'),
            'name' => 'مستلزمات تطبيق',
            'description' => 'تشمل مواد وأدوات مساندة تجعل عملية التنفيذ أسهل وأكثر انتظاماً داخل المشروع.',
        ],
        [
            'image' => asset('assets/images/section/1.png'),
            'name' => 'حلول تشطيب متكاملة',
            'description' => 'مجموعة منتجات مترابطة تساعد على تنفيذ أعمال الدهان والتشطيب بصورة أكثر احترافية.',
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

<section class="lp-section lp-partnerProducts" id="paints-partner-products" aria-label="منتجات {{ $partnerName }}">
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
        هذه بيانات افتراضية مؤقتة لقطاع الدهانات، وبعد الربط مع لوحة التحكم ستظهر منتجات كل شريك بشكل ديناميكي.
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