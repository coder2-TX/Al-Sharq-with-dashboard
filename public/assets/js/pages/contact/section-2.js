(function () {
  function normalizeLatinDigits(value) {
    return String(value || '').replace(/[٠-٩۰-۹]/g, function (char) {
      const map = {
        '٠': '0',
        '١': '1',
        '٢': '2',
        '٣': '3',
        '٤': '4',
        '٥': '5',
        '٦': '6',
        '٧': '7',
        '٨': '8',
        '٩': '9',
        '۰': '0',
        '۱': '1',
        '۲': '2',
        '۳': '3',
        '۴': '4',
        '۵': '5',
        '۶': '6',
        '۷': '7',
        '۸': '8',
        '۹': '9',
      };

      return map[char] || char;
    });
  }

  function escapeHtml(value) {
    return String(value || '')
      .replace(/&/g, '&amp;')
      .replace(/</g, '&lt;')
      .replace(/>/g, '&gt;')
      .replace(/"/g, '&quot;')
      .replace(/'/g, '&#039;');
  }

  function wrapDigitTokens(value) {
    const normalized = normalizeLatinDigits(value);
    const escaped = escapeHtml(normalized);

    return escaped.replace(
      /[A-Za-z0-9][A-Za-z0-9:\/\-.]*[0-9][A-Za-z0-9:\/\-.]*|[0-9]+/g,
      function (token) {
        return '<span class="lp-enDigits" dir="ltr" lang="en">' + token + '</span>';
      }
    );
  }

  function buildWhatsappMessage(isArabic, data) {
    if (isArabic) {
      return [
        'الفرع: ' + (data.branchName || ''),
        'الاسم الكامل: ' + (data.fullName || ''),
        'البريد الإلكتروني: ' + (data.email || ''),
        'رقم الهاتف: ' + (data.phone || ''),
        'الموضوع: ' + (data.subject || ''),
        'نص الرسالة:',
        data.message || '',
      ].join('\n');
    }

    return [
      'Branch: ' + (data.branchName || ''),
      'Full Name: ' + (data.fullName || ''),
      'Email: ' + (data.email || ''),
      'Phone: ' + (data.phone || ''),
      'Subject: ' + (data.subject || ''),
      'Message:',
      data.message || '',
    ].join('\n');
  }

  function initContactSection2() {
    const root = document.getElementById('contact-section-2');

    if (!root || root.dataset.lpContactSection2Ready === '1') {
      return;
    }

    root.dataset.lpContactSection2Ready = '1';

    const branchButtons = Array.from(root.querySelectorAll('.lp-contactSection2__branch[data-branch-id]'));
    const emailEl = document.getElementById('lpContactBranchEmail');
    const phoneEl = document.getElementById('lpContactBranchPhone');
    const addressEl = document.getElementById('lpContactBranchAddress');
    const branchIdEl = document.getElementById('lpContactBranchId');
    const whatsappEl = document.getElementById('lpContactWhatsappNumber');
    const branchNameEl = document.getElementById('lpContactBranchName');
    const form = document.getElementById('lpContactWhatsappForm');

    if (!branchButtons.length || !emailEl || !phoneEl || !addressEl || !form) {
      return;
    }

    const isArabic = document.documentElement.dir === 'rtl';

    function setActiveBranch(button) {
      branchButtons.forEach(function (item) {
        item.classList.remove('is-active');
        item.setAttribute('aria-pressed', 'false');
      });

      button.classList.add('is-active');
      button.setAttribute('aria-pressed', 'true');

      const email = button.dataset.email || '';
      const phone = button.dataset.phone || '';
      const address = button.dataset.address || '';
      const whatsapp = button.dataset.whatsapp || '';
      const branchId = button.dataset.branchId || '';
      const branchName = button.dataset.name || '';

      emailEl.innerHTML = email ? wrapDigitTokens(email) : '—';
      phoneEl.innerHTML = phone ? wrapDigitTokens(phone) : '—';
      addressEl.innerHTML = address ? wrapDigitTokens(address).replace(/\n/g, '<br>') : '—';

      if (branchIdEl) {
        branchIdEl.value = branchId;
      }

      if (whatsappEl) {
        whatsappEl.value = whatsapp;
      }

      if (branchNameEl) {
        branchNameEl.value = branchName;
      }
    }

    branchButtons.forEach(function (button) {
      button.addEventListener('click', function () {
        setActiveBranch(button);
      });
    });

    const initialActive = branchButtons.find(function (button) {
      return button.classList.contains('is-active');
    }) || branchButtons[0];

    if (initialActive) {
      setActiveBranch(initialActive);
    }

    form.addEventListener('submit', function (event) {
      event.preventDefault();

      const whatsappNumber = normalizeLatinDigits((whatsappEl && whatsappEl.value) || '').replace(/[^0-9]/g, '');

      if (!whatsappNumber) {
        alert(isArabic ? 'هذا الفرع لا يحتوي على رقم واتساب.' : 'This branch does not have a WhatsApp number.');
        return;
      }

      const payload = {
        branchName: branchNameEl ? branchNameEl.value.trim() : '',
        fullName: form.elements.full_name ? form.elements.full_name.value.trim() : '',
        email: form.elements.email ? form.elements.email.value.trim() : '',
        phone: form.elements.phone ? form.elements.phone.value.trim() : '',
        subject: form.elements.subject ? form.elements.subject.value.trim() : '',
        message: form.elements.message ? form.elements.message.value.trim() : '',
      };

      const text = buildWhatsappMessage(isArabic, payload);
      const url = 'https://wa.me/' + whatsappNumber + '?text=' + encodeURIComponent(text);

      window.open(url, '_blank', 'noopener');
    });
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initContactSection2);
  } else {
    initContactSection2();
  }

  window.lpInitContactSection2 = initContactSection2;
})();