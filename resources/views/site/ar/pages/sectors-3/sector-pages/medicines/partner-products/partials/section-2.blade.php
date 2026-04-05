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
    $partnerNameHasLatin = preg_match('/[A-Za-z]/', $partnerName) === 1;

    $partnerUrl = trim((string) ($resolvedPartner?->partner_url ?? ''));

    if ($partnerUrl !== '' && !preg_match('~^(?:[a-z][a-z0-9+\-.]*:)?//~i', $partnerUrl)) {
        $partnerUrl = 'https://' . ltrim($partnerUrl, '/');
    }

    $hasPartnerUrl = $partnerUrl !== '';

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
                'description' => 'منتج افتراضي يعبّر عن المستحضرات الموضعة المتخصصة القابلة للإضافة لاحقًا من الداشبورد.',
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
    }
@endphp

<section class="lp-section lp-partnerProducts" id="partner-products" aria-label="منتجات {{ $partnerName }}">
  <div class="lp-partnerProducts__inner">

    <header class="lp-partnerProducts__head">
      <div class="lp-partnerProducts__headMain {{ $hasPartnerUrl ? '' : 'lp-partnerProducts__headMain--centered' }}">
        <div class="lp-partnerProducts__headContent {{ $hasPartnerUrl ? '' : 'lp-partnerProducts__headContent--centered' }}">
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
          @endif
        </div>

        @if($hasPartnerUrl)
          <div class="lp-partnerProducts__headAction">
            <a
              class="lp-cta lp-cta--partnerSite"
              href="{{ $partnerUrl }}"
              target="_blank"
              rel="noopener noreferrer"
              aria-label="انتقال لموقع الشريك {{ $partnerName }}"
            >
              <span class="lp-cta__stroke" aria-hidden="true"></span>
              <span class="lp-cta__layer" aria-hidden="true">
                <span class="lp-cta__text">انتقال لموقع الشريك</span>
              </span>
            </a>
          </div>
        @endif
      </div>
    </header>

    <div class="lp-partnerProducts__grid" aria-label="قائمة المنتجات">
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

              $productName = trim((string) ($product->name_ar ?: $product->name_en ?: 'منتج'));
              $productDescription = trim((string) ($product->description_ar ?: $product->description_en ?: ''));
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