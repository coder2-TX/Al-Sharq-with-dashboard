<section
  class="lp-section lp-medicalS1"
  id="medicines-partner-products-hero"
  aria-label="منتجات {{ $partnerName }}"
  style="position: relative; overflow: hidden; isolation: isolate;"
>
  <div
    aria-hidden="true"
    style="position:absolute; inset:0; background-image:url('{{ $partnerHeroImage }}'); background-size:cover; background-position:center; background-repeat:no-repeat; z-index:0;"
  ></div>

  <div
    aria-hidden="true"
    style="position:absolute; inset:0; background:rgba(0,0,0,.35); z-index:1;"
  ></div>

  <div class="lp-medicalS1__graphics" aria-hidden="true" style="position:relative; z-index:2;">
    <svg class="lp-lines lp-lines--topStart" viewBox="0 0 620 160" xmlns="http://www.w3.org/2000/svg">
      <line class="lp-line lp-line--w10" x1="620" y1="44"  x2="200" y2="44"></line>
      <line class="lp-line lp-line--w4"  x1="620" y1="72"  x2="230" y2="72"></line>
      <line class="lp-line lp-line--w1"  x1="620" y1="100" x2="300" y2="100"></line>
    </svg>

    <svg class="lp-lines lp-lines--bottomEnd" viewBox="0 0 620 160" xmlns="http://www.w3.org/2000/svg">
      <line class="lp-line lp-line--w10" x1="0" y1="100" x2="420" y2="100"></line>
      <line class="lp-line lp-line--w4"  x1="0" y1="72"  x2="410" y2="72"></line>
      <line class="lp-line lp-line--w1"  x1="0" y1="44"  x2="340" y2="44"></line>
    </svg>
  </div>

  <div class="lp-medicalS1__content" style="position:relative; z-index:2;">
    <div class="lp-medicalS1__contentRow">
      <div class="lp-medicalS1__text">
        <h1 class="lp-medicalS1__title lp-sectors__title">
          <span class="lp-medicalS1__titleLine">منتجات</span>
          <span class="lp-medicalS1__titleLine">
            <span class="lp-medicalS1__accentWord">
              <span class="lp-autoLatin" dir="ltr" lang="en">{{ $partnerName }}</span>
            </span>
          </span>
        </h1>
      </div>
    </div>
  </div>
</section>