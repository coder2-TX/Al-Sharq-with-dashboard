@php
    $perPage = 6;

    $partnerId = (int) request()->query('partner_id', isset($partner) ? $partner->id : 0);
    $partnerNameFromQuery = trim((string) request()->query('name', ''));

    $resolvedPartner = $partner ?? null;

    if (!$resolvedPartner && $partnerId > 0) {
        $resolvedPartner = \App\Models\SectorsPageCommunicationsPartner::query()->find($partnerId);
    }

    if (!$resolvedPartner && $partnerNameFromQuery !== '') {
        $resolvedPartner = \App\Models\SectorsPageCommunicationsPartner::query()
            ->where('partner_name', $partnerNameFromQuery)
            ->first();
    }

    $partnerName = trim((string) ($resolvedPartner?->partner_name ?: ($partnerNameFromQuery !== '' ? $partnerNameFromQuery : 'ITA POWER')));
    $partnerNameHasLatin = preg_match('/[A-Za-z]/', $partnerName) === 1;

    $partnerUrl = trim((string) ($resolvedPartner?->partner_url ?? ''));

    if ($partnerUrl !== '' && !preg_match('~^(?:[a-z][a-z0-9+\-.]*:)?//~i', $partnerUrl)) {
        $partnerUrl = 'https://' . ltrim($partnerUrl, '/');
    }

    $hasPartnerUrl = $partnerUrl !== '';

    $normalizedPartnerName = strtoupper((string) preg_replace('/\s+/', ' ', $partnerName));
    $isItaPower = $normalizedPartnerName === 'ITA POWER';

    $assetFromPublic = static function (string $path): string {
        $normalized = trim(str_replace('\\', '/', $path), '/');
        $segments = array_map('rawurlencode', explode('/', $normalized));
        return asset(implode('/', $segments));
    };

    $productsPaginator = null;
    $usingFallbackProducts = false;
    $fallbackMode = null;

    if ($resolvedPartner) {
        $productsPaginator = \App\Models\SectorsPageCommunicationsPartnerProduct::query()
            ->where('partner_id', $resolvedPartner->id)
            ->orderBy('sort_order')
            ->orderBy('id')
            ->paginate($perPage)
            ->withQueryString();
    }

    $shouldUseItaPowerFallback = $isItaPower && (!$resolvedPartner || ($productsPaginator && $productsPaginator->total() === 0));

    if ($shouldUseItaPowerFallback) {
        $usingFallbackProducts = true;
        $fallbackMode = 'ita_power';

        $defaultProducts = collect([
            [
                'image' => $assetFromPublic('assets/images/sectors/sector-pages/communications/partner-products/Ermes T 100-600 opened.png'),
                'name' => 'Ermes T 100-600 - Opened',
                'description' => 'منتج افتراضي من سلسلة ITA POWER لعرض تصميم صفحة المنتجات بصورة واضحة ومباشرة.',
            ],
            [
                'image' => $assetFromPublic('assets/images/sectors/sector-pages/communications/partner-products/Ermes T 100-600 front.png'),
                'name' => 'Ermes T 100-600 - Front',
                'description' => 'وحدة افتراضية ضمن منتجات ITA POWER تم إضافتها لعرض جميع الصور المتوفرة أمام العميل.',
            ],
            [
                'image' => $assetFromPublic('assets/images/sectors/sector-pages/communications/partner-products/Ermes T 100-600 front-sideR.png'),
                'name' => 'Ermes T 100-600 - Front Side R',
                'description' => 'صورة افتراضية لمنتج من ITA POWER تُستخدم مؤقتاً حتى يتم إدخال البيانات الفعلية من لوحة التحكم.',
            ],
            [
                'image' => $assetFromPublic('assets/images/sectors/sector-pages/communications/partner-products/Ermes T 100-600 front-side.png'),
                'name' => 'Ermes T 100-600 - Front Side',
                'description' => 'عنصر افتراضي لعرض المنتج ضمن شبكة المنتجات مع إمكانية استبداله لاحقاً بالبيانات الحقيقية.',
            ],
            [
                'image' => $assetFromPublic('assets/images/sectors/sector-pages/communications/partner-products/Ermes interno con batterie.png'),
                'name' => 'Ermes Interno Con Batterie',
                'description' => 'صورة افتراضية ضمن منتجات ITA POWER تعرض نموذجاً إضافياً ضمن نفس السلسلة التقنية.',
            ],
            [
                'image' => $assetFromPublic('assets/images/sectors/sector-pages/communications/partner-products/Ermes gruppo.jpg'),
                'name' => 'Ermes Gruppo',
                'description' => 'منتج افتراضي لإظهار تنوع صور الشريك داخل صفحة المنتجات حتى قبل الربط الديناميكي الكامل.',
            ],

            [
                'image' => $assetFromPublic('assets/images/sectors/sector-pages/communications/partner-products/Smart rack/14.2.jpg'),
                'name' => 'Smart Rack 14.2',
                'description' => 'نموذج افتراضي من سلسلة Smart Rack تم إدراجه لعرض الصور المتوفرة الخاصة بالشريك.',
            ],
            [
                'image' => $assetFromPublic('assets/images/sectors/sector-pages/communications/partner-products/Smart rack/14.1.jpg'),
                'name' => 'Smart Rack 14.1',
                'description' => 'وصف افتراضي بسيط لمنتج من ITA POWER يمكن استبداله لاحقاً من قاعدة البيانات.',
            ],
            [
                'image' => $assetFromPublic('assets/images/sectors/sector-pages/communications/partner-products/Smart rack/13.4.jpg'),
                'name' => 'Smart Rack 13.4',
                'description' => 'عنصر مؤقت لعرض شكل المنتج وصورته داخل الواجهة حتى يتم إضافة البيانات النهائية.',
            ],
            [
                'image' => $assetFromPublic('assets/images/sectors/sector-pages/communications/partner-products/Smart rack/13.3.jpg'),
                'name' => 'Smart Rack 13.3',
                'description' => 'بطاقة افتراضية مخصصة لعرض منتج من سلسلة Smart Rack ضمن شبكة المنتجات الحالية.',
            ],
            [
                'image' => $assetFromPublic('assets/images/sectors/sector-pages/communications/partner-products/Smart rack/13.2.jpg'),
                'name' => 'Smart Rack 13.2',
                'description' => 'منتج افتراضي ضمن العرض الأولي للشريك ITA POWER ليظهر للعميل جميع الصور المتاحة.',
            ],
            [
                'image' => $assetFromPublic('assets/images/sectors/sector-pages/communications/partner-products/Smart rack/12.4.jpg'),
                'name' => 'Smart Rack 12.4',
                'description' => 'بيان افتراضي تجريبي تم وضعه لإظهار الصورة ضمن بطاقات المنتجات بشكل مرتب.',
            ],
            [
                'image' => $assetFromPublic('assets/images/sectors/sector-pages/communications/partner-products/Smart rack/12.2.jpg'),
                'name' => 'Smart Rack 12.2',
                'description' => 'صورة افتراضية ضمن محتوى ITA POWER لعرض النماذج المختلفة مؤقتاً لحين التحديث من الداشبورد.',
            ],
            [
                'image' => $assetFromPublic('assets/images/sectors/sector-pages/communications/partner-products/Smart rack/12.1.jpg'),
                'name' => 'Smart Rack 12.1',
                'description' => 'هذا المنتج يستخدم كعنصر عرض مبدئي ليوضح تنوع صور ومنتجات الشريك للعميل.',
            ],
            [
                'image' => $assetFromPublic('assets/images/sectors/sector-pages/communications/partner-products/Smart rack/11.4.jpg'),
                'name' => 'Smart Rack 11.4',
                'description' => 'وصف تجريبي مرن يمكن تغييره لاحقاً بسهولة بمجرد ربط بيانات المنتجات الحقيقية.',
            ],
            [
                'image' => $assetFromPublic('assets/images/sectors/sector-pages/communications/partner-products/Smart rack/11.3.jpg'),
                'name' => 'Smart Rack 11.3',
                'description' => 'عنصر افتراضي من صور Smart Rack لتمثيل منتج مستقل داخل صفحة الشريك.',
            ],
            [
                'image' => $assetFromPublic('assets/images/sectors/sector-pages/communications/partner-products/Smart rack/11.2.jpg'),
                'name' => 'Smart Rack 11.2',
                'description' => 'بطاقة منتج مؤقتة تم إعدادها فقط لعرض الصورة والتصميم على العميل بشكل واضح.',
            ],
            [
                'image' => $assetFromPublic('assets/images/sectors/sector-pages/communications/partner-products/Smart rack/11.1.jpg'),
                'name' => 'Smart Rack 11.1',
                'description' => 'منتج افتراضي من ITA POWER يهدف إلى استعراض كامل الصور المتوفرة في هذه المرحلة.',
            ],

            [
                'image' => $assetFromPublic('assets/images/sectors/sector-pages/communications/partner-products/Smart plus/10.1.jpg'),
                'name' => 'Smart Plus 10.1',
                'description' => 'وحدة افتراضية ضمن سلسلة Smart Plus تم إضافتها لتجهيز محتوى العرض أمام العميل.',
            ],
            [
                'image' => $assetFromPublic('assets/images/sectors/sector-pages/communications/partner-products/Smart plus/8.5.jpg'),
                'name' => 'Smart Plus 8.5',
                'description' => 'وصف افتراضي مبسط لمنتج ضمن ITA POWER مع إمكانية تغييره لاحقاً حسب البيانات الفعلية.',
            ],
            [
                'image' => $assetFromPublic('assets/images/sectors/sector-pages/communications/partner-products/Smart plus/8.3.jpg'),
                'name' => 'Smart Plus 8.3',
                'description' => 'تمثيل افتراضي لصورة منتج من سلسلة Smart Plus ضمن شبكة المنتجات الحالية.',
            ],
            [
                'image' => $assetFromPublic('assets/images/sectors/sector-pages/communications/partner-products/Smart plus/8.2.jpg'),
                'name' => 'Smart Plus 8.2',
                'description' => 'صورة منتج افتراضية أضيفت لعرض كامل محتوى ITA POWER قبل استكمال الربط مع قاعدة البيانات.',
            ],

            [
                'image' => $assetFromPublic('assets/images/sectors/sector-pages/communications/partner-products/Lite/4.6.jpg'),
                'name' => 'Lite 4.6',
                'description' => 'نموذج افتراضي من سلسلة Lite لعرض صور المنتجات المتعددة الخاصة بالشريك داخل الصفحة.',
            ],
            [
                'image' => $assetFromPublic('assets/images/sectors/sector-pages/communications/partner-products/Lite/4.5.jpg'),
                'name' => 'Lite 4.5',
                'description' => 'بطاقة مؤقتة ضمن سلسلة Lite تم تجهيزها لعرض التصميم والمنتجات بشكل مكتمل.',
            ],
            [
                'image' => $assetFromPublic('assets/images/sectors/sector-pages/communications/partner-products/Lite/4.2.jpg'),
                'name' => 'Lite 4.2',
                'description' => 'منتج افتراضي بسيط مخصص للاستعراض فقط، ويمكن لاحقاً استبداله ببيانات حقيقية.',
            ],
            [
                'image' => $assetFromPublic('assets/images/sectors/sector-pages/communications/partner-products/Lite/3.3.jpg'),
                'name' => 'Lite 3.3',
                'description' => 'عنصر عرض تجريبي ضمن مجموعة Lite لتمكين العميل من مشاهدة كل الصور الحالية.',
            ],
            [
                'image' => $assetFromPublic('assets/images/sectors/sector-pages/communications/partner-products/Lite/3.2.jpg'),
                'name' => 'Lite 3.2',
                'description' => 'صورة افتراضية أخيرة ضمن سلسلة Lite لإكمال عرض جميع صور ITA POWER في هذه الصفحة.',
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
    } elseif (!$resolvedPartner) {
        $usingFallbackProducts = true;
        $fallbackMode = 'generic';

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

          @if($usingFallbackProducts && $fallbackMode === 'ita_power')
            <p class="lp-partnerProducts__subtitle">
              هذه منتجات افتراضية مخصصة لشريك ITA POWER، وستُستبدل تلقائياً بمنتجات لوحة التحكم بمجرد إضافتها لهذا الشريك.
            </p>
          @elseif($usingFallbackProducts)
            <p class="lp-partnerProducts__subtitle">
              هذه بيانات افتراضية مؤقتة لعرض التصميم فقط، وبعد اعتماد الشكل النهائي سنربط المنتجات مباشرة من لوحة التحكم حسب الشريك المحدد.
            </p>
          @elseif($productsPaginator->total() === 0)
            <p class="lp-partnerProducts__subtitle">
              لا توجد منتجات مضافة لهذا الشريك حالياً من لوحة التحكم.
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

              $productName = trim((string) ($product->name_ar ?? 'منتج'));
              $productDescription = trim((string) ($product->description_ar ?? ''));
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