@php
    $contactPageMapSection = \App\Models\ContactPageMapSection::query()->first();

    $googleMapsEmbedUrl = $contactPageMapSection?->google_maps_embed_url_display
        ?: 'https://www.google.com/maps?q=Sana%27a,+Yemen&z=14&output=embed';
@endphp

<section class="lp-section lp-contactSection4" id="contact-section-4" aria-label="Company location on map">
  <div class="lp-contactSection4__inner">
    <div class="lp-contactSection2__mapWrap" aria-label="Company location on map">
      <iframe
        class="lp-contactSection2__map"
        src="{{ $googleMapsEmbedUrl }}"
        title="Company location on map"
        loading="lazy"
        referrerpolicy="no-referrer-when-downgrade"
        allowfullscreen
      ></iframe>
    </div>
  </div>
</section>