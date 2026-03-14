@php
    $aboutPageLeadershipSection = \App\Models\AboutPageLeadershipSection::query()->first();

    $chairmanNameAr = $aboutPageLeadershipSection?->chairman_name_ar_display ?: 'محمد عبدالقوي عثمان';
    $chairmanImage = $aboutPageLeadershipSection?->chairman_image_url ?: asset('assets/images/pages/about/section3/Chairman_of_the_Board.jpg');
    $chairmanMessageAr = $aboutPageLeadershipSection?->chairman_message_ar_display ?: 'أسست شركة الشرق للتجارة والتوكيلات في أوائل التسعينيات في طليعة الشركات حيث نشأت في خضم التغيرات العالمية واستطاعت المحافظة على مكانتها في الريادة ومواجهة الآثار الاقتصادية العميقة وتحديات السوق برؤية واضحة وشجاعة للمساهمة في دعم الاقتصاد الوطني وتلبية جزء أساسي من احتياجات المجتمع. إن النجاح الذي حققته الشركة جاء من خلال الالتزام بالمعايير الدولية ذات العلاقة والمبادئ والأخلاق المهنية واتباع الطرق التي يمكن من خلالها الارتقاء بالخدمات التي تقدمها الشركة لأعلى المستويات وتقديم أصناف وخدمات عالية الجودة من أعلى مستوى حيث حصلت الشركة على شهادة الجودة العالمية بالإضافة الى التوسع والتنويع بقطاعات الأعمال والخدمات لتشمل نطاقاً كبيراً من القطاعات الهامة الأساسية وتلبي احتياجات العملاء والسوق المحلي. ولإيماننا في شركة الشرق للتجارة والتوكيلات بأهمية إرضاء العملاء وان أول خطوة لذلك هي إعداد الكفاءات، فقد التزمنا بمنهجية خاصة تشمل التحفيز والتدريب المستمر وتطوير العمل الوظيفي للوصول إلى مرحلة التميز في توفير خدمات ومنتجات ذات جودة عالية وميزة تنافسية، كما أن الشركة ملتزمة بالعمل بأهداف واضحة يتم متابعتها من خلال التقييم المستمر لمدى التقدم والتحقيق بالنسبة لهذه الأهداف. وتمتلك شركة الشرق للتجارة والتوكيلات شبكة توزيع واسعة وفعالة لضمان سهولة وصول الخدمات والمنتجات للعملاء حيث تقوم بتغطية معظم محافظات الجمهورية حيث تتواجد الشركة في (10) فروع في المدن الرئيسية بالجمهورية اليمنية لتسهيل عملية البيع والتوزيع.';

    $generalManagerNameAr = $aboutPageLeadershipSection?->general_manager_name_ar_display ?: 'عادل عبدالقوي عثمان';
    $generalManagerImage = $aboutPageLeadershipSection?->general_manager_image_url ?: asset('assets/images/pages/about/section3/General_Manager.jpg');
    $generalManagerMessageAr = $aboutPageLeadershipSection?->general_manager_message_ar_display ?: 'بدأت مجموعة الشرق للتجارة والتوكيلات نشاطها في مجال استيراد الأدوية والمستلزمات الطبية والأجهزة منتصف عام 1991م في وقت كانت فيه اليمن تستورد معظم احتياجاتها الطبية من الخارج وكان هناك القليل من المصانع المحلية ولأصناف محددة فقط لذلك رأينا أن ندعم هذا القطاع الخاص والمهم بتوفير أهم احتياجات البلد وبالجودة العالية والمصادر المضمونة مع التطلع لتأسيس مشروع الإنتاج المحلي والتصنيع والتطوير. نحن لنا مبادئنا وأهدافنا وقيمنا خلال التأسيس والسير في هذا المجال والتي تتمثل في رضا العملاء وتقديم المنتجات بأفضل جودة تلبي التطلعات الحالية والمستقبلية وحسب المواصفات العالمية والتطور المستمر سواء على مستوى أداء الموظفين وخدمة العملاء أو توفير كل ما هو جديد ونافع ويخدم المرضى والمجتمع وذلك كان حرصنا دائماً على تمثيل كبرى الشركات العالمية في المجال الطبي والمستلزمات وبعد ذلك في مجال غذاء وحليب الأطفال. وفي ظل الظروف المتقلبة في اليمن من الناحية الأمنية والاقتصادية واجهنا تحديات كبيرة جداً كما واجهها المجتمع بشكل عام وحاولنا بكل جهد تجاوز هذه التحديات العظيمة والاستمرار في أداء واجبنا المهني والأخلاقي بكل قوة وبهذا استطعنا الاستمرار بتوفير الأمن الدوائي لمنتجاتنا وكذلك توفير احتياجات الأطفال من أفضل المصادر وكبرى الشركات العالمية وكذلك إضافة أنشطة قطاعات جديدة للشركة في مجالات متعددة مثل تقنية الاتصالات وزيوت المحركات ومستلزمات السيارات ونحن بذلك دوماً نتطلع لتحقيق أهدافنا ورؤيتنا لتقديم ما هو أفضل والتطوير المستمر لما يخدم مصلحة واحتياجات المواطن.';
@endphp

<section class="lp-section lp-aboutLeaders" id="leadership" aria-label="قيادة الشركة">
  <div class="lp-aboutLeaders__inner">
    <header class="lp-sectors__head">
      <h2 class="lp-sectors__title">
        قيادة <span class="lp-sectors__titleAccent">الشركة</span>
      </h2>
    </header>

    <div class="lp-aboutLeaders__stage" aria-label="بطاقات القيادة والتفاصيل">
      <div class="lp-aboutLeaders__grid" role="list" aria-label="بطاقات القيادة">
        <article class="lp-sectorCard lp-aboutLeaders__card" role="listitem" aria-label="كلمة رئيس مجلس الإدارة">
          <img src="{{ $chairmanImage }}" alt="صورة رئيس مجلس الإدارة">

          <a class="lp-iconBtn lp-sectorCard__btn" href="#leader-chairman" aria-label="عرض كلمة رئيس مجلس الإدارة">
            <span class="lp-iconBtn__stroke" aria-hidden="true"></span>
            <span class="lp-iconBtn__layer" aria-hidden="true">
              <i class="fa-solid fa-chevron-left" aria-hidden="true"></i>
            </span>
          </a>

          <div class="lp-sectorCard__name">كلمة رئيس مجلس الإدارة</div>
        </article>

        <article class="lp-sectorCard lp-aboutLeaders__card" role="listitem" aria-label="كلمة المدير العام">
          <img src="{{ $generalManagerImage }}" alt="صورة المدير العام">

          <a class="lp-iconBtn lp-sectorCard__btn" href="#leader-gm" aria-label="عرض كلمة المدير العام">
            <span class="lp-iconBtn__stroke" aria-hidden="true"></span>
            <span class="lp-iconBtn__layer" aria-hidden="true">
              <i class="fa-solid fa-chevron-left" aria-hidden="true"></i>
            </span>
          </a>

          <div class="lp-sectorCard__name">كلمة المدير العام</div>
        </article>
      </div>

      <article class="lp-leaderPanel" id="leader-chairman" aria-label="تفاصيل كلمة رئيس مجلس الإدارة">
        <a class="lp-iconBtn lp-leaderPanel__close" href="#leadership" aria-label="إغلاق تفاصيل كلمة رئيس مجلس الإدارة">
          <span class="lp-iconBtn__stroke" aria-hidden="true"></span>
          <span class="lp-iconBtn__layer" aria-hidden="true">
            <i class="fa-solid fa-chevron-left" aria-hidden="true"></i>
          </span>
        </a>

        <h3 class="lp-leaderPanel__title">كلمة رئيس مجلس الإدارة</h3>

        <div class="lp-leaderPanel__text">
          {!! $chairmanMessageAr !!}
        </div>

        <div class="lp-leaderPanel__sign" aria-label="توقيع">
          <span class="lp-leaderPanel__signRole">رئيس مجلس الإدارة</span>
          <span class="lp-leaderPanel__signName">{!! $chairmanNameAr !!}</span>
        </div>
      </article>

      <article class="lp-leaderPanel" id="leader-gm" aria-label="تفاصيل كلمة المدير العام">
        <a class="lp-iconBtn lp-leaderPanel__close" href="#leadership" aria-label="إغلاق تفاصيل كلمة المدير العام">
          <span class="lp-iconBtn__stroke" aria-hidden="true"></span>
          <span class="lp-iconBtn__layer" aria-hidden="true">
            <i class="fa-solid fa-chevron-left" aria-hidden="true"></i>
          </span>
        </a>

        <h3 class="lp-leaderPanel__title">كلمة المدير العام</h3>

        <div class="lp-leaderPanel__text">
          {!! $generalManagerMessageAr !!}
        </div>

        <div class="lp-leaderPanel__sign" aria-label="توقيع">
          <span class="lp-leaderPanel__signRole">المدير العام</span>
          <span class="lp-leaderPanel__signName">{!! $generalManagerNameAr !!}</span>
        </div>
      </article>
    </div>
  </div>
</section>