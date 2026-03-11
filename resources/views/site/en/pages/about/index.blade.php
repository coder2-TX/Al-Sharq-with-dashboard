<!doctype html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>About Us | Al Sharq Company</title>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/css/header.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/css/sectors.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/css/footer.css') }}" />

  <link rel="stylesheet" href="{{ asset('assets/css/pages/about/section-1.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/css/pages/about/section-2.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/css/pages/about/section-3.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/css/pages/about/section-4.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/css/pages/about/section-6.css') }}" />

  <script src="{{ asset('assets/js/header.js') }}" defer></script>
  <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js" defer></script>
  <script src="{{ asset('assets/js/hero.js') }}" defer></script>
  <script src="{{ asset('assets/js/app.js') }}" defer></script>
</head>

<body
  data-show-brand="true"
  data-brand-src="{{ asset('assets/images/header/Brand_Mark.png') }}"
  data-brand-href="{{ route('site.en.home') }}#home"
>
  @include('site.en.partials.header')

  <main id="about-page">
    @include('site.en.pages.about.partials.section-1')
    @include('site.en.pages.about.partials.section-2')
    @include('site.en.pages.about.partials.section-3')
    @include('site.en.pages.about.partials.section-4')
    @include('site.en.pages.about.partials.section-6')
  </main>

  @include('site.en.partials.footer')
</body>
</html>