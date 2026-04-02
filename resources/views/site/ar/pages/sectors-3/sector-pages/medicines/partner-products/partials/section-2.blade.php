@php
    $perPage = 6;

    $partnerNameHasLatin = preg_match('/[A-Za-z]/', $partnerName) === 1;

    $defaultProducts = collect([
        [
            'image' => asset('assets/images/section/1.png'),
            'name' => 'مضاد حيوي واسع المجال',
            'description' => 'منتج افتراضي مخصص لعرض فئة الأدوية العلاجية المستخدمة ضمن الخطوط العامة للرعاية الصحية.',
        ],
        [
            'image' => asset('assets/images/section/1.png'),
            'name' => 'مسكن وخافض حرارة',
            'description' => 'عنصر افتراضي يعبّر عن الأدوية اليومية الشائعة والمستخدمة لدعم الاحتياجات الأساسية في السوق.',
        ],
        [
            'image' => asset('assets/images/section/1.png'),
            'name' => 'علاج التهابات الجهاز التنفسي',
            'description' => 'بطاقة عرض مؤقتة ضمن صفحة المنتجات لتمثيل الفئات العلاجية المرتبطة بالأمراض الموسمية والتنفسية.',
        ],
        [
            'image' => asset('assets/images/section/1.png'),
            'name' => 'أدوية الأمراض المزمنة',
            'description' => 'منتج افتراضي موجه لعرض خطوط علاجية مناسبة للفئات التي تحتاج إلى استمرارية في الاستخدام.',
        ],
        [
            'image' => asset('assets/images/section/1.png'),
            'name' => 'فيتامينات ومكملات دوائية',
            'description' => 'وحدة عرض افتراضية تعكس المنتجات الداعمة للصحة العامة والمكملات المتداولة ضمن القطاع الدوائي.',
        ],
        [
            'image' => asset('assets/images/section/1.png'),
            'name' => 'شراب أطفال علاجي',
            'description' => 'عنصر مؤقت لتمثيل الأدوية الموجهة للأطفال ضمن محتوى الصفحة حتى الربط الفعلي من لوحة التحكم.',
        ],
        [
            'image' => asset('assets/images/section/1.png'),
            'name' => 'مضاد حساسية',
            'description' => 'بطاقة افتراضية لعرض أصناف دوائية مرتبطة بعلاجات الحساسية والرعاية اليومية.',
        ],
        [
            'image' => asset('assets/images/section/1.png'),
            'name' => 'علاج اضطرابات المعدة',
            'description' => 'منتج تجريبي يعكس الأدوية المرتبطة بالجهاز الهضمي والمستخدمة في القنوات الطبية والصيدلانية.',
        ],
        [
            'image' => asset('assets/images/section/1.png'),
            'name' => 'محلول وريدي',
            'description' => 'عنصر افتراضي لتمثيل المنتجات المستخدمة في البيئات العلاجية والمستشفيات ضمن قطاع الأدوية.',
        ],
        [
            'image' => asset('assets/images/section/1.png'),
            'name' => 'قطرة عين',
            'description' => 'بطاقة عرض مؤقتة لتوضيح أحد خطوط المستحضرات العلاجية ضمن الصفحة الحالية.',
        ],
        [
            'image' => asset('assets/images/section/1.png'),
            'name' => 'كريم جلدي علاجي',
            'description' => 'منتج افتراضي يعبّر عن المستحضرات الموضعية المتخصصة القابلة للإضافة لاحقًا من الداشبورد.',
        ],
        [
            'image' => asset('assets/images/section/1.png'),
            'name' => 'علاج السكري',
            'description' => 'وحدة تجريبية تمثل أحد الخطوط العلاجية المزمنة المهمة ضمن قطاع الأدوية.',
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