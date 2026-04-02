@php
    $pharmacovigilancePage = \App\Models\SectorsPageMedicalPharmacovigilancePage::query()->first();

    $whatsAppRaw = \App\Support\Text\DisplayTextFormatter::normalizeLatinDigits(
        $pharmacovigilancePage?->whatsapp_number ?: '00967 775805888'
    );

    $whatsAppNumber = preg_replace('/[^0-9]/', '', $whatsAppRaw);
@endphp

<section
  class="lp-section lp-pharmaSection3"
  id="pharma-section-3"
  aria-label="نموذج الإبلاغ عن الأعراض الجانبية للأدوية"
>
  <div class="lp-pharmaSection3__inner">

    <header class="lp-pharmaSection3__head">
      <h2 class="lp-pharmaSection3__title">
        الإبلاغ عن الأعراض الجانبية <span class="lp-pharmaSection3__titleAccent">للأدوية</span>
      </h2>
    </header>

    <form
      id="lpPharmaWhatsAppFormAr"
      class="lp-pharmaSection3__form"
      action="#"
      method="post"
      aria-label="نموذج الإبلاغ عن الأعراض الجانبية للأدوية"
      novalidate
      data-whatsapp-number="{{ $whatsAppNumber }}"
    >
      <div class="lp-pharmaSection3__field">
        <input
          class="lp-pharmaSection3__formField"
          type="text"
          name="full_name"
          placeholder="الاسم الكامل"
          aria-label="الاسم الكامل"
        />
      </div>

      <div class="lp-pharmaSection3__field">
        <input
          class="lp-pharmaSection3__formField"
          type="email"
          name="email"
          placeholder="البريد الإلكتروني"
          aria-label="البريد الإلكتروني"
        />
      </div>

      <div class="lp-pharmaSection3__field">
        <input
          class="lp-pharmaSection3__formField lp-pharmaSection3__formField--phone"
          type="tel"
          name="phone"
          placeholder="رقم التلفون"
          aria-label="رقم التلفون"
        />
      </div>

      <div class="lp-pharmaSection3__field">
        <input
          class="lp-pharmaSection3__formField"
          type="text"
          name="subject"
          placeholder="موضوع"
          aria-label="موضوع"
        />
      </div>

      <div class="lp-pharmaSection3__field lp-pharmaSection3__field--message">
        <textarea
          class="lp-pharmaSection3__formField lp-pharmaSection3__formField--textarea"
          name="message"
          placeholder="نص الرسالة"
          aria-label="نص الرسالة"
        ></textarea>

        <div class="lp-pharmaSection3__submitRow">
          <button
            class="lp-pharmaSection3__submit lp-cta lp-cta--more"
            type="submit"
            aria-label="إرسال الرسالة"
          >
            <span class="lp-cta__stroke" aria-hidden="true"></span>
            <span class="lp-cta__layer" aria-hidden="true">
              <span class="lp-cta__text">إرسال الرسالة</span>
            </span>
          </button>
        </div>
      </div>
    </form>

  </div>
</section>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('lpPharmaWhatsAppFormAr');

    if (!form || form.dataset.bound === '1') {
      return;
    }

    form.dataset.bound = '1';

    form.addEventListener('submit', function (event) {
      event.preventDefault();

      const whatsappNumber = (form.dataset.whatsappNumber || '').trim();

      if (!whatsappNumber) {
        return;
      }

      const formData = new FormData(form);

      const fullName = String(formData.get('full_name') || '').trim();
      const email = String(formData.get('email') || '').trim();
      const phone = String(formData.get('phone') || '').trim();
      const subject = String(formData.get('subject') || '').trim();
      const message = String(formData.get('message') || '').trim();

      const lines = [
        'بلاغ جديد من صفحة التيقض الدوائي',
        fullName ? 'الاسم الكامل: ' + fullName : '',
        email ? 'البريد الإلكتروني: ' + email : '',
        phone ? 'رقم التلفون: ' + phone : '',
        subject ? 'الموضوع: ' + subject : '',
        message ? 'نص الرسالة: ' + message : '',
      ].filter(Boolean);

      const url = 'https://wa.me/' + whatsappNumber + '?text=' + encodeURIComponent(lines.join('\n'));

      window.open(url, '_blank', 'noopener');
    });
  });
</script>