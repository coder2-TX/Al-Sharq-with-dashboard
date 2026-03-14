<!doctype html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>News Details | Al Sharq Company</title>

    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
    />

    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/header.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/sectors.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/footer.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/pages/news/details.css') }}" />

    <script src="{{ asset('assets/js/header.js') }}" defer></script>
    <script
      src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js"
      defer
    ></script>
    <script src="{{ asset('assets/js/hero.js') }}" defer></script>
    <script src="{{ asset('assets/js/pages/news/details.js') }}" defer></script>
    <script src="{{ asset('assets/js/app.js') }}" defer></script>
  </head>

  <body
    data-show-brand="true"
    data-brand-src="{{ asset('assets/images/header/Brand_Mark.png') }}"
    data-brand-href="{{ route('site.en.home') }}"
  >
    @include('site.en.partials.header')

    <main id="news-details-page">
      @include('site.en.pages.news.partials.details-section')
    </main>

    @include('site.en.partials.footer')
  </body>
</html>