// assets/js/header.js
(() => {
  "use strict";

  let inited = false;

  let retryCount = 0;
  const MAX_RETRIES = 30; 
  const RETRY_DELAY = 50;

  window.lpInitHeader = function lpInitHeader() {
    if (inited) return;

    const drawer = document.getElementById("lpDrawer");
    const menuBtn = document.getElementById("lpMenuBtn");

    if (!drawer || !menuBtn) {
      if (retryCount < MAX_RETRIES) {
        retryCount++;
        window.setTimeout(window.lpInitHeader, RETRY_DELAY);
      }
      return;
    }

    inited = true;

    const panel = drawer.querySelector(".lp-drawer__panel");
    const icon = menuBtn.querySelector("i");
    if (!panel) return;

    const brand = document.getElementById("lpHeaderBrand");
    const brandImg = document.getElementById("lpHeaderBrandImg");
    const headerSlot = document.getElementById("header-slot");

    const toBool = (v) => {
      if (v === undefined || v === null) return false;
      const s = String(v).trim().toLowerCase();
      return s === "" || s === "1" || s === "true" || s === "yes" || s === "on";
    };

    const normalizePath = (p) =>
      String(p || "")
        .trim()
        .replace(/\\/g, "/");

    const resolveUrl = (p) => {
      const s = normalizePath(p);
      if (!s) return "";
      if (
        /^(https?:)?\/\//i.test(s) ||
        s.startsWith("data:") ||
        s.startsWith("blob:")
      )
        return s;
      try {
        return new URL(s, window.location.href).href;
      } catch {
        return s;
      }
    };

    const hasAttr = (el, attr) =>
      !!(el && el.hasAttribute && el.hasAttribute(attr));
    const getSlotData = (key) =>
      headerSlot && headerSlot.dataset ? headerSlot.dataset[key] : undefined;
    const getBodyData = (key) =>
      document.body && document.body.dataset
        ? document.body.dataset[key]
        : undefined;

    let showBrand = false;

    if (hasAttr(headerSlot, "data-show-brand")) {
      showBrand = toBool(getSlotData("showBrand"));
    } else if (hasAttr(document.body, "data-show-brand")) {
      showBrand = toBool(getBodyData("showBrand"));
    } else if (hasAttr(document.body, "data-header-brand")) {
      showBrand = toBool(getBodyData("headerBrand"));
    } else {
      showBrand = false;
    }

    const brandHref =
      (hasAttr(headerSlot, "data-brand-href")
        ? getSlotData("brandHref")
        : undefined) ||
      (hasAttr(document.body, "data-brand-href")
        ? getBodyData("brandHref")
        : undefined) ||
      "#home";

    const providedBrandSrc =
      (hasAttr(headerSlot, "data-brand-src")
        ? getSlotData("brandSrc")
        : undefined) ||
      (hasAttr(document.body, "data-brand-src")
        ? getBodyData("brandSrc")
        : undefined) ||
      "";

    let brandPrepared = false;

    const prepareBrand = () => {
      if (!brand || brandPrepared) return;
      brandPrepared = true;

      brand.setAttribute("href", brandHref);

      if (brandImg) {
        const candidates = [
          providedBrandSrc,
          "/assets/images/header/Brand_Mark.png",
          "../../assets/images/header/Brand_Mark.png",
          "../assets/images/header/Brand_Mark.png",
          "assets/images/header/Brand_Mark.png",
        ].filter(Boolean);

        const tryList = [...new Set(candidates.map(resolveUrl))];

        let i = 0;
        const applyNext = () => {
          if (i >= tryList.length) return;
          brandImg.src = tryList[i++];
        };

        brandImg.onerror = () => applyNext();
        applyNext();
      }
    };

    const headerEl = document.getElementById("lpHeader");

    const updateHeaderOnScroll = () => {
      const y = window.scrollY || window.pageYOffset || 0;
      const scrolled = y > 6;

      document.body.classList.toggle("lp-header-scrolled", scrolled);

      const shouldShowBrand = !!showBrand || scrolled;

      if (brand) {
        if (shouldShowBrand) {
          prepareBrand();
          brand.hidden = false;
        } else {
          brand.hidden = true;
        }
      }
    };

    updateHeaderOnScroll();
    window.addEventListener("scroll", updateHeaderOnScroll, { passive: true });

    const focusableSel =
      'a[href], button:not([disabled]), [tabindex]:not([tabindex="-1"])';
    const getFocusable = () => Array.from(panel.querySelectorAll(focusableSel));
    const isOpen = () => drawer.classList.contains("is-open");

    let lastActiveEl = null;
    let iconSwapTimer = 0;

    const setBtnState = (open, animateIcon = true) => {
      menuBtn.setAttribute("aria-expanded", open ? "true" : "false");
      menuBtn.setAttribute(
        "aria-label",
        open ? "إغلاق القائمة" : "فتح القائمة",
      );
      menuBtn.dataset.state = open ? "open" : "closed";

      if (!icon) return;

      if (!animateIcon) {
        menuBtn.removeAttribute("data-icon-anim");
        icon.classList.remove("fa-bars", "fa-xmark");
        icon.classList.add(open ? "fa-xmark" : "fa-bars");
        return;
      }

      clearTimeout(iconSwapTimer);
      menuBtn.dataset.iconAnim = "out";

      iconSwapTimer = window.setTimeout(() => {
        icon.classList.remove("fa-bars", "fa-xmark");
        icon.classList.add(open ? "fa-xmark" : "fa-bars");

        menuBtn.dataset.iconAnim = "in";

        iconSwapTimer = window.setTimeout(() => {
          menuBtn.removeAttribute("data-icon-anim");
        }, 180);
      }, 120);
    };

    const openDrawer = () => {
      if (isOpen()) return;

      lastActiveEl = document.activeElement;
      drawer.classList.add("is-open");
      drawer.setAttribute("aria-hidden", "false");
      document.body.classList.add("lp-drawer-open");
      setBtnState(true);

      requestAnimationFrame(() => {
        const f = getFocusable();
        const target = f[0] || panel;
        if (target && typeof target.focus === "function") target.focus();
      });
    };

    const closeDrawer = () => {
      if (!isOpen()) return;

      drawer.classList.remove("is-open");
      drawer.setAttribute("aria-hidden", "true");
      document.body.classList.remove("lp-drawer-open");
      setBtnState(false, false);

      if (lastActiveEl && typeof lastActiveEl.focus === "function") {
        lastActiveEl.focus();
      }
    };

    setBtnState(false, false);

    menuBtn.addEventListener("click", () => {
      if (isOpen()) closeDrawer();
      else openDrawer();
    });

    drawer.addEventListener("click", (e) => {
      const t = e.target;
      if (!t) return;

      const closeEl = t.closest ? t.closest("[data-lp-drawer-close]") : null;
      if (closeEl) closeDrawer();
    });

    document.addEventListener("keydown", (e) => {
      if (e.key === "Escape" && isOpen()) {
        e.preventDefault();
        closeDrawer();
      }
    });

    panel.addEventListener("click", (e) => {
      const a = e.target && e.target.closest ? e.target.closest("a") : null;
      if (!a) return;

      const href = a.getAttribute("href") || "";
      if (href.startsWith("#")) closeDrawer();
    });

    drawer.addEventListener("keydown", (e) => {
      if (e.key !== "Tab" || !isOpen()) return;

      const f = getFocusable();
      if (f.length === 0) return;

      const first = f[0];
      const last = f[f.length - 1];

      if (e.shiftKey && document.activeElement === first) {
        e.preventDefault();
        last.focus();
      } else if (!e.shiftKey && document.activeElement === last) {
        e.preventDefault();
        first.focus();
      }
    });
  };
})();


(function () {
  function normalizeDigits(value) {
    return String(value).replace(/[٠-٩۰-۹٫٬]/g, function (char) {
      const map = {
        '٠': '0', '١': '1', '٢': '2', '٣': '3', '٤': '4',
        '٥': '5', '٦': '6', '٧': '7', '٨': '8', '٩': '9',
        '۰': '0', '۱': '1', '۲': '2', '۳': '3', '۴': '4',
        '۵': '5', '۶': '6', '۷': '7', '۸': '8', '۹': '9',
        '٫': '.', '٬': ','
      };

      return map[char] ?? char;
    });
  }

  function shouldSkipTextNode(node) {
    if (!node || !node.nodeValue || !node.nodeValue.trim()) {
      return true;
    }

    const parent = node.parentElement;
    if (!parent) {
      return true;
    }

    if (
      parent.closest(
        'script, style, noscript, textarea, input, select, option, pre, code, svg, .lp-no-auto-latin, .lp-autoLatin, .lp-autoLatinDigits, .lp-enDigits'
      )
    ) {
      return true;
    }

    return !/[A-Za-z0-9٠-٩۰-۹]/.test(node.nodeValue);
  }

  function wrapMixedTextNode(node) {
    const original = node.nodeValue;
    const normalized = normalizeDigits(original);

    const pattern = /([A-Za-z][A-Za-z0-9&@+._\-/:()%]*|\d[\d.,:/\-]*)/g;

    let lastIndex = 0;
    let hasMatch = false;
    const fragment = document.createDocumentFragment();

    normalized.replace(pattern, function (match, _group, offset) {
      hasMatch = true;

      if (offset > lastIndex) {
        fragment.appendChild(document.createTextNode(normalized.slice(lastIndex, offset)));
      }

      const span = document.createElement('span');
      const isDigitsOnly = /^\d[\d.,:/\-]*$/.test(match);

      span.className = isDigitsOnly ? 'lp-autoLatinDigits' : 'lp-autoLatin';
      span.setAttribute('dir', 'ltr');
      span.setAttribute('lang', 'en');
      span.textContent = match;

      fragment.appendChild(span);
      lastIndex = offset + match.length;

      return match;
    });

    if (!hasMatch) {
      if (normalized !== original) {
        node.nodeValue = normalized;
      }
      return;
    }

    if (lastIndex < normalized.length) {
      fragment.appendChild(document.createTextNode(normalized.slice(lastIndex)));
    }

    node.parentNode.replaceChild(fragment, node);
  }

  function processRoot(root) {
    if (!root) {
      return;
    }

    const walker = document.createTreeWalker(
      root,
      NodeFilter.SHOW_TEXT,
      {
        acceptNode(node) {
          return shouldSkipTextNode(node)
            ? NodeFilter.FILTER_REJECT
            : NodeFilter.FILTER_ACCEPT;
        }
      }
    );

    const nodes = [];
    let current;

    while ((current = walker.nextNode())) {
      nodes.push(current);
    }

    nodes.forEach(wrapMixedTextNode);
  }

function initAutoLatinFix() {
  const html = document.documentElement;

  if (!html || html.getAttribute('dir') !== 'rtl') {
    return;
  }

  const roots = document.querySelectorAll('main, .lp-footer');

  roots.forEach(processRoot);
}

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initAutoLatinFix);
  } else {
    initAutoLatinFix();
  }
})();