<!doctype html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>Contact Us | Al Sharq</title>

    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
    />

    <!-- Base -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />

    <!-- Shared -->
    <link rel="stylesheet" href="{{ asset('assets/css/header.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/sectors.css') }}" />

    <!-- Footer -->
    <link rel="stylesheet" href="{{ asset('assets/css/footer.css') }}" />

    <!-- Contact -->
    <link
      rel="stylesheet"
      href="{{ asset('assets/css/pages/contact/section-1.css') }}"
    />
    <link
      rel="stylesheet"
      href="{{ asset('assets/css/pages/contact/section-2.css') }}"
    />
    <link
      rel="stylesheet"
      href="{{ asset('assets/css/pages/contact/section-3.css') }}"
    />
    <link
      rel="stylesheet"
      href="{{ asset('assets/css/pages/contact/section-4.css') }}"
    />

    <script src="{{ asset('assets/js/header.js') }}" defer></script>
    <script
      src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js"
      defer
    ></script>
    <script src="{{ asset('assets/js/hero.js') }}" defer></script>
    <script src="{{ asset('assets/js/app.js') }}" defer></script>
  </head>

  <body
    class="lp-page--contact"
    data-show-brand="true"
    data-brand-src="{{ asset('assets/images/header/Brand_Mark.png') }}"
    data-brand-href="{{ route('site.en.home') }}#home"
  >
    @include('site.en.partials.header')

    <main id="contact-page">
      <section
        class="lp-section lp-contactIntro"
        id="contact-intro"
        aria-label="Contact us"
      >
        <div class="lp-contactIntro__graphics" aria-hidden="true">
          <svg
            class="lp-lines lp-lines--topStart"
            viewBox="0 0 620 160"
            xmlns="http://www.w3.org/2000/svg"
          >
            <line
              class="lp-line lp-line--w10"
              x1="620"
              y1="44"
              x2="200"
              y2="44"
            ></line>
            <line
              class="lp-line lp-line--w4"
              x1="620"
              y1="72"
              x2="230"
              y2="72"
            ></line>
            <line
              class="lp-line lp-line--w1"
              x1="620"
              y1="100"
              x2="300"
              y2="100"
            ></line>
          </svg>

          <svg
            class="lp-lines lp-lines--bottomEnd"
            viewBox="0 0 620 160"
            xmlns="http://www.w3.org/2000/svg"
          >
            <line
              class="lp-line lp-line--w10"
              x1="0"
              y1="100"
              x2="420"
              y2="100"
            ></line>
            <line
              class="lp-line lp-line--w4"
              x1="0"
              y1="72"
              x2="410"
              y2="72"
            ></line>
            <line
              class="lp-line lp-line--w1"
              x1="0"
              y1="44"
              x2="340"
              y2="44"
            ></line>
          </svg>
        </div>

        <div class="lp-contactIntro__inner">
          <header class="lp-contactIntro__head">
            <h2 class="lp-contactIntro__heading">
              Contact <span class="lp-contactIntro__accent">Us</span>
            </h2>
          </header>
        </div>
      </section>

      @include('site.en.pages.contact.partials.section-2')
      @include('site.en.pages.contact.partials.section-3')
      @include('site.en.pages.contact.partials.section-4')
    </main>

    @include('site.en.partials.footer')
  </body>
</html>