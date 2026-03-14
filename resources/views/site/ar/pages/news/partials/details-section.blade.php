@php
    $newsPageArticle = \App\Models\NewsPageArticle::query()->find((int) request()->query('id'));
@endphp

<section
  class="lp-section lp-newsDetails"
  id="news-details"
  aria-label="تفاصيل الخبر"
>
  <div class="lp-newsDetails__inner">
    <header class="lp-newsDetails__head">
      <h2 class="lp-sectors__title lp-newsDetails__kicker">
        تفاصيل <span class="lp-sectors__titleAccent">الخبر</span>
      </h2>

      @if($newsPageArticle)
        <h1 class="lp-newsDetails__headline" id="newsDetailsHeadline">{!! $newsPageArticle->title_ar_display !!}</h1>

        <div
          class="lp-newsDetails__meta"
          id="newsDetailsMeta"
          aria-label="تاريخ الخبر"
        >
          <i
            class="fa-regular fa-calendar-days lp-newsDetails__dateIcon"
            aria-hidden="true"
          ></i>
          <span
            class="lp-newsDetails__date"
            id="newsDetailsDate"
            dir="ltr"
            lang="en"
          >{!! $newsPageArticle->published_at_display !!}</span>
        </div>
      @else
        <h1 class="lp-newsDetails__headline" id="newsDetailsHeadline">عذراً، هذا الخبر غير موجود.</h1>
      @endif
    </header>

    @if($newsPageArticle)
      <figure
        class="lp-newsDetails__figure"
        id="newsDetailsFigure"
        aria-label="صورة الخبر"
      >
        <img class="lp-newsDetails__img" id="newsDetailsImage" src="{{ $newsPageArticle->image_url }}" alt="{{ strip_tags($newsPageArticle->title_ar ?? 'صورة الخبر') }}" />
      </figure>

      <article
        class="lp-newsDetails__content"
        id="newsDetailsContent"
        aria-label="نص الخبر"
      >
        {!! $newsPageArticle->description_ar_display !!}
      </article>
    @else
      <article
        class="lp-newsDetails__content"
        id="newsDetailsContent"
        aria-label="نص الخبر"
      >
      </article>
    @endif
  </div>
</section>