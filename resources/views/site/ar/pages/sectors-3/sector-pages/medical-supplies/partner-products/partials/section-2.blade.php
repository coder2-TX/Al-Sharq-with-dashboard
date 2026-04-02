@php
    $perPage = 6;

    $partnerNameHasLatin = preg_match('/[A-Za-z]/', $partnerName) === 1;

    $defaultProducts = collect([
        [
            'image' => asset('assets/images/section/1.png'),
            'name' => 'قفازات طبية',
            'description' => 'منتج افتراضي لعرض فئة المستهلكات الأساسية المستخدمة يوميًا في البيئات الطبية والسريرية.',
        ],
        [
            'image' => asset('assets/images/section/1.png'),
            'name' => 'كمامات طبية',
            'description' => 'عنصر عرض مؤقت يعكس أدوات الوقاية الطبية المطلوبة ضمن التشغيل الصحي اليومي.',
        ],
        [
            'image' => asset('assets/images/section/1.png'),
            'name' => 'سرنجات معقمة',
            'description' => 'بطاقة افتراضية تمثل فئة المستلزمات أحادية الاستخدام المخصصة للعيادات والمستشفيات.',
        ],
        [
            'image' => asset('assets/images/section/1.png'),
            'name' => 'شاش وضمادات',
            'description' => 'منتج تجريبي لعرض المستلزمات المرتبطة بالإسعافات والجروح والرعاية التمريضية.',
        ],
        [
            'image' => asset('assets/images/section/1.png'),
            'name' => 'جهاز قياس ضغط',
            'description' => 'عنصر افتراضي يعبّر عن الأجهزة الطبية الأساسية المستخدمة في الفحص والمتابعة داخل المرافق الصحية.',
        ],
        [
            'image' => asset('assets/images/section/1.png'),
            'name' => 'جهاز قياس سكر',
            'description' => 'وحدة عرض مؤقتة لتمثيل أجهزة القياس والمتابعة الطبية ضمن هذه الصفحة.',
        ],
        [
            'image' => asset('assets/images/section/1.png'),
            'name' => 'ميزان حرارة طبي',
            'description' => 'بطاقة افتراضية لمنتج يندرج ضمن الأجهزة البسيطة الداعمة للمتابعة السريرية اليومية.',
        ],
        [
            'image' => asset('assets/images/section/1.png'),
            'name' => 'مستلزمات مختبر',
            'description' => 'منتج افتراضي لعرض الفئات المستخدمة داخل المختبرات والبيئات التشخيصية المختلفة.',
        ],
        [
            'image' => asset('assets/images/section/1.png'),
            'name' => 'مواد تعقيم',
            'description' => 'عنصر مؤقت لعرض المنتجات المرتبطة بالتعقيم والنظافة والسلامة التشغيلية في المنشآت الصحية.',
        ],
        [
            'image' => asset('assets/images/section/1.png'),
            'name' => 'مستهلكات غرف العمليات',
            'description' => 'بطاقة افتراضية لتمثيل المستلزمات المهمة داخل بيئات الإجراءات الطبية والعمليات.',
        ],
        [
            'image' => asset('assets/images/section/1.png'),
            'name' => 'مستلزمات عيادات أسنان',
            'description' => 'منتج تجريبي يعبّر عن الفئات المتخصصة القابلة للتوسع لاحقًا عبر لوحة التحكم.',
        ],
        [
            'image' => asset('assets/images/section/1.png'),
            'name' => 'أدوات إسعاف أولي',
            'description' => 'وحدة افتراضية تعرض فئة المنتجات السريعة والمباشرة الداعمة لحالات الرعاية الأولية.',
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

      <p class="lp-partnerProducts__subtitle">
        هذه منتجات افتراضية لعرض تصميم الصفحة مؤقتًا، وسيتم لاحقًا ربط كل شريك بمنتجاته الفعلية من لوحة التحكم.
      </p>
    </header>

    <div class="lp-partnerProducts__grid" aria-label="قائمة المنتجات">
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