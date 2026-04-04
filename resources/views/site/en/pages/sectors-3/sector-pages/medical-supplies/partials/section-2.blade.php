@php
    $page = \App\Models\SectorsPageMedicalSuppliesPage::query()->first();

    $articleEn = $page?->article_en ?: <<<'HTML'
<p>
The Medical Supplies sector focuses on providing the essential operational needs of healthcare facilities, clinics, and laboratories through a wide range of products that support daily efficiency and safe medical practice.
</p>

<p>
This sector is dedicated to supplying reliable and practical items tailored to different healthcare environments, with strong attention to variety, availability, and continuity of supply for healthcare institutions.
</p>

<ul>
  <li>Daily medical consumables</li>
  <li>Clinic and laboratory supplies</li>
  <li>Protection and sterilization essentials</li>
  <li>Measurement and monitoring devices and accessories</li>
</ul>

<p>
Its goal is to meet daily medical operational demands through products that enhance performance and support healthcare teams across different levels of service.
</p>
HTML;
@endphp

<section class="lp-section lp-medicalS2" id="medical-supplies-about-sector" aria-label="About the Medical Supplies Sector">
  <div class="lp-medicalS2__inner">

    <h2 class="lp-medicalS2__title">About the Sector</h2>

    <div class="lp-medicalS2__text">
      {!! $articleEn !!}
    </div>

  </div>
</section>