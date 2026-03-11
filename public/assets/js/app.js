(() => {
  "use strict";

  const callInit = (fnName, ...args) => {
    if (typeof window[fnName] !== "function") return;

    try {
      window[fnName](...args);
    } catch (err) {
      console.error(`Init failed: ${fnName}`, err);
    }
  };

  const initAllLinesAfterLoad = () => {
    if (typeof window.lpInitHeroLines !== "function") return;

    const heroSection = document.querySelector(".lp-hero");
    if (heroSection) {
      window.lpInitHeroLines(heroSection);
    }

    const contactSection = document.getElementById("contact-intro");
    if (contactSection) {
      window.lpInitHeroLines(contactSection);
    }

    const footer = document.querySelector(".lp-footer");
    if (footer) {
      window.lpInitHeroLines(footer);
    }
  };

  const initBladePage = () => {
    callInit("lpInitHeader");
    callInit("lpInitSectors");
    callInit("lpInitNumbers");
    callInit("lpInitPartners");
    initAllLinesAfterLoad();
  };

  const loadOne = async (el) => {
    const url = el.getAttribute("data-partial");
    if (!url) return;

    const res = await fetch(url, { cache: "no-store" });
    if (!res.ok) {
      throw new Error(`Failed to load partial: ${url} (${res.status})`);
    }

    const htmlRaw = await res.text();

    const html = (htmlRaw || "")
      .replace(/^\uFEFF/, "")
      .replace(/\u0000/g, "")
      .trim();

    if (!html) {
      throw new Error(`Partial is EMPTY: ${url}`);
    }

    if (
      url.endsWith("partials/hero.html") &&
      !html.includes("lp-hero__content")
    ) {
      const preview = html
        .slice(0, 250)
        .replace(/</g, "&lt;")
        .replace(/>/g, "&gt;");

      el.innerHTML = `<div style="padding:12px;border:2px solid #f00;background:#fff;color:#000;font:14px/1.6 Arial">
          <b>ERROR:</b> hero.html loaded but missing <code>lp-hero__content</code><br>
          <b>URL:</b> ${url}<br>
          <b>Preview:</b><pre style="white-space:pre-wrap;margin:8px 0 0">${preview}</pre>
        </div>`;

      throw new Error(
        `hero.html missing lp-hero__content -> wrong file or not saved UTF-8: ${url}`
      );
    }

    const tpl = document.createElement("template");
    tpl.innerHTML = html;

    el.parentNode.insertBefore(tpl.content, el);

    const afterName = el.getAttribute("data-after");
    el.remove();

    if (afterName) {
      callInit(afterName);
    }

    initAllLinesAfterLoad();
  };

  const boot = async () => {
    const partialNodes = Array.from(document.querySelectorAll("[data-partial]"));

    // الوضع القديم: static HTML + partial loader
    if (partialNodes.length) {
      for (const el of partialNodes) {
        try {
          await loadOne(el);
        } catch (err) {
          console.error(err);
        }
      }

      setTimeout(() => {
        initAllLinesAfterLoad();
      }, 100);

      return;
    }

    // الوضع الجديد: Laravel Blade
    initBladePage();
  };

  const startObserver = () => {
    const observer = new MutationObserver((mutations) => {
      let needsInit = false;

      mutations.forEach((mutation) => {
        if (mutation.type === "childList" && mutation.addedNodes.length > 0) {
          mutation.addedNodes.forEach((node) => {
            if (node.nodeType !== 1) return;

            if (
              node.classList?.contains("lp-hero") ||
              node.id === "contact-intro" ||
              node.classList?.contains("lp-footer")
            ) {
              needsInit = true;
            }
          });
        }
      });

      if (needsInit) {
        setTimeout(() => {
          initAllLinesAfterLoad();
        }, 50);
      }
    });

    observer.observe(document.body, {
      childList: true,
      subtree: true,
    });
  };

  if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", () => {
      boot();
      startObserver();
    });
  } else {
    boot();
    startObserver();
  }
})();