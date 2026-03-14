@php
    $newsPageArticle = \App\Models\NewsPageArticle::query()->find((int) request()->query('id'));
@endphp

<section
  class="lp-section lp-newsDetails"
  id="news-details"
  aria-label="News details"
>
  <div class="lp-newsDetails__inner">
    <header class="lp-newsDetails__head">
      <h2 class="lp-sectors__title lp-newsDetails__kicker">
        News <span class="lp-sectors__titleAccent">Details</span>
      </h2>

      @if($newsPageArticle)
        <h1 class="lp-newsDetails__headline" id="newsDetailsHeadline">{!! $newsPageArticle->title_en_display !!}</h1>

        <div
          class="lp-newsDetails__meta"
          id="newsDetailsMeta"
          aria-label="News date"
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
        <h1 class="lp-newsDetails__headline" id="newsDetailsHeadline">Sorry, this news article was not found.</h1>
      @endif
    </header>

    @if($newsPageArticle)
      <figure
        class="lp-newsDetails__figure"
        id="newsDetailsFigure"
        aria-label="News image"
      >
        <img class="lp-newsDetails__img" id="newsDetailsImage" src="{{ $newsPageArticle->image_url }}" alt="{{ strip_tags($newsPageArticle->title_en ?? 'News image') }}" />
      </figure>

      <article
        class="lp-newsDetails__content"
        id="newsDetailsContent"
        aria-label="News content"
      >
        {!! $newsPageArticle->description_en_display !!}
      </article>
    @else
      <article
        class="lp-newsDetails__content"
        id="newsDetailsContent"
        aria-label="News content"
      >
      </article>
    @endif
  </div>
</section>