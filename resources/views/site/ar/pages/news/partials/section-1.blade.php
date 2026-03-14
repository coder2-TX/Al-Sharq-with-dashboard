@php
    $newsPageArticles = \App\Models\NewsPageArticle::query()
        ->orderByDesc('published_at')
        ->orderByDesc('id')
        ->paginate(6);
@endphp

<section class="lp-section lp-news" id="news" aria-label="أخبار شركة الشرق">
  <div class="lp-news__inner">

    <header class="lp-news__head">
      <h2 class="lp-sectors__title lp-news__title">
        اخبار <span class="lp-sectors__titleAccent">الشرق</span>
      </h2>
    </header>

    <div class="lp-news__grid" aria-label="قائمة الأخبار">
      @forelse($newsPageArticles as $article)
        <article class="lp-newsCard" aria-label="{{ strip_tags($article->title_ar ?? 'خبر') }}">
          <a class="lp-newsCard__media" href="{{ url('/news/details') }}?id={{ $article->id }}" aria-label="فتح تفاصيل الخبر">
            <img class="lp-newsCard__img" src="{{ $article->image_url }}" alt="{{ strip_tags($article->title_ar ?? 'صورة الخبر') }}">
          </a>

          <div class="lp-newsCard__body">
            <div class="lp-newsCard__meta" aria-label="تاريخ الخبر">
              <i class="fa-regular fa-calendar-days lp-newsCard__dateIcon" aria-hidden="true"></i>
              <span class="lp-newsCard__date" dir="ltr" lang="en">{!! $article->published_at_display !!}</span>
            </div>

            <a
              class="lp-newsCard__title"
              href="{{ url('/news/details') }}?id={{ $article->id }}"
              aria-label="{{ strip_tags($article->title_ar ?? 'عنوان الخبر') }}"
              style="display:-webkit-box;-webkit-line-clamp:3;-webkit-box-orient:vertical;overflow:hidden;"
            >
              {!! $article->title_ar_display !!}
            </a>
          </div>
        </article>
      @empty
        <p>لا توجد أخبار حالياً.</p>
      @endforelse
    </div>

    @if($newsPageArticles->hasPages())
      <nav class="lp-pagination" aria-label="التنقل بين صفحات الأخبار">
        @if($newsPageArticles->onFirstPage())
          <span class="lp-pageBtn lp-pageBtn--wide" aria-disabled="true">السابق</span>
        @else
          <a class="lp-pageBtn lp-pageBtn--wide" href="{{ $newsPageArticles->previousPageUrl() }}">السابق</a>
        @endif

        @for($page = 1; $page <= $newsPageArticles->lastPage(); $page++)
          <a
            class="lp-pageBtn lp-pageBtn--num lp-enDigits"
            dir="ltr"
            lang="en"
            href="{{ $newsPageArticles->url($page) }}"
            @if($newsPageArticles->currentPage() === $page) aria-current="page" @endif
          >
            {{ $page }}
          </a>
        @endfor

        @if($newsPageArticles->hasMorePages())
          <a class="lp-pageBtn lp-pageBtn--wide" href="{{ $newsPageArticles->nextPageUrl() }}">اللاحق</a>
        @else
          <span class="lp-pageBtn lp-pageBtn--wide" aria-disabled="true">اللاحق</span>
        @endif
      </nav>
    @endif

  </div>
</section>