@php
    $defaultProducts = collect([
        [
            'image' => asset('assets/images/section/1.png'),
            'name' => 'راوتر مؤسسي',
            'description' => 'حل اتصال ثابت وعملي للشركات والمكاتب مع أداء مستقر وتغطية مناسبة للاستخدام اليومي.',
        ],
        [
            'image' => asset('assets/images/section/1.png'),
            'name' => 'سويتش شبكات ذكي',
            'description' => 'مُبدّل شبكي لإدارة وتوزيع الاتصال بين الأجهزة بكفاءة مع مرونة في التوسعة مستقبلاً.',
        ],
        [
            'image' => asset('assets/images/section/1.png'),
            'name' => 'نظام مكالمات IP',
            'description' => 'منظومة اتصالات داخلية حديثة تدعم جودة صوت واضحة وإدارة أسهل للمكالمات المؤسسية.',
        ],
        [
            'image' => asset('assets/images/section/1.png'),
            'name' => 'وحدة توزيع ألياف',
            'description' => 'حل مخصص لتنظيم وتوزيع خطوط الألياف البصرية بطريقة مرتبة وآمنة داخل المشاريع.',
        ],
        [
            'image' => asset('assets/images/section/1.png'),
            'name' => 'بوابة رسائل قصيرة',
            'description' => 'منصة لإرسال الإشعارات والتنبيهات النصية بسرعة وفاعلية إلى العملاء أو فرق العمل.',
        ],
        [
            'image' => asset('assets/images/section/1.png'),
            'name' => 'جهاز تتبع مركبات',
            'description' => 'أداة عملية لتتبع الحركة والموقع مع تقارير مبسطة تناسب القطاعات التشغيلية المختلفة.',
        ],
        [
            'image' => asset('assets/images/section/1.png'),
            'name' => 'حل كاميرات مراقبة',
            'description' => 'منظومة مراقبة مرئية بجودة مناسبة مع إمكانيات متابعة أساسية للمرافق والمنشآت.',
        ],
        [
            'image' => asset('assets/images/section/1.png'),
            'name' => 'وحدة طاقة احتياطية',
            'description' => 'مصدر دعم كهربائي للشبكات والأنظمة الحساسة بهدف الحفاظ على الاستمرارية وقت الانقطاع.',
        ],
        [
            'image' => asset('assets/images/section/1.png'),
            'name' => 'منصة إدارة الشبكات',
            'description' => 'لوحة موحدة لمتابعة حالة الشبكة والأجهزة وربط العمليات اليومية بشكل أبسط.',
        ],
        [
            'image' => asset('assets/images/section/1.png'),
            'name' => 'هوائي خارجي',
            'description' => 'خيار مخصص لتحسين الاستقبال والتغطية في البيئات المفتوحة أو المواقع الطرفية.',
        ],
        [
            'image' => asset('assets/images/section/1.png'),
            'name' => 'نظام نقاط بيع متنقل',
            'description' => 'حل سريع وعملي للمدفوعات وإدارة العمليات الميدانية مع واجهة استخدام سهلة.',
        ],
        [
            'image' => asset('assets/images/section/1.png'),
            'name' => 'لوحة تحكم سحابية',
            'description' => 'واجهة مركزية لعرض البيانات ومتابعة الخدمات والمنتجات بصورة واضحة ومنظمة.',
        ],
    ]);

    $perPage = 6;
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
        منتجات <span class="lp-sectors__titleAccent">{{ $partnerName }}</span>
      </h2>

      <p class="lp-partnerProducts__subtitle">
        هذه بيانات افتراضية مؤقتة لعرض التصميم فقط، وبعد اعتماد الشكل النهائي سنربط المنتجات مباشرة من لوحة التحكم حسب الشريك المحدد.
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